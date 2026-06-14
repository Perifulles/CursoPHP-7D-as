<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 5 — Corrección Simulacro 1</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1b5e20;border-bottom:3px solid #1b5e20;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.3em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.88em;line-height:1.5;margin:12px 0;white-space:pre-wrap}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.sol{background:#fff;border:2px solid #a5d6a7;border-radius:10px;padding:18px 22px;margin:18px 0}.sol h2{color:#1b5e20;margin-top:0}.criterio{background:#fffde7;border-left:4px solid #fbc02d;padding:10px 16px;border-radius:0 8px 8px 0;margin:10px 0;font-size:.92em}.criterio b{color:#f57f17}.back{display:inline-block;margin-bottom:20px;color:#546E7A;text-decoration:none;font-size:.9em}.back:hover{color:#1A237E}.header-badge{display:inline-block;background:#1b5e20;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 5</a>
<span class="header-badge">✅ CORRECCIÓN — Simulacro 1</span>
<h1>Soluciones: Gimnasio FitFlorida</h1>

<div class="warn"><b>⚠️ Solo después de hacer el simulacro.</b> Corrige ejercicio a ejercicio. Por cada fallo, apunta en papel QUÉ concepto falló (no solo "el 4 mal"): ¿fue el Singleton? ¿el parent::? ¿el fetch? Eso se repasa el Día 7.</div>

<div class="sol"><h2>Ejercicio 1 — Asistencias (1 pt)</h2>
<pre>// a) Más de 12 asistencias
foreach ($asistencias as $socio => $veces) {
    if ($veces > 12) {
        echo "$socio: $veces asistencias&lt;br&gt;";
    }
}
// b) Media sin array_sum
$suma = 0; $total = 0;
foreach ($asistencias as $veces) {
    $suma += $veces;
    $total++;
}
echo "Media: " . ($suma / $total) . "&lt;br&gt;";
// c) Más asiduo sin max
$maxVeces = 0; $maxSocio = "";
foreach ($asistencias as $socio => $veces) {
    if ($veces > $maxVeces) {
        $maxVeces = $veces;
        $maxSocio = $socio;
    }
}
echo "Más asiduo: $maxSocio ($maxVeces)";</pre>
<div class="criterio"><b>Criterio:</b> 0,3 por apartado correcto + 0,1 por código limpio. Usar array_sum o max → medio punto del apartado.</div>
</div>

<div class="sol"><h2>Ejercicio 2 — Bono y BonoAnual (1,5 pts)</h2>
<pre>class Bono {
    private $nombre;
    private $precioBase;
    private $precioFinal;
    private $descuento;

    public function __construct($nombre, $precioBase, $descuento = 0.10) {
        $this->nombre = $nombre;
        $this->precioBase = $precioBase;
        $this->descuento = $descuento;
        $this->precioFinal = $precioBase - ($precioBase * $descuento);
    }
    public function getNombre() { return strtoupper($this->nombre); }
    public function getPrecioFinal() { return $this->precioFinal . "€"; }
}

class BonoAnual extends Bono {
    private $regalo;
    public function __construct($nombre, $precioBase, $regalo) {
        parent::__construct($nombre, $precioBase);
        $this->regalo = $regalo;
    }
    public function getRegalo() { return $this->regalo; }
}</pre>
<div class="criterio"><b>Criterio:</b> 0,5 constructor con cálculo interno · 0,5 getters formateados · 0,5 herencia con parent::. Si el precio se pasa como parámetro en vez de calcularse → -0,5.</div>
</div>

<div class="sol"><h2>Ejercicio 3 — clasificarBonos (1 pt)</h2>
<pre>function clasificarBonos($lista) {
    $resultado = ["baratos" => 0, "caros" => 0];
    foreach ($lista as $bono) {
        $precio = floatval($bono->getPrecioFinal());
        if ($precio < 50) {
            $resultado["baratos"]++;
        } else {
            $resultado["caros"]++;
        }
    }
    return $resultado;
}

// FUERA de la función:
$r = clasificarBonos($listaBonos);
echo "Baratos: " . $r["baratos"] . " — Caros: " . $r["caros"];</pre>
<div class="criterio"><b>Criterio:</b> 0,5 función que devuelve sin imprimir · 0,3 lógica correcta · 0,2 uso de getters. Si hay echo DENTRO de la función → -0,5 (era el requisito clave del examen del 2º trim).</div>
</div>

<div class="sol"><h2>Ejercicio 4 — Refactorización Singleton + composición (2 pts)</h2>
<pre>class ContadorAccesos {
    private static $instancia = null;
    private $totalAccesos = 0;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }
    public function registrarAcceso($socio) {
        $this->totalAccesos++;
        echo "Acceso " . $this->totalAccesos . ": $socio&lt;br&gt;";
    }
}

class SalaFitness {
    private $nombreSala;
    private $contador;   // ← composición, NO extends

    public function __construct($nombreSala) {
        $this->nombreSala = $nombreSala;
        $this->contador = ContadorAccesos::getInstance();
    }
    public function entraSocio($socio) {
        $this->contador->registrarAcceso("$socio entra en " . $this->nombreSala);
    }
}

$musculacion = new SalaFitness("Musculación");
$musculacion->entraSocio("Marta");   // Acceso 1
$cardio = new SalaFitness("Cardio");
$cardio->entraSocio("Pablo");        // Acceso 2 ✓</pre>
<div class="criterio"><b>Criterio:</b> 0,75 Singleton completo (las 3 piezas) · 0,75 composición (sin extends, con propiedad) · 0,5 prueba que demuestra el contador continuo. Si falta alguna pieza del Singleton (p.ej. constructor sigue público) → -0,5.</div>
</div>

<div class="sol"><h2>Ejercicio 5 — JSON de ocupación (1 pt)</h2>
<pre>$salas = json_decode($jsonSalas, true);
$max = 0; $min = 9999; $salaMax = ""; $salaMin = "";
foreach ($salas as $nombre => $personas) {
    if ($personas > $max) { $max = $personas; $salaMax = $nombre; }
    if ($personas < $min) { $min = $personas; $salaMin = $nombre; }
}
echo "Más llena: $salaMax ($max personas)&lt;br&gt;";
echo "Menos llena: $salaMin ($min personas)";</pre>
<div class="criterio"><b>Criterio:</b> 0,3 json_decode con true · 0,4 búsqueda máx · 0,3 búsqueda mín.</div>
</div>

<div class="sol"><h2>Ejercicio 6 — CRUD: completar buscar() (1,5 pts)</h2>
<pre>// Clases
class Actividad {
    private $id;
    private $nombre;
    protected $precioMes;
    public function __construct($nombre, $precioMes, $id = 0) {
        $this->nombre = $nombre;
        $this->precioMes = $precioMes;
        $this->id = $id;
    }
    public function getNombre() { return $this->nombre; }
}
class Colectiva extends Actividad {
    protected $aforoMax;
    public function __construct($nombre, $precioMes, $aforoMax, $id = 0) {
        parent::__construct($nombre, $precioMes, $id);
        $this->aforoMax = $aforoMax;
    }
}
class Personal extends Actividad {
    private $entrenador;
    public function __construct($nombre, $precioMes, $entrenador, $id = 0) {
        parent::__construct($nombre, $precioMes, $id);
        $this->entrenador = $entrenador;
    }
}

// Dentro de buscar(), después del execute():
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
if ($fila) {
    if ($fila["tipoActividad"] == "Colectiva") {
        return new Colectiva($fila["nombre"], $fila["precioMes"],
                             $fila["aforoMax"], $fila["id"]);
    } else {
        return new Personal($fila["nombre"], $fila["precioMes"],
                            $fila["entrenador"], $fila["id"]);
    }
}
return null;</pre>
<div class="criterio"><b>Criterio:</b> 0,5 clases con herencia correcta · 0,5 fetch + if por tipo · 0,3 parámetros correctos a cada constructor · 0,2 return null si no existe. Olvidar el return null → -0,2 (cayó en el examen real).</div>
</div>

<div class="sol"><h2>Ejercicio 7 — Polimorfismo (1 pt)</h2>
<pre>// En Actividad:
public function calcularPrecio($meses) {
    return $this->precioMes * $meses;
}

// En Colectiva:
public function calcularPrecio($meses) {
    $base = parent::calcularPrecio($meses);
    if ($this->aforoMax > 20) {
        return $base * 0.95;   // 5% descuento
    }
    return $base;
}

// En Personal:
public function calcularPrecio($meses) {
    $base = parent::calcularPrecio($meses);
    return $base + (10 * $meses);   // +10€ por mes
}</pre>
<div class="criterio"><b>Criterio:</b> 0,4 uso de parent:: · 0,3 condición en Colectiva · 0,3 cálculo en Personal. Repetir el cálculo del padre en vez de parent:: → -0,3.</div>
</div>

<div class="sol"><h2>Ejercicio 8 — Recordar al socio (1 pt)</h2>
<pre>// 2) ANTES del login: auto-login desde cookie
if (isset($_COOKIE["socio_login"])) {
    $email = base64_decode($_COOKIE["socio_login"]);
    $_SESSION['socioEmail'] = $email;
    echo "Sesión restaurada para $email&lt;br&gt;";
}

// 1) En el login, si recordarme:
if ($loginCorrecto) {
    $_SESSION['socioEmail'] = $emailSocio;
    if ($recordarme) {
        setcookie("socio_login", base64_encode($emailSocio), [
            'expires'  => time() + (86400 * 30),
            'path'     => '/',
            'httponly'  => true,
            'samesite' => 'Strict'
        ]);
    }
}

// 3) Logout completo
function logout() {
    $_SESSION = [];
    session_destroy();
    if (isset($_COOKIE['socio_login'])) {
        setcookie('socio_login', '', time() - 3600000, '/');
    }
    echo "Sesión cerrada";
}</pre>
<div class="criterio"><b>Criterio:</b> 0,4 cookie con opciones al login · 0,3 auto-login desde cookie · 0,3 logout que borra sesión Y cookie.</div>
</div>

<div class="sol"><h2>Ejercicio 9 — Teoría MVC (0,5 pts)</h2>
<pre>1. El recepcionista abre el formulario de alta (VISTA formularioAlta.php).
2. Rellena nombre, precio, tipo... y pulsa Guardar → POST a index.php?accion=insertar.
3. INDEX.PHP: el switch detecta "insertar" → llama a $controller->insertar().
4. CONTROLLER: recoge $_POST, crea el objeto:
   $actividad = new Colectiva($_POST["nombre"], $_POST["precio"], ...);
5. El controller llama al gestor: $this->gestor->insertar($actividad);
6. GESTOR: prepara el INSERT con prepare/bindValue y hace execute().
7. CONTROLLER: redirige con header("Location: index.php?accion=listar");
8. El recepcionista ve la lista de actividades con la nueva incluida (VISTA listar).</pre>
<div class="criterio"><b>Criterio:</b> 0,5 si aparecen todos los componentes en orden correcto. Faltar el gestor o el redirect → 0,25.</div>
</div>

<div class="warn"><b>📊 Tu nota:</b> suma los puntos. <strong>≥5</strong> → bien encaminado, mañana el Simulacro 2 sin pistas. <strong>&lt;5</strong> → repasa esta tarde los bloques de los días 1-4 correspondientes a lo que fallaste, y mañana el Simulacro 2 te dirá si lo has fijado.</div>

</body></html>
