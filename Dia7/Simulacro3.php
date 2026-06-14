<?php
session_start();
// ═══════════════════════════════════════════════════════
//  SIMULACRO 3 — Cafetería CafeCode (nivel examen+)
//  ⏱️ Tiempo: 2 horas · 📊 10 puntos · 9 ejercicios
//  El último antes del examen real. Un punto más exigente.
//  Escribe tus soluciones aquí arriba, por orden.
// ═══════════════════════════════════════════════════════
ob_start();

echo "<h3>Ejercicio 1 — Ventas de la semana (1 pt)</h3>";
// Ventas (en euros) de los 3 productos estrella durante la semana:
$ventas = [
    "Latte"     => [45.0, 38.5, 52.0, 61.5, 78.0],
    "Croissant" => [31.2, 27.8, 35.5, 42.0, 55.3],
    "Bowl"      => [26.0, 31.5, 19.5, 45.5, 62.0]
];
// (los 5 valores son Lunes a Viernes)
// a) Muestra el total de la semana por producto (sin array_sum).
// b) Muestra qué producto ha recaudado más en total.
// c) Calcula la recaudación TOTAL del viernes (índice 4 de cada producto).



echo "<hr>";
echo "<h3>Ejercicio 2 — Clase Producto y Bebida (1,5 pts)</h3>";
// a) Crea la clase Producto con: $nombre, $costeBase, $pvp y
//    $margen (por defecto 0.40).
//    El constructor recibe nombre y costeBase y calcula DENTRO:
//    pvp = costeBase + (costeBase * margen)
// b) Getter getPvp() que devuelva el precio REDONDEADO a 2 decimales
//    con "€" (usa round($valor, 2)).
//    Getter getNombre() en mayúsculas.
//    Setter setMargen() que devuelva $this (encadenable).
// c) Crea Bebida extends Producto con $tamanyo. parent::__construct().
//
// Prueba:
// $p = new Producto("Bowl Quinoa", 4.2);
// echo $p->getPvp();    // 5.88€
// $b = new Bebida("Latte", 1.5, "grande");
// echo $b->getNombre(); // LATTE — y getPvp() → 2.1€



echo "<hr>";
echo "<h3>Ejercicio 3 — Función resumenCarta (1 pt)</h3>";
// Crea un array $carta con al menos 5 productos/bebidas variados.
// Crea una FUNCIÓN resumenCarta($lista) que DEVUELVA (sin imprimir)
// un array asociativo con:
//   "masCaro"     => nombre del producto con mayor pvp
//   "masBarato"   => nombre del producto con menor pvp
//   "precioMedio" => media de los pvp (redondeada a 2 decimales)
// El echo va FUERA.



echo "<hr>";
echo "<h3>Ejercicio 4 — Refactorización: caja registradora (2 pts)</h3>";
// La cafetería tiene varios TPV (terminales de venta), pero la CAJA
// es una sola: el total del día debe ser compartido.
//
// ❌ CÓDIGO MALO (cópialo y refactorízalo):
//
// class CajaRegistradora {
//     private $totalDia = 0;
//     public function cobrar($importe) {
//         $this->totalDia += $importe;
//         echo "Cobrados " . $importe . "€ — Total día: " . $this->totalDia . "€<br>";
//     }
// }
// class TerminalVenta extends CajaRegistradora {
//     private $numero;
//     public function __construct($numero) {
//         $this->numero = $numero;
//     }
//     public function venta($importe) {
//         echo "TPV " . $this->numero . ": ";
//         $this->cobrar($importe);
//     }
// }
//
// Refactoriza con Singleton + composición. Tu prueba final debe
// DEMOSTRAR que dos TPV distintos acumulan en la MISMA caja:
// $tpv1 = new TerminalVenta(1);
// $tpv1->venta(12.50);   // Total día: 12.5€
// $tpv2 = new TerminalVenta(2);
// $tpv2->venta(7.30);    // Total día: 19.8€  ← acumula, no reinicia



echo "<hr>";
echo "<h3>Ejercicio 5 — JSON anidado: pedidos (1 pt)</h3>";
$jsonPedidos = '{
    "pedido_101": {"mesa": 3, "items": [2.50, 4.80, 3.20]},
    "pedido_102": {"mesa": 1, "items": [6.50, 2.80]},
    "pedido_103": {"mesa": 5, "items": [3.90, 2.50, 2.50, 4.80]}
}';
// Decodifica el JSON (fíjate: cada pedido tiene DENTRO un array "items").
// a) Muestra el total de cada pedido (suma de sus items, con bucle).
// b) Muestra qué pedido es el más caro y a qué mesa pertenece.



echo "<hr>";
echo "<h3>Ejercicio 6 — CRUD: completar buscar() Y getAll() (1,5 pts)</h3>";
// La tabla 'productosCafe' tiene tipoProducto ENUM('Bebida','Comida').
// Las Bebidas tienen tamanyo. Las Comidas tienen vegano (0/1).
//
// a) Crea la clase Comida extends Producto con $vegano (bool).
//    (Producto y Bebida ya los tienes del Ejercicio 2.)
//
// b) Crea GestorProductos. La conexión YA ESTÁ HECHA, y esta vez
//    tienes que completar DOS métodos:
//
// class GestorProductos {
//     private $db;
//     public function __construct() {
//         $config = json_decode(file_get_contents(__DIR__ . "/../config.json"), true);
//         $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8mb4";
//         $this->db = new PDO($dsn, $config['userName'], $config['password']);
//     }
//
//     public function buscar($id) {
//         $sql = "SELECT * FROM productosCafe WHERE id = :id";
//         $stmt = $this->db->prepare($sql);
//         $stmt->bindValue(':id', $id);
//         $stmt->execute();
//         // ←←← TU CÓDIGO: fetch + if + return (con null)
//     }
//
//     public function getAll() {
//         // ←←← TU CÓDIGO ENTERO: query + fetchAll + foreach con
//         //     instanciación condicional + return array
//     }
// }
//
// c) Programa principal: muestra TODOS los productos con getAll()
//    (nombre y pvp de cada uno), y luego busca el id=2 y el id=50
//    (este último no existe: contrólalo).
//
// ⚠️ OJO: el campo de la BD es "precio" (coste base). Pásalo como
//    costeBase al constructor: el pvp se calcula solo.



echo "<hr>";
echo "<h3>Ejercicio 7 — Polimorfismo: calcularPvp con extra (1 pt)</h3>";
// Añade a Producto el método (si no lo tienes):
//
// public function calcularPvp() {
//     return $this->pvp;
// }
//
// Sobrescríbelo con parent:: en las subclases:
// - Bebida: si el tamanyo es "grande", el pvp sube 0,50€.
// - Comida: si es vegana, el pvp sube 1€ (ingredientes eco).
//
// Prueba:
// $b = new Bebida("Latte", 1.5, "grande");
// echo $b->calcularPvp();   // 2.6  (2.1 + 0.5)
// $c = new Comida("Bowl Quinoa", 4.2, true);
// echo $c->calcularPvp();   // 6.88 (5.88 + 1)



echo "<hr>";
echo "<h3>Ejercicio 8 — Cookie de preferencia + recordar cliente (1 pt)</h3>";
// La cafetería tiene un club de clientes con login (simulado):
$emailCliente = "marta@cafecode.es";
$loginOk = true;
$recordar = true;
$productoVisto = "Bowl Quinoa"; // el último producto que ha mirado
if ($loginOk) {
    $_SESSION['clienteEmail'] = $emailCliente;
}
// a) Implementa el "recordarme" completo (cookie segura 30 días +
//    auto-login + logout). Ya lo dominas.
// b) ADEMÁS: crea una segunda cookie "ultimo_producto" que guarde
//    $productoVisto durante 7 días (esta sin httponly, es solo UX).
//    Al cargar, si existe, muestra: "La última vez miraste: [producto]".



echo "<hr>";
echo "<h3>Ejercicio 9 — MVC: identificar componentes (0,5 pts)</h3>";
// Para cada fragmento, escribe con echo a qué parte del MVC pertenece
// (index.php, Controller, Gestor, Modelo o Vista) y UNA línea de por qué:
//
// A) $stmt = $this->db->prepare("DELETE FROM productosCafe WHERE id = :id");
//
// B) <h1>Carta de productos</h1>
//    <?php foreach ($productos as $p): ? > <li><?= $p->getNombre() ? ></li>
//
// C) switch ($_GET["accion"]) { case "listar": $controller->listar(); break; }
//
// D) $producto = new Bebida($_POST["nombre"], $_POST["coste"], $_POST["tamanyo"]);
//    $this->gestor->insertar($producto);
//    header("Location: index.php?accion=listar");
//
// E) class Comida extends Producto { private $vegano; ... }



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 7 — Simulacro 3: Cafetería CafeCode</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ej{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:18px 22px;margin:18px 0}.ej h3{color:#1A237E;margin-top:0}.pts{display:inline-block;background:#1A237E;color:#fff;padding:3px 12px;border-radius:12px;font-size:.82em;font-weight:bold}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}.header-badge{display:inline-block;background:#b71c1c;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}.back{display:inline-block;margin-bottom:20px;color:#546E7A;text-decoration:none;font-size:.9em}.back:hover{color:#1A237E}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 7</a>
<span class="header-badge">☕ SIMULACRO 3 — Nivel examen+</span>
<h1>Examen de práctica final: Cafetería CafeCode</h1>
<p class="duracion">⏱️ Tiempo: 2 horas · 📊 10 puntos · 9 ejercicios · Un punto más exigente que el examen</p>

<div class="warn"><b>⚠️ El último simulacro:</b> sin apuntes, con cronómetro. Es ligeramente más difícil que el examen real (JSON anidado, completar DOS métodos del gestor, doble cookie). Si esto te sale, el examen de mañana te parecerá terreno conocido. Mismo consejo: atascado 15 min → siguiente ejercicio.</div>

<div class="info"><b>💡 BD:</b> el Ejercicio 6 usa la tabla <code>productosCafe</code> (cargada con el SQL de simulacros del Día 5).</div>

<hr class="separador">

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 1 — Ventas de la semana</h3>
<p>Matriz de ventas por producto y día. Total semanal por producto, el más vendido, y la recaudación total del viernes.</p></div>

<div class="ej"><span class="pts">1,5 puntos</span><h3>Ejercicio 2 — Clase Producto y Bebida</h3>
<p>Constructor que calcula el pvp con margen del 40%. Getter redondeado con <code>round()</code> y €. Setter encadenable (return $this). Subclase con parent::.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 3 — Función resumenCarta</h3>
<p>Devuelve (sin imprimir) un array con el más caro, el más barato y el precio medio de la carta.</p></div>

<div class="ej"><span class="pts">2 puntos</span><h3>Ejercicio 4 — Refactorización: caja registradora</h3>
<p>Varios TPV, una sola caja: Singleton + composición. La prueba debe demostrar que el total del día acumula entre terminales.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 5 — JSON anidado: pedidos</h3>
<p>Cada pedido contiene un array de items. Total por pedido y pedido más caro con su mesa. Doble bucle.</p></div>

<div class="ej"><span class="pts">1,5 puntos</span><h3>Ejercicio 6 — CRUD: buscar() Y getAll()</h3>
<p>Esta vez completas los DOS métodos: buscar con control de null, y getAll entero con instanciación condicional. El programa principal lista todo y maneja un id inexistente.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 7 — Polimorfismo: calcularPvp</h3>
<p>Bebida grande → +0,50€. Comida vegana → +1€. Con parent::.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 8 — Doble cookie</h3>
<p>El "recordarme" completo de siempre, MÁS una cookie de preferencia (último producto visto, 7 días).</p></div>

<div class="ej"><span class="pts">0,5 puntos</span><h3>Ejercicio 9 — MVC: identificar componentes</h3>
<p>5 fragmentos de código → di qué componente MVC es cada uno y por qué.</p></div>

<hr class="separador">
<div class="tip"><b>✅ Al terminar:</b> corrige con la <a href="Correccion3.php"><strong>Corrección del Simulacro 3</strong></a>, suma tu nota y compárala con las dos anteriores. Esta tarde: descanso, repaso ligero de tus apuntes en papel, y a dormir pronto. Mañana, examen. Lo tienes. 💪</div>

<div class="zona-practica"><h2>⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tus soluciones en la parte PHP del archivo y recarga.</p><?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>
</body></html>
