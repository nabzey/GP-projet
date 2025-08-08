<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GP du Monde - Suivi de Colis</title>
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
<body class="h-full bg-gray-50">
                <!-- Search Form -->
                <div class="max-w-2xl mx-auto">
                    <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8">
                        <h2 class="text-2xl font-semibold text-white mb-6">Suivre votre colis</h2>
                        <form class="space-y-6" action="#" method="GET">
                            <div>
                                <input type="text" 
                                       id="trackingCode" 
                                       name="code"
                                       placeholder="Entrez votre code de suivi (ex: GP2025001234)" 
                                       class="w-full px-6 py-4 text-lg rounded-xl bg-white/20 border border-white/30 text-white placeholder-green-200 focus:ring-2 focus:ring-green-400 focus:border-transparent transition-all duration-200"
                                       required>
                            </div>
                            <button type="submit" 
                                    class="w-full bg-white text-sage-800 font-semibold py-4 px-8 rounded-xl hover:bg-green-50 focus:outline-none focus:ring-4 focus:ring-green-300 transition-all duration-200 transform hover:scale-105 shadow-xl">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    Suivre mon colis
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Example Results Section (Static Demo) -->
    <div class="py-16 px-6 max-w-7xl mx-auto">
        <!-- Package Found Example -->
        <div class="mb-8">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-sage-600 via-green-600 to-sage-500 p-8 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">Colis trouvé !</h3>
                            <p class="text-green-100">Code de suivi: <span class="font-mono bg-white/20 px-3 py-1 rounded-lg">GP2025001234</span></p>
                        </div>
                        <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <!-- Status Timeline -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-gray-900 mb-6">Suivi du colis</h4>
                        <div class="relative">
                            <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200"></div>
                            
                            <div class="relative flex items-center mb-6">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center z-10">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="font-semibold text-gray-900">Colis expédié</div>
                                    <div class="text-sm text-gray-500">Le 15 Janvier 2025 à 10:30</div>
                                </div>
                            </div>

                            <div class="relative flex items-center mb-6">
                                <div class="w-8 h-8 bg-sage-500 rounded-full flex items-center justify-center z-10 animate-pulse">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="font-semibold text-sage-600">En transit - Cargaison Maritime</div>
                                    <div class="text-sm text-gray-500">Arrive dans 3 jours</div>
                                    <div class="text-sm text-sage-600 font-medium">Actuellement en mer</div>
                                </div>
                            </div>

                            <div class="relative flex items-center mb-6">
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center z-10">
                                    <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
                                </div>
                                <div class="ml-4">
                                    <div class="font-semibold text-gray-400">En attente - Arrivée prévue</div>
                                    <div class="text-sm text-gray-400">Prévu le 25 Janvier 2025</div>
                                </div>
                            </div>

                            <div class="relative flex items-center">
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center z-10">
                                    <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
                                </div>
                                <div class="ml-4">
                                    <div class="font-semibold text-gray-400">Prêt pour récupération</div>
                                    <div class="text-sm text-gray-400">En attente</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Package Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <div class="bg-gradient-to-r from-sage-50 to-sage-100 rounded-2xl p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-sage-700 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h5 class="font-semibold text-gray-900 ml-3">Expéditeur</h5>
                            </div>
                            <p class="text-gray-700 font-medium">Amadou Diallo</p>
                            <p class="text-sm text-gray-500">Dakar, Sénégal</p>
                            <p class="text-sm text-gray-500">+221 77 123 45 67</p>
                        </div>

                        <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-2xl p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-green-700 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                    </svg>
                                </div>
                                <h5 class="font-semibold text-gray-900 ml-3">Destinataire</h5>
                            </div>
                            <p class="text-gray-700 font-medium">Marie Dupont</p>
                            <p class="text-sm text-gray-500">Marseille, France</p>
                            <p class="text-sm text-gray-500">+33 6 12 34 56 78</p>
                        </div>

                        <div class="bg-gradient-to-r from-lime-50 to-lime-100 rounded-2xl p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-lime-700 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4z"/>
                                    </svg>
                                </div>
                                <h5 class="font-semibold text-gray-900 ml-3">Détails Colis</h5>
                            </div>
                            <p class="text-gray-700 font-medium">Poids: 2.5 kg</p>
                            <p class="text-sm text-gray-500">Type: Produit Alimentaire</p>
                            <p class="text-sm text-gray-500">Prix: 15,000 FCFA</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4">
                        <button class="bg-sage-700 text-white px-6 py-3 rounded-xl hover:bg-sage-800 transition-colors">
                            Recevoir des notifications SMS
                        </button>
                        <button class="bg-green-700 text-white px-6 py-3 rounded-xl hover:bg-green-800 transition-colors">
                            Envoyer par email
                        </button>
                        <button class="bg-gray-200 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-300 transition-colors">
                            Imprimer le reçu
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Package Not Found Example (Hidden by default) -->
        <div class="hidden">
            <div class="bg-white rounded-3xl shadow-2xl p-12 text-center">
                <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Colis introuvable</h3>
                <p class="text-gray-600 mb-6">Le code de suivi saisi n'existe pas dans notre système ou le colis a été annulé.</p>
                <button class="bg-sage-700 text-white px-8 py-3 rounded-xl hover:bg-sage-800 transition-colors">
                    Nouvelle recherche
                </button>
            </div>
        </div>
    </div>

    <!-- Pricing Information -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Tarification Transparente</h2>
                <p class="text-lg text-gray-600">Prix minimum de 10,000 FCFA par colis</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-sage-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-sage-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4z"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-gray-900">Produits Alimentaires</h4>
                        <p class="text-sm text-gray-500 mt-1">Tarifs standards selon le poids et la destination</p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-12