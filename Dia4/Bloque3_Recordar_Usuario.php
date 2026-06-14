<?php
session_start();
ob_start();

echo "<h3>Ejercicio 3.1 — Login básico con sesión (código dado)</h3>";
// Este login YA FUNCIONA con sesiones. No lo modifiques todavía, solo entiéndelo.
// Simula un login exitoso:
//
// $email = "hector@florida.es";
// $passwordCorrecta = true;  // simulamos que password_verify da true
//
// if ($passwordCorrecta) {
//     $_SESSION['usuario_id'] = 1;
//     $_SESSION['usuarioEmail'] = $email;
//     echo "Login correcto para $email<br>";
// }
// echo "Sesión: " . $_SESSION['usuarioEmail'];
//
// Escribe este código y comprueba que funciona.



echo "<hr>";
echo "<h3>Ejercicio 3.2 — Añadir Recordarme al login (crear cookie)</h3>";
// Modifica el login del 3.1 para añadir "recordar":
//
// $recordar = true;  // simulamos que el checkbox está marcado
//
// Después de guardar en $_SESSION (login correcto), comprueba $recordar.
// Si es true, crea una cookie:
//   setcookie("usuario_login", base64_encode($email), [
//       'expires' => time() + (86400 * 30),
//       'path'    => '/',
//       'httponly' => true,
//       'samesite'=> 'Strict'
//   ]);
//
// Muestra: "Cookie de recordar creada (30 días)"



echo "<hr>";
echo "<h3>Ejercicio 3.3 — Comprobar cookie al cargar (auto-login)</h3>";
// ANTES de pedir login, comprueba si existe la cookie:
//
// if (isset($_COOKIE["usuario_login"])) {
//     $email = base64_decode($_COOKIE["usuario_login"]);
//     $_SESSION['usuarioEmail'] = $email;
//     echo "Auto-login desde cookie: $email<br>";
// } else {
//     echo "No hay cookie. Mostrar formulario de login.<br>";
// }
//
// Esto es lo que haría el controller al cargar la página de login:
// si ya tiene cookie → restaurar sesión sin pedir contraseña.



echo "<hr>";
echo "<h3>Ejercicio 3.4 — Logout completo: sesión + cookie</h3>";
// Implementa un logout que limpie TODO:
//
// 1. Vaciar sesión: $_SESSION = [];
// 2. Destruir sesión: session_destroy();
// 3. Borrar cookie (si existe):
//    if (isset($_COOKIE['usuario_login'])) {
//        setcookie('usuario_login', '', time() - 3600000, '/');
//    }
// 4. Mostrar: "Sesión cerrada y cookie eliminada"
//
// Recarga y comprueba que el ejercicio 3.3 dice "No hay cookie".



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 4 - Bloque 3: Recordar al usuario</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 4</a>
<span class="header-badge">📅 Día 4 — Bloque 3</span>
<h1>💾 Recordar al usuario (caso del examen)</h1>
<p class="duracion">⏱️ Duración estimada: 45–55 minutos</p>
<p>El Ejercicio 5 del examen del 3er trimestre (2 puntos) daba un login con sesiones funcionando y pedía añadir "Recordarme" con cookies. Vamos a replicarlo paso a paso.</p>

<h2>📖 El flujo completo de "Recordar usuario"</h2>
<pre><span class="cm">// 1. AL HACER LOGIN (si checkbox "Recordar" está marcado):</span>
<span class="fn">setcookie</span>(<span class="str">"usuario_login"</span>, <span class="fn">base64_encode</span>(<span class="var">$email</span>), [
    <span class="str">'expires'</span> => <span class="fn">time</span>() + (<span class="num">86400</span> * <span class="num">30</span>), <span class="str">'path'</span> => <span class="str">'/'</span>,
    <span class="str">'httponly'</span> => <span class="kw">true</span>, <span class="str">'samesite'</span> => <span class="str">'Strict'</span>
]);

<span class="cm">// 2. AL CARGAR LA PÁGINA (antes de mostrar login):</span>
<span class="kw">if</span> (<span class="fn">isset</span>(<span class="var">$_COOKIE</span>[<span class="str">"usuario_login"</span>])) {
    <span class="var">$email</span> = <span class="fn">base64_decode</span>(<span class="var">$_COOKIE</span>[<span class="str">"usuario_login"</span>]);
    <span class="var">$_SESSION</span>[<span class="str">'usuarioEmail'</span>] = <span class="var">$email</span>;
    <span class="cm">// ← auto-login sin pedir contraseña</span>
}

<span class="cm">// 3. EN EL LOGOUT:</span>
<span class="kw">if</span> (<span class="fn">isset</span>(<span class="var">$_COOKIE</span>[<span class="str">'usuario_login'</span>])) {
    <span class="fn">setcookie</span>(<span class="str">'usuario_login'</span>, <span class="str">''</span>, <span class="fn">time</span>() - <span class="num">3600000</span>, <span class="str">'/'</span>);
}</pre>

<hr class="separador">
<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span><h3>Ejercicio 3.1 — Login básico con sesión ya funcional</h3><p>Simula un login correcto: guarda id y email en <code>$_SESSION</code>. No toques cookies todavía.</p></div>
<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span><h3>Ejercicio 3.2 — Añadir Recordarme con cookie al login</h3><p>Si <code>$recordar</code> es true, crea la cookie <code>usuario_login</code> con <code>base64_encode($email)</code> y opciones de seguridad (30 días, httponly, samesite).</p></div>
<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span><h3>Ejercicio 3.3 — Auto-login desde cookie al cargar</h3><p>Comprueba <code>$_COOKIE["usuario_login"]</code>. Si existe → decodifica y restaura sesión sin pedir login.</p></div>
<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span><h3>Ejercicio 3.4 — Logout completo con sesión y cookie</h3><p>Limpia todo: <code>$_SESSION = []</code>, <code>session_destroy()</code>, y borra la cookie con expiración pasada.</p></div>

<hr class="separador">
<div class="tip"><b>✅ Si los 4 ejercicios funcionan en secuencia</b>, tienes el Ejercicio 5 del examen resuelto. El patrón es: login crea cookie → al cargar se comprueba cookie → logout borra cookie.</div>
<div class="zona-practica"><h2>⚡ Tu salida</h2><?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tu solución arriba y recarga.</p><?php else: echo $salidaEjercicios; endif;?></div>
<script src="../assets/aula-profesor.js"></script>
</body></html>
