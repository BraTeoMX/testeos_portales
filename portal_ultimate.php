<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intimark Ultimate</title>
    <link href="./dist/output.css" rel="stylesheet">
    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            background-color: #f3f4f6;
            color: #1f2937;
        }

        /* --- Elastic Card Animation --- */
        .elastic-card {
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            /* Bouncy feel */
            max-height: 140px;
            /* Altura inicial compacta */
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .elastic-card:hover {
            transform: translateY(-5px) scale(1.02);
            max-height: 300px;
            /* Expansión al hover */
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            z-index: 10;
        }

        /* Ocultar acciones inicialmente */
        .card-actions {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease-out;
        }

        .elastic-card:hover .card-actions {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.1s;
        }

        /* --- Calendar Widget --- */
        /* --- Calendar Widget Refined --- */
        .calendar-cell {
            aspect-ratio: 1/1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s;
            position: relative;
        }

        .calendar-cell:hover:not(.empty) {
            background-color: #f3f4f6;
            color: #111827;
            font-weight: 600;
        }

        .calendar-cell.today {
            background-color: #2563eb;
            color: white;
            font-weight: 700;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.3);
        }

        .calendar-cell.holiday {
            color: #ef4444;
            font-weight: 700;
        }

        .calendar-cell.holiday::after {
            content: '';
            position: absolute;
            bottom: 4px;
            /* Ajuste fino */
            width: 4px;
            height: 4px;
            background-color: #ef4444;
            border-radius: 50%;
        }

        .calendar-cell.today.holiday {
            background-color: #2563eb;
            /* Today gana el fondo */
            color: white;
        }

        .calendar-cell.today.holiday::after {
            background-color: white;
            /* Dot blanco en fondo azul */
        }

        /* --- Toast Notifications --- */
        #toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 50;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast {
            background: white;
            border-left: 4px solid #3b82f6;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 300px;
            transform: translateX(120%);
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .toast.show {
            transform: translateX(0);
        }

        /* --- Left Sidebar (Collapsed) --- */
        .sidebar-icon {
            transition: all 0.2s;
        }

        .nav-item:hover .sidebar-icon {
            transform: translateX(4px);
            color: #3b82f6;
        }

        /* Modal Calendar */
        .modal-calendar {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 60;
            align-items: center;
            justify-content: center;
        }

        .modal-calendar.open {
            display: flex;
        }
    </style>
</head>

<body class="h-screen flex overflow-hidden bg-gray-100">

    <!-- Toast Container -->
    <div id="toast-container"></div>

    <!-- 1. Left Sidebar (Icon Only / Collapsed) -->
    <aside class="w-20 bg-white border-r border-gray-200 flex flex-col items-center py-6 z-20 shrink-0 shadow-sm">
        <div class="mb-8 w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/30">
            UI
        </div>

        <nav class="flex-1 space-y-6 w-full px-2">
            <button class="nav-item w-full h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-blue-50 hover:text-blue-600 transition-colors relative group" title="Dashboard">
                <svg class="w-6 h-6 sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                <div class="absolute left-14 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap z-50">Inicio</div>
            </button>
            <button class="nav-item w-full h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-blue-50 hover:text-blue-600 transition-colors relative group" title="Calendario" onclick="openCalendarModal()">
                <svg class="w-6 h-6 sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <div class="absolute left-14 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap z-50">Eventos</div>
            </button>
            <button class="nav-item w-full h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-blue-50 hover:text-blue-600 transition-colors relative group" title="Configuración">
                <svg class="w-6 h-6 sidebar-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </button>
        </nav>

        <div class="mt-auto"></div>
    </aside>

    <!-- Main Wrapper -->
    <div class="flex-1 flex flex-col md:flex-row h-full overflow-hidden">

        <!-- 2. Central Area (App Grid) -->
        <main class="flex-1 overflow-y-auto p-8 relative">

            <!-- Header -->
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Hola, Usuario</h1>
                    <p class="text-gray-500 text-lg">¿Qué herramienta necesitas hoy?</p>
                </div>

                <!-- Fuzzy Search -->
                <div class="relative w-80">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="smartSearch"
                        class="block w-full pl-10 pr-3 py-3 border-none rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-shadow"
                        placeholder="Busca 'nomina', 'vacaciones'...">
                </div>
            </div>

            <!-- Categories Tabs -->
            <div class="flex gap-2 mb-6 overflow-x-auto pb-2 no-scrollbar">
                <button onclick="filterApps('all')" class="cat-btn active px-4 py-2 bg-white rounded-lg text-sm font-medium text-gray-600 shadow-sm hover:text-blue-600 border border-transparent border-b-2 border-b-blue-500 transition-all">Todos</button>
                <button onclick="filterApps('TI')" class="cat-btn px-4 py-2 bg-transparent rounded-lg text-sm font-medium text-gray-500 hover:bg-white hover:text-blue-600 transition-all">Sistemas</button>
                <button onclick="filterApps('RH')" class="cat-btn px-4 py-2 bg-transparent rounded-lg text-sm font-medium text-gray-500 hover:bg-white hover:text-blue-600 transition-all">Recursos Humanos</button>
                <button onclick="filterApps('Producción')" class="cat-btn px-4 py-2 bg-transparent rounded-lg text-sm font-medium text-gray-500 hover:bg-white hover:text-blue-600 transition-all">Producción</button>
            </div>

            <!-- Elastic Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 pb-12" id="elastic-grid">
                <!-- Cards injected via JS -->
            </div>

            <div id="no-results" class="hidden text-center py-12">
                <p class="text-xl text-gray-400">No encontramos resultados 😕</p>
                <button onclick="clearSearch()" class="text-blue-500 font-medium mt-2 hover:underline">Ver todo de nuevo</button>
            </div>

        </main>

        <!-- 3. Right Utility Panel -->
        <aside class="w-80 bg-white border-l border-gray-200 hidden xl:flex flex-col p-6 overflow-y-auto">

            <!-- Calendar Widget -->
            <!-- Calendar Widget Refined -->
            <div class="mb-8 p-1"> <!-- Padding extra para shadows -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <!-- Clock Section -->
                    <div class="mb-6 pb-6 border-b border-gray-100 flex justify-between items-end">
                        <div>
                            <h2 class="text-4xl font-bold text-gray-800 tracking-tight leading-none" id="clock-time">--:--</h2>
                            <p class="text-gray-400 font-bold uppercase tracking-wide text-[10px] mt-2" id="clock-date">Cargando...</p>
                        </div>
                        <!-- Simple Nav -->
                        <div class="flex gap-1">
                            <button onclick="changeMonth(-1)" class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-gray-100 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button onclick="changeMonth(1)" class="w-8 h-8 rounded-full flex items-center justify-center hover:bg-gray-100 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Month Label -->
                    <div class="text-center mb-4">
                        <span class="text-sm font-bold text-gray-800 capitalize" id="cal-month-year">...</span>
                    </div>

                    <!-- Grid Headers -->
                    <div class="grid grid-cols-7 gap-1 text-center text-[10px] font-bold text-gray-400 uppercase mb-2">
                        <div>Do</div>
                        <div>Lu</div>
                        <div>Ma</div>
                        <div>Mi</div>
                        <div>Ju</div>
                        <div>Vi</div>
                        <div>Sa</div>
                    </div>

                    <!-- Days Grid -->
                    <div class="grid grid-cols-7 gap-1 text-sm font-medium text-gray-600" id="calendar-days">
                        <!-- Days injected JS -->
                    </div>

                    <!-- Legend -->
                    <div class="mt-6 flex items-center justify-center gap-4 text-[10px] text-gray-400 font-medium">
                        <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-blue-600"></span> Hoy</span>
                        <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-red-500"></span> Festivo</span>
                    </div>
                </div>
            </div>

            <!-- News / Notices Widget -->
            <div>
                <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    Avisos Semanales
                </h3>

                <div class="space-y-3">
                    <div class="p-3 bg-blue-50 rounded-xl border border-blue-100 cursor-pointer hover:bg-blue-100 transition-colors" onclick="showToast('info', 'Mantenimiento: El sistema no estará disponible el Sábado de 2 a 4 PM.')">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-wide">Sistemas</span>
                        <p class="text-sm text-gray-700 mt-1 font-medium">Mantenimiento de Servidores</p>
                        <p class="text-xs text-gray-500 mt-1">Sábado 28, 2:00 PM</p>
                    </div>

                    <div class="p-3 bg-white rounded-xl border border-gray-200 cursor-pointer hover:bg-gray-50 transition-colors" onclick="showToast('success', '¡Ya puedes consultar tu recibo de nómina!')">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wide">RH</span>
                        <p class="text-sm text-gray-700 mt-1 font-medium">Nómina disponible</p>
                        <p class="text-xs text-gray-500 mt-1">Hace 2 horas</p>
                    </div>

                    <div class="p-3 bg-white rounded-xl border border-gray-200 cursor-pointer hover:bg-gray-50 transition-colors" onclick="location.href='http://128.150.102.131:90/Account/Login'">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wide">Calidad</span>
                        <p class="text-sm text-gray-700 mt-1 font-medium">Actualización de Procedimientos</p>
                        <p class="text-xs text-gray-500 mt-1">Ayer</p>
                    </div>
                </div>

            </div>

        </aside>

    </div>

    <!-- Calendar Modal -->
    <div id="calendar-modal" class="modal-calendar" onclick="closeCalendarModal(event)">
        <div class="bg-white rounded-3xl p-6 w-full max-w-sm m-4 shadow-2xl animate-fade-in-up" onclick="event.stopPropagation()">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Calendario
                </h3>
                <button onclick="closeCalendarModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="modal-calendar-container"></div>
        </div>
    </div>

    <!-- MAIN SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- DATA ---
            const services = [{
                    id: 1,
                    title: 'SGD Vacaciones',
                    category: 'RH',
                    desc: 'Solicitud y gestión de permisos vacacionales.',
                    url: 'http://128.150.102.131:8000',
                    icon: 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                    color: 'text-pink-500',
                    keywords: 'descanso faltas nomina'
                },
                {
                    id: 2,
                    title: 'Mesa de Ayuda',
                    category: 'TI',
                    desc: 'Reporta fallas de equipos, impresoras o red.',
                    url: 'http://128.150.102.131:8080/intimark/public/',
                    icon: 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z',
                    color: 'text-blue-500',
                    keywords: 'soporte ticket ayuda'
                },
                {
                    id: 3,
                    title: 'Avances Producción',
                    category: 'Producción',
                    desc: 'Monitoreo en tiempo real de líneas y eficiencias.',
                    url: 'http://128.150.102.40:8010',
                    icon: 'M13 10V3L4 14h7v7l9-11h-7z',
                    color: 'text-orange-500',
                    keywords: 'kpi eficiencia reporte'
                },
                {
                    id: 4,
                    title: 'Directorio',
                    category: 'Corporativo',
                    desc: 'Encuentra extensiones y correos del personal.',
                    url: 'http://128.150.102.131:85/',
                    icon: 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
                    color: 'text-gray-500',
                    keywords: 'telefono contacto mail'
                },
                {
                    id: 5,
                    title: 'Intimedia',
                    category: 'RH',
                    desc: 'Capacitación y cursos obligatorios en línea.',
                    url: 'http://128.150.102.75/moodle/',
                    icon: 'M12 14l9-5-9-5-9 5 9 5z',
                    color: 'text-purple-500',
                    keywords: 'escuela aprender examen'
                },
                {
                    id: 6,
                    title: 'Paquetería',
                    category: 'Logística',
                    desc: 'Registro de entradas y salidas de paquetes.',
                    url: 'http://128.150.102.40/registro_paqueteria',
                    icon: 'M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z',
                    color: 'text-cyan-500',
                    keywords: 'envios dhl fedex almacen'
                },
                {
                    id: 7,
                    title: 'Salas',
                    category: 'Servicios',
                    desc: 'Reserva salas de juntas para reuniones.',
                    url: 'http://128.150.102.131:86/',
                    icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    color: 'text-indigo-500',
                    keywords: 'reunion junta apartado'
                },
                {
                    id: 8,
                    title: 'Eficiencias',
                    category: 'Producción',
                    desc: 'Tableros detallados de desempeño por módulo.',
                    url: 'http://128.150.102.131/eficiencias',
                    icon: 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                    color: 'text-emerald-500',
                    keywords: 'graficas reporte costura'
                },
            ];

            const holidays = {
                '1-1': 'Año Nuevo',
                '2-5': 'Día de la Constitución',
                '3-21': 'Natalicio de Benito Juárez',
                '5-1': 'Día del Trabajo',
                '9-16': 'Día de la Independencia',
                '11-20': 'Revolución Mexicana',
                '12-25': 'Navidad'
            };

            // --- DOM ---
            const grid = document.getElementById('elastic-grid');
            const searchInput = document.getElementById('smartSearch');

            // --- RENDER CARDS ---
            function renderCards(items) {
                grid.innerHTML = '';

                if (items.length === 0) {
                    document.getElementById('no-results').classList.remove('hidden');
                    return;
                }
                document.getElementById('no-results').classList.add('hidden');

                items.forEach((item, index) => {
                    const card = document.createElement('div');
                    card.className = "elastic-card bg-white rounded-2xl p-6 border border-gray-100 flex flex-col justify-between group cursor-pointer";
                    card.onclick = () => window.open(item.url, '_blank');

                    // Content
                    card.innerHTML = `
                        <div>
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-12 h-12 rounded-2xl bg-gray-50 flex items-center justify-center ${item.color}">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${item.icon}"></path></svg>
                                </div>
                                <span class="px-2 py-1 text-[10px] uppercase font-bold text-gray-400 bg-gray-100 rounded-lg group-hover:bg-blue-100 group-hover:text-blue-600 transition-colors">${item.category}</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">${item.title}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">${item.desc}</p>
                        </div>

                        <!-- Hidden Actions (Reveal on Hover) -->
                        <div class="card-actions pt-4 border-t border-gray-100 mt-4 flex items-center justify-between">
                             <button class="text-xs font-bold text-blue-600 flex items-center gap-1 hover:underline">
                                Acceder 
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                            <button class="text-gray-400 hover:text-amber-400 transition-colors" title="Favorito" onclick="event.stopPropagation(); showToast('success', '${item.title} agregado a favoritos');">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                            </button>
                        </div>
                    `;
                    grid.appendChild(card);
                });
            }

            // --- FUZZY SEARCH ---
            function cleanString(str) {
                return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase().trim().replace(/\s+/g, " ");
            }

            searchInput.addEventListener('keyup', (e) => {
                const query = cleanString(e.target.value);

                // Remove active tabs when searching
                document.querySelectorAll('.cat-btn').forEach(b => {
                    b.classList.remove('border-b-blue-500', 'active', 'border-b-2');
                    b.classList.add('bg-transparent', 'border-transparent');
                });

                const results = services.filter(svc => {
                    const combined = cleanString(svc.title + " " + svc.category + " " + svc.desc + " " + (svc.keywords || ''));
                    return combined.includes(query);
                });

                renderCards(results);
            });

            window.clearSearch = function() { // Expose to global scope
                searchInput.value = '';
                filterApps('all');
            }

            window.filterApps = function(cat) { // Expose to global scope
                // UI Update
                document.querySelectorAll('.cat-btn').forEach(btn => {
                    // Reset styles
                    btn.classList.remove('bg-white', 'shadow-sm', 'text-gray-600', 'border-b-2', 'border-b-blue-500');
                    btn.classList.add('bg-transparent', 'text-gray-500');
                });
                // Highlight clicked
                if (event && event.target) {
                    event.target.classList.remove('bg-transparent', 'text-gray-500');
                    event.target.classList.add('bg-white', 'shadow-sm', 'text-gray-600', 'border-b-2', 'border-b-blue-500');
                }

                if (cat === 'all') {
                    renderCards(services);
                } else {
                    const filtered = services.filter(s => s.category === cat);
                    renderCards(filtered);
                }
            }

            // --- CALENDAR WIDGET ---
            let currentDate = new Date();

            window.changeMonth = function(delta) {
                currentDate.setMonth(currentDate.getMonth() + delta);
                renderCalendar('all');
            }

            window.openCalendarModal = function() {
                // Check if existing sidebar is visible (large screens)
                if (window.innerWidth >= 1280) return; // Don't open modal on XL screens

                const modal = document.getElementById('calendar-modal');
                const container = document.getElementById('modal-calendar-container');

                // Clone the calendar structure into modal if empty
                if (container.innerHTML === '') {
                    // Find the original sidebar calendar to clone
                    const originalCal = document.querySelector('aside .bg-white.rounded-3xl');

                    if (originalCal) {
                        const calHTML = originalCal.innerHTML;
                        const wrapper = document.createElement('div');
                        wrapper.innerHTML = calHTML;
                        wrapper.className = 'bg-gray-50 rounded-2xl p-4 border border-gray-100';
                        // Remove IDs from cloned content to avoid duplicates
                        wrapper.querySelectorAll('[id]').forEach(el => el.removeAttribute('id'));

                        container.appendChild(wrapper);

                        // Re-bind events for the modal buttons since they are new elements
                        // We need to find the buttons by their SVG content or position
                        const btns = wrapper.querySelectorAll('button');
                        if (btns.length >= 2) {
                            btns[0].onclick = () => changeMonth(-1);
                            btns[1].onclick = () => changeMonth(1);
                        }
                    }
                }

                // Re-render to ensure sync
                renderCalendar('modal');
                modal.classList.add('open');
            }

            window.closeCalendarModal = function(e) {
                if (e) e.stopPropagation();
                document.getElementById('calendar-modal').classList.remove('open');
            }

            function renderCalendar(target = 'sidebar') {
                const containers = [];

                // 1. Sidebar Calendar
                if (target === 'sidebar' || target === 'all') {
                    const sidebarCal = document.querySelector('aside .bg-white.rounded-3xl'); // More specific selector
                    if (sidebarCal) containers.push(sidebarCal);
                }

                // 2. Modal Calendar
                if (target === 'modal' || target === 'all') {
                    const modalCont = document.getElementById('modal-calendar-container');
                    if (modalCont && modalCont.firstElementChild) {
                        containers.push(modalCont.firstElementChild);
                    }
                }

                containers.forEach(container => {
                    // Re-select elements within this specific container
                    // Look for the Month Label (which has capitalize class)
                    const monthYear = container.querySelector('.capitalize');
                    // Look for the grid that holds the days (grid-cols-7)
                    const dayContainer = container.querySelector('.grid.grid-cols-7.gap-1.text-sm');

                    if (!monthYear || !dayContainer) return;

                    // Reset
                    dayContainer.innerHTML = '';

                    const month = currentDate.getMonth();
                    const year = currentDate.getFullYear();

                    const firstDay = new Date(year, month, 1).getDay();
                    const daysInMonth = new Date(year, month + 1, 0).getDate();

                    const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                    monthYear.innerText = `${months[month]} ${year}`;

                    // Empty slots
                    for (let i = 0; i < firstDay; i++) {
                        const empty = document.createElement('div');
                        empty.className = 'p-2 empty select-none';
                        dayContainer.appendChild(empty);
                    }

                    const today = new Date();

                    for (let i = 1; i <= daysInMonth; i++) {
                        const dayEl = document.createElement('div');
                        dayEl.innerText = i;
                        dayEl.className = 'p-2 text-gray-700 calendar-day cursor-default rounded-full flex items-center justify-center w-8 h-8 mx-auto';

                        // Highlight Today
                        if (i === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                            dayEl.classList.add('bg-blue-600', 'text-white', 'font-bold', 'shadow-md');
                        }

                        // Holidays
                        const holidayKey = `${month+1}-${i}`;
                        if (holidays[holidayKey]) {
                            dayEl.classList.add('text-red-500', 'font-bold');
                            dayEl.title = holidays[holidayKey];
                        }

                        dayContainer.appendChild(dayEl);
                    }
                });
            }

            // --- CLOCK WIDGET ---
            function updateClock() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');

                const timeEl = document.getElementById('clock-time');
                if (timeEl) timeEl.innerText = `${hours}:${minutes}`;

                const dateEl = document.getElementById('clock-date');
                if (dateEl) {
                    const options = {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    dateEl.innerText = now.toLocaleDateString('es-ES', options);
                }

                setTimeout(updateClock, 1000);
            }

            // --- TOAST NOTIFICATIONS ---
            window.showToast = function(type, message) { // Expose global
                const container = document.getElementById('toast-container');

                const toast = document.createElement('div');
                toast.className = 'toast';

                const icon = type === 'success' ? '✅' : 'ℹ️';

                toast.style.borderLeftColor = type === 'success' ? '#22c55e' : '#3b82f6';

                toast.innerHTML = `
                    <div class="text-xl">${icon}</div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">${type === 'success' ? 'Completado' : 'Información'}</p>
                        <p class="text-xs text-gray-500">${message}</p>
                    </div>
                `;

                container.appendChild(toast);

                // Trigger animation
                requestAnimationFrame(() => {
                    toast.classList.add('show');
                });

                // Remove
                setTimeout(() => {
                    toast.classList.remove('show');
                    setTimeout(() => toast.remove(), 400);
                }, 4000);
            }

            // --- INIT ---
            renderCards(services);
            renderCalendar('all');
            updateClock();

            // Welcome Toast
            setTimeout(() => {
                showToast('info', 'Bienvenido a tu nueva experiencia Intimark.');
            }, 1000);
        });
    </script>
</body>

</html>