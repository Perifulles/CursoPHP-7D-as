<?php
// ============================================================
//  BLOQUE 0 — Calentamiento: Bucles y Arrays
//  Escribe tu código en cada ejercicio. Se ejecuta abajo.
// ============================================================
ob_start();

// $numeros = [3, 12, 7, 20, 5, 8, 15, 2, 33, 44];
// Recorre con foreach y muestra solo los pares + total.

// $productos = ["Teclado" => 29.99, "Ratón" => 15.50, "Monitor" => 249.00,
//               "Auriculares" => 45.00, "Webcam" => 62.30];
// Encuentra el más caro y el más barato SIN usar max()/min().

// $nombres = ["Ana","Pedro","Elena","Óscar","María","Irene","Carlos","Úrsula"];
// Muestra solo los que empiezan por vocal + total.

// Genera la tabla del 1 al 5 con dos bucles for anidados.

$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Día 1 - Bloque 0: Calentamiento Bucles y Arrays</title>
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
.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}
.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}
.zona-practica h3{color:#7dd3fc;margin:14px 0 6px;font-size:1em}
.zona-practica hr{border:none;border-top:1px solid #334155;margin:14px 0}
.zona-practica output-empty{color:#64748b;font-style:italic}
</style>
<link rel="stylesheet" href="../assets/aula-profesor.css">
</head><body>
<a class="back" href="index.php">← Volver al Día 1</a>
<span class="header-badge">📅 Día 1 — Bloque 0</span>
<h1>🔥 Calentamiento: Bucles y Arrays</h1>
<p class="duracion">⏱️ Duración estimada: 15–20 minutos</p>
<p>Antes de meternos con objetos, vamos a asegurarnos de que los <strong>fundamentos del 1er trimestre</strong> están sólidos. Estos ejercicios deben salir rápido y sin dudar. Si algo no sale en 5 minutos, apúntalo: es un punto débil que hay que trabajar.</p>
<div class="tip"><b>📌 Regla del bloque:</b> Usa solo bucles (for, while, foreach) y lógica propia. Nada de funciones de PHP como max(), min(), array_filter(), sort(). El objetivo es que tú controles la lógica, no PHP.</div>
<hr class="separador">

<div class="ejercicio">
<span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 0.1 — Filtrar pares</h3>
<p>Dado el siguiente array:</p>
<pre><span class="var">$numeros</span> = [<span class="num">3</span>, <span class="num">12</span>, <span class="num">7</span>, <span class="num">20</span>, <span class="num">5</span>, <span class="num">8</span>, <span class="num">15</span>, <span class="num">2</span>, <span class="num">33</span>, <span class="num">44</span>];</pre>
<p>Recórrelo con un <code>foreach</code> y muestra <strong>solo los números pares</strong>. Además, al final muestra cuántos pares había en total.</p>
<p><strong>Resultado esperado:</strong> <code>12, 20, 8, 2, 44 → Total pares: 5</code></p>
</div>

<div class="ejercicio">
<span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 0.2 — Encontrar el producto más caro</h3>
<p>Dado este array asociativo de productos con sus precios:</p>
<pre><span class="var">$productos</span> = [
    <span class="str">"Teclado"</span>    => <span class="num">29.99</span>,
    <span class="str">"Ratón"</span>      => <span class="num">15.50</span>,
    <span class="str">"Monitor"</span>    => <span class="num">249.00</span>,
    <span class="str">"Auriculares"</span>=> <span class="num">45.00</span>,
    <span class="str">"Webcam"</span>     => <span class="num">62.30</span>
];</pre>
<p>Recórrelo con <code>foreach($productos as $nombre => $precio)</code> y encuentra <strong>el producto más caro</strong> y <strong>el más barato</strong>. <strong>Sin usar max() ni min().</strong></p>
<p><strong>Resultado esperado:</strong> <code>Más caro: Monitor (249€) — Más barato: Ratón (15.50€)</code></p>
</div>

<div class="ejercicio">
<span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 0.3 — Filtrar nombres por vocal</h3>
<p>Dado este array:</p>
<pre><span class="var">$nombres</span> = [<span class="str">"Ana"</span>, <span class="str">"Pedro"</span>, <span class="str">"Elena"</span>, <span class="str">"Óscar"</span>, <span class="str">"María"</span>, <span class="str">"Irene"</span>, <span class="str">"Carlos"</span>, <span class="str">"Úrsula"</span>];</pre>
<p>Muestra <strong>solo los nombres que empiezan por vocal</strong>. Al final, muestra cuántos empezaban por vocal.</p>
<div class="info"><b>💡 Pista:</b> Cuidado con las vocales con tilde (Ó, Ú). Puedes meter en tu array de vocales las versiones con y sin tilde: <code>["A","E","I","O","U","Á","É","Í","Ó","Ú"]</code></div>
</div>

<div class="ejercicio">
<span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 0.4 — Tabla de multiplicar con bucles anidados</h3>
<p>Genera una tabla de multiplicar del 1 al 5 usando <strong>dos bucles for anidados</strong>.</p>
<div class="info"><b>💡 Pista:</b> El bucle exterior controla las filas (1 a 5), el interior las columnas (1 a 5). Después de cada fila completa, haz un salto de línea con <code>&lt;br&gt;</code>.</div>
</div>

<hr class="separador">
<div class="tip"><b>✅ ¿Todo ha ido rápido?</b> Perfecto. Pasa al Bloque 1. Si algún ejercicio ha costado más de 5 minutos, apúntalo y repásalo.</div>

<!-- ═══════════════════════════════════════════════════════ -->
<!--  ZONA DE PRÁCTICA — Tu código PHP se ejecuta aquí     -->
<!-- ═══════════════════════════════════════════════════════ -->
<div class="zona-practica">
    <h2>⚡ Tu salida (escribe tu código al inicio del archivo)</h2>
    <?php if (trim(strip_tags($salidaEjercicios)) === ''): ?>
        <p style="color:#64748b;font-style:italic">Todavía no hay código. Escribe tu solución al principio del archivo .php y recarga.</p>
    <?php else: ?>
        <?= $salidaEjercicios ?>
    <?php endif; ?>
</div>

<script src="../assets/aula-profesor.js"></script>
</body></html>
