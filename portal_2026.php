<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal 2026 - Intimark</title>
    <link href="./dist/output.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        /* Animation Keyframes */
        @keyframes breathe-float {
            0% {
                transform: scale(0.8) translateY(20px);
                opacity: 0;
            }

            50% {
                transform: scale(1.1) translateY(-15px);
                opacity: 1;
            }

            100% {
                transform: scale(1) translateY(0);
                opacity: 1;
            }
        }

        .animate-welcome {
            animation: breathe-float 1.5s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }

        /* Canvas Background */
        #bg-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        /* Sidebar */
        #sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 280px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            z-index: 40;
            padding: 2rem 1rem;
        }

        #sidebar.collapsed {
            transform: translateX(-100%);
        }

        #sidebar-toggle {
            position: fixed;
            left: 1rem;
            top: 1rem;
            z-index: 50;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        #sidebar-toggle:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        /* Search Bar */
        #search-bar {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 2rem;
            padding: 0.75rem 1.5rem;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        #search-input {
            border: none;
            outline: none;
            flex: 1;
            background: transparent;
            font-size: 1rem;
        }

        /* Active Navigation Item */
        .nav-active {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            color: #ffffff !important;
            font-weight: 700 !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
        }

        /* Tooltip */
        .tooltip {
            position: relative;
        }

        .tooltip .tooltip-text {
            visibility: hidden;
            width: 120px;
            background-color: #0369a1;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #10b981;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateX(100%);
            transition: transform 0.5s ease-in-out;
            z-index: 1000;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.hide {
            transform: translateX(100%);
        }

        /* Pulse for new items */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Netflix-style hover for access cards */
        .access-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .access-card {
            flex: 1 1 calc(25% - 1rem);
            min-width: 200px;
            transition: transform 0.3s ease, z-index 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .access-card:hover {
            transform: scale(1.1);
            z-index: 10;
        }

        .access-card:not(:hover) {
            transform: scale(0.95);
        }

        /* Menu indicator */
        .menu-indicator {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background-color: #0369a1;
            transition: width 0.3s ease, left 0.3s ease;
            border-radius: 2px;
        }

        /* News card hover */
        .news-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* Icon gradients */
        .icon-gradient-sky {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
        }

        .icon-gradient-emerald {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .icon-gradient-purple {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .icon-gradient-amber {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }
    </style>
</head>

<body class="h-screen w-screen overflow-hidden font-sans relative">

    <!-- Background Canvas -->
    <canvas id="bg-canvas"></canvas>

    <!-- Welcome Overlay -->
    <div id="welcome-screen" class="fixed inset-0 z-[100] flex items-center justify-center pointer-events-none" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
        <div class="relative flex flex-col items-center">
            <!-- Logo with Animation -->
            <img src="img/logo.png" alt="Intimark Logo" class="w-40 md:w-56 object-contain animate-welcome">
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="toast">¡Nueva noticia disponible!</div>

    <!-- Sidebar Toggle -->
    <button id="sidebar-toggle">
        <svg class="w-6 h-6 text-stone-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar">
        <div class="flex items-center mb-8">
            <img src="img/logo.png" alt="Logo" class="h-8 w-auto mr-3">
            <h1 class="text-xl font-bold text-stone-800">Portal 2026</h1>
        </div>
        <nav class="space-y-2">
            <button onclick="showSection('accesos')" id="btn-accesos" class="nav-item w-full text-left px-4 py-3 text-sm font-medium text-stone-600 rounded-xl transition-all duration-300 hover:bg-stone-100">
                Accesos Rápidos
            </button>
            <button onclick="showSection('noticias')" id="btn-noticias" class="nav-item w-full text-left px-4 py-3 text-sm font-medium text-stone-600 rounded-xl transition-all duration-300 hover:bg-stone-100">
                Noticias
            </button>
        </nav>
    </div>

    <!-- Interface Content -->
    <div id="main-interface" class="opacity-0 transition-opacity duration-1000 delay-500 h-full flex flex-col ml-0 transition-all duration-300" id="main-content">

        <!-- Search Bar -->
        <div class="px-4 py-4">
            <div id="search-bar">
                <svg class="w-5 h-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input id="search-input" type="text" placeholder="Buscar en el portal...">
            </div>
        </div>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto px-4 py-8 relative" id="scroll-container">
            <div class="max-w-5xl mx-auto bg-white/30 backdrop-blur-sm rounded-3xl p-6 md:p-10 shadow-lg border border-white/50 min-h-[80vh]">

                <!-- Section: Accesos Rápidos -->
                <section id="section-accesos" class="content-section transition-all duration-500 opacity-100 translate-y-0">
                    <header class="mb-8 pl-2 border-l-4 border-sky-500">
                        <h2 class="text-3xl font-light text-stone-800">Accesos <span class="font-bold text-sky-600">Rápidos</span></h2>
                        <p class="text-stone-400 mt-2 text-sm">Herramientas y aplicaciones al alcance de un clic.</p>
                    </header>
                    <div class="access-grid">
                        <div class="access-card tooltip bg-slate-50 p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 cursor-pointer group relative overflow-hidden">
                            <div class="w-16 h-16 icon-gradient-sky text-white rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-800 text-sm">Recursos Humanos</span>
                            <p class="text-stone-600 text-xs opacity-0 group-hover:opacity-100 transition-opacity">Accede a tu perfil, solicitudes y beneficios.</p>
                            <span class="tooltip-text">Accede a tu perfil y solicitudes</span>
                            <div class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full pulse" title="Nuevo"></div>
                        </div>
                        <div class="access-card tooltip bg-slate-50 p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 cursor-pointer group overflow-hidden">
                            <div class="w-16 h-16 icon-gradient-emerald text-white rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-800 text-sm">Solicitudes</span>
                            <p class="text-stone-600 text-xs opacity-0 group-hover:opacity-100 transition-opacity">Gestiona tus solicitudes pendientes de forma rápida.</p>
                            <span class="tooltip-text">Gestiona tus solicitudes pendientes</span>
                        </div>
                        <div class="access-card tooltip bg-slate-50 p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 cursor-pointer group overflow-hidden">
                            <div class="w-16 h-16 icon-gradient-purple text-white rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-800 text-sm">Dashboard</span>
                            <p class="text-stone-600 text-xs opacity-0 group-hover:opacity-100 transition-opacity">Visualiza métricas, reportes y KPIs en tiempo real.</p>
                            <span class="tooltip-text">Visualiza métricas y reportes</span>
                        </div>
                        <div class="access-card tooltip bg-slate-50 p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 cursor-pointer group overflow-hidden">
                            <div class="w-16 h-16 icon-gradient-amber text-white rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10a2 2 0 002 2h4a2 2 0 002-2V11m-6 0h6"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-800 text-sm">Producción</span>
                            <p class="text-stone-600 text-xs opacity-0 group-hover:opacity-100 transition-opacity">Accede a herramientas de producción y control de calidad.</p>
                            <span class="tooltip-text">Accede a herramientas de producción</span>
                        </div>
                    </div>
                </section>

                <!-- Section: Noticias -->
                <section id="section-noticias" class="content-section hidden opacity-0 translate-y-4">
                    <header class="mb-8 pl-2 border-l-4 border-emerald-500">
                        <h2 class="text-3xl font-light text-stone-800">Últimas <span class="font-bold text-emerald-600">Noticias</span></h2>
                        <p class="text-stone-400 mt-2 text-sm">Mantente informado con las novedades de la empresa.</p>
                    </header>

                    <div class="grid gap-6">
                        <div class="news-card bg-slate-50 rounded-2xl p-6 shadow-sm border border-stone-100">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-2 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold uppercase tracking-wider rounded-md">Importante</span>
                                <span class="text-stone-400 text-xs">Hoy, 09:00 AM</span>
                            </div>
                            <h3 class="text-xl font-bold text-stone-800 mb-2">Mantenimiento Programado</h3>
                            <p class="text-stone-600">Se realizará un mantenimiento de los servidores este fin de semana. Esperamos su comprensión.</p>
                            <div class="mt-4 opacity-0 transition-opacity duration-300 hover:opacity-100">
                                <p class="text-stone-500 text-sm">Más detalles: El mantenimiento comenzará el sábado a las 10 PM y durará aproximadamente 4 horas.</p>
                            </div>
                        </div>
                        <div class="news-card bg-slate-50 rounded-2xl p-6 shadow-sm border border-stone-100">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-2 py-1 bg-sky-100 text-sky-700 text-[10px] font-bold uppercase tracking-wider rounded-md">Actualización</span>
                                <span class="text-stone-400 text-xs">Ayer</span>
                            </div>
                            <h3 class="text-xl font-bold text-stone-800 mb-2">Nueva Política de Vacaciones</h3>
                            <p class="text-stone-600">Hemos actualizado el proceso de solicitud de días libres. Consulta el manual actualizado.</p>
                            <div class="mt-4 opacity-0 transition-opacity duration-300 hover:opacity-100">
                                <p class="text-stone-500 text-sm">Cambios principales: Mayor flexibilidad en fechas y aprobación automática para solicitudes menores a 5 días.</p>
                            </div>
                        </div>
                        <div class="news-card bg-slate-50 rounded-2xl p-6 shadow-sm border border-stone-100">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider rounded-md">Evento</span>
                                <span class="text-stone-400 text-xs">Hace 2 días</span>
                            </div>
                            <h3 class="text-xl font-bold text-stone-800 mb-2">Reunión Anual de Equipo</h3>
                            <p class="text-stone-600">La reunión anual se llevará a cabo el próximo mes. Agenda disponible próximamente.</p>
                            <div class="mt-4 opacity-0 transition-opacity duration-300 hover:opacity-100">
                                <p class="text-stone-500 text-sm">Fecha tentativa: 15 de enero. Incluirá presentaciones de proyectos y networking.</p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const welcomeScreen = document.getElementById('welcome-screen');
            const mainInterface = document.getElementById('main-interface');
            const scrollContainer = document.getElementById('scroll-container');
            const toast = document.getElementById('toast');
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const mainContent = document.getElementById('main-content');

            // 1. Welcome Animation
            setTimeout(() => {
                welcomeScreen.style.opacity = '0';
                mainInterface.classList.remove('opacity-0');
                setTimeout(() => welcomeScreen.remove(), 500);
            }, 1800);

            // 2. Initialize Section
            showSection('accesos');

            // 3. Sidebar Auto-hide after 3 seconds
            setTimeout(() => {
                sidebar.classList.add('collapsed');
                mainContent.style.marginLeft = '0';
            }, 3000);

            // 4. Sidebar Toggle
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
                if (sidebar.classList.contains('collapsed')) {
                    mainContent.style.marginLeft = '0';
                } else {
                    mainContent.style.marginLeft = '280px';
                }
            });

            // 5. Show Toast Notification after welcome
            setTimeout(() => {
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                    toast.classList.add('hide');
                }, 3000);
            }, 2500);

            // 6. Background Swarm Animation
            initSwarm();
        });

        function showSection(sectionId) {
            // Update Menu Buttons
            document.querySelectorAll('.nav-item').forEach(btn => {
                // Reset all states
                btn.classList.remove('nav-active');
                btn.classList.add('text-stone-600', 'hover:bg-stone-100');
            });

            // Add active styles to clicked button
            const activeBtn = document.getElementById('btn-' + sectionId);
            if (activeBtn) {
                activeBtn.classList.remove('text-stone-600', 'hover:bg-stone-100');
                activeBtn.classList.add('nav-active');
            }
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
                section.classList.remove('opacity-100', 'translate-y-0');
                section.classList.add('opacity-0', 'translate-y-4');
            });
            const target = document.getElementById('section-' + sectionId);
            if (target) {
                target.classList.remove('hidden');
                requestAnimationFrame(() => {
                    target.classList.remove('opacity-0', 'translate-y-4');
                    target.classList.add('opacity-100', 'translate-y-0');
                });
            }
        }

        // Swarm / Organic Swarm Logic
        function initSwarm() {
            const canvas = document.getElementById('bg-canvas');
            const ctx = canvas.getContext('2d');
            let width, height;
            let particles = [];

            // Mouse tracking with eased position
            const mouse = {
                x: -1000,
                y: -1000
            };
            const easedMouse = {
                x: -1000,
                y: -1000
            };

            window.addEventListener('mousemove', (e) => {
                mouse.x = e.clientX;
                mouse.y = e.clientY;
            });

            window.addEventListener('resize', resize);

            function resize() {
                width = window.innerWidth;
                height = window.innerHeight;
                canvas.width = width;
                canvas.height = height;
                initParticles();
            }

            class Particle {
                constructor() {
                    this.reset();
                    // Spread starts random
                    this.x = Math.random() * width;
                    this.y = Math.random() * height;
                }

                reset() {
                    this.x = Math.random() * width;
                    this.y = Math.random() * height;
                    this.vx = (Math.random() - 0.5) * 2;
                    this.vy = (Math.random() - 0.5) * 2;
                    this.size = Math.random() * 2 + 1;
                    this.friction = 0.96;
                    this.randomness = Math.random() * 0.2;
                }

                update(particles) {
                    // 1. ATTRACTION & REPULSION from mouse
                    let dx = easedMouse.x - this.x;
                    let dy = easedMouse.y - this.y;
                    let dist = Math.sqrt(dx * dx + dy * dy);

                    const repelRadius = 80; // Dead zone around cursor
                    const attractRadius = 400; // Attraction zone

                    if (dist < repelRadius && dist > 0) {
                        // REPEL strongly when too close (prevents touching cursor)
                        let repelForce = (repelRadius - dist) / repelRadius * 0.8;
                        this.vx -= (dx / dist) * repelForce;
                        this.vy -= (dy / dist) * repelForce;
                    } else if (dist < attractRadius && dist > repelRadius) {
                        // ATTRACT gently when in range
                        let attractForce = (attractRadius - dist) / attractRadius * 0.15;
                        this.vx += (dx / dist) * attractForce;
                        this.vy += (dy / dist) * attractForce;

                        // TANGENTIAL force for spiral/orbital effect
                        let tangentX = -dy / dist;
                        let tangentY = dx / dist;
                        let orbitalForce = 0.05;
                        this.vx += tangentX * orbitalForce;
                        this.vy += tangentY * orbitalForce;
                    }

                    // 2. INTER-PARTICLE REPULSION (push away from each other)
                    particles.forEach(other => {
                        if (other === this) return;

                        let pdx = this.x - other.x;
                        let pdy = this.y - other.y;
                        let pdist = Math.sqrt(pdx * pdx + pdy * pdy);

                        if (pdist < 30 && pdist > 0) {
                            let pushForce = (30 - pdist) / 30 * 0.3;
                            this.vx += (pdx / pdist) * pushForce;
                            this.vy += (pdy / pdist) * pushForce;
                        }
                    });

                    // 3. Add subtle organic noise (random wander)
                    this.vx += (Math.random() - 0.5) * 0.3;
                    this.vy += (Math.random() - 0.5) * 0.3;

                    // 4. Max speed limit
                    let speed = Math.sqrt(this.vx * this.vx + this.vy * this.vy);
                    if (speed > 5) {
                        this.vx = (this.vx / speed) * 5;
                        this.vy = (this.vy / speed) * 5;
                    }

                    // 5. Update position
                    this.x += this.vx;
                    this.y += this.vy;

                    // 6. Apply friction
                    this.vx *= this.friction;
                    this.vy *= this.friction;

                    // 7. Wrap around edges
                    if (this.x < 0) this.x = width;
                    if (this.x > width) this.x = 0;
                    if (this.y < 0) this.y = height;
                    if (this.y > height) this.y = 0;
                }

                draw() {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(14, 165, 233, ${Math.min(1, Math.abs(this.vx) + 0.2)})`; // Sky blue, opacity relative to speed
                    ctx.fill();
                }
            }

            function initParticles() {
                particles = [];
                let particleCount = Math.floor((width * height) / 10000);
                for (let i = 0; i < particleCount; i++) {
                    particles.push(new Particle());
                }
            }

            function animate() {
                // Ease the mouse position for smoother trails
                easedMouse.x += (mouse.x - easedMouse.x) * 0.1;
                easedMouse.y += (mouse.y - easedMouse.y) * 0.1;

                ctx.clearRect(0, 0, width, height);

                particles.forEach(p => {
                    p.update(particles); // Pass particles array for inter-particle collision
                    p.draw();
                });

                requestAnimationFrame(animate);
            }

            resize();
            animate();
        }
    </script>
</body>

</html>