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
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h1a1 1 0 100 2h-1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </header>

    <main class="container mx-auto px-4 py-12 flex-grow">
        <div class="mb-12 text-center max-w-3xl mx-auto">
            <h1 class="text-4xl font-extrabold tracking-tight leading-none text-slate-900 dark:text-white md:text-5xl lg:text-6xl mb-6">
                Servicios <span class="text-blue-600 dark:text-blue-500">Corporativos</span>
            </h1>
            <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                Acceso centralizado, seguro y eficiente a todas las herramientas y plataformas de Intimark.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php
            // Definición de tarjetas de servicio
            $cards = [
                ['title' => 'Pedir Accesos', 'desc' => 'Solicitud de acceso a aplicaciones', 'url' => '/portal/Permisos/Contact', 'img' => './img/form1.jpg'],
                ['title' => 'Incidencias TI', 'desc' => 'Levantamiento de reportes TI', 'url' => 'http://128.150.102.131:8080/intimark/public/', 'img' => './img/desicione.jpg'],
                ['title' => 'Intimedia', 'desc' => 'Plataforma de capacitación', 'url' => 'http://128.150.102.75/moodle/', 'img' => './img/intro-section.png'],
                ['title' => 'Directorio', 'desc' => 'Directorio telefónico interno', 'url' => 'http://128.150.102.131:85/', 'img' => './img/directory2.png'],
                ['title' => 'Salas', 'desc' => 'Reservación de salas de juntas', 'url' => 'http://128.150.102.131:86/', 'img' => './img/agenda.png'],
                ['title' => 'Eficiencias', 'desc' => 'Métricas de eficiencia en planta', 'url' => 'http://128.150.102.131/eficiencias', 'img' => './img/eficiencia.jpg'],
                ['title' => 'Impresoras', 'desc' => 'Solicitud de insumos de impresión', 'url' => '/portal/Printer/Request', 'img' => './img/printer.jpg'],
                ['title' => 'Procedimientos', 'desc' => 'Repositorio de manuales y DRP', 'url' => 'http://128.150.102.131:90/Account/Login', 'img' => './img/recuperacion.jpg'],
                ['title' => 'Control Accesos', 'desc' => 'Bitácora de entradas y salidas', 'url' => 'http://128.150.102.131:8080/planta/loginvista.html', 'img' => './img/control2.jpg'],
                ['title' => 'SGD', 'desc' => 'Sistema de Gestión (Vacaciones)', 'url' => 'http://128.150.102.131:8000', 'img' => './img/sgd.png'],
                ['title' => 'Dashboard SGD', 'desc' => 'Visualización de métricas SGD', 'url' => 'http://128.150.102.131:8010', 'img' => './img/dashboardSGD.png'],
                ['title' => 'Producción', 'desc' => 'Avances de producción en tiempo real', 'url' => 'http://128.150.102.40:8010', 'img' => './img/produccion.png'],
                ['title' => 'Backlog', 'desc' => 'Gestión de pendientes', 'url' => 'http://128.150.102.131:8030', 'img' => './img/backlog.png' /* Asumiendo img existente o fallback */], 
                ['title' => 'Paquetería', 'desc' => 'Registro y seguimiento de guías', 'url' => 'http://128.150.102.40/registro_paqueteria', 'img' => './img/paqueteria.png'],
            ];

            foreach ($cards as $card): 
                // Fallback para imagen si no está definida en el array original o es una nueva
                $imgSrc = isset($card['img']) && file_exists(__DIR__ . '/' . $card['img']) ? $card['img'] : $card['img']; 
            ?>
            <div class="group relative bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 overflow-hidden flex flex-col hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-300 transform hover:-translate-y-1">
                <!-- Imagen con efecto de Zoom suave -->
                <div class="relative h-48 overflow-hidden">
                    <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out" src="<?= $imgSrc ?>" alt="<?= $card['title'] ?>">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-300"></div>
                </div>
                
                <!-- Contenido -->
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors"><?= $card['title'] ?></h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 flex-grow line-clamp-2"><?= $card['desc'] ?></p>
                    
                    <a href="<?= $card['url'] ?>" target="_blank" class="inline-flex items-center justify-center w-full px-5 py-2.5 text-sm font-medium text-white bg-slate-900 dark:bg-blue-600 rounded-xl hover:bg-blue-700 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition-all shadow-lg shadow-blue-500/20">
                        Acceder
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
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

    <!-- Lógica del Toggle de Tema -->
    <script>
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

        // Estado inicial de iconos
        updateIcons();

        themeToggleBtn.addEventListener('click', function() {
            // Alternar clase dark
            document.documentElement.classList.toggle('dark');
            
            // Guardar preferencia
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
            
            // Actualizar iconos
            updateIcons();
        });
    </script>
</body>
</html>
