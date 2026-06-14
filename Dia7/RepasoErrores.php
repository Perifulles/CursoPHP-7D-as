<?php
session_start();
// ═══════════════════════════════════════════════════════
//  DÍA 7 — REPASO FLASH DE ERRORES
//  6 mini-ejercicios de 5 minutos cada uno.
//  Cada uno cubre un concepto clave del examen.
//  Haz TODOS, pero dedica doble tiempo a los que fallaste
//  en los simulacros 1 y 2.
// ═══════════════════════════════════════════════════════
ob_start();

echo "<h3>Flash 1 — Singleton en 5 minutos</h3>";
// Sin mirar nada: escribe una clase ConfiguracionApp que sea Singleton
// y tenga un método set($clave, $valor) y un get($clave).
// Las 3 piezas: private static $instancia, constructor private, getInstance().
// Prueba que dos "instancias" comparten los datos:
// ConfiguracionApp::getInstance()->set("idioma", "es");
// echo ConfiguracionApp::getInstance()->get("idioma"); // es



echo "<hr>";
echo "<h3>Flash 2 — Constructor calculado en 5 minutos</h3>";
// Clase Entrada (de cine): $pelicula, $precioBase, $precioFinal,
// $recargo (por defecto 0.05, el recargo online).
// El constructor CALCULA: precioFinal = precioBase + (precioBase * recargo).
// Getter con "€". Pruébala: new Entrada("Dune", 8) → 8.4€



echo "<hr>";
echo "<h3>Flash 3 — Función que devuelve sin imprimir, en 5 minutos</h3>";
$temperaturas = ["Lunes" => 28, "Martes" => 31, "Miércoles" => 25, "Jueves" => 33, "Viernes" => 29];
// Función diasCalurosos($lista, $umbral) que DEVUELVA un array con
// los nombres de los días cuya temperatura supere el umbral.
// echo fuera. Prueba con umbral 28.



echo "<hr>";
echo "<h3>Flash 4 — Instanciación condicional en 5 minutos</h3>";
// Tienes este array que simula un fetch de la BD:
$fila = ["tipo" => "Premium", "nombre" => "Elena", "descuento" => 20];
// Y estas clases (escríbelas mini): Cliente ($nombre) y
// ClientePremium extends Cliente (añade $descuento).
// Escribe el if que instancia la clase correcta según $fila["tipo"]
// ("Premium" → ClientePremium, cualquier otro → Cliente) y muestra el nombre.
// Añade también: ¿qué devuelves si $fila fuera false? (escríbelo)



echo "<hr>";
echo "<h3>Flash 5 — JSON con máximo en 5 minutos</h3>";
$jsonVisitas = '{"inicio": 1250, "blog": 890, "tienda": 2100, "contacto": 340}';
// Decodifica y muestra la página más visitada y el total de visitas.



echo "<hr>";
echo "<h3>Flash 6 — parent:: en 5 minutos</h3>";
// Clase Envio con metodo calcularCoste($kg) que devuelve $kg * 3.
// Clase EnvioUrgente extends Envio: el coste es el del padre + 5€ fijos.
// Clase EnvioInternacional extends Envio: el coste del padre se duplica.
// Usa parent:: en ambas. Prueba con 2 kg: 6 / 11 / 12.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 7 — Repaso flash de errores</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:18px 22px;margin:18px 0}.ejercicio h3{color:#1A237E;margin-top:0}.flash{display:inline-block;background:#f57f17;color:#fff;padding:3px 12px;border-radius:12px;font-size:.82em;font-weight:bold}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}.header-badge{display:inline-block;background:#f57f17;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}.back{display:inline-block;margin-bottom:20px;color:#546E7A;text-decoration:none;font-size:.9em}.back:hover{color:#1A237E}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 7</a>
<span class="header-badge">⚡ REPASO FLASH</span>
<h1>Repaso de errores: 6 ejercicios de 5 minutos</h1>
<p class="duracion">⏱️ Total: 30–40 minutos · Hazlo por la mañana, antes del Simulacro 3</p>

<div class="warn"><b>⚠️ Cómo funciona:</b> cada flash es un concepto del examen reducido a su esencia. Pon 5 minutos por ejercicio. Si uno te sale a la primera, perfecto: siguiente. Si fallaste ese concepto en los simulacros 1 o 2, hazlo dos veces (bórralo y reescríbelo). Estos sí tienen pistas 💡 y solución por si te atascas.</div>

<hr class="separador">

<div class="ejercicio"><span class="flash">5 min</span>
<h3>Flash 1 — Singleton de memoria</h3>
<p>Clase <code>ConfiguracionApp</code> Singleton con <code>set($clave, $valor)</code> y <code>get($clave)</code>. Sin mirar apuntes: las 3 piezas tienen que salir solas.</p>
</div>

<div class="ejercicio"><span class="flash">5 min</span>
<h3>Flash 2 — Constructor que calcula</h3>
<p>Clase <code>Entrada</code> con recargo online del 5% calculado DENTRO del constructor. Getter con €.</p>
</div>

<div class="ejercicio"><span class="flash">5 min</span>
<h3>Flash 3 — Función que devuelve sin imprimir</h3>
<p><code>diasCalurosos($lista, $umbral)</code> devuelve un array de nombres de días. El echo va fuera.</p>
</div>

<div class="ejercicio"><span class="flash">5 min</span>
<h3>Flash 4 — Instanciación condicional exprés</h3>
<p>Un $fila simulado, dos clases mini, y el if que decide cuál instanciar. Más el return null de rigor.</p>
</div>

<div class="ejercicio"><span class="flash">5 min</span>
<h3>Flash 5 — JSON con máximo</h3>
<p>Decodificar, encontrar la página más visitada, sumar el total.</p>
</div>

<div class="ejercicio"><span class="flash">5 min</span>
<h3>Flash 6 — parent:: con dos subclases</h3>
<p><code>Envio</code>, <code>EnvioUrgente</code> (+5€) y <code>EnvioInternacional</code> (x2). Las dos con parent::.</p>
</div>

<hr class="separador">
<div class="tip"><b>✅ ¿Los 6 flashes en verde?</b> Descansa 15 minutos, y a por el <a href="Simulacro3.php"><strong>Simulacro 3</strong></a>: el último antes del examen real. 💪</div>

<div class="zona-practica"><h2>⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tus soluciones en la parte PHP del archivo y recarga.</p><?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>
</body></html>
