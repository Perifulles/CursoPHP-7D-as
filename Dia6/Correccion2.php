<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Día 6 — Corrección Simulacro 2</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 0 auto;
            padding: 30px;
            background: #fafafa;
            color: #222;
            line-height: 1.65
        }

        h1 {
            color: #1b5e20;
            border-bottom: 3px solid #1b5e20;
            padding-bottom: 10px;
            margin: 30px 0 20px;
            font-size: 1.8em
        }

        h2 {
            color: #283593;
            margin: 25px 0 12px;
            font-size: 1.3em
        }

        p {
            margin: 8px 0 12px
        }

        pre {
            background: #1e1e2e;
            color: #cdd6f4;
            padding: 16px 20px;
            border-radius: 8px;
            overflow-x: auto;
            font-size: .88em;
            line-height: 1.5;
            margin: 12px 0;
            white-space: pre-wrap
        }

        code {
            background: #e8eaf6;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: .9em;
            color: #283593
        }

        .sol {
            background: #fff;
            border: 2px solid #a5d6a7;
            border-radius: 10px;
            padding: 18px 22px;
            margin: 18px 0
        }

        .sol h2 {
            color: #1b5e20;
            margin-top: 0
        }

        .criterio {
            background: #fffde7;
            border-left: 4px solid #fbc02d;
            padding: 10px 16px;
            border-radius: 0 8px 8px 0;
            margin: 10px 0;
            font-size: .92em
        }

        .criterio b {
            color: #f57f17
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #546E7A;
            text-decoration: none;
            font-size: .9em
        }

        .back:hover {
            color: #1A237E
        }

        .header-badge {
            display: inline-block;
            background: #1b5e20;
            color: #fff;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: .85em;
            margin-bottom: 8px
        }

        .warn {
            background: #fff3e0;
            border-left: 4px solid #e65100;
            padding: 14px 18px;
            border-radius: 0 8px 8px 0;
            margin: 16px 0
        }

        .warn b {
            color: #e65100
        }
    </style>
<link rel="stylesheet" href="../assets/aula-profesor.css">
</head>

<body>
    <a class="back" href="index.php">← Volver al Día 6</a>
    <span class="header-badge">✅ CORRECCIÓN — Simulacro 2</span>
    <h1>Soluciones: Academia CursosFlorida</h1>

    <div class="warn"><b>⚠️ Solo cuando haya sonado el cronómetro.</b> Corrige con los criterios y suma tu nota. Apunta cada concepto fallado: mañana por la mañana toca repaso de errores antes del Simulacro 3.</div>

    <div class="sol">
        <h2>Ejercicio 1 — Notas de los alumnos (1 pt)</h2>
        <pre>// a) y b) y c) en un solo recorrido
$mejorMedia = 0; $mejorAlumno = ""; $aprobados = 0;
foreach ($notas as $alumno => $modulos) {
    $suma = 0; $cuenta = 0;
    foreach ($modulos as $nota) {
        $suma += $nota;
        $cuenta++;
    }
    $media = $suma / $cuenta;
    echo "$alumno: media " . round($media, 2) . "&lt;br&gt;";
    if ($media > $mejorMedia) {
        $mejorMedia = $media;
        $mejorAlumno = $alumno;
    }
    if ($media >= 6) $aprobados++;
}
echo "Mejor alumno: $mejorAlumno&lt;br&gt;";
echo "Aprobados: $aprobados";</pre>
        <div class="criterio"><b>Criterio:</b> 0,4 medias correctas con bucles · 0,3 mejor alumno · 0,3 conteo aprobados. Usar array_sum → -0,2.</div>
    </div>

    <div class="sol">
        <h2>Ejercicio 2 — Curso y CursoOnline (1,5 pts)</h2>
        <pre>class Curso {
    private $titulo;
    protected $precioBase;
    protected $precioFinal;
    private $iva;

    public function __construct($titulo, $precioBase, $iva = 0.21) {
        $this->titulo = $titulo;
        $this->precioBase = $precioBase;
        $this->iva = $iva;
        $this->precioFinal = $precioBase + ($precioBase * $iva);
    }
    public function getTitulo() { return strtoupper($this->titulo); }
    public function getPrecioFinal() { return $this->precioFinal . "€"; }
}

class CursoOnline extends Curso {
    private $plataforma;
    private $horasVideo;
    public function __construct($titulo, $precioBase, $plataforma, $horasVideo) {
        parent::__construct($titulo, $precioBase);
        $this->plataforma = $plataforma;
        $this->horasVideo = $horasVideo;
    }
    public function getPlataforma() { return $this->plataforma; }
    public function getHorasVideo() { return $this->horasVideo; }
}</pre>
        <div class="criterio"><b>Criterio:</b> 0,5 constructor que calcula dentro · 0,5 getters con formato · 0,5 herencia con parent::. Pasar el precioFinal ya calculado como parámetro → -0,5 (el cálculo DEBE estar en el constructor).</div>
    </div>

    <div class="sol">
        <h2>Ejercicio 3 — cursosCertificables (1 pt)</h2>
        <pre>function cursosCertificables($lista, $minHoras) {
    $titulos = [];
    foreach ($lista as $curso) {
        if ($curso->getHorasVideo() >= $minHoras) {
            $titulos[] = $curso->getTitulo();
        }
    }
    return $titulos;
}

// FUERA de la función:
$certificables = cursosCertificables($catalogo, 30);
foreach ($certificables as $t) {
    echo $t . "&lt;br&gt;";
}</pre>
        <div class="criterio"><b>Criterio:</b> 0,5 devuelve sin imprimir · 0,3 filtro correcto con getter · 0,2 echo fuera. Echo dentro de la función → -0,5.</div>
    </div>

    <div class="sol">
        <h2>Ejercicio 4 — Refactorización notificador (2 pts)</h2>
        <pre>class NotificadorEmail {
    private static $instancia = null;
    private $emailsEnviados = 0;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }
    public function enviar($destinatario, $asunto) {
        $this->emailsEnviados++;
        echo "Email " . $this->emailsEnviados . " → $destinatario: $asunto&lt;br&gt;";
    }
}

class GestorMatriculas {
    private $curso;
    private $notificador;   // ← composición

    public function __construct($curso) {
        $this->curso = $curso;
        $this->notificador = NotificadorEmail::getInstance();
    }
    public function matricular($alumno) {
        $this->notificador->enviar($alumno, "Matriculado en " . $this->curso);
    }
}

$gPhp = new GestorMatriculas("PHP desde cero");
$gPhp->matricular("elena@mail.com");   // Email 1
$gBd = new GestorMatriculas("Bases de Datos");
$gBd->matricular("marcos@mail.com");   // Email 2 ✓</pre>
        <div class="criterio"><b>Criterio:</b> 0,75 Singleton completo (static + constructor privado + getInstance) · 0,75 composición sin extends · 0,5 prueba con contador continuo. Es el mismo esquema del Ejercicio 1 del examen real (LogSistema): si fallaste allí y aquí, márcalo como prioridad máxima para mañana.</div>
    </div>

    <div class="sol">
        <h2>Ejercicio 5 — JSON de progreso (1 pt)</h2>
        <pre>$progreso = json_decode($jsonProgreso, true);
$avanzados = 0; $min = 101; $emailMin = "";
foreach ($progreso as $email => $pct) {
    if ($pct > 75) $avanzados++;
    if ($pct < $min) { $min = $pct; $emailMin = $email; }
}
echo "Alumnos con más del 75%: $avanzados&lt;br&gt;";
echo "Menor progreso: $emailMin ($min%)";</pre>
        <div class="criterio"><b>Criterio:</b> 0,3 decode con true · 0,3 conteo · 0,4 mínimo con su email.</div>
    </div>

    <div class="sol">
        <h2>Ejercicio 6 — buscar() con control de null (1,5 pts)</h2>
        <pre>class CursoPresencial extends Curso {
    private $aula;
    public function __construct($titulo, $precioBase, $aula) {
        parent::__construct($titulo, $precioBase);
        $this->aula = $aula;
    }
    public function getAula() { return $this->aula; }
}

// Dentro de buscar(), después del execute():
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
if ($fila) {
    if ($fila["tipoCurso"] == "Online") {
        return new CursoOnline($fila["titulo"], $fila["precioBase"],
                               $fila["plataforma"], 0);
    } else {
        return new CursoPresencial($fila["titulo"], $fila["precioBase"],
                                   $fila["aula"]);
    }
}
return null;

// Programa principal:
$gestor = new GestorCursos();
$curso = $gestor->buscar(3);
if ($curso !== null) {
    echo $curso->getTitulo() . " - " . $curso->getPrecioFinal() . "&lt;br&gt;";
} else {
    echo "Curso no encontrado&lt;br&gt;";
}
$inexistente = $gestor->buscar(99);
if ($inexistente !== null) {
    echo $inexistente->getTitulo();
} else {
    echo "Curso no encontrado";   // ← sin warnings ✓
}</pre>
        <div class="criterio"><b>Criterio:</b> 0,4 clase nueva con herencia · 0,5 fetch + instanciación condicional · 0,3 return null · 0,3 el programa principal COMPRUEBA null antes de usar el objeto. Llamar a un método sobre null da error fatal: si tu prueba con id=99 peta, este apartado vale 0.</div>
    </div>

    <div class="sol">
        <h2>Ejercicio 7 — Polimorfismo (1 pt)</h2>
        <pre>// En Curso:
public function calcularPrecio($alumnos) {
    return $this->precioFinal * $alumnos;
}

// En CursoOnline:
public function calcularPrecio($alumnos) {
    $base = parent::calcularPrecio($alumnos);
    if ($this->getPlataforma() == "Premium") {
        return $base * 1.20;
    }
    return $base;
}

// En CursoPresencial:
public function calcularPrecio($alumnos) {
    $base = parent::calcularPrecio($alumnos);
    return $base + (5 * $alumnos);
}</pre>
        <div class="criterio"><b>Criterio:</b> 0,4 parent:: en ambas · 0,3 condición Premium · 0,3 material por alumno. Verifica las cifras de la prueba: 435.6 y 1230.</div>
    </div>

    <div class="sol">
        <h2>Ejercicio 8 — Recordar al alumno (1 pt)</h2>
        <pre>// b) Auto-login ANTES del login normal:
if (isset($_COOKIE["alumno_login"])) {
    $_SESSION['alumnoEmail'] = base64_decode($_COOKIE["alumno_login"]);
    echo "Sesión restaurada para " . $_SESSION['alumnoEmail'] . "&lt;br&gt;";
}

// a) En el login:
if ($loginOk) {
    $_SESSION['alumnoEmail'] = $emailAlumno;
    if ($mantenerSesion) {
        setcookie("alumno_login", base64_encode($emailAlumno), [
            'expires'  => time() + (86400 * 30),
            'path'     => '/',
            'httponly'  => true,
            'samesite' => 'Strict'
        ]);
    }
}

// c) Logout:
function logout() {
    $_SESSION = [];
    session_destroy();
    if (isset($_COOKIE['alumno_login'])) {
        setcookie('alumno_login', '', time() - 3600000, '/');
    }
}</pre>
        <div class="criterio"><b>Criterio:</b> 0,4 cookie con las 4 opciones · 0,3 auto-login con base64_decode · 0,3 logout triple (vaciar + destruir + borrar cookie).</div>
    </div>

    <div class="sol">
        <h2>Ejercicio 9 — Esquema MVC (0,5 pts)</h2>
        <pre>INDEX.PHP → Punto de entrada único (front controller). Recibe la acción
   por GET/POST y con un switch/case decide qué método del Controller llamar.
CONTROLLER → Coordina. Recoge datos de $_POST/$_GET, llama al Gestor,
   y decide qué Vista cargar. NO toca la base de datos directamente.
GESTOR/MANAGER → Único que habla con la BD. Consultas PDO con
   prepare/bindValue/execute. Devuelve objetos (Modelos).
MODELOS → Clases que representan los datos (Curso, CursoOnline...).
   Propiedades privadas, constructor, getters/setters.
VISTAS → Archivos con HTML que muestran los datos al usuario.
   No tienen lógica de negocio ni SQL.
$_SESSION → Mantiene el estado entre peticiones (usuario logueado, etc.).</pre>
        <div class="criterio"><b>Criterio:</b> 0,5 si los 6 componentes están bien descritos. Confundir Controller con Gestor (decir que el Controller hace SQL) → 0,25.</div>
    </div>

    <div class="warn"><b>📊 Tu nota y comparativa:</b> Simulacro 1: ___ /10 → Simulacro 2: ___ /10. Si has subido o mantenido por encima de 5, vas bien. Lista de conceptos fallados hoy: ______. Mañana: repaso flash de esos conceptos + Simulacro 3 final.</div>


<div id="mendigo-btn" onclick="window.location.href='../sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="../images/mendigo.jpg" alt="Miguel"></div>
</body>

</html>