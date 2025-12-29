<!DOCTYPE html>
<html lang="es" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Hub - Intimark</title>
    <link href="./dist/output.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        :root {
            --sidebar-width: 280px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0f172a;
            color: #e2e8f0;
            overflow: hidden;
            /* App feel */
        }

        /* Glassmorphism Utilities */
        .glass-panel {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-sidebar {
            background: rgba(15, 23, 42, 0.95);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Custom Scrollbar for Content Area */
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Animations */
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

        .fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }

        /* Card Hover Effects */
        .app-card {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid transparent;
        }

        .app-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .favorite-btn {
            opacity: 0;
            transition: opacity 0.2s;
        }

        .app-card:hover .favorite-btn,
        .app-card.is-favorite .favorite-btn {
            opacity: 1;
        }

        .app-card.is-favorite .star-icon {
            fill: #fbbf24;
            /* Amber 400 */
            color: #fbbf24;
        }
    </style>
</head>

<body class="h-full flex antialiased">

    <!-- SIDEBAR -->
    <aside class="w-[280px] h-full glass-sidebar flex flex-col shrink-0 z-20">
        <!-- Logo -->
        <div class="h-20 flex items-center px-8 border-b border-white/5">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold">
                    N
                </div>
                <span class="font-bold text-lg tracking-tight">Nexus Hub</span>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
            <div class="px-4 mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Menú</div>

            <button onclick="filterApps('all')" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-colors text-left group active-nav" id="nav-all">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                Todas las Apps
            </button>
            <button onclick="filterApps('favorites')" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-colors text-left group" id="nav-favorites">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
                Mis Favoritos
            </button>

            <div class="px-4 mt-8 mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Categorías</div>

            <button onclick="filterApps('RH')" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-colors text-left text-category">
                <span class="w-2 h-2 rounded-full bg-pink-500"></span> RH & Nómina
            </button>
            <button onclick="filterApps('TI')" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-colors text-left text-category">
                <span class="w-2 h-2 rounded-full bg-blue-500"></span> Sistemas (TI)
            </button>
            <button onclick="filterApps('Producción')" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-colors text-left text-category">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Producción
            </button>
            <button onclick="filterApps('Servicios')" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-colors text-left text-category">
                <span class="w-2 h-2 rounded-full bg-amber-500"></span> Servicios Gral.
            </button>
        </div>

        <!-- User Profile (Bottom) -->
        <div class="p-4 border-t border-white/5">
            <div class="flex items-center gap-3 px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 transition-colors cursor-pointer">
                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-slate-500 to-slate-400"></div>
                <div>
                    <div class="text-sm font-medium text-white">Usuario</div>
                    <div class="text-xs text-slate-400">Cerrar Sesión</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- CONTENT AREA -->
    <main class="flex-1 flex flex-col h-full relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-900 to-slate-800">

        <!-- Background Glows -->
        <div class="absolute top-0 left-0 w-full h-96 bg-indigo-500/10 blur-[100px] rounded-full pointer-events-none"></div>

        <!-- Header -->
        <header class="h-20 shrink-0 px-8 flex items-center justify-between z-10">
            <div>
                <h1 class="text-2xl font-bold text-white" id="page-title">Bienvenido</h1>
                <p class="text-sm text-slate-400 mt-0.5" id="current-date">Cargando fecha...</p>
            </div>

            <div class="flex items-center gap-4">
                <!-- Search -->
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-slate-400 group-focus-within:text-indigo-400 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="searchInput"
                        class="w-64 bg-slate-800/50 border border-white/10 rounded-xl py-2 pl-10 pr-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-transparent transition-all hover:bg-slate-800"
                        placeholder="Buscar aplicación...">
                </div>

                <button class="w-10 h-10 rounded-xl border border-white/10 flex items-center justify-center text-slate-400 hover:text-white hover:bg-white/5 transition-colors relative">
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-red-500 rounded-full border border-slate-900"></span>
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Main Scrollable Area -->
        <div class="flex-1 overflow-y-auto p-8 custom-scroll z-10" id="main-content">

            <!-- Welcome Banner (Conditional) -->
            <div id="welcome-banner" class="mb-10 p-8 rounded-3xl bg-gradient-to-r from-violet-600 to-indigo-600 relative overflow-hidden shadow-2xl shadow-indigo-500/20">
                <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <span class="inline-block px-3 py-1 bg-white/20 rounded-full text-xs font-semibold text-white mb-3 backdrop-blur-sm">Novedad</span>
                        <h2 class="text-3xl font-bold text-white mb-2">Nuevo Portal de Empleado</h2>
                        <p class="text-indigo-100 max-w-lg">Ya puedes consultar tus recibos de nómina y tramitar vacaciones desde la nueva app unificada.</p>
                        <button class="mt-6 px-5 py-2.5 bg-white text-indigo-600 rounded-xl font-bold text-sm hover:bg-indigo-50 transition-colors shadow-lg">Descubrir más</button>
                    </div>
                    <!-- Decorative shape -->
                    <div class="hidden md:block w-32 h-32 bg-white/10 rounded-full blur-2xl absolute -right-4 -bottom-4"></div>
                </div>
            </div>

            <!-- Apps Grid -->
            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                    <span id="category-title">Todas las Apps</span>
                    <span class="text-xs font-normal text-slate-500 px-2 py-0.5 bg-slate-800 rounded-full" id="apps-count">0</span>
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="apps-grid">
                <!-- Apps injected via JS -->
            </div>

            <!-- Empty State -->
            <div id="empty-state" class="hidden h-64 flex flex-col items-center justify-center text-slate-500">
                <svg class="w-16 h-16 mb-4 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <p class="text-lg font-medium">No encontramos resultados</p>
                <p class="text-sm">Intenta buscar con otro término</p>
            </div>

        </div>
    </main>

    <script>
        // --- DATA ---
        const apps = [{
                id: 1,
                title: 'SGD Vacaciones',
                category: 'RH',
                desc: 'Solicitud y gestión de permisos',
                url: 'http://128.150.102.131:8000',
                icon: 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                color: 'bg-pink-500'
            },
            {
                id: 2,
                title: 'Mesa de Ayuda',
                category: 'TI',
                desc: 'Soporte técnico y tickets',
                url: 'http://128.150.102.131:8080/intimark/public/',
                icon: 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z',
                color: 'bg-blue-500'
            },
            {
                id: 3,
                title: 'Eficiencias',
                category: 'Producción',
                desc: 'KPIs en tiempo real',
                url: 'http://128.150.102.131/eficiencias',
                icon: 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                color: 'bg-emerald-500'
            },
            {
                id: 4,
                title: 'Directorio',
                category: 'Servicios',
                desc: 'Contactos internos',
                url: 'http://128.150.102.131:85/',
                icon: 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
                color: 'bg-amber-500'
            },
            {
                id: 5,
                title: 'Intimedia',
                category: 'RH',
                desc: 'Plataforma de cursos',
                url: 'http://128.150.102.75/moodle/',
                icon: 'M12 14l9-5-9-5-9 5 9 5z',
                color: 'bg-purple-500'
            },
            {
                id: 6,
                title: 'Producción Vivo',
                category: 'Producción',
                desc: 'Monitoreo de líneas',
                url: 'http://128.150.102.40:8010',
                icon: 'M13 10V3L4 14h7v7l9-11h-7z',
                color: 'bg-orange-500'
            },
            {
                id: 7,
                title: 'Salas',
                category: 'Servicios',
                desc: 'Reserva de espacios',
                url: 'http://128.150.102.131:86/',
                icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                color: 'bg-teal-500'
            },
            {
                id: 8,
                title: 'Paquetería',
                category: 'Servicios',
                desc: 'Logística de envíos',
                url: 'http://128.150.102.40/registro_paqueteria',
                icon: 'M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z',
                color: 'bg-cyan-500'
            },
            {
                id: 9,
                title: 'Backlog',
                category: 'Producción',
                desc: 'Gestión de órdenes',
                url: 'http://128.150.102.131:8030',
                icon: 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                color: 'bg-red-500'
            },
            {
                id: 10,
                title: 'Control Accesos',
                category: 'TI',
                desc: 'Seguridad y permisos',
                url: '#',
                icon: 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
                color: 'bg-stone-500'
            },
        ];

        // --- STATE ---
        let favorites = JSON.parse(localStorage.getItem('hub_favorites')) || [];

        // --- DOM ELEMENTS ---
        const grid = document.getElementById('apps-grid');
        const appsCount = document.getElementById('apps-count');
        const searchInput = document.getElementById('searchInput');
        const emptyState = document.getElementById('empty-state');
        const categoryTitle = document.getElementById('category-title');
        const welcomeBanner = document.getElementById('welcome-banner');

        // --- INIT ---
        function init() {
            renderApps(apps);
            updateDate();
            highlightNav('all');
        }

        function updateDate() {
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const dateStr = new Date().toLocaleDateString('es-ES', options);
            document.getElementById('current-date').textContent = dateStr.charAt(0).toUpperCase() + dateStr.slice(1);
        }

        // --- RENDER ---
        function renderApps(items) {
            grid.innerHTML = '';

            if (items.length === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');

                items.forEach((app, index) => {
                    const isFav = favorites.includes(app.id);
                    const delay = index * 50; // Stagger animation

                    const card = document.createElement('div');
                    card.className = `app-card relative bg-slate-800/40 rounded-2xl p-4 flex items-start gap-4 cursor-pointer group fade-in ${isFav ? 'is-favorite' : ''}`;
                    card.style.animationDelay = `${delay}ms`;
                    card.onclick = (e) => {
                        if (!e.target.closest('.favorite-btn')) {
                            window.open(app.url, '_blank');
                        }
                    };

                    card.innerHTML = `
                        <div class="shrink-0 w-12 h-12 rounded-xl flex items-center justify-center ${app.color} text-white shadow-lg shadow-${app.color.replace('bg-', '')}/20">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${app.icon}"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-semibold text-white truncate pr-6">${app.title}</h4>
                            <p class="text-xs text-slate-400 mt-0.5 truncate">${app.desc}</p>
                            <span class="inline-block mt-2 px-2 py-0.5 rounded text-[10px] font-medium bg-white/5 text-slate-300 border border-white/5 uppercase tracking-wide">${app.category}</span>
                        </div>
                        
                        <!-- Favorite Button -->
                        <button onclick="toggleFavorite(${app.id})" class="favorite-btn absolute top-4 right-4 text-slate-600 hover:text-amber-400 transition-colors z-10" title="Añadir a favoritos">
                            <svg class="w-5 h-5 star-icon" fill="${isFav ? 'currentColor' : 'none'}" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </button>
                    `;
                    grid.appendChild(card);
                });
            }

            appsCount.textContent = items.length;
        }

        // --- FILTER LOGIC ---
        function filterApps(category) {
            highlightNav(category);
            searchInput.value = ''; // Reset search

            if (category === 'all') {
                categoryTitle.textContent = 'Todas las Apps';
                welcomeBanner.classList.remove('hidden');
                renderApps(apps);
            } else if (category === 'favorites') {
                categoryTitle.textContent = 'Mis Favoritos';
                welcomeBanner.classList.add('hidden');
                const favApps = apps.filter(app => favorites.includes(app.id));
                renderApps(favApps);
            } else {
                categoryTitle.textContent = category;
                welcomeBanner.classList.add('hidden');
                const filtered = apps.filter(app => app.category === category);
                renderApps(filtered);
            }
        }

        function toggleFavorite(id) {
            if (favorites.includes(id)) {
                favorites = favorites.filter(favId => favId !== id);
            } else {
                favorites.push(id);
            }
            localStorage.setItem('hub_favorites', JSON.stringify(favorites));

            // Re-render current view to reflect changes immediately
            const activeNav = document.querySelector('.active-nav');
            if (activeNav.id === 'nav-favorites') {
                filterApps('favorites');
            } else if (activeNav.id === 'nav-all') {
                // Just update visual state without re-rendering everything to keep scroll pos
                const btn = document.querySelector(`button[onclick="toggleFavorite(${id})"]`);
                if (btn) {
                    const star = btn.querySelector('.star-icon');
                    const card = btn.closest('.app-card');
                    if (favorites.includes(id)) {
                        card.classList.add('is-favorite');
                        star.setAttribute('fill', 'currentColor');
                    } else {
                        card.classList.remove('is-favorite');
                        star.setAttribute('fill', 'none');
                    }
                }
            } else {
                // If in category view, same simple update
                const btn = document.querySelector(`button[onclick="toggleFavorite(${id})"]`);
                if (btn) {
                    const star = btn.querySelector('.star-icon');
                    const card = btn.closest('.app-card');
                    if (favorites.includes(id)) {
                        card.classList.add('is-favorite');
                        star.setAttribute('fill', 'currentColor');
                    } else {
                        card.classList.remove('is-favorite');
                        star.setAttribute('fill', 'none');
                    }
                }
            }
        }

        function highlightNav(id) {
            // Remove active class
            document.querySelectorAll('aside button').forEach(btn => {
                btn.classList.remove('bg-white/10', 'text-white', 'active-nav');
                btn.classList.add('text-slate-300');
            });

            // Add active class
            let selector = '';
            if (id === 'all') selector = '#nav-all';
            else if (id === 'favorites') selector = '#nav-favorites';
            else {
                // Find category buttons by text content logic or add dedicated IDs. 
                // Simple workaround:
                const btns = document.querySelectorAll('.text-category');
                btns.forEach(btn => {
                    if (btn.textContent.includes(id)) {
                        btn.classList.add('bg-white/10', 'text-white', 'active-nav');
                        btn.classList.remove('text-slate-300');
                    }
                });
                return;
            }

            const activeBtn = document.querySelector(selector);
            if (activeBtn) {
                activeBtn.classList.add('bg-white/10', 'text-white', 'active-nav');
                activeBtn.classList.remove('text-slate-300');
            }
        }

        // --- SEARCH ---
        searchInput.addEventListener('keyup', (e) => {
            const term = e.target.value.toLowerCase();
            welcomeBanner.classList.add('hidden');
            categoryTitle.textContent = 'Resultados de búsqueda';

            const results = apps.filter(app =>
                app.title.toLowerCase().includes(term) ||
                app.desc.toLowerCase().includes(term) ||
                app.category.toLowerCase().includes(term)
            );
            renderApps(results);

            // Clear active nav
            document.querySelectorAll('aside button').forEach(btn => {
                btn.classList.remove('bg-white/10', 'text-white', 'active-nav');
                btn.classList.add('text-slate-300');
            });
        });

        // Initialize
        init();
    </script>
</body>

</html>