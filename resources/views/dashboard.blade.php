<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Tarjetas de acceso rápido -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        <!-- Tarjeta Libros -->
                        <a href="{{ route('libro.index') }}" class="block p-6 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                            <div class="flex items-center">
                                <div class="mr-4">
                                    <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Libros
                                    </h5>
                                    <p class="text-gray-500 dark:text-gray-400 mt-2">
                                        Gestiona tu biblioteca de libros
                                    </p>
                                </div>
                            </div>
                        </a>

                        <!-- Tarjeta Admin -->
                        <a href="{{ route('admin.dashboard') }}" class="block p-6 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                            <div class="flex items-center">
                                <div class="mr-4">
                                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Panel de Admin
                                    </h5>
                                    <p class="text-gray-500 dark:text-gray-400 mt-2">
                                        Acceso a herramientas administrativas
                                    </p>
                                </div>
                            </div>
                        </a>

                    <!-- Tarjeta Familias Profesionales -->
                        <a href="{{ route('familias_profesionales.index') }}" class="block p-6 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                            <div class="flex items-center">
                                <div class="mr-4">
                                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        Familias Profesionales
                                    </h5>
                                    <p class="text-gray-500 dark:text-gray-400 mt-2">
                                        Gestiona las familias profesionales
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Información adicional -->
                    <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold mb-4">Resumen rápido</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                                <h4 class="font-medium text-blue-800 dark:text-blue-300">Total Libros</h4>
                                <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mt-2">
                                    {{ \App\Models\Libro::count() }}
                                </p>
                            </div>
                            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                                <h4 class="font-medium text-green-800 dark:text-green-300">Usuarios</h4>
                                <p class="text-2xl font-bold text-green-600 dark:text-green-400 mt-2">
                                    {{ \App\Models\User::count() }}
                                </p>
                            </div>
                            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                                <h4 class="font-medium text-purple-800 dark:text-purple-300">Familias Prof.</h4>
                                <p class="text-2xl font-bold text-purple-600 dark:text-purple-400 mt-2">
                                    {{ \App\Models\FamiliaProfesional::count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>