<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intimark Portal 2026</title>
    <link href="./dist/output.css" rel="stylesheet">

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f5f5f4;
        }

        /* Cursor Glow */
        #cursor-glow {
            position: fixed;
            top: 0;
            left: 0;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.2) 0%, rgba(56, 189, 248, 0) 70%);
            transform: translate(-50%, -50%);
            pointer-events: none;
            mix-blend-mode: multiply;
            z-index: 0;
            transition: background 0.3s ease;
        }

        /* Nav Pills */
        .glass-pill-nav {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
        }

        .nav-link {
            position: relative;
            z-index: 10;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link.active {
            background-color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            color: #0284c7;
            font-weight: 600;
        }

        .nav-link:hover:not(.active) {
            background-color: rgba(255, 255, 255, 0.5);
        }

        /* Animation */
        #welcome-overlay {
            position: fixed;
            inset: 0;
            background-color: #f5f5f4;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.8s, visibility 0.8s;
        }

        .welcome-logo {
            animation: breathe-float 1.5s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }

        @keyframes breathe-float {
            0% {
                transform: scale(0.5) translateY(20px);
                opacity: 0;
            }

            50% {
                transform: scale(1.1) translateY(-10px);
                opacity: 1;
            }

            100% {
                transform: scale(1) translateY(0);
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Calendar Styles */
        .cal-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            border: 1px solid #e7e5e4;
            overflow: hidden;
        }

        .cal-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
            padding: 10px;
        }

        .cal-cell {
            aspect-ratio: 1/1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: #57534e;
            border-radius: 50%;
        }

        .cal-today {
            background-color: #0ea5e9;
            color: white !important;
            font-weight: bold;
        }

        /* Force Display for Debug */
        .gadget-box {
            position: fixed;
            top: 100px;
            right: 30px;
            width: 250px;
            z-index: 50;
            display: block !important;
        }
    </style>
</head>

<body class="text-stone-800 h-screen overflow-hidden selection:bg-sky-200 selection:text-sky-900 relative">

    <div id="cursor-glow"></div>

    <div id="welcome-overlay">
        <img src="img/logo.png" alt="Logo" class="welcome-logo w-32 object-contain">
    </div>

    <!-- Nav -->
    <nav class="fixed top-6 left-1/2 -translate-x-1/2 z-50 flex p-1.5 rounded-full glass-pill-nav fade-in" style="animation-delay: 1.2s;">
        <button onclick="switchSection('avisos')" class="nav-link active px-6 py-2 rounded-full text-sm">Avisos</button>
        <button onclick="switchSection('portales')" class="nav-link px-6 py-2 rounded-full text-sm">Portales</button>
        <button onclick="switchSection('perfil')" class="nav-link px-6 py-2 rounded-full text-sm">Mi Perfil</button>
    </nav>

    <!-- Content -->
    <main class="relative h-full w-full pt-28 px-4 md:px-12 lg:px-24 pb-12 overflow-y-auto z-10">

        <!-- Avisos -->
        <section id="section-avisos" class="section-view fade-in max-w-6xl mx-auto block">
            <header class="mb-8 pl-4 border-l-4 border-sky-500">
                <h2 class="text-3xl font-light text-stone-800"><span class="font-extrabold text-sky-600 text-3xl">I</span>ntimark</h2>
                <p class="text-sm text-stone-400">Panel de Comunicación Interna</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Main Notice -->
                <div class="md:col-span-2 bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-xs font-bold">IMPORTANTE</span>
                        <span class="text-xs text-stone-400">Hace 2 horas</span>
                    </div>
                    <h3 class="text-2xl font-bold text-stone-800 mb-3">Mantenimiento Global de Servidores</h3>
                    <p class="text-stone-600 leading-relaxed">Se informa a todo el personal que este fin de semana se realizará una actualización crítica.</p>
                </div>
            </div>
        </section>

        <!-- Portales -->
        <section id="section-portales" class="section-view hidden fade-in max-w-7xl mx-auto">
            <header class="mb-8 pl-4 border-l-4 border-sky-500">
                <h1 class="text-3xl font-light tracking-tight text-stone-800"><span class="font-extrabold text-sky-600 text-3xl">P</span>ortales</h1>
            </header>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <?php
                $apps = [
                    ['RH', 'SGD Vacaciones', 'Gestión de permisos', 'emerald-500', 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z', 'http://128.150.102.131:8000'],
                    ['TI', 'Mesa de Ayuda', 'Soporte técnico', 'blue-500', 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z', 'http://128.150.102.131:8080/intimark/public/'],
                    ['PROD', 'Avances', 'Monitoreo líneas', 'orange-500', 'M13 10V3L4 14h7v7l9-11h-7z', 'http://128.150.102.40:8010'],
                    ['CORP', 'Directorio', 'Contactos internos', 'stone-500', 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'http://128.150.102.131:85/'],
                    ['RH', 'Intimedia', 'Cursos Online', 'purple-500', 'M12 14l9-5-9-5-9 5 9 5z', 'http://128.150.102.75/moodle/'],
                    ['LOG', 'Paquetería', 'Entradas/Salidas', 'cyan-500', 'M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z', 'http://128.150.102.40/registro_paqueteria'],
                ];
                foreach ($apps as $app): ?>
                    <a href="<?= $app[5] ?>" target="_blank" class="bg-white rounded-2xl p-5 border border-gray-100 hover:border-sky-300 hover:shadow-lg transition-all duration-300 group">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-<?= $app[3] ?>/10 flex items-center justify-center text-<?= $app[3] ?> group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $app[4] ?>"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-stone-800"><?= $app[1] ?></h3>
                                <p class="text-xs text-stone-500"><?= $app[2] ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Perfil -->
        <section id="section-perfil" class="section-view hidden fade-in max-w-6xl mx-auto">
            <header class="mb-8 pl-4 border-l-4 border-sky-500">
                <h1 class="text-3xl font-light tracking-tight text-stone-800"><span class="font-extrabold text-sky-600 text-3xl">M</span>i Perfil</h1>
            </header>
            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm flex items-center gap-6">
                <div class="w-20 h-20 rounded-full bg-stone-100 flex items-center justify-center text-3xl">👤</div>
                <div>
                    <h2 class="text-xl font-bold text-stone-800">Usuario Invitado</h2>
                </div>
            </div>
        </section>

    </main>

    <!-- PHP/HTML Rendered Gadget (NO JS REQUIRED FOR LAYOUT) -->
    <aside class="gadget-box">
        <div class="cal-wrapper">
            <div class="p-4 border-b border-gray-100 text-center">
                <div id="php-clock" class="text-2xl font-mono text-stone-800">--:--</div>
                <div class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mt-1">
                    <?php
                    setlocale(LC_TIME, 'es_ES.UTF-8', 'esp');
                    echo strftime('%A %d de %B');
                    ?>
                </div>
            </div>

            <div class="bg-gray-50 p-2 text-center text-[10px] font-bold text-stone-500 uppercase tracking-wider">
                <?php echo strftime('%B %Y'); ?>
            </div>

            <div class="cal-grid bg-white">
                <div class="text-[9px] text-stone-400 font-bold text-center">D</div>
                <div class="text-[9px] text-stone-400 font-bold text-center">L</div>
                <div class="text-[9px] text-stone-400 font-bold text-center">M</div>
                <div class="text-[9px] text-stone-400 font-bold text-center">M</div>
                <div class="text-[9px] text-stone-400 font-bold text-center">J</div>
                <div class="text-[9px] text-stone-400 font-bold text-center">V</div>
                <div class="text-[9px] text-stone-400 font-bold text-center">S</div>

                <?php
                $month = date('m');
                $year = date('Y');
                $firstDay = date('w', strtotime("$year-$month-01"));
                $daysInMonth = date('t', strtotime("$year-$month-01"));
                $today = date('d');

                // Empty slots
                for ($i = 0; $i < $firstDay; $i++) echo "<div></div>";

                // Days
                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $isToday = ($day == $today) ? 'cal-today shadow-md' : '';
                    echo "<div class='cal-cell $isToday'>$day</div>";
                }
                ?>
            </div>
        </div>
    </aside>

    <script>
        // JS only for clock and interactions
        window.addEventListener('load', () => setTimeout(() => {
            document.getElementById('welcome-overlay').style.opacity = '0';
            document.getElementById('welcome-overlay').style.visibility = 'hidden';
        }, 1500));

        // Clock
        function updateClock() {
            document.getElementById('php-clock').innerText = new Date().toLocaleTimeString('es-MX', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }
        setInterval(updateClock, 1000);
        updateClock();

        // Mouse
        const glow = document.getElementById('cursor-glow');
        document.addEventListener('mousemove', (e) => {
            requestAnimationFrame(() => {
                glow.style.left = e.clientX + 'px';
                glow.style.top = e.clientY + 'px';
            });
        });

        // Switcher
        function switchSection(id) {
            document.querySelectorAll('.nav-link').forEach(b => b.classList.remove('active'));
            const btn = Array.from(document.querySelectorAll('.nav-link')).find(b => b.getAttribute('onclick')?.includes(id));
            if (btn) btn.classList.add('active');
            document.querySelectorAll('.section-view').forEach(s => s.classList.add('hidden'));
            document.getElementById('section-' + id).classList.remove('hidden');
        }
    </script>
</body>

</html>