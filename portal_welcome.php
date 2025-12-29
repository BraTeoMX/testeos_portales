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
                /* Grows and floats up */
                opacity: 1;
            }

            100% {
                transform: scale(1) translateY(0);
                /* Settles back */
                opacity: 1;
            }
        }

        /* Animation Class */
        .animate-welcome {
            animation: breathe-float 1.5s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }

        #welcome-screen {
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }
    </style>
</head>

<body class="bg-stone-50 h-screen w-screen overflow-hidden flex items-center justify-center">

    <!-- Welcome Overlay -->
    <div id="welcome-screen" class="fixed inset-0 bg-stone-50 z-50 flex items-center justify-center">
        <div class="relative flex flex-col items-center">
            <!-- Logo with Animation -->
            <img src="img/logo.png" alt="Intimark Logo" class="w-40 md:w-56 object-contain animate-welcome">
        </div>
    </div>

    <!-- Main Content (Hidden initially, customizable for later) -->
    <div id="main-content" class="opacity-0 transition-opacity duration-1000 delay-500">
        <div class="text-center">
            <h1 class="text-4xl font-light text-stone-800 tracking-tight">Bienvenido a <span class="font-bold text-sky-600">Intimark</span></h1>
            <p class="mt-4 text-stone-500">El portal está listo.</p>
            <a href="portal_liquid.php" class="mt-8 inline-block px-8 py-3 rounded-full bg-sky-600 text-white font-medium hover:bg-sky-700 transition-colors shadow-lg shadow-sky-200">
                Entrar al Portal
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const welcomeScreen = document.getElementById('welcome-screen');
            const mainContent = document.getElementById('main-content');

            // Wait for the 1.5s animation plus a tiny buffer
            setTimeout(() => {
                // Fade out welcome screen
                welcomeScreen.style.opacity = '0';
                welcomeScreen.style.visibility = 'hidden';

                // Fade in main content
                mainContent.classList.remove('opacity-0');
            }, 1800); // 1.5s animation + 0.3s pause for smoothness
        });
    </script>
</body>

</html>