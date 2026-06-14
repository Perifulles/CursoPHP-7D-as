<?php
// ═══════════════════════════════════════
//  BLOQUE 0 — Preparar MySQL
//  No hay código que escribir aquí.
//  Solo sigue los pasos y comprueba.
// ═══════════════════════════════════════
ob_start();

// ── Test automático de conexión ──
$ok = false;
$error = "";
try {
    $configPath = __DIR__ . "/../config.json";
    if (file_exists($configPath)) {
        $config = json_decode(file_get_contents($configPath), true);
        $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8mb4";
        $db = new PDO($dsn, $config['userName'], $config['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $tablas = $db->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
        if (count($tablas) >= 3) {
            $ok = true;
        } else {
            $error = "La base de datos existe pero solo tiene " . count($tablas) . " tabla(s). Esperaba 3.";
        }
    } else {
        $error = "No se encuentra config.json en la raíz del proyecto.";
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}

$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 3 - Bloque 0: Preparar MySQL</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:6px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}
.paso{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}
.paso h3{color:#1A237E;margin-top:0}
.paso .num{display:inline-block;background:#1A237E;color:#fff;width:32px;height:32px;border-radius:50%;text-align:center;line-height:32px;font-weight:bold;margin-right:10px;font-size:.95em}
.status-ok{background:#c8e6c9;border:2px solid #2e7d32;border-radius:12px;padding:20px 24px;margin:24px 0;text-align:center}
.status-ok h2{color:#2e7d32;margin:0 0 8px}
.status-fail{background:#ffcdd2;border:2px solid #c62828;border-radius:12px;padding:20px 24px;margin:24px 0}
.status-fail h2{color:#c62828;margin:0 0 8px}
.tabla-check{width:100%;border-collapse:collapse;margin:12px 0}
.tabla-check td,.tabla-check th{border:1px solid #ddd;padding:8px 12px;text-align:left}
.tabla-check th{background:#f5f5f5}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 3</a>
<span class="header-badge">📅 Día 3 — Bloque 0</span>
<h1>🐬 Preparar la base de datos MySQL</h1>

<p>A partir de hoy necesitamos una <strong>base de datos real</strong> para practicar PDO. El proyecto ya incluye todo lo necesario: solo tienes que ejecutar unos comandos en el terminal.</p>

<!-- ═══ TEST AUTOMÁTICO ═══ -->
<?php if ($ok): ?>
<div class="status-ok">
    <h2>✅ ¡MySQL está funcionando!</h2>
    <p>Conexión correcta a <code><?= $config['db'] ?></code>. Tablas encontradas: <strong><?= implode(', ', $tablas) ?></strong>.</p>
    <p>Puedes pasar directamente al <a href="Bloque1_Repaso_PDO.php"><strong>Bloque 1</strong></a>.</p>
</div>
<?php else: ?>
<div class="status-fail">
    <h2>❌ MySQL no está listo todavía</h2>
    <p>Error: <code><?= htmlspecialchars($error) ?></code></p>
    <p>Sigue los pasos de abajo para configurarlo.</p>
</div>
<?php endif; ?>

<hr class="separador">

<h2>Pasos de instalación</h2>

<div class="paso">
<h3><span class="num">1</span> Abre el terminal</h3>
<p>Abre una terminal y navega hasta la carpeta del proyecto:</p>
<pre>cd ruta/a/tu/carpeta/CURSO FINAL</pre>
<p>Comprueba que ves los archivos del proyecto:</p>
<pre>ls</pre>
<p>Deberías ver: <code>Dia1</code>, <code>Dia2</code>, <code>Dia3</code>, <code>Dia4</code>, <code>docker-compose.yml</code>, <code>Dockerfile</code>, <code>sql</code>, <code>config.json</code>, etc.</p>
</div>

<div class="paso">
<h3><span class="num">2</span> Para los contenedores anteriores</h3>
<p>Si tenías contenedores corriendo de días anteriores, páralos y limpia los datos:</p>
<pre>docker compose down -v</pre>
<p>El <code>-v</code> borra los volúmenes antiguos para que MySQL arranque limpio.</p>
<div class="info"><b>💡</b> Si te dice "no containers to remove", no pasa nada. Significa que no había nada corriendo.</div>
</div>

<div class="paso">
<h3><span class="num">3</span> Arranca todo</h3>
<pre>docker compose up -d --build</pre>
<p>Esto hace tres cosas:</p>
<ol>
    <li>Construye el contenedor de <strong>PHP + Apache</strong> (tu servidor web).</li>
    <li>Arranca un contenedor de <strong>MySQL 8.0</strong> (tu base de datos).</li>
    <li>MySQL detecta que es la primera vez y <strong>ejecuta automáticamente</strong> el archivo <code>sql/dia3_init.sql</code>, que crea la base de datos con las 3 tablas y sus datos.</li>
</ol>
<div class="warn"><b>⚠️ Paciencia:</b> La primera vez MySQL tarda <strong>30-40 segundos</strong> en inicializarse. Espera a que el terminal muestre que todo está <code>Healthy</code> / <code>Started</code>.</div>
</div>

<div class="paso">
<h3><span class="num">4</span> Comprueba que MySQL funciona</h3>
<p>Ejecuta este comando para verificar que las tablas se crearon:</p>
<pre>docker exec -it repaso_final_mysql mysql -uroot -proot -e "USE dia3_ejercicios; SHOW TABLES;"</pre>
<p>Deberías ver esto:</p>
<pre>+----------------------------+
| Tables_in_dia3_ejercicios  |
+----------------------------+
| animales                   |
| flotaVehiculos             |
| productos                  |
+----------------------------+</pre>
</div>

<div class="paso">
<h3><span class="num">5</span> Recarga esta página</h3>
<p>Vuelve aquí y <strong>recarga la página</strong> (F5 o Ctrl+R). Si todo está bien, el recuadro rojo de arriba se convertirá en verde ✅ y podrás pasar al Bloque 1.</p>
</div>

<hr class="separador">

<h2>Tablas disponibles</h2>

<p>El archivo <code>sql/dia3_init.sql</code> ha creado estas tablas con datos de prueba:</p>

<h3>📦 productos <span style="color:#78909c;font-weight:normal">(Bloque 1 — Repaso PDO)</span></h3>
<table class="tabla-check">
<tr><th>id</th><th>nombre</th><th>precio</th></tr>
<tr><td>1</td><td>Teclado</td><td>29.99</td></tr>
<tr><td>2</td><td>Ratón</td><td>15.50</td></tr>
<tr><td>3</td><td>Monitor</td><td>249.00</td></tr>
<tr><td>4</td><td>Auriculares</td><td>45.00</td></tr>
<tr><td>5</td><td>Webcam</td><td>62.30</td></tr>
</table>

<h3>🚗 flotaVehiculos <span style="color:#78909c;font-weight:normal">(Bloque 2 — Instanciación condicional)</span></h3>
<table class="tabla-check">
<tr><th>id</th><th>tipoVehiculo</th><th>marca</th><th>modelo</th><th>matricula</th><th>precioDia</th><th>numPuertas</th><th>combustible</th><th>cilindrada</th><th>casco</th></tr>
<tr><td>1</td><td>Coche</td><td>Seat</td><td>León</td><td>1234ABC</td><td>40.00</td><td>5</td><td>Diésel</td><td>—</td><td>—</td></tr>
<tr><td>2</td><td>Motocicleta</td><td>Honda</td><td>CBR</td><td>5678DEF</td><td>25.00</td><td>—</td><td>—</td><td>600</td><td>Sí</td></tr>
<tr><td>3</td><td>Coche</td><td>Ford</td><td>Focus</td><td>9012GHI</td><td>35.00</td><td>5</td><td>Gasolina</td><td>—</td><td>—</td></tr>
<tr><td>4</td><td>Motocicleta</td><td>Yamaha</td><td>MT-07</td><td>3456JKL</td><td>20.00</td><td>—</td><td>—</td><td>689</td><td>No</td></tr>
<tr><td>5</td><td>Coche</td><td>Toyota</td><td>Corolla</td><td>7890MNO</td><td>38.00</td><td>5</td><td>Diésel</td><td>—</td><td>—</td></tr>
</table>
<div class="info"><b>💡 Fíjate en <code>tipoVehiculo</code>:</b> es un ENUM con dos valores (Coche / Motocicleta). En el Bloque 2 leerás este campo después del <code>fetch</code> para decidir si crear <code>new Coche(...)</code> o <code>new Motocicleta(...)</code>. Es el mismo patrón que en el examen.</div>

<h3>🐾 animales <span style="color:#78909c;font-weight:normal">(Bloque 4 — Integrador veterinaria)</span></h3>
<table class="tabla-check">
<tr><th>id</th><th>tipo</th><th>nombre</th><th>edad</th><th>raza</th><th>interior</th></tr>
<tr><td>1</td><td>Perro</td><td>Rex</td><td>5</td><td>Pastor Alemán</td><td>—</td></tr>
<tr><td>2</td><td>Gato</td><td>Misi</td><td>3</td><td>—</td><td>Sí</td></tr>
<tr><td>3</td><td>Perro</td><td>Luna</td><td>2</td><td>Labrador</td><td>—</td></tr>
<tr><td>4</td><td>Gato</td><td>Garfield</td><td>7</td><td>—</td><td>No</td></tr>
<tr><td>5</td><td>Perro</td><td>Rocky</td><td>4</td><td>Bulldog</td><td>—</td></tr>
</table>

<hr class="separador">

<h2>Datos de conexión</h2>
<p>El archivo <code>config.json</code> (en la raíz del proyecto) tiene estos datos. Es el que leerás con <code>file_get_contents</code> en el Bloque 1:</p>
<table class="tabla-check">
<tr><th>Campo</th><th>Valor</th><th>¿Por qué?</th></tr>
<tr><td>host</td><td><code>mysql</code></td><td>Nombre del servicio en Docker (no "localhost")</td></tr>
<tr><td>userName</td><td><code>root</code></td><td>Usuario administrador de MySQL</td></tr>
<tr><td>password</td><td><code>root</code></td><td>Contraseña que hemos puesto en docker-compose</td></tr>
<tr><td>db</td><td><code>dia3_ejercicios</code></td><td>La base de datos que creó el .sql</td></tr>
</table>

<hr class="separador">

<h2>Si algo falla</h2>
<div class="warn"><b>"Connection refused"</b> → MySQL aún no ha arrancado. Espera 30 segundos y recarga.</div>
<div class="warn"><b>"Unknown database"</b> → El .sql no se ejecutó. Haz <code>docker compose down -v</code> y luego <code>docker compose up -d</code>.</div>
<div class="warn"><b>"No se encuentra config.json"</b> → Comprueba que <code>config.json</code> está en la raíz del proyecto (al lado de <code>index.php</code>).</div>

<hr class="separador">
<div class="tip"><b>✅ ¿Todo en verde?</b> Pasa al <a href="Bloque1_Repaso_PDO.php"><strong>Bloque 1: Repaso PDO</strong></a> y empieza a construir tu clase Conexion.</div>

<script src="../assets/aula-profesor.js"></script>
</body></html>
