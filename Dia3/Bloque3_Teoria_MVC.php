<?php
ob_start();

echo "<h3>Ejercicio 3.1 — Esquema de responsabilidades MVC</h3>";
// Escribe con echo un esquema que explique qué hace CADA parte del MVC:
// - index.php (front controller)
// - Controller
// - Gestor / Manager
// - Modelos (clases de objetos)
// - Vistas
// - $_SESSION
//
// Puedes usar echo con <br> para dar formato. Ejemplo:
// echo "<b>INDEX.PHP:</b> Es el punto de entrada...<br>";



echo "<hr>";
echo "<h3>Ejercicio 3.2 — Flujo de alta en un CRUD con MVC</h3>";
// Explica paso a paso (con echo) qué sucede cuando un usuario da de alta
// un producto nuevo en un sistema CRUD con arquitectura MVC.
// Debe quedar claro el orden: usuario → formulario → POST → index →
// controller → gestor → BD → redirección → vista con lista actualizada.
//
// Escríbelo como si fueras a explicárselo a un compañero que no sabe PHP.
// Paso 1: ...
// Paso 2: ...
// etc.



echo "<hr>";
echo "<h3>Ejercicio 3.3 — Identificar componentes MVC en código</h3>";
// Para cada fragmento de código, escribe con echo a qué parte del MVC pertenece:
//
// Fragmento A:
//   $sql = "SELECT * FROM productos"; $stmt = $db->prepare($sql); ...
//   → ¿Es Controller, Gestor, Vista, Modelo o index.php?
//
// Fragmento B:
//   <h1>Lista de productos</h1>
//   <?php foreach ($productos as $p): >
//     <p><?= $p->getNombre() ></p>
//   → ¿Qué parte del MVC es?
//
// Fragmento C:
//   $nombre = $_POST["nombre"];
//   $producto = new Producto($nombre, $precio);
//   $this->gestor->insertar($producto);
//   header("Location: index.php?accion=listar");
//   → ¿Qué parte?
//
// Fragmento D:
//   switch ($_GET["accion"]) {
//     case "listar": $controller->listar(); break;
//     case "insertar": $controller->insertar(); break;
//   }
//   → ¿Qué parte?
//
// Fragmento E:
//   class Producto { private $nombre; private $precio; ... }
//   → ¿Qué parte?



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 3 - Bloque 3: Teoría MVC</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 3</a>
<span class="header-badge">📅 Día 3 — Bloque 3</span>
<h1>📐 Teoría MVC</h1>
<p class="duracion">⏱️ Duración estimada: 25–30 minutos</p>
<p>En el examen del 2º trimestre, la teoría MVC valía <strong>2,7 puntos</strong> (más que el polimorfismo). Vicente pedía dibujar un esquema y explicar el flujo de un alta. No es código: es <strong>entender la arquitectura</strong>.</p>

<h2>📖 Recordatorio: ¿Qué hace cada parte?</h2>
<pre><span class="cm">USUARIO → index.php → Controller → Gestor/Manager → BD
                                        ↓
                              Devuelve objetos (Modelos)
                                        ↓
                              Controller → carga Vista
                                        ↓
                              Vista → muestra HTML al usuario</span></pre>

<div class="info"><b>💡 Piensa en rentAcarv3:</b><br>
<code>index.php</code> tenía el switch/case.<br>
<code>VehiculoController</code> tenía los métodos listar(), buscar(), etc.<br>
<code>GestorPDO</code> hacía las consultas.<br>
<code>Vehiculo</code>, <code>Coche</code>, <code>Motocicleta</code> eran los Modelos.<br>
Las vistas eran los .php con HTML.</div>

<hr class="separador">

<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 3.1 — Esquema de responsabilidades MVC</h3>
<p>Escribe con <code>echo</code> un esquema que explique la responsabilidad de cada componente: <strong>index.php</strong>, <strong>Controller</strong>, <strong>Gestor/Manager</strong>, <strong>Modelos</strong>, <strong>Vistas</strong>, <strong>$_SESSION</strong>. Como si lo escribieras en un examen en papel.</p>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 3.2 — Flujo de alta en un CRUD con MVC</h3>
<p>Explica paso a paso qué sucede cuando el usuario rellena un formulario y pulsa "Guardar" para dar de alta un producto. Desde que pulsa el botón hasta que ve la lista actualizada. Escríbelo como si lo explicaras a un compañero.</p>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 3.3 — Identificar componentes MVC en fragmentos de código</h3>
<p>Se te dan 5 fragmentos de código. Para cada uno, di a qué parte del MVC pertenece (Gestor, Vista, Controller, index.php o Modelo) y por qué.</p>
</div>

<hr class="separador">
<div class="tip"><b>✅ Resumen:</b> La teoría MVC puede parecer "fácil" pero valía 2,7 puntos en el 2º trimestre. Si la explicas bien en el examen, son puntos casi regalados. Practica escribirlo como si fuera en papel.</div>

<div class="zona-practica"><h2>⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tu solución arriba y recarga.</p><?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>

<div id="mendigo-btn" onclick="window.location.href='../sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="../images/mendigo.jpg" alt="Miguel"></div>
</body></html>
