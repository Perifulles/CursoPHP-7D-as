<?php
// ═══════════════════════════════════════
//  BLOQUE 1 — Conexión PDO (patrón Vicent)
// ═══════════════════════════════════════
//
// En los ejercicios de este bloque vas CONSTRUYENDO la clase Conexion
// paso a paso, exactamente como la enseña Vicent.
//
// La BD es MySQL (Docker). Asegúrate de tener los contenedores en marcha:
//   docker compose up -d
//
// Los datos de conexión están en config.json (raíz del proyecto):
//   host: mysql  |  userName: root  |  password: root  |  db: dia3_ejercicios
//
// En los ejercicios 1.1–1.3 vas CONSTRUYENDO la clase Conexion paso a paso.
// Cuando llegues al ejercicio 1.4, pega aquí (justo antes del ob_start) tu
// clase Conexion completa e instancíala en $conexion.
// La tabla 'productos' ya tiene datos — está en MySQL, cargada con sql/dia3_init.sql.
//
// CUANDO TENGAS LA CLASE LISTA, descomenta esto y pégala encima:
// ─────────────────────────────────────────────────────
// class Conexion {
//     private $host, $userName, $password, $db, $conn;
//     public function __construct() {
//         $configData = file_get_contents(__DIR__ . "/../config.json");
//         $config = json_decode($configData, true);
//         $this->host     = $config["host"];
//         $this->userName = $config["userName"];
//         $this->password = $config["password"];
//         $this->db       = $config["db"];
//         $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
//         $this->conn = new PDO($dsn, $this->userName, $this->password);
//         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     }
//     public function getHost() { return $this->host; }
//     public function getConn() { return $this->conn; }
// }
// $conexion = new Conexion();
// ─────────────────────────────────────────────────────

ob_start();

echo "<h3>Ejercicio 1.0 — Entiende la clase Conexion antes de crearla</h3>";
// Antes de escribir código, tienes que entender QUÉ vas a crear y POR QUÉ.
//
// ─── ¿Qué problema resuelve? ────────────────────────────────────────────
// Conectarse a MySQL requiere 4 datos (host, usuario, contraseña, BD) y
// varios pasos siempre iguales. Si los pones sueltos en cada archivo,
// cambias la contraseña y tienes que tocar 20 archivos. MAL.
// La solución de Vicent: una CLASE que encapsula todo eso.
//
// ─── La clase tiene 5 propiedades privadas ───────────────────────────────
// $host     → dirección del servidor MySQL (en Docker: "mysql", no "localhost")
// $userName → usuario MySQL
// $password → contraseña MySQL
// $db       → nombre de la base de datos
// $conn     → el objeto PDO (la conexión real). Empieza como null.
//
// ─── El constructor hace 4 pasos en orden ────────────────────────────────
// PASO 1 — Leer el archivo config.json (file_get_contents)
//           config.json guarda los datos de conexión fuera del código PHP.
//           Así si cambias contraseña, solo tocas un archivo.
//
// PASO 2 — Decodificar el JSON y guardar en las propiedades
//           json_decode($data, true) → array PHP.
//           $this->host = $config["host"]; ... etc.
//           Ahora la clase "sabe" a qué servidor conectarse.
//
// PASO 3 — Construir el DSN (Data Source Name)
//           Es el "carnet de identidad" de la conexión. Formato exacto:
//           "mysql:host=<host>;dbname=<db>;charset=utf8mb4"
//           Sin esto, PDO no sabe qué tipo de BD es ni dónde está.
//
// PASO 4 — Crear el objeto PDO y guardarlo en $this->conn
//           new PDO($dsn, $usuario, $contraseña)
//           + setAttribute(ERRMODE_EXCEPTION) para que los errores
//           lancen excepciones en lugar de fallar en silencio.
//
// ─── Los getters ────────────────────────────────────────────────────────
// getHost() → devuelve $this->host (para comprobar que se leyó bien)
// getConn() → devuelve $this->conn (el PDO). Todo el código que hace
//             consultas lo usará: $conexion->getConn()->query(...)
//
// ─── TU TAREA EN ESTE EJERCICIO ─────────────────────────────────────────
// No escribas todavía la clase completa. Responde con echo a estas
// preguntas (escribe las respuestas como strings, no hace falta código real):
//
// a) ¿Por qué los datos de conexión van en config.json y no hardcodeados?
//    echo "a) ...";
//
// b) ¿Por qué el host es "mysql" y no "localhost"?
//    (Pista: en Docker, cada contenedor tiene su propio nombre de red)
//    echo "b) ...";
//
// c) ¿Qué contiene el DSN y para qué sirve?
//    echo "c) ...";
//
// d) ¿Para qué sirve getConn() si ya tenemos $this->conn dentro de la clase?
//    echo "d) ...";


// En el patrón de Vicent, los datos de conexión se guardan en un JSON.
// No se ponen directamente en el código PHP.
//
// Crea (con echo, simulando) el contenido que tendría config.json:
// {
//     "host": "mysql",
//     "userName": "root",
//     "password": "root",
//     "db": "dia3_ejercicios"
// }
//
// Luego simula leerlo:
//   $configData = '{"host":"mysql","userName":"root","password":"root","db":"dia3_ejercicios"}';
//   $config = json_decode($configData, true);
//
// Muestra cada valor: echo "Host: " . $config["host"]; etc.



echo "<hr>";
echo "<h3>Ejercicio 1.2 — Clase Conexion: leer config y guardar propiedades</h3>";
// Crea una clase Conexion con propiedades privadas:
//   $host, $userName, $password, $db, $conn
//
// En el constructor:
//   PASO 1: Leer el JSON → $configData = file_get_contents(__DIR__ . "/../config.json");
//   PASO 1b: Decodificar → $config = json_decode($configData, true);
//   PASO 2: Guardar en propiedades:
//           $this->host = $config["host"];
//           $this->userName = $config["userName"];
//           $this->password = $config["password"];
//           $this->db = $config["db"];
//
// Añade un getter getHost() y muestra:
//   $conexion = new Conexion();
//   echo "Conectando a: " . $conexion->getHost();



echo "<hr>";
echo "<h3>Ejercicio 1.3 — Clase Conexion: construir DSN y crear PDO</h3>";
// Amplía la clase Conexion del ejercicio anterior.
// Después del PASO 2 (guardar propiedades), añade:
//
//   PASO 3: Construir el DSN
//     $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
//
//   PASO 4: Crear la conexión PDO
//     $this->conn = new PDO($dsn, $this->userName, $this->password);
//     $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
// Añade un getter: getConn() que devuelva $this->conn
//
// Prueba:
//   $conexion = new Conexion();
//   echo "Conexión creada correctamente";
//
// Si el contenedor MySQL no está arriba, verás una excepción PDO.
// Asegúrate de tener: docker compose up -d



echo "<hr>";
echo "<h3>Ejercicio 1.4 — Consulta a piñón (sin preparar)</h3>";
// ⚠️ ANTES DE ESTE EJERCICIO: pega tu clase Conexion completa (del 1.3)
// justo encima del ob_start() e instancíala como $conexion = new Conexion();
// La tabla 'productos' ya tiene datos en MySQL (Teclado, Ratón, Monitor...).
//
// Haz una consulta DIRECTA (sin prepare, sin parámetros):
//
//   $query = "SELECT * FROM productos";
//   $stmt = $conexion->getConn()->query($query);
//   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
// Recorre $result con foreach y muestra nombre y precio de cada producto.
//
// NOTA: Este método es válido cuando NO hay datos del usuario en la consulta.
// Si hay datos del usuario (buscar por id, por nombre...) → SIEMPRE preparar.



echo "<hr>";
echo "<h3>Ejercicio 1.5 — Consulta preparada con ? (más segura)</h3>";
// (Usa la misma $conexion del ejercicio anterior)
//
// Haz una consulta PREPARADA con marcadores ? (posicionales):
//
//   $query = "SELECT * FROM productos WHERE nombre = ?";
//   $stmt = $conexion->getConn()->prepare($query);
//   $stmt->execute(["Monitor"]);
//   $result = $stmt->fetch(PDO::FETCH_ASSOC);
//
// Si hay resultado, muestra el producto. Si no, muestra "No encontrado".
//
// Luego haz otra consulta preparada con DOS parámetros:
//   $query = "SELECT * FROM productos WHERE precio > ? AND precio < ?";
//   $stmt = $conexion->getConn()->prepare($query);
//   $stmt->execute([20, 100]);
//   $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   // Muestra los productos entre 20€ y 100€



echo "<hr>";
echo "<h3>Ejercicio 1.6 — Consulta preparada con :nombre (estilo examen)</h3>";
// (Usa la misma $conexion del ejercicio anterior)
// Vicente también usa el estilo con :nombre y bindValue.
// Este es el estilo que salió en el EXAMEN del 3er trimestre:
//
//   $query = "SELECT * FROM productos WHERE id = :id";
//   $stmt = $conexion->getConn()->prepare($query);
//   $stmt->bindValue(":id", 3);
//   $stmt->execute();
//   $fila = $stmt->fetch(PDO::FETCH_ASSOC);
//
// Busca el producto con id=3 y muéstralo.
// Luego haz un INSERT con :nombre y :precio:
//   $query = "INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)";
//   $stmt = $conexion->getConn()->prepare($query);
//   $stmt->bindValue(":nombre", "USB Hub");
//   $stmt->bindValue(":precio", 12.99);
//   $stmt->execute();
//
// Comprueba haciendo un SELECT * que el producto se insertó.



echo "<hr>";
echo "<h3>Ejercicio 1.7 — DELETE y comprobación</h3>";
// (Usa la misma $conexion del ejercicio anterior)
// Elimina el producto con id=2 usando consulta preparada.
// Luego haz getConn()->query("SELECT * FROM productos") y muestra
// todos los productos para comprobar que se borró.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 3 - Bloque 1: Conexión PDO</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 3</a>
<span class="header-badge">📅 Día 3 — Bloque 1</span>
<h1>🗄️ Conexión PDO (patrón Vicent)</h1>
<p class="duracion">⏱️ Duración estimada: 50–60 minutos</p>
<p>Seguimos <strong>exactamente el patrón del cuaderno</strong>: la conexión es un objeto, lee los datos de un <code>config.json</code>, construye el DSN, crea el PDO, y después hacemos consultas — primero "a piñón" (directas) y luego preparadas.</p>

<h2>📖 El flujo completo (5 pasos del cuaderno)</h2>
<pre><span class="cm">// ① En index.php: crear el objeto conexión</span>
<span class="var">$conexion</span> = <span class="kw">new</span> <span class="fn">Conexion</span>();

<span class="cm">// ② Dentro de Conexion.php: leer config.json</span>
<span class="var">$configData</span> = <span class="fn">file_get_contents</span>(<span class="str">"config.json"</span>);
<span class="var">$config</span> = <span class="fn">json_decode</span>(<span class="var">$configData</span>, <span class="kw">true</span>);
<span class="var">$this</span>->host = <span class="var">$config</span>[<span class="str">"host"</span>];
<span class="var">$this</span>->userName = <span class="var">$config</span>[<span class="str">"userName"</span>];  <span class="cm">// etc.</span>

<span class="cm">// ③ Construir el DSN</span>
<span class="var">$dsn</span> = <span class="str">"mysql:host={$this->host};dbname={$this->db};charset=utf8mb4"</span>;

<span class="cm">// ④ Crear la conexión PDO</span>
<span class="var">$this</span>->conn = <span class="kw">new</span> <span class="fn">PDO</span>(<span class="var">$dsn</span>, <span class="var">$this</span>->userName, <span class="var">$this</span>->password);

<span class="cm">// ⑤ Consulta "a piñón" (sin preparar, cuando NO hay datos del usuario)</span>
<span class="var">$query</span> = <span class="str">"SELECT * FROM productos"</span>;
<span class="var">$stmt</span> = <span class="var">$this</span>-><span class="fn">getConn</span>()-><span class="fn">query</span>(<span class="var">$query</span>);
<span class="var">$result</span> = <span class="var">$stmt</span>-><span class="fn">fetchAll</span>(<span class="fn">PDO</span>::<span class="fn">FETCH_ASSOC</span>);

<span class="cm">// ⑤.1 Consulta PREPARADA (cuando SÍ hay datos del usuario)</span>
<span class="var">$query</span> = <span class="str">"SELECT * FROM usuario WHERE nombre = ? AND email = ?"</span>;
<span class="var">$stmt</span> = <span class="var">$this</span>-><span class="fn">getConn</span>()-><span class="fn">prepare</span>(<span class="var">$query</span>);
<span class="var">$stmt</span>-><span class="fn">execute</span>([<span class="str">"Juan"</span>, <span class="str">"juan@gmail.com"</span>]);</pre>

<div class="info"><b>💡 BD MySQL en Docker:</b> Los contenedores ya están configurados. Asegúrate de tener <code>docker compose up -d</code> ejecutado antes de probar. La BD <code>dia3_ejercicios</code> y su tabla <code>productos</code> se crean con el SQL de <code>sql/dia3_init.sql</code>.</div>

<hr class="separador">

<div class="ejercicio"><span class="nivel facil">🟢 INTRO</span>
<h3>Ejercicio 1.0 — Entiende la clase Conexion antes de crearla</h3>
<p>Antes de escribir código, responde con <code>echo</code> a estas 4 preguntas. Son conceptuales: si las entiendes, los ejercicios 1.1–1.3 te saldrán solos.</p>
<ol>
  <li><b>¿Por qué los datos de conexión van en <code>config.json</code> y no escritos directamente en el PHP?</b></li>
  <li><b>¿Por qué el host es <code>"mysql"</code> y no <code>"localhost"</code>?</b> (pista: red interna de Docker)</li>
  <li><b>¿Qué es el DSN y para qué sirve?</b> Describe sus tres partes: tipo de BD, host+dbname, charset.</li>
  <li><b>¿Para qué sirve <code>getConn()</code> si <code>$this->conn</code> ya existe dentro de la clase?</b></li>
</ol>
<div class="info"><b>💡 La clase que vas a construir en 1.1–1.3 tiene esta estructura:</b><br>
5 propiedades privadas → constructor con 4 pasos (leer JSON, guardar props, construir DSN, crear PDO) → 2 getters (<code>getHost()</code> y <code>getConn()</code>).</div>
</div>

<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 1.1 — El archivo config.json</h3>
<p>Simula el contenido de <code>config.json</code> como string, decodifícalo con <code>json_decode($cadena, true)</code> y muestra cada campo (host, userName, password, db).</p>
</div>

<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 1.2 — Clase Conexion: leer config y guardar propiedades</h3>
<p>Crea la clase <code>Conexion</code> con propiedades privadas ($host, $userName, $password, $db, $conn). El constructor lee el JSON y guarda cada valor en su propiedad. Getter <code>getHost()</code>.</p>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.3 — Clase Conexion: construir DSN y crear PDO</h3>
<p>Amplía Conexion: después de guardar las propiedades, construye el DSN (<code>mysql:host=...;dbname=...;charset=utf8mb4</code>) y crea <code>$this->conn = new PDO($dsn, ...)</code>. Añade <code>setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)</code>. Getter <code>getConn()</code>.</p>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.4 — Consulta a piñón sin preparar</h3>
<p><strong>⚠️ Antes de este ejercicio:</strong> pega tu clase <code>Conexion</code> completa (la del 1.3) justo encima del <code>ob_start()</code> e instánciala con <code>$conexion = new Conexion();</code>. La tabla <code>productos</code> ya tiene datos en MySQL.</p>
<p>Haz un SELECT * usando <code>$conexion->getConn()->query($query)</code> y <code>fetchAll(PDO::FETCH_ASSOC)</code>. Recorre y muestra los productos.</p>
<div class="warn"><b>⚠️ Solo "a piñón" cuando NO hay datos del usuario.</b> Si metes un valor que viene del usuario (id, nombre, email) directamente en el SQL → inyección SQL. Para eso se preparan las consultas.</div>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.5 — Consulta preparada con ? (estilo cuaderno)</h3>
<p>Busca un producto por nombre usando <code>?</code> y <code>execute(["Monitor"])</code>. Luego busca productos con precio entre dos valores usando dos <code>?</code>.</p>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.6 — Consulta preparada con :nombre (estilo examen)</h3>
<p>Busca por id usando <code>:id</code> con <code>bindValue(":id", 3)</code>. Luego haz un INSERT con <code>:nombre</code> y <code>:precio</code>. Este es el estilo que Vicente usó en el examen del 3er trimestre.</p>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 1.7 — DELETE y comprobación</h3>
<p>Elimina un producto con consulta preparada y comprueba con un SELECT que se borró.</p>
</div>

<hr class="separador">
<div class="tip"><b>✅ Resumen de los 5 pasos:</b> (1) Leer JSON config, (2) guardar propiedades, (3) construir DSN, (4) new PDO con el DSN, (5) consultas — primero "a piñón" con query(), después preparadas con prepare()+execute(). Dos estilos de prepare: con <code>?</code> (cuaderno) y con <code>:nombre</code> + bindValue (examen). <br><b>⚠️ Para los ejercicios 1.4–1.7:</b> pega tu clase Conexion completa encima del ob_start() y usa <code>$conexion = new Conexion();</code>.</div>

<div class="zona-practica"><h2>⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tu solución arriba y recarga.</p><?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>

<div id="mendigo-btn" onclick="window.location.href='../sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="../images/mendigo.jpg" alt="Miguel"></div>
</body></html>