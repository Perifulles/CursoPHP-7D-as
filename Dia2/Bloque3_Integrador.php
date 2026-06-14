<?php
ob_start();

// ═══════════════════════════════════════════════════════════
//  EJERCICIO INTEGRADOR DEL DÍA 2
//  Sistema de Gestión de Flota — JSON + Polimorfismo
// ═══════════════════════════════════════════════════════════

// ─── Parte A: Clases con polimorfismo ─────────────────────
// Crea la jerarquía de clases:
//
// Vehiculo (clase padre):
//   - Propiedades privadas: $marca, $modelo, $precioDia
//   - Constructor que reciba los 3 valores
//   - Getters para marca, modelo y precioDia
//   - Método calcularAlquiler($dias) → $this->precioDia * $dias
//
// Furgoneta extends Vehiculo:
//   - Propiedad privada: $capacidadToneladas
//   - Constructor con parent::
//   - Getter para capacidadToneladas
//   - Sobrescribe calcularAlquiler($dias): si capacidadToneladas > 3,
//     añade un recargo del 20% al coste base (usa parent::)
//
// Descapotable extends Vehiculo:
//   - Propiedad privada: $temporadaAlta (bool)
//   - Constructor con parent::
//   - Getter para temporadaAlta
//   - Sobrescribe calcularAlquiler($dias): si temporadaAlta es true,
//     añade 15€/día extra al coste base (usa parent::)



// ─── Parte B: Decodificar JSON ────────────────────────────
// Dado este JSON con la flota de vehículos, decodifícalo:
$jsonFlota = '[
  {"tipo":"Furgoneta","marca":"Mercedes","modelo":"Sprinter","precioDia":60,"capacidadToneladas":4.5},
  {"tipo":"Descapotable","marca":"Mazda","modelo":"MX-5","precioDia":55,"temporadaAlta":true},
  {"tipo":"Furgoneta","marca":"Ford","modelo":"Transit","precioDia":45,"capacidadToneladas":2.0},
  {"tipo":"Descapotable","marca":"BMW","modelo":"Z4","precioDia":75,"temporadaAlta":false},
  {"tipo":"Furgoneta","marca":"Renault","modelo":"Master","precioDia":50,"capacidadToneladas":3.5}
]';

// Decodifica el JSON y crea un array $flota de objetos.
// Según el campo "tipo", instancia Furgoneta o Descapotable.
// (Este es el mismo patrón del ejercicio 3 del examen: instanciación condicional)



// ─── Parte C: Recorrer y mostrar (polimorfismo en acción) ─
// Recorre $flota con foreach y muestra para cada vehículo:
//   "Mercedes Sprinter → Alquiler 7 días: 504€"
// (calcularAlquiler se comportará diferente según la subclase)



// ─── Parte D: Función de análisis (patrón 2º trim) ───────
// Crea una función (NO método) analizarFlota($flota, $dias) que
// reciba el array de objetos y un número de días, y DEVUELVA
// (sin imprimir) un array asociativo con:
//   "total" → coste total de alquilar toda la flota esos días
//   "masCaro" → nombre del vehículo más caro (marca + modelo)
//   "masBarato" → nombre del vehículo más barato



// ─── Parte E: Usar la función y mostrar resultados ────────
// $analisis = analizarFlota($flota, 7);
// echo "Coste total 7 días: " . $analisis["total"] . "€";
// echo "Más caro: " . $analisis["masCaro"];
// echo "Más barato: " . $analisis["masBarato"];



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Día 2 - Bloque 3: Ejercicio Integrador</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style>
<link rel="stylesheet" href="../assets/aula-profesor.css">
</head><body>
<a class="back" href="index.php">← Volver al Día 2</a>
<span class="header-badge">📅 Día 2 — Bloque 3</span>
<h1>🧩 Ejercicio Integrador: Gestión de Flota</h1>
<p class="duracion">⏱️ Duración estimada: 30–40 minutos</p>

<p>Este ejercicio combina <strong>todo lo del Día 2</strong>: clases con polimorfismo (Bloque 1) y procesamiento de JSON (Bloque 2). Además adelanta un concepto del Día 3: <strong>instanciación condicional</strong> (decidir qué clase crear según un campo de los datos). Es un mini-simulacro de los ejercicios 2, 3 y 4 del examen del 3er trimestre.</p>

<hr class="separador">

<div class="ejercicio">
<span class="nivel dificil">🔴 EJERCICIO FINAL DEL DÍA</span>
<h3>Sistema de Gestión de Flota</h3>

<h3>Parte A — Clases con polimorfismo</h3>
<p>Crea la jerarquía:</p>
<ul>
<li><code>Vehiculo</code>: $marca, $modelo, $precioDia + <code>calcularAlquiler($dias)</code></li>
<li><code>Furgoneta extends Vehiculo</code>: $capacidadToneladas. Si capacidad > 3 toneladas → +20% al coste base.</li>
<li><code>Descapotable extends Vehiculo</code>: $temporadaAlta (bool). Si es true → +15€/día extra.</li>
</ul>
<p>Ambas sobrescrituras usan <code>parent::calcularAlquiler($dias)</code>.</p>

<h3>Parte B — Decodificar JSON e instanciar objetos</h3>
<p>El JSON ya está definido en el código PHP (variable <code>$jsonFlota</code>). Decodifícalo y, <strong>según el campo "tipo"</strong>, crea el objeto correcto:</p>
<pre><span class="var">$datos</span> = <span class="fn">json_decode</span>(<span class="var">$jsonFlota</span>, <span class="kw">true</span>);
<span class="var">$flota</span> = [];
<span class="kw">foreach</span> (<span class="var">$datos</span> <span class="kw">as</span> <span class="var">$v</span>) {
    <span class="kw">if</span> (<span class="var">$v</span>[<span class="str">"tipo"</span>] === <span class="str">"Furgoneta"</span>) {
        <span class="cm">// new Furgoneta(...)</span>
    } <span class="kw">else</span> {
        <span class="cm">// new Descapotable(...)</span>
    }
}</pre>
<div class="warn"><b>⚠️ Esto es el mismo patrón que el Ejercicio 3 del examen</b> (instanciar Coche o Motocicleta según el enum). Aquí los datos vienen de JSON en vez de la base de datos, pero la lógica del if/switch es idéntica.</div>

<h3>Parte C — Recorrer y mostrar</h3>
<p>Recorre <code>$flota</code> y muestra para cada vehículo su info + alquiler a 7 días. Gracias al polimorfismo, <code>calcularAlquiler()</code> dará resultados diferentes para furgonetas pesadas y descapotables en temporada alta.</p>

<h3>Parte D — Función de análisis (patrón 2º trimestre)</h3>
<p>Función <code>analizarFlota($flota, $dias)</code> que <strong>devuelva</strong> (sin imprimir) un array con:</p>
<ul>
<li><code>"total"</code> → coste total de alquilar toda la flota</li>
<li><code>"masCaro"</code> → marca + modelo del vehículo más caro</li>
<li><code>"masBarato"</code> → marca + modelo del más barato</li>
</ul>

<h3>Parte E — Programa principal</h3>
<p>Llama a la función y muestra los resultados.</p>
<p><strong>Resultado esperado:</strong> <code>Mercedes Sprinter → Alquiler 7 días: 504€ | Mazda MX-5 → Alquiler 7 días: 490€ | Coste total 7 días: 2289€ | Más caro: Mercedes Sprinter | Más barato: Ford Transit</code></p>

<hr class="separador">
<div class="tip"><b>🎯 Checklist de conceptos usados:</b>
<br>☐ Herencia con parent:: en calcularAlquiler (polimorfismo)
<br>☐ Condiciones en override (capacidad > 3, temporadaAlta)
<br>☐ json_decode($json, true) para obtener array
<br>☐ Instanciación condicional según campo "tipo" (adelanto del Día 3)
<br>☐ Función suelta que recibe array de objetos y devuelve datos (patrón 2º trim)
<br>☐ Búsqueda de máximo/mínimo en array de objetos
<br><br>Si has completado todo ☑, el Día 2 está cerrado. ¡A por el Día 3! 💪</div>
</div>

<div style="background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0">
<h2 style="color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em">⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?>
<p style="color:#64748b;font-style:italic">Todavía no hay código. Escribe tu solución arriba y recarga.</p>
<?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>
</body></html>
