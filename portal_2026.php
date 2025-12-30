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

        /* Navbar State Transitions */
        #navbar-panel {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #nav-logo {
            transition: height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Scrolled State */
        .scrolled #navbar-panel {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
        }

        .scrolled #nav-logo {
            height: 1.75rem;
            /* h-7 equivalent */
        }

        /* Active Navigation Item */
        .nav-active {
            background-color: #0369a1 !important;
            /* sky-700 */
            color: #ffffff !important;
            font-weight: 700 !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
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
    </style>
</head>

<body class="bg-stone-50 h-screen w-screen overflow-hidden font-sans relative">

    <!-- Background Canvas -->
    <canvas id="bg-canvas"></canvas>

    <!-- Welcome Overlay -->
    <div id="welcome-screen" class="fixed inset-0 bg-stone-50 z-[100] flex items-center justify-center pointer-events-none">
        <div class="relative flex flex-col items-center">
            <!-- Logo with Animation -->
            <img src="img/logo.png" alt="Intimark Logo" class="w-40 md:w-56 object-contain animate-welcome">
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="toast">¡Nueva noticia disponible!</div>

    <!-- Interface Content -->
    <div id="main-interface" class="opacity-0 transition-opacity duration-1000 delay-500 h-full flex flex-col">

        <!-- Sticky Navigation Bar -->
        <nav id="navbar" class="sticky top-0 z-50 px-4 py-4 transition-all duration-300">
            <!-- Inner Container -->
            <div id="navbar-panel" class="max-w-4xl mx-auto bg-white/60 backdrop-blur-sm rounded-2xl shadow-sm border border-white/50 flex items-center justify-between p-4 box-border">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <img id="nav-logo" src="img/logo.png" alt="Logo" class="h-10 w-auto object-contain block">
                </div>

                <!-- Menu Items -->
                <div class="flex items-center gap-1 md:gap-3">
                    <button onclick="showSection('accesos')" id="btn-accesos" class="nav-item px-5 py-2 text-sm font-medium text-stone-600 rounded-xl transition-all duration-300 hover:bg-stone-100">
                        Accesos Rápidos
                    </button>
                    <button onclick="showSection('noticias')" id="btn-noticias" class="nav-item px-5 py-2 text-sm font-medium text-stone-600 rounded-xl transition-all duration-300 hover:bg-stone-100">
                        Noticias
                    </button>
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto px-4 py-8 relative" id="scroll-container">
            <div class="max-w-5xl mx-auto bg-white/40 backdrop-blur-sm rounded-3xl p-6 md:p-10 shadow-lg border border-white/60 min-h-[80vh]">

                <!-- Section: Accesos Rápidos -->
                <section id="section-accesos" class="content-section transition-all duration-500 opacity-100 translate-y-0">
                    <header class="mb-8 pl-2 border-l-4 border-sky-500">
                        <h2 class="text-3xl font-light text-stone-800">Accesos <span class="font-bold text-sky-600">Rápidos</span></h2>
                        <p class="text-stone-400 mt-2 text-sm">Herramientas y aplicaciones al alcance de un clic.</p>
                    </header>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <a href="#" class="tooltip bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 hover:-translate-y-2 transition-all duration-300 cursor-pointer group relative">
                            <div class="w-12 h-12 bg-sky-50 text-sky-500 rounded-xl flex items-center justify-center group-hover:bg-sky-500 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-700 text-sm">Recursos Humanos</span>
                            <span class="tooltip-text">Accede a tu perfil y solicitudes</span>
                            <div class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full pulse" title="Nuevo"></div>
                        </a>
                        <a href="#" class="tooltip bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 hover:-translate-y-2 transition-all duration-300 cursor-pointer group">
                            <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-700 text-sm">Solicitudes</span>
                            <span class="tooltip-text">Gestiona tus solicitudes pendientes</span>
                        </a>
                        <a href="#" class="tooltip bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 hover:-translate-y-2 transition-all duration-300 cursor-pointer group">
                            <div class="w-12 h-12 bg-purple-50 text-purple-500 rounded-xl flex items-center justify-center group-hover:bg-purple-500 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-700 text-sm">Dashboard</span>
                            <span class="tooltip-text">Visualiza métricas y reportes</span>
                        </a>
                        <a href="#" class="tooltip bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 hover:-translate-y-2 transition-all duration-300 cursor-pointer group">
                            <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-xl flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10a2 2 0 002 2h4a2 2 0 002-2V11m-6 0h6"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-700 text-sm">Producción</span>
                            <span class="tooltip-text">Accede a herramientas de producción</span>
                        </a>
                    </div>
                </section>

                <!-- Section: Noticias -->
                <section id="section-noticias" class="content-section hidden opacity-0 translate-y-4">
                    <header class="mb-8 pl-2 border-l-4 border-emerald-500">
                        <h2 class="text-3xl font-light text-stone-800">Últimas <span class="font-bold text-emerald-600">Noticias</span></h2>
                        <p class="text-stone-400 mt-2 text-sm">Mantente informado con las novedades de la empresa.</p>
                    </header>

                    <div class="grid gap-6">
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-stone-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-2 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold uppercase tracking-wider rounded-md">Importante</span>
                                <span class="text-stone-400 text-xs">Hoy, 09:00 AM</span>
                            </div>
                            <h3 class="text-xl font-bold text-stone-800 mb-2">Mantenimiento Programado</h3>
                            <p class="text-stone-600">Se realizará un mantenimiento de los servidores este fin de semana. Esperamos su comprensión.</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-stone-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-2 py-1 bg-sky-100 text-sky-700 text-[10px] font-bold uppercase tracking-wider rounded-md">Actualización</span>
                                <span class="text-stone-400 text-xs">Ayer</span>
                            </div>
                            <h3 class="text-xl font-bold text-stone-800 mb-2">Nueva Política de Vacaciones</h3>
                            <p class="text-stone-600">Hemos actualizado el proceso de solicitud de días libres. Consulta el manual actualizado.</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-stone-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-2 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider rounded-md">Evento</span>
                                <span class="text-stone-400 text-xs">Hace 2 días</span>
                            </div>
                            <h3 class="text-xl font-bold text-stone-800 mb-2">Reunión Anual de Equipo</h3>
                            <p class="text-stone-600">La reunión anual se llevará a cabo el próximo mes. Agenda disponible próximamente.</p>
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
            const navbar = document.getElementById('navbar');
            const toast = document.getElementById('toast');

            // 1. Welcome Animation
            setTimeout(() => {
                welcomeScreen.style.opacity = '0';
                mainInterface.classList.remove('opacity-0');
                setTimeout(() => welcomeScreen.remove(), 500);
            }, 1800);

            // 2. Initialize Section
            showSection('accesos');

            // 3. Scroll Listener for Navbar State
            scrollContainer.addEventListener('scroll', () => {
                if (scrollContainer.scrollTop > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // 4. Show Toast Notification after welcome
            setTimeout(() => {
                toast.classList.add('show');
                setTimeout(() => {
                    toast.classList.remove('show');
                    toast.classList.add('hide');
                }, 3000);
            }, 2500);

            // 5. Background Swarm Animation
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