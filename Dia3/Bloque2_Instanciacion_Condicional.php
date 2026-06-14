<?php
// ═══════════════════════════════════════
//  BLOQUE 2 — Instanciación Condicional
// ═══════════════════════════════════════
function crearBdFlota() {
    $db = new PDO("sqlite::memory:");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE flotaVehiculos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        tipoVehiculo TEXT, marca TEXT, modelo TEXT, matricula TEXT,
        precioDia REAL, numeroPuertas INTEGER, tipoCombustible TEXT,
        cilindrada INTEGER, incluyeCasco INTEGER
    )");
    $db->exec("INSERT INTO flotaVehiculos VALUES (1,'Coche','Seat','León','1234ABC',40,5,'Diésel',NULL,NULL)");
    $db->exec("INSERT INTO flotaVehiculos VALUES (2,'Motocicleta','Honda','CBR','5678DEF',25,NULL,NULL,600,1)");
    $db->exec("INSERT INTO flotaVehiculos VALUES (3,'Coche','Ford','Focus','9012GHI',35,5,'Gasolina',NULL,NULL)");
    $db->exec("INSERT INTO flotaVehiculos VALUES (4,'Motocicleta','Yamaha','MT-07','3456JKL',20,NULL,NULL,689,0)");
    return $db;
}

ob_start();

echo "<h3>Ejercicio 2.1 — Instanciar según el campo tipo</h3>";
// Ya tienes las clases Vehiculo, Coche y Motocicleta del Día 2.
// Reescríbelas aquí (o cópialas) y luego haz esto:
//
// $db = crearBdFlota();
// $stmt = $db->query("SELECT * FROM flotaVehiculos WHERE id = 1");
// $fila = $stmt->fetch(PDO::FETCH_ASSOC);
//
// Ahora, según $fila["tipoVehiculo"], crea el objeto correcto:
// - Si es "Coche" → new Coche(marca, modelo, matricula, precioDia, numeroPuertas, tipoCombustible, id)
// - Si es "Motocicleta" → new Motocicleta(marca, modelo, matricula, precioDia, cilindrada, incluyeCasco, id)
//
// Muestra: echo "Tipo: Coche — Seat León (1234ABC) — 40€/día"



echo "<hr>";
echo "<h3>Ejercicio 2.2 — Completar buscar($id) con enum (caso del examen)</h3>";
// Crea un GestorFlota con método buscar($id).
// El código de la consulta ya está hecho (igual que en el examen):
//
// public function buscar($id) {
//     $sql = "SELECT * FROM flotaVehiculos WHERE id = :id";
//     $stmt = $this->db->prepare($sql);
//     $stmt->bindValue(':id', $id);
//     $stmt->execute();
//
//     // ← TU CÓDIGO AQUÍ: fetch + if/switch + instanciar + return
// }
//
// Prueba: $v = $gestor->buscar(2);
// echo $v->getMarca() . " " . $v->getModelo(); // Honda CBR



echo "<hr>";
echo "<h3>Ejercicio 2.3 — getAll() con instanciación condicional</h3>";
// Añade a GestorFlota un método getAll() que:
// 1. Haga query("SELECT * FROM flotaVehiculos")
// 2. Obtenga todas las filas con fetchAll
// 3. Recorra cada fila con foreach
// 4. Dentro del foreach, haga el mismo if/switch del buscar() para crear el objeto correcto
// 5. Añada cada objeto al array $vehiculos[]
// 6. Devuelva $vehiculos
//
// Prueba: recorre el resultado y muestra marca + modelo + calcularAlquiler(5) de cada uno.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 3 - Bloque 2: Instanciación Condicional</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 3</a>
<span class="header-badge">📅 Día 3 — Bloque 2</span>
<h1>🔀 Instanciación Condicional</h1>
<p class="duracion">⏱️ Duración estimada: 45–50 minutos</p>

<p>Este es el <strong>concepto estrella del Ejercicio 3 del examen</strong> (2,5 puntos). En rentAcarv3, <code>getAll()</code> siempre creaba objetos del mismo tipo. Pero cuando la tabla tiene un campo tipo <code>enum</code> con varios valores posibles, hay que <strong>decidir qué clase instanciar</strong> después del fetch.</p>

<h2>📖 El patrón: fetch → leer tipo → instanciar</h2>
<pre><span class="var">$fila</span> = <span class="var">$stmt</span>-><span class="fn">fetch</span>(<span class="fn">PDO</span>::<span class="fn">FETCH_ASSOC</span>);
<span class="kw">if</span> (<span class="var">$fila</span>) {
    <span class="kw">if</span> (<span class="var">$fila</span>[<span class="str">"tipoVehiculo"</span>] == <span class="str">"Coche"</span>) {
        <span class="kw">return new</span> <span class="fn">Coche</span>(<span class="var">$fila</span>[<span class="str">"marca"</span>], <span class="var">$fila</span>[<span class="str">"modelo"</span>], ...);
    } <span class="kw">else</span> {
        <span class="kw">return new</span> <span class="fn">Motocicleta</span>(<span class="var">$fila</span>[<span class="str">"marca"</span>], <span class="var">$fila</span>[<span class="str">"modelo"</span>], ...);
    }
}
<span class="kw">return null</span>;</pre>
<div class="warn"><b>⚠️ Clave:</b> Cada subclase tiene parámetros de constructor DIFERENTES. Coche necesita numeroPuertas y tipoCombustible. Motocicleta necesita cilindrada e incluyeCasco. Lee los campos correctos de $fila para cada uno.</div>

<div class="info"><b>💡 BD de prueba:</b> Al inicio del archivo hay una función <code>crearBdFlota()</code> que crea una tabla <code>flotaVehiculos</code> con coches y motos, igual que en el examen. Úsala: <code>$db = crearBdFlota();</code></div>

<hr class="separador">

<div class="ejercicio"><span class="nivel facil">🟢 FÁCIL</span>
<h3>Ejercicio 2.1 — Instanciar según el campo tipo</h3>
<p>Haz un SELECT de la fila con id=1. Lee <code>$fila["tipoVehiculo"]</code> y crea el objeto correcto con un if. Muestra su info.</p>
</div>

<div class="ejercicio"><span class="nivel medio">🟡 MEDIO</span>
<h3>Ejercicio 2.2 — Completar buscar($id) con enum (caso del examen)</h3>
<p>Crea <code>GestorFlota</code> con <code>buscar($id)</code>. La consulta preparada ya está escrita. <strong>Completa solo la parte del fetch + instanciación condicional.</strong> Exactamente como en el examen.</p>
</div>

<div class="ejercicio"><span class="nivel dificil">🔴 DIFÍCIL</span>
<h3>Ejercicio 2.3 — getAll() con instanciación condicional</h3>
<p>Añade <code>getAll()</code> a GestorFlota. Misma lógica que buscar() pero con fetchAll + foreach. Cada fila crea el objeto correcto y lo añade al array.</p>
<p><strong>Resultado esperado:</strong> <code>Se devuelven varios objetos mezclados: Coche, Motocicleta, Coche... y al recorrerlos con describir() aparece una línea por cada vehículo de la tabla.</code></p>
</div>

<hr class="separador">
<div class="tip"><b>✅ Resumen:</b> Has practicado el patrón fetch → if (tipo) → new Clase(...) que vale 2,5 puntos en el examen. Tanto en buscar() (una fila) como en getAll() (todas las filas).</div>

<div class="zona-practica"><h2>⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tu solución arriba y recarga.</p><?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>
</body></html>
