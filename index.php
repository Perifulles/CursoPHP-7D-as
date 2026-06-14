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
.btn-drive{background:#fff;color:#1a73e8;border:2px solid #1a73e8}
.btn-drive:hover{background:#e8f0fe}
/* ── Modal ZIP ── */
#zip-modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:9998;align-items:center;justify-content:center}
#zip-modal-overlay.open{display:flex}
#zip-modal{background:#fff;border-radius:16px;max-width:500px;width:90%;padding:32px 28px;position:relative;box-shadow:0 12px 48px rgba(0,0,0,.3)}
#zip-modal h3{color:#1b5e20;margin-bottom:10px;font-size:1.25em;display:flex;align-items:center;gap:8px}
#zip-modal p{color:#444;font-size:.93em;line-height:1.6;margin-bottom:12px}
#zip-modal .zip-steps{list-style:none;padding:0;margin:0 0 20px;counter-reset:step}
#zip-modal .zip-steps li{padding:7px 0 7px 36px;color:#333;font-size:.91em;border-bottom:1px solid #f0f0f0;position:relative;counter-increment:step}
#zip-modal .zip-steps li::before{content:counter(step);position:absolute;left:0;top:50%;transform:translateY(-50%);background:#1b5e20;color:#fff;width:22px;height:22px;border-radius:50%;font-size:.78em;font-weight:700;display:flex;align-items:center;justify-content:center}
#zip-modal .zip-steps li:last-child{border:none}
#zip-modal .zip-highlight{background:#e8f5e9;border-left:4px solid #1b5e20;padding:10px 14px;border-radius:0 8px 8px 0;margin:14px 0;font-size:.88em;color:#1b5e20;font-weight:600}
#zip-modal .btn-zip-go{display:inline-flex;align-items:center;gap:8px;background:#1b5e20;color:#fff;padding:12px 24px;border-radius:8px;font-weight:700;font-size:.95em;text-decoration:none;transition:background .2s;border:none;cursor:pointer}
#zip-modal .btn-zip-go:hover{background:#2e7d32}
#zip-modal .modal-close-zip{position:absolute;top:12px;right:16px;background:none;border:none;font-size:1.4em;cursor:pointer;color:#999;line-height:1}
#zip-modal .modal-close-zip:hover{color:#333}
/* ── Modal Google Drive ── */
#drive-modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:9998;align-items:center;justify-content:center}
#drive-modal-overlay.open{display:flex}
#drive-modal{background:#fff;border-radius:16px;max-width:480px;width:90%;padding:32px 28px;position:relative;box-shadow:0 12px 48px rgba(0,0,0,.3)}
#drive-modal h3{color:#1a73e8;margin-bottom:10px;font-size:1.3em;display:flex;align-items:center;gap:10px}
#drive-modal p{color:#444;font-size:.95em;line-height:1.6;margin-bottom:16px}
#drive-modal .drive-features{list-style:none;padding:0;margin:0 0 22px}
#drive-modal .drive-features li{padding:5px 0;color:#333;font-size:.92em;border-bottom:1px solid #f0f0f0}
#drive-modal .drive-features li:last-child{border:none}
#drive-modal .btn-drive-go{display:inline-flex;align-items:center;gap:8px;background:#1a73e8;color:#fff;padding:12px 24px;border-radius:8px;font-weight:700;font-size:.95em;text-decoration:none;transition:background .2s}
#drive-modal .btn-drive-go:hover{background:#1558b0;text-decoration:none}
#drive-modal .modal-close{position:absolute;top:12px;right:16px;background:none;border:none;font-size:1.4em;cursor:pointer;color:#999;line-height:1}
#drive-modal .modal-close:hover{color:#333}
</style>
</head>
<body>

<div class="download-bar">
  <a class="btn-dl btn-word" href="download.php?type=word" title="Descargar el plan de recuperación en Word">📄 Descargar Plan Recuperación</a>
  <button class="btn-dl btn-zip" onclick="document.getElementById('zip-modal-overlay').classList.add('open')" title="Descargar todo el proyecto en ZIP">📦 Descargar ZIP</button>
</div>

<button class="btn-dl btn-drive" style="position:fixed;top:14px;left:18px;z-index:999;border:none;cursor:pointer" onclick="document.getElementById('drive-modal-overlay').classList.add('open')" title="Curso completo en Google Drive">
  <svg width="16" height="16" viewBox="0 0 87.3 78" xmlns="http://www.w3.org/2000/svg"><path d="m6.6 66.85 3.85 6.65c.8 1.4 1.95 2.5 3.3 3.3l13.75-23.8h-27.5c0 1.55.4 3.1 1.2 4.5z" fill="#0066da"/><path d="m43.65 25-13.75-23.8c-1.35.8-2.5 1.9-3.3 3.3l-25.4 44a9.06 9.06 0 0 0 -1.2 4.5h27.5z" fill="#00ac47"/><path d="m73.55 76.8c1.35-.8 2.5-1.9 3.3-3.3l1.6-2.75 7.65-13.25c.8-1.4 1.2-2.95 1.2-4.5h-27.502l5.852 11.5z" fill="#ea4335"/><path d="m43.65 25 13.75-23.8c-1.35-.8-2.9-1.2-4.5-1.2h-18.5c-1.6 0-3.15.45-4.5 1.2z" fill="#00832d"/><path d="m59.8 53h-32.3l-13.75 23.8c1.35.8 2.9 1.2 4.5 1.2h50.8c1.6 0 3.15-.45 4.5-1.2z" fill="#2684fc"/><path d="m73.4 26.5-12.7-22c-.8-1.4-1.95-2.5-3.3-3.3l-13.75 23.8 16.15 28h27.45c0-1.55-.4-3.1-1.2-4.5z" fill="#ffba00"/></svg>
  Curso 98h en Drive
</button>

<!-- Modal ZIP -->
<div id="zip-modal-overlay" onclick="if(event.target===this)this.classList.remove('open')">
  <div id="zip-modal">
    <button class="modal-close-zip" onclick="document.getElementById('zip-modal-overlay').classList.remove('open')">&#x2715;</button>
    <h3>📦 Antes de descargar el ZIP</h3>
    <p>El ZIP contiene <strong>el proyecto completo</strong>: todos los archivos PHP, Docker, SQL y el README con instrucciones detalladas. Para que funcione tienes que seguir estos pasos:</p>
    <div style="background:#fef08a;border-left:4px solid #ca8a04;border-radius:0 8px 8px 0;padding:12px 16px;margin:12px 0 16px;font-size:.9em;color:#713f12;font-weight:600;line-height:1.5">
      ⚠️ <strong>Antes de descargar el ZIP:</strong> descárgate primero el <strong>Plan de Recuperación</strong> (botón arriba a la derecha) y léetelo. Son 15 minutos que te van a ahorrar muchas dudas. No seas vago.
    </div>
    <ol class="zip-steps">
      <li>Descomprime el ZIP donde quieras</li>
      <li>Instala <strong>Docker Desktop</strong> si no lo tienes</li>
      <li>Abre una terminal dentro de la carpeta y ejecuta <code>docker compose up -d --build</code></li>
      <li>Carga las bases de datos con los comandos del README</li>
      <li>Abre <strong>http://localhost:8080</strong> en el navegador</li>
    </ol>
    <p class="zip-highlight">📖 Lee el archivo <strong>README.md</strong> incluido en el ZIP — tiene todos los comandos exactos y soluciones a problemas frecuentes.</p>
    <div style="display:flex;gap:12px;flex-wrap:wrap;align-items:center">
      <a class="btn-zip-go" href="download.php?type=zip">📥 Descargar ZIP ahora</a>
      <a href="download.php?type=ia" style="display:inline-flex;align-items:center;gap:7px;background:#1e293b;color:#a5b4fc;padding:11px 20px;border-radius:8px;font-weight:700;font-size:.9em;text-decoration:none;border:2px solid #6366f1;transition:all .2s" onmouseover="this.style.background='#312e81'" onmouseout="this.style.background='#1e293b'">🤖 Descargar Instrucciones IA</a>
    </div>
  </div>
</div>

<!-- Modal Google Drive -->
<div id="drive-modal-overlay" onclick="if(event.target===this)this.classList.remove('open')">
  <div id="drive-modal">
    <button class="modal-close" onclick="document.getElementById('drive-modal-overlay').classList.remove('open')">✕</button>
    <h3>
      <svg width="22" height="22" viewBox="0 0 87.3 78" xmlns="http://www.w3.org/2000/svg"><path d="m6.6 66.85 3.85 6.65c.8 1.4 1.95 2.5 3.3 3.3l13.75-23.8h-27.5c0 1.55.4 3.1 1.2 4.5z" fill="#0066da"/><path d="m43.65 25-13.75-23.8c-1.35.8-2.5 1.9-3.3 3.3l-25.4 44a9.06 9.06 0 0 0 -1.2 4.5h27.5z" fill="#00ac47"/><path d="m73.55 76.8c1.35-.8 2.5-1.9 3.3-3.3l1.6-2.75 7.65-13.25c.8-1.4 1.2-2.95 1.2-4.5h-27.502l5.852 11.5z" fill="#ea4335"/><path d="m43.65 25 13.75-23.8c-1.35-.8-2.9-1.2-4.5-1.2h-18.5c-1.6 0-3.15.45-4.5 1.2z" fill="#00832d"/><path d="m59.8 53h-32.3l-13.75 23.8c1.35.8 2.9 1.2 4.5 1.2h50.8c1.6 0 3.15-.45 4.5-1.2z" fill="#2684fc"/><path d="m73.4 26.5-12.7-22c-.8-1.4-1.95-2.5-3.3-3.3l-13.75 23.8 16.15 28h27.45c0-1.55-.4-3.1-1.2-4.5z" fill="#ffba00"/></svg>
      Curso completo de PHP — 98 horas
    </h3>
    <p>Además de este plan de repaso, tengo un <strong>curso completo de PHP de 98 horas</strong> creado para asentar las bases desde cero. Incluye:</p>
    <ul class="drive-features">
      <li>🎬 Vídeos explicativos paso a paso</li>
      <li>🧩 Ejercicios resueltos y para practicar</li>
      <li>📝 Exámenes de autoevaluación</li>
      <li>📁 Materiales y apuntes organizados</li>
      <li>🆓 Totalmente gratuito, sin registro</li>
    </ul>
    <a class="btn-drive-go" href="https://drive.google.com/drive/folders/1wcaTF8hjqcSIzwFY7L6qSaNot5uGh8L0?usp=sharing" target="_blank">
      <svg width="18" height="18" viewBox="0 0 87.3 78" xmlns="http://www.w3.org/2000/svg"><path d="m6.6 66.85 3.85 6.65c.8 1.4 1.95 2.5 3.3 3.3l13.75-23.8h-27.5c0 1.55.4 3.1 1.2 4.5z" fill="#0066da"/><path d="m43.65 25-13.75-23.8c-1.35.8-2.5 1.9-3.3 3.3l-25.4 44a9.06 9.06 0 0 0 -1.2 4.5h27.5z" fill="#00ac47"/><path d="m73.55 76.8c1.35-.8 2.5-1.9 3.3-3.3l1.6-2.75 7.65-13.25c.8-1.4 1.2-2.95 1.2-4.5h-27.502l5.852 11.5z" fill="#ea4335"/><path d="m43.65 25 13.75-23.8c-1.35-.8-2.9-1.2-4.5-1.2h-18.5c-1.6 0-3.15.45-4.5 1.2z" fill="#00832d"/><path d="m59.8 53h-32.3l-13.75 23.8c1.35.8 2.9 1.2 4.5 1.2h50.8c1.6 0 3.15-.45 4.5-1.2z" fill="#2684fc"/><path d="m73.4 26.5-12.7-22c-.8-1.4-1.95-2.5-3.3-3.3l-13.75 23.8 16.15 28h27.45c0-1.55-.4-3.1-1.2-4.5z" fill="#ffba00"/></svg>
      Abrir en Google Drive
    </a>
  </div>
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
Plan de Recuperación PHP — Autor: Miguel Pérez Sánchez<br>
Metodología Curso Evolutivo PHP (Vicent) — floridaoberta.com
</div>

<script src="assets/aula-profesor.js"></script>

<div id="mendigo-btn" onclick="window.location.href='sobre-mi.php'" title="¿Quién hizo esto? ☕"><img src="images/mendigo.jpg" alt="Miguel"></div>
</body>
</html>
