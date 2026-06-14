<?php
// ============================================================
//  BLOQUE 3 — Patrón Singleton
//  Escribe tu código en cada ejercicio. Se ejecuta abajo.
// ============================================================
ob_start();

// Crea la clase Contador como Singleton con:
// - propiedad privada $cuenta (empieza en 0)
// - incrementar() → suma 1
// - getCuenta()   → devuelve el valor
//
// Prueba:
// $c1 = Contador::getInstance();
// $c1->incrementar();
// $c1->incrementar();
// $c2 = Contador::getInstance();
// $c2->incrementar();
// echo $c1->getCuenta(); // 3
// echo $c2->getCuenta(); // 3 también (mismo objeto)



// Convierte LogSistema en Singleton.
// Pasos: (1) añade $instancia estática privada
//        (2) constructor privado
//        (3) crea getInstance()
//
// class LogSistema {
//     private $contadorMensajes = 0;
//     public function registrar($mensaje) {
//         $this->contadorMensajes++;
//         echo "Mensaje " . $this->contadorMensajes . ": $mensaje<br>";
//     }
// }



// Usa el LogSistema Singleton del ejercicio anterior.
// Crea ServicioVentas que NO herede de LogSistema sino que lo use por composición.
//
// $ventasManana = new ServicioVentas();
// $ventasManana->realizarVenta("Teclado");  // Mensaje 1: Venta: Teclado
// $ventasTarde = new ServicioVentas();
// $ventasTarde->realizarVenta("Ratón");     // Mensaje 2: Venta: Ratón (¡sigue la cuenta!)
//
// "Iniciando Sistema de Log" debe aparecer UNA SOLA VEZ.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Día 1 - Bloque 3: Patrón Singleton</title>
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
<span class="header-badge">📅 Día 1 — Bloque 3</span>
<h1>🔒 Patrón Singleton</h1>
<p class="duracion">⏱️ Duración estimada: 40–45 minutos</p>
<p>En el examen del 3er trimestre, el problema era que <strong>cada vez que se creaba un ServicioVentas, se creaba un nuevo LogSistema</strong> y el contador se reiniciaba. La solución: que solo exista <strong>una única instancia</strong> del logger, compartida por todos. Eso es el Singleton.</p>

<h2>📖 Los 3 pilares del Singleton</h2>
<pre><span class="kw">class</span> <span class="fn">MiSingleton</span> {
    <span class="cm">// 1. Propiedad ESTÁTICA PRIVADA que guarda la única instancia</span>
    <span class="kw">private static</span> <span class="var">$instancia</span> = <span class="kw">null</span>;

    <span class="cm">// 2. Constructor PRIVADO — impide hacer new desde fuera</span>
    <span class="kw">private function</span> <span class="fn">__construct</span>() {}

    <span class="cm">// 3. Método ESTÁTICO PÚBLICO para obtener la instancia</span>
    <span class="kw">public static function</span> <span class="fn">getInstance</span>() {
        <span class="kw">if</span> (<span class="kw">self</span>::<span class="var">$instancia</span> === <span class="kw">null</span>) {
            <span class="kw">self</span>::<span class="var">$instancia</span> = <span class="kw">new self</span>(); <span class="cm">// ← solo se crea UNA VEZ</span>
        }
        <span class="kw">return self</span>::<span class="var">$instancia</span>;
    }
}</pre>
<div class="info"><b>🧠 Palabras clave:</b> <code>private static $instancia</code> · <code>private function __construct</code> · <code>public static function getInstance</code> · <code>self::</code> · <code>new self()</code></div>

<hr class="separador">

<div class="ejercicio">
<span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 3.1 — Contador global con Singleton</h3>
<p>Clase <code>Contador</code> Singleton con <code>$cuenta</code>, <code>incrementar()</code> y <code>getCuenta()</code>.</p>
<pre><span class="var">$c1</span> = <span class="fn">Contador</span>::<span class="fn">getInstance</span>();
<span class="var">$c1</span>-><span class="fn">incrementar</span>(); <span class="var">$c1</span>-><span class="fn">incrementar</span>();
<span class="var">$c2</span> = <span class="fn">Contador</span>::<span class="fn">getInstance</span>();
<span class="var">$c2</span>-><span class="fn">incrementar</span>();
<span class="kw">echo</span> <span class="var">$c1</span>-><span class="fn">getCuenta</span>(); <span class="cm">// 3</span>
<span class="kw">echo</span> <span class="var">$c2</span>-><span class="fn">getCuenta</span>(); <span class="cm">// 3 también (mismo objeto)</span></pre>
<div class="warn"><b>⚠️ Clave:</b> Si $c2 muestra 1 en vez de 3, tu Singleton no funciona.</div>
</div>

<div class="ejercicio">
<span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 3.2 — Logger como Singleton (caso del examen)</h3>
<p>Convierte <code>LogSistema</code> en Singleton. Pasos: (1) propiedad estática <code>$instancia</code>, (2) constructor privado, (3) crear <code>getInstance()</code>.</p>
<pre><span class="cm">// ❌ CÓDIGO ORIGINAL (NO es Singleton todavía)</span>
<span class="kw">class</span> <span class="fn">LogSistema</span> {
    <span class="kw">private</span> <span class="var">$contadorMensajes</span> = <span class="num">0</span>;
    <span class="kw">public function</span> <span class="fn">__construct</span>() { <span class="kw">echo</span> <span class="str">"--- Iniciando Sistema de Log ---&lt;br&gt;"</span>; }
    <span class="kw">public function</span> <span class="fn">registrar</span>(<span class="var">$mensaje</span>) {
        <span class="var">$this</span>->contadorMensajes++;
        <span class="kw">echo</span> <span class="str">"Mensaje "</span> . <span class="var">$this</span>->contadorMensajes . <span class="str">": $mensaje&lt;br&gt;"</span>;
    }
}</pre>
</div>

<div class="ejercicio">
<span class="nivel dificil">🔴 DIFÍCIL</span>
<h3>Ejercicio 3.3 — Singleton + Composición combinados (replica del examen)</h3>
<p>Usa el <code>LogSistema</code> Singleton. Crea <code>ServicioVentas</code> que <strong>NO herede</strong> de LogSistema, sino que lo use por composición:</p>
<pre><span class="kw">class</span> <span class="fn">ServicioVentas</span> {
    <span class="cm">// ← propiedad para el logger</span>
    <span class="kw">public function</span> <span class="fn">__construct</span>() { <span class="cm">// ← obtener la instancia del Singleton</span> }
    <span class="kw">public function</span> <span class="fn">realizarVenta</span>(<span class="var">$producto</span>) { <span class="cm">// ← usar el logger</span> }
}</pre>
<div class="tip"><b>✅ Si funciona:</b> "Iniciando Sistema de Log" aparece UNA SOLA VEZ, y el contador sigue de 1 a 2 sin reiniciarse.</div>
<p><strong>Resultado esperado:</strong> <code>--- Iniciando Sistema de Log --- | Mensaje 1: Venta realizada: Teclado | Mensaje 2: Venta realizada: Ratón</code></p>
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
