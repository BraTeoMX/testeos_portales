<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Intimark</title>
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
                    <button onclick="showSection('avisos')" id="btn-avisos" class="nav-item px-5 py-2 text-sm font-medium text-stone-600 rounded-xl transition-all duration-300 hover:bg-stone-100">
                        Avisos
                    </button>
                    <button onclick="showSection('portales')" id="btn-portales" class="nav-item px-5 py-2 text-sm font-medium text-stone-600 rounded-xl transition-all duration-300 hover:bg-stone-100">
                        Portales
                    </button>
                    <button onclick="showSection('otros')" id="btn-otros" class="nav-item px-5 py-2 text-sm font-medium text-stone-600 rounded-xl transition-all duration-300 hover:bg-stone-100">
                        Otros
                    </button>
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto px-4 py-8 relative" id="scroll-container">
            <div class="max-w-5xl mx-auto bg-white/40 backdrop-blur-sm rounded-3xl p-6 md:p-10 shadow-lg border border-white/60 min-h-[80vh]">

                <!-- Section: Avisos -->
                <section id="section-avisos" class="content-section transition-all duration-500 opacity-100 translate-y-0">
                    <header class="mb-8 pl-2 border-l-4 border-sky-500">
                        <h2 class="text-3xl font-light text-stone-800">Avisos <span class="font-bold text-sky-600">Recientes</span></h2>
                        <p class="text-stone-400 mt-2 text-sm">Mantente al día con las últimas novedades.</p>
                    </header>

                    <div class="grid gap-6">
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-stone-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-2 py-1 bg-amber-100 text-amber-700 text-[10px] font-bold uppercase tracking-wider rounded-md">Importante</span>
                                <span class="text-stone-400 text-xs">Hoy, 09:00 AM</span>
                            </div>
                            <h3 class="text-xl font-bold text-stone-800 mb-2">Mantenimiento Programado</h3>
                            <p class="text-stone-600">Se realizará un mantenimiento de los servidores este fin de semana.</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-stone-100 hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="px-2 py-1 bg-sky-100 text-sky-700 text-[10px] font-bold uppercase tracking-wider rounded-md">Info</span>
                                <span class="text-stone-400 text-xs">Ayer</span>
                            </div>
                            <h3 class="text-xl font-bold text-stone-800 mb-2">Nueva Política de Vacaciones</h3>
                            <p class="text-stone-600">Actualización en el proceso de solicitud de días libres.</p>
                        </div>
                        <!-- Dummy content to allow scrolling -->
                        <?php for ($i = 0; $i < 8; $i++): ?>
                            <div class="bg-white/50 rounded-xl p-4 border border-stone-100">
                                <div class="flex gap-4">
                                    <div class="w-12 h-12 bg-stone-100 rounded-lg shrink-0"></div>
                                    <div class="w-full">
                                        <div class="h-4 bg-stone-100 rounded w-1/3 mb-2"></div>
                                        <div class="h-3 bg-stone-100 rounded w-full"></div>
                                        <div class="h-3 bg-stone-100 rounded w-2/3 mt-1"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </section>

                <!-- Section: Portales -->
                <section id="section-portales" class="content-section hidden opacity-0 translate-y-4">
                    <header class="mb-8 pl-2 border-l-4 border-emerald-500">
                        <h2 class="text-3xl font-light text-stone-800">Tus <span class="font-bold text-emerald-600">Aplicaciones</span></h2>
                        <p class="text-stone-400 mt-2 text-sm">Acceso rápido a tus herramientas.</p>
                    </header>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <a href="#" class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 hover:-translate-y-1 transition-transform cursor-pointer group">
                            <div class="w-12 h-12 bg-sky-50 text-sky-500 rounded-xl flex items-center justify-center group-hover:bg-sky-500 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-700 text-sm">Recursos Humanos</span>
                        </a>
                        <a href="#" class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col items-center justify-center text-center gap-3 hover:-translate-y-1 transition-transform cursor-pointer group">
                            <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-stone-700 text-sm">Solicitudes</span>
                        </a>
                    </div>
                </section>

                <!-- Section: Otros -->
                <section id="section-otros" class="content-section hidden opacity-0 translate-y-4">
                    <header class="mb-8 pl-2 border-l-4 border-purple-500">
                        <h2 class="text-3xl font-light text-stone-800">Más <span class="font-bold text-purple-600">Herramientas</span></h2>
                    </header>
                    <div class="bg-stone-50 rounded-2xl p-12 text-center text-stone-500 border-2 border-dashed border-stone-200">
                        <p class="text-lg">Contenido adicional disponible próximamente</p>
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

            // 1. Welcome Animation
            setTimeout(() => {
                welcomeScreen.style.opacity = '0';
                mainInterface.classList.remove('opacity-0');
                setTimeout(() => welcomeScreen.remove(), 500);
            }, 1800);

            // 2. Initialize Section
            showSection('avisos');

            // 3. Scroll Listener for Navbar State
            scrollContainer.addEventListener('scroll', () => {
                if (scrollContainer.scrollTop > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // 4. Background Swarm Animation
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

                update() {
                    // 1. Move towards eased mouse pos
                    let dx = easedMouse.x - this.x;
                    let dy = easedMouse.y - this.y;
                    let dist = Math.sqrt(dx * dx + dy * dy);

                    // Force strength
                    if (dist < 500) {
                        let force = (500 - dist) / 5000; // gentle attraction
                        this.vx += dx * force;
                        this.vy += dy * force;
                    }

                    // 2. Add organic noise (random wander)
                    this.vx += (Math.random() - 0.5) * 0.5;
                    this.vy += (Math.random() - 0.5) * 0.5;

                    // 3. Max speed limit
                    let speed = Math.sqrt(this.vx * this.vx + this.vy * this.vy);
                    if (speed > 4) {
                        this.vx = (this.vx / speed) * 4;
                        this.vy = (this.vy / speed) * 4;
                    }

                    // 4. Update pos
                    this.x += this.vx;
                    this.y += this.vy;

                    // 5. Friction
                    this.vx *= this.friction;
                    this.vy *= this.friction;

                    // 6. Wrap around edges
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
                    p.update();
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