<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>MIKEY TOUR - Service de Transport et Logistique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-full overflow-x-hidden bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-600 to-lime-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-truck text-white text-xl"></i>
                    </div>
                    <span class="text-gray-800 font-bold text-2xl">MIKEY TOUR</span>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#accueil" class="text-gray-700 hover:text-green-600 transition-colors duration-300 font-medium">Accueil</a>
                    <a href="#services" class="text-gray-700 hover:text-green-600 transition-colors duration-300 font-medium">Services</a>
                    <a href="suivi" class="text-gray-700 hover:text-green-600 transition-colors duration-300 font-medium">Suivi Colis</a>
                    <a href="#contact" class="text-gray-700 hover:text-green-600 transition-colors duration-300 font-medium">Contact</a>
                </div>

                <!-- Connexion Gestionnaire Button -->
                <div class="flex items-center space-x-4">
                    <a href="logingestionnaire" class="bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-2.5 rounded-xl hover:from-green-700 hover:to-blue-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105">
                        <i class="fas fa-user-shield mr-2"></i>
                        Connexion Gestionnaire
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="accueil" class="relative bg-gradient-to-br from-gray-700 via-gray-500 to-lime-600 min-h-screen flex items-center overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full"></div>
            <div class="absolute top-40 right-20 w-24 h-24 bg-white rounded-full"></div>
            <div class="absolute bottom-40 left-1/4 w-16 h-16 bg-white rounded-full"></div>
            <div class="absolute bottom-20 right-1/3 w-20 h-20 bg-white rounded-full"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="text-center lg:text-left">
                    <h1 class="text-5xl lg:text-7xl font-black text-white mb-6 leading-tight">
                        Transport
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-400">
                            Intelligent
                        </span>
                    </h1>
                    <p class="text-xl text-white/90 mb-8 leading-relaxed max-w-2xl">
                        Solutions logistiques complètes pour vos expéditions. Transport maritime, aérien et routier 
                        avec suivi en temps réel et service client exceptionnel.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#suivi" class="bg-white text-gray-800 px-8 py-4 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 shadow-2xl transform hover:scale-105 text-center">
                            <i class="fas fa-search mr-2"></i>
                            Suivre un Colis
                        </a>
                        <a href="#services" class="bg-white/20 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/30 transition-all duration-300 text-center">
                            <i class="fas fa-play mr-2"></i>
                            Nos Services
                        </a>
                    </div>
                </div>

                <!-- Visual Element -->
                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-8 shadow-2xl">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mb-6 mx-auto">
                                <i class="fas fa-truck-moving text-white text-3xl"></i>
                            </div>
                            <h3 class="text-white font-bold text-2xl mb-4">Suivi en Temps Réel</h3>
                            <p class="text-white/80 text-lg mb-6">
                                Localisez vos colis où qu'ils soient dans le monde
                            </p>
                            
                            <!-- Sample Tracking -->
                            <div class="bg-white/10 rounded-xl p-4 border border-white/20">
                                <div class="flex items-center justify-between text-sm text-white/90">
                                    <span class="font-mono">GP2025001234</span>
                                    <span class="bg-gray-500 px-3 py-1 rounded-full text-xs font-semibold">En Transit</span>
                                </div>
                                <div class="mt-2 text-white/70 text-sm">
                                    Dakar → Paris
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Nos Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Des solutions adaptées à tous vos besoins de transport et logistique
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Transport Maritime -->
                <div class="group bg-gradient-to-br from-blue-50 to-blue-100 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-blue-200">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-ship text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Transport Maritime</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Fret maritime économique pour vos gros volumes. Liaisons régulières vers l'Europe, l'Amérique et l'Asie.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Conteneurs 20' et 40'</span>
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Groupage possible</span>
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Assurance incluse</span>
                        </li>
                    </ul>
                </div>

                <!-- Transport Aérien -->
                <div class="group bg-gradient-to-br from-green-50 to-green-100 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-green-200">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-plane text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Transport Aérien</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Solutions express pour vos envois urgents. Livraison rapide dans le monde entier en 24-72h.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Express 24h</span>
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Suivi temps réel</span>
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Certificats export</span>
                        </li>
                    </ul>
                </div>

                <!-- Transport Routier -->
                <div class="group bg-gradient-to-br from-purple-50 to-purple-100 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-purple-200">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-truck text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Transport Routier</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Réseau routier étendu en Afrique de l'Ouest. Livraisons porte-à-porte fiables et sécurisées.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Porte-à-porte</span>
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Véhicules sécurisés</span>
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Tarifs compétitifs</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Logo et description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-600 to-lime-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-truck text-white text-xl"></i>
                        </div>
                        <span class="text-white font-bold text-2xl">MIKEY TOUR</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Votre partenaire de confiance pour tous vos besoins de transport et logistique. 
                        Solutions personnalisées et service de qualité depuis 2020.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-400 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-pink-600 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Services</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Transport Maritime</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Transport Aérien</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Transport Routier</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Logistique</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Entreposage</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-bold text-lg mb-4">Contact</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Dakar, Sénégal
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            +221 XX XXX XX XX
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            contact@mikeytour.sn
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Copyright -->
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 mb-4 md:mb-0">
                    &copy; 2025 MIKEY TOUR. Tous droits réservés.
                </p>
                <div class="flex space-x-6 text-gray-400">
                    <a href="#" class="hover:text-white transition-colors">Politique de confidentialité</a>
                    <a href="#" class="hover:text-white transition-colors">Conditions d'utilisation</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>