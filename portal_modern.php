<!DOCTYPE html>
<html lang="es" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal INTIMARK - Tu centro de innovación</title>
    <link href="./dist/output.css" rel="stylesheet">

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes iconBounce {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.15);
            }
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .slide-in-right {
            animation: slideInRight 0.5s ease-out forwards;
            opacity: 0;
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .service-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 4px solid transparent;
        }

        .service-item:hover {
            transform: translateX(8px);
            border-left-color: #3b82f6;
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.08) 0%, transparent 100%);
        }

        .service-icon {
            transition: all 0.3s ease;
        }

        .service-item:hover .service-icon {
            animation: iconBounce 0.5s ease;
            transform: scale(1.15);
        }

        .tab-active {
            position: relative;
            color: #3b82f6 !important;
        }

        .tab-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            border-radius: 3px 3px 0 0;
        }

        .news-card {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .news-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.05), transparent);
            transition: left 0.5s;
        }

        .news-card:hover::before {
            left: 100%;
        }

        .news-card:hover {
            transform: translateX(4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
        }

        .widget-stat {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .widget-stat:hover {
            transform: scale(1.05) rotate(-1deg);
        }

        .badge-popular {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .7;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 text-slate-900 dark:text-white transition-all duration-300 min-h-screen">

    <!-- Header Moderno -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-white/80 dark:bg-slate-900/80 border-b border-gray-200 dark:border-slate-700 shadow-lg">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo & Brand -->
                <div class="flex items-center gap-4">
                    <img src="./img/logo.png" alt="Logo" class="h-12 w-auto object-contain transition-transform hover:scale-110">
                    <span class="hidden md:block text-2xl font-bold gradient-text">INTIMARK</span>
                </div>

                <!-- Navigation Tabs -->
                <nav class="hidden lg:flex items-center gap-8">
                    <button onclick="switchTab('novedades')" id="tab-novedades" class="tab-btn px-4 py-2 font-semibold text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors tab-active">
                        🌟 Novedades
                    </button>
                    <button onclick="switchTab('servicios')" id="tab-servicios" class="tab-btn px-4 py-2 font-semibold text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        🚀 Servicios
                    </button>
                    <button onclick="switchTab('trending')" id="tab-trending" class="tab-btn px-4 py-2 font-semibold text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors relative">
                        🔥 Trending
                        <span class="absolute -top-1 -right-1 h-2 w-2 bg-red-500 rounded-full animate-ping"></span>
                    </button>
                </nav>

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    <button id="theme-toggle" class="p-2.5 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors">
                        <svg id="theme-icon-dark" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-icon-light" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h1a1 1 0 100 2h-1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section Compacto -->
    <section class="relative overflow-hidden py-12 lg:py-16">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 via-purple-600/10 to-pink-600/10 dark:from-blue-600/20 dark:via-purple-600/20 dark:to-pink-600/20"></div>

        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 dark:bg-blue-900 rounded-full mb-4 text-sm font-semibold text-blue-600 dark:text-blue-300 fade-in-up">
                    <span class="h-2 w-2 bg-blue-500 rounded-full animate-pulse"></span>
                    <span id="greeting-text">Buenos días</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 leading-tight fade-in-up" style="animation-delay: 0.1s;">
                    Tu portal,
                    <span class="gradient-text">redefinido</span>
                </h1>

                <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.2s;">
                    Descubre novedades, accede a servicios y mantente conectado
                </p>

                <!-- Search Bar Mejorado -->
                <div class="relative max-w-2xl mx-auto fade-in-up" style="animation-delay: 0.3s;">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" id="main-search"
                        class="w-full pl-14 pr-6 py-4 text-base rounded-2xl border-2 border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-500/50 focus:border-blue-500 transition-all"
                        placeholder="Busca servicios, noticias, contenido..." autocomplete="off">
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container mx-auto px-4 lg:px-8 pb-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- Main Content Area -->
            <div class="lg:col-span-3">

                <!-- Tab Content: Novedades (PRINCIPAL) -->
                <div id="content-novedades" class="tab-content">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-3xl font-bold">📰 Novedades y Anuncios</h2>
                        <span class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-full text-sm font-semibold shadow-lg">4 nuevas</span>
                    </div>

                    <div class="space-y-4">
                        <!-- News Item 1 -->
                        <div class="news-card bg-white dark:bg-slate-800 rounded-xl shadow-lg p-5 hover:shadow-2xl transition-all cursor-pointer border-l-blue-500 fade-in-up">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center text-2xl shadow-lg">
                                        🎉
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-2 flex-wrap">
                                        <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 text-xs font-bold rounded-full">NUEVO</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Hace 2 horas · TI</span>
                                    </div>
                                    <h3 class="text-lg md:text-xl font-bold mb-2 text-slate-900 dark:text-white">Nueva actualización del Sistema SGD</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm md:text-base mb-3 line-clamp-2">
                                        Gestiona tus vacaciones más rápido con la nueva interfaz mejorada. Incluye aprobación automática y notificaciones en tiempo real.
                                    </p>
                                    <div class="flex items-center gap-4 text-sm">
                                        <button class="text-blue-600 dark:text-blue-400 font-semibold hover:underline flex items-center gap-1">
                                            Leer más
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                        <span class="text-gray-500 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                            </svg>
                                            24
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Item 2 -->
                        <div class="news-card bg-white dark:bg-slate-800 rounded-xl shadow-lg p-5 hover:shadow-2xl transition-all cursor-pointer border-l-green-500 fade-in-up" style="animation-delay: 0.1s;">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-teal-500 rounded-xl flex items-center justify-center text-2xl shadow-lg">
                                        🚀
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-2 flex-wrap">
                                        <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 text-xs font-bold rounded-full">MEJORA</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Hace 1 día · Producción</span>
                                    </div>
                                    <h3 class="text-lg md:text-xl font-bold mb-2 text-slate-900 dark:text-white">Optimización en Avances de Producción</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm md:text-base mb-3 line-clamp-2">
                                        Reportes actualizados cada 30 segundos. Visualiza métricas detalladas por línea y eficiencias en tiempo real.
                                    </p>
                                    <div class="flex items-center gap-4 text-sm">
                                        <button class="text-blue-600 dark:text-blue-400 font-semibold hover:underline flex items-center gap-1">
                                            Ver detalles
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                        <span class="text-gray-500 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                            </svg>
                                            45
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Item 3 -->
                        <div class="news-card bg-white dark:bg-slate-800 rounded-xl shadow-lg p-5 hover:shadow-2xl transition-all cursor-pointer border-l-purple-500 fade-in-up" style="animation-delay: 0.2s;">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-2xl shadow-lg">
                                        📚
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-2 flex-wrap">
                                        <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 text-xs font-bold rounded-full">CURSO</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Hace 3 días · RH</span>
                                    </div>
                                    <h3 class="text-lg md:text-xl font-bold mb-2 text-slate-900 dark:text-white">Nuevos cursos disponibles en Intimedia</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm md:text-base mb-3 line-clamp-2">
                                        5 nuevos cursos: Seguridad Industrial, Excel Avanzado, Liderazgo, Calidad Total y Manejo de Conflictos.
                                    </p>
                                    <div class="flex items-center gap-4 text-sm">
                                        <button class="text-blue-600 dark:text-blue-400 font-semibold hover:underline flex items-center gap-1">
                                            Inscribirse
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                        <span class="text-gray-500">🎓 156 inscritos</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- News Item 4 -->
                        <div class="news-card bg-white dark:bg-slate-800 rounded-xl shadow-lg p-5 hover:shadow-2xl transition-all cursor-pointer border-l-orange-500 fade-in-up" style="animation-delay: 0.3s;">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center text-2xl shadow-lg">
                                        ⚠️
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-2 flex-wrap">
                                        <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900 text-orange-600 dark:text-orange-300 text-xs font-bold rounded-full">IMPORTANTE</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Hace 5 días · TI</span>
                                    </div>
                                    <h3 class="text-lg md:text-xl font-bold mb-2 text-slate-900 dark:text-white">Mantenimiento programado - Sistema de Impresoras</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm md:text-base mb-3 line-clamp-2">
                                        Sábado 28 de diciembre, 8:00 AM a 12:00 PM. El sistema no estará disponible durante este periodo.
                                    </p>
                                    <div class="flex items-center gap-4 text-sm">
                                        <button class="text-blue-600 dark:text-blue-400 font-semibold hover:underline flex items-center gap-1">
                                            Más información
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                        <span class="text-gray-500">📅 Recordatorio</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Content: Servicios (LISTADO) -->
                <div id="content-servicios" class="tab-content hidden">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-3xl font-bold">🚀 Servicios Disponibles</h2>
                        <span class="px-4 py-2 bg-blue-100 dark:bg-blue-900 rounded-full text-sm font-semibold text-blue-600 dark:text-blue-300" id="services-count">14 servicios</span>
                    </div>

                    <div id="services-list" class="space-y-3">
                        <?php
                        $services = [
                            ['title' => 'Pedir Accesos', 'desc' => 'Solicitud de acceso a aplicaciones', 'url' => '/portal/Permisos/Contact', 'category' => 'TI', 'icon' => '🔐', 'color' => 'from-blue-500 to-blue-600', 'popular' => true],
                            ['title' => 'Incidencias TI', 'desc' => 'Levantamiento de reportes TI', 'url' => 'http://128.150.102.131:8080/intimark/public/', 'category' => 'TI', 'icon' => '🛠️', 'color' => 'from-indigo-500 to-indigo-600', 'popular' => true],
                            ['title' => 'Intimedia', 'desc' => 'Plataforma de capacitación', 'url' => 'http://128.150.102.75/moodle/', 'category' => 'RH', 'icon' => '📚', 'color' => 'from-purple-500 to-purple-600', 'popular' => false],
                            ['title' => 'Directorio', 'desc' => 'Directorio telefónico interno', 'url' => 'http://128.150.102.131:85/', 'category' => 'Corporativo', 'icon' => '📞', 'color' => 'from-teal-500 to-teal-600', 'popular' => true],
                            ['title' => 'Salas', 'desc' => 'Reservación de salas de juntas', 'url' => 'http://128.150.102.131:86/', 'category' => 'Servicios', 'icon' => '🏢', 'color' => 'from-cyan-500 to-cyan-600', 'popular' => false],
                            ['title' => 'Eficiencias', 'desc' => 'Métricas de eficiencia en planta', 'url' => 'http://128.150.102.131/eficiencias', 'category' => 'Producción', 'icon' => '📊', 'color' => 'from-orange-500 to-orange-600', 'popular' => true],
                            ['title' => 'Impresoras', 'desc' => 'Solicitud de insumos de impresión', 'url' => '/portal/Printer/Request', 'category' => 'TI', 'icon' => '🖨️', 'color' => 'from-gray-500 to-gray-600', 'popular' => false],
                            ['title' => 'Procedimientos', 'desc' => 'Repositorio de manuales y DRP', 'url' => 'http://128.150.102.131:90/Account/Login', 'category' => 'Calidad', 'icon' => '📋', 'color' => 'from-green-500 to-green-600', 'popular' => false],
                            ['title' => 'Control Accesos', 'desc' => 'Bitácora de entradas y salidas', 'url' => 'http://128.150.102.131:8080/planta/loginvista.html', 'category' => 'Seguridad', 'icon' => '🔒', 'color' => 'from-red-500 to-red-600', 'popular' => false],
                            ['title' => 'SGD', 'desc' => 'Sistema de Gestión (Vacaciones)', 'url' => 'http://128.150.102.131:8000', 'category' => 'RH', 'icon' => '🏖️', 'color' => 'from-pink-500 to-pink-600', 'popular' => true],
                            ['title' => 'Dashboard SGD', 'desc' => 'Visualización de métricas SGD', 'url' => 'http://128.150.102.131:8010', 'category' => 'RH', 'icon' => '📈', 'color' => 'from-violet-500 to-violet-600', 'popular' => false],
                            ['title' => 'Avances de la Producción', 'desc' => 'Avances de producción en tiempo real', 'url' => 'http://128.150.102.40:8010', 'category' => 'Producción', 'icon' => '⚡', 'color' => 'from-yellow-500 to-yellow-600', 'popular' => true],
                            ['title' => 'Backlog', 'desc' => 'Gestión de pendientes', 'url' => 'http://128.150.102.131:8030', 'category' => 'Producción', 'icon' => '📦', 'color' => 'from-amber-500 to-amber-600', 'popular' => false],
                            ['title' => 'Paquetería', 'desc' => 'Registro y seguimiento de guías', 'url' => 'http://128.150.102.40/registro_paqueteria', 'category' => 'Logística', 'icon' => '📮', 'color' => 'from-lime-500 to-lime-600', 'popular' => false],
                        ];

                        foreach ($services as $index => $service):
                            $delay = $index * 50;
                        ?>
                            <div class="service-item bg-white dark:bg-slate-800 rounded-xl shadow-md p-4 cursor-pointer fade-in-up"
                                style="animation-delay: <?= $delay ?>ms;"
                                data-title="<?= strtolower($service['title']) ?>"
                                data-desc="<?= strtolower($service['desc']) ?>"
                                data-category="<?= $service['category'] ?>"
                                onclick="window.open('<?= $service['url'] ?>', '_blank')">

                                <div class="flex items-center gap-4">
                                    <!-- Icon -->
                                    <div class="service-icon flex-shrink-0 w-16 h-16 bg-gradient-to-br <?= $service['color'] ?> rounded-xl flex items-center justify-center text-3xl shadow-lg">
                                        <?= $service['icon'] ?>
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1">
                                            <h3 class="text-lg font-bold text-slate-900 dark:text-white truncate"><?= $service['title'] ?></h3>
                                            <?php if ($service['popular']): ?>
                                                <span class="badge-popular px-2 py-0.5 bg-gradient-to-r from-orange-500 to-red-500 text-white text-xs font-bold rounded-full flex-shrink-0">🔥 Popular</span>
                                            <?php endif; ?>
                                        </div>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm truncate"><?= $service['desc'] ?></p>
                                    </div>

                                    <!-- Category & Arrow -->
                                    <div class="flex items-center gap-3 flex-shrink-0">
                                        <span class="hidden md:block px-3 py-1 bg-gray-100 dark:bg-slate-700 text-xs font-semibold rounded-lg"><?= $service['category'] ?></span>
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- No Results -->
                    <div id="no-results" class="hidden text-center py-16">
                        <div class="text-6xl mb-4">🔍</div>
                        <h3 class="text-2xl font-bold mb-2">No encontramos resultados</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">Intenta con otros términos de búsqueda</p>
                        <button onclick="clearSearch()" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors font-semibold shadow-lg">
                            Limpiar búsqueda
                        </button>
                    </div>
                </div>

                <!-- Tab Content: Trending -->
                <div id="content-trending" class="tab-content hidden">
                    <h2 class="text-3xl font-bold mb-6">🔥 Lo más usado hoy</h2>

                    <div class="space-y-3">
                        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-5 flex items-center gap-4 hover:shadow-2xl transition-all cursor-pointer fade-in-up border-l-4 border-blue-500">
                            <div class="text-3xl font-extrabold text-blue-600 w-12 text-center">1</div>
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center text-2xl flex-shrink-0 shadow-lg">🔐</div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold mb-0.5 truncate">Pedir Accesos</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">89 accesos hoy</p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <div class="text-xl font-bold text-green-500">+24%</div>
                                <div class="text-xs text-gray-500">vs ayer</div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-5 flex items-center gap-4 hover:shadow-2xl transition-all cursor-pointer fade-in-up border-l-4 border-orange-500" style="animation-delay: 0.05s;">
                            <div class="text-3xl font-extrabold text-blue-600 w-12 text-center">2</div>
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center text-2xl flex-shrink-0 shadow-lg">⚡</div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold mb-0.5 truncate">Avances de la Producción</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">76 accesos hoy</p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <div class="text-xl font-bold text-green-500">+18%</div>
                                <div class="text-xs text-gray-500">vs ayer</div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-5 flex items-center gap-4 hover:shadow-2xl transition-all cursor-pointer fade-in-up border-l-4 border-pink-500" style="animation-delay: 0.1s;">
                            <div class="text-3xl font-extrabold text-blue-600 w-12 text-center">3</div>
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-pink-500 to-purple-500 flex items-center justify-center text-2xl flex-shrink-0 shadow-lg">🏖️</div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold mb-0.5 truncate">SGD - Vacaciones</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">62 accesos hoy</p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <div class="text-xl font-bold text-green-500">+12%</div>
                                <div class="text-xs text-gray-500">vs ayer</div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-5 flex items-center gap-4 hover:shadow-2xl transition-all cursor-pointer fade-in-up border-l-4 border-teal-500" style="animation-delay: 0.15s;">
                            <div class="text-3xl font-extrabold text-blue-600 w-12 text-center">4</div>
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-teal-500 to-green-500 flex items-center justify-center text-2xl flex-shrink-0 shadow-lg">📞</div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold mb-0.5 truncate">Directorio</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">54 accesos hoy</p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <div class="text-xl font-bold text-red-500">-5%</div>
                                <div class="text-xs text-gray-500">vs ayer</div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-5 flex items-center gap-4 hover:shadow-2xl transition-all cursor-pointer fade-in-up border-l-4 border-yellow-500" style="animation-delay: 0.2s;">
                            <div class="text-3xl font-extrabold text-blue-600 w-12 text-center">5</div>
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center text-2xl flex-shrink-0 shadow-lg">📊</div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold mb-0.5 truncate">Eficiencias</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">48 accesos hoy</p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <div class="text-xl font-bold text-green-500">+32%</div>
                                <div class="text-xs text-gray-500">vs ayer</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Summary -->
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="widget-stat bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl p-6 text-white shadow-xl">
                            <div class="text-4xl font-bold mb-2">342</div>
                            <div class="text-sm opacity-90">Accesos totales hoy</div>
                        </div>
                        <div class="widget-stat bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl p-6 text-white shadow-xl">
                            <div class="text-4xl font-bold mb-2">14</div>
                            <div class="text-sm opacity-90">Servicios activos</div>
                        </div>
                        <div class="widget-stat bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl p-6 text-white shadow-xl">
                            <div class="text-4xl font-bold mb-2">+18%</div>
                            <div class="text-sm opacity-90">Crecimiento semanal</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Quick Stats Widget -->
                <div class="slide-in-right bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl p-6 text-white shadow-2xl">
                    <h3 class="text-xl font-bold mb-4">📊 Estadísticas</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm opacity-90">Servicios</span>
                            <span class="text-2xl font-bold">14</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm opacity-90">Accesos hoy</span>
                            <span class="text-2xl font-bold">342</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm opacity-90">Novedades</span>
                            <span class="text-2xl font-bold">4</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Access -->
                <div class="slide-in-right bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-xl" style="animation-delay: 0.1s;">
                    <h3 class="text-lg font-bold mb-4">⚡ Accesos rápidos</h3>
                    <div class="space-y-2">
                        <a href="/portal/Permisos/Contact" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition-all hover:translate-x-1">
                            <span class="text-2xl">🔐</span>
                            <span class="font-medium">Pedir Accesos</span>
                        </a>
                        <a href="http://128.150.102.131:8000" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition-all hover:translate-x-1">
                            <span class="text-2xl">🏖️</span>
                            <span class="font-medium">Vacaciones</span>
                        </a>
                        <a href="http://128.150.102.131:85/" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition-all hover:translate-x-1">
                            <span class="text-2xl">📞</span>
                            <span class="font-medium">Directorio</span>
                        </a>
                        <a href="http://128.150.102.40:8010" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition-all hover:translate-x-1">
                            <span class="text-2xl">⚡</span>
                            <span class="font-medium">Producción</span>
                        </a>
                    </div>
                </div>

                <!-- Tips Widget -->
                <div class="slide-in-right bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl p-6 text-white shadow-xl" style="animation-delay: 0.2s;">
                    <h3 class="text-lg font-bold mb-3">💡 Tip del día</h3>
                    <p class="text-sm opacity-90">
                        Usa el buscador con palabras clave como "vacaciones" o "producción" para encontrar servicios rápidamente
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white dark:bg-slate-900 border-t border-gray-200 dark:border-slate-800 py-8 mt-12">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center">
                <p class="text-gray-600 dark:text-gray-400">
                    &copy; <?= date('Y') ?> <span class="font-bold">INTIMARK</span> - Todos los derechos reservados
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Theme Toggle
        function updateThemeIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            document.getElementById('theme-icon-light').classList.toggle('hidden', isDark);
            document.getElementById('theme-icon-dark').classList.toggle('hidden', !isDark);
        }
        updateThemeIcons();

        document.getElementById('theme-toggle').addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
            updateThemeIcons();
        });

        // Dynamic Greeting
        const hour = new Date().getHours();
        let greeting = 'Buenos días';
        if (hour >= 12 && hour < 19) greeting = 'Buenas tardes';
        else if (hour >= 19 || hour < 5) greeting = 'Buenas noches';
        document.getElementById('greeting-text').textContent = greeting;

        // Tab Switching
        function switchTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('tab-active'));

            document.getElementById('content-' + tabName).classList.remove('hidden');
            document.getElementById('tab-' + tabName).classList.add('tab-active');
        }

        // Search Functionality
        const mainSearch = document.getElementById('main-search');
        const serviceItems = document.querySelectorAll('.service-item');
        const noResults = document.getElementById('no-results');
        const servicesList = document.getElementById('services-list');

        function normalizeText(text) {
            return text.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase().trim();
        }

        mainSearch.addEventListener('input', (e) => {
            const term = normalizeText(e.target.value);
            let visibleCount = 0;

            // Switch to services tab if searching
            if (term !== '') {
                switchTab('servicios');
            }

            serviceItems.forEach(item => {
                const title = normalizeText(item.getAttribute('data-title') || '');
                const desc = normalizeText(item.getAttribute('data-desc') || '');
                const category = normalizeText(item.getAttribute('data-category') || '');

                const match = title.includes(term) || desc.includes(term) || category.includes(term);

                if (match || term === '') {
                    item.classList.remove('hidden');
                    visibleCount++;
                } else {
                    item.classList.add('hidden');
                }
            });

            if (servicesList) {
                if (visibleCount === 0 && term !== '') {
                    servicesList.classList.add('hidden');
                    noResults.classList.remove('hidden');
                } else {
                    servicesList.classList.remove('hidden');
                    noResults.classList.add('hidden');
                }
            }

            const counter = document.getElementById('services-count');
            if (counter) {
                counter.textContent = visibleCount + ' servicio' + (visibleCount !== 1 ? 's' : '');
            }
        });

        function clearSearch() {
            mainSearch.value = '';
            mainSearch.dispatchEvent(new Event('input'));
        }
    </script>
</body>

</html>