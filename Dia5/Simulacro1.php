<?php
session_start();
// ═══════════════════════════════════════════════════════
//  SIMULACRO 1 — Gimnasio FitFlorida (nivel medio)
//  ⏱️ Tiempo: 2 horas 30 min · 📊 10 puntos · 9 ejercicios
//  Escribe tus soluciones aquí arriba, por orden.
//  NO mires la corrección hasta terminar.
// ═══════════════════════════════════════════════════════
ob_start();

echo "<h3>Ejercicio 1 — Asistencias de socios (1 pt)</h3>";
// El gimnasio registra las asistencias de este mes:
$asistencias = [
    "Marta"  => 18,
    "Pablo"  => 7,
    "Lucía"  => 22,
    "Andrés" => 12,
    "Sara"   => 15,
    "Diego"  => 4
];
// a) Muestra los socios que han venido MÁS de 12 veces.
// b) Calcula y muestra la media de asistencias (sin array_sum).
// c) Muestra quién es el socio más asiduo (sin max).



echo "<hr>";
echo "<h3>Ejercicio 2 — Clase Bono y BonoAnual (1,5 pts)</h3>";
// a) Crea una clase Bono con propiedades: $nombre, $precioBase,
//    $precioFinal y $descuento (por defecto 0.10).
//    El constructor recibe nombre y precioBase, y CALCULA dentro:
//    $precioFinal = $precioBase - ($precioBase * $descuento)
// b) Getter getPrecioFinal() que devuelva el precio con "€" al final.
//    Getter getNombre() que devuelva el nombre en MAYÚSCULAS.
// c) Crea BonoAnual que herede de Bono y añada $regalo (string).
//    Su constructor llama a parent::__construct().
//    Getter para $regalo.
//
// Prueba:
// $b = new Bono("Mensual", 40);
// echo $b->getPrecioFinal();   // 36€
// $ba = new BonoAnual("Anual", 350, "Camiseta");
// echo $ba->getPrecioFinal();  // 315€
// echo $ba->getRegalo();       // Camiseta



echo "<hr>";
echo "<h3>Ejercicio 3 — Función clasificarBonos (1 pt)</h3>";
// Imagina que tienes un array $listaBonos con objetos Bono y BonoAnual.
// Créalo con al menos 4 bonos de precios variados.
// Crea una FUNCIÓN (no un método) llamada clasificarBonos($lista)
// que DEVUELVA (sin imprimir nada) un array con:
//   "baratos" => cuántos bonos tienen precio final < 50€
//   "caros"   => cuántos tienen precio final >= 50€
// 💡 Pista: getPrecioFinal() devuelve con "€" — usa floatval() para comparar.
// El echo de los resultados va FUERA de la función.



echo "<hr>";
echo "<h3>Ejercicio 4 — Refactorización: contador de accesos (2 pts)</h3>";
// El programador anterior escribió este código. Tiene DOS errores de diseño:
// 1) SalaFitness está OBLIGADA a heredar de ContadorAccesos para registrar.
// 2) Cada vez que se crea una sala, el contador GLOBAL se reinicia.
//
// ❌ CÓDIGO MALO (cópialo y refactorízalo):
//
// class ContadorAccesos {
//     private $totalAccesos = 0;
//     public function registrarAcceso($socio) {
//         $this->totalAccesos++;
//         echo "Acceso " . $this->totalAccesos . ": $socio<br>";
//     }
// }
// class SalaFitness extends ContadorAccesos {
//     private $nombreSala;
//     public function __construct($nombreSala) {
//         $this->nombreSala = $nombreSala;
//     }
//     public function entraSocio($socio) {
//         $this->registrarAcceso("$socio entra en " . $this->nombreSala);
//     }
// }
//
// 💡 Pista: convierte ContadorAccesos en SINGLETON (constructor privado,
//    propiedad static, getInstance) y haz que SalaFitness use COMPOSICIÓN
//    (propiedad $contador = ContadorAccesos::getInstance()).
//
// Prueba final (el contador debe SEGUIR, no reiniciarse):
// $musculacion = new SalaFitness("Musculación");
// $musculacion->entraSocio("Marta");   // Acceso 1
// $cardio = new SalaFitness("Cardio");
// $cardio->entraSocio("Pablo");        // Acceso 2  ← ¡no Acceso 1!



echo "<hr>";
echo "<h3>Ejercicio 5 — JSON de ocupación de salas (1 pt)</h3>";
$jsonSalas = '{
    "sala_yoga": 14,
    "sala_spinning": 25,
    "sala_musculacion": 31,
    "sala_cardio": 19,
    "sala_pilates": 8
}';
// Decodifica el JSON y encuentra:
// a) La sala MÁS llena (nombre y personas).
// b) La sala MENOS llena.
// 💡 Pista: foreach($salas as $nombre => $personas) con variables $max/$min.



echo "<hr>";
echo "<h3>Ejercicio 6 — CRUD: completar buscar() (1,5 pts)</h3>";
// La tabla 'actividades' tiene un campo tipoActividad ENUM('Colectiva','Personal').
// Las Colectivas tienen aforoMax. Las Personales tienen entrenador.
//
// a) Crea las clases: Actividad (padre: $id, $nombre, $precioMes),
//    Colectiva (añade $aforoMax) y Personal (añade $entrenador).
//    Constructores con parent:: y getters.
//
// b) Crea GestorActividades. Este código YA ESTÁ HECHO, cópialo:
//
// class GestorActividades {
//     private $db;
//     public function __construct() {
//         $config = json_decode(file_get_contents(__DIR__ . "/../config.json"), true);
//         $dsn = "mysql:host={$config['host']};dbname={$config['db']};charset=utf8mb4";
//         $this->db = new PDO($dsn, $config['userName'], $config['password']);
//     }
//     public function buscar($id) {
//         $sql = "SELECT * FROM actividades WHERE id = :id";
//         $stmt = $this->db->prepare($sql);
//         $stmt->bindValue(':id', $id);
//         $stmt->execute();
//
//         // ←←← TU CÓDIGO AQUÍ: fetch + if según tipoActividad + return
//
//     }
// }
//
// 💡 Pista: $fila = $stmt->fetch(PDO::FETCH_ASSOC);
//    if ($fila["tipoActividad"] == "Colectiva") → new Colectiva(...)
//    else → new Personal(...). Si no hay fila → return null.
//
// Prueba: $a = $gestor->buscar(2); echo $a->getNombre(); // Entreno Fuerza



echo "<hr>";
echo "<h3>Ejercicio 7 — Polimorfismo: calcularPrecio (1 pt)</h3>";
// La clase Actividad tiene este método (añádelo si no lo tienes):
//
// public function calcularPrecio($meses) {
//     return $this->precioMes * $meses;
// }
//
// Sobrescríbelo en las subclases usando parent::
// - Colectiva: si aforoMax > 20, se aplica un 5% de DESCUENTO al coste base.
// - Personal: se añaden 10€ POR MES al coste base (material incluido).
//
// Prueba:
// $spinning = new Colectiva("Spinning", 35, 25);   // aforo 25 > 20
// echo $spinning->calcularPrecio(3);  // 99.75 (105 - 5%)
// $fuerza = new Personal("Entreno Fuerza", 80, "Carlos");
// echo $fuerza->calcularPrecio(2);    // 180 (160 + 10*2)



echo "<hr>";
echo "<h3>Ejercicio 8 — Recordar al socio (1 pt)</h3>";
// Este login con sesión YA FUNCIONA (simulado):
$emailSocio = "marta@fitflorida.es";
$loginCorrecto = true;
$recordarme = true; // checkbox marcado
if ($loginCorrecto) {
    $_SESSION['socioEmail'] = $emailSocio;
}
// Modifícalo para que recuerde al socio aunque cierre el navegador:
// 1. Si $recordarme es true, crea una cookie "socio_login" con
//    base64_encode($emailSocio), que dure 30 días, con path '/',
//    httponly true y samesite 'Strict'.
// 2. ANTES del login, comprueba si existe $_COOKIE["socio_login"]:
//    si existe, restaura $_SESSION['socioEmail'] decodificando y
//    muestra "Sesión restaurada para [email]".
// 3. Escribe también la función logout() completa: vaciar sesión,
//    destruirla, y borrar la cookie con expiración pasada.
// 💡 Pista: son los 3 pasos del Bloque 3 del Día 4.



echo "<hr>";
echo "<h3>Ejercicio 9 — Teoría MVC (0,5 pts)</h3>";
// Explica con echo, paso a paso, qué sucede cuando el recepcionista
// del gimnasio da de alta una actividad nueva desde el formulario web,
// en una aplicación con arquitectura MVC.
// Debe aparecer: la Vista (formulario), el index.php, el Controller,
// el Gestor, la base de datos, y la redirección final.
// 💡 Pista: son 7-8 pasos. Es el mismo flujo que practicaste el Día 3.



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 5 — Simulacro 1: Gimnasio FitFlorida</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ej{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:18px 22px;margin:18px 0}.ej h3{color:#1A237E;margin-top:0}.pts{display:inline-block;background:#1A237E;color:#fff;padding:3px 12px;border-radius:12px;font-size:.82em;font-weight:bold}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#b71c1c;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}.zona-practica{background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0}.zona-practica h2{color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em}.back{display:inline-block;margin-bottom:20px;color:#546E7A;text-decoration:none;font-size:.9em}.back:hover{color:#1A237E}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 5</a>
<span class="header-badge">🏋️ SIMULACRO 1 — Nivel medio</span>
<h1>Examen de práctica: Gimnasio FitFlorida</h1>
<p class="duracion">⏱️ Tiempo recomendado: 2 horas 30 min · 📊 10 puntos · 9 ejercicios</p>

<div class="warn"><b>⚠️ Condiciones del simulacro:</b> Sin apuntes durante la prueba. Puedes usar papel para esquematizar. Los enunciados incluyen pistas 💡 porque es el primer simulacro — el del Día 6 ya no las tendrá. Escribe tus soluciones en la parte PHP del archivo, por orden. <strong>NO abras la corrección hasta acabar.</strong></div>

<div class="info"><b>💡 Antes de empezar:</b> El Ejercicio 6 usa la tabla <code>actividades</code> de MySQL. Si aún no has cargado el SQL de los simulacros, ve al terminal y ejecuta:<br><code>docker exec -i repaso_final_mysql mysql -uroot -proot &lt; sql/simulacros_init.sql</code></div>

<hr class="separador">

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 1 — Asistencias de socios</h3>
<p>Array asociativo de socios y asistencias (ya definido en el PHP). Muestra los que vienen más de 12 veces, la media (sin array_sum) y el más asiduo (sin max).</p></div>

<div class="ej"><span class="pts">1,5 puntos</span><h3>Ejercicio 2 — Clase Bono y BonoAnual</h3>
<p>Clase <code>Bono</code> con constructor que <strong>calcula</strong> el precio final aplicando descuento (10% por defecto). Getter con € y getter en mayúsculas. Subclase <code>BonoAnual</code> con <code>parent::__construct()</code> y propiedad regalo.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 3 — Función clasificarBonos</h3>
<p>Función (NO método) que recibe un array de bonos y <strong>devuelve</strong> (sin imprimir) un array con el conteo de baratos (&lt;50€) y caros (≥50€).</p></div>

<div class="ej"><span class="pts">2 puntos</span><h3>Ejercicio 4 — Refactorización: contador de accesos</h3>
<p>Código dado con herencia innecesaria + contador que se reinicia. Refactoriza con <strong>Singleton + composición</strong>. El contador global debe mantenerse entre salas.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 5 — JSON de ocupación</h3>
<p>JSON con salas y personas. Encuentra la más llena y la menos llena.</p></div>

<div class="ej"><span class="pts">1,5 puntos</span><h3>Ejercicio 6 — CRUD: completar buscar()</h3>
<p>Tabla <code>actividades</code> con ENUM. El método <code>buscar($id)</code> está empezado (prepare/bindValue/execute hechos). Completa: fetch + instanciación condicional + return null.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 7 — Polimorfismo: calcularPrecio</h3>
<p>Sobrescribe <code>calcularPrecio($meses)</code> en Colectiva (aforo&gt;20 → 5% dto) y Personal (+10€/mes), usando <code>parent::</code>.</p></div>

<div class="ej"><span class="pts">1 punto</span><h3>Ejercicio 8 — Recordar al socio</h3>
<p>Login con sesión dado. Añade cookie "recordarme" (30 días, httponly, samesite), auto-login desde cookie, y logout completo.</p></div>

<div class="ej"><span class="pts">0,5 puntos</span><h3>Ejercicio 9 — Teoría MVC</h3>
<p>Explica el flujo completo de dar de alta una actividad en arquitectura MVC (7-8 pasos).</p></div>

<hr class="separador">
<div class="tip"><b>✅ Al terminar:</b> revisa tus respuestas 5 minutos, y después abre la <a href="Correccion1.php"><strong>Corrección del Simulacro 1</strong></a>. Anota en papel los ejercicios fallados: se repasan antes del Simulacro 2.</div>

<div class="zona-practica"><h2>⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tus soluciones en la parte PHP del archivo y recarga.</p><?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>
</body></html>
