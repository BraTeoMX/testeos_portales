<!DOCTYPE html>
<html lang="es" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intimark OS</title>
    <!-- Tailwind CSS -->
    <link href="./dist/output.css" rel="stylesheet">
    <!-- Google Fonts: Inter & Outfit -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #000;
            background-image:
                radial-gradient(at 0% 0%, rgba(56, 189, 248, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(236, 72, 153, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(168, 85, 247, 0.15) 0px, transparent 50%);
            background-attachment: fixed;
        }

        h1,
        h2,
        h3,
        .brand-font {
            font-family: 'Outfit', sans-serif;
        }

        /* Hide Scrollbar */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Glassmorphism Classes */
        .glass {
            background: rgba(20, 20, 22, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
        }

        .glass-lighter {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-hover:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 15px 40px -10px rgba(0, 0, 0, 0.5);
        }

        /* Grid Layouts */
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-auto-rows: minmax(140px, auto);
            gap: 1.5rem;
        }

        /* Search Glow */
        .search-glow {
            box-shadow: 0 0 40px -10px rgba(56, 189, 248, 0.3);
        }

        .search-glow:focus-within {
            box-shadow: 0 0 60px -10px rgba(56, 189, 248, 0.5);
            border-color: rgba(56, 189, 248, 0.5);
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>

<body class="text-white min-h-screen selection:bg-fuchsia-500 selection:text-white overflow-x-hidden">

    <!-- Background Elements -->
    <div class="fixed inset-0 pointer-events-none z-[-1]">
        <div class="absolute top-20 left-20 w-96 h-96 bg-blue-600/20 rounded-full blur-[100px] animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-600/20 rounded-full blur-[100px] animate-pulse" style="animation-delay: 2s"></div>
    </div>

    <!-- Main Container -->
    <main class="container mx-auto px-4 lg:px-8 py-8 lg:py-12 max-w-7xl min-h-screen flex flex-col pb-32">

        <!-- Top Bar (Minimalist) -->
        <header class="flex justify-between items-center mb-12 animate-fade-in-down">
            <div class="flex items-center gap-4">
                <img src="./img/logo.png" alt="Intimark" class="h-10 w-auto opacity-90 invert brightness-0">
                <div class="h-8 w-px bg-white/10"></div>
                <span class="text-xs font-medium tracking-[0.2em] uppercase text-white/50">Workspace OS</span>
            </div>

            <div class="flex items-center gap-6">
                <div class="text-right hidden sm:block">
                    <p id="clock-time" class="text-2xl font-bold font-mono tracking-tighter leading-none">12:00</p>
                    <p id="clock-date" class="text-xs font-medium text-white/40 uppercase tracking-widest">Lun, 23 Dic</p>
                </div>
                <div class="h-10 w-10 rounded-full glass flex items-center justify-center text-white/80 cursor-pointer hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
        </header>

        <!-- Command Center (Search) -->
        <section class="max-w-2xl mx-auto w-full mb-16 relative z-10 animate-fade-in-up">
            <div class="text-center mb-8">
                <h1 class="text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white via-white to-white/50 mb-2 brand-font">¿Qué creamos hoy?</h1>
                <p class="text-white/40 text-lg">Busca apps, reportes o métricas...</p>
            </div>

            <div class="relative group glass rounded-3xl transition-all duration-300 search-glow">
                <div class="absolute inset-y-0 left-0 flex items-center pl-6 pointer-events-none">
                    <svg class="w-6 h-6 text-fuchsia-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" id="commandInput" class="block w-full py-5 pl-16 pr-6 bg-transparent border-none text-xl text-white placeholder-white/20 focus:ring-0 focus:outline-none" placeholder="Escribe para buscar..." autocomplete="off">
                <div class="absolute right-4 top-1/2 -translate-y-1/2 hidden md:flex gap-2">
                    <span class="px-2 py-1 rounded-md bg-white/10 text-[10px] font-mono text-white/50 border border-white/5">CTRL</span>
                    <span class="px-2 py-1 rounded-md bg-white/10 text-[10px] font-mono text-white/50 border border-white/5">K</span>
                </div>
            </div>
        </section>

        <!-- Bento Grid Layout -->
        <section class="bento-grid relative" id="bento-container">
            <!-- Featured: Large Widget (Production) -->
            <a href="http://128.150.102.40:8010" target="_blank" class="col-span-12 md:col-span-8 lg:col-span-8 row-span-2 glass rounded-3xl p-8 relative overflow-hidden group glass-hover transition-all duration-500 service-card" data-category="producción" data-keywords="produccion eficiencia metricas lineas">
                <div class="absolute top-0 right-0 w-64 h-64 bg-fuchsia-500/20 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/4 group-hover:bg-fuchsia-500/30 transition-all duration-500"></div>
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div class="flex justify-between items-start">
                        <span class="px-3 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-semibold text-fuchsia-300">Producción en Vivo</span>
                        <svg class="w-6 h-6 text-white/30 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold mb-2">Avances de Producción</h3>
                        <p class="text-white/60 text-lg max-w-md">Monitoreo en tiempo real de líneas y metas horarias.</p>
                    </div>
                </div>
                <!-- Background Image Faded -->
                <img src="./img/produccion.png" class="absolute bottom-0 right-0 w-1/2 opacity-20 group-hover:opacity-40 group-hover:scale-105 transition-all duration-700 mask-image-gradient" style="mask-image: linear-gradient(to left, black, transparent);">
            </a>

            <!-- Medium Widget: Intimedia -->
            <a href="http://128.150.102.75/moodle/" target="_blank" class="col-span-12 md:col-span-4 lg:col-span-4 row-span-2 glass rounded-3xl p-6 relative overflow-hidden group glass-hover transition-all duration-500 service-card" data-category="rh" data-keywords="cursos escuela entrenamiento">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-blue-900/40 opacity-50"></div>
                <img src="./img/intro-section.png" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:opacity-60 transition-opacity duration-500">
                <div class="relative z-10 flex flex-col h-full justify-end">
                    <span class="px-2 py-1 rounded-md bg-blue-500/20 backdrop-blur-md border border-blue-500/30 text-[10px] font-bold text-blue-300 self-start mb-2">EDUCACIÓN</span>
                    <h3 class="text-2xl font-bold">Intimedia</h3>
                    <p class="text-sm text-white/70">Plataforma de capacitación</p>
                </div>
            </a>

            <!-- Small Widgets Grid Loop -->
            <?php
            // Data Array
            $cards = [
                ['title' => 'Pedir Accesos', 'desc' => 'Solicitud de acceso', 'url' => '/portal/Permisos/Contact', 'img' => '', 'icon' => 'key', 'category' => 'TI', 'keywords' => 'permisos sistemas'],
                ['title' => 'Incidencias TI', 'desc' => 'Levantar reporte', 'url' => 'http://128.150.102.131:8080/intimark/public/', 'img' => '', 'icon' => 'support', 'category' => 'TI', 'keywords' => 'soporte ticket'],
                ['title' => 'Directorio', 'desc' => 'Teléfonos internos', 'url' => 'http://128.150.102.131:85/', 'img' => '', 'icon' => 'phone', 'category' => 'Corporativo', 'keywords' => 'telefono extension'],
                ['title' => 'Salas', 'desc' => 'Reservar juntas', 'url' => 'http://128.150.102.131:86/', 'img' => '', 'icon' => 'calendar', 'category' => 'Servicios', 'keywords' => 'junta reunion'],
                ['title' => 'Eficiencias', 'desc' => 'KPIs Planta', 'url' => 'http://128.150.102.131/eficiencias', 'img' => '', 'icon' => 'chart', 'category' => 'Producción', 'keywords' => 'costura indicadores'],
                ['title' => 'Impresoras', 'desc' => 'Toners y Hojas', 'url' => '/portal/Printer/Request', 'img' => '', 'icon' => 'print', 'category' => 'TI', 'keywords' => 'toner tinta'],
                ['title' => 'Procedimientos', 'desc' => 'Manuales y DRP', 'url' => 'http://128.150.102.131:90/Account/Login', 'img' => '', 'icon' => 'book', 'category' => 'Calidad', 'keywords' => 'isos procesos'],
                ['title' => 'Control Accesos', 'desc' => 'Bitácora visitas', 'url' => 'http://128.150.102.131:8080/planta/loginvista.html', 'img' => '', 'icon' => 'shield', 'category' => 'Seguridad', 'keywords' => 'vigilancia'],
                ['title' => 'SGD', 'desc' => 'Vacaciones', 'url' => 'http://128.150.102.131:8000', 'img' => '', 'icon' => 'sun', 'category' => 'RH', 'keywords' => 'vacaciones nomina'],
                ['title' => 'Dashboard SGD', 'desc' => 'Métricas RH', 'url' => 'http://128.150.102.131:8010', 'img' => '', 'icon' => 'users', 'category' => 'RH', 'keywords' => 'graficas personal'],
                ['title' => 'Backlog', 'desc' => 'Pendientes', 'url' => 'http://128.150.102.131:8030', 'img' => '', 'icon' => 'list', 'category' => 'Producción', 'keywords' => 'cargas trabajo'],
                ['title' => 'Paquetería', 'desc' => 'Guías y Envíos', 'url' => 'http://128.150.102.40/registro_paqueteria', 'img' => '', 'icon' => 'truck', 'category' => 'Logística', 'keywords' => 'dhl fedex'],
            ];

            // Icons Mapping (SVG Paths)
            $icons = [
                'key' => 'M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z',
                'support' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z',
                'phone' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
                'calendar' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                'chart' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                'print' => 'M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z',
                'book' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                'shield' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'sun' => 'M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z',
                'users' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                'list' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                'truck' => 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4' // Generic swap icon actually, will use simple path
            ];

            foreach ($cards as $card):
                // Determines size randomly or by logic, here purely grid-based
                // We use standard 3-col span for small widgets (on 12-col grid -> 4 items per row on large)
            ?>

                <a href="<?= $card['url'] ?>" target="_blank" class="col-span-6 md:col-span-4 lg:col-span-3 glass-lighter rounded-2xl p-5 flex flex-col justify-between hover:bg-white/10 transition-all duration-300 group service-card"
                    data-title="<?= strtolower($card['title']) ?>"
                    data-desc="<?= strtolower($card['desc']) ?>"
                    data-category="<?= strtolower($card['category']) ?>"
                    data-keywords="<?= strtolower($card['keywords']) ?>">

                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 rounded-xl bg-white/5 group-hover:bg-white/10 transition-colors text-white/80 group-hover:text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="<?= $icons[$card['icon']] ?? $icons['list'] ?>"></path>
                            </svg>
                        </div>
                        <?php if ($card['category'] == 'TI' || $card['category'] == 'Producción'): ?>
                            <div class="h-2 w-2 rounded-full bg-emerald-400 shadow-[0_0_10px_rgba(52,211,153,0.5)] animate-pulse"></div>
                        <?php endif; ?>
                    </div>

                    <div>
                        <h4 class="font-bold text-lg mb-1 group-hover:text-fuchsia-300 transition-colors"><?= $card['title'] ?></h4>
                        <p class="text-xs text-white/40 group-hover:text-white/60 transition-colors"><?= $card['desc'] ?></p>
                    </div>
                </a>

            <?php endforeach; ?>

        </section>

        <!-- No Results -->
        <div id="noResults" class="hidden flex-col items-center justify-center py-32 text-center animate-fade-in-up">
            <h3 class="text-2xl font-bold text-white/50">Nada por aquí...</h3>
            <p class="text-white/30 mt-2">Prueba buscando "Vacaciones" o "Soporte"</p>
        </div>

    </main>

    <!-- Floating Dock Navigation -->
    <div class="fixed bottom-8 left-1/2 -translate-x-1/2 z-50">
        <div class="glass px-6 py-4 rounded-3xl flex items-center gap-6 shadow-2xl scale-100 hover:scale-105 transition-transform duration-300">
            <button class="filter-btn text-white/60 hover:text-white hover:-translate-y-1 transition-all duration-200 tooltip-trigger" data-category="all" title="Todo">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
            </button>
            <div class="w-px h-6 bg-white/10"></div>
            <button class="filter-btn text-white/60 hover:text-blue-400 hover:-translate-y-1 transition-all duration-200" data-category="ti" title="TI">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </button>
            <button class="filter-btn text-white/60 hover:text-pink-400 hover:-translate-y-1 transition-all duration-200" data-category="rh" title="RH">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </button>
            <button class="filter-btn text-white/60 hover:text-orange-400 hover:-translate-y-1 transition-all duration-200" data-category="producción" title="Producción">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                </svg>
            </button>
            <div class="w-px h-6 bg-white/10"></div>
            <button onclick="window.location.href='dashboard.php'" class="text-white/40 hover:text-white transition-colors" title="Volver al Dashboard Clásico">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
                </svg>
            </button>
        </div>
    </div>

    <script>
        // --- Clock Logic ---
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('es-MX', {
                hour: '2-digit',
                minute: '2-digit'
            });
            const dateString = now.toLocaleDateString('es-MX', {
                weekday: 'short',
                day: 'numeric',
                month: 'short'
            });

            document.getElementById('clock-time').textContent = timeString;
            document.getElementById('clock-date').textContent = dateString;
        }
        setInterval(updateClock, 1000);
        updateClock();

        // --- Shortcuts (Ctrl+K) ---
        document.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                document.getElementById('commandInput').focus();
            }
        });

        // --- Search & Filter Logic ---
        const searchInput = document.getElementById('commandInput');
        const cards = document.querySelectorAll('.service-card');
        const noResults = document.getElementById('noResults');
        const filterBtns = document.querySelectorAll('.filter-btn');
        let currentCategory = 'all';

        function filterItems() {
            const term = searchInput.value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            let visibleCount = 0;

            cards.forEach(card => {
                const title = card.getAttribute('data-title');
                const desc = card.getAttribute('data-desc');
                const keys = card.getAttribute('data-keywords');
                const cat = card.getAttribute('data-category');

                const matchesSearch = title.includes(term) || desc.includes(term) || keys.includes(term);
                const matchesCategory = currentCategory === 'all' || cat === currentCategory;

                if (matchesSearch && matchesCategory) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
                noResults.classList.add('flex');
            } else {
                noResults.classList.add('hidden');
                noResults.classList.remove('flex');
            }
        }

        searchInput.addEventListener('input', filterItems);

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active scale from all
                filterBtns.forEach(b => b.classList.remove('text-blue-400', 'text-pink-400', 'text-orange-400', 'scale-125'));
                // Add active highlight (simple version: just keep color)
                // btn.classList.add('scale-125'); // Optional bounce
                currentCategory = btn.getAttribute('data-category');
                filterItems();
            });
        });
    </script>
</body>

</html>