<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intimark Portal 2026</title>
    <!-- Usamos el CSS compilado localmente -->
    <link href="./dist/output.css" rel="stylesheet">

    <style>
        /* Tipografía System Apple-style */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            cursor: none;
            /* Ocultamos el cursor por defecto para usar el personalizado */
        }

        /* Cursor Personalizado (Glow Warm) */
        #cursor-glow {
            position: fixed;
            top: 0;
            left: 0;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(251, 146, 60, 0.15) 0%, rgba(251, 146, 60, 0) 70%);
            transform: translate(-50%, -50%);
            pointer-events: none;
            mix-blend-mode: multiply;
            /* Fusión suave con el fondo */
            z-index: 9999;
            transition: background 0.5s ease;
        }

        /* Pequeño puntero central para precisión */
        #cursor-dot {
            position: fixed;
            top: 0;
            left: 0;
            width: 8px;
            height: 8px;
            background-color: rgba(251, 146, 60, 0.8);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            z-index: 10000;
            transition: transform 0.1s ease-out;
            box-shadow: 0 0 10px rgba(251, 146, 60, 0.5);
        }

        /* Animación y Pantalla de Bienvenida */
        #welcome-overlay {
            position: fixed;
            inset: 0;
            background-color: #f5f5f4;
            /* Stone-100 */
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.8s ease-out, visibility 0.8s;
        }

        .welcome-logo {
            width: 150px;
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

        /* Liquid Navigation Active State */
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link.active {
            color: #1c1917;
            /* Stone-900 */
            font-weight: 600;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            background-color: #f97316;
            /* Orange-500 */
            border-radius: 50%;
            box-shadow: 0 0 5px #f97316;
        }

        /* Glassmorphism Utilities */
        .glass-panel {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.7);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Animaciones generales */
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

        /* Habilitar cursor pointer en elementos interactivos */
        a,
        button,
        input,
        .cursor-pointer {
            cursor: none;
            /* Mantenemos 'none' para que el custom cursor haga el trabajo, 
                             pero usamos JS para hover states si es necesario */
        }
    </style>
</head>
<!-- Fondo intermedio amigable: Stone-100 (Cálido gris claro) -->

<body class="bg-stone-100 text-stone-800 h-screen overflow-hidden selection:bg-orange-200 selection:text-orange-900">

    <!-- Custom Cursor Elements -->
    <div id="cursor-glow"></div>
    <div id="cursor-dot"></div>

    <!-- Welcome Overlay -->
    <div id="welcome-overlay">
        <img src="img/logo.png" alt="Logo" class="welcome-logo object-contain">
    </div>

    <!-- Liquid Top Navigation (Hidden on mobile initially, visible on md+) -->
    <nav class="fixed top-6 left-1/2 -translate-x-1/2 z-40 hidden md:flex items-center gap-1 p-1.5 rounded-full glass-panel fade-in" style="animation-delay: 1.6s;">

        <button onclick="switchSection('avisos')" class="nav-link active px-6 py-2 rounded-full text-sm text-stone-600 hover:bg-white/50 transition duration-300">
            Avisos
        </button>

        <div class="w-px h-4 bg-stone-300 mx-1"></div>

        <button onclick="switchSection('portales')" class="nav-link px-6 py-2 rounded-full text-sm text-stone-600 hover:bg-white/50 transition duration-300">
            Portales
        </button>

        <div class="w-px h-4 bg-stone-300 mx-1"></div>

        <button onclick="switchSection('perfil')" class="nav-link px-6 py-2 rounded-full text-sm text-stone-600 hover:bg-white/50 transition duration-300">
            Mi Perfil
        </button>
    </nav>

    <!-- Mobile Menu Toggle (Visible only on small screens) -->
    <div class="md:hidden fixed top-4 right-4 z-50">
        <button class="p-3 bg-white/80 backdrop-blur-md rounded-full shadow-lg text-stone-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Main Content Container -->
    <main class="relative h-full w-full pt-28 px-4 md:px-12 lg:px-24 pb-12 overflow-y-auto">

        <!-- Section: Portales (Default Hidden, managed by JS) -->
        <section id="section-portales" class="section-view hidden fade-in max-w-7xl mx-auto">
            <header class="mb-12 text-center md:text-left">
                <h1 class="text-4xl font-bold tracking-tight text-stone-800 mb-2">Hola, bienvenido de nuevo.</h1>
                <p class="text-stone-500 text-lg">Selecciona un portal para comenzar tu trabajo.</p>
            </header>

            <!-- Grid de Portales -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Portal Cards -->
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
                    <a href="<?= $app[5] ?>" target="_blank" class="glass-card rounded-3xl p-6 relative group overflow-hidden block">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-<?= $app[3] ?>/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>

                        <div class="relative z-10 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-4">
                                <span class="text-[10px] font-bold tracking-widest text-stone-400 uppercase"><?= $app[0] ?></span>
                                <div class="w-10 h-10 rounded-full bg-<?= $app[3] ?>/10 flex items-center justify-center text-<?= $app[3] ?>">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $app[4] ?>"></path>
                                    </svg>
                                </div>
                            </div>

                            <h3 class="text-lg font-bold text-stone-800 mb-1 group-hover:text-amber-600 transition-colors"><?= $app[1] ?></h3>
                            <p class="text-sm text-stone-500 mb-6"><?= $app[2] ?></p>

                            <div class="mt-auto flex items-center text-xs font-semibold text-<?= $app[3] ?> opacity-60 group-hover:opacity-100 transition-opacity">
                                Abrir sistema <span class="ml-1 text-lg leading-none">&rarr;</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Section: Avisos (Default Visible) -->
        <section id="section-avisos" class="section-view fade-in max-w-6xl mx-auto" style="display: block;"> <!-- Init Visible -->
            <div class="flex flex-col md:flex-row gap-12">

                <!-- Main Board -->
                <div class="flex-1">
                    <header class="mb-8">
                        <h2 class="text-3xl font-light text-stone-800">Tablero de <span class="font-bold text-amber-600">Avisos</span></h2>
                    </header>

                    <div class="grid grid-cols-1 gap-4">
                        <!-- Featured Notice -->
                        <div class="glass-card rounded-3xl p-8 border-l-4 border-l-amber-500">
                            <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-bold mb-4">IMPORTANTE</span>
                            <h3 class="text-2xl font-bold text-stone-800 mb-3">Mantenimiento Global de Servidores</h3>
                            <p class="text-stone-600 leading-relaxed">
                                Se informa a todo el personal que este fin de semana se realizará una actualización crítica en la infraestructura.
                                Los servicios podrían presentar intermitencia el sábado de 14:00 a 16:00 hrs.
                            </p>
                            <div class="mt-6 flex items-center gap-3 text-sm text-stone-400">
                                <span>Publicado por: Sistemas</span>
                                <span>&bull;</span>
                                <span>Hace 2 horas</span>
                            </div>
                        </div>

                        <!-- Secondary Notices -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="glass-card rounded-3xl p-6">
                                <span class="text-blue-500 text-xs font-bold uppercase">Recursos Humanos</span>
                                <h4 class="font-bold text-lg text-stone-800 mt-2">Nómina Disponible</h4>
                                <p class="text-sm text-stone-500 mt-2">Ya puedes descargar tus recibos correspondientes a la quincena actual.</p>
                            </div>

                            <div class="glass-card rounded-3xl p-6">
                                <span class="text-emerald-500 text-xs font-bold uppercase">Seguridad</span>
                                <h4 class="font-bold text-lg text-stone-800 mt-2">Simulacro de Evacuación</h4>
                                <p class="text-sm text-stone-500 mt-2">El próximo miércoles a las 11:00 AM se activará la alarma general.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar / Gadget Space (Desktop) -->
                <!-- Gadget Area (Sticky) -->
                <div class="hidden xl:block w-80 shrink-0">
                    <!-- Gadget is handled by fixed positioning in "Floating Gadget" below for aesthetic compliance with request, 
                        but we leave this space in grid to prevent overlap if we wanted inline. 
                        Actually user asked for "Corner Gadget". Let's put it fixed bottom-right or top-right.
                        I'll use fixed positioning as requested "como un gadget".
                   -->
                </div>

            </div>
        </section>

    </main>

    <!-- Floating Elegant Gadget (Bottom Right) -->
    <aside class="fixed bottom-8 right-8 z-30 hidden lg:flex flex-col gap-4 animate-slide-up" style="animation-delay: 1.8s;">

        <!-- Date/Time Card -->
        <div class="glass-panel rounded-3xl p-6 text-center w-72 backdrop-blur-2xl bg-white/80 border border-white/60 shadow-2xl">
            <div id="live-clock" class="text-4xl font-light text-stone-800 tracking-tight font-variant-numeric tabular-nums">
                --:--:--
            </div>
            <div id="live-date" class="text-xs font-bold text-stone-500 uppercase tracking-widest mt-2 border-t border-stone-200 pt-2">
                Cargando fecha...
            </div>
        </div>

        <!-- Calendar Card -->
        <div class="glass-panel rounded-3xl p-6 w-72 backdrop-blur-2xl bg-white/80 border border-white/60 shadow-2xl">
            <div class="flex justify-between items-center mb-4">
                <h3 id="cal-title" class="text-sm font-bold text-stone-800 capitalize">Diciembre</h3>
                <div class="flex gap-1">
                    <div class="w-1.5 h-1.5 rounded-full bg-red-400"></div>
                    <div class="w-1.5 h-1.5 rounded-full bg-yellow-400"></div>
                    <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>
                </div>
            </div>

            <!-- Days Header -->
            <div class="grid grid-cols-7 text-center mb-2">
                <span class="text-[10px] font-bold text-stone-400">D</span>
                <span class="text-[10px] font-bold text-stone-400">L</span>
                <span class="text-[10px] font-bold text-stone-400">M</span>
                <span class="text-[10px] font-bold text-stone-400">M</span>
                <span class="text-[10px] font-bold text-stone-400">J</span>
                <span class="text-[10px] font-bold text-stone-400">V</span>
                <span class="text-[10px] font-bold text-stone-400">S</span>
            </div>

            <!-- Calendar Grid -->
            <div id="mini-calendar" class="grid grid-cols-7 gap-1 text-center">
                <!-- JS Injected -->
            </div>
        </div>
    </aside>

    <script>
        // --- 1. Welcome Animation Management ---
        window.addEventListener('load', () => {
            const overlay = document.getElementById('welcome-overlay');
            // Wait 1.5s for animation then fade out
            setTimeout(() => {
                overlay.style.opacity = '0';
                overlay.style.visibility = 'hidden';
            }, 1800);
        });

        // --- 2. Custom Cursor Logic (Warm Follower) ---
        const cursorGlow = document.getElementById('cursor-glow');
        const cursorDot = document.getElementById('cursor-dot');
        const root = document.documentElement;

        document.addEventListener('mousemove', (e) => {
            const {
                clientX: x,
                clientY: y
            } = e;

            // Move dot instantly
            cursorDot.style.left = x + 'px';
            cursorDot.style.top = y + 'px';

            // Move glow with slight delay/smoothing (CSS transition handles smoothing)
            // But we update position immediately, let CSS lag slightly if needed or just track
            cursorGlow.style.left = x + 'px';
            cursorGlow.style.top = y + 'px';

            // Dynamic Color Shift based on screen position (Subtle)
            // Warm range: Orange (251, 146, 60) -> Rose (251, 113, 133) -> Amber (251, 191, 36)
            const xPct = x / window.innerWidth;
            const yPct = y / window.innerHeight;

            // Calculate a warm hue shift (approx 20deg to 50deg)
            // Orange is ~30. 
            const hue = 30 + (xPct * 20) - (yPct * 10);
            cursorGlow.style.background = `radial-gradient(circle, hsla(${hue}, 90%, 60%, 0.15) 0%, rgba(0,0,0,0) 70%)`;
            cursorDot.style.backgroundColor = `hsla(${hue}, 90%, 60%, 0.9)`;
        });

        // Mouse Down Effect
        document.addEventListener('mousedown', () => {
            cursorDot.style.transform = 'translate(-50%, -50%) scale(0.8)';
            cursorGlow.style.transform = 'translate(-50%, -50%) scale(0.9)';
        });

        document.addEventListener('mouseup', () => {
            cursorDot.style.transform = 'translate(-50%, -50%) scale(1)';
            cursorGlow.style.transform = 'translate(-50%, -50%) scale(1)';
        });

        // Interactive Elements Hover Effect
        const interactiveSelectors = 'a, button, input, .cursor-pointer, .glass-card';
        document.querySelectorAll(interactiveSelectors).forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursorDot.style.transform = 'translate(-50%, -50%) scale(1.5)';
                cursorDot.style.opacity = '0.5';
                cursorGlow.style.width = '700px'; // Grow glow
                cursorGlow.style.height = '700px';
            });
            el.addEventListener('mouseleave', () => {
                cursorDot.style.transform = 'translate(-50%, -50%) scale(1)';
                cursorDot.style.opacity = '1';
                cursorGlow.style.width = '600px';
                cursorGlow.style.height = '600px';
            });
        });


        // --- 3. Navigation Logic ---
        function switchSection(secId) {
            // Update Menu
            document.querySelectorAll('.nav-link').forEach(btn => btn.classList.remove('active'));
            // Find button (heuristic: based on text or onclick) - Simplifying matching by just setting all inactive and active logic separately? 
            // Better: Pass `this` or match by text. Let's rely on cleaning all and highlighting clicked.
            const targetBtn = Array.from(document.querySelectorAll('.nav-link')).find(b => b.textContent.trim().toLowerCase().includes(secId) || (secId === 'avisos' && b.textContent.includes('Avisos')));
            if (targetBtn) targetBtn.classList.add('active');

            // Hide all sections
            document.querySelectorAll('.section-view').forEach(el => el.classList.add('hidden'));

            // Show target
            const target = document.getElementById('section-' + secId);
            if (target) {
                target.classList.remove('hidden');
                // Retrigger animation
                target.classList.remove('fade-in');
                void target.offsetWidth; // trigger reflow
                target.classList.add('fade-in');
            } else {
                // If section doesn't exist (e.g. Profil), standard fallback or alert
                // For this demo, show Avisos if not found or just alert
                if (secId === 'perfil') return;
                document.getElementById('section-avisos').classList.remove('hidden');
            }
        }

        // Init default active
        // (Avisos is default in HTML)


        // --- 4. Gadget Logic (Clock & Calendar) ---
        function updateGadget() {
            const now = new Date();

            // Clock
            const timeStr = now.toLocaleTimeString('es-MX', {
                hour12: false
            }); // 11:46:12
            document.getElementById('live-clock').textContent = timeStr;

            // Date Text
            const dateOptions = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            const dateStr = now.toLocaleDateString('es-MX', dateOptions);
            // Capitalize first letter
            document.getElementById('live-date').textContent = dateStr.charAt(0).toUpperCase() + dateStr.slice(1);

            // Calendar
            renderMiniCalendar(now);
        }

        let lastRenderedMonth = -1;

        function renderMiniCalendar(date) {
            const month = date.getMonth();
            const year = date.getFullYear();

            // Only re-render if month changed
            if (month === lastRenderedMonth) return;
            lastRenderedMonth = month;

            const daysContainer = document.getElementById('mini-calendar');
            const title = document.getElementById('cal-title');

            const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            title.textContent = `${monthNames[month]} ${year}`;

            daysContainer.innerHTML = '';

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const todayDate = new Date().getDate();
            const isCurrentMonth = new Date().getMonth() === month;

            // Empty slots
            for (let i = 0; i < firstDay; i++) {
                daysContainer.appendChild(document.createElement('div'));
            }

            // Days
            for (let i = 1; i <= daysInMonth; i++) {
                const dayEl = document.createElement('div');
                dayEl.textContent = i;
                dayEl.className = "h-8 w-8 flex items-center justify-center rounded-full text-xs text-stone-600 mx-auto transition-colors hover:bg-stone-100 cursor-pointer";

                if (isCurrentMonth && i === todayDate) {
                    dayEl.classList.add('bg-amber-500', 'text-white', 'font-bold', 'shadow-md');
                    dayEl.classList.remove('text-stone-600', 'hover:bg-stone-100');
                }

                daysContainer.appendChild(dayEl);
            }
        }

        setInterval(updateGadget, 1000);
        updateGadget(); // Init

        // Initialize animation for default section
        switchSection('avisos');
    </script>
</body>

</html>