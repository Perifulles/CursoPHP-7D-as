/*
   aula-profesor.js  —  Motor de pistas y soluciones
   Busca .ejercicio, lee el <h3>, muestra pistas + solución.
*/

const soluciones = [

  // ────────────── DÍA 1 — BLOQUE 0 ──────────────
  {
    test: /Filtrar pares/i,
    pistas: ['Recorre con foreach y comprueba $numero % 2 === 0.','Lleva $totalPares = 0 y súmale 1 cada vez.','Muestra los pares separados por coma y al final el total.'],
    solucion: "$totalPares = 0;\nforeach ($numeros as $n) {\n    if ($n % 2 === 0) {\n        echo $n . \", \";\n        $totalPares++;\n    }\n}\necho \"→ Total pares: \" . $totalPares;"
  },
  {
    test: /producto m.s caro/i,
    pistas: ['Inicializa $maxPrecio = 0 y $minPrecio = 999999.','Recorre con foreach($productos as $nombre => $precio).','Si $precio > $maxPrecio, actualiza $maxPrecio y $maxNombre.'],
    solucion: "$maxP = 0; $minP = 999999; $maxN = \"\"; $minN = \"\";\nforeach ($productos as $nombre => $precio) {\n    if ($precio > $maxP) { $maxP = $precio; $maxN = $nombre; }\n    if ($precio < $minP) { $minP = $precio; $minN = $nombre; }\n}\necho \"Más caro: $maxN ({$maxP}€) — Más barato: $minN ({$minP}€)\";"
  },
  {
    test: /nombres por vocal/i,
    pistas: ['Crea array de vocales: ["A","E","I","O","U","Á","É","Í","Ó","Ú"].','Usa substr($nombre, 0, 1) para la primera letra.','Comprueba con in_array(substr($nombre,0,1), $vocales).'],
    solucion: "$vocales = [\"A\",\"E\",\"I\",\"O\",\"U\",\"Á\",\"É\",\"Í\",\"Ó\",\"Ú\"];\n$total = 0;\nforeach ($nombres as $n) {\n    if (in_array(substr($n, 0, 1), $vocales)) {\n        echo $n . \"<br>\";\n        $total++;\n    }\n}\necho \"Total: $total\";"
  },
  {
    test: /Tabla de multiplicar/i,
    pistas: ['Bucle exterior de 1 a 5 (filas), interior de 1 a 5 (columnas).','echo \"$fila x $col = \" . ($fila * $col);','Después del bucle interior haz echo \"<br>\".'],
    solucion: "for ($fila = 1; $fila <= 5; $fila++) {\n    for ($col = 1; $col <= 5; $col++) {\n        echo $fila . \" x \" . $col . \" = \" . ($fila*$col) . \"  \";\n    }\n    echo \"<br>\";\n}"
  },

  // ────────────── DÍA 1 — BLOQUE 1 ──────────────
  {
    test: /Electrodomestico.*constructor/i,
    pistas: ['Constructor recibe $nombre, $precioBase y $iva = 0.21.','$this->precioFinal se calcula DENTRO: $precioBase + ($precioBase * $iva).','getPrecioFinal() devuelve $this->precioFinal . "€" y getNombre() usa strtoupper().'],
    solucion: "class Electrodomestico {\n    private $nombre;\n    private $precioBase;\n    private $precioFinal;\n    private $iva;\n    public function __construct($nombre, $precioBase, $iva = 0.21) {\n        $this->nombre = $nombre;\n        $this->precioBase = $precioBase;\n        $this->iva = $iva;\n        $this->precioFinal = $precioBase + ($precioBase * $iva);\n    }\n    public function getNombre() { return strtoupper($this->nombre); }\n    public function getPrecioFinal() { return $this->precioFinal . \"€\"; }\n}"
  },
  {
    test: /Televisor.*herencia/i,
    pistas: ['class Televisor extends Electrodomestico.','Constructor recibe nombre, precioBase, pulgadas, resolucion.','Llama parent::__construct($nombre, $precioBase) y luego asigna las propias.'],
    solucion: "class Televisor extends Electrodomestico {\n    private $pulgadas;\n    private $resolucion;\n    public function __construct($nombre, $precioBase, $pulgadas, $resolucion) {\n        parent::__construct($nombre, $precioBase);\n        $this->pulgadas = $pulgadas;\n        $this->resolucion = $resolucion;\n    }\n    public function getPulgadas() { return $this->pulgadas; }\n    public function setPulgadas($p) { $this->pulgadas = $p; return $this; }\n}"
  },
  {
    test: /clasificarPorPrecio/i,
    pistas: ['Inicializa $resultado = ["economicos"=>0, "medio"=>0, "premium"=>0].','Recorre con foreach, usa getPrecioFinal() — quita el € con floatval().','NO hagas echo dentro. Solo return $resultado al final.'],
    solucion: "function clasificarPorPrecio($catalogo) {\n    $r = [\"economicos\"=>0, \"medio\"=>0, \"premium\"=>0];\n    foreach ($catalogo as $p) {\n        $precio = floatval($p->getPrecioFinal());\n        if ($precio <= 100) $r[\"economicos\"]++;\n        elseif ($precio <= 500) $r[\"medio\"]++;\n        else $r[\"premium\"]++;\n    }\n    return $r;\n}"
  },
  {
    test: /cambiarPulgadas/i,
    pistas: ['Recorre $catalogo con foreach.','Compara getNombre() con strtoupper($nombreBuscado).','Si coincide → setPulgadas() y return true. Si no → return false.'],
    solucion: "function cambiarPulgadas(&$catalogo, $nombreBuscado, $nuevas) {\n    foreach ($catalogo as $obj) {\n        if ($obj->getNombre() == strtoupper($nombreBuscado)) {\n            $obj->setPulgadas($nuevas);\n            return true;\n        }\n    }\n    return false;\n}"
  },

  // ────────────── DÍA 1 — BLOQUE 2 ──────────────
  {
    test: /Identificar errores de dise/i,
    pistas: ['Pregúntate: ¿X ES un tipo de Y?','Perro SÍ es Animal. Factura NO es Impresora.','Restaurante tiene un SistemaReservas. Tienda tiene una BaseDeDatos.'],
    solucion: "1. Perro extends Animal → HERENCIA ✅\n2. Factura extends Impresora → COMPOSICIÓN ❌\n3. CocheElectrico extends Coche → HERENCIA ✅\n4. Restaurante extends SistemaReservas → COMPOSICIÓN ❌\n5. Alumno extends Persona → HERENCIA ✅\n6. Tienda extends BaseDeDatos → COMPOSICIÓN ❌"
  },
  {
    test: /Informe.*hereda.*Impresora/i,
    pistas: ['Quita extends Impresora.','Añade private $impresora; y recíbela en el constructor.','Usa $this->impresora->imprimir(...) en vez de $this->imprimir(...).'],
    solucion: "class Informe {\n    private $titulo;\n    private $contenido;\n    private $impresora;\n    public function __construct($titulo, $contenido, $impresora) {\n        $this->titulo = $titulo;\n        $this->contenido = $contenido;\n        $this->impresora = $impresora;\n    }\n    public function generarInforme() {\n        $this->impresora->imprimir($this->titulo . \": \" . $this->contenido);\n    }\n}"
  },
  {
    test: /Pedido.*hereda.*EmailSender/i,
    pistas: ['Quita extends. Añade private $sender; Recíbelo en constructor.','En confirmar(): $this->sender->enviar(...).','Crea UN $sender y pásalo a ambos pedidos para compartir conteo.'],
    solucion: "class Pedido {\n    private $cliente;\n    private $producto;\n    private $sender;\n    public function __construct($cliente, $producto, $sender) {\n        $this->cliente = $cliente;\n        $this->producto = $producto;\n        $this->sender = $sender;\n    }\n    public function confirmar() {\n        $this->sender->enviar($this->cliente, \"Confirmación\", \"Pedido de \" . $this->producto);\n    }\n}"
  },

  // ────────────── DÍA 1 — BLOQUE 3 ──────────────
  {
    test: /Contador global.*Singleton/i,
    pistas: ['Tres piezas: private static $instancia = null; private __construct(); public static getInstance().','getInstance(): if (self::$instancia === null) self::$instancia = new self();','incrementar() hace $this->cuenta++ y getCuenta() devuelve $this->cuenta.'],
    solucion: "class Contador {\n    private static $instancia = null;\n    private $cuenta = 0;\n    private function __construct() {}\n    public static function getInstance() {\n        if (self::$instancia === null) self::$instancia = new self();\n        return self::$instancia;\n    }\n    public function incrementar() { $this->cuenta++; }\n    public function getCuenta() { return $this->cuenta; }\n}"
  },
  {
    test: /LogSistema.*Singleton/i,
    pistas: ['Añade private static $instancia = null;','Cambia constructor a private.','Añade public static function getInstance() con el patrón if null.'],
    solucion: "class LogSistema {\n    private static $instancia = null;\n    private $contadorMensajes = 0;\n    private function __construct() {\n        echo \"--- Iniciando Sistema de Log ---<br>\";\n    }\n    public static function getInstance() {\n        if (self::$instancia === null) self::$instancia = new self();\n        return self::$instancia;\n    }\n    public function registrar($mensaje) {\n        $this->contadorMensajes++;\n        echo \"Mensaje \" . $this->contadorMensajes . \": $mensaje<br>\";\n    }\n}"
  },
  {
    test: /Singleton.*Composici/i,
    pistas: ['ServicioVentas NO lleva extends. Tiene private $logger;','En __construct(): $this->logger = LogSistema::getInstance();','En realizarVenta(): $this->logger->registrar(\"Venta: $producto\");'],
    solucion: "class ServicioVentas {\n    private $logger;\n    public function __construct() {\n        $this->logger = LogSistema::getInstance();\n    }\n    public function realizarVenta($producto) {\n        $this->logger->registrar(\"Venta: $producto\");\n    }\n}"
  },

  // ────────────── DÍA 2 — BLOQUE 1 ──────────────
  {
    test: /Sobrescritura.*Animal/i,
    pistas: ['Animal: hacerSonido() → \"...\". Perro → \"Guau\". Gato → \"Miau\".','Crea array mixto: [new Perro(), new Gato(), new Perro()].','Recorre con foreach y llama ->hacerSonido() en cada uno.'],
    solucion: "class Animal { public function hacerSonido() { return \"...\"; } }\nclass Perro extends Animal { public function hacerSonido() { return \"Guau\"; } }\nclass Gato extends Animal { public function hacerSonido() { return \"Miau\"; } }"
  },
  {
    test: /parent.*reutilizar.*Empleado/i,
    pistas: ['Empleado: calcularSueldo($horas) → $horas * 15.','EmpleadoSenior: return parent::calcularSueldo($horas) + 200;','El parent:: obtiene el base y le sumas el bonus.'],
    solucion: "class Empleado {\n    public function calcularSueldo($horas) { return $horas * 15; }\n}\nclass EmpleadoSenior extends Empleado {\n    public function calcularSueldo($horas) {\n        return parent::calcularSueldo($horas) + 200;\n    }\n}"
  },
  {
    test: /Caso exacto.*examen.*Veh/i,
    pistas: ['Vehiculo: calcularAlquiler($dias) → $this->precioDia * $dias.','Coche: $base = parent::calcularAlquiler($dias); if diésel → $base * 1.1.','Motocicleta: $base = parent::...; if casco → $base + 10.'],
    solucion: "// En Coche:\npublic function calcularAlquiler($dias) {\n    $base = parent::calcularAlquiler($dias);\n    if (strtolower($this->tipoCombustible) === \"diésel\") return $base * 1.1;\n    return $base;\n}\n// En Motocicleta:\npublic function calcularAlquiler($dias) {\n    $base = parent::calcularAlquiler($dias);\n    if ($this->incluyeCasco) return $base + 10;\n    return $base;\n}"
  },
  {
    test: /Setter polim.*rfico/i,
    pistas: ['Producto: setPrecio($p) { $this->precio = $p; }','ProductoRebajado: setPrecio($p) { $this->precio = $p * 0.9; }','El getter devuelve $this->precio . \"€\".'],
    solucion: "class Producto {\n    private $nombre; protected $precio;\n    public function __construct($n, $p) { $this->nombre=$n; $this->precio=$p; }\n    public function setPrecio($p) { $this->precio = $p; }\n    public function getPrecio() { return $this->precio . \"€\"; }\n}\nclass ProductoRebajado extends Producto {\n    public function setPrecio($p) { $this->precio = $p * 0.9; }\n}"
  },

  // ────────────── DÍA 2 — BLOQUE 2 ──────────────
  {
    test: /Decodificar JSON b/i,
    pistas: ['json_decode($json, true) — true para array asociativo.','Accede con $datos[\"nombre\"], $datos[\"edad\"], etc.','Muestra cada campo con echo.'],
    solucion: "$json = '{\"nombre\":\"Ana\",\"edad\":25,\"ciudad\":\"Valencia\"}';\n$datos = json_decode($json, true);\necho \"Nombre: \" . $datos[\"nombre\"] . \"<br>\";\necho \"Edad: \" . $datos[\"edad\"] . \"<br>\";\necho \"Ciudad: \" . $datos[\"ciudad\"];"
  },
  {
    test: /Nodos de servidor/i,
    pistas: ['Decodifica con json_decode($json, true).','Recorre con foreach($nodos as $nombre => $carga).','Lleva $max y $min, compara en cada vuelta.'],
    solucion: "$nodos = json_decode($json, true);\n$max = 0; $min = 999; $nodoMax = \"\"; $nodoMin = \"\";\nforeach ($nodos as $nombre => $carga) {\n    if ($carga > $max) { $max = $carga; $nodoMax = $nombre; }\n    if ($carga < $min) { $min = $carga; $nodoMin = $nombre; }\n}\necho \"Mayor: $nodoMax ($max%) — Menor: $nodoMin ($min%)\";"
  },
  {
    test: /estad.*sticas por departamento/i,
    pistas: ['Crea $porDepto = []; agrupa: $porDepto[$emp[\"departamento\"]][] = $emp[\"salario\"];','Recorre $porDepto as $depto => $salarios.','Media: array_sum($salarios) / count($salarios).'],
    solucion: "$porDepto = [];\nforeach ($empleados as $emp) {\n    $porDepto[$emp[\"departamento\"]][] = $emp[\"salario\"];\n}\nforeach ($porDepto as $depto => $salarios) {\n    $media = array_sum($salarios) / count($salarios);\n    echo \"$depto: {$media}€<br>\";\n}"
  },

  // ────────────── DÍA 3 — BLOQUE 1: PDO (patrón Vicente) ──────────────
  {
    test: /Entiende la clase Conexion|antes de crearla/i,
    pistas: [
      'a) Si cambias la contraseña solo tocas config.json, no todos los archivos PHP que se conectan.',
      'b) "mysql" es el nombre del contenedor en la red interna de Docker. Desde fuera (tu PC) sería localhost, pero PHP corre dentro del contenedor y ve la red Docker.',
      'c) DSN = "mysql:host=mysql;dbname=dia3_ejercicios;charset=utf8mb4". Tres partes: tipo de BD (mysql:), servidor y BD (host=...;dbname=...), codificación (charset=).',
      'd) $this->conn es privada — no se puede acceder desde fuera de la clase. getConn() expone solo lo necesario (encapsulación).'
    ],
    solucion: "echo 'a) Para no repetir credenciales en cada archivo. Si cambias la contraseña, solo editas config.json.<br>';\necho 'b) En Docker, los contenedores se comunican por nombre. PHP corre en el contenedor php, MySQL en el contenedor mysql.<br>';\necho 'c) DSN identifica el tipo de BD y dónde está: mysql:host=mysql;dbname=dia3_ejercicios;charset=utf8mb4<br>';\necho 'd) $this->conn es privada. getConn() es el getter que la expone de forma controlada (encapsulación).';"
  },
  {
    test: /config\.json/i,
    pistas: ['Crea el JSON como string: $configData = \'{\"host\":\"localhost\",...}\';','Decodifica: $config = json_decode($configData, true);','Lee cada campo: echo $config[\"host\"]; echo $config[\"db\"]; etc.'],
    solucion: "$configData = '{\"host\":\"localhost\",\"userName\":\"root\",\"password\":\"\",\"db\":\"mi_tienda\"}';\n$config = json_decode($configData, true);\necho \"Host: \" . $config[\"host\"] . \"<br>\";\necho \"User: \" . $config[\"userName\"] . \"<br>\";\necho \"DB: \" . $config[\"db\"];"
  },
  {
    test: /Conexion.*leer config.*propiedades/i,
    pistas: ['Propiedades privadas: $host, $userName, $password, $db, $conn.','En __construct: lee JSON, decodifica, asigna $this->host = $config[\"host\"]; etc.','Getter: public function getHost() { return $this->host; }'],
    solucion: "class Conexion {\n    private $host;\n    private $userName;\n    private $password;\n    private $db;\n    private $conn;\n    public function __construct() {\n        $configData = '{\"host\":\"localhost\",\"userName\":\"root\",\"password\":\"\",\"db\":\"mi_tienda\"}';\n        $config = json_decode($configData, true);\n        $this->host = $config[\"host\"];\n        $this->userName = $config[\"userName\"];\n        $this->password = $config[\"password\"];\n        $this->db = $config[\"db\"];\n    }\n    public function getHost() { return $this->host; }\n}"
  },
  {
    test: /Conexion.*construir DSN/i,
    pistas: ['DSN MySQL: \"mysql:host={$this->host};dbname={$this->db};charset=utf8mb4\"','Crear PDO: $this->conn = new PDO($dsn, $this->userName, $this->password);','Para probar sin MySQL: $this->conn = crearBdPrueba();'],
    solucion: "// Dentro del __construct, después de guardar propiedades:\n// MySQL (examen):\n//   $dsn = \"mysql:host={$this->host};dbname={$this->db};charset=utf8mb4\";\n//   $this->conn = new PDO($dsn, $this->userName, $this->password);\n// SQLite (para probar):\n$this->conn = crearBdPrueba();\n\npublic function getConn() { return $this->conn; }"
  },
  {
    test: /a pi.*sin preparar/i,
    pistas: ['Solo cuando NO hay datos del usuario en la consulta.','$stmt = $conexion->getConn()->query($query);','$result = $stmt->fetchAll(PDO::FETCH_ASSOC);'],
    solucion: "$query = \"SELECT * FROM productos\";\n$stmt = $conexion->getConn()->query($query);\n$result = $stmt->fetchAll(PDO::FETCH_ASSOC);\nforeach ($result as $fila) {\n    echo $fila[\"nombre\"] . \" - \" . $fila[\"precio\"] . \"€<br>\";\n}"
  },
  {
    test: /preparada con \?/i,
    pistas: ['Usa ? como marcadores: \"SELECT * FROM productos WHERE nombre = ?\"','Prepara: $stmt = $conexion->getConn()->prepare($query);','Ejecuta pasando array: $stmt->execute([\"Monitor\"]);'],
    solucion: "// Un parámetro\n$query = \"SELECT * FROM productos WHERE nombre = ?\";\n$stmt = $conexion->getConn()->prepare($query);\n$stmt->execute([\"Monitor\"]);\n$fila = $stmt->fetch(PDO::FETCH_ASSOC);\nif ($fila) echo $fila[\"nombre\"] . \" - \" . $fila[\"precio\"] . \"€\";\n\n// Dos parámetros\n$query = \"SELECT * FROM productos WHERE precio > ? AND precio < ?\";\n$stmt = $conexion->getConn()->prepare($query);\n$stmt->execute([20, 100]);\n$filas = $stmt->fetchAll(PDO::FETCH_ASSOC);"
  },
  {
    test: /preparada con :nombre/i,
    pistas: ['Usa :id como marcador: \"SELECT * FROM productos WHERE id = :id\"','Después bindValue: $stmt->bindValue(\":id\", 3);','execute() sin array — los valores ya están bindeados.'],
    solucion: "$query = \"SELECT * FROM productos WHERE id = :id\";\n$stmt = $conexion->getConn()->prepare($query);\n$stmt->bindValue(\":id\", 3);\n$stmt->execute();\n$fila = $stmt->fetch(PDO::FETCH_ASSOC);\necho $fila[\"nombre\"]; // Monitor\n\n// INSERT:\n$query = \"INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)\";\n$stmt = $conexion->getConn()->prepare($query);\n$stmt->bindValue(\":nombre\", \"USB Hub\");\n$stmt->bindValue(\":precio\", 12.99);\n$stmt->execute();"
  },
  {
    test: /DELETE y comprobaci/i,
    pistas: ['Mismo patrón que SELECT: prepare, bindValue, execute.','$query = \"DELETE FROM productos WHERE id = :id\";','Comprueba con un SELECT * después.'],
    solucion: "$query = \"DELETE FROM productos WHERE id = :id\";\n$stmt = $conexion->getConn()->prepare($query);\n$stmt->bindValue(\":id\", 2);\n$stmt->execute();\n\n// Comprobar\n$stmt2 = $conexion->getConn()->query(\"SELECT * FROM productos\");\nforeach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $p) {\n    echo $p[\"nombre\"] . \"<br>\";\n}"
  },

  // ────────────── DÍA 3 — BLOQUE 2: INSTANCIACIÓN CONDICIONAL ──────────────
  {
    test: /instanciar seg.*n.*campo tipo/i,
    pistas: ['Después del fetch, lee $fila[\"tipoVehiculo\"].','if == \"Coche\" → new Coche(...); else → new Motocicleta(...);','Cada subclase tiene parámetros diferentes.'],
    solucion: "$fila = $stmt->fetch(PDO::FETCH_ASSOC);\nif ($fila) {\n    if ($fila[\"tipoVehiculo\"] == \"Coche\") {\n        return new Coche($fila[\"marca\"], $fila[\"modelo\"],\n            $fila[\"matricula\"], $fila[\"precioDia\"],\n            $fila[\"numeroPuertas\"], $fila[\"tipoCombustible\"], $fila[\"id\"]);\n    } else {\n        return new Motocicleta($fila[\"marca\"], $fila[\"modelo\"],\n            $fila[\"matricula\"], $fila[\"precioDia\"],\n            $fila[\"cilindrada\"], $fila[\"incluyeCasco\"], $fila[\"id\"]);\n    }\n}\nreturn null;"
  },
  {
    test: /Completar buscar.*enum/i,
    pistas: ['El fetch ya está hecho. Solo falta el if/switch.','Lee $value[\"tipoVehiculo\"] — es \"Coche\" o \"Motocicleta\".','Pasa los campos correctos al constructor de cada subclase.'],
    solucion: "if ($value = $stmt->fetch(PDO::FETCH_ASSOC)) {\n    if ($value['tipoVehiculo'] == \"Coche\") {\n        return new Coche($value['marca'], $value['modelo'],\n            $value['matricula'], $value['precioDia'],\n            $value['numeroPuertas'], $value['tipoCombustible'], $value['id']);\n    } else {\n        return new Motocicleta($value['marca'], $value['modelo'],\n            $value['matricula'], $value['precioDia'],\n            $value['cilindrada'], $value['incluyeCasco'], $value['id']);\n    }\n}\nreturn null;"
  },
  {
    test: /getAll.*instanciaci/i,
    pistas: ['fetchAll + foreach en vez de fetch solo.','Dentro del foreach, mismo if/switch que buscar().','$vehiculos[] = new Coche(...); para añadir al array.'],
    solucion: "public function getAll() {\n    $vehiculos = [];\n    $stmt = $this->db->query(\"SELECT * FROM flotaVehiculos\");\n    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $f) {\n        if ($f[\"tipoVehiculo\"] == \"Coche\") {\n            $vehiculos[] = new Coche(...);\n        } else {\n            $vehiculos[] = new Motocicleta(...);\n        }\n    }\n    return $vehiculos;\n}"
  },

  // ────────────── DÍA 3 — BLOQUE 3: MVC ──────────────
  {
    test: /Esquema.*responsabilidades/i,
    pistas: ['index.php: punto de entrada, switch/case con la acción.','Controller: ejecuta lógica, llama al Gestor.','Gestor: hace consultas PDO. Vistas: muestran HTML.'],
    solucion: "INDEX.PHP → recibe acción (switch/case) → llama Controller\nCONTROLLER → ejecuta lógica → llama Gestor/Manager\nGESTOR → consultas PDO → devuelve objetos (Modelos)\nCONTROLLER → recibe datos → carga Vista\nVISTA → muestra HTML al usuario\n$_SESSION → estado entre peticiones"
  },
  {
    test: /Flujo.*alta.*CRUD/i,
    pistas: ['Usuario rellena formulario (Vista) → POST a index.php.','index.php detecta accion=insertar → Controller->insertar().','Controller recoge $_POST, crea objeto, llama gestor->insertar(), redirige.'],
    solucion: "1. Usuario ve formulario (VISTA)\n2. Rellena y pulsa Guardar → POST a index.php?accion=insertar\n3. INDEX: switch(\"insertar\") → $controller->insertar()\n4. CONTROLLER: recoge $_POST, crea $producto = new Producto(...)\n5. Llama $this->gestor->insertar($producto)\n6. GESTOR: INSERT con prepare/bindValue/execute\n7. CONTROLLER: header(\"Location: index.php?accion=listar\")\n8. Usuario ve lista actualizada"
  },
  {
    test: /Identificar.*componentes/i,
    pistas: ['SQL/PDO → Gestor. HTML/echo datos → Vista.','$_POST/$_GET + llama gestor → Controller.','switch accion → index.php. Propiedades/getters → Modelo.'],
    solucion: "A) SQL/PDO/prepare → GESTOR/MANAGER\nB) HTML/formulario/echo datos → VISTA\nC) $_POST + llama gestor + header() → CONTROLLER\nD) switch($_GET[\"accion\"]) → INDEX.PHP\nE) class con propiedades/getters → MODELO"
  },

  // ────────────── DÍA 3 — BLOQUE 4: INTEGRADOR ──────────────
  {
    test: /cl.*nica veterinaria|CRUD completo/i,
    pistas: ['Animal (padre) con id, nombre, edad. Perro añade raza. Gato añade interior.','GestorAnimales: buscar($id) → fetch → if tipo==\"Perro\" new Perro() else new Gato().','insertar: usa instanceof para saber el tipo. getAll: fetchAll + foreach con if.'],
    solucion: "// CLASES: Animal, Perro extends Animal, Gato extends Animal\n// TABLA: animales (id, tipo, nombre, edad, raza, interior)\n// GESTOR:\n//   buscar($id) → fetch → if tipo==\"Perro\" → new Perro() else → new Gato()\n//   getAll() → fetchAll → foreach con el mismo if\n//   insertar($a) → if ($a instanceof Perro) tipo=\"Perro\"\n//   eliminar($id) → DELETE con prepare"
  },

  // ────────────── DÍA 4 — BLOQUE 1: SESIONES ──────────────
  {
    test: /Iniciar sesi.*n y guardar/i,
    pistas: ['$_SESSION[\"usuario_nombre\"] = \"Héctor\";','Asigna cada campo: nombre, email, rol.','echo para confirmar.'],
    solucion: "$_SESSION['usuario_nombre'] = 'Héctor';\n$_SESSION['usuario_email'] = 'hector@florida.es';\n$_SESSION['usuario_rol'] = 'alumno';\necho \"Sesión iniciada para \" . $_SESSION['usuario_nombre'];"
  },
  {
    test: /Leer y comprobar.*isset/i,
    pistas: ['if (isset($_SESSION[\"usuario_nombre\"])) { ... }','Si existe: muestra los 3 campos.','Si no existe: \"No hay sesión activa\".'],
    solucion: "if (isset($_SESSION['usuario_nombre'])) {\n    echo \"Bienvenido, \" . $_SESSION['usuario_nombre']\n       . \" (\" . $_SESSION['usuario_email'] . \")\"\n       . \" — Rol: \" . $_SESSION['usuario_rol'];\n} else {\n    echo \"No hay sesión activa\";\n}"
  },
  {
    test: /Destruir sesi.*n.*logout/i,
    pistas: ['Primero: $_SESSION = [];','Luego: session_destroy();','echo para confirmar.'],
    solucion: "$_SESSION = [];\nsession_destroy();\necho \"Sesión cerrada correctamente\";"
  },
  {
    test: /GET a SESSION/i,
    pistas: ['$_SESSION[\"tipo_usuario\"] = $pagina;','Luego lee de $_SESSION, no de $pagina.','Muestra el valor leído de sesión.'],
    solucion: "$_SESSION['tipo_usuario'] = $pagina;\necho \"Guardado: \" . $_SESSION['tipo_usuario'];"
  },

  // ────────────── DÍA 4 — BLOQUE 2: COOKIES ──────────────
  {
    test: /Crear una cookie b/i,
    pistas: ['setcookie(\"color_favorito\", \"azul\", time() + 3600);','time() + 3600 = 1 hora en segundos.','echo para confirmar (la cookie no aparece en $_COOKIE hasta recargar).'],
    solucion: "setcookie(\"color_favorito\", \"azul\", time() + 3600);\necho \"Cookie creada con valor 'azul'\";"
  },
  {
    test: /Leer una cookie/i,
    pistas: ['isset($_COOKIE[\"color_favorito\"])','Si existe → muestra el valor.','Si no → \"recarga la página\".'],
    solucion: "if (isset($_COOKIE[\"color_favorito\"])) {\n    echo \"Color: \" . $_COOKIE[\"color_favorito\"];\n} else {\n    echo \"Cookie no existe (recarga)\";\n}"
  },
  {
    test: /Borrar una cookie/i,
    pistas: ['setcookie(\"color_favorito\", \"\", time() - 3600);','Expiración en el pasado = el navegador la borra.','echo para confirmar.'],
    solucion: "setcookie(\"color_favorito\", \"\", time() - 3600);\necho \"Cookie eliminada\";"
  },
  {
    test: /opciones de seguridad/i,
    pistas: ['setcookie(\"token\", \"abc\", [\"expires\"=>..., \"path\"=>\"/\", ...]);','86400 * 30 = 30 días.','httponly: true, samesite: \"Strict\".'],
    solucion: "setcookie(\"token_usuario\", \"abc123\", [\n    'expires'  => time() + (86400 * 30),\n    'path'     => '/',\n    'httponly'  => true,\n    'samesite' => 'Strict'\n]);\necho \"Cookie segura creada\";"
  },
  {
    test: /Crear.*leer y borrar en secuencia/i,
    pistas: ['1. setcookie() para crear. 2. $_COOKIE para leer. 3. setcookie con time pasado.','En la misma petición no ves el valor nuevo.','El patrón de código es lo importante.'],
    solucion: "setcookie(\"idioma\", \"es\", time()+(86400*7));\necho \"Creada<br>\";\nif (isset($_COOKIE[\"idioma\"])) echo \"Idioma: \" . $_COOKIE[\"idioma\"] . \"<br>\";\nelse echo \"No disponible aún<br>\";\nsetcookie(\"idioma\", \"\", time()-3600);\necho \"Borrada\";"
  },

  // ────────────── DÍA 4 — BLOQUE 3: RECORDAR USUARIO ──────────────
  {
    test: /Login b.*sico con sesi.*n/i,
    pistas: ['Simula: $email = \"hector@florida.es\"; $ok = true;','if ($ok): $_SESSION[\"usuario_id\"] = 1; $_SESSION[\"usuarioEmail\"] = $email;','echo para confirmar.'],
    solucion: "$email = \"hector@florida.es\";\n$ok = true;\nif ($ok) {\n    $_SESSION['usuario_id'] = 1;\n    $_SESSION['usuarioEmail'] = $email;\n    echo \"Login correcto para $email<br>\";\n}\necho \"Sesión: \" . $_SESSION['usuarioEmail'];"
  },
  {
    test: /Recordarme.*cookie.*login/i,
    pistas: ['Después de $_SESSION, comprueba if ($recordar).','setcookie(\"usuario_login\", base64_encode($email), [...opciones...]);','expires 30 días, path /, httponly, samesite Strict.'],
    solucion: "if ($recordar) {\n    setcookie(\"usuario_login\", base64_encode($email), [\n        'expires'  => time() + (86400 * 30),\n        'path'     => '/',\n        'httponly'  => true,\n        'samesite' => 'Strict'\n    ]);\n    echo \"Cookie recordar creada\";\n}"
  },
  {
    test: /Auto-login desde cookie/i,
    pistas: ['if (isset($_COOKIE[\"usuario_login\"]))','$email = base64_decode($_COOKIE[\"usuario_login\"]);','$_SESSION[\"usuarioEmail\"] = $email;'],
    solucion: "if (isset($_COOKIE[\"usuario_login\"])) {\n    $email = base64_decode($_COOKIE[\"usuario_login\"]);\n    $_SESSION['usuarioEmail'] = $email;\n    echo \"Auto-login: $email\";\n} else {\n    echo \"No hay cookie\";\n}"
  },
  {
    test: /Logout completo.*sesi.*n.*cookie/i,
    pistas: ['$_SESSION = []; session_destroy();','if (isset($_COOKIE[\"usuario_login\"])) setcookie(..., time()-3600000, \"/\");','El path \"/\" debe coincidir con el de creación.'],
    solucion: "$_SESSION = [];\nsession_destroy();\nif (isset($_COOKIE['usuario_login'])) {\n    setcookie('usuario_login', '', time() - 3600000, '/');\n}\necho \"Sesión cerrada y cookie eliminada\";"
  },
  {
    test: /login.*recordar.*tienda/i,
    pistas: ['Clase Usuario + array $bbdd con password_hash.','buscarPorEmail recorre con foreach, compara email.','Login: buscar → password_verify → SESSION + cookie → logout limpia todo.'],
    solucion: "// 1. Clase Usuario (id, nombre, email, password, rol)\n// 2. $bbdd = array con password_hash()\n// 3. function buscarPorEmail($bbdd, $email) { foreach... }\n// 4. Login: buscar → password_verify → $_SESSION + cookie\n// 5. Auto-login: isset($_COOKIE) → decode → buscar → SESSION\n// 6. Logout: $_SESSION=[]; session_destroy(); borrar cookie"
  },

  // ────────────── SIMULACRO 1 — GIMNASIO FITFLORIDA ──────────────
  {
    test: /Asistencias de socios|socio.*asiduo/i,
    pistas: ['Para la media: $total += $num en el foreach, luego $media = $total / count($asistencias).','Para el más asiduo: inicializa $maxNum = 0; if ($num > $maxNum) actualiza $maxSocio.','Para los que vienen > 12: if ($num > 12) echo $nombre;'],
    solucion: "// a) Más de 12:\nforeach ($asistencias as $nombre => $num) {\n    if ($num > 12) echo \"$nombre: $num veces<br>\";\n}\n// b) Media:\n$total = 0;\nforeach ($asistencias as $num) { $total += $num; }\necho \"Media: \" . round($total / count($asistencias), 1) . \"<br>\";\n// c) Más asiduo:\n$maxNum = 0; $maxSocio = \"\";\nforeach ($asistencias as $nombre => $num) {\n    if ($num > $maxNum) { $maxNum = $num; $maxSocio = $nombre; }\n}\necho \"Más asiduo: $maxSocio ($maxNum veces)\";"
  },
  {
    test: /BonoAnual|precioFinal.*descuento.*Bono|Clase Bono/i,
    pistas: ['$this->precioFinal = $precioBase - ($precioBase * $descuento); — el cálculo va DENTRO del constructor.','getPrecioFinal() → return $this->precioFinal . "€"; getNombre() → return strtoupper($this->nombre);','BonoAnual extends Bono: constructor recibe nombre, precioBase, regalo. Llama parent::__construct($nombre, $precioBase).'],
    solucion: "class Bono {\n    private $nombre, $precioBase, $precioFinal, $descuento;\n    public function __construct($nombre, $precioBase, $descuento = 0.10) {\n        $this->nombre = $nombre;\n        $this->precioBase = $precioBase;\n        $this->descuento = $descuento;\n        $this->precioFinal = $precioBase - ($precioBase * $descuento);\n    }\n    public function getPrecioFinal() { return $this->precioFinal . \"€\"; }\n    public function getNombre() { return strtoupper($this->nombre); }\n}\nclass BonoAnual extends Bono {\n    private $regalo;\n    public function __construct($nombre, $precioBase, $regalo) {\n        parent::__construct($nombre, $precioBase);\n        $this->regalo = $regalo;\n    }\n    public function getRegalo() { return $this->regalo; }\n}"
  },
  {
    test: /clasificarBonos/i,
    pistas: ['Inicializa $r = ["baratos" => 0, "caros" => 0];','Usa floatval($bono->getPrecioFinal()) para obtener el número sin el €.','if ($precio < 50) $r["baratos"]++; else $r["caros"]++; return $r; — el echo va FUERA.'],
    solucion: "function clasificarBonos($lista) {\n    $r = [\"baratos\" => 0, \"caros\" => 0];\n    foreach ($lista as $bono) {\n        $precio = floatval($bono->getPrecioFinal());\n        if ($precio < 50) $r[\"baratos\"]++;\n        else $r[\"caros\"]++;\n    }\n    return $r;\n}\n$result = clasificarBonos($listaBonos);\necho \"Baratos: \" . $result[\"baratos\"] . \" — Caros: \" . $result[\"caros\"];"
  },
  {
    test: /SalaFitness|ContadorAccesos.*Singleton/i,
    pistas: ['ContadorAccesos → Singleton: añade private static $instancia = null; haz el constructor private; añade getInstance().','SalaFitness: elimina el extends. Añade private $contador; En constructor: $this->contador = ContadorAccesos::getInstance();','En entraSocio(): $this->contador->registrarAcceso(...); — así el contador es compartido entre todas las salas.'],
    solucion: "class ContadorAccesos {\n    private static $instancia = null;\n    private $totalAccesos = 0;\n    private function __construct() {}\n    public static function getInstance() {\n        if (self::$instancia === null) self::$instancia = new self();\n        return self::$instancia;\n    }\n    public function registrarAcceso($socio) {\n        $this->totalAccesos++;\n        echo \"Acceso \" . $this->totalAccesos . \": $socio<br>\";\n    }\n}\nclass SalaFitness {\n    private $nombreSala, $contador;\n    public function __construct($nombreSala) {\n        $this->nombreSala = $nombreSala;\n        $this->contador = ContadorAccesos::getInstance();\n    }\n    public function entraSocio($socio) {\n        $this->contador->registrarAcceso(\"$socio entra en \" . $this->nombreSala);\n    }\n}"
  },
  {
    test: /sala_yoga|sala_spinning|salas.*llena|ocupaci.n de salas/i,
    pistas: ['json_decode($jsonSalas, true) devuelve array asociativo sala → personas.','Inicializa $max = 0; $min = 999; y sus nombres. Recorre con foreach($salas as $sala => $personas).','En cada vuelta: if ($personas > $max) actualiza; if ($personas < $min) actualiza.'],
    solucion: "$salas = json_decode($jsonSalas, true);\n$max = 0; $min = 999; $salaMax = \"\"; $salaMin = \"\";\nforeach ($salas as $sala => $personas) {\n    if ($personas > $max) { $max = $personas; $salaMax = $sala; }\n    if ($personas < $min) { $min = $personas; $salaMin = $sala; }\n}\necho \"Más llena: $salaMax ($max personas)<br>\";\necho \"Menos llena: $salaMin ($min personas)\";"
  },
  {
    test: /GestorActividades|tipoActividad.*ENUM|tipoActividad.*Colectiva/i,
    pistas: ['$fila = $stmt->fetch(PDO::FETCH_ASSOC); — si no hay fila, fetch devuelve false.','if ($fila["tipoActividad"] == "Colectiva") → new Colectiva($fila["nombre"], $fila["precioMes"], $fila["aforoMax"], $fila["id"])','else → new Personal($fila["nombre"], $fila["precioMes"], $fila["entrenador"], $fila["id"]). return null si $fila es false.'],
    solucion: "public function buscar($id) {\n    $sql = \"SELECT * FROM actividades WHERE id = :id\";\n    $stmt = $this->db->prepare($sql);\n    $stmt->bindValue(':id', $id);\n    $stmt->execute();\n    if ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {\n        if ($fila[\"tipoActividad\"] == \"Colectiva\") {\n            return new Colectiva($fila[\"nombre\"], $fila[\"precioMes\"], $fila[\"aforoMax\"], $fila[\"id\"]);\n        } else {\n            return new Personal($fila[\"nombre\"], $fila[\"precioMes\"], $fila[\"entrenador\"], $fila[\"id\"]);\n        }\n    }\n    return null;\n}"
  },
  {
    test: /calcularPrecio.*aforoMax|aforoMax.*calcularPrecio|Polimorfismo.*calcularPrecio.*FitFlorida/i,
    pistas: ['En Colectiva: $base = parent::calcularPrecio($meses); if ($this->aforoMax > 20) return $base * 0.95;','En Personal: return parent::calcularPrecio($meses) + (10 * $meses);','Ambas usan parent::calcularPrecio($meses) para obtener el coste base sin duplicar lógica.'],
    solucion: "// En Actividad (padre):\npublic function calcularPrecio($meses) { return $this->precioMes * $meses; }\n\n// En Colectiva:\npublic function calcularPrecio($meses) {\n    $base = parent::calcularPrecio($meses);\n    if ($this->aforoMax > 20) return $base * 0.95;\n    return $base;\n}\n// En Personal:\npublic function calcularPrecio($meses) {\n    return parent::calcularPrecio($meses) + (10 * $meses);\n}"
  },
  {
    test: /socio_login|Recordar.*socio/i,
    pistas: ['Crear cookie: setcookie("socio_login", base64_encode($emailSocio), ["expires"=>time()+(86400*30),"path"=>"/","httponly"=>true,"samesite"=>"Strict"]);','Auto-login: if (isset($_COOKIE["socio_login"])) { $email = base64_decode($_COOKIE["socio_login"]); $_SESSION["socioEmail"] = $email; }','Logout: $_SESSION = []; session_destroy(); if (isset($_COOKIE["socio_login"])) setcookie("socio_login", "", time()-3600000, "/");'],
    solucion: "// 1. Al hacer login con recordarme:\nif ($recordarme) {\n    setcookie(\"socio_login\", base64_encode($emailSocio), [\n        'expires' => time() + (86400 * 30),\n        'path' => '/', 'httponly' => true, 'samesite' => 'Strict'\n    ]);\n}\n// 2. Al cargar (ANTES del formulario de login):\nif (isset($_COOKIE[\"socio_login\"])) {\n    $email = base64_decode($_COOKIE[\"socio_login\"]);\n    $_SESSION['socioEmail'] = $email;\n    echo \"Sesión restaurada: $email<br>\";\n}\n// 3. Logout:\nfunction logout() {\n    $_SESSION = []; session_destroy();\n    if (isset($_COOKIE['socio_login'])) setcookie('socio_login', '', time()-3600000, '/');\n}"
  },
  {
    test: /MVC.*alta.*actividad|dar.*alta.*actividad.*MVC|flujo.*alta.*actividad/i,
    pistas: ['Paso 1: usuario ve formulario (Vista). Paso 2: rellena y pulsa Guardar → POST a index.php?accion=insertar.','Paso 3: index.php detecta accion=insertar → $controller->insertar(). Paso 4: Controller recoge $_POST, crea $actividad.','Paso 5: llama $gestor->insertar($actividad). Paso 6: Gestor hace INSERT. Paso 7: header() redirige. Paso 8: usuario ve lista.'],
    solucion: "1. Usuario ve formulario (VISTA)\n2. Rellena nombre, tipo, precio → POST a index.php?accion=insertar\n3. INDEX.PHP: switch(\"insertar\") → $controller->insertar()\n4. CONTROLLER: recoge $_POST, crea $actividad = new Actividad(...)\n5. Llama $this->gestor->insertar($actividad)\n6. GESTOR: INSERT INTO actividades... (prepare/bindValue/execute)\n7. CONTROLLER: header(\"Location: index.php?accion=listar\")\n8. Usuario ve lista actualizada"
  },

  // ────────────── SIMULACRO 2 — ACADEMIA CURSOSFLORIDA ──────────────
  {
    test: /Notas de los alumnos|nota media.*alumno|media.*Elena.*Marcos/i,
    pistas: ['Para la media de cada alumno: $suma = 0; foreach ($notas as $n) { $suma += $n; } $media = $suma / count($notas);','Para el mejor alumno: guarda $mejorMedia = 0 y $mejorNombre; compara en cada vuelta del foreach externo.','Para contar aprobados: if ($media >= 6) $aprobados++;'],
    solucion: "$mejorMedia = 0; $mejorNombre = \"\"; $aprobados = 0;\nforeach ($notas as $nombre => $ns) {\n    $suma = 0;\n    foreach ($ns as $n) { $suma += $n; }\n    $media = round($suma / count($ns), 2);\n    echo \"$nombre: {$media}<br>\";\n    if ($media > $mejorMedia) { $mejorMedia = $media; $mejorNombre = $nombre; }\n    if ($media >= 6) $aprobados++;\n}\necho \"Mejor: $mejorNombre ($mejorMedia)<br>\";\necho \"Aprobados: $aprobados\";"
  },
  {
    test: /CursoOnline.*horasVideo|CursoOnline.*plataforma|Clase Curso y CursoOnline/i,
    pistas: ['$this->precioFinal = $precioBase + ($precioBase * $iva); — IVA 21% por defecto. Va DENTRO del constructor.','getTitulo() → strtoupper($this->titulo); getPrecioFinal() → $this->precioFinal . "€";','CursoOnline extends Curso: añade $plataforma y $horasVideo. Constructor: parent::__construct($titulo, $precioBase); luego asigna los propios.'],
    solucion: "class Curso {\n    protected $titulo, $precioBase, $precioFinal, $iva;\n    public function __construct($titulo, $precioBase, $iva = 0.21) {\n        $this->titulo = $titulo;\n        $this->precioBase = $precioBase;\n        $this->iva = $iva;\n        $this->precioFinal = $precioBase + ($precioBase * $iva);\n    }\n    public function getPrecioFinal() { return $this->precioFinal . \"€\"; }\n    public function getTitulo() { return strtoupper($this->titulo); }\n}\nclass CursoOnline extends Curso {\n    private $plataforma, $horasVideo;\n    public function __construct($titulo, $precioBase, $plataforma, $horasVideo) {\n        parent::__construct($titulo, $precioBase);\n        $this->plataforma = $plataforma;\n        $this->horasVideo = $horasVideo;\n    }\n    public function getPlataforma() { return $this->plataforma; }\n    public function getHorasVideo() { return $this->horasVideo; }\n}"
  },
  {
    test: /cursosCertificables/i,
    pistas: ['Inicializa $resultado = []; Recorre $lista con foreach.','if ($curso->getHorasVideo() >= $minHoras) { $resultado[] = $curso->getTitulo(); }','return $resultado; — el echo va fuera: foreach($certifs as $t) echo $t."<br>";'],
    solucion: "function cursosCertificables($lista, $minHoras) {\n    $resultado = [];\n    foreach ($lista as $curso) {\n        if ($curso->getHorasVideo() >= $minHoras) {\n            $resultado[] = $curso->getTitulo();\n        }\n    }\n    return $resultado;\n}\n$certs = cursosCertificables($catalogo, 40);\nforeach ($certs as $titulo) { echo $titulo . \"<br>\"; }"
  },
  {
    test: /GestorMatriculas|NotificadorEmail.*Singleton|notificador.*matr.culas/i,
    pistas: ['NotificadorEmail → Singleton: private static $instancia = null; constructor private; public static function getInstance().','GestorMatriculas: elimina el extends. Añade private $notificador; En constructor: $this->notificador = NotificadorEmail::getInstance();','En matricular(): $this->notificador->enviar($alumno, "Matriculado en " . $this->curso);'],
    solucion: "class NotificadorEmail {\n    private static $instancia = null;\n    private $emailsEnviados = 0;\n    private function __construct() {}\n    public static function getInstance() {\n        if (self::$instancia === null) self::$instancia = new self();\n        return self::$instancia;\n    }\n    public function enviar($destinatario, $asunto) {\n        $this->emailsEnviados++;\n        echo \"Email \" . $this->emailsEnviados . \" → $destinatario: $asunto<br>\";\n    }\n}\nclass GestorMatriculas {\n    private $curso, $notificador;\n    public function __construct($curso) {\n        $this->curso = $curso;\n        $this->notificador = NotificadorEmail::getInstance();\n    }\n    public function matricular($alumno) {\n        $this->notificador->enviar($alumno, \"Matriculado en \" . $this->curso);\n    }\n}"
  },
  {
    test: /jsonProgreso|progreso.*75|porcentaje.*menor/i,
    pistas: ['json_decode($jsonProgreso, true) → array con email como clave y porcentaje como valor.','Recorre con foreach($progreso as $email => $pct). Lleva $contador = 0 para los > 75 y $min = 101 para el menor.','if ($pct > 75) $contador++; if ($pct < $min) { $min = $pct; $emailMin = $email; }'],
    solucion: "$progreso = json_decode($jsonProgreso, true);\n$contador = 0; $min = 101; $emailMin = \"\";\nforeach ($progreso as $email => $pct) {\n    if ($pct > 75) $contador++;\n    if ($pct < $min) { $min = $pct; $emailMin = $email; }\n}\necho \"Más del 75%: $contador alumnos<br>\";\necho \"Menor progreso: $emailMin ($min%)\";"
  },
  {
    test: /GestorCursos|tipoCurso.*ENUM|tipoCurso.*Online/i,
    pistas: ['$fila = $stmt->fetch(PDO::FETCH_ASSOC); — si no hay fila, devuelve false → return null.','if ($fila["tipoCurso"] == "Online") → new CursoOnline($fila["titulo"], $fila["precioBase"], $fila["plataforma"], 0)','else → new CursoPresencial($fila["titulo"], $fila["precioBase"], $fila["aula"]). Programa principal: if ($c) echo... else echo "no encontrado".'],
    solucion: "public function buscar($id) {\n    $sql = \"SELECT * FROM cursos WHERE id = :id\";\n    $stmt = $this->db->prepare($sql);\n    $stmt->bindValue(':id', $id);\n    $stmt->execute();\n    if ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {\n        if ($fila[\"tipoCurso\"] == \"Online\") {\n            return new CursoOnline($fila[\"titulo\"], $fila[\"precioBase\"], $fila[\"plataforma\"], 0);\n        } else {\n            return new CursoPresencial($fila[\"titulo\"], $fila[\"precioBase\"], $fila[\"aula\"]);\n        }\n    }\n    return null;\n}\n// Programa principal:\n$c = $gestor->buscar(3);\nif ($c) { echo $c->getTitulo(); } else { echo \"Curso no encontrado\"; }"
  },
  {
    test: /calcularPrecio.*Premium.*20|CursoPresencial.*material.*5/i,
    pistas: ['En Curso (padre): public function calcularPrecio($alumnos) { return $this->precioFinal * $alumnos; }','En CursoOnline: $base = parent::calcularPrecio($alumnos); if ($this->plataforma == "Premium") return $base * 1.2;','En CursoPresencial: return parent::calcularPrecio($alumnos) + (5 * $alumnos);'],
    solucion: "// Padre:\npublic function calcularPrecio($alumnos) { return $this->precioFinal * $alumnos; }\n// CursoOnline:\npublic function calcularPrecio($alumnos) {\n    $base = parent::calcularPrecio($alumnos);\n    if ($this->plataforma == \"Premium\") return $base * 1.2;\n    return $base;\n}\n// CursoPresencial:\npublic function calcularPrecio($alumnos) {\n    return parent::calcularPrecio($alumnos) + (5 * $alumnos);\n}"
  },
  {
    test: /mantenerSesion|Recordar.*alumno|alumno.*cookie.*30/i,
    pistas: ['Si $mantenerSesion: setcookie("mantener_sesion", base64_encode($emailAlumno), ["expires"=>time()+(86400*30),"path"=>"/","httponly"=>true,"samesite"=>"Strict"]);','Auto-login: if (isset($_COOKIE["mantener_sesion"])) { $email = base64_decode(...); $_SESSION["alumnoEmail"] = $email; }','Logout: $_SESSION = []; session_destroy(); borrar la cookie con setcookie("mantener_sesion", "", time()-3600000, "/");'],
    solucion: "// 1. Login con mantener:\nif ($mantenerSesion) {\n    setcookie(\"mantener_sesion\", base64_encode($emailAlumno), [\n        'expires' => time() + (86400 * 30), 'path' => '/',\n        'httponly' => true, 'samesite' => 'Strict'\n    ]);\n}\n// 2. Al cargar:\nif (isset($_COOKIE[\"mantener_sesion\"])) {\n    $email = base64_decode($_COOKIE[\"mantener_sesion\"]);\n    $_SESSION['alumnoEmail'] = $email;\n    echo \"Sesión restaurada: $email<br>\";\n}\n// 3. Logout:\n$_SESSION = []; session_destroy();\nif (isset($_COOKIE['mantener_sesion'])) setcookie('mantener_sesion', '', time()-3600000, '/');"
  },

  // ────────────── SIMULACRO 3 — CAFETERÍA CAFECODE ──────────────
  {
    test: /Ventas de la semana|CafeCode.*ventas|recaudaci.n.*viernes/i,
    pistas: ['Para el total por producto: $total = 0; foreach ($ventas[$prod] as $dia) { $total += $dia; }','Para el más vendido: guarda $maxTotal = 0; $maxProd = ""; y actualiza en el recorrido exterior.','Para el viernes (índice 4): foreach ($ventas as $prod => $dias) { $totalViernes += $dias[4]; }'],
    solucion: "$maxTotal = 0; $maxProd = \"\"; $totalViernes = 0;\nforeach ($ventas as $prod => $dias) {\n    $total = 0;\n    foreach ($dias as $i => $v) {\n        $total += $v;\n        if ($i == 4) $totalViernes += $v;\n    }\n    echo \"$prod: \" . round($total, 2) . \"€<br>\";\n    if ($total > $maxTotal) { $maxTotal = $total; $maxProd = $prod; }\n}\necho \"Más vendido: $maxProd (\".round($maxTotal,2).\"€)<br>\";\necho \"Recaudación viernes: \".round($totalViernes,2).\"€\";"
  },
  {
    test: /Clase Producto y Bebida|pvp.*margen.*40|Producto.*Bebida.*CafeCode/i,
    pistas: ['$this->pvp = $costeBase + ($costeBase * $this->margen); — el cálculo va DENTRO del constructor.','getPvp() → return round($this->pvp, 2) . "€"; getNombre() → return strtoupper($this->nombre);','setMargen($m): $this->margen = $m; return $this; — devuelve $this para encadenar.'],
    solucion: "class Producto {\n    protected $nombre, $costeBase, $pvp;\n    private $margen;\n    public function __construct($nombre, $costeBase, $margen = 0.40) {\n        $this->nombre = $nombre;\n        $this->costeBase = $costeBase;\n        $this->margen = $margen;\n        $this->pvp = $costeBase + ($costeBase * $margen);\n    }\n    public function getPvp() { return round($this->pvp, 2) . \"€\"; }\n    public function getNombre() { return strtoupper($this->nombre); }\n    public function setMargen($m) { $this->margen = $m; return $this; }\n}\nclass Bebida extends Producto {\n    private $tamanyo;\n    public function __construct($nombre, $costeBase, $tamanyo) {\n        parent::__construct($nombre, $costeBase);\n        $this->tamanyo = $tamanyo;\n    }\n    public function getTamanyo() { return $this->tamanyo; }\n}"
  },
  {
    test: /resumenCarta|masCaro.*masBarato.*precioMedio/i,
    pistas: ['Inicializa $max = 0; $min = 9999; y sus nombres. Recorre con foreach($lista as $p).','Usa floatval($p->getPvp()) para quitar el €. Compara y actualiza $max/$min.','Para la media: $sumaPvp += $precio; luego $media = round($sumaPvp / count($lista), 2);'],
    solucion: "function resumenCarta($lista) {\n    $max = 0; $min = 9999; $masCaro = \"\"; $masBarato = \"\"; $suma = 0;\n    foreach ($lista as $p) {\n        $precio = floatval($p->getPvp());\n        $suma += $precio;\n        if ($precio > $max) { $max = $precio; $masCaro = $p->getNombre(); }\n        if ($precio < $min) { $min = $precio; $masBarato = $p->getNombre(); }\n    }\n    return [\n        \"masCaro\"     => $masCaro,\n        \"masBarato\"   => $masBarato,\n        \"precioMedio\" => round($suma / count($lista), 2)\n    ];\n}\n$r = resumenCarta($carta);\necho \"Más caro: \" . $r['masCaro'] . \"<br>\";\necho \"Más barato: \" . $r['masBarato'] . \"<br>\";\necho \"Precio medio: \" . $r['precioMedio'] . \"€\";"
  },
  {
    test: /caja registradora|CajaRegistradora|TerminalVenta.*Singleton/i,
    pistas: ['CajaRegistradora → Singleton: añade private static $instancia = null; constructor private; public static function getInstance().','TerminalVenta: elimina el extends. Añade private $caja; En constructor: $this->caja = CajaRegistradora::getInstance();','En venta(): echo "TPV " . $this->numero . ": "; $this->caja->cobrar($importe); — la caja es compartida.'],
    solucion: "class CajaRegistradora {\n    private static $instancia = null;\n    private $totalDia = 0;\n    private function __construct() {}\n    public static function getInstance() {\n        if (self::$instancia === null) self::$instancia = new self();\n        return self::$instancia;\n    }\n    public function cobrar($importe) {\n        $this->totalDia += $importe;\n        echo \"Cobrados {$importe}€ — Total día: {$this->totalDia}€<br>\";\n    }\n}\nclass TerminalVenta {\n    private $numero, $caja;\n    public function __construct($numero) {\n        $this->numero = $numero;\n        $this->caja = CajaRegistradora::getInstance();\n    }\n    public function venta($importe) {\n        echo \"TPV \" . $this->numero . \": \";\n        $this->caja->cobrar($importe);\n    }\n}"
  },
  {
    test: /JSON anidado.*pedidos|pedido.*mesa.*items|pedido_101/i,
    pistas: ['json_decode($jsonPedidos, true) → array. Cada valor tiene "mesa" y "items" (otro array).','Para el total de cada pedido: $total = 0; foreach ($pedido["items"] as $item) { $total += $item; }','Para el más caro: guarda $maxTotal = 0; $maxPedido = ""; y su mesa. Actualiza en el foreach exterior.'],
    solucion: "$pedidos = json_decode($jsonPedidos, true);\n$maxTotal = 0; $maxPedido = \"\"; $maxMesa = 0;\nforeach ($pedidos as $id => $pedido) {\n    $total = 0;\n    foreach ($pedido[\"items\"] as $item) { $total += $item; }\n    echo \"$id (mesa \" . $pedido['mesa'] . \"): \" . round($total, 2) . \"€<br>\";\n    if ($total > $maxTotal) { $maxTotal = $total; $maxPedido = $id; $maxMesa = $pedido['mesa']; }\n}\necho \"Más caro: $maxPedido — mesa $maxMesa (\" . round($maxTotal, 2) . \"€)\";"
  },
  {
    test: /buscar.*getAll|getAll.*buscar|CRUD.*dos métodos|GestorProductos/i,
    pistas: ['buscar($id): fetch + if ($fila) { if ($fila["tipoProducto"]=="Bebida") return new Bebida(...); else return new Comida(...); } return null;','getAll(): $stmt = $this->db->query("SELECT * FROM productosCafe"); $filas = $stmt->fetchAll(PDO::FETCH_ASSOC); recorre e instancia igual.','Programa principal: foreach($gestor->getAll() as $p) { echo $p->getNombre()." ".$p->getPvp()."<br>"; } — y comprueba null antes de usar buscar(99).'],
    solucion: "public function buscar(\$id) {\n    \$stmt = \$this->db->prepare(\"SELECT * FROM productosCafe WHERE id = :id\");\n    \$stmt->bindValue(':id', \$id);\n    \$stmt->execute();\n    if (\$fila = \$stmt->fetch(PDO::FETCH_ASSOC)) {\n        return \$fila['tipoProducto'] == 'Bebida'\n            ? new Bebida(\$fila['nombre'], \$fila['precio'], \$fila['tamanyo'])\n            : new Comida(\$fila['nombre'], \$fila['precio'], (bool)\$fila['vegano']);\n    }\n    return null;\n}\npublic function getAll() {\n    \$filas = \$this->db->query(\"SELECT * FROM productosCafe\")->fetchAll(PDO::FETCH_ASSOC);\n    \$lista = [];\n    foreach (\$filas as \$fila) {\n        \$lista[] = \$fila['tipoProducto'] == 'Bebida'\n            ? new Bebida(\$fila['nombre'], \$fila['precio'], \$fila['tamanyo'])\n            : new Comida(\$fila['nombre'], \$fila['precio'], (bool)\$fila['vegano']);\n    }\n    return \$lista;\n}"
  },
  {
    test: /calcularPvp|Bebida.*grande.*0.50|Comida.*vegana.*1€/i,
    pistas: ['En Producto (padre): public function calcularPvp() { return $this->pvp; }','En Bebida: $base = parent::calcularPvp(); if ($this->tamanyo == "grande") return $base + 0.50; return $base;','En Comida: $base = parent::calcularPvp(); if ($this->vegano) return $base + 1; return $base;'],
    solucion: "// Producto:\npublic function calcularPvp() { return $this->pvp; }\n// Bebida:\npublic function calcularPvp() {\n    $base = parent::calcularPvp();\n    return ($this->tamanyo == 'grande') ? $base + 0.50 : $base;\n}\n// Comida:\npublic function calcularPvp() {\n    $base = parent::calcularPvp();\n    return $this->vegano ? $base + 1 : $base;\n}"
  },
  {
    test: /Doble cookie|ultimo_producto|cookie.*preferencia/i,
    pistas: ['Cookie "recordarme": setcookie("cliente_login", base64_encode($email), ["expires"=>time()+86400*30, "path"=>"/", "httponly"=>true, "samesite"=>"Strict"]);','Cookie preferencia (sin httponly): setcookie("ultimo_producto", $productoVisto, ["expires"=>time()+86400*7, "path"=>"/"]);','Al cargar: if (isset($_COOKIE["ultimo_producto"])) echo "La última vez miraste: " . htmlspecialchars($_COOKIE["ultimo_producto"]);'],
    solucion: "// 1. Login con recordarme:\nif (\$recordar) {\n    setcookie('cliente_login', base64_encode(\$emailCliente), [\n        'expires' => time() + (86400 * 30), 'path' => '/',\n        'httponly' => true, 'samesite' => 'Strict'\n    ]);\n    setcookie('ultimo_producto', \$productoVisto, [\n        'expires' => time() + (86400 * 7), 'path' => '/'\n    ]);\n}\n// 2. Al cargar:\nif (isset(\$_COOKIE['cliente_login'])) {\n    \$_SESSION['clienteEmail'] = base64_decode(\$_COOKIE['cliente_login']);\n}\nif (isset(\$_COOKIE['ultimo_producto'])) {\n    echo 'La última vez miraste: ' . htmlspecialchars(\$_COOKIE['ultimo_producto']);\n}\n// 3. Logout:\n\$_SESSION = []; session_destroy();\nsetcookie('cliente_login', '', time()-3600000, '/');\nsetcookie('ultimo_producto', '', time()-3600000, '/');"
  },
  {
    test: /MVC.*identificar|identificar.*componentes.*MVC|fragmento.*MVC/i,
    pistas: ['A) $stmt = $this->db->prepare(...)  →  GESTOR (solo él habla con la BD).','B) HTML con foreach de objetos  →  VISTA (muestra datos, sin lógica de negocio).','C) switch($_GET["accion"])  →  INDEX.PHP (front controller). D) new Bebida + header()  →  CONTROLLER. E) class Comida extends Producto  →  MODELO.'],
    solucion: "A) $stmt = $this->db->prepare(...)  → GESTOR\n   (único que hace SQL / PDO)\nB) <h1> + foreach $productos  → VISTA\n   (solo muestra datos, cero lógica)\nC) switch($_GET[\"accion\"])  → INDEX.PHP\n   (front controller, enruta acciones)\nD) new Bebida + $this->gestor->insertar + header()  → CONTROLLER\n   (coordina: recoge POST, llama Gestor, redirige)\nE) class Comida extends Producto  → MODELO\n   (representa datos con propiedades y getters)"
  },

  // ────────────── DÍA 7 — REPASO FLASH ──────────────
  {
    test: /Singleton de memoria|ConfiguracionApp/i,
    pistas: ['Las 3 piezas: private static $instancia = null; constructor private; getInstance().','Añade un array privado $datos = []; set() escribe, get() lee.','Recuerda: getInstance() comprueba if (self::$instancia === null).'],
    solucion: "class ConfiguracionApp {\n    private static $instancia = null;\n    private $datos = [];\n    private function __construct() {}\n    public static function getInstance() {\n        if (self::$instancia === null) self::$instancia = new self();\n        return self::$instancia;\n    }\n    public function set($clave, $valor) { $this->datos[$clave] = $valor; }\n    public function get($clave) { return $this->datos[$clave]; }\n}"
  },
  {
    test: /Constructor que calcula|Entrada.*cine|recargo/i,
    pistas: ['Propiedades: $pelicula, $precioBase, $precioFinal, $recargo = 0.05.','Dentro del constructor: $this->precioFinal = $precioBase + ($precioBase * $recargo);','Getter: return $this->precioFinal . "€";'],
    solucion: "class Entrada {\n    private $pelicula;\n    private $precioBase;\n    private $precioFinal;\n    private $recargo;\n    public function __construct($pelicula, $precioBase, $recargo = 0.05) {\n        $this->pelicula = $pelicula;\n        $this->precioBase = $precioBase;\n        $this->recargo = $recargo;\n        $this->precioFinal = $precioBase + ($precioBase * $recargo);\n    }\n    public function getPrecioFinal() { return $this->precioFinal . \"€\"; }\n}\n$e = new Entrada(\"Dune\", 8);\necho $e->getPrecioFinal(); // 8.4€"
  },
  {
    test: /diasCalurosos|devuelve sin imprimir.*5 min/i,
    pistas: ['function diasCalurosos($lista, $umbral) { ... return $resultado; }','Recorre con foreach($lista as $dia => $temp) y filtra con if.','$resultado[] = $dia; — y el echo va FUERA de la función.'],
    solucion: "function diasCalurosos($lista, $umbral) {\n    $resultado = [];\n    foreach ($lista as $dia => $temp) {\n        if ($temp > $umbral) {\n            $resultado[] = $dia;\n        }\n    }\n    return $resultado;\n}\n$calurosos = diasCalurosos($temperaturas, 28);\nforeach ($calurosos as $d) { echo $d . \"<br>\"; }"
  },
  {
    test: /Instanciaci.n condicional expr|ClientePremium/i,
    pistas: ['if ($fila["tipo"] == "Premium") → new ClientePremium(...) else → new Cliente(...).','ClientePremium extends Cliente con parent::__construct().','Si $fila fuera false (no hay resultado) → return null.'],
    solucion: "class Cliente {\n    protected $nombre;\n    public function __construct($nombre) { $this->nombre = $nombre; }\n    public function getNombre() { return $this->nombre; }\n}\nclass ClientePremium extends Cliente {\n    private $descuento;\n    public function __construct($nombre, $descuento) {\n        parent::__construct($nombre);\n        $this->descuento = $descuento;\n    }\n}\nif ($fila) {\n    if ($fila[\"tipo\"] == \"Premium\") {\n        $c = new ClientePremium($fila[\"nombre\"], $fila[\"descuento\"]);\n    } else {\n        $c = new Cliente($fila[\"nombre\"]);\n    }\n    echo $c->getNombre();\n}\n// Si $fila fuera false → return null;"
  },
  {
    test: /JSON con m.ximo|jsonVisitas|p.gina m.s visitada/i,
    pistas: ['json_decode($jsonVisitas, true) para array asociativo.','foreach($visitas as $pagina => $num) con $max y acumulador $total.','Compara y suma en el mismo bucle.'],
    solucion: "$visitas = json_decode($jsonVisitas, true);\n$max = 0; $pagMax = \"\"; $total = 0;\nforeach ($visitas as $pagina => $num) {\n    if ($num > $max) { $max = $num; $pagMax = $pagina; }\n    $total += $num;\n}\necho \"Más visitada: $pagMax ($max)<br>\";\necho \"Total: $total\";"
  },
  {
    test: /parent.*dos subclases|EnvioUrgente|EnvioInternacional/i,
    pistas: ['Envio: calcularCoste($kg) { return $kg * 3; }','EnvioUrgente: return parent::calcularCoste($kg) + 5;','EnvioInternacional: return parent::calcularCoste($kg) * 2;'],
    solucion: "class Envio {\n    public function calcularCoste($kg) { return $kg * 3; }\n}\nclass EnvioUrgente extends Envio {\n    public function calcularCoste($kg) {\n        return parent::calcularCoste($kg) + 5;\n    }\n}\nclass EnvioInternacional extends Envio {\n    public function calcularCoste($kg) {\n        return parent::calcularCoste($kg) * 2;\n    }\n}\n// 2 kg → 6 / 11 / 12"
  }
];


/* ──────────────────────────────────────
   Motor: recorre .ejercicio → botones
   ────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.ejercicio, .ej').forEach(ej => {
    const h3 = ej.querySelector('h3');
    if (!h3) return;
    const texto = h3.textContent + ' ' + ej.textContent.substring(0, 400);

    const match = soluciones.find(s => s.test.test(texto));
    if (!match) return;

    const container = document.createElement('div');
    container.className = 'pistas-container';

    /* ── Pistas ── */
    const row = document.createElement('div');
    row.className = 'pistas-row';
    row.innerHTML = '<span class="label-pistas">Pistas:</span>';
    container.appendChild(row);

    match.pistas.forEach((pista, i) => {
      const btn = document.createElement('button');
      btn.className = 'btn-pista';
      btn.textContent = '\uD83D\uDCA1 ' + (i + 1);

      const panel = document.createElement('div');
      panel.className = 'panel-pista';
      panel.innerHTML = '<b>Pista ' + (i + 1) + ':</b> ' + pista;

      btn.addEventListener('click', () => {
        const abierto = panel.classList.contains('visible');
        panel.classList.toggle('visible');
        btn.classList.toggle('usado');
        if (abierto) {
          btn.textContent = '\uD83D\uDCA1 ' + (i + 1);
        }
      });

      row.appendChild(btn);
      container.appendChild(panel);
    });

    /* ── Solución ── */
    const btnSol = document.createElement('button');
    btnSol.className = 'btn-solucion';
    btnSol.textContent = '\uD83D\uDD13 Ver solución';

    const panelSol = document.createElement('div');
    panelSol.className = 'panel-solucion';
    panelSol.textContent = match.solucion;

    btnSol.addEventListener('click', () => {
      panelSol.classList.toggle('visible');
      btnSol.textContent = panelSol.classList.contains('visible')
        ? '\uD83D\uDD12 Ocultar solución'
        : '\uD83D\uDD13 Ver solución';
    });

    container.appendChild(btnSol);
    container.appendChild(panelSol);
    ej.appendChild(container);
  });
});
