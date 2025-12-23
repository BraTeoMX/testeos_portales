<!DOCTYPE html>
<html lang="es" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intimark Workspace</title>
    <!-- CSS de Tailwind Compilado -->
    <link href="./dist/output.css" rel="stylesheet">
    <!-- Google Fonts: Plus Jakarta Sans for a more modern tech feel -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .dark .glass-panel {
            background: rgba(15, 23, 42, 0.7);
        }

        /* Custom Scrollbar for Sidebar */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-gray-50 text-slate-900 dark:bg-[#0f172a] transition-colors duration-300 overflow-hidden h-screen flex">

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-slate-900/50 z-30 hidden backdrop-blur-sm transition-opacity opacity-0 lg:hidden"></div>

    <!-- Sidebar Navigation -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-72 bg-white dark:bg-slate-900 border-r border-gray-200 dark:border-slate-800 transition-transform duration-300 transform -translate-x-full lg:translate-x-0 lg:static flex flex-col h-full shadow-2xl lg:shadow-none">
        <!-- Logo Area -->
        <div class="h-20 flex items-center px-8 border-b border-gray-100 dark:border-slate-800 shrink-0">
            <img src="./img/logo.png" alt="Intimark" class="h-8 w-auto">
            <span class="ml-3 font-bold text-xl tracking-tight text-slate-800 dark:text-white">Workspace</span>
            <!-- Close Button Mobile -->
            <button id="close-sidebar" class="lg:hidden ml-auto text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1 no-scrollbar" id="sidebar-menu">
            <div class="mb-6">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Principal</p>
                <a href="#" class="nav-item active flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>
            </div>

            <!-- Categories -->
            <div class="mb-6">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Departamentos</p>
                <nav class="space-y-1">
                    <button class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors filter-btn" data-category="ti">
                        <span class="w-2 h-2 rounded-full bg-blue-500"></span> TI
                    </button>
                    <button class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors filter-btn" data-category="rh">
                        <span class="w-2 h-2 rounded-full bg-pink-500"></span> Recursos Humanos
                    </button>
                    <button class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors filter-btn" data-category="producción">
                        <span class="w-2 h-2 rounded-full bg-orange-500"></span> Producción
                    </button>
                    <button class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors filter-btn" data-category="corporativo">
                        <span class="w-2 h-2 rounded-full bg-gray-500"></span> Corporativo
                    </button>
                    <button class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors filter-btn" data-category="all">
                        <span class="w-2 h-2 rounded-full bg-slate-300"></span> Ver Todo
                    </button>
                </nav>
            </div>
        </div>

        <!-- User Profile -->
        <div class="p-4 border-t border-gray-100 dark:border-slate-800 shrink-0">
            <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-slate-800 cursor-pointer transition-colors">
                <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-900 dark:text-white">Invitado</p>
                    <p class="text-xs text-gray-500">Intimark User</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col min-w-0 bg-gray-50 dark:bg-[#0f172a] overflow-hidden transition-all duration-300 transform">

        <!-- Header -->
        <header class="h-20 glass-panel border-b border-gray-200 dark:border-slate-800 flex items-center justify-between px-6 sticky top-0 z-20">
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-800 mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Search Bar -->
            <div class="flex-1 max-w-xl mx-4">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" id="globalSearch" class="block w-full py-2.5 pl-12 pr-4 text-sm text-gray-900 bg-gray-100 dark:bg-slate-800 border-none rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white dark:focus:bg-slate-900 transition-all placeholder-gray-500" placeholder="Buscar aplicaciones, reportes, herramientas..." autocomplete="off">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-3">
                <button id="theme-toggle" class="p-2.5 rounded-xl text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h1a1 1 0 100 2h-1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Scrollable Content Area -->
        <main class="flex-1 overflow-y-auto p-6 lg:p-10 scroll-smooth">

            <!-- Greeting Section -->
            <div class="mb-10 animate-fade-in-up">
                <div class="flex items-center gap-4 mb-2">
                    <div id="greeting-icon-container" class="p-3 bg-white dark:bg-slate-800 rounded-2xl shadow-sm">
                        <!-- Icon injected via JS -->
                    </div>
                    <div>
                        <h1 id="greeting-text" class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight">Hola, Bienvenidos</h1>
                        <p class="text-slate-500 dark:text-slate-400">¿Qué te gustaría hacer hoy en Intimark?</p>
                    </div>
                </div>
            </div>

            <!-- Categories / Quick Filters (Mobile Only or Supplemental) -->
            <!-- <div class="flex flex-wrap gap-2 mb-8 lg:hidden">
                <button class="px-4 py-2 bg-white dark:bg-slate-800 rounded-lg text-sm font-medium shadow-sm">TI</button>
            </div> -->

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-6" id="services-grid">
                <?php
                // Reusing the same data structure for consistency
                $cards = [
                    ['title' => 'Pedir Accesos', 'desc' => 'Solicitud de acceso a aplicaciones', 'url' => '/portal/Permisos/Contact', 'img' => './img/form1.jpg', 'category' => 'TI', 'keywords' => 'permisos sistemas usuario password contraseña'],
                    ['title' => 'Incidencias TI', 'desc' => 'Levantamiento de reportes TI', 'url' => 'http://128.150.102.131:8080/intimark/public/', 'img' => './img/desicione.jpg', 'category' => 'TI', 'keywords' => 'soporte ayuda ticket error falla computadora impresora red'],
                    ['title' => 'Intimedia', 'desc' => 'Plataforma de capacitación', 'url' => 'http://128.150.102.75/moodle/', 'img' => './img/intro-section.png', 'category' => 'RH', 'keywords' => 'cursos escuela entrenamiento moodle recursos humanos'],
                    ['title' => 'Directorio', 'desc' => 'Directorio telefónico interno', 'url' => 'http://128.150.102.131:85/', 'img' => './img/directory2.png', 'category' => 'Corporativo', 'keywords' => 'telefono extension contacto llamar buscar persona'],
                    ['title' => 'Salas', 'desc' => 'Reservación de salas de juntas', 'url' => 'http://128.150.102.131:86/', 'img' => './img/agenda.png', 'category' => 'Servicios', 'keywords' => 'junta reunion horario apartado calendario'],
                    ['title' => 'Eficiencias', 'desc' => 'Métricas de eficiencia en planta', 'url' => 'http://128.150.102.131/eficiencias', 'img' => './img/eficiencia.jpg', 'category' => 'Producción', 'keywords' => 'costura planta indicadores desempeño'],
                    ['title' => 'Impresoras', 'desc' => 'Solicitud de insumos de impresión', 'url' => '/portal/Printer/Request', 'img' => './img/printer.jpg', 'category' => 'TI', 'keywords' => 'toner tinta hojas papel mantenimiento'],
                    ['title' => 'Procedimientos', 'desc' => 'Repositorio de manuales y DRP', 'url' => 'http://128.150.102.131:90/Account/Login', 'img' => './img/recuperacion.jpg', 'category' => 'Calidad', 'keywords' => 'documentos isos manuales guias procesos'],
                    ['title' => 'Control Accesos', 'desc' => 'Bitácora de entradas y salidas', 'url' => 'http://128.150.102.131:8080/planta/loginvista.html', 'img' => './img/control2.jpg', 'category' => 'Seguridad', 'keywords' => 'vigilancia registro visitas puerta'],
                    ['title' => 'SGD', 'desc' => 'Sistema de Gestión (Vacaciones)', 'url' => 'http://128.150.102.131:8000', 'img' => './img/sgd.png', 'category' => 'RH', 'keywords' => 'vacaciones permisos faltas recursos humanos nomina'],
                    ['title' => 'Dashboard SGD', 'desc' => 'Visualización de métricas SGD', 'url' => 'http://128.150.102.131:8010', 'img' => './img/dashboardSGD.png', 'category' => 'RH', 'keywords' => 'graficas reportes personal estadisticas'],
                    ['title' => 'Avances de la Producción', 'desc' => 'Avances de producción en tiempo real', 'url' => 'http://128.150.102.40:8010', 'img' => './img/produccion.png', 'category' => 'Producción', 'keywords' => 'lineas meta avance hora x hora'],
                    ['title' => 'Backlog', 'desc' => 'Gestión de pendientes', 'url' => 'http://128.150.102.131:8030', 'img' => './img/backlog.png', 'category' => 'Producción', 'keywords' => 'pedidos ordenes carga trabajo'],
                    ['title' => 'Paquetería', 'desc' => 'Registro y seguimiento de guías', 'url' => 'http://128.150.102.40/registro_paqueteria', 'img' => './img/paqueteria.png', 'category' => 'Logística', 'keywords' => 'dhl fedex estafeta envios recepcion almacen'],
                ];

                foreach ($cards as $index => $card):
                    $imgSrc = isset($card['img']) && file_exists(__DIR__ . '/' . $card['img']) ? $card['img'] : $card['img'];
                    // Simplified color logic
                    $badgeColors = [
                        'TI' => 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-300',
                        'RH' => 'bg-pink-50 text-pink-600 dark:bg-pink-900/30 dark:text-pink-300',
                        'Producción' => 'bg-orange-50 text-orange-600 dark:bg-orange-900/30 dark:text-orange-300',
                        'Corporativo' => 'bg-slate-100 text-slate-600 dark:bg-slate-700/30 dark:text-slate-300',
                        'Servicios' => 'bg-purple-50 text-purple-600 dark:bg-purple-900/30 dark:text-purple-300',
                        'Default' => 'bg-gray-50 text-gray-600 dark:bg-gray-700/30 dark:text-gray-300',
                    ];
                    $catColor = $badgeColors[$card['category']] ?? $badgeColors['Default'];
                ?>
                    <a href="<?= $card['url'] ?>" target="_blank"
                        class="service-card group relative bg-white dark:bg-slate-900 rounded-2xl p-5 border border-gray-100 dark:border-slate-800 hover:border-blue-200 dark:hover:border-blue-900 hover:shadow-lg dark:hover:shadow-blue-900/10 transition-all duration-300 flex flex-col h-full"
                        data-title="<?= strtolower($card['title']) ?>"
                        data-desc="<?= strtolower($card['desc']) ?>"
                        data-category="<?= strtolower($card['category']) ?>"
                        data-keywords="<?= strtolower($card['keywords']) ?>">

                        <div class="flex items-start justify-between mb-4">
                            <div class="h-12 w-12 rounded-xl bg-gray-50 dark:bg-slate-800 overflow-hidden shrink-0">
                                <img src="<?= $imgSrc ?>" alt="" class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <span class="<?= $catColor ?> text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wider">
                                <?= $card['category'] ?>
                            </span>
                        </div>

                        <h3 class="font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors mb-2"><?= $card['title'] ?></h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 leading-relaxed"><?= $card['desc'] ?></p>

                        <div class="mt-auto pt-4 flex items-center text-xs font-semibold text-blue-600 dark:text-blue-400 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                            Abrir Aplicación <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- No Results State -->
            <div id="noResults" class="hidden flex-col items-center justify-center py-20 text-center">
                <div class="p-4 rounded-full bg-gray-50 dark:bg-slate-800 mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-slate-900 dark:text-white">No encontramos lo que buscas</h3>
                <p class="text-gray-500 text-sm mt-1">Intenta buscar con otro término o categoría.</p>
            </div>

            <footer class="mt-12 pt-6 border-t border-gray-100 dark:border-slate-800 text-center text-xs text-gray-400 dark:text-gray-600">
                &copy; <?= date('Y') ?> Intimark. Todos los derechos reservados.
            </footer>
        </main>
    </div>

    <!-- Logic Script -->
    <script>
        // --- Mobile Sidebar Logic ---
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeSidebarBtn = document.getElementById('close-sidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobile-overlay');

        function toggleSidebar() {
            const isClosed = sidebar.classList.contains('-translate-x-full');
            if (isClosed) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10); // Fade in
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300); // Wait for fade out
            }
        }

        mobileMenuBtn.addEventListener('click', toggleSidebar);
        closeSidebarBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // --- Greeting Logic ---
        const hour = new Date().getHours();
        const greetingText = document.getElementById('greeting-text');
        const iconContainer = document.getElementById('greeting-icon-container');

        let greeting = 'Buenos días';
        let icon = `<svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>`;

        if (hour >= 12 && hour < 19) {
            greeting = 'Buenas tardes';
            icon = `<svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>`;
        } else if (hour >= 19 || hour < 5) {
            greeting = 'Buenas noches';
            icon = `<svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>`;
        }

        greetingText.textContent = `${greeting}, Intimarker`;
        iconContainer.innerHTML = icon;

        // --- Search & Filter Logic ---
        const searchInput = document.getElementById('globalSearch');
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
                    card.style.display = 'flex'; // Restore flex display
                    visibleCount++;
                } else {
                    card.style.display = 'none';
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

        // Sidebar Filter Logic
        filterBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                // Update active state style (optional simplified version)
                filterBtns.forEach(b => b.classList.remove('bg-gray-100', 'dark:bg-slate-800', 'text-slate-900', 'dark:text-white'));
                btn.classList.add('bg-gray-100', 'dark:bg-slate-800', 'text-slate-900', 'dark:text-white');

                currentCategory = btn.getAttribute('data-category');
                filterItems();
            });
        });

        // --- Theme Toggle ---
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        function updateIcons() {
            if (document.documentElement.classList.contains('dark')) {
                themeToggleLightIcon.classList.remove('hidden');
                themeToggleDarkIcon.classList.add('hidden');
            } else {
                themeToggleLightIcon.classList.add('hidden');
                themeToggleDarkIcon.classList.remove('hidden');
            }
        }
        updateIcons();

        themeToggleBtn.addEventListener('click', function() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
            updateIcons();
        });
    </script>
</body>

</html>