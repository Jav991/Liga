<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel Principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Tarjeta de Bienvenida -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold">¡Bienvenido de nuevo, {{ Auth::user()->name }}! 👋</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">
                            Centro de control de tu liga. Gestiona equipos, clasificaciones y partidos desde aquí.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Accesos Directos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Tarjeta: Gestión de Equipos -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex flex-col justify-between hover:border-purple-500 dark:hover:border-purple-500 transition duration-300">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-3xl">⚽</span>
                            <span class="text-xs font-semibold uppercase tracking-wider px-3 py-1 rounded-full bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-300">
                                Clasificación
                            </span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                            Gestión de Equipos
                        </h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-6">
                            Accede a la tabla completa con los escudos, puntos, presupuestos, entrenadores y balance de goles.
                        </p>
                    </div>

                    <a href="{{ url('/equipos') }}" 
                       class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-semibold text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 rounded-lg shadow-md hover:shadow-lg transition duration-200 text-center">
                        Ir a la Tabla de Equipos
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                <!-- Tarjeta: Registrar Partido -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex flex-col justify-between hover:border-emerald-500 dark:hover:border-emerald-500 transition duration-300">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-3xl">🏆</span>
                            <span class="text-xs font-semibold uppercase tracking-wider px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-300">
                                Jornadas
                            </span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                            Registrar Partido
                        </h4>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-6">
                            Anota los marcadores para recalcular automáticamente los puntos y la diferencia de goles.
                        </p>
                    </div>
                    <a href="{{ route('partidos.create') }}" class="inline-block text-white font-semibold hover:text-emerald-400 transition">
                        Nuevo Enfrentamiento +
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>