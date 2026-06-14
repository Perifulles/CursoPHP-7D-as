<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 7 — Corrección Simulacro 3</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1b5e20;border-bottom:3px solid #1b5e20;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.3em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.88em;line-height:1.5;margin:12px 0;white-space:pre-wrap}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.sol{background:#fff;border:2px solid #a5d6a7;border-radius:10px;padding:18px 22px;margin:18px 0}.sol h2{color:#1b5e20;margin-top:0}.criterio{background:#fffde7;border-left:4px solid #fbc02d;padding:10px 16px;border-radius:0 8px 8px 0;margin:10px 0;font-size:.92em}.criterio b{color:#f57f17}.back{display:inline-block;margin-bottom:20px;color:#546E7A;text-decoration:none;font-size:.9em}.back:hover{color:#1A237E}.header-badge{display:inline-block;background:#1b5e20;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 7</a>
<span class="header-badge">✅ CORRECCIÓN — Simulacro 3</span>
<h1>Soluciones: Cafetería CafeCode</h1>

<div class="sol"><h2>Ejercicio 1 — Ventas de la semana (1 pt)</h2>
<pre>// a) y b)
$maxTotal = 0; $masVendido = "";
foreach ($ventas as $producto => $dias) {
    $total = 0;
    foreach ($dias as $importe) {
        $total += $importe;
    }
    echo "$producto: " . round($total, 2) . "€&lt;br&gt;";
    if ($total > $maxTotal) {
        $maxTotal = $total;
        $masVendido = $producto;
    }
}
echo "Más recaudación: $masVendido&lt;br&gt;";

// c) Viernes = índice 4
$totalViernes = 0;
foreach ($ventas as $producto => $dias) {
    $totalViernes += $dias[4];
}
echo "Total viernes: " . round($totalViernes, 2) . "€";</pre>
<div class="criterio"><b>Criterio:</b> 0,4 totales por producto · 0,3 producto máximo · 0,3 acceso al índice 4 (viernes).</div>
</div>

<div class="sol"><h2>Ejercicio 2 — Producto y Bebida (1,5 pts)</h2>
<pre>class Producto {
    private $nombre;
    protected $costeBase;
    protected $pvp;
    private $margen;

    public function __construct($nombre, $costeBase, $margen = 0.40) {
        $this->nombre = $nombre;
        $this->costeBase = $costeBase;
        $this->margen = $margen;
        $this->pvp = $costeBase + ($costeBase * $margen);
    }
    public function getNombre() { return strtoupper($this->nombre); }
    public function getPvp() { return round($this->pvp, 2) . "€"; }
    public function setMargen($m) {
        $this->margen = $m;
        $this->pvp = $this->costeBase + ($this->costeBase * $m);
        return $this;   // ← encadenable
    }
}

class Bebida extends Producto {
    protected $tamanyo;
    public function __construct($nombre, $costeBase, $tamanyo) {
        parent::__construct($nombre, $costeBase);
        $this->tamanyo = $tamanyo;
    }
    public function getTamanyo() { return $this->tamanyo; }
}</pre>
<div class="criterio"><b>Criterio:</b> 0,5 cálculo en constructor · 0,4 getters con round y mayúsculas · 0,3 setter con return $this · 0,3 herencia con parent::. Olvidar el return $this → -0,3 (es convención de Vicente).</div>
</div>

<div class="sol"><h2>Ejercicio 3 — resumenCarta (1 pt)</h2>
<pre>function resumenCarta($lista) {
    $maxPvp = 0; $minPvp = 999999;
    $masCaro = ""; $masBarato = "";
    $suma = 0; $cuenta = 0;
    foreach ($lista as $prod) {
        $pvp = floatval($prod->getPvp());
        if ($pvp > $maxPvp) { $maxPvp = $pvp; $masCaro = $prod->getNombre(); }
        if ($pvp < $minPvp) { $minPvp = $pvp; $masBarato = $prod->getNombre(); }
        $suma += $pvp;
        $cuenta++;
    }
    return [
        "masCaro"     => $masCaro,
        "masBarato"   => $masBarato,
        "precioMedio" => round($suma / $cuenta, 2)
    ];
}

// FUERA:
$r = resumenCarta($carta);
echo "Más caro: " . $r["masCaro"] . "&lt;br&gt;";
echo "Más barato: " . $r["masBarato"] . "&lt;br&gt;";
echo "Precio medio: " . $r["precioMedio"] . "€";</pre>
<div class="criterio"><b>Criterio:</b> 0,4 devuelve array con las 3 claves sin imprimir · 0,3 máx/mín correctos (con floatval) · 0,3 media redondeada.</div>
</div>

<div class="sol"><h2>Ejercicio 4 — Caja registradora (2 pts)</h2>
<pre>class CajaRegistradora {
    private static $instancia = null;
    private $totalDia = 0;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }
    public function cobrar($importe) {
        $this->totalDia += $importe;
        echo "Cobrados " . $importe . "€ — Total día: " . $this->totalDia . "€&lt;br&gt;";
    }
}

class TerminalVenta {
    private $numero;
    private $caja;   // ← composición

    public function __construct($numero) {
        $this->numero = $numero;
        $this->caja = CajaRegistradora::getInstance();
    }
    public function venta($importe) {
        echo "TPV " . $this->numero . ": ";
        $this->caja->cobrar($importe);
    }
}

$tpv1 = new TerminalVenta(1);
$tpv1->venta(12.50);   // Total: 12.5€
$tpv2 = new TerminalVenta(2);
$tpv2->venta(7.30);    // Total: 19.8€ ✓ acumula</pre>
<div class="criterio"><b>Criterio:</b> 0,75 Singleton · 0,75 composición · 0,5 prueba con acumulación entre TPVs. Este es el patrón del Ejercicio 1 del examen real: a estas alturas debe salir entero sin dudar.</div>
</div>

<div class="sol"><h2>Ejercicio 5 — JSON anidado (1 pt)</h2>
<pre>$pedidos = json_decode($jsonPedidos, true);
$maxTotal = 0; $pedidoMax = ""; $mesaMax = 0;
foreach ($pedidos as $nombre => $datos) {
    $total = 0;
    foreach ($datos["items"] as $item) {   // ← bucle interno
        $total += $item;
    }
    echo "$nombre (mesa " . $datos["mesa"] . "): " . round($total, 2) . "€&lt;br&gt;";
    if ($total > $maxTotal) {
        $maxTotal = $total;
        $pedidoMax = $nombre;
        $mesaMax = $datos["mesa"];
    }
}
echo "Pedido más caro: $pedidoMax (mesa $mesaMax) con " . round($maxTotal, 2) . "€";</pre>
<div class="criterio"><b>Criterio:</b> 0,3 decode · 0,4 doble bucle (pedidos → items) · 0,3 máximo con mesa. La clave es acceder a $datos["items"] como array dentro del array: si lo trataste como número, repásalo.</div>
</div>

<div class="sol"><h2>Ejercicio 6 — buscar() y getAll() (1,5 pts)</h2>
<pre>class Comida extends Producto {
    private $vegano;
    public function __construct($nombre, $costeBase, $vegano) {
        parent::__construct($nombre, $costeBase);
        $this->vegano = $vegano;
    }
    public function getVegano() { return $this->vegano; }
}

// buscar(), después del execute():
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
if ($fila) {
    if ($fila["tipoProducto"] == "Bebida") {
        return new Bebida($fila["nombre"], $fila["precio"], $fila["tamanyo"]);
    } else {
        return new Comida($fila["nombre"], $fila["precio"], $fila["vegano"]);
    }
}
return null;

// getAll() entero:
public function getAll() {
    $productos = [];
    $stmt = $this->db->query("SELECT * FROM productosCafe");
    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($filas as $fila) {
        if ($fila["tipoProducto"] == "Bebida") {
            $productos[] = new Bebida($fila["nombre"], $fila["precio"], $fila["tamanyo"]);
        } else {
            $productos[] = new Comida($fila["nombre"], $fila["precio"], $fila["vegano"]);
        }
    }
    return $productos;
}

// Programa principal:
$gestor = new GestorProductos();
foreach ($gestor->getAll() as $p) {
    echo $p->getNombre() . " — " . $p->getPvp() . "&lt;br&gt;";
}
$prod = $gestor->buscar(2);
if ($prod !== null) { echo "Encontrado: " . $prod->getNombre() . "&lt;br&gt;"; }
$nada = $gestor->buscar(50);
if ($nada !== null) { echo $nada->getNombre(); }
else { echo "Producto no encontrado"; }</pre>
<div class="criterio"><b>Criterio:</b> 0,3 clase Comida · 0,4 buscar completo con null · 0,5 getAll entero (query sin prepare está bien aquí: no hay datos del usuario) · 0,3 principal con control de null. Nota: en getAll se usa query() "a piñón" porque NO hay parámetros del usuario — saber CUÁNDO preparar y cuándo no también puntúa.</div>
</div>

<div class="sol"><h2>Ejercicio 7 — calcularPvp polimórfico (1 pt)</h2>
<pre>// En Producto:
public function calcularPvp() {
    return $this->pvp;
}

// En Bebida:
public function calcularPvp() {
    $base = parent::calcularPvp();
    if ($this->tamanyo == "grande") {
        return $base + 0.50;
    }
    return $base;
}

// En Comida:
public function calcularPvp() {
    $base = parent::calcularPvp();
    if ($this->getVegano()) {
        return $base + 1;
    }
    return $base;
}</pre>
<div class="criterio"><b>Criterio:</b> 0,4 parent:: en ambas · 0,3 condición tamaño · 0,3 condición vegano. Cifras de control: 2.6 y 6.88.</div>
</div>

<div class="sol"><h2>Ejercicio 8 — Doble cookie (1 pt)</h2>
<pre>// a) Recordarme (lo de siempre):
if (isset($_COOKIE["cliente_login"])) {
    $_SESSION['clienteEmail'] = base64_decode($_COOKIE["cliente_login"]);
    echo "Sesión restaurada&lt;br&gt;";
}
if ($loginOk) {
    $_SESSION['clienteEmail'] = $emailCliente;
    if ($recordar) {
        setcookie("cliente_login", base64_encode($emailCliente), [
            'expires' => time() + (86400 * 30), 'path' => '/',
            'httponly' => true, 'samesite' => 'Strict'
        ]);
    }
}

// b) Cookie de preferencia (sin httponly: solo UX):
setcookie("ultimo_producto", $productoVisto, time() + (86400 * 7), "/");
if (isset($_COOKIE["ultimo_producto"])) {
    echo "La última vez miraste: " . $_COOKIE["ultimo_producto"];
}

// Logout (borra LAS DOS):
function logout() {
    $_SESSION = [];
    session_destroy();
    if (isset($_COOKIE['cliente_login'])) {
        setcookie('cliente_login', '', time() - 3600000, '/');
    }
    if (isset($_COOKIE['ultimo_producto'])) {
        setcookie('ultimo_producto', '', time() - 3600000, '/');
    }
}</pre>
<div class="criterio"><b>Criterio:</b> 0,5 recordarme completo · 0,3 segunda cookie con su lectura · 0,2 logout que limpia ambas.</div>
</div>

<div class="sol"><h2>Ejercicio 9 — Identificar MVC (0,5 pts)</h2>
<pre>A) GESTOR/MANAGER — tiene PDO y prepare: es el único que toca la BD.
B) VISTA — HTML que muestra datos con un bucle. Sin lógica de negocio.
C) INDEX.PHP — el switch de acciones del front controller.
D) CONTROLLER — recoge $_POST, crea el objeto, llama al gestor y redirige.
E) MODELO — clase que representa los datos, con herencia.</pre>
<div class="criterio"><b>Criterio:</b> 0,1 por fragmento bien identificado y justificado.</div>
</div>

<div class="tip"><b>📊 Cierre de la semana:</b> Simulacro 1: ___ · Simulacro 2: ___ · Simulacro 3: ___. Si la tendencia es ascendente y el S3 está por encima de 5, estás listo. Esta tarde NO programes más: repaso ligero en papel (Singleton de memoria, el patrón fetch+if, el setcookie con opciones), cena bien y duerme 8 horas. El examen es el mismo formato que llevas 3 días haciendo. 💪</div>

</body></html>
