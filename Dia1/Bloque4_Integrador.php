<?php
// ============================================================
//  BLOQUE 4 — Ejercicio Integrador del Día
//  Escribe todo el sistema aquí arriba. Se ejecuta abajo.
// ============================================================
ob_start();

// ─── Parte A: Clase Notificacion ──────────────────────────
// Propiedades privadas: $destinatario, $asunto, $coste (calculado), $tasaEnvio (0.05)
// Constructor calcula: $coste = strlen($asunto) * $tasaEnvio
// getCoste()   → "0.75€"
// getResumen() → "Para: Juan — Asunto: Reunión — Coste: 0.40€"



// ─── Parte B: NotificacionUrgente extends Notificacion ────
// Añade $prioridad (1-5). Constructor llama parent::__construct().
// Getter y setter para $prioridad.



// ─── Parte C: RegistroNotificaciones (Singleton) ──────────
// $historial (array vacío)
// registrar($notificacion)  → añade al historial
// getTotalRegistros()       → count del historial
// getCosteTotal()           → suma de costes de todas las notificaciones



// ─── Parte D: Departamento (Composición, NO herencia) ─────
// $nombre, $registro → RegistroNotificaciones::getInstance()
// enviarNotificacion($notificacion) → registra y hace echo



// ─── Parte E: Programa principal ──────────────────────────
// 1. Crea departamentos "RRHH" y "Marketing"
// 2. RRHH envía 2 notificaciones (una normal, una urgente)
// 3. Marketing envía 1 notificación
// 4. Muestra el total de notificaciones registradas (debe ser 3)
// 5. Crea función filtrarUrgentes($historial) → devuelve cuántas son NotificacionUrgente



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Día 1 - Bloque 4: Ejercicio Integrador</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}
h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}
h2{color:#283593;margin:25px 0 12px;font-size:1.4em}
h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}
p{margin:8px 0 12px}
pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:0.92em;line-height:1.5;margin:12px 0}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:0.9em;color:#283593}
.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}
.tip b{color:#2e7d32}
.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}
.warn b{color:#e65100}
.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}
.info b{color:#1565c0}
.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}
.ejercicio h3{color:#1A237E;margin-top:0}
.ejercicio .nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:0.8em;font-weight:bold;margin-bottom:8px}
.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}
.duracion{color:#78909c;font-size:0.9em;font-style:italic}
.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}
ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}
.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:0.85em;margin-bottom:8px}
</style>
<link rel="stylesheet" href="../assets/aula-profesor.css">
</head><body>
<a class="back" href="index.php">← Volver al Día 1</a>
<span class="header-badge">📅 Día 1 — Bloque 4</span>
<h1>🧩 Ejercicio Integrador del Día</h1>
<p class="duracion">⏱️ Duración estimada: 30–40 minutos</p>

<p>Este ejercicio combina <strong>todo lo que has trabajado hoy</strong>: bucles/arrays (Bloque 0), clases con constructor calculado y getters formateados (Bloque 1), composición (Bloque 2) y Singleton (Bloque 3). Es un escenario nuevo para que apliques los conceptos, no memorices respuestas.</p>

<hr class="separador">

<div class="ejercicio">
<span class="nivel dificil">🔴 EJERCICIO FINAL DEL DÍA</span>
<h3>Sistema de Notificaciones de una Empresa</h3>

<p>Una empresa necesita un sistema de notificaciones que registre todos los mensajes enviados. Varios departamentos (RRHH, Marketing, Soporte) envían notificaciones, y todos deben compartir el mismo registro central.</p>

<h3>Parte A — Clase Notificacion (POO básica)</h3>
<p>Crea una clase <code>Notificacion</code> con:</p>
<ul>
<li>Propiedades privadas: <code>$destinatario</code>, <code>$asunto</code>, <code>$coste</code> (calculado), <code>$tasaEnvio</code> (por defecto 0.05€ por carácter del asunto)</li>
<li>Constructor que reciba destinatario y asunto. El <code>$coste</code> se calcula dentro del constructor como: <code>strlen($asunto) * $tasaEnvio</code></li>
<li>Getter <code>getCoste()</code> que devuelva el coste con formato: <code>"0.75€"</code></li>
<li>Getter <code>getResumen()</code> que devuelva: <code>"Para: Juan — Asunto: Reunión — Coste: 0.40€"</code></li>
</ul>

<h3>Parte B — Subclase NotificacionUrgente</h3>
<p>Crea una clase <code>NotificacionUrgente</code> que herede de <code>Notificacion</code> y:</p>
<ul>
<li>Añada propiedad privada <code>$prioridad</code> (1 a 5)</li>
<li>Constructor que llame a <code>parent::__construct()</code> y asigne prioridad</li>
<li>Getter y setter para prioridad</li>
</ul>

<h3>Parte C — RegistroNotificaciones (Singleton)</h3>
<p>Crea una clase <code>RegistroNotificaciones</code> que sea <strong>Singleton</strong> y tenga:</p>
<ul>
<li>Propiedad privada <code>$historial</code> (array vacío)</li>
<li>Método <code>registrar($notificacion)</code>: añade la notificación al historial</li>
<li>Método <code>getTotalRegistros()</code>: devuelve cuántas notificaciones hay</li>
<li>Método <code>getCosteTotal()</code>: recorre el historial y suma los costes</li>
</ul>

<h3>Parte D — Departamento (Composición, NO herencia)</h3>
<p>Crea una clase <code>Departamento</code> con:</p>
<ul>
<li>Propiedad privada <code>$nombre</code> (ej: "RRHH")</li>
<li>Propiedad privada <code>$registro</code> → usa <code>RegistroNotificaciones::getInstance()</code></li>
<li>Método <code>enviarNotificacion($notificacion)</code>: registra la notificación en el registro compartido y muestra un echo</li>
</ul>
<div class="warn"><b>⚠️ Departamento NO hereda de RegistroNotificaciones.</b> Usa composición: TIENE un registro como propiedad. Exactamente como ServicioVentas tenía un Logger en el examen.</div>

<h3>Parte E — Programa principal (Arrays + Funciones)</h3>
<p>En el programa principal:</p>
<ol>
<li>Crea 2 departamentos: "RRHH" y "Marketing"</li>
<li>Desde RRHH, envía 2 notificaciones (una normal, una urgente)</li>
<li>Desde Marketing, envía 1 notificación</li>
<li>Muestra el total de notificaciones registradas (debe ser 3)</li>
<li>Crea una <strong>función</strong> (no método) <code>filtrarUrgentes($historial)</code> que reciba un array de notificaciones y devuelva cuántas son de tipo NotificacionUrgente (usa <code>instanceof</code>)</li>
</ol>
<p><strong>Resultado esperado:</strong> <code>RRHH envía: Para Ana — Asunto: Reunión — Coste: 0.40€ | RRHH envía: Para Luis — Asunto: Incidencia urgente — Coste: 0.85€ | Marketing envía: Para Marta — Asunto: Campaña — Coste: 0.35€ | Total registradas: 3 | Urgentes: 1</code></p>

<hr class="separador">
<div class="tip"><b>🎯 Checklist de conceptos que has usado:</b>
<br>☐ Constructor con cálculos internos (coste = strlen * tasa)
<br>☐ Getter con formato (coste + "€")
<br>☐ Herencia con parent:: (NotificacionUrgente)
<br>☐ Singleton (RegistroNotificaciones)
<br>☐ Composición (Departamento TIENE un registro, no ES un registro)
<br>☐ Array de objetos (historial)
<br>☐ Función suelta que procesa array de objetos (filtrarUrgentes)
<br><br>Si has marcado todo ☑, has completado el Día 1. ¡Bien hecho! 💪</div>
</div>

<div style="background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0">
    <h2 style="color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em">⚡ Tu salida (escribe tu código al inicio del archivo)</h2>
    <?php if (trim(strip_tags($salidaEjercicios)) === ''): ?>
        <p style="color:#64748b;font-style:italic">Todavía no hay código. Escribe tu solución al principio del archivo .php y recarga.</p>
    <?php else: ?>
        <?= $salidaEjercicios ?>
    <?php endif; ?>
</div>

<script src="../assets/aula-profesor.js"></script>
</body></html>
