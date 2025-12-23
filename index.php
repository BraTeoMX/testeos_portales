<!DOCTYPE html>
<html lang="es" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Servicios INTIMARK</title>
    <!-- CSS de Tailwind Compilado -->
    <link href="./dist/output.css" rel="stylesheet">

    <!-- Script Anti-FOUC (Flash of Unstyled Content) para tema oscuro -->
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-gray-50 text-slate-900 dark:bg-slate-900 transition-colors duration-300 min-h-screen flex flex-col font-sans">

    <!-- Header con efecto Glassmorphism -->
    <header class="sticky top-0 z-50 w-full backdrop-blur-md bg-white/80 dark:bg-slate-900/80 border-b border-gray-200 dark:border-slate-800 shadow-sm">
        <div class="container mx-auto px-4 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold text-lg shadow-lg shadow-blue-500/30">I</div>
                <span class="font-bold text-xl tracking-tight text-slate-800 dark:text-white">Portal Intimark</span>
            </div>

            <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-slate-700 rounded-full text-sm p-2 transition-colors">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h1a1 1 0 100 2h-1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12 flex-grow">
        <div class="mb-12 text-center max-w-4xl mx-auto">
            <h1 class="text-4xl font-extrabold tracking-tight leading-none text-slate-900 dark:text-white md:text-5xl lg:text-6xl mb-6">
                Portal de servicios <span class="text-brown-600 dark:text-brown-500">INTIMARK</span>
            </h1>

            <!-- Barra de Búsqueda Mejorada -->
            <div class="relative w-full max-w-2xl mx-auto mt-8">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-6 h-6 text-gray-400 dark:text-gray-500" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <!-- Input con padding ajustado manualmente para evitar superposicion -->
                <input type="text" id="searchInput" class="block w-full p-5 pl-14 text-lg text-gray-900 border border-gray-200 rounded-2xl bg-white shadow-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 dark:bg-slate-800 dark:border-slate-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-900 dark:focus:border-blue-500 transition-all outline-none" placeholder="¿Qué servicio buscas hoy? (ej. Vacaciones, Toner...)" required autocomplete="off">
            </div>
        </div>

        <!-- Mensaje No Resultados -->
        <div id="noResults" class="hidden text-center py-12 animate-fade-in">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 dark:bg-slate-800 mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white">No encontramos coincidencias</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-4">Intenta con otras palabras clave o revisa la ortografía.</p>
            <button onclick="document.getElementById('searchInput').value = ''; dispatchInputEvent();" class="text-blue-600 hover:text-blue-700 font-medium hover:underline">Limpiar búsqueda</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php
            // Definición de tarjetas de servicio
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
                ['title' => 'Avances Producción', 'desc' => 'Avances de producción en tiempo real', 'url' => 'http://128.150.102.40:8010', 'img' => './img/produccion.png', 'category' => 'Producción', 'keywords' => 'lineas meta avance hora x hora'],
                ['title' => 'Backlog', 'desc' => 'Gestión de pendientes', 'url' => 'http://128.150.102.131:8030', 'img' => './img/backlog.png', 'category' => 'Producción', 'keywords' => 'pedidos ordenes carga trabajo'],
                ['title' => 'Paquetería', 'desc' => 'Registro y seguimiento de guías', 'url' => 'http://128.150.102.40/registro_paqueteria', 'img' => './img/paqueteria.png', 'category' => 'Logística', 'keywords' => 'dhl fedex estafeta envios recepcion almacen'],
            ];

            foreach ($cards as $card):
                $imgSrc = isset($card['img']) && file_exists(__DIR__ . '/' . $card['img']) ? $card['img'] : $card['img'];
                $badgeColors = [
                    'TI' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                    'RH' => 'bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-300',
                    'Producción' => 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300',
                    'Corporativo' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
                    'Servicios' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
                    'Calidad' => 'bg-teal-100 text-teal-800 dark:bg-teal-900 dark:text-teal-300',
                    'Seguridad' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                    'Logística' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                    'Default' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
                ];
                $catColor = $badgeColors[$card['category']] ?? $badgeColors['Default'];
            ?>
                <div class="service-card group relative bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 overflow-hidden flex flex-col hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-1"
                    data-title="<?= strtolower($card['title']) ?>"
                    data-desc="<?= strtolower($card['desc']) ?>"
                    data-keywords="<?= strtolower($card['keywords']) ?>"
                    data-category="<?= strtolower($card['category']) ?>">

                    <div class="absolute top-3 right-3 z-10 transition-opacity duration-300 opacity-90 group-hover:opacity-100">
                        <span class="<?= $catColor ?> text-xs font-bold px-2.5 py-1 rounded-full shadow-sm backdrop-blur-sm bg-opacity-90 tracking-wide uppercase">
                            <?= $card['category'] ?>
                        </span>
                    </div>

                    <div class="relative h-48 overflow-hidden">
                        <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out" src="<?= $imgSrc ?>" alt="<?= $card['title'] ?>">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-300"></div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors"><?= $card['title'] ?></h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 flex-grow line-clamp-2"><?= $card['desc'] ?></p>

                        <a href="<?= $card['url'] ?>" target="_blank" class="inline-flex items-center justify-center w-full px-5 py-2.5 text-sm font-medium text-white bg-slate-900 dark:bg-blue-600 rounded-xl hover:bg-blue-700 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition-all shadow-lg shadow-blue-500/20">
                            Acceder
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="mt-auto py-8 border-t border-gray-200 dark:border-slate-800">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                &copy; <?= date('Y') ?> <span class="font-semibold text-slate-700 dark:text-slate-300">Intimark</span>. Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <script>
        // --- Buscador Inteligente (Normalización de Acentos) ---
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('.service-card');
        const noResults = document.getElementById('noResults');

        // Normaliza texto: quita acentos y convierte a minúsculas
        function normalizeText(text) {
            return text.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase().trim();
        }

        function dispatchInputEvent() {
            var event = new Event('input', {
                bubbles: true,
                cancelable: true
            });
            searchInput.dispatchEvent(event);
        }

        searchInput.addEventListener('input', function(e) {
            const term = normalizeText(e.target.value);
            let visibleCount = 0;

            cards.forEach(card => {
                const title = normalizeText(card.getAttribute('data-title'));
                const desc = normalizeText(card.getAttribute('data-desc'));
                const keys = normalizeText(card.getAttribute('data-keywords'));
                const cat = normalizeText(card.getAttribute('data-category'));

                const match = title.includes(term) || desc.includes(term) || keys.includes(term) || cat.includes(term);

                if (match || term === '') {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });

        // --- Toggle de Tema ---
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
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
            updateIcons();
        });
    </script>
</body>

</html>