<?php
// ============================================================
//  BLOQUE 2 — Composición vs Herencia
//  Escribe tu código en cada ejercicio. Se ejecuta abajo.
// ============================================================
ob_start();

// Para cada caso, escribe con echo si es "HERENCIA ✅" o "COMPOSICIÓN ❌ → debería TENER un..."
// 1. class Perro extends Animal
// 2. class Factura extends Impresora
// 3. class CocheElectrico extends Coche
// 4. class Restaurante extends SistemaReservas
// 5. class Alumno extends Persona
// 6. class Tienda extends BaseDeDatos



// Quita el extends. Añade propiedad $impresora.
// Recíbela en el constructor. Usa $this->impresora->imprimir(...).
//
// class Impresora { ... }
// class Informe { ... } ← sin extends, con composición
//
// $imp = new Impresora();
// $inf = new Informe("Ventas Q1", "Resumen trimestral", $imp);
// $inf->generarInforme(); // Imprimiendo: Ventas Q1: Resumen trimestral



// Refactoriza para usar composición.
// Luego prueba que DOS pedidos que compartan el mismo EmailSender
// mantienen el conteo global de emails.
//
// $sender = new EmailSender();
// $p1 = new Pedido("ana@email.com", "Teclado", $sender);
// $p2 = new Pedido("luis@email.com", "Ratón", $sender);
// $p1->confirmar(); // Email #1
// $p2->confirmar(); // Email #2 (¡mismo sender, sigue la cuenta!)
// echo $sender->getTotalEnviados(); // 2



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Día 1 - Bloque 2: Composición vs Herencia</title>
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
<span class="header-badge">📅 Día 1 — Bloque 2</span>
<h1>🔀 Composición vs Herencia</h1>
<p class="duracion">⏱️ Duración estimada: 40–45 minutos</p>
<p>Este concepto fue la clave del <strong>Ejercicio 1 del examen del 3er trimestre</strong>. ServicioVentas heredaba de LogSistema, pero eso era un error de diseño. ¿Por qué? Porque ServicioVentas NO es un tipo de LogSistema.</p>

<h2>📖 La regla de oro: ¿"Es un" o "Tiene un"?</h2>
<div class="info"><b>🧠 ¿"X ES un tipo de Y"?</b><br>→ SÍ: usa <strong>herencia</strong> (extends).<br>→ NO: usa <strong>composición</strong> (una propiedad que contenga un objeto de Y).</div>

<ul>
<li>¿Un Coche <em>es un</em> Vehiculo? <strong>SÍ</strong> → <code>class Coche extends Vehiculo</code> ✅</li>
<li>¿Un ServicioVentas <em>es un</em> Logger? <strong>NO</strong>, un servicio de ventas <em>tiene</em> un logger → composición ✅</li>
</ul>

<h2>📖 ¿Cómo se ve la composición en código?</h2>
<pre><span class="cm">// BIEN (composición)</span>
<span class="kw">class</span> <span class="fn">ServicioVentas</span> {
    <span class="kw">private</span> <span class="var">$logger</span>;  <span class="cm">// ← TIENE un logger como propiedad</span>

    <span class="kw">public function</span> <span class="fn">__construct</span>(<span class="var">$logger</span>) {
        <span class="var">$this</span>->logger = <span class="var">$logger</span>;
    }

    <span class="kw">public function</span> <span class="fn">realizarVenta</span>(<span class="var">$producto</span>) {
        <span class="var">$this</span>->logger-><span class="fn">registrar</span>(<span class="str">"Venta: $producto"</span>); <span class="cm">// ← usa el objeto interno</span>
    }
}</pre>
<div class="tip"><b>📌 Fíjate:</b> No hay <code>extends</code>. En su lugar hay una propiedad <code>$logger</code> que se usa con <code>$this->logger->metodo()</code>.</div>

<hr class="separador">

<div class="ejercicio">
<span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 2.1 — Identificar errores de diseño</h3>
<p>Para cada caso, decide si la herencia está bien usada o si debería ser composición:</p>
<ol>
<li><code>class Perro extends Animal</code></li>
<li><code>class Factura extends Impresora</code></li>
<li><code>class CocheElectrico extends Coche</code></li>
<li><code>class Restaurante extends SistemaReservas</code></li>
<li><code>class Alumno extends Persona</code></li>
<li><code>class Tienda extends BaseDeDatos</code></li>
</ol>
</div>

<div class="ejercicio">
<span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 2.2 — Refactorizar: Informe que hereda de Impresora</h3>
<p>Un Informe NO es una Impresora; un informe <em>usa</em> una impresora. <strong>Refactorízalo para usar composición:</strong></p>
<pre><span class="cm">// ❌ CÓDIGO MALO — Refactoriza esto</span>
<span class="kw">class</span> <span class="fn">Impresora</span> {
    <span class="kw">public function</span> <span class="fn">imprimir</span>(<span class="var">$texto</span>) { <span class="kw">echo</span> <span class="str">"Imprimiendo: $texto&lt;br&gt;"</span>; }
}
<span class="kw">class</span> <span class="fn">Informe</span> <span class="kw">extends</span> <span class="fn">Impresora</span> {
    <span class="kw">private</span> <span class="var">$titulo</span>; <span class="kw">private</span> <span class="var">$contenido</span>;
    <span class="kw">public function</span> <span class="fn">__construct</span>(<span class="var">$titulo</span>, <span class="var">$contenido</span>) { ... }
    <span class="kw">public function</span> <span class="fn">generarInforme</span>() { <span class="var">$this</span>-><span class="fn">imprimir</span>(...); }
}</pre>
<div class="info"><b>💡 Pista:</b> Quita el extends. Añade <code>$impresora</code>. Recíbela en el constructor. Usa <code>$this->impresora->imprimir(...)</code>.</div>
</div>

<div class="ejercicio">
<span class="nivel dificil">🔴 DIFÍCIL</span>
<h3>Ejercicio 2.3 — Refactorizar: Pedido que hereda de EmailSender</h3>
<pre><span class="cm">// ❌ CÓDIGO MALO</span>
<span class="kw">class</span> <span class="fn">EmailSender</span> {
    <span class="kw">private</span> <span class="var">$emailsEnviados</span> = <span class="num">0</span>;
    <span class="kw">public function</span> <span class="fn">enviar</span>(<span class="var">$destinatario</span>, <span class="var">$asunto</span>, <span class="var">$cuerpo</span>) {
        <span class="var">$this</span>->emailsEnviados++;
        <span class="kw">echo</span> <span class="str">"Email #"</span> . <span class="var">$this</span>->emailsEnviados . <span class="str">" enviado a $destinatario: $asunto&lt;br&gt;"</span>;
    }
    <span class="kw">public function</span> <span class="fn">getTotalEnviados</span>() { <span class="kw">return</span> <span class="var">$this</span>->emailsEnviados; }
}
<span class="kw">class</span> <span class="fn">Pedido</span> <span class="kw">extends</span> <span class="fn">EmailSender</span> { ... }</pre>
<p>Después de refactorizar, prueba que <strong>dos Pedidos que compartan el mismo EmailSender</strong> mantengan el conteo global.</p>
<p><strong>Resultado esperado:</strong> <code>Email #1 enviado a ana@email.com: Confirmación | Email #2 enviado a luis@email.com: Confirmación | Total enviados: 2</code></p>
</div>

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
