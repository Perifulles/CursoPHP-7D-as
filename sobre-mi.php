<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sobre mí — Miguel Pérez</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: Arial, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            line-height: 1.7
        }

        a {
            color: #93c5fd;
            text-decoration: none
        }

        a:hover {
            text-decoration: underline
        }

        /* ── Volver ── */
        .btn-volver {
            position: fixed;
            top: 18px;
            left: 20px;
            z-index: 999;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .15);
            color: #e2e8f0;
            padding: 8px 18px;
            border-radius: 20px;
            font-size: .85em;
            backdrop-filter: blur(6px);
            transition: all .2s
        }

        .btn-volver:hover {
            background: rgba(255, 255, 255, .15);
            text-decoration: none
        }

        /* ── Secciones ── */
        section {
            max-width: 800px;
            margin: 0 auto;
            padding: 80px 30px
        }

        /* fade-in al hacer scroll */
        .fade-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity .6s ease, transform .6s ease
        }

        .fade-section.visible {
            opacity: 1;
            transform: translateY(0)
        }

        /* ── Hero ── */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
            max-width: 100%
        }

        .hero-avatar {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
            box-shadow: 0 0 0 6px rgba(255, 255, 255, .1);
            margin-bottom: 28px
        }

        .hero h1 {
            font-size: 2.8em;
            font-weight: 800;
            color: #f1f5f9;
            margin-bottom: 10px
        }

        .hero .sub {
            font-size: 1.3em;
            color: #94a3b8;
            margin-bottom: 8px
        }

        .hero .mini {
            font-size: .95em;
            color: #64748b;
            margin-bottom: 40px
        }

        .arrow {
            font-size: 2em;
            color: #475569;
            animation: bounce-arrow 2s ease-in-out infinite
        }

        @keyframes bounce-arrow {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(10px)
            }
        }

        /* ── Layout fila (imagen + texto) ── */
        .row {
            display: flex;
            gap: 36px;
            align-items: flex-start;
            flex-wrap: wrap
        }

        .row.reverse {
            flex-direction: row-reverse
        }

        .row img {
            border-radius: 12px;
            object-fit: cover;
            flex-shrink: 0
        }

        .row .texto {
            flex: 1;
            min-width: 220px
        }

        .row .texto h2,
        .centrado h2 {
            font-size: 1.6em;
            color: #f1f5f9;
            margin-bottom: 16px
        }

        .row .texto p,
        .centrado p {
            color: #94a3b8;
            margin-bottom: 14px
        }

        /* ── Centrado (imagen arriba, texto debajo) ── */
        .centrado {
            text-align: center
        }

        .centrado img {
            border-radius: 12px;
            object-fit: cover;
            margin-bottom: 24px
        }

        /* ── Lista qué tiene ── */
        .feature-list {
            list-style: none;
            padding: 0;
            margin: 16px 0
        }

        .feature-list li {
            padding: 8px 0;
            color: #94a3b8;
            font-size: 1em;
            border-bottom: 1px solid rgba(255, 255, 255, .06)
        }

        .feature-list li:last-child {
            border: none
        }

        .nota-libre {
            margin-top: 18px;
            font-weight: 700;
            color: #f1f5f9;
            font-size: 1.05em
        }

        /* ── Sombrero ── */
        .sombrero {
            text-align: center
        }

        .sombrero img {
            border-radius: 12px;
            object-fit: cover;
            margin-bottom: 28px
        }

        .sombrero .lead {
            font-size: 1.15em;
            color: #94a3b8;
            margin-bottom: 14px
        }

        .sombrero .grande {
            font-size: 2.2em;
            font-weight: 800;
            color: #fbbf24;
            margin-bottom: 18px;
            line-height: 1.2
        }

        .sombrero .detalle {
            color: #64748b;
            font-size: .95em;
            max-width: 560px;
            margin: 0 auto
        }

        /* ── Instagram ── */
        .ig-section {
            background: linear-gradient(135deg, #1e1b4b 0%, #0f172a 100%);
            border-radius: 20px;
            padding: 50px 40px;
            display: flex;
            gap: 30px;
            align-items: center;
            flex-wrap: wrap
        }

        .ig-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #818cf8;
            flex-shrink: 0
        }

        .ig-texto {
            flex: 1;
            min-width: 200px
        }

        .ig-texto p {
            color: #94a3b8;
            margin-bottom: 18px
        }

        .ig-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #1d4ed8;
            color: #fff;
            padding: 12px 28px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1em;
            transition: all .2s;
            text-decoration: none
        }

        .ig-link:hover {
            background: #2563eb;
            transform: scale(1.04);
            text-decoration: none
        }

        .ig-link svg {
            width: 22px;
            height: 22px;
            fill: #fff
        }

        .ig-mini {
            margin-top: 14px;
            font-size: .87em;
            color: #475569
        }

        /* ── Donaciones ── */
        .don-header {
            text-align: center;
            margin-bottom: 40px
        }

        .don-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fbbf24;
            margin-bottom: 20px
        }

        .don-header h2 {
            font-size: 1.8em;
            color: #f1f5f9;
            margin-bottom: 10px
        }

        .don-header p {
            color: #64748b;
            max-width: 540px;
            margin: 0 auto
        }

        .don-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 28px
        }

        @media(max-width:520px) {
            .don-grid {
                grid-template-columns: 1fr
            }
        }

        .don-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 22px 16px;
            background: #1e293b;
            border: 2px solid #ca8a04;
            border-radius: 14px;
            color: #fef3c7;
            font-weight: 700;
            font-size: 1em;
            text-align: center;
            transition: all .22s;
            text-decoration: none;
            line-height: 1.3
        }

        .don-btn:hover {
            background: #1e3a5f;
            border-color: #fbbf24;
            transform: scale(1.05);
            text-decoration: none
        }

        .don-btn .emoji {
            font-size: 1.8em
        }

        .don-btn .precio {
            font-size: .82em;
            font-weight: 400;
            color: #fbbf24;
            margin-top: 2px
        }

        .don-footer {
            text-align: center;
            color: #475569;
            font-size: .88em;
            margin-top: 8px
        }

        /* ── Separador entre secciones ── */
        .sep {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, .07);
            max-width: 800px;
            margin: 0 auto
        }

        /* ── Warning PayPal estilo años 90 ── */
        #paypal-warning {
            position: fixed;
            top: 16px;
            right: 16px;
            z-index: 99999;
            max-width: 320px;
            background: linear-gradient(135deg, #ff0080, #ff6600, #ffcc00, #ff0080);
            background-size: 300% 300%;
            animation: warning-gradient 2s ease infinite;
            border: 4px solid #fff;
            border-radius: 10px;
            padding: 16px 42px 16px 16px;
            box-shadow: 0 0 0 4px #000, 0 8px 32px rgba(0,0,0,.6);
            cursor: default;
            display: none;
            opacity: 0;
            transform: translateX(20px);
            transition: opacity .4s ease, transform .4s ease;
        }
        #paypal-warning.show {
            display: block;
            opacity: 1;
            transform: translateX(0);
        }
        @keyframes warning-gradient {
            0%   { background-position: 0% 50% }
            50%  { background-position: 100% 50% }
            100% { background-position: 0% 50% }
        }
        @keyframes warning-shake {
            0%, 100% { transform: rotate(0deg) }
            20%       { transform: rotate(-3deg) }
            40%       { transform: rotate(3deg) }
            60%       { transform: rotate(-2deg) }
            80%       { transform: rotate(2deg) }
        }
        #paypal-warning .w-title {
            font-weight: 900;
            font-size: 1em;
            color: #000;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 6px;
            text-shadow: 1px 1px 0 rgba(255,255,255,.4);
        }
        #paypal-warning .w-body {
            font-size: .82em;
            color: #000;
            font-weight: 700;
            line-height: 1.4;
        }
        #paypal-warning .w-close {
            position: absolute;
            top: 8px;
            right: 10px;
            background: #000;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 14px;
            line-height: 22px;
            text-align: center;
            cursor: pointer;
            font-weight: 900;
        }
        #paypal-warning .w-close:hover { background: #333 }
    </style>
</head>

<body>

    <a class="btn-volver" href="index.php">← Volver al curso</a>

    <!-- ══════════════ WARNING PAYPAL ══════════════ -->
    <div id="paypal-warning">
        <button class="w-close" onclick="document.getElementById('paypal-warning').remove()" title="Cerrar">✕</button>
        <p class="w-title">⚠️ IMPORTANTE antes de donar</p>
        <p class="w-body">Selecciona la opción <strong>«Enviar a un amigo»</strong> para que la donación llegue íntegra y PayPal no se quede con comisión.</p>
    </div>

    <!-- ══════════════ HERO ══════════════ -->
    <section class="hero fade-section">
        <img class="hero-avatar" src="images/mendigo.jpg" alt="Miguel">
        <h1>Hola, soy Miguel</h1>
        <p class="sub">El tío que hizo este curso de PHP.</p>
        <p class="mini">Y no, no lo hice para venderlo.</p>
        <div class="arrow">↓</div>
    </section>

    <hr class="sep">

    <!-- ══════════════ QUIÉN SOY ══════════════ -->
    <section class="fade-section">
        <div class="row">
            <div class="texto">
                <h2>¿Quién soy?</h2>
                <p>Me llamo Miguel Pérez, tengo 20 años y acabo de terminar el Grado Superior de DAW (Desarrollo de Aplicaciones Web) en Florida Universitaria, Valencia.</p>
                <p>Este curso de PHP lo creé cuando empecé a dar clases de repaso a mis compañeros de curso. Lo que empezó siendo sesiones informales se fue convirtiendo en material estructurado, ejercicios, simulacros... y aquí estamos.</p>
            </div>
            <img src="images/vigilando.webp" alt="Miguel vigilando" width="200">
        </div>
    </section>

    <hr class="sep">

    <!-- ══════════════ HISTORIA ══════════════ -->
    <section class="fade-section">
        <div class="centrado">
            <img src="images/dibujando.avif" alt="Dibujando" width="300">
            <h2>Cómo nació este curso</h2>
            <p>Mi profe Vicent tiene una metodología muy específica. No hay muchos recursos online que la sigan al pie de la letra, así que decidí crearlos yo cuando empecé a preparar las clases de repaso para mis compañeros.</p>
            <p>Lo que empezó como apuntes se convirtió en un sistema completo: teoría, ejercicios progresivos por días, pistas con bombilla, soluciones, simulacros de examen con corrección y criterios de puntuación...</p>
            <p>Mis amigos me decían que lo vendiese. Decidí regalarlo.</p>
        </div>
    </section>

    <hr class="sep">

    <!-- ══════════════ QUÉ TIENE ══════════════ -->
    <section class="fade-section">
        <div class="row reverse">
            <div class="texto">
                <h2>¿Qué tiene este curso?</h2>
                <ul class="feature-list">
                    <li>📅 7 días de material estructurado</li>
                    <li>🧩 Ejercicios progresivos con pistas y soluciones</li>
                    <li>🗄️ Conexión real a MySQL con Docker</li>
                    <li>🏋️ 3 simulacros de examen completos con corrección</li>
                    <li>📐 Teoría MVC, Singleton, PDO, Cookies, Sesiones...</li>
                    <li>🎯 Todo siguiendo la metodología exacta de Vicent (<a href="https://floridaoberta.com" target="_blank">floridaoberta.com</a>)</li>
                </ul>
                <p class="nota-libre">Todo gratis. Sin registro. Sin trampa.</p>
            </div>
            <img src="images/mostrando.webp" alt="Miguel mostrando" width="200">
        </div>
    </section>

    <hr class="sep">

    <!-- ══════════════ SOMBRERO ══════════════ -->
    <section class="fade-section">
        <div class="sombrero">
            <img src="images/meQuitoElSombrero.webp" alt="Me quito el sombrero" width="280">
            <p class="lead">Si has llegado hasta aquí sin IA y sin copiar...</p>
            <p class="grande">Me quito el sombrero.</p>
            <p class="detalle">En serio. Este contenido no es fácil.<br>
                Si has entendido el Singleton, el patrón fetch+if<br>
                y por qué el host es "mysql" y no "localhost"...<br>
                ya eres mejor programador que el 80% de la gente<br>
                que dice que "sabe PHP".</p>
        </div>
    </section>

    <hr class="sep">

    <!-- ══════════════ INSTAGRAM ══════════════ -->
    <section class="fade-section">
        <div class="ig-section">
            <img class="ig-avatar" src="images/Besito.webp" alt="Miguel">
            <div class="ig-texto">
                <p>Si el curso te ha servido, me alegra saberlo.</p>
                <a class="ig-link" href="https://www.instagram.com/migueel_perezz" target="_blank">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                    @migueel_perezz
                </a>
                <p class="ig-mini">No hay newsletter. No hay Discord. Solo el IG si quieres dejar un comentario o contarme cómo te fue el examen 😄</p>
            </div>
        </div>
    </section>

    <hr class="sep">

    <!-- ══════════════ DONACIONES ══════════════ -->
    <section class="fade-section" id="seccion-donaciones">
        <div class="don-header">
            <img class="don-avatar" src="images/mendigo.jpg" alt="Miguel">
            <h2>¿Te ha servido el curso?</h2>
            <p>Si este curso gratuito de PHP te está sirviendo de ayuda, puedes apoyar mi trabajo con una donación voluntaria. ¡Muchas gracias!</p>
        </div>
        <div class="don-grid">
            <a class="don-btn" href="https://www.paypal.me/MigueelPerezz/2" target="_blank">
                <span class="emoji">☕</span>
                <span>Invítame a un café</span>
                <span class="precio">2 €</span>
            </a>
            <a class="don-btn" href="https://www.paypal.me/MigueelPerezz/5" target="_blank">
                <span class="emoji">🍕</span>
                <span>Invítame a una pizza</span>
                <span class="precio">5 €</span>
            </a>
            <a class="don-btn" href="https://www.paypal.me/MigueelPerezz/10" target="_blank">
                <span class="emoji">🚀</span>
                <span>Dar un súper apoyo al curso</span>
                <span class="precio">10 €</span>
            </a>
            <a class="don-btn" href="https://www.paypal.me/MigueelPerezz/lo-que-quieras" target="_blank">
                <span class="emoji">🗂️</span>
                <span>Elegir otra cantidad voluntaria</span>
                <span class="precio">lo que quieras</span>
            </a>
        </div>
        <p class="don-footer">100% voluntario. Si no puedes o no quieres, usar el curso ya es suficiente 🙏</p>
    </section>

    <script>
        // Fade-in con IntersectionObserver
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    observer.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.12
        });

        document.querySelectorAll('.fade-section').forEach(s => observer.observe(s));

        // Warning PayPal: solo visible cuando la sección donaciones está en pantalla
        const warning = document.getElementById('paypal-warning');
        const donSection = document.getElementById('seccion-donaciones');
        let warningDismissed = false;

        const donObserver = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (warningDismissed) return;
                if (e.isIntersecting) {
                    warning.style.display = 'block';
                    // pequeño delay para que la transición CSS arranque
                    requestAnimationFrame(() => requestAnimationFrame(() => warning.classList.add('show')));
                } else {
                    warning.classList.remove('show');
                    setTimeout(() => { if (!warning.classList.contains('show')) warning.style.display = 'none'; }, 400);
                }
            });
        }, { threshold: 0.05 });

        if (donSection) donObserver.observe(donSection);

        // Al cerrar manualmente, marcar como descartado para no volver a aparecer
        document.querySelector('#paypal-warning .w-close').addEventListener('click', () => {
            warningDismissed = true;
            warning.classList.remove('show');
            setTimeout(() => { warning.style.display = 'none'; }, 400);
        });
    </script>
</body>

</html>