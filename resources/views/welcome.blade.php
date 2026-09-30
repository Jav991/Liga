<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LIGA GAMER - Panel Oficial</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap" rel="stylesheet">
</head>
    <body class="bg-[#0b0f19] text-white font-['Inter'] min-h-screen flex flex-col justify-between">

        <header class="max-w-7xl mx-auto w-full px-6 py-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-purple-600/40">
                    <i class="fas fa-trophy text-white text-lg"></i>
                </div>
                <span class="font-black text-xl tracking-wider uppercase">LIGA <span class="text-purple-400">GAMER</span></span>
            </div>

            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('equipos.index') }}" class="px-5 py-2.5 bg-purple-600 hover:bg-purple-500 text-white font-bold rounded-xl text-sm transition shadow-lg shadow-purple-600/30">
                            Ir al Panel
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-gray-300 hover:text-white text-sm font-semibold transition">
                            Iniciar Sesión
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2.5 bg-purple-600 hover:bg-purple-500 text-white font-bold rounded-xl text-sm transition shadow-lg shadow-purple-600/30">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </header>

        <main class="max-w-4xl mx-auto px-6 text-center my-auto py-12">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-purple-500/10 border border-purple-500/20 text-purple-300 text-xs font-bold uppercase tracking-widest mb-6">
                <i class="fas fa-gamepad"></i> Plataforma Oficial de Competición
            </div>

            <h1 class="text-4xl md:text-6xl font-black tracking-tight leading-tight mb-6">
                Gestiona tus encuentros con <br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-pink-400 to-indigo-400">
                    estilo Broadcast TV
                </span>
            </h1>

            <p class="text-gray-400 text-base md:text-lg max-w-2xl mx-auto mb-10">
                Consulta marcadores en tiempo real, estadísticas de equipos y resultados oficiales con una interfaz diseñada para competir al máximo nivel.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('partidos.index') }}" class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 font-extrabold rounded-2xl shadow-xl shadow-purple-600/30 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-3">
                    <i class="fas fa-futbol"></i> EXPLORAR PARTIDOS
                </a>
            </div>
        </main>

        <footer class="py-6 text-center text-xs text-gray-500 border-t border-white/5">
            LIGA GAMER &copy; {{ date('Y') }} — Todos los derechos reservados.
        </footer>

    </body>
</html>