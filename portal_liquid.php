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
            /* cursor: none; REMOVED per user request */
        }

        /* Cursor Glow (Blue Light) */
        #cursor-glow {
            position: fixed;
            top: 0;
            left: 0;
            width: 400px;
            /* Reduced size */
            height: 400px;
            border-radius: 50%;
            /* Sky Blue Gradient */
            background: radial-gradient(circle, rgba(14, 165, 233, 0.15) 0%, rgba(14, 165, 233, 0) 70%);
            transform: translate(-50%, -50%);
            pointer-events: none;
            mix-blend-mode: multiply;
            z-index: 0;
            /* Behind everything */
            transition: background 0.3s ease;
        }

        /* Nav Pills - Liquid Effect */
        .glass-pill-nav {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .nav-link {
            position: relative;
            z-index: 10;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Active State: White floating pill */
        .nav-link.active {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            color: #0c4a6e;
            /* Sky-900 */
        }

        .nav-link:hover:not(.active) {
            background-color: rgba(255, 255, 255, 0.4);
        }

        /* Welcome Animation */
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

        /* Calendar Grid Fix */
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
        }
    </style>
</head>

<body class="bg-stone-100 text-stone-800 h-screen overflow-hidden selection:bg-sky-200 selection:text-sky-900">

    <div id="cursor-glow"></div>

    <!-- Welcome Overlay -->
    <div id="welcome-overlay">
        <img src="img/logo.png" alt="Logo" class="welcome-logo w-32 object-contain">
    </div>

    <!-- Liquid Nav -->
    <nav class="fixed top-6 left-1/2 -translate-x-1/2 z-50 hidden md:flex p-1.5 rounded-full glass-pill-nav fade-in" style="animation-delay: 1.2s;">
        <button onclick="switchSection('avisos')" class="nav-link active px-6 py-2 rounded-full text-sm font-medium text-stone-600">Avisos</button>
        <button onclick="switchSection('portales')" class="nav-link px-6 py-2 rounded-full text-sm font-medium text-stone-600">Portales</button>
        <button onclick="switchSection('perfil')" class="nav-link px-6 py-2 rounded-full text-sm font-medium text-stone-600">Mi Perfil</button>
    </nav>

    <!-- Main Content -->
    <main class="relative h-full w-full pt-28 px-4 md:px-12 lg:px-24 pb-12 overflow-y-auto z-10">

        <!-- Portales View -->
        <section id="section-portales" class="section-view hidden fade-in max-w-7xl mx-auto">
            <header class="mb-8">
                <h1 class="text-3xl font-light tracking-tight text-stone-800">Menú <span class="font-bold text-sky-600">Principal</span></h1>
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
                    <a href="<?= $app[5] ?>" target="_blank" class="bg-white/80 backdrop-blur-sm rounded-2xl p-5 border border-white hover:border-sky-300 hover:shadow-lg hover:shadow-sky-100 transition-all duration-300 group">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-<?= $app[3] ?>/10 flex items-center justify-center text-<?= $app[3] ?> group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $app[4] ?>"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-stone-800 group-hover:text-black"><?= $app[1] ?></h3>
                                <p class="text-xs text-stone-500"><?= $app[2] ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Avisos View -->
        <section id="section-avisos" class="section-view fade-in max-w-6xl mx-auto block">
            <header class="mb-8">
                <h2 class="text-3xl font-light text-stone-800">Tablero de <span class="font-bold text-sky-600">Avisos</span></h2>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Main Notice -->
                <div class="md:col-span-2 bg-white/60 backdrop-blur-md rounded-3xl p-8 border border-white shadow-sm">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-xs font-bold">IMPORTANTE</span>
                        <span class="text-xs text-stone-400">Hace 2 horas</span>
                    </div>
                    <h3 class="text-2xl font-bold text-stone-800 mb-3">Mantenimiento Global de Servidores</h3>
                    <p class="text-stone-600">
                        Se informa a todo el personal que este fin de semana se realizará una actualización crítica.
                        Los servicios podrían presentar intermitencia el sábado de 14:00 a 16:00 hrs.
                    </p>
                </div>

                <!-- Side Notices -->
                <div class="flex flex-col gap-4">
                    <div class="bg-white/60 backdrop-blur-md rounded-3xl p-6 border border-white shadow-sm hover:bg-white transition-colors cursor-pointer">
                        <h4 class="font-bold text-stone-800 text-sm mb-1">Nómina Disponible</h4>
                        <p class="text-xs text-stone-500">Descarga tus recibos de la quincena.</p>
                    </div>
                    <div class="bg-white/60 backdrop-blur-md rounded-3xl p-6 border border-white shadow-sm hover:bg-white transition-colors cursor-pointer">
                        <h4 class="font-bold text-stone-800 text-sm mb-1">Simulacro</h4>
                        <p class="text-xs text-stone-500">Miércoles 11:00 AM, punto de reunión patio.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FLOATING GADGET (Revised: Small, Auto-adjusting position, Correct Grid) -->
    <!-- Placing it Fixed Top Right to avoid 'footer' overlap issues, and scaled down -->
    <aside class="fixed top-24 right-8 z-30 hidden lg:block w-56 animate-fade-in-up">

        <!-- Glass Container -->
        <div class="bg-white/70 backdrop-blur-xl border border-white/50 shadow-2xl rounded-3xl p-4 transform transition-all hover:scale-105">

            <!-- Clock -->
            <div class="text-center mb-4 border-b border-gray-200 pb-3">
                <div id="live-clock" class="text-2xl font-light text-stone-800 font-mono tracking-tight">--:--</div>
                <div id="live-date" class="text-[10px] font-bold text-stone-400 uppercase tracking-widest mt-1">...</div>
            </div>

            <!-- Calendar -->
            <div>
                <div class="flex justify-between items-center mb-2 px-1">
                    <h3 id="cal-month" class="text-xs font-bold text-stone-700 capitalize">...</h3>
                </div>

                <div class="calendar-grid text-[10px] font-bold text-stone-400 mb-1 text-center">
                    <span>D</span><span>L</span><span>M</span><span>M</span><span>J</span><span>V</span><span>S</span>
                </div>

                <!-- Explicit Grid Container for Days -->
                <div id="mini-calendar" class="calendar-grid text-center">
                    <!-- JS Injected -->
                </div>
            </div>
        </div>
    </aside>

    <script>
        // 1. Welcome Animation
        window.addEventListener('load', () => {
            setTimeout(() => {
                const ov = document.getElementById('welcome-overlay');
                ov.style.opacity = '0';
                ov.style.visibility = 'hidden';
            }, 1800);
        });

        // 2. Mouse Glow (Blue)
        const glow = document.getElementById('cursor-glow');
        let mouseX = window.innerWidth / 2,
            mouseY = window.innerHeight / 2;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            // Immediate update for responsiveness
            glow.style.left = mouseX + 'px';
            glow.style.top = mouseY + 'px';
        });

        // 3. Navigation
        function switchSection(id) {
            document.querySelectorAll('.nav-link').forEach(b => b.classList.remove('active'));
            const btn = Array.from(document.querySelectorAll('.nav-link')).find(b => b.textContent.toLowerCase().includes(id) || b.getAttribute('onclick').includes(id));
            if (btn) btn.classList.add('active');

            document.querySelectorAll('.section-view').forEach(s => s.classList.add('hidden'));
            document.getElementById('section-' + id).classList.remove('hidden');
        }

        // 4. Gadget Logic
        function updateGadget() {
            const now = new Date();

            // Time
            document.getElementById('live-clock').innerText = now.toLocaleTimeString('es-MX', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            // Date
            const dateStr = now.toLocaleDateString('es-MX', {
                weekday: 'long',
                day: 'numeric',
                month: 'long'
            });
            document.getElementById('live-date').innerText = dateStr;

            // Calendar
            const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            document.getElementById('cal-month').innerText = monthNames[now.getMonth()];

            renderCal(now);
        }

        function renderCal(date) {
            const container = document.getElementById('mini-calendar');
            if (container.children.length > 0 && container.getAttribute('data-month') == date.getMonth()) return;

            container.innerHTML = '';
            container.setAttribute('data-month', date.getMonth());

            const year = date.getFullYear();
            const month = date.getMonth();
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const today = new Date().getDate();

            // Padding
            for (let i = 0; i < firstDay; i++) {
                container.appendChild(document.createElement('div'));
            }

            // Days
            for (let i = 1; i <= daysInMonth; i++) {
                const el = document.createElement('div');
                el.className = "w-6 h-6 flex items-center justify-center rounded-full text-xs text-stone-600 mb-0.5 mx-auto";
                el.innerText = i;

                if (i === today) {
                    el.classList.add('bg-sky-500', 'text-white', 'font-bold', 'shadow-md');
                    el.classList.remove('text-stone-600');
                }
                container.appendChild(el);
            }
        }

        setInterval(updateGadget, 1000);
        updateGadget();
    </script>
</body>

</html>