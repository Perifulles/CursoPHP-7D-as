<?php
session_start();
// ═══════════════════════════════════════════════════════
//  SIMULACRO 2 — Academia CursosFlorida (nivel examen)
//  ⏱️ Tiempo: 2 horas EXACTAS (pon cronómetro) · 📊 10 puntos · 9 ejercicios
//  SIN pistas. Condiciones reales de examen.
//  Escribe tus soluciones aquí arriba, por orden.
// ═══════════════════════════════════════════════════════
ob_start();

echo "<h3>Ejercicio 1 — Notas de los alumnos (1 pt)</h3>";
// La academia guarda las notas de 4 alumnos en 3 módulos:
$notas = [
    "Elena"  => [7.5, 8.0, 6.5],
    "Marcos" => [5.0, 4.5, 6.0],
    "Júlia"  => [9.0, 8.5, 9.5],
    "Iván"   => [6.0, 7.0, 5.5]
];
// a) Muestra la nota media de cada alumno (sin array_sum).
// b) Muestra el nombre del alumno con mejor media.
// c) Cuenta cuántos alumnos tienen media >= 6 (aprobados).



echo "<hr>";
echo "<h3>Ejercicio 2 — Clase Curso y CursoOnline (1,5 pts)</h3>";
// a) Crea la clase Curso con propiedades: $titulo, $precioBase,
//    $precioFinal y $iva (por defecto 0.21).
//    El constructor recibe titulo y precioBase, y calcula DENTRO:
//    precioFinal = precioBase + (precioBase * iva)
// b) Getter getPrecioFinal() que devuelva el precio seguido de "€".
//    Getter getTitulo() que devuelva el título en MAYÚSCULAS.
// c) Crea CursoOnline que herede de Curso y añada $plataforma y
//    $horasVideo. Constructor con parent::__construct(). Getters.
//
// Prueba:
// $c = new Curso("Bases de Datos", 200);
// echo $c->getPrecioFinal();   // 242€
// $co = new CursoOnline("PHP desde cero", 120, "Premium", 40);
// echo $co->getTitulo();       // PHP DESDE CERO
// echo $co->getHorasVideo();   // 40



echo "<hr>";
echo "<h3>Ejercicio 3 — Función cursosCertificables (1 pt)</h3>";
// Crea un array $catalogo con al menos 4 objetos CursoOnline de
// horasVideo variadas.
// Crea una FUNCIÓN cursosCertificables($lista, $minHoras) que
// DEVUELVA (sin imprimir) un array con los TÍTULOS de los cursos
// cuyo horasVideo sea >= $minHoras.
// El echo de los resultados va FUERA de la función.



echo "<hr>";
echo "<h3>Ejercicio 4 — Refactorización: notificador de matrículas (2 pts)</h3>";
// Este código tiene los mismos DOS errores de diseño que ya conoces:
//
// ❌ CÓDIGO MALO (cópialo y refactorízalo):
//
// class NotificadorEmail {
//     private $emailsEnviados = 0;
//     public function enviar($destinatario, $asunto) {
//         $this->emailsEnviados++;
//         echo "Email " . $this->emailsEnviados . " → $destinatario: $asunto<br>";
//     }
// }
// class GestorMatriculas extends NotificadorEmail {
//     private $curso;
//     public function __construct($curso) {
//         $this->curso = $curso;
//     }
//     public function matricular($alumno) {
//         $this->enviar($alumno, "Matriculado en " . $this->curso);
//     }
// }
//
// Refactoriza para que:
// - NotificadorEmail sea Singleton.
// - GestorMatriculas use composición.
// - El contador de emails sea ÚNICO para toda la aplicación.
//
// Prueba final:
// $gPhp = new GestorMatriculas("PHP desde cero");
// $gPhp->matricular("elena@mail.com");    // Email 1
// $gBd = new GestorMatriculas("Bases de Datos");
// $gBd->matricular("marcos@mail.com");    // Email 2  ← continúa



echo "<hr>";
echo "<h3>Ejercicio 5 — JSON de progreso (1 pt)</h3>";
$jsonProgreso = '{
    "elena@mail.com": 82,
    "marcos@mail.com": 45,
    "julia@mail.com": 97,
    "ivan@mail.com": 60,
    "nuria@mail.com": 78
}';
// Decodifica el JSON y:
// a) Cuenta cuántos alumnos llevan MÁS del 75% del curso.
// b) Muestra el email del alumno con MENOR progreso y su porcentaje.



echo "<hr>";
echo "<h3>Ejercicio 6 — CRUD: completar buscar() con control de null (1,5 pts)</h3>";
// La tabla 'cursos' tiene tipoCurso ENUM('Online','Presencial').
// Los Online tienen plataforma. Los Presenciales tienen aula.
//
// a) Crea las clases: Curso ya la tienes del Ejercicio 2. Crea ahora
//    CursoPresencial extends Curso con $aula (constructor con parent::, getter).
//    (CursoOnline ya existe del Ejercicio 2: añádele el campo si lo necesitas.)
//
// b) Crea GestorCursos. La conexión y la consulta YA ESTÁN HECHAS:
//
// class GestorCursos {
//     private $db;
//     public function __construct() {
//         $config = json_decode(file_get_contents(__DIR__ . "/../config.json"), true);
//         $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8mb4";
//         $this->db = new PDO($dsn, $config['userName'], $config['password']);
//     }
//     public function buscar($id) {
//         $sql = "SELECT * FROM cursos WHERE id = :id";
//         $stmt = $this->db->prepare($sql);
//         $stmt->bindValue(':id', $id);
//         $stmt->execute();
//
//         // ←←← TU CÓDIGO AQUÍ
//
//     }
// }
//
// c) En el programa principal, busca el curso con id=3 y muéstralo.
//    Después busca el curso con id=99 (NO existe) y tu código debe
//    mostrar "Curso no encontrado" SIN dar ningún error ni warning.



echo "<hr>";
echo "<h3>Ejercicio 7 — Polimorfismo: calcularPrecio (1 pt)</h3>";
// Añade a Curso este método si no lo tienes:
//
// public function calcularPrecio($alumnos) {
//     return $this->precioFinal * $alumnos;
// }
//
// Sobrescríbelo con parent:: en las subclases:
// - CursoOnline: si la plataforma es "Premium", el total sube un 20%.
// - CursoPresencial: se añaden 5€ POR ALUMNO en concepto de material.
//
// Prueba:
// $co = new CursoOnline("Laravel", 150, "Premium", 60);
// echo $co->calcularPrecio(2);   // 435.6  (181.5*2 = 363 → +20%)
// $cp = new CursoPresencial("Redes", 250, "B-03");
// echo $cp->calcularPrecio(4);   // 1230  (302.5*4 = 1210 → +5*4)



echo "<hr>";
echo "<h3>Ejercicio 8 — Recordar al alumno (1 pt)</h3>";
// Login con sesión que ya funciona (simulado):
$emailAlumno = "elena@cursosflorida.es";
$loginOk = true;
$mantenerSesion = true;
if ($loginOk) {
    $_SESSION['alumnoEmail'] = $emailAlumno;
}
// Sin pistas esta vez:
// a) Añade la cookie de "mantener sesión" (30 días, segura).
// b) Implementa el auto-login al cargar la página si existe la cookie.
// c) Implementa el logout completo.



echo "<hr>";
echo "<h3>Ejercicio 9 — Teoría MVC: esquema de responsabilidades (0,5 pts)</h3>";
// Escribe con echo un esquema que explique la RESPONSABILIDAD de cada
// componente de la arquitectura MVC de la academia:
// index.php, Controller, Gestor/Manager, Modelos, Vistas, $_SESSION.
// Una o dos líneas por componente. Como lo escribirías en el examen en papel.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 6 — Simulacro 2: Academia CursosFlorida</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ej{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:18px 22px;margin:18px 0}.ej h3{color:#1A237E;margin-top:0}.pts{display:inline-block;background:#1A237E;color:#fff;padding:3px 12px;border-radius:12px;font-size:.82em;font-weight:bold}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#b71c1c;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}.back{display:inline-block;margin-bottom:20px;color:#546E7A;text-decoration:none;font-size:.9em}.back:hover{color:#1A237E}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 6</a>
<span class="header-badge">🎓 SIMULACRO 2 — Nivel examen</span>
<h1>Examen de práctica: Academia CursosFlorida</h1>
<p class="duracion">⏱️ Tiempo: 2 horas EXACTAS (pon cronómetro en el móvil) · 📊 10 puntos · 9 ejercicios</p>

<div class="warn"><b>⚠️ Condiciones reales de examen:</b> SIN apuntes, SIN pistas, CON cronómetro de 2 horas. Cuando suene, paras y corriges lo que tengas. Si te atascas en un ejercicio más de 15 minutos, déjalo y pasa al siguiente (en el examen real también se hace así). El orden de puntos te dice dónde invertir el tiempo.</div>

<div class="info"><b>💡 Recuerda:</b> el Ejercicio 6 usa la tabla <code>cursos</code>. Si no cargaste el SQL de simulacros el Día 5: <code>docker exec -i repaso_final_mysql mysql -uroot -proot &lt; sql/simulacros_init.sql</code></div>

<hr class="separador">

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 1 — Notas de los alumnos</h3>
<p>Array con notas de 4 alumnos en 3 módulos. Media por alumno (sin array_sum), mejor alumno, conteo de aprobados (media ≥ 6).</p></div>

<div class="ej"><span class="pts">1,5 puntos</span><h3>Ejercicio 2 — Clase Curso y CursoOnline</h3>
<p>Clase <code>Curso</code> con constructor que <strong>calcula</strong> el precio final con IVA (0.21 por defecto). Getters formateados. Subclase <code>CursoOnline</code> con plataforma y horasVideo, <code>parent::__construct()</code>.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 3 — Función cursosCertificables</h3>
<p>Función que recibe lista y mínimo de horas, y <strong>devuelve</strong> (sin imprimir) los títulos de los cursos que cumplen.</p></div>

<div class="ej"><span class="pts">2 puntos</span><h3>Ejercicio 4 — Refactorización: notificador</h3>
<p>Código dado con herencia incorrecta y contador que se pierde. Refactoriza con Singleton + composición. El contador de emails debe ser único en toda la aplicación.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 5 — JSON de progreso</h3>
<p>JSON de alumnos y porcentajes. Cuenta los que superan el 75% y localiza al de menor progreso.</p></div>

<div class="ej"><span class="pts">1,5 puntos</span><h3>Ejercicio 6 — CRUD: buscar() con control de null</h3>
<p>Completa <code>buscar($id)</code> de GestorCursos: fetch + instanciación condicional según el ENUM. <strong>Y además:</strong> tu programa principal debe manejar el caso de un id que NO existe, sin errores.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 7 — Polimorfismo: calcularPrecio</h3>
<p>Sobrescribe con <code>parent::</code>: Online Premium → +20% sobre el total. Presencial → +5€ por alumno de material.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 8 — Recordar al alumno</h3>
<p>Cookie de mantener sesión + auto-login + logout completo. Sin pistas: es el patrón del Día 4.</p></div>

<div class="ej"><span class="pts">0,5 puntos</span><h3>Ejercicio 9 — Teoría MVC: esquema</h3>
<p>Responsabilidad de cada componente (index, Controller, Gestor, Modelos, Vistas, $_SESSION). Como en el examen del 2º trimestre.</p></div>

<hr class="separador">
<div class="tip"><b>✅ Cuando suene el cronómetro:</b> deja de escribir y abre la <a href="Correccion2.php"><strong>Corrección del Simulacro 2</strong></a>. Suma tu nota con los criterios. Compárala con la del Simulacro 1: deberías haber subido o mantenido. Los fallos de hoy son EXACTAMENTE lo que repasarás mañana por la mañana.</div>

<div class="zona-practica"><h2>⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tus soluciones en la parte PHP del archivo y recarga.</p><?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>

<div id="mendigo-btn" onclick="window.location.href='../sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="../images/mendigo.jpg" alt="Miguel"></div>
</body></html>
