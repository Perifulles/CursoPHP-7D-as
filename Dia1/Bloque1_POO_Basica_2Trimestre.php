<?php
// ============================================================
//  BLOQUE 1 — POO Básica + Patrones del 2º Trimestre
//  Escribe tu código en cada ejercicio. Se ejecuta abajo.
// ============================================================
ob_start();

// Crea la clase Electrodomestico con propiedades privadas:
// $nombre, $precioBase, $precioFinal, $iva (defecto 0.21)
// Constructor calcula: $precioFinal = $precioBase + ($precioBase * $iva)
// getNombre() → mayúsculas | getPrecioFinal() → "484€"
//
// $lavadora = new Electrodomestico("Lavadora Samsung", 400);
// echo $lavadora->getNombre();      // LAVADORA SAMSUNG
// echo $lavadora->getPrecioFinal(); // 484€



// Crea Televisor extends Electrodomestico
// Añade: $pulgadas, $resolucion
// Constructor llama a parent::__construct()
// Getter y setter para $pulgadas
//
// $tele = new Televisor("LG OLED", 800, 55, "4K");
// echo $tele->getNombre();        // LG OLED
// echo $tele->getPrecioFinal();   // 968€
// echo $tele->getPulgadas();      // 55



// Crea $catalogo con al menos 5 objetos (mezcla Electrodomestico y Televisor)
// Recorre con foreach y muestra nombre + precio final de cada uno



// function clasificarPorPrecio($catalogo): array
// Devuelve ["economicos" => N, "medio" => N, "premium" => N]
// ≤100€ = económico | 100-500€ = medio | >500€ = premium
// NO imprime nada, solo return. El echo va FUERA.



// function cambiarPulgadas($catalogo, $nombreBuscado, $nuevasPulgadas): bool
// Busca el Televisor por nombre, cambia las pulgadas con el setter, devuelve true.
// Si no lo encuentra, devuelve false.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Día 1 - Bloque 1: POO Básica + Patrones 2º Trimestre</title>
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
</style>
<link rel="stylesheet" href="../assets/aula-profesor.css">
</head><body>
<a class="back" href="index.php">← Volver al Día 1</a>
<span class="header-badge">📅 Día 1 — Bloque 1</span>
<h1>🏗️ POO Básica + Patrones del 2º Trimestre</h1>
<p class="duracion">⏱️ Duración estimada: 50–60 minutos</p>
<p>En el examen del 2º trimestre, Vicente pedía cosas que parecen sencillas pero tienen trampas concretas: constructores que calculan valores por dentro, getters que formatean la salida, y funciones (no métodos de clase) que procesan arrays de objetos.</p>

<h2>📖 Concepto 1: Constructor con cálculos internos</h2>
<pre><span class="cm">// El precio NO se pasa directamente: se calcula dentro</span>
<span class="kw">public function</span> <span class="fn">__construct</span>(<span class="var">$nombre</span>, <span class="var">$importe</span>, <span class="var">$iva</span> = <span class="num">0.21</span>) {
    <span class="var">$this</span>->nombre = <span class="var">$nombre</span>;
    <span class="var">$this</span>->iva = <span class="var">$iva</span>;
    <span class="var">$this</span>->precio = <span class="var">$importe</span> + (<span class="var">$importe</span> * <span class="var">$iva</span>); <span class="cm">// ← cálculo interno</span>
}</pre>
<div class="warn"><b>⚠️ Ojo:</b> La propiedad <code>$precio</code> NO es un parámetro del constructor. Se calcula dentro.</div>

<h2>📖 Concepto 2: Getters con formato de salida</h2>
<pre><span class="kw">public function</span> <span class="fn">getPrecio</span>() {
    <span class="kw">return</span> <span class="var">$this</span>->precio . <span class="str">"€"</span>; <span class="cm">// ← formato añadido</span>
}</pre>

<h2>📖 Concepto 3: Funciones que procesan arrays de objetos</h2>
<pre><span class="kw">function</span> <span class="fn">clasificarProductos</span>(<span class="var">$lista</span>) {
    <span class="kw">foreach</span> (<span class="var">$lista</span> <span class="kw">as</span> <span class="var">$producto</span>) {
        <span class="var">$precio</span> = <span class="var">$producto</span>-><span class="fn">getPrecio</span>();
    }
    <span class="kw">return</span> <span class="var">$resultado</span>; <span class="cm">// Devolver datos, NO imprimir</span>
}</pre>
<div class="warn"><b>⚠️ Importante:</b> La función <strong>devuelve</strong> con <code>return</code>. NO imprime nada con echo.</div>

<hr class="separador">

<div class="ejercicio">
<span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 1.1 — Clase Electrodomestico con constructor calculado</h3>
<p>Propiedades privadas: <code>$nombre</code>, <code>$precioBase</code>, <code>$precioFinal</code>, <code>$iva</code> (defecto 0.21). El constructor calcula <code>$precioFinal = $precioBase + ($precioBase * $iva)</code>.</p>
<p><code>getNombre()</code> devuelve en mayúsculas. <code>getPrecioFinal()</code> devuelve con <code>€</code> al final.</p>
<pre><span class="var">$lavadora</span> = <span class="kw">new</span> <span class="fn">Electrodomestico</span>(<span class="str">"Lavadora Samsung"</span>, <span class="num">400</span>);
<span class="kw">echo</span> <span class="var">$lavadora</span>-><span class="fn">getNombre</span>();      <span class="cm">// LAVADORA SAMSUNG</span>
<span class="kw">echo</span> <span class="var">$lavadora</span>-><span class="fn">getPrecioFinal</span>(); <span class="cm">// 484€</span></pre>
</div>

<div class="ejercicio">
<span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 1.2 — Subclase Televisor con herencia</h3>
<p><code>Televisor extends Electrodomestico</code>. Añade <code>$pulgadas</code> y <code>$resolucion</code>. Constructor llama a <code>parent::__construct()</code>.</p>
<pre><span class="var">$tele</span> = <span class="kw">new</span> <span class="fn">Televisor</span>(<span class="str">"LG OLED"</span>, <span class="num">800</span>, <span class="num">55</span>, <span class="str">"4K"</span>);
<span class="kw">echo</span> <span class="var">$tele</span>-><span class="fn">getPrecioFinal</span>();   <span class="cm">// 968€</span></pre>
</div>

<div class="ejercicio">
<span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.3 — Array de objetos + recorrido</h3>
<p>Crea <code>$catalogo</code> con al menos 5 objetos (mezcla de ambas clases). Recórrelo con foreach mostrando nombre y precio.</p>
</div>

<div class="ejercicio">
<span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.4 — Función clasificarPorPrecio (patrón examen 2º trim)</h3>
<p>Crea <code>clasificarPorPrecio($catalogo)</code> que <strong>devuelva</strong> (sin imprimir) un array con claves <code>"economicos"</code>, <code>"medio"</code> y <code>"premium"</code>.</p>
<div class="warn"><b>⚠️ Recuerda:</b> la función NO imprime. Solo return. El echo se hace FUERA.</div>
</div>

<div class="ejercicio">
<span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.5 — cambiarPulgadas (buscar y modificar con setter)</h3>
<p>Crea <code>cambiarPulgadas($catalogo, $nombreBuscado, $nuevasPulgadas)</code>: busca el Televisor, usa el setter, devuelve <code>true</code>/<code>false</code>.</p>
<div class="info"><b>💡 Pista:</b> <code>if ($obj->getNombre() == strtoupper($nombreBuscado))</code></div>
</div>

<hr class="separador">
<div class="tip"><b>✅ Resumen del bloque:</b> Has practicado los 3 patrones del 2º trimestre: constructor con cálculos, getters formateados, y funciones que procesan arrays de objetos.</div>

<div class="zona-practica">
    <h2>⚡ Tu salida (escribe tu código al inicio del archivo)</h2>
    <?php if (trim(strip_tags($salidaEjercicios)) === ''): ?>
        <p style="color:#64748b;font-style:italic">Todavía no hay código. Escribe tu solución al principio del archivo .php y recarga.</p>
    <?php else: ?>
        <?= $salidaEjercicios ?>
    <?php endif; ?>
</div>

<script src="../assets/aula-profesor.js"></script>

<div id="mendigo-btn" onclick="window.location.href='../sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="../images/mendigo.jpg" alt="Miguel"></div>
</body></html>
