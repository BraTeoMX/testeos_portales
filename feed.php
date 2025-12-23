<!DOCTYPE html>
<html lang="es" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intimark Social Feed</title>
    <!-- Tailwind CSS -->
    <link href="./dist/output.css" rel="stylesheet">
    <!-- Google Fonts: IBM Plex Sans (Reddit fontish) -->
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'IBM Plex Sans', sans-serif;
        }

        .hide-scroll::-webkit-scrollbar {
            display: none;
        }

        .hide-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-[#DAE0E6] text-[#1c1c1c] h-screen flex flex-col overflow-hidden">

    <!-- Navbar -->
    <header class="h-12 bg-white border-b border-gray-200 flex items-center justify-between px-4 sticky top-0 z-50 shrink-0">
        <div class="flex items-center gap-3 w-1/3">
            <img src="./img/logo.png" alt="Intimark" class="h-8 w-auto">
            <h1 class="hidden md:block font-bold text-lg tracking-tight">Intimark<span class="text-[#FF4500]">Feed</span></h1>
        </div>

        <div class="flex-1 max-w-xl mx-4">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" class="block w-full py-1.5 pl-10 pr-4 text-sm bg-gray-100 border border-transparent rounded-full focus:bg-white focus:border-blue-500 hover:bg-white hover:border-gray-200 transition-colors focus:ring-1 focus:ring-blue-500 outline-none placeholder-gray-500" placeholder="Buscar en Intimark Feed">
            </div>
        </div>

        <div class="flex items-center gap-4 w-1/3 justify-end">
            <button onclick="window.location.href='index.php'" class="p-1 hover:bg-gray-100 rounded-full" title="Salir">
                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </button>
            <div class="h-8 w-8 rounded bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-500">
                U
            </div>
        </div>
    </header>

    <!-- Main Layout -->
    <div class="flex flex-1 overflow-hidden max-w-[1600px] mx-auto w-full">

        <!-- Left Sidebar (Navigation) -->
        <aside class="w-64 hidden lg:flex flex-col py-4 pl-4 pr-2 overflow-y-auto hide-scroll shrink-0">
            <div class="space-y-1 mb-6">
                <a href="#" class="flex items-center gap-3 px-4 py-2 bg-gray-200 rounded-md text-sm font-medium text-gray-900">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Novedades
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-md text-sm font-medium text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    Populares
                </a>
            </div>

            <div class="mb-2 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Comunidades</div>
            <div class="space-y-1">
                <button class="w-full flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-md text-sm text-gray-700 filter-feed" data-cat="all">
                    <div class="w-5 h-5 rounded-full bg-slate-300"></div> r/Todo
                </button>
                <button class="w-full flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-md text-sm text-gray-700 filter-feed" data-cat="ti">
                    <div class="w-5 h-5 rounded-full bg-blue-500"></div> r/Tecnología
                </button>
                <button class="w-full flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-md text-sm text-gray-700 filter-feed" data-cat="rh">
                    <div class="w-5 h-5 rounded-full bg-pink-500"></div> r/RecursosHumanos
                </button>
                <button class="w-full flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-md text-sm text-gray-700 filter-feed" data-cat="production">
                    <div class="w-5 h-5 rounded-full bg-orange-500"></div> r/Producción
                </button>
                <button class="w-full flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-md text-sm text-gray-700 filter-feed" data-cat="security">
                    <div class="w-5 h-5 rounded-full bg-red-500"></div> r/Seguridad
                </button>
            </div>
        </aside>

        <!-- Center Feed -->
        <main class="flex-1 overflow-y-auto py-4 px-0 md:px-4 hide-scroll" id="feed-container">

            <!-- Create Post Input (Fake) -->
            <div class="bg-white border border-gray-300 rounded-md p-2 mb-4 flex items-center gap-2 mx-auto max-w-2xl shadow-sm">
                <div class="h-8 w-8 rounded-full bg-gray-200"></div>
                <input type="text" class="flex-1 bg-gray-100 hover:bg-white hover:border-blue-500 border border-gray-200 rounded-md px-4 py-2 text-sm focus:outline-none transition-colors" placeholder="Crear publicación (Solo Admin)">
                <button class="p-2 text-gray-400 hover:bg-gray-100 rounded"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg></button>
            </div>

            <!-- News Posts Loop (Mock Content) -->
            <div class="space-y-4 max-w-2xl mx-auto">

                <!-- Pinned Service / Featured -->
                <div class="bg-white border border-gray-300 rounded-md hover:border-gray-400 cursor-pointer shadow-sm relative overflow-hidden">
                    <div class="flex">
                        <div class="w-10 bg-gray-50 flex flex-col items-center py-3 border-r border-gray-100">
                            <svg class="w-6 h-6 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                            </svg>
                        </div>
                        <div class="p-3 flex-1">
                            <div class="flex items-center text-xs text-gray-500 mb-2">
                                <span class="font-bold text-gray-900 hover:underline">r/Producción</span>
                                <span class="mx-1">•</span>
                                <span>Publicado por Admin • hace 1 hora</span>
                                <span class="ml-2 px-1.5 py-0.5 rounded bg-green-100 text-green-800 text-[10px] font-bold">DESTACADO</span>
                            </div>
                            <h2 class="text-lg font-medium mb-2 pr-4">Resumen de Eficiencias: Lineas 3 y 4 superan metas históricas 🚀</h2>
                            <p class="text-sm text-gray-600 mb-4">El equipo de planta reporta un incremento del 15% en la eficiencia global. Consulta el dashboard en tiempo real para ver el desglose por línea.</p>
                            <div class="h-64 bg-gray-100 mb-4 rounded-md overflow-hidden relative border border-gray-200 group">
                                <img src="./img/eficiencia.jpg" class="w-full h-full object-cover">
                                <a href="http://128.150.102.131/eficiencias" target="_blank" class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span class="bg-white text-black px-4 py-2 rounded-full font-bold text-sm">Ver Dashboard</span>
                                </a>
                            </div>
                            <div class="flex items-center gap-1 text-xs font-bold text-gray-500">
                                <button class="flex items-center gap-1 p-2 hover:bg-gray-100 rounded"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg> 12 Comentarios</button>
                                <button class="flex items-center gap-1 p-2 hover:bg-gray-100 rounded"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                    </svg> Compartir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Text Post -->
                <div class="bg-white border border-gray-300 rounded-md hover:border-gray-400 cursor-pointer shadow-sm relative">
                    <div class="flex">
                        <div class="w-10 bg-gray-50 flex flex-col items-center py-3 border-r border-gray-100">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                            </svg>
                            <span class="text-xs font-bold my-1">45</span>
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="p-3 flex-1">
                            <div class="flex items-center text-xs text-gray-500 mb-2">
                                <span class="font-bold text-gray-900 hover:underline">r/RH</span>
                                <span class="mx-1">•</span>
                                <span>Publicado por Recursos Humanos • hace 3 horas</span>
                            </div>
                            <h2 class="text-lg font-medium mb-2">📅 Calendario de Días Festivos 2026 Confirmado</h2>
                            <div class="text-sm text-gray-800 mb-4 bg-gray-50 p-4 border border-gray-200 rounded-md font-mono">
                                1 Enero - Año Nuevo<br>
                                5 Febrero - Constitución<br>
                                16 Marzo - Natalicio Benito Juárez<br>
                                ... <a href="#" class="text-blue-500 hover:underline">Ver lista completa</a>
                            </div>
                            <div class="flex items-center gap-1 text-xs font-bold text-gray-500">
                                <button class="flex items-center gap-1 p-2 hover:bg-gray-100 rounded"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg> 5 Comentarios</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Post -->
                <div class="bg-white border border-gray-300 rounded-md hover:border-gray-400 cursor-pointer shadow-sm relative">
                    <div class="flex">
                        <div class="w-10 bg-gray-50 flex flex-col items-center py-3 border-r border-gray-100">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                            </svg>
                            <span class="text-xs font-bold my-1">10</span>
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="p-3 flex-1">
                            <div class="flex items-center text-xs text-gray-500 mb-2">
                                <span class="font-bold text-gray-900 hover:underline">r/TI</span>
                                <span class="mx-1">•</span>
                                <span>Publicado por Sistemas • hace 5 horas</span>
                            </div>
                            <h2 class="text-lg font-medium mb-2">Mantenimiento Programado: Servidor de Correos ⚠️</h2>
                            <p class="text-sm text-gray-600 mb-2">El próximo sábado a las 10:00 PM se realizará mantenimiento...</p>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="px-2 py-0.5 rounded-full bg-red-100 text-red-600 text-xs font-bold">Importante</span>
                                <span class="px-2 py-0.5 rounded-full bg-gray-100 text-gray-600 text-xs font-bold">Sistemas</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center py-8 text-gray-400 text-sm font-medium">No hay más novedades por hoy.</div>
        </main>

        <!-- Right Sidebar (Apps/Widgets) -->
        <aside class="w-80 hidden xl:flex flex-col py-4 px-4 overflow-y-auto hide-scroll shrink-0">
            <!-- App Card -->
            <div class="bg-white border border-gray-300 rounded-md p-4 mb-4 shadow-sm relative overflow-hidden">
                <div class="bg-blue-500 h-10 absolute top-0 left-0 right-0"></div>
                <div class="relative z-10 flex gap-4 items-end mt-2 mb-3">
                    <div class="bg-white p-1 rounded-md border border-gray-200">
                        <img src="./img/logo.png" class="h-10 w-10 object-contain">
                    </div>
                    <span class="font-bold text-base pb-1">Intimark Apps</span>
                </div>
                <p class="text-xs text-gray-600 mb-4">Acceso rápido a tus herramientas de trabajo diarias.</p>
                <div class="grid grid-cols-2 gap-2">
                    <a href="/portal/Permisos/Contact" class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded hover:bg-gray-50 hover:border-gray-300 transition-all text-center">
                        <svg class="w-6 h-6 text-blue-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                        </svg>
                        <span class="text-xs font-bold text-gray-700">Permisos</span>
                    </a>
                    <a href="http://128.150.102.131:86/" class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded hover:bg-gray-50 hover:border-gray-300 transition-all text-center">
                        <svg class="w-6 h-6 text-purple-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-xs font-bold text-gray-700">Salas</span>
                    </a>
                    <a href="http://128.150.102.131:8080/intimark/public/" class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded hover:bg-gray-50 hover:border-gray-300 transition-all text-center">
                        <svg class="w-6 h-6 text-green-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span class="text-xs font-bold text-gray-700">Soporte TI</span>
                    </a>
                    <a href="http://128.150.102.75/moodle/" class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded hover:bg-gray-50 hover:border-gray-300 transition-all text-center">
                        <svg class="w-6 h-6 text-pink-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span class="text-xs font-bold text-gray-700">Cursos</span>
                    </a>
                </div>
                <button onclick="document.getElementById('full-apps-list').classList.toggle('hidden')" class="w-full mt-3 py-1.5 border border-blue-500 text-blue-500 rounded-full font-bold text-sm hover:bg-blue-50 transition-colors">Ver todas</button>
            </div>

            <!-- Full Apps List (Hidden Toggler) -->
            <div id="full-apps-list" class="hidden bg-white border border-gray-300 rounded-md p-2 mb-4 shadow-sm animate-fade-in">
                <div class="text-xs font-bold text-gray-500 uppercase px-2 py-2 mb-2 border-b border-gray-100">Directorio Completo</div>
                <nav class="space-y-1">
                    <a href="http://128.150.102.131/eficiencias" target="_blank" class="flex items-center gap-2 px-2 py-2 hover:bg-gray-100 rounded text-sm text-gray-700">
                        <span class="w-2 h-2 bg-orange-500 rounded-full"></span> Eficiencias
                    </a>
                    <a href="http://128.150.102.131:90/Account/Login" target="_blank" class="flex items-center gap-2 px-2 py-2 hover:bg-gray-100 rounded text-sm text-gray-700">
                        <span class="w-2 h-2 bg-teal-500 rounded-full"></span> Procedimientos
                    </a>
                    <a href="http://128.150.102.131:8000" target="_blank" class="flex items-center gap-2 px-2 py-2 hover:bg-gray-100 rounded text-sm text-gray-700">
                        <span class="w-2 h-2 bg-pink-500 rounded-full"></span> SGD (Vacaciones)
                    </a>
                    <a href="http://128.150.102.40:8010" target="_blank" class="flex items-center gap-2 px-2 py-2 hover:bg-gray-100 rounded text-sm text-gray-700">
                        <span class="w-2 h-2 bg-orange-700 rounded-full"></span> Avance Prod.
                    </a>
                    <a href="http://128.150.102.40/registro_paqueteria" target="_blank" class="flex items-center gap-2 px-2 py-2 hover:bg-gray-100 rounded text-sm text-gray-700">
                        <span class="w-2 h-2 bg-yellow-500 rounded-full"></span> Paquetería
                    </a>
                </nav>
            </div>

            <!-- Sticky Footer/Rules -->
            <div class="bg-gray-100 rounded-md p-3 text-xs text-gray-500 sticky top-4">
                <p class="mb-2">Portal Intimark © 2026</p>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="hover:underline">Privacidad</a>
                    <a href="#" class="hover:underline">Políticas</a>
                    <a href="#" class="hover:underline">Ayuda</a>
                </div>
            </div>

        </aside>
    </div>

</body>

</html>