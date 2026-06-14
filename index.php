<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Plan de Recuperación PHP — Héctor</title>
<link rel="stylesheet" href="assets/aula-profesor.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Arial,sans-serif;max-width:800px;margin:0 auto;padding:40px 30px;background:#f0f2f5;color:#222;line-height:1.6}
h1{color:#1A237E;margin-bottom:4px;font-size:2em}
.sub{color:#546E7A;margin-bottom:30px;font-size:1.05em}
.week{display:grid;gap:14px}
.day{background:#fff;border:2px solid #c5cae9;border-radius:14px;padding:20px 26px;transition:all .2s;position:relative;overflow:hidden}
.day:hover{border-color:#1A237E;box-shadow:0 4px 20px rgba(26,35,126,.12)}
.day a{text-decoration:none;color:#1A237E;font-weight:bold;font-size:1.15em;display:block}
.day a:hover{text-decoration:underline}
.day p{color:#555;margin-top:6px;font-size:0.92em}
.day .meta{display:flex;gap:12px;margin-top:8px;flex-wrap:wrap}
.day .meta span{font-size:0.8em;padding:3px 10px;border-radius:12px;font-weight:600}
.horas{background:#e3f2fd;color:#1565c0}
.nivel-facil{background:#c8e6c9;color:#1b5e20}
.nivel-medio{background:#fff9c4;color:#f57f17}
.nivel-dificil{background:#ffcdd2;color:#b71c1c}
.footer{margin-top:40px;padding-top:20px;border-top:2px solid #e0e0e0;color:#9e9e9e;font-size:0.85em;text-align:center}
/* ── Botones de descarga ── */
.download-bar{position:fixed;top:14px;right:18px;display:flex;gap:10px;z-index:999}
.btn-dl{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:22px;font-size:0.82em;font-weight:700;text-decoration:none;border:none;cursor:pointer;transition:all .2s;box-shadow:0 2px 8px rgba(0,0,0,.15)}
.btn-dl:hover{transform:translateY(-1px);box-shadow:0 4px 14px rgba(0,0,0,.22)}
.btn-word{background:#1565c0;color:#fff}
.btn-zip{background:#1b5e20;color:#fff}
</style>
</head>
<body>

<div class="download-bar">
  <a class="btn-dl btn-word" href="download.php?type=word" title="Descargar el plan de recuperación en Word">📄 Descargar Word</a>
  <a class="btn-dl btn-zip"  href="download.php?type=zip"  title="Descargar todo el proyecto en ZIP">📦 Descargar ZIP</a>
</div>

<h1>📚 Plan de Recuperación PHP</h1>
<p class="sub">Semana del 9 al 15 de junio de 2026 — Héctor</p>

<div class="week">

<div class="day">
<a href="Dia1/index.php">📅 Día 1 — Martes 9 de junio</a>
<p>Fundamentos (1º-2º trim) + Singleton y Composición (3er trim)</p>
<div class="meta">
<span class="horas">⏱️ 3–3,5 h</span>
<span class="nivel-facil">🟢 Fácil → Medio</span>
</div>
</div>

<div class="day">
<a href="Dia2/index.php">📅 Día 2 — Miércoles 10 de junio</a>
<p>Polimorfismo + JSON / Arrays asociativos</p>
<div class="meta">
<span class="horas">⏱️ 2,5–3 h</span>
<span class="nivel-facil">🟢 Fácil → Medio</span>
</div>
</div>

<div class="day">
<a href="Dia3/index.php">📅 Día 3 — Jueves 11 de junio</a>
<p>PDO + CRUD + Instanciación condicional + Teoría MVC</p>
<div class="meta"><span class="horas">⏱️ 3 h</span><span class="nivel-medio">🟡 Medio</span></div>
</div>

<div class="day">
<a href="Dia4/index.php">📅 Día 4 — Viernes 12 de junio</a>
<p>Sesiones y Cookies (autenticación)</p>
<div class="meta"><span class="horas">⏱️ 2,5–3 h</span><span class="nivel-medio">🟡 Medio</span></div>
</div>

<div class="day">
<a href="Dia5/index.php">📅 Día 5 — Sábado 13 de junio</a>
<p>Simulacro 1 — nivel medio (Gimnasio FitFlorida, con pistas)</p>
<div class="meta"><span class="horas">⏱️ 3,5–4 h</span><span class="nivel-medio">🟡 Medio</span></div>
</div>

<div class="day">
<a href="Dia6/index.php">📅 Día 6 — Domingo 14 de junio</a>
<p>Simulacro 2 — nivel examen (Academia CursosFlorida, cronometrado)</p>
<div class="meta"><span class="horas">⏱️ 3,5–4 h</span><span class="nivel-dificil">🔴 Examen</span></div>
</div>

<div class="day">
<a href="Dia7/index.php">📅 Día 7 — Lunes 15 de junio</a>
<p>Repaso flash de errores + Simulacro 3 final (Cafetería CafeCode)</p>
<div class="meta"><span class="horas">⏱️ 2,5–3 h</span><span class="nivel-dificil">🔴 Examen+</span></div>
</div>

</div>

<div class="footer">
Plan de Recuperación PHP — Alumno: Héctor — Tutor: Miguel Pérez<br>
Metodología Curso Evolutivo PHP (Vicente) — floridaoberta.com
</div>

<script src="assets/aula-profesor.js"></script>
</body>
</html>
