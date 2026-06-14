<?php
ob_start();

echo "<h3>Ejercicio 2.1 — Crear una cookie básica</h3>";
// Crea una cookie llamada "color_favorito" con valor "azul".
// Usa: setcookie("color_favorito", "azul", time() + 3600);
// (expira en 1 hora)
// Muestra: "Cookie 'color_favorito' creada con valor 'azul'"
//
// IMPORTANTE: setcookie() funciona gracias a ob_start().
// En un sistema real, debe ir ANTES de cualquier HTML.



echo "<hr>";
echo "<h3>Ejercicio 2.2 — Leer una cookie</h3>";
// Comprueba si existe la cookie "color_favorito" con isset($_COOKIE["color_favorito"]).
// Si existe, muestra su valor.
// Si no existe, muestra "La cookie no existe todavía (recarga la página)".
//
// NOTA: las cookies se envían al navegador en la respuesta, pero $_COOKIE
// no las tiene hasta la SIGUIENTE petición (recarga). Así que la primera
// vez verás "no existe", y al recargar verás "azul".



echo "<hr>";
echo "<h3>Ejercicio 2.3 — Borrar una cookie</h3>";
// Para borrar una cookie, ponla con expiración en el PASADO:
// setcookie("color_favorito", "", time() - 3600);
//
// Después de borrar, muestra: "Cookie eliminada".
// Si recargas, el ejercicio 2.2 debería decir "no existe".



echo "<hr>";
echo "<h3>Ejercicio 2.4 — Cookie con opciones de seguridad</h3>";
// Crea una cookie "token_usuario" con estas opciones (como en el examen):
//
// setcookie("token_usuario", "abc123", [
//     'expires'  => time() + (86400 * 30),  // 30 días
//     'path'     => '/',                     // disponible en todo el sitio
//     'httponly'  => true,                   // no accesible por JavaScript
//     'samesite' => 'Strict'                 // protección CSRF
// ]);
//
// Muestra: "Cookie segura creada (30 días, httponly, strict)"



echo "<hr>";
echo "<h3>Ejercicio 2.5 — Resumen: crear, leer y borrar</h3>";
// Haz las 3 operaciones en secuencia con una cookie llamada "idioma":
// 1. Créala con valor "es" y expiración 7 días
// 2. Lee $_COOKIE["idioma"] y muéstrala (si existe)
// 3. Bórrala poniendo expiración pasada
//
// Recuerda: en la misma petición no verás el valor nuevo en $_COOKIE.
// Pero el patrón de código es lo que importa para el examen.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 4 - Bloque 2: Cookies</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 4</a>
<span class="header-badge">📅 Día 4 — Bloque 2</span>
<h1>🍪 Cookies</h1>
<p class="duracion">⏱️ Duración estimada: 40–50 minutos</p>
<p>Las cookies guardan datos <strong>en el navegador del usuario</strong>. A diferencia de las sesiones, <strong>persisten aunque cierre el navegador</strong>. Por eso el examen pedía cookies para "recordar al usuario".</p>

<h2>📖 Las 3 operaciones con cookies</h2>
<pre><span class="cm">// CREAR — se envía al navegador en la respuesta HTTP</span>
<span class="fn">setcookie</span>(<span class="str">"nombre"</span>, <span class="str">"valor"</span>, <span class="fn">time</span>() + <span class="num">3600</span>);  <span class="cm">// expira en 1h</span>

<span class="cm">// LEER — disponible desde la SIGUIENTE petición</span>
<span class="kw">echo</span> <span class="var">$_COOKIE</span>[<span class="str">"nombre"</span>];  <span class="cm">// "valor"</span>

<span class="cm">// BORRAR — poner expiración en el pasado</span>
<span class="fn">setcookie</span>(<span class="str">"nombre"</span>, <span class="str">""</span>, <span class="fn">time</span>() - <span class="num">3600</span>);</pre>

<div class="warn"><b>⚠️ Trampa de las cookies:</b> Cuando creas una cookie con <code>setcookie()</code>, NO aparece inmediatamente en <code>$_COOKIE</code>. Necesitas <strong>recargar la página</strong> para verla. En el examen en papel esto no importa, pero en el navegador sí.</div>

<h2>📖 Versión con opciones (como en la solución del examen)</h2>
<pre><span class="fn">setcookie</span>(<span class="str">"usuario_login"</span>, <span class="var">$token</span>, [
    <span class="str">'expires'</span>  => <span class="fn">time</span>() + (<span class="num">86400</span> * <span class="num">30</span>),  <span class="cm">// 30 días</span>
    <span class="str">'path'</span>     => <span class="str">'/'</span>,
    <span class="str">'httponly'</span>  => <span class="kw">true</span>,
    <span class="str">'samesite'</span> => <span class="str">'Strict'</span>
]);</pre>

<hr class="separador">
<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span><h3>Ejercicio 2.1 — Crear una cookie básica</h3><p>Crea <code>color_favorito</code> = "azul" con <code>setcookie()</code>. Expiración: 1 hora.</p></div>
<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span><h3>Ejercicio 2.2 — Leer una cookie con $_COOKIE</h3><p>Comprueba con <code>isset($_COOKIE["color_favorito"])</code> y muestra el valor. Recarga para verla.</p></div>
<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span><h3>Ejercicio 2.3 — Borrar una cookie</h3><p>Borra <code>color_favorito</code> poniendo <code>time() - 3600</code> como expiración.</p></div>
<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span><h3>Ejercicio 2.4 — Cookie con opciones de seguridad (patrón examen)</h3><p>Crea <code>token_usuario</code> usando el array de opciones: expires, path, httponly, samesite.</p></div>
<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span><h3>Ejercicio 2.5 — Crear, leer y borrar en secuencia</h3><p>Practica las 3 operaciones con una cookie <code>idioma</code>.</p></div>

<hr class="separador">
<div class="tip"><b>✅ Resumen:</b> setcookie() para crear, $_COOKIE para leer, setcookie con time pasado para borrar. Siempre ANTES de HTML. $_COOKIE se actualiza en la siguiente recarga.</div>
<div class="zona-practica"><h2>⚡ Tu salida</h2><?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tu solución arriba y recarga.</p><?php else: echo $salidaEjercicios; endif;?></div>
<script src="../assets/aula-profesor.js"></script>
</body></html>
