<?php
/**
 * download.php — Descarga de recursos del Curso Final
 * Parámetros:
 *   ?type=word  → descarga Plan_Recuperacion_PHP.docx
 *   ?type=zip   → descarga CURSO FINAL.zip (pre-generado)
 *   ?type=ia    → descarga agente-ia-tutor-php.md
 */

$type = $_GET['type'] ?? '';

// ──────────────────────────────────────────────────────────────────
//  Rate limiting: bloquear si más de 10 descargas en 60 segundos por IP
// ──────────────────────────────────────────────────────────────────
$ip         = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$logFile    = sys_get_temp_dir() . '/dl_log_' . md5($ip) . '.json';
$window     = 60;   // segundos
$maxDescargas = 10; // máximo permitido en ese ventana

// Cargar el historial de timestamps de esta IP
$timestamps = [];
if (file_exists($logFile)) {
    $data = json_decode(file_get_contents($logFile), true);
    if (is_array($data)) $timestamps = $data;
}

// Descartar timestamps fuera de la ventana
$now = time();
$timestamps = array_filter($timestamps, fn($t) => ($now - $t) < $window);

// Comprobar si supera el límite
if (count($timestamps) >= $maxDescargas) {
    http_response_code(429);
    header('Retry-After: ' . $window);
    exit('Demasiadas descargas en poco tiempo. Espera un minuto.');
}

// Registrar esta descarga
$timestamps[] = $now;
file_put_contents($logFile, json_encode(array_values($timestamps)));

// ──────────────────────────────────────────────────────────────────
//  Word download
// ──────────────────────────────────────────────────────────────────
if ($type === 'word') {
    $file = __DIR__ . '/recursos/Plan_Recuperacion_PHP.docx';
    if (!file_exists($file)) { http_response_code(404); exit('Archivo no encontrado.'); }
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment; filename="Plan_Recuperacion_PHP.docx"');
    header('Content-Length: ' . filesize($file));
    header('Cache-Control: no-cache, no-store');
    readfile($file);
    exit;
}

// ──────────────────────────────────────────────────────────────────
//  ZIP download
// ──────────────────────────────────────────────────────────────────
if ($type === 'zip') {
    $file = __DIR__ . '/recursos/CursoFinal.zip';
    if (!file_exists($file)) { http_response_code(404); exit('El archivo ZIP no está disponible. Contacta al autor.'); }
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="CursoFinal.zip"');
    header('Content-Length: ' . filesize($file));
    header('Cache-Control: no-cache, no-store');
    readfile($file);
    exit;
}

// ──────────────────────────────────────────────────────────────────
//  Agente IA download
// ──────────────────────────────────────────────────────────────────
if ($type === 'ia') {
    $file = __DIR__ . '/recursos/agente-ia-tutor-php.md';
    if (!file_exists($file)) { http_response_code(404); exit('Archivo no encontrado.'); }
    header('Content-Type: text/markdown; charset=utf-8');
    header('Content-Disposition: attachment; filename="agente-ia-tutor-php.md"');
    header('Content-Length: ' . filesize($file));
    header('Cache-Control: no-cache, no-store');
    readfile($file);
    exit;
}

// ──────────────────────────────────────────────────────────────────
//  Petición inválida
// ──────────────────────────────────────────────────────────────────
http_response_code(400);
exit('Tipo de descarga no válido. Usa ?type=word, ?type=zip o ?type=ia');