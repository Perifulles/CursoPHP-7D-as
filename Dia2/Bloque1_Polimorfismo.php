<?php
ob_start();

// Crea clase Animal con método hacerSonido() que devuelva "..."
// Crea Perro extends Animal → hacerSonido() devuelve "Guau"
// Crea Gato extends Animal → hacerSonido() devuelve "Miau"
//
// $animales = [new Perro(), new Gato(), new Perro()];
// foreach ($animales as $a) { echo $a->hacerSonido() . "<br>"; }



// Crea Empleado con calcularSueldo($horasTrabajadas) que devuelva horas * 15 (tarifa base).
// Crea EmpleadoSenior extends Empleado: sobrescribe calcularSueldo()
// usando parent::calcularSueldo($horasTrabajadas) + un bonus fijo de 200€.
//
// $junior = new Empleado();
// echo $junior->calcularSueldo(160);  // 2400
// $senior = new EmpleadoSenior();
// echo $senior->calcularSueldo(160);  // 2600 (2400 base + 200 bonus)



// Clase Vehiculo con calcularAlquiler($dias) → $this->precioDia * $dias
// Clase Coche extends Vehiculo: si tipoCombustible es "Diésel", añade 10% extra al coste base.
// Clase Motocicleta extends Vehiculo: si incluyeCasco es true, añade 10€ al coste base.
//
// AMBAS deben usar parent::calcularAlquiler($dias) para obtener el coste base.
//
// $coche = new Coche("Seat", "León", 40, "Diésel");
// echo $coche->calcularAlquiler(5);  // 220 (200 base + 10% = 220)
//
// $moto = new Motocicleta("Honda", "CBR", 25, true);
// echo $moto->calcularAlquiler(3);   // 85 (75 base + 10€ casco)



// Clase Producto con setPrecio($precio) que simplemente asigne el precio.
// Clase ProductoRebajado extends Producto: sobrescribe setPrecio($precio)
// para que al precio que le pases le reste un 10% antes de guardarlo.
// (NO usar parent:: aquí, simplemente: $this->precio = $precio * 0.9)
//
// $normal = new Producto("Teclado", 50);
// $normal->setPrecio(100);
// echo $normal->getPrecio();  // 100€
//
// $rebajado = new ProductoRebajado("Ratón", 30);
// $rebajado->setPrecio(100);
// echo $rebajado->getPrecio();  // 90€ (100 - 10%)



// Reutiliza Vehiculo, Coche y Motocicleta del ejercicio 1.3.
// Crea un array $flota con al menos 4 vehículos (mezcla coches y motos).
// Recórrelo con foreach y muestra para cada uno:
//   "Seat León → Alquiler 5 días: 220€"
// Después, calcula y muestra el coste total de alquilar toda la flota 5 días.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Día 2 - Bloque 1: Polimorfismo</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style>
<link rel="stylesheet" href="../assets/aula-profesor.css">
</head><body>
<a class="back" href="index.php">← Volver al Día 2</a>
<span class="header-badge">📅 Día 2 — Bloque 1</span>
<h1>🔀 Polimorfismo</h1>
<p class="duracion">⏱️ Duración estimada: 60–75 minutos</p>

<p>El polimorfismo significa que <strong>el mismo método tiene comportamiento diferente según la subclase</strong>. Ya lo has usado sin saberlo: cada vez que Coche y Motocicleta tenían un método con el mismo nombre pero hacían cosas distintas, eso era polimorfismo.</p>

<h2>📖 Tres niveles de polimorfismo</h2>

<h3>Nivel 1 — Sobrescritura pura (reemplazar completamente)</h3>
<pre><span class="kw">class</span> <span class="fn">Animal</span> {
    <span class="kw">public function</span> <span class="fn">hacerSonido</span>() { <span class="kw">return</span> <span class="str">"..."</span>; }
}
<span class="kw">class</span> <span class="fn">Perro</span> <span class="kw">extends</span> <span class="fn">Animal</span> {
    <span class="kw">public function</span> <span class="fn">hacerSonido</span>() { <span class="kw">return</span> <span class="str">"Guau"</span>; } <span class="cm">// ← reemplaza completamente</span>
}</pre>

<h3>Nivel 2 — Reutilizar con parent:: (lo que pedía el examen 3er trim)</h3>
<pre><span class="kw">class</span> <span class="fn">Vehiculo</span> {
    <span class="kw">public function</span> <span class="fn">calcularAlquiler</span>(<span class="var">$dias</span>) {
        <span class="kw">return</span> <span class="var">$this</span>->precioDia * <span class="var">$dias</span>;
    }
}
<span class="kw">class</span> <span class="fn">Coche</span> <span class="kw">extends</span> <span class="fn">Vehiculo</span> {
    <span class="kw">public function</span> <span class="fn">calcularAlquiler</span>(<span class="var">$dias</span>) {
        <span class="var">$base</span> = <span class="fn">parent</span>::<span class="fn">calcularAlquiler</span>(<span class="var">$dias</span>); <span class="cm">// ← reutiliza el padre</span>
        <span class="kw">return</span> <span class="var">$base</span> * <span class="num">1.1</span>;  <span class="cm">// ← añade su lógica propia</span>
    }
}</pre>
<div class="warn"><b>⚠️ parent:: es la clave del examen.</b> La subclase NO repite el cálculo del padre. Llama a <code>parent::metodo()</code> para obtener el resultado base y luego le añade su extra.</div>

<h3>Nivel 3 — Condiciones según propiedad de la subclase</h3>
<pre><span class="kw">class</span> <span class="fn">Coche</span> <span class="kw">extends</span> <span class="fn">Vehiculo</span> {
    <span class="kw">public function</span> <span class="fn">calcularAlquiler</span>(<span class="var">$dias</span>) {
        <span class="var">$base</span> = <span class="fn">parent</span>::<span class="fn">calcularAlquiler</span>(<span class="var">$dias</span>);
        <span class="kw">if</span> (<span class="var">$this</span>->tipoCombustible === <span class="str">"Diésel"</span>) {
            <span class="kw">return</span> <span class="var">$base</span> * <span class="num">1.1</span>;  <span class="cm">// ← solo diésel tiene recargo</span>
        }
        <span class="kw">return</span> <span class="var">$base</span>;
    }
}</pre>

<hr class="separador">

<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 1.1 — Sobrescritura básica: Animal → Perro / Gato</h3>
<p>Crea <code>Animal</code> con <code>hacerSonido()</code> → <code>"..."</code>. Subclases <code>Perro</code> (→ "Guau") y <code>Gato</code> (→ "Miau"). Crea un array mixto y recórrelo llamando al mismo método.</p>
</div>

<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 1.2 — parent:: para reutilizar</h3>
<p>Clase <code>Empleado</code> con <code>calcularSueldo($horas)</code> → horas × 15€. Subclase <code>EmpleadoSenior</code> sobrescribe usando <code>parent::</code> + bonus de 200€.</p>
<pre>$junior->calcularSueldo(160) <span class="cm">// 2400</span>
$senior->calcularSueldo(160) <span class="cm">// 2600 (2400 + 200)</span></pre>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.3 — Caso exacto del examen 3er trim (Vehículos)</h3>
<p>Clase <code>Vehiculo</code> con propiedades <code>$marca</code>, <code>$modelo</code>, <code>$precioDia</code> y método <code>calcularAlquiler($dias)</code>.</p>
<p><code>Coche</code>: añade <code>$tipoCombustible</code>. Si es "Diésel", +10% al coste base.</p>
<p><code>Motocicleta</code>: añade <code>$incluyeCasco</code>. Si es true, +10€ al coste base.</p>
<p>Ambas usan <code>parent::calcularAlquiler($dias)</code>.</p>
<pre>$coche = new Coche("Seat", "León", 40, "Diésel");
echo $coche->calcularAlquiler(5);  <span class="cm">// 220 (200 + 10%)</span>
$moto = new Motocicleta("Honda", "CBR", 25, true);
echo $moto->calcularAlquiler(3);   <span class="cm">// 85 (75 + 10€)</span></pre>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.4 — Setter polimórfico (patrón examen 2º trim)</h3>
<p>Clase <code>Producto</code> con <code>setPrecio($precio)</code> que asigne directamente. Subclase <code>ProductoRebajado</code> que sobrescriba para restar 10% antes de guardar. Incluye <code>getPrecio()</code> con "€".</p>
<pre>$normal->setPrecio(100);   echo $normal->getPrecio();   <span class="cm">// 100€</span>
$rebajado->setPrecio(100); echo $rebajado->getPrecio(); <span class="cm">// 90€</span></pre>
</div>

<div class="ejercicio"><span class="nivel dificil">🔴 DIFÍCIL</span>
<h3>Ejercicio 1.5 — Array mixto con polimorfismo</h3>
<p>Crea un array <code>$flota</code> con 4+ vehículos (del Ej 1.3). Recórrelo mostrando info + alquiler 5 días. Calcula el coste total de toda la flota.</p>
<p><strong>Resultado esperado:</strong> <code>Seat León → 220€ | Honda CBR → 85€ | Toyota Yaris → 175€ | Yamaha MT-07 → 150€ | Total flota: 630€</code></p>
</div>

<hr class="separador">
<div class="tip"><b>✅ Resumen:</b> Has practicado sobrescritura pura, parent:: con cálculo base + extra, condiciones en override, y setter polimórfico (2º trim). Los dos patrones de examen están cubiertos.</div>

<div class="zona-practica">
<h2>⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?>
<p style="color:#64748b;font-style:italic">Todavía no hay código. Escribe tu solución arriba y recarga.</p>
<?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>
</body></html>
