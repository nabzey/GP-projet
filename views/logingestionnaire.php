<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GP du Monde - Connexion Gestionnaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sage: {
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
                        },
                    },
                },
            },
        };
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    
</head>

<body class="h-full bg-gradient-to-br from-sage-600 via-sage-400 to-sage-700 overflow-hidden">
    
    <!-- Background animated elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute -top-4 -left-4 w-72 h-72 bg-green-300/30 rounded-full blur-3xl animate-pulse"
        ></div>
        <div
            class="absolute -bottom-8 -right-4 w-72 h-72 bg-lime-300/20 rounded-full blur-3xl animate-pulse"
        ></div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-emerald-300/25 rounded-full blur-3xl animate-pulse"
        ></div>
    </div>

    <div
        class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10"
    >
        <div class="max-w-md w-full space-y-8">
            <!-- Logo and title -->
            <div class="text-center">
                <div class="animate-bounce">
                    <div
                        class="mx-auto w-24 h-24 bg-white rounded-2xl shadow-2xl flex items-center justify-center mb-6"
                    >
                        <svg
                            class="w-12 h-12 text-sage-700"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"
                            />
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-white mb-2">MIKEY TOUR</h1>
                <p class="text-xl text-green-100">Gestion de Cargaisons</p>
                <p class="text-sm text-green-200 mt-2">Espace Gestionnaire</p>
            </div>

           
            <!-- Login form -->
            <div
                class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-8 shadow-2xl"
            >
                <form id="loginForm" class="space-y-6" method="POST">
                    <div>
                        <label
                            for="username"
                            class="block text-sm font-medium text-white mb-2"
                            >Email professionnel</label
                        >
                        <input
                            id="username"
                            name="username"
                            type="email"
                            required
                            placeholder="gestionnaire@gpdumonde.com"
                            class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-green-200 focus:ring-2 focus:ring-green-400 focus:border-transparent transition-all duration-200"
                        />
                    </div>

                    <div>
                        <label
                            for="password"
                            class="block text-sm font-medium text-white mb-2"
                            >Mot de passe</label
                        >
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            placeholder="••••••••"
                            class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-green-200 focus:ring-2 focus:ring-green-400 focus:border-transparent transition-all duration-200"
                        />
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input
                                id="remember"
                                name="remember"
                                type="checkbox"
                                class="h-4 w-4 text-sage-600 focus:ring-sage-500 border-gray-300 rounded"
                            />
                            <label
                                for="remember"
                                class="ml-2 block text-sm text-green-100"
                                >Se souvenir de moi</label
                            >
                        </div>
                        <a
                            href="#"
                            class="text-sm text-green-200 hover:text-white transition-colors"
                            >Mot de passe oublié ?</a
                        >
                    </div>

                    <!-- Message d'erreur/succès -->
                    <div id="message" class="text-center font-medium"></div>

                    <button
                        type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-xl text-sage-800 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:scale-105 shadow-xl"
                    >
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg
                                class="h-5 w-5 text-sage-600 group-hover:text-sage-500"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </span>
                        Se connecter
                    </button>
                </form>
            </div>
            <div class="text-center">
                <p class="text-green-200 text-sm">
                    © 2025 M du Monde. Transport de colis mondial.
                </p>
            </div>
        </div>
    </div>
        <script type="module"  src="/dist/login.js"></script>

        

</body>
</html>