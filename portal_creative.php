<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Creative - Intimark</title>
    <link href="./dist/output.css" rel="stylesheet">
    <style>
        /* Fuentes */
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;800&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0f172a;
            /* Slate 900 Background for contrast */
            overflow-x: hidden;
        }

        /* Blob Animations - Fondo dinámico */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.6;
            animation: floatBlob 20s infinite alternate;
            z-index: -1;
        }

        .blob-1 {
            top: -10%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: #4f46e5;
            animation-delay: 0s;
        }

        .blob-2 {
            bottom: -10%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: #ec4899;
            animation-delay: -5s;
        }

        .blob-3 {
            top: 40%;
            left: 40%;
            width: 400px;
            height: 400px;
            background: #06b6d4;
            animation-delay: -10s;
        }

        @keyframes floatBlob {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(50px, 50px) scale(1.1);
            }
        }

        /* Glassmorphism Cards */
        .bento-card {
            background: rgba(255, 255, 255, 0.03);
            /* Casi transparente */
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 2rem;
            /* Esquinas muy redondas */
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
        }

        /* Hover Interactions */
        .bento-card:hover {
            transform: scale(1.02) translateY(-5px);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        /* Gradient Text Animations */
        .text-gradient {
            background: linear-gradient(to right, #22d3ee, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: textFlow 5s linear infinite;
        }

        @keyframes textFlow {
            to {
                background-position: 200% center;
            }
        }

        /* Floating Dock */
        .dock-container {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
        }

        .dock-icon {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .dock-icon:hover {
            transform: scale(1.3) translateY(-10px);
            margin: 0 10px;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        /* Widget Specifics */
        .widget-icon-bg {
            transition: all 0.5s ease;
        }

        .bento-card:hover .widget-icon-bg {
            transform: scale(1.2) rotate(10deg);
            opacity: 0.8;
        }
    </style>
</head>

<body class="text-white h-screen flex flex-col justify-center items-center relative selection:bg-fuchsia-500 selection:text-white">

    <!-- Background Elements -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <!-- Main Container (Bento Grid) -->
    <div class="w-full max-w-7xl h-[85vh] p-4 lg:p-8 grid grid-cols-1 md:grid-cols-4 lg:grid-cols-6 grid-rows-4 gap-6 animate-fade-in-up">

        <!-- 1. Header & Greeting (2x1) -->
        <div class="col-span-2 row-span-1 bento-card p-8 flex flex-col justify-center bg-gradient-to-r from-blue-600/20 to-violet-600/20">
            <h5 class="text-blue-200 font-medium text-sm uppercase tracking-widest mb-2">Bienvenido</h5>
            <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">
                Hola, <span class="text-gradient">Usuario</span>
            </h1>
            <p class="text-slate-400 mt-2 text-sm">Todo está listo para tu jornada.</p>
        </div>

        <!-- 2. Weather/Date Widget (1x1) -->
        <div class="col-span-1 row-span-1 bento-card p-6 flex flex-col items-center justify-center relative group">
            <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 to-orange-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <span class="text-5xl mb-2 group-hover:animate-spin">☀️</span>
            <div class="text-center z-10">
                <span class="block text-2xl font-bold">24°</span>
                <span class="text-xs text-slate-400 uppercase tracking-wide">Soleado</span>
            </div>
        </div>

        <!-- 3. MAIN APP: Producción (Avances) (2x2) -->
        <a href="http://128.150.102.40:8010" target="_blank" class="col-span-3 row-span-2 bento-card relative group p-8 cursor-pointer overflow-hidden border-orange-500/30">
            <!-- Background Image con Overlay -->
            <div class="absolute inset-0 bg-[url('./img/production_bg.jpg')] bg-cover bg-center opacity-20 group-hover:scale-110 transition-transform duration-700"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>

            <div class="relative z-10 h-full flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div class="p-3 bg-orange-500 rounded-2xl shadow-lg shadow-orange-500/30 group-hover:rotate-12 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="px-3 py-1 bg-white/10 rounded-full text-xs font-semibold backdrop-blur-md border border-white/10">EN VIVO</span>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">Producción <br>en Tiempo Real</h2>
                    <p class="text-slate-300 text-sm max-w-xs">Monitoreo de líneas, eficiencia y reportes al instante.</p>
                    <div class="mt-4 flex items-center text-orange-400 text-sm font-bold group-hover:translate-x-2 transition-transform">
                        Ver Dashboard <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </a>

        <!-- 4. Quick Actions (1x1) -->
        <div class="col-span-1 row-span-1 bento-card p-4 flex flex-col justify-center gap-3">
            <a href="http://128.150.102.131:85/" class="flex items-center gap-3 p-2 rounded-xl hover:bg-white/10 transition-colors">
                <div class="w-8 h-8 rounded-lg bg-teal-500/20 text-teal-400 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium">Directorio</span>
            </a>
            <a href="http://128.150.102.131:86/" class="flex items-center gap-3 p-2 rounded-xl hover:bg-white/10 transition-colors">
                <div class="w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium">Salas</span>
            </a>
        </div>

        <!-- 5. Search Bar (Grande) (2x1) -->
        <div class="col-span-2 row-span-1 bento-card p-1 flex items-center">
            <div class="w-full h-full bg-slate-800/50 rounded-[1.8rem] flex items-center px-6 border border-slate-700 hover:border-slate-500 transition-colors">
                <svg class="w-6 h-6 text-slate-400 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" placeholder="¿Qué necesitas buscar hoy?" class="bg-transparent w-full text-lg outline-none text-white placeholder-slate-500 h-full">
            </div>
        </div>

        <!-- 6. SGD Vacaciones (Highlight) (1x2) -->
        <a href="http://128.150.102.131:8000" class="col-span-1 row-span-2 bento-card bg-gradient-to-b from-indigo-500 to-purple-600 text-white p-6 flex flex-col items-center justify-between text-center group cursor-pointer hover:shadow-indigo-500/50">
            <div class="mt-4 p-4 bg-white/20 rounded-full backdrop-blur-sm group-hover:scale-125 transition-transform duration-500">
                <span class="text-4xl">🏖️</span>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-1">Vacaciones</h3>
                <p class="text-xs text-indigo-100 opacity-80">Gestiona tus días</p>
            </div>
            <div class="w-full py-2 bg-white/20 rounded-xl text-xs font-bold mt-2 group-hover:bg-white group-hover:text-indigo-600 transition-colors">
                Acceder
            </div>
        </a>

        <!-- 7. News Carousel Scroll (3x1) -->
        <div class="col-span-3 row-span-1 bento-card p-6 flex items-center gap-6 overflow-hidden relative">
            <div class="absolute top-0 right-0 p-4">
                <span class="text-xs font-bold text-slate-500 tracking-widest uppercase">Noticias</span>
            </div>

            <!-- News Item (Static for demo, could be animated slider) -->
            <div class="flex items-center gap-4 w-full">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-pink-500 to-rose-500 flex-shrink-0 flex items-center justify-center shadow-lg shadow-pink-500/30">
                    <span class="text-2xl">🎉</span>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-xs font-bold text-pink-400 uppercase">Nuevo</span>
                        <span class="text-xs text-slate-500">Hace 1h</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-200">Reunión General de Planta</h3>
                    <p class="text-sm text-slate-400 line-clamp-1">Se convoca a todo el personal administrativo al auditorio principal.</p>
                </div>
            </div>
        </div>

        <!-- 8. TI Support (1x1) -->
        <a href="http://128.150.102.131:8080/intimark/public/" class="col-span-1 row-span-1 bento-card p-6 flex flex-col items-center justify-center gap-2 cursor-pointer group bg-slate-800/40 hover:bg-blue-600 hover:border-blue-500 transition-colors">
            <svg class="w-8 h-8 text-blue-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span class="text-xs font-bold text-slate-300 group-hover:text-white">Soporte TI</span>
        </a>

        <!-- 9. Intimedia (1x1) -->
        <a href="http://128.150.102.75/moodle/" class="col-span-1 row-span-1 bento-card p-6 flex flex-col items-center justify-center gap-2 cursor-pointer group bg-slate-800/40 hover:bg-violet-600 hover:border-violet-500 transition-colors">
            <svg class="w-8 h-8 text-violet-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <span class="text-xs font-bold text-slate-300 group-hover:text-white">Cursos</span>
        </a>

    </div>

    <!-- Floating Dock (Bottom) -->
    <div class="fixed bottom-6 left-1/2 transform -translate-x-1/2 dock-container p-2 flex items-center gap-2 z-50">
        <button class="dock-icon w-12 h-12 rounded-xl bg-slate-700/50 flex items-center justify-center text-white hover:bg-blue-500 hover:text-white" title="Inicio">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
        </button>
        <button class="dock-icon w-12 h-12 rounded-xl bg-slate-700/50 flex items-center justify-center text-white hover:bg-emerald-500 hover:text-white" title="Aplicaciones">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
        </button>
        <div class="w-px h-8 bg-slate-600 mx-1"></div>
        <button class="dock-icon w-12 h-12 rounded-xl bg-slate-700/50 flex items-center justify-center text-white hover:bg-rose-500 hover:text-white" title="Salir">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
        </button>
    </div>

</body>

</html>