<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>GP du Monde - Dashboard Gestionnaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sage': {
                            50: '#f6f7f4',
                            100: '#e8eae4',
                            200: '#d1d6c9',
                            300: '#b4bca6',
                            400: '#9ca687',
                            500: '#7c8471',
                            600: '#6b7f5f',
                            700: '#556549',
                            800: '#45523c',
                            900: '#3a4432',
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-full">
    <div class="min-h-full">
        <!-- Sidebar -->
        <nav class="bg-gradient-to-b from-sage-600 to-sage-700 fixed inset-y-0 left-0 w-64 shadow-xl">
            <div class="flex h-full flex-col">
                <!-- Logo -->
                <div class="flex h-16 shrink-0 items-center px-6">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-sage-700" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                        </div>
                        <span class="text-white font-bold text-lg">MIKEY TOUR</span>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex flex-1 flex-col px-6 pb-4">
                    <ul role="list" class="flex flex-1 flex-col gap-y-2 mt-6">
                        <li>
                            <a href="dashboard" class=" group flex gap-x-3 rounded-lg p-3 text-sm font-semibold leading-6 text-white hover:bg-white/20 transition-all">
                                <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="cargaison" class="bg-white/10 group flex gap-x-3 rounded-lg p-3 text-sm font-semibold leading-6 text-white hover:bg-white/20 transition-all">
                                <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m0-6.75a1.125 1.125 0 011.125-1.125m9.375 0h1.875a1.125 1.125 0 011.125 1.125M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm6 2.25a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                </svg>
                                Cargaisons
                            </a>
                        </li>
                        <li>
                            <a href="#clients" class="group flex gap-x-3 rounded-lg p-3 text-sm font-semibold leading-6 text-white hover:bg-white/20 transition-all">
                                <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                                Clients
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- User Profile -->
                     <form action="retour" method="get">
                     <button type="submit" class="bg-gradient-to-r from-gray-500 to-lime-600 text-white px-8 py-4 rounded-xl m-12 font-bold text-lg hover:from-gray-600 hover:to-lime-700 transition-all duration-300 shadow-lg transform hover:scale-105 r">
                     <p href="retour" class="text-white text-sm font-medium">Deconnexion</p>
                     </button>
                     </form>  
        </nav>
        <!-- Main content -->
        <main class="pl-64">
            <!-- Header -->
            <div class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                        <div class="flex items-center space-x-4">
                            <button class="bg-sage-700 text-white px-4 py-2 rounded-lg hover:bg-sage-800 transition-colors">
                                + Nouvelle Cargaison
                            </button>
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-500">Dernière mise à jour: 12:30</span>
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="px-6 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Liste des Cargaisons</h2>

   
</section>
<script type="module" src="/dist/Cargaison.js"></script></body>
</html>
