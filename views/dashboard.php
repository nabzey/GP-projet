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
                            <a href="#dashboard" class="bg-white/10 group flex gap-x-3 rounded-lg p-3 text-sm font-semibold leading-6 text-white hover:bg-white/20 transition-all">
                                <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="cargaison" class="group flex gap-x-3 rounded-lg p-3 text-sm font-semibold leading-6 text-white hover:bg-white/20 transition-all">
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
            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-gradient-to-r from-sage-600 to-sage-500 rounded-2xl p-6 text-white transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100">Cargaisons Actives</p>
                                <p class="text-3xl font-bold">127</p>
                            </div>
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-green-600 to-green-500 rounded-2xl p-6 text-white transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100">Colis en Transit</p>
                                <p class="text-3xl font-bold">1,847</p>
                            </div>
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-lime-600 to-lime-500 rounded-2xl p-6 text-white transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100">Livraisons Réussies</p>
                                <p class="text-3xl font-bold">98.5%</p>
                            </div>
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-2xl p-6 text-white transform hover:scale-105 transition-transform duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-green-100">Revenus ce Mois</p>
                                <p class="text-3xl font-bold">2.4M</p>
                            </div>
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Cargaisons Récentes</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-green-50 transition-colors">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-sage-100 rounded-lg flex items-center justify-center mr-3">
                                        <span class="text-sage-700 font-semibold">MAR</span>
                                    </div>
                                    <div>
                                        <p class="font-medium">CAR-2025-001</p>
                                        <p class="text-sm text-gray-500">Maritime • Dakar → Marseille</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">En cours</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-green-50 transition-colors">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-lime-100 rounded-lg flex items-center justify-center mr-3">
                                        <span class="text-lime-700 font-semibold">AER</span>
                                    </div>
                                    <div>
                                        <p class="font-medium">CAR-2025-002</p>
                                        <p class="text-sm text-gray-500">Aérienne • Dakar → Paris</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">En attente</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-green-50 transition-colors">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                                        <span class="text-emerald-700 font-semibold">ROU</span>
                                    </div>
                                    <div>
                                        <p class="font-medium">CAR-2025-003</p>
                                        <p class="text-sm text-gray-500">Routière • Dakar → Bamako</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Arrivé</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions Rapides</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <button class="p-4 bg-sage-50 hover:bg-sage-100 rounded-xl transition-colors group">
                                <div class="w-8 h-8 bg-sage-700 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-900">Créer Cargaison</p>
                            </button>
                            <button class="p-4 bg-green-50 hover:bg-green-100 rounded-xl transition-colors group">
                                <div class="w-8 h-8 bg-green-700 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-900">Marquer Livré</p>
                            </button>
                            <button class="p-4 bg-lime-50 hover:bg-lime-100 rounded-xl transition-colors group">
                                <div class="w-8 h-8 bg-lime-700 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-900">Rechercher Colis</p>
                            </button>
                            <button class="p-4 bg-red-50 hover:bg-red-100 rounded-xl transition-colors group">
                                <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 6.75h.007v.008H12V6.75z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-900">Signaler Problème</p>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Gestion Colis Section -->
                <div class="mt-8 bg-white rounded-2xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Recherche et Gestion des Colis</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rechercher un colis</label>
                            <div class="flex space-x-2">
                                <input type="text" placeholder="Code du colis (ex: GP2025001234)" 
                                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sage-500 focus:border-transparent">
                                <button class="bg-sage-700 text-white px-4 py-2 rounded-lg hover:bg-sage-800 transition-colors">
                                    Rechercher
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Actions rapides</label>
                            <div class="space-y-2">
                                <button class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                                    Ajouter un colis
                                </button>
                                <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                    Voir tous les colis
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>