<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Portal - Intimark</title>
    <link href="./dist/output.css" rel="stylesheet">
    <style>
        /* Fuentes y animaciones custom */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            /* Slate 50 */
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .hover-lift {
            transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);
        }

        /* Scrollbar oculto para limpieza */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
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
    </style>
</head>

<body class="text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Navbar Minimalista -->
    <nav class="sticky top-0 z-50 glass-panel border-b border-slate-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flexjustify-between h-16 items-center flex">
                <div class="flex items-center gap-3">
                    <img src="./img/logo.png" alt="Logo" class="h-8 w-auto opacity-90">
                    <div class="h-4 w-px bg-slate-300 mx-2"></div>
                    <span class="text-lg font-semibold tracking-tight text-slate-700">INTIMARK <span class="text-slate-400 font-light">Portal</span></span>
                </div>

                <div class="flex items-center gap-6">
                    <div class="hidden md:flex items-center text-sm font-medium text-slate-500 bg-slate-100/50 px-3 py-1.5 rounded-full">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 animate-pulse"></span>
                        Sistemas Operativos
                    </div>
                    <div class="text-sm text-slate-500">
                        <?php
                        date_default_timezone_set('America/Mexico_City');
                        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        echo $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1];
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Layout: Split View -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- 左 Columna: Accesos y Servicios (8 cols) -->
        <div class="lg:col-span-8 space-y-8 animate-fade-in" style="animation-delay: 0.1s;">

            <!-- Header Sección -->
            <div class="flex items-end justify-between border-b border-slate-200 pb-4">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800 tracking-tight">Aplicaciones</h1>
                    <p class="text-slate-500 mt-1">Accede rápidamente a tus herramientas de trabajo.</p>
                </div>

                <!-- Buscador Integrado -->
                <div class="relative group w-full md:w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-slate-400 group-hover:text-indigo-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="appSearch"
                        class="block w-full pl-10 pr-3 py-2 border border-slate-200 rounded-lg leading-5 bg-white placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 sm:text-sm transition-all shadow-sm"
                        placeholder="Buscar servicio..." autofocus>
                </div>
            </div>

            <!-- Listado de Categorías (Sin tarjetas, estilo Lista Interactiva) -->
            <?php
            // Definición de Servicios (Mismos datos, nueva estructura)
            $services = [
                'RH' => [
                    ['title' => 'SGD Vacaciones', 'desc' => 'Gestión de tiempo y permisos', 'url' => 'http://128.150.102.131:8000', 'icon' => 'calendar-check', 'color' => 'indigo'],
                    ['title' => 'Intimedia', 'desc' => 'Plataforma de capacitación', 'url' => 'http://128.150.102.75/moodle/', 'icon' => 'academic-cap', 'color' => 'indigo'],
                ],
                'TI' => [
                    ['title' => 'Mesa de Ayuda', 'desc' => 'Reportar fallas y solicitudes', 'url' => 'http://128.150.102.131:8080/intimark/public/', 'icon' => 'support', 'color' => 'blue'],
                    ['title' => 'Gestión de Accesos', 'desc' => 'Permisos de sistema', 'url' => '/portal/Permisos/Contact', 'icon' => 'key', 'color' => 'blue'],
                    ['title' => 'Solicitud Toners', 'desc' => 'Insumos de impresión', 'url' => '/portal/Printer/Request', 'icon' => 'printer', 'color' => 'blue'],
                ],
                'Producción' => [
                    ['title' => 'Eficiencias', 'desc' => 'Tablero de métricas', 'url' => 'http://128.150.102.131/eficiencias', 'icon' => 'chart-bar', 'color' => 'emerald'],
                    ['title' => 'Avances en Vivo', 'desc' => 'Monitoreo de líneas', 'url' => 'http://128.150.102.40:8010', 'icon' => 'lightning-bolt', 'color' => 'emerald'],
                    ['title' => 'Backlog', 'desc' => 'Estado de órdenes', 'url' => 'http://128.150.102.131:8030', 'icon' => 'clipboard-list', 'color' => 'emerald'],
                ],
                'Servicios' => [
                    ['title' => 'Directorio', 'desc' => 'Extensiones internas', 'url' => 'http://128.150.102.131:85/', 'icon' => 'phone', 'color' => 'amber'],
                    ['title' => 'Salas de Juntas', 'desc' => 'Reservación de espacios', 'url' => 'http://128.150.102.131:86/', 'icon' => 'users', 'color' => 'amber'],
                    ['title' => 'Paquetería', 'desc' => 'Recepción de envíos', 'url' => 'http://128.150.102.40/registro_paqueteria', 'icon' => 'truck', 'color' => 'amber'],
                    ['title' => 'Comedor', 'desc' => 'Menú semanal', 'url' => '#', 'icon' => 'cake', 'color' => 'amber'],
                ]
            ];

            // Iconos SVG (Map)
            $icons = [
                'calendar-check' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />',
                'academic-cap' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />',
                'support' => '<path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />',
                'key' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11.536 11l-1.414 1.414-1.414-1.414-2.828 2.828c-.78.78-2.047.78-2.828 0a2 2 0 010-2.828l1.414-1.414L3 8.121 5.121 6 7.121 8l2.121-2.121L7.121 4 9.243 1.879a6 6 0 017.757 5.121z" />',
                'printer' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />',
                'chart-bar' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />',
                'lightning-bolt' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />',
                'clipboard-list' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />',
                'phone' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />',
                'users' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />',
                'truck' => '<path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 012-2 7 7 0 1114 0 7 7 0 012 2" />',
                'cake' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />',
            ];

            foreach ($services as $category => $items):
            ?>
                <div class="mb-8 service-category">
                    <h2 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3 px-1"><?= $category ?></h2>

                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                        <?php foreach ($items as $index => $item): ?>
                            <a href="<?= $item['url'] ?>" target="_blank" class="block group service-item" data-title="<?= strtolower($item['title'] . ' ' . $item['desc']) ?>">
                                <div class="flex items-center p-4 hover:bg-slate-50 transition-colors <?= $index !== array_key_last($items) ? 'border-b border-slate-100' : '' ?>">

                                    <!-- Icon Box -->
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="h-10 w-10 rounded-lg bg-<?= $item['color'] ?>-50 text-<?= $item['color'] ?>-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <?= $icons[$item['icon']] ?>
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Text Content -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-semibold text-slate-700 group-hover:text-<?= $item['color'] ?>-700 truncate"><?= $item['title'] ?></p>

                                            <svg class="h-4 w-4 text-slate-300 group-hover:text-slate-500 transform group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <p class="text-xs text-slate-500 truncate"><?= $item['desc'] ?></p>
                                    </div>

                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Mensaje Sin Resultados -->
            <div id="noResults" class="hidden text-center py-12">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-100 text-slate-400 mb-3">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h3 class="text-sm font-medium text-slate-900">No encontramos esa aplicación</h3>
                <p class="text-sm text-slate-500 mt-1">Intenta buscar con otro nombre.</p>
            </div>

        </div>

        <!-- 右 Columna: Noticias y Feed (4 cols) -->
        <div class="lg:col-span-4 space-y-6 animate-fade-in" style="animation-delay: 0.2s;">

            <!-- Widget: Noticias / Feed -->
            <aside class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sticky top-24">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <span class="text-xl">📢</span> Tablero
                    </h2>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Hoy</span>
                </div>

                <div class="space-y-6 relative before:absolute before:inset-y-0 before:left-[11px] before:w-[2px] before:bg-slate-100">

                    <!-- Item 1: Noticia -->
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1 w-6 h-6 bg-white border-2 border-blue-500 rounded-full flex items-center justify-center z-10">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 font-medium block mb-0.5">Hace 2 horas</span>
                            <h3 class="text-sm font-semibold text-slate-800">Actualización SGD</h3>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                                Se ha liberado la nueva versión del módulo de vacaciones. Ahora puedes cancelar solicitudes pendientes.
                            </p>
                            <a href="#" class="inline-flex items-center text-xs font-medium text-blue-600 mt-2 hover:underline">
                                Ver detalles →
                            </a>
                        </div>
                    </div>

                    <!-- Item 2: Alerta -->
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1 w-6 h-6 bg-white border-2 border-amber-400 rounded-full flex items-center justify-center z-10">
                            <span class="text-[10px]">⚠️</span>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 font-medium block mb-0.5">09:00 AM</span>
                            <h3 class="text-sm font-semibold text-slate-800">Mantenimiento de Red</h3>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                                Se realizarán intermitencias en la red WiFi de Planta 2 debido a cambios de equipo.
                            </p>
                        </div>
                    </div>

                    <!-- Item 3: Social/Cumpleaños -->
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1 w-6 h-6 bg-white border-2 border-rose-400 rounded-full flex items-center justify-center z-10">
                            <span class="text-[10px]">🎂</span>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 font-medium block mb-0.5">Hoy</span>
                            <h3 class="text-sm font-semibold text-slate-800">Cumpleaños del mes</h3>
                            <div class="flex -space-x-2 overflow-hidden mt-2">
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://ui-avatars.com/api/?name=Juan+Perez&background=random" alt="" />
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://ui-avatars.com/api/?name=Maria+G&background=random" alt="" />
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://ui-avatars.com/api/?name=Pedro+S&background=random" alt="" />
                                <div class="h-6 w-6 rounded-full ring-2 ring-white bg-slate-100 flex items-center justify-center text-[10px] text-slate-500 font-bold">+4</div>
                            </div>
                        </div>
                    </div>

                    <!-- Item 4: General -->
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1 w-6 h-6 bg-white border-2 border-emerald-500 rounded-full flex items-center justify-center z-10">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 font-medium block mb-0.5">Ayer</span>
                            <h3 class="text-sm font-semibold text-slate-800">Menú del Comedor</h3>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                                Consulta el menú saludable de esta semana. ¡No te pierdas las enchiladas del viernes!
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Botón de acción -->
                <button class="w-full mt-6 py-2 px-4 bg-slate-50 hover:bg-slate-100 text-slate-600 text-xs font-semibold rounded-lg transition-colors border border-slate-200">
                    Ver todos los anuncios
                </button>
            </aside>

            <!-- Widget: Links Rápidos (Stats) -->
            <div class="bg-gradient-to-br from-indigo-600 to-violet-600 rounded-2xl shadow-lg p-6 text-white relative overflow-hidden group">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-xl group-hover:scale-150 transition-transform duration-700"></div>

                <h3 class="text-sm font-semibold opacity-90 mb-1">Tu Actividad</h3>
                <div class="flex items-end gap-2 mb-4">
                    <span class="text-3xl font-bold">12</span>
                    <span class="text-xs opacity-75 mb-1">accesos hoy</span>
                </div>

                <div class="w-full bg-white/20 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-white h-full rounded-full" style="width: 70%"></div>
                </div>
                <p class="text-[10px] mt-2 opacity-80">Estás más activo que el 65% de usuarios</p>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <footer class="mt-auto border-t border-slate-200 bg-white py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-xs text-slate-400 font-medium">&copy; <?= date('Y') ?> INTIMARK. Hecho con <span class="text-rose-400">❤</span> por Sistemas.</p>
        </div>
    </footer>

    <!-- Script de Búsqueda -->
    <script>
        document.getElementById('appSearch').addEventListener('keyup', function(e) {
            const term = e.target.value.toLowerCase().trim();
            const items = document.querySelectorAll('.service-item');
            const categories = document.querySelectorAll('.service-category');
            let hasResults = false;

            items.forEach(item => {
                const text = item.getAttribute('data-title');
                if (text.includes(term)) {
                    item.classList.remove('hidden');
                    item.parentElement.classList.remove('hidden'); // Asegurar que el contenedor sea visible
                    hasResults = true;
                } else {
                    item.classList.add('hidden');
                }
            });

            // Ocultar categorías vacías
            categories.forEach(cat => {
                const visibleItems = cat.querySelectorAll('.service-item:not(.hidden)');
                if (visibleItems.length === 0) {
                    cat.classList.add('hidden');
                } else {
                    cat.classList.remove('hidden');
                }
            });

            const noResults = document.getElementById('noResults');
            if (!hasResults && term !== '') {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    </script>
</body>

</html>