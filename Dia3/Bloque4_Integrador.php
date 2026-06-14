<?php
// ═══════════════════════════════════════
//  BLOQUE 4 — Integrador: Clínica Veterinaria
// ═══════════════════════════════════════
function crearBdVeterinaria() {
    $db = new PDO("sqlite::memory:");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE animales (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        tipo TEXT, nombre TEXT, edad INTEGER,
        raza TEXT, interior INTEGER
    )");
    $db->exec("INSERT INTO animales VALUES (1,'Perro','Rex',5,'Pastor Alemán',NULL)");
    $db->exec("INSERT INTO animales VALUES (2,'Gato','Misi',3,NULL,1)");
    $db->exec("INSERT INTO animales VALUES (3,'Perro','Luna',2,'Labrador',NULL)");
    $db->exec("INSERT INTO animales VALUES (4,'Gato','Garfield',7,NULL,0)");
    $db->exec("INSERT INTO animales VALUES (5,'Perro','Rocky',4,'Bulldog',NULL)");
    return $db;
}

ob_start();

// ─── Parte A: Clases (Modelos) ────────────────────────────
// Clase Animal (padre): propiedades id, nombre, edad. Constructor con $id = 0.
//   Getters para todo. Setters con return $this.
//
// Clase Perro extends Animal: añade $raza.
//   Constructor llama a parent::__construct() y asigna raza.
//   Getter para raza.
//   Método describir() → "Rex (Pastor Alemán) — 5 años" (usa parent si quieres)
//
// Clase Gato extends Animal: añade $interior (bool: si vive dentro de casa).
//   Constructor con parent:: y asigna interior.
//   Getter para interior.
//   Método describir() → "Misi — 3 años — Interior: Sí"



// ─── Parte B: GestorAnimales (con instanciación condicional) ──
// Clase GestorAnimales:
//   - $db en constructor (usa crearBdVeterinaria())
//
//   - buscar($id): prepare/bindValue/execute/fetch
//     Si $fila["tipo"] == "Perro" → new Perro(nombre, edad, raza, id)
//     Si $fila["tipo"] == "Gato" → new Gato(nombre, edad, interior, id)
//     Si no hay fila → return null
//
//   - getAll(): query/fetchAll/foreach con el mismo if/switch
//     Devuelve array mixto de Perros y Gatos
//
//   - insertar($animal): INSERT con prepare/bindValue/execute
//     Debe guardar el tipo: si $animal instanceof Perro → tipo = "Perro"
//
//   - eliminar($id): DELETE con prepare/bindValue/execute



// ─── Parte C: Programa principal ──────────────────────────
// 1. Crea el gestor
// 2. Llama a getAll() y recorre mostrando describir() de cada animal
// 3. Busca el animal con id=2 y muestra su info
// 4. Inserta un nuevo Gato: "Nala", 1 año, interior: sí
// 5. Elimina el animal con id=4
// 6. Vuelve a hacer getAll() para ver los cambios



// ─── Parte D: Teoría MVC aplicada ─────────────────────────
// Escribe con echo:
// "Si este sistema fuera MVC, ¿qué sería cada cosa?"
// - Animal, Perro, Gato → ???
// - GestorAnimales → ???
// - Este archivo (programa principal) → ???
// - Si hubiera un formulario HTML para añadir animales → ???
// - Si hubiera un switch($_GET["accion"]) al inicio → ???



$salidaEjercicios = ob_get_clean();
?>
<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
<title>Día 3 - Bloque 4: Integrador — Clínica Veterinaria</title>
<link rel="stylesheet" href="../assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}body{font-family:Arial,sans-serif;max-width:900px;margin:0 auto;padding:30px;background:#fafafa;color:#222;line-height:1.65}h1{color:#1A237E;border-bottom:3px solid #1A237E;padding-bottom:10px;margin:30px 0 20px;font-size:1.8em}h2{color:#283593;margin:25px 0 12px;font-size:1.4em}h3{color:#37474F;margin:20px 0 10px;font-size:1.15em}p{margin:8px 0 12px}pre{background:#1e1e2e;color:#cdd6f4;padding:16px 20px;border-radius:8px;overflow-x:auto;font-size:.92em;line-height:1.5;margin:12px 0}code{background:#e8eaf6;padding:2px 6px;border-radius:4px;font-size:.9em;color:#283593}.tip{background:#e8f5e9;border-left:4px solid #2e7d32;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.tip b{color:#2e7d32}.warn{background:#fff3e0;border-left:4px solid #e65100;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.warn b{color:#e65100}.info{background:#e3f2fd;border-left:4px solid #1565c0;padding:14px 18px;border-radius:0 8px 8px 0;margin:16px 0}.info b{color:#1565c0}.ejercicio{background:#fff;border:2px solid #c5cae9;border-radius:10px;padding:20px 24px;margin:20px 0}.ejercicio h3{color:#1A237E;margin-top:0}.nivel{display:inline-block;padding:3px 10px;border-radius:12px;font-size:.8em;font-weight:bold;margin-bottom:8px}.facil{background:#c8e6c9;color:#1b5e20}.medio{background:#fff9c4;color:#f57f17}.dificil{background:#ffcdd2;color:#b71c1c}.duracion{color:#78909c;font-size:.9em;font-style:italic}.separador{border:none;border-top:2px dashed #c5cae9;margin:30px 0}ol,ul{margin:8px 0 12px 24px}li{margin:4px 0}.header-badge{display:inline-block;background:#1A237E;color:#fff;padding:6px 16px;border-radius:20px;font-size:.85em;margin-bottom:8px}
pre .kw{color:#cba6f7}pre .fn{color:#89b4fa}pre .str{color:#a6e3a1}pre .var{color:#f38ba8}pre .cm{color:#6c7086;font-style:italic}pre .num{color:#fab387}
</style></head><body>
<a class="back" href="index.php">← Volver al Día 3</a>
<span class="header-badge">📅 Día 3 — Bloque 4</span>
<h1>🧩 Integrador: Clínica Veterinaria</h1>
<p class="duracion">⏱️ Duración estimada: 30–40 minutos</p>

<p>Un CRUD completo con herencia, instanciación condicional y teoría MVC. Es un <strong>mini-simulacro</strong> de los ejercicios 3, 4 y módulo MVC del examen, pero en un dominio diferente (animales en vez de vehículos).</p>

<div class="info"><b>💡 BD de prueba:</b> La función <code>crearBdVeterinaria()</code> crea una tabla <code>animales</code> con perros y gatos. Campo <code>tipo</code> funciona como el enum del examen: decide si creas Perro o Gato.</div>

<hr class="separador">

<div class="ejercicio"><span class="nivel dificil">🔴 EJERCICIO FINAL DEL DÍA</span>
<h3>Ejercicio — CRUD completo de una clínica veterinaria</h3>

<h3>Parte A — Modelos: Animal, Perro, Gato</h3>
<p><code>Animal</code> (padre): id, nombre, edad. <code>Perro</code> añade raza. <code>Gato</code> añade interior (bool). Ambos con <code>parent::__construct()</code> y método <code>describir()</code>.</p>

<h3>Parte B — GestorAnimales con instanciación condicional</h3>
<p>Métodos: <code>buscar($id)</code>, <code>getAll()</code>, <code>insertar($animal)</code>, <code>eliminar($id)</code>. En buscar y getAll, lee <code>$fila["tipo"]</code> para decidir si crear Perro o Gato. En insertar, usa <code>instanceof</code> para guardar el tipo correcto.</p>
<div class="warn"><b>⚠️ Mismo patrón que el examen:</b> La tabla tiene UN campo "tipo" y columnas para ambas subclases. El GestorAnimales lee ese campo y crea el objeto correcto. Es idéntico al ejercicio de flotaVehiculos.</div>

<h3>Parte C — Programa principal: CRUD en acción</h3>
<ol>
<li>getAll() → mostrar todos con describir()</li>
<li>buscar(2) → mostrar info del gato Misi</li>
<li>Insertar nueva Gato "Nala" (1 año, interior)</li>
<li>Eliminar animal id=4</li>
<li>getAll() de nuevo → ver cambios</li>
</ol>

<h3>Parte D — Teoría MVC aplicada</h3>
<p>Identifica cada componente del ejercicio según MVC: ¿qué es el Modelo? ¿El Gestor? ¿Dónde iría el Controller? ¿Y las Vistas?</p>
<p><strong>Resultado esperado:</strong> <code>getAll() muestra los animales iniciales, buscar(2) devuelve a Misi, insertar(Nala) añade un nuevo gato, eliminar(4) quita un registro, y al final explicas: Modelo = Animal/Perro/Gato, acceso a datos = GestorAnimales, Controller = script que coordina, Vista = HTML/echo final.</code></p>
</div>

<hr class="separador">
<div class="tip"><b>🎯 Checklist de conceptos del Día 3:</b>
<br>☐ Conexión PDO (constructor con try-catch)
<br>☐ prepare / bindValue / execute para consultas seguras
<br>☐ fetch para una fila, fetchAll para todas
<br>☐ Instanciación condicional: if (tipo == "X") → new X(...)
<br>☐ CRUD completo: getAll, buscar, insertar, eliminar
<br>☐ Teoría MVC: esquema, flujo de alta, identificar componentes
<br><br>Si has completado todo ☑, el Día 3 está cerrado. ¡A por sesiones y cookies mañana! 💪</div>

<div style="background:#0f172a;border:2px solid #6366f1;border-radius:12px;padding:24px;margin:30px 0;color:#e2e8f0">
<h2 style="color:#a5b4fc;border-bottom:1px solid #334155;padding-bottom:8px;margin-bottom:16px;font-size:1.3em">⚡ Tu salida</h2>
<?php if(trim(strip_tags($salidaEjercicios))===''):?><p style="color:#64748b;font-style:italic">Escribe tu solución arriba y recarga.</p><?php else: echo $salidaEjercicios; endif;?>
</div>
<script src="../assets/aula-profesor.js"></script>

<div id="mendigo-btn" onclick="window.location.href='../sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="../images/mendigo.jpg" alt="Miguel"></div>
</body></html>
