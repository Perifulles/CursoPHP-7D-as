<?php
session_start();
ob_start();

// ═══════════════════════════════════════════════════════════
//  EJERCICIO INTEGRADOR DÍA 4
//  Sistema de Login completo para una Tienda Online
// ═══════════════════════════════════════════════════════════

// ─── Parte A: Clase Usuario ───────────────────────────────
// Crea una clase Usuario con propiedades privadas:
//   $id, $nombre, $email, $password (hash), $rol
// Constructor con $id = 0. Getters para todo. Setter para $rol.



// ─── Parte B: Base de datos simulada ──────────────────────
// Crea un array $bbdd con 3 usuarios (simula la tabla usuarios):
// $bbdd = [
//   ["id" => 1, "nombre" => "Héctor", "email" => "hector@test.com",
//    "password" => password_hash("1234", PASSWORD_DEFAULT), "rol" => "admin"],
//   ["id" => 2, "nombre" => "Ana", "email" => "ana@test.com",
//    "password" => password_hash("abcd", PASSWORD_DEFAULT), "rol" => "usuario"],
//   ["id" => 3, "nombre" => "Luis", "email" => "luis@test.com",
//    "password" => password_hash("qwer", PASSWORD_DEFAULT), "rol" => "usuario"],
// ];
//
// Crea una función buscarPorEmail($bbdd, $email) que recorra el array
// y devuelva el usuario (array) si coincide el email, o null si no existe.



// ─── Parte C: Login con sesión + recordar ─────────────────
// Simula un intento de login:
//   $emailIntento = "hector@test.com";
//   $passIntento = "1234";
//   $recordar = true;
//
// 1. Busca el usuario con buscarPorEmail()
// 2. Si lo encuentra, verifica con password_verify($passIntento, $usuario["password"])
// 3. Si es correcto:
//    a. Guarda en $_SESSION: usuario_id, nombre, email, rol
//    b. Si $recordar es true, crea cookie "recordar_tienda" con base64_encode del email
//    c. Muestra "Login correcto. Bienvenido, Héctor (admin)"
// 4. Si es incorrecto, muestra "Credenciales incorrectas"



// ─── Parte D: Auto-login desde cookie ────────────────────
// ANTES del login, comprueba si existe $_COOKIE["recordar_tienda"].
// Si existe:
//   1. Decodifica el email con base64_decode
//   2. Busca el usuario en $bbdd con buscarPorEmail
//   3. Si existe, restaura la sesión automáticamente
//   4. Muestra "Sesión restaurada desde cookie para [nombre]"



// ─── Parte E: Logout ─────────────────────────────────────
// Crea una función cerrarSesion() que:
//   1. Vacíe $_SESSION
//   2. Destruya la sesión
//   3. Borre la cookie "recordar_tienda" si existe
//   4. Muestre "Sesión cerrada completamente"



// ─── Parte F: Mostrar estado actual ──────────────────────
// Muestra el estado actual:
// - Si hay sesión activa → "Logueado como [nombre] ([rol])"
// - Si hay cookie pero no sesión → "Cookie encontrada, restaurando..."
// - Si no hay nada → "No hay sesión ni cookie"



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 4 - Bloque 4: Integrador — Login Completo</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 4</a>
<span class="header-badge">📅 Día 4 — Bloque 4</span>
<h1>🧩 Integrador: Login Completo de Tienda Online</h1>
<p class="duracion">⏱️ Duración estimada: 30–40 minutos</p>
<p>Un sistema de login completo que combina todo el Día 4: sesiones, cookies, "recordar usuario" y logout limpio. Usa una "base de datos" simulada con un array para que funcione sin MySQL.</p>

<hr class="separador">
<div class="ejercicio"><span class="nivel dificil">🔴 EJERCICIO FINAL DEL DÍA</span>
<h3>Ejercicio — Sistema de login con recordar usuario para tienda online</h3>

<h3>Parte A — Clase Usuario</h3>
<p>Clase con id, nombre, email, password (hash), rol. Constructor y getters.</p>

<h3>Parte B — BD simulada + buscarPorEmail</h3>
<p>Array <code>$bbdd</code> con 3 usuarios. Función <code>buscarPorEmail($bbdd, $email)</code> que recorra y devuelva el usuario o null.</p>
<div class="info"><b>💡 password_hash:</b> Usa <code>password_hash("1234", PASSWORD_DEFAULT)</code> para crear hashes. Luego verifica con <code>password_verify($intento, $hash)</code>.</div>

<h3>Parte C — Login con sesión + cookie Recordarme</h3>
<ol>
<li>Buscar usuario por email</li>
<li>Verificar contraseña con <code>password_verify()</code></li>
<li>Si OK → guardar en <code>$_SESSION</code> + crear cookie si <code>$recordar</code></li>
</ol>

<h3>Parte D — Auto-login desde cookie</h3>
<p>Comprobar <code>$_COOKIE["recordar_tienda"]</code> → decodificar → buscar usuario → restaurar sesión.</p>

<h3>Parte E — Logout completo</h3>
<p>Función que limpie sesión + destruya + borre cookie.</p>

<h3>Parte F — Estado actual</h3>
<p>Muestra si hay sesión, si hay cookie sin sesión, o si no hay nada.</p>
</div>

<hr class="separador">
<div class="tip"><b>🎯 Checklist del Día 4:</b>
<br>☐ session_start() siempre al inicio
<br>☐ $_SESSION para guardar/leer datos de usuario
<br>☐ isset() para comprobar existencia
<br>☐ setcookie() con opciones (expires, path, httponly, samesite)
<br>☐ $_COOKIE para leer cookies
<br>☐ Borrar cookie con time() pasado
<br>☐ password_verify() para comprobar contraseñas
<br>☐ base64_encode/decode para el token de la cookie
<br>☐ Logout limpio: vaciar sesión + destruir + borrar cookie
<br><br>¡Día 4 completado! Mañana empieza el Simulacro 1 💪</div>

<div style="background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0">
<h2 style="color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em">⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tu solución arriba y recarga.</p><?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>

<div id="mendigo-btn" onclick="window.location.href='../sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="../images/mendigo.jpg" alt="Miguel"></div>
</body></html>
