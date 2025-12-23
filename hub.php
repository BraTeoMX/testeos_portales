<!DOCTYPE html>
<html lang="es" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intimark Hub</title>
    <!-- Tailwind CSS -->
    <link href="./dist/output.css" rel="stylesheet">
    <!-- Google Fonts: Playfair Display (Serif) & Lato (Sans) -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato', sans-serif;
            overflow: hidden;
            /* Prevent body scroll */
        }

        h1,
        h2,
        h3,
        .serif {
            font-family: 'Playfair Display', serif;
        }

        /* Custom Scrollbar for Right Panel */
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.02);
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.2);
        }

        /* Smooth Anchor Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Abstract Pattern Animation */
        @keyframes drift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animated-bg {
            background: linear-gradient(-45deg, #f3f4f6, #e5e7eb, #d1d5db, #f3f4f6);
            background-size: 400% 400%;
            animation: drift 15s ease infinite;
        }
    </style>
</head>

<body class="bg-white text-slate-900 h-screen flex flex-col lg:flex-row">

    <!-- Left Panel: Aesthetic & Context (Fixed) -->
    <aside class="w-full lg:w-5/12 xl:w-4/12 h-48 lg:h-full relative overflow-hidden flex flex-col justify-between p-8 lg:p-16 animated-bg border-r border-gray-200 z-10 shadow-xl lg:shadow-none">
        <!-- Overlay Texture/Noise (Optional) -->
        <div class="absolute inset-0 opacity-40" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <!-- content -->
        <div class="relative z-10">
            <img src="./img/logo.png" alt="Intimark" class="h-8 lg:h-10 w-auto mb-8 opacity-80 mix-blend-multiply">

            <div class="hidden lg:block">
                <p class="text-sm font-bold tracking-[0.2em] uppercase text-gray-500 mb-4">Portal Corporativo</p>
                <h1 class="text-5xl xl:text-7xl font-bold leading-tight text-slate-900 mb-6 italic serif">
                    Creando <br> el futuro <br> juntos.
                </h1>
                <p class="text-lg text-gray-600 max-w-sm leading-relaxed">
                    Accede a todas tus herramientas, reportes y servicios desde un solo lugar centralizado y eficiente.
                </p>
            </div>
        </div>

        <!-- Clock / Footer Left -->
        <div class="relative z-10 hidden lg:block">
            <div id="clock-display" class="text-6xl font-thin font-mono tracking-tighter text-slate-800 mb-2">00:00</div>
            <p id="date-display" class="text-sm uppercase tracking-widest text-gray-500">Cargando fecha...</p>
        </div>

        <!-- Mobile Title Only -->
        <div class="lg:hidden relative z-10 flex items-center h-full">
            <h1 class="text-3xl font-bold serif text-slate-900">Intimark Hub</h1>
        </div>
    </aside>

    <!-- Right Panel: Functional & Scrollable -->
    <main class="w-full lg:w-7/12 xl:w-8/12 h-full bg-white flex flex-col">

        <!-- Header (Search & Tabs) -->
        <header class="sticky top-0 bg-white/90 backdrop-blur-md z-20 border-b border-gray-100 px-6 lg:px-12 py-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <!-- Search -->
                <div class="relative w-full md:w-96">
                    <input type="text" id="searchHub" class="w-full bg-gray-50 border-none rounded-none border-b-2 border-transparent focus:border-slate-900 px-0 py-2 text-lg focus:ring-0 transition-colors placeholder-gray-400 bg-transparent" placeholder="Buscar servicio..." autocomplete="off">
                    <svg class="w-5 h-5 absolute right-0 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <!-- Profile / Actions -->
                <div class="flex items-center gap-4">
                    <button onclick="window.location.href='index.php'" class="text-xs font-bold uppercase tracking-wider text-gray-400 hover:text-slate-900 transition-colors">Salir</button>
                </div>
            </div>

            <!-- Tabs Filters -->
            <nav class="flex gap-6 overflow-x-auto no-scrollbar pb-1">
                <button class="filter-tab active text-slate-900 border-b-2 border-slate-900 font-bold text-sm uppercase tracking-wide pb-2 whitespace-nowrap transition-all" data-category="all">Todos</button>
                <button class="filter-tab text-gray-400 border-b-2 border-transparent hover:text-slate-600 font-medium text-sm uppercase tracking-wide pb-2 whitespace-nowrap transition-all" data-category="ti">Tecnología</button>
                <button class="filter-tab text-gray-400 border-b-2 border-transparent hover:text-slate-600 font-medium text-sm uppercase tracking-wide pb-2 whitespace-nowrap transition-all" data-category="rh">Personas (RH)</button>
                <button class="filter-tab text-gray-400 border-b-2 border-transparent hover:text-slate-600 font-medium text-sm uppercase tracking-wide pb-2 whitespace-nowrap transition-all" data-category="producción">Producción</button>
                <button class="filter-tab text-gray-400 border-b-2 border-transparent hover:text-slate-600 font-medium text-sm uppercase tracking-wide pb-2 whitespace-nowrap transition-all" data-category="corporativo">Corporativo</button>
            </nav>
        </header>

        <!-- Content Grid -->
        <div class="flex-1 overflow-y-auto custom-scroll p-6 lg:p-12">
            <div id="grid-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-12">
                <?php
                // Data
                $cards = [
                    ['title' => 'Pedir Accesos', 'desc' => 'Solicita permisos digitales.', 'url' => '/portal/Permisos/Contact', 'category' => 'TI', 'keywords' => 'permisos sistemas'],
                    ['title' => 'Incidencias TI', 'desc' => 'Reporta fallas técnicas.', 'url' => 'http://128.150.102.131:8080/intimark/public/', 'category' => 'TI', 'keywords' => 'soporte ticket'],
                    ['title' => 'Intimedia', 'desc' => 'Capacitación y cursos.', 'url' => 'http://128.150.102.75/moodle/', 'category' => 'RH', 'keywords' => 'moodle cursos'],
                    ['title' => 'Directorio', 'desc' => 'Contactos internos.', 'url' => 'http://128.150.102.131:85/', 'category' => 'Corporativo', 'keywords' => 'telefono extension'],
                    ['title' => 'Salas de Juntas', 'desc' => 'Reserva espacios.', 'url' => 'http://128.150.102.131:86/', 'category' => 'Servicios', 'keywords' => 'reunion agenda'],
                    ['title' => 'Eficiencias', 'desc' => 'Métricas de planta.', 'url' => 'http://128.150.102.131/eficiencias', 'category' => 'Producción', 'keywords' => 'kpi costura'],
                    ['title' => 'Insumos Impresión', 'desc' => 'Solicitud de tóner.', 'url' => '/portal/Printer/Request', 'category' => 'TI', 'keywords' => 'impresora papel'],
                    ['title' => 'Procedimientos', 'desc' => 'Manuales y normas.', 'url' => 'http://128.150.102.131:90/Account/Login', 'category' => 'Calidad', 'keywords' => 'iso docs'],
                    ['title' => 'Control Accesos', 'desc' => 'Bitácora de seguridad.', 'url' => 'http://128.150.102.131:8080/planta/loginvista.html', 'category' => 'Seguridad', 'keywords' => 'visitas entrada'],
                    ['title' => 'SGD Vacaciones', 'desc' => 'Gestiona tus descansos.', 'url' => 'http://128.150.102.131:8000', 'category' => 'RH', 'keywords' => 'faltas nomina'],
                    ['title' => 'Dashboard RH', 'desc' => 'Analíticas de personal.', 'url' => 'http://128.150.102.131:8010', 'category' => 'RH', 'keywords' => 'reportes gente'],
                    ['title' => 'Producción Real', 'desc' => 'Monitor hora por hora.', 'url' => 'http://128.150.102.40:8010', 'category' => 'Producción', 'keywords' => 'avance meta'],
                    ['title' => 'Backlog', 'desc' => 'Cargas de trabajo.', 'url' => 'http://128.150.102.131:8030', 'category' => 'Producción', 'keywords' => 'pedidos'],
                    ['title' => 'Paquetería', 'desc' => 'Logística de envíos.', 'url' => 'http://128.150.102.40/registro_paqueteria', 'category' => 'Logística', 'keywords' => 'guias recibo'],
                ];

                foreach ($cards as $index => $card):
                    $num = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                ?>

                    <a href="<?= $card['url'] ?>" target="_blank" class="group hub-card block border-t border-gray-100 pt-6 hover:border-slate-900 transition-colors duration-500"
                        data-title="<?= strtolower($card['title']) ?>"
                        data-desc="<?= strtolower($card['desc']) ?>"
                        data-category="<?= strtolower($card['category']) ?>"
                        data-keywords="<?= strtolower($card['keywords']) ?>">

                        <div class="flex justify-between items-baseline mb-3">
                            <span class="text-xs font-mono text-gray-400 group-hover:text-slate-900 transition-colors"><?= $num ?></span>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 border border-gray-200 px-2 py-0.5 rounded-full group-hover:bg-slate-900 group-hover:text-white transition-all"><?= $card['category'] ?></span>
                        </div>

                        <h3 class="text-2xl serif font-medium text-slate-900 mb-2 group-hover:translate-x-2 transition-transform duration-300"><?= $card['title'] ?></h3>
                        <p class="text-sm text-gray-500 font-light group-hover:text-slate-600"><?= $card['desc'] ?></p>
                    </a>

                <?php endforeach; ?>
            </div>

            <div id="noResults" class="hidden py-12 text-center">
                <p class="serif text-xl text-gray-400 italic">No se encontraron resultados.</p>
            </div>
        </div>
    </main>

    <script>
        // --- Clock Logic ---
        function updateHubClock() {
            const now = new Date();
            const time = now.toLocaleTimeString('es-MX', {
                hour: '2-digit',
                minute: '2-digit'
            });
            const date = now.toLocaleDateString('es-MX', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            document.getElementById('clock-display').textContent = time;
            document.getElementById('date-display').textContent = date;
        }
        setInterval(updateHubClock, 1000);
        updateHubClock();

        // --- Tabs & Search Logic ---
        const searchInput = document.getElementById('searchHub');
        const tabs = document.querySelectorAll('.filter-tab');
        const cards = document.querySelectorAll('.hub-card');
        const noResults = document.getElementById('noResults');
        let currentCat = 'all';

        function filterHub() {
            const term = searchInput.value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            let visible = 0;

            cards.forEach(card => {
                const title = card.getAttribute('data-title');
                const cat = card.getAttribute('data-category');
                // Allow fuzzy search on category too
                const matchSearch = title.includes(term) || cat.includes(term);
                const matchCat = currentCat === 'all' || cat === currentCat;

                if (matchSearch && matchCat) {
                    card.classList.remove('hidden');
                    visible++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (visible === 0) noResults.classList.remove('hidden');
            else noResults.classList.add('hidden');
        }

        searchInput.addEventListener('input', filterHub);

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Reset standard styles
                tabs.forEach(t => {
                    t.classList.remove('text-slate-900', 'border-slate-900', 'active');
                    t.classList.add('text-gray-400', 'border-transparent');
                });

                // Active style
                tab.classList.remove('text-gray-400', 'border-transparent');
                tab.classList.add('text-slate-900', 'border-slate-900', 'active');

                currentCat = tab.getAttribute('data-category');
                filterHub();
            });
        });
    </script>
</body>

</html>