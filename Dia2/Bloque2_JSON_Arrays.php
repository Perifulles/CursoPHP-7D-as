<?php
ob_start();

// Dado este JSON en string:
// $json = '{"nombre":"Ana","edad":25,"ciudad":"Valencia"}';
// Decodifícalo con json_decode($json, true) y muestra cada campo.



// Dado este JSON:
// $json = '{
//   "Teclado": 29.99,
//   "Ratón": 15.50,
//   "Monitor": 249.00,
//   "Auriculares": 45.00,
//   "Webcam": 62.30
// }';
// Decodifica y recorre con foreach($datos as $nombre => $precio)
// Encuentra el producto más caro (sin max()). Muestra nombre y precio.



// Dado este JSON (idéntico en estructura al del examen):
// $json = '{
//   "nodo_A1": 45,
//   "nodo_A2": 82,
//   "nodo_B1": 33,
//   "nodo_B2": 95,
//   "nodo_C1": 60,
//   "nodo_C2": 55
// }';
// Encuentra el nodo con MAYOR carga y el de MENOR carga.
// Muestra: "Nodo con más carga: nodo_B2 (95%)"
// Muestra: "Nodo con menos carga: nodo_B1 (33%)"



// Crea un archivo llamado "empleados.json" con este contenido
// (o simúlalo con un string):
// [
//   {"nombre":"Ana","departamento":"Ventas","salario":2200},
//   {"nombre":"Luis","departamento":"Soporte","salario":1800},
//   {"nombre":"Elena","departamento":"Ventas","salario":2500},
//   {"nombre":"Carlos","departamento":"Soporte","salario":1900},
//   {"nombre":"María","departamento":"Desarrollo","salario":2800}
// ]
//
// Decodifica y:
// 1. Muestra todos los empleados con nombre y salario
// 2. Calcula el salario medio de todos
// 3. Muestra solo los de "Ventas"
// 4. Muestra quién cobra más que la media



// Usando los mismos datos del ejercicio 2.4:
// Calcula y muestra el salario medio POR DEPARTAMENTO.
// Resultado esperado:
//   Ventas: 2350€ de media
//   Soporte: 1850€ de media
//   Desarrollo: 2800€ de media
//
// Pista: puedes usar un array asociativo $porDepto donde la clave sea
// el departamento y el valor sea un array con los salarios. Después
// recorres y calculas la media de cada uno.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Día 2 - Bloque 2: JSON y Arrays</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style>
<link rel="stylesheet" href="../assets/aula-profesor.css">
</head><body>
<a class="back" href="index.php">← Volver al Día 2</a>
<span class="header-badge">📅 Día 2 — Bloque 2</span>
<h1>📦 JSON y Arrays asociativos</h1>
<p class="duracion">⏱️ Duración estimada: 50–60 minutos</p>

<p>El Ejercicio 2 del examen del 3er trimestre era JSON puro: decodificar y recorrer para encontrar un valor. Héctor ya domina arrays y foreach; aquí solo añadimos una capa: <strong>los datos vienen de un JSON en vez de un array escrito a mano</strong>.</p>

<h2>📖 json_decode: de JSON a array PHP</h2>
<pre><span class="var">$json</span> = <span class="str">'{"nombre":"Ana","edad":25}'</span>;
<span class="var">$datos</span> = <span class="fn">json_decode</span>(<span class="var">$json</span>, <span class="kw">true</span>);  <span class="cm">// ← true = array asociativo</span>

<span class="kw">echo</span> <span class="var">$datos</span>[<span class="str">"nombre"</span>]; <span class="cm">// Ana</span>
<span class="kw">echo</span> <span class="var">$datos</span>[<span class="str">"edad"</span>];   <span class="cm">// 25</span></pre>
<div class="warn"><b>⚠️ Siempre el segundo parámetro a <code>true</code>.</b> Sin él, json_decode devuelve un objeto stdClass en vez de un array asociativo. Vicente trabaja con arrays, no con stdClass.</div>

<h2>📖 Recorrer JSON decodificado</h2>
<pre><span class="var">$json</span> = <span class="str">'{"nodo_A":45,"nodo_B":82,"nodo_C":33}'</span>;
<span class="var">$nodos</span> = <span class="fn">json_decode</span>(<span class="var">$json</span>, <span class="kw">true</span>);

<span class="kw">foreach</span> (<span class="var">$nodos</span> <span class="kw">as</span> <span class="var">$nombre</span> => <span class="var">$carga</span>) {
    <span class="kw">echo</span> <span class="str">"$nombre: $carga%&lt;br&gt;"</span>;
}</pre>

<h2>📖 Buscar el máximo (patrón del examen)</h2>
<pre><span class="var">$max</span> = <span class="num">0</span>;
<span class="var">$nodoMax</span> = <span class="str">""</span>;
<span class="kw">foreach</span> (<span class="var">$nodos</span> <span class="kw">as</span> <span class="var">$nombre</span> => <span class="var">$carga</span>) {
    <span class="kw">if</span> (<span class="var">$carga</span> > <span class="var">$max</span>) {
        <span class="var">$max</span> = <span class="var">$carga</span>;
        <span class="var">$nodoMax</span> = <span class="var">$nombre</span>;
    }
}
<span class="kw">echo</span> <span class="str">"Nodo con más carga: $nodoMax ($max%)"</span>;</pre>

<h2>📖 Leer JSON desde archivo</h2>
<pre><span class="var">$contenido</span> = <span class="fn">file_get_contents</span>(<span class="str">"datos.json"</span>);
<span class="var">$datos</span> = <span class="fn">json_decode</span>(<span class="var">$contenido</span>, <span class="kw">true</span>);</pre>

<hr class="separador">

<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 2.1 — Decodificar JSON básico</h3>
<p>Decodifica <code>'{"nombre":"Ana","edad":25,"ciudad":"Valencia"}'</code> y muestra cada campo con echo.</p>
</div>

<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 2.2 — Encontrar el producto más caro</h3>
<p>JSON con 5 productos y precios. Decodifica, recorre y encuentra el más caro sin usar <code>max()</code>.</p>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 2.3 — Nodos de servidor (caso exacto del examen)</h3>
<p>JSON con nodos y cargas de CPU. Encuentra el nodo con <strong>mayor</strong> y <strong>menor</strong> carga.</p>
<pre><span class="var">$json</span> = <span class="str">'{"nodo_A1":45,"nodo_A2":82,"nodo_B1":33,"nodo_B2":95,"nodo_C1":60,"nodo_C2":55}'</span>;</pre>
<div class="info"><b>💡 Pista:</b> Es el mismo patrón del 0.2 (encontrar máx/mín) pero con datos de JSON en vez de un array escrito a mano.</div>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 2.4 — JSON de empleados: filtrar y calcular media</h3>
<p>JSON con array de objetos empleado (nombre, departamento, salario). Decodifica y: (1) muestra todos, (2) calcula salario medio, (3) filtra por departamento "Ventas", (4) muestra quién cobra más que la media.</p>
</div>

<div class="ejercicio"><span class="nivel dificil">🔴 DIFÍCIL</span>
<h3>Ejercicio 2.5 — Estadísticas por departamento</h3>
<p>Usando los datos del 2.4, calcula el salario medio <strong>por departamento</strong>.</p>
<p><strong>Resultado esperado:</strong> <code>Ventas: 2350€ | Soporte: 1850€ | Desarrollo: 2800€</code></p>
<div class="info"><b>💡 Pista:</b> Crea un array <code>$porDepto</code> donde la clave es el departamento y el valor es un array de salarios. Después recorres cada departamento y calculas su media.</div>
</div>

<hr class="separador">
<div class="tip"><b>✅ Resumen:</b> Has practicado json_decode con true, foreach con clave=>valor, búsqueda de máximo/mínimo, filtrado, cálculo de medias, y agrupación por categoría. El ejercicio del examen (nodos de servidor) es más simple que el 2.5.</div>

<div class="zona-practica">
<h2>⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?>
<p style="color:#64748b;font-style:italic">Todavía no hay código. Escribe tu solución arriba y recarga.</p>
<?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>

<div id="mendigo-btn" onclick="window.location.href='../sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="../images/mendigo.jpg" alt="Miguel"></div>
</body></html>
