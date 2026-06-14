<?php
session_start();
ob_start();

echo "<h3>Ejercicio 1.1 — Iniciar sesión y guardar datos</h3>";
// Guarda en $_SESSION estos valores:
//   'usuario_nombre' => 'Héctor'
//   'usuario_email'  => 'hector@florida.es'
//   'usuario_rol'    => 'alumno'
// Luego muestra: "Sesión iniciada para Héctor"



echo "<hr>";
echo "<h3>Ejercicio 1.2 — Leer y mostrar datos de sesión</h3>";
// Comprueba si existe $_SESSION['usuario_nombre'] con isset().
// Si existe, muestra: "Bienvenido, Héctor (hector@florida.es) — Rol: alumno"
// Si no existe, muestra: "No hay sesión activa"



echo "<hr>";
echo "<h3>Ejercicio 1.3 — Destruir sesión completa (patrón logout)</h3>";
// Implementa el patrón completo de logout:
// 1. $_SESSION = [];  (vaciar el array)
// 2. session_destroy(); (destruir la sesión en el servidor)
// 3. Muestra "Sesión cerrada correctamente"
//
// Nota: en un sistema real harías header("Location: index.php") después,
// pero aquí solo muestra el mensaje para ver que funciona.



echo "<hr>";
echo "<h3>Ejercicio 1.4 — GET a SESSION (patrón examen 2º trim)</h3>";
// Simula que recibes un valor por GET: $pagina = "panel_admin";
// (en el examen real venía de $_GET["pagina"], aquí lo simulamos con una variable)
//
// Guárdalo en $_SESSION['tipo_usuario'] y luego muéstralo leyendo de $_SESSION.
// Esto es EXACTAMENTE lo que pedía el ejercicio 11 del examen del 2º trimestre.

$pagina = "panel_admin"; // Simulamos $_GET["pagina"]


$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 4 - Bloque 1: Sesiones</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 4</a>
<span class="header-badge">📅 Día 4 — Bloque 1</span>
<h1>🔐 Repaso de Sesiones</h1>
<p class="duracion">⏱️ Duración estimada: 25–30 minutos</p>
<p>Las sesiones guardan datos <strong>en el servidor</strong> mientras el usuario navega. Héctor ya las usó en rentAcarv3 para el login. Pero la sesión <strong>muere al cerrar el navegador</strong> — por eso el examen pedía cookies.</p>

<h2>📖 El ciclo de vida de una sesión</h2>
<pre><span class="fn">session_start</span>();                          <span class="cm">// 1. Siempre al INICIO del script</span>
<span class="var">$_SESSION</span>[<span class="str">'usuario_id'</span>] = <span class="num">42</span>;           <span class="cm">// 2. Guardar datos</span>
<span class="kw">echo</span> <span class="var">$_SESSION</span>[<span class="str">'usuario_id'</span>];            <span class="cm">// 3. Leer datos</span>
<span class="var">$_SESSION</span> = [];                            <span class="cm">// 4. Vaciar</span>
<span class="fn">session_destroy</span>();                        <span class="cm">// 5. Destruir</span></pre>

<hr class="separador">
<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span><h3>Ejercicio 1.1 — Iniciar sesión y guardar datos</h3><p>Guarda nombre, email y rol en <code>$_SESSION</code>. Muestra confirmación.</p></div>
<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span><h3>Ejercicio 1.2 — Leer y comprobar sesión con isset</h3><p>Comprueba si existe la sesión con <code>isset()</code>. Si sí → bienvenida. Si no → "No hay sesión".</p></div>
<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span><h3>Ejercicio 1.3 — Destruir sesión completa (logout)</h3><p>Vacía <code>$_SESSION = []</code> y luego <code>session_destroy()</code>. En un sistema real, redirigirías después.</p></div>
<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span><h3>Ejercicio 1.4 — GET a SESSION (examen 2º trimestre)</h3><p>Guarda un valor simulado de GET en <code>$_SESSION['tipo_usuario']</code>. Exactamente como en el ejercicio 11 del examen.</p></div>

<hr class="separador">
<div class="tip"><b>✅ Resumen:</b> session_start(), $_SESSION para guardar/leer, isset() para comprobar, $_SESSION = [] + session_destroy() para logout. Esto ya lo sabías; el Bloque 2 añade las cookies.</div>
<div class="zona-practica"><h2>⚡ Tu salida</h2><?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tu solución arriba y recarga.</p><?php else: echo $salidaEjercicios; endif;?></div>
<script src="../assets/aula-profesor.js"></script>

<div id="mendigo-btn" onclick="window.location.href='../sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="../images/mendigo.jpg" alt="Miguel"></div>
</body></html>
