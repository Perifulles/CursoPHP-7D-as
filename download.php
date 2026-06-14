<?php
/**
 * download.php — Descarga de recursos del Curso Final de Héctor
 * Parámetros:
 *   ?type=word  → descarga Plan_Recuperacion_PHP_Hector.docx
 *   ?type=zip   → descarga un ZIP con todo el proyecto
 */

$type = $_GET['type'] ?? '';

// ──────────────────────────────────────────────────────────────────
//  Word download
// ──────────────────────────────────────────────────────────────────
if ($type === 'word') {
    $file = __DIR__ . '/Plan_Recuperacion_PHP_Hector.docx';
    if (!file_exists($file)) {
        http_response_code(404);
        exit('Archivo no encontrado.');
    }
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment; filename="Plan_Recuperacion_PHP_Hector.docx"');
    header('Content-Length: ' . filesize($file));
    header('Cache-Control: no-cache, no-store');
    readfile($file);
    exit;
}

// ──────────────────────────────────────────────────────────────────
//  ZIP download
// ──────────────────────────────────────────────────────────────────
if ($type === 'zip') {
    if (!class_exists('ZipArchive')) {
        http_response_code(500);
        exit('Extensión ZIP no disponible en el servidor.');
    }

    $tmpFile = tempnam(sys_get_temp_dir(), 'cursofinal_') . '.zip';
    $zip     = new ZipArchive();
    if ($zip->open($tmpFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
        http_response_code(500);
        exit('No se pudo crear el ZIP.');
    }

    $root    = realpath(__DIR__);
    $rootLen = strlen($root) + 1;

    // Directorios y extensiones a excluir
    $skipDirs = ['.git', '.vscode', 'mysql_data'];
    $skipExts = []; // incluir todo

    $iter = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($iter as $file) {
        if ($file->isDir()) continue;

        $realPath = $file->getRealPath();
        $relPath  = substr($realPath, $rootLen);

        // Skip hidden/unwanted dirs
        $parts = explode(DIRECTORY_SEPARATOR, $relPath);
        $skip  = false;
        foreach ($parts as $part) {
            if (in_array($part, $skipDirs, true) || str_starts_with($part, '.')) {
                $skip = true;
                break;
            }
        }
        if ($skip) continue;

        // Skip this script itself generating the zip
        if ($realPath === realpath(__FILE__)) continue;

        $zipPath = str_replace(DIRECTORY_SEPARATOR, '/', 'CursoFinal_Hector/' . $relPath);
        $zip->addFile($realPath, $zipPath);
    }

    $zip->close();

    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="CursoFinal_Hector.zip"');
    header('Content-Length: ' . filesize($tmpFile));
    header('Cache-Control: no-cache, no-store');
    readfile($tmpFile);
    unlink($tmpFile);
    exit;
}

// ──────────────────────────────────────────────────────────────────
//  Petición inválida
// ──────────────────────────────────────────────────────────────────
http_response_code(400);
exit('Tipo de descarga no válido. Usa ?type=word o ?type=zip');
