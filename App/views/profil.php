<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth | Mon Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        :root { --primary: #8B5CF6; --secondary: #06B6D4; --bg-dark: #030712; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-dark); color: white; margin: 0; }
        
        .bg-animate { background: linear-gradient(-45deg, #030712, #0f172a, #1e1b4b, #030712); background-size: 400% 400%; animation: gradientBG 15s ease infinite; }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .gradient-text { background: linear-gradient(to right, #8B5CF6, #06B6D4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        
        .input-field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .input-field:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #8B5CF6;
            outline: none;
            box-shadow: 0 0 15px rgba(139, 92, 246, 0.2);
        }
        .sidebar-link:hover { background: linear-gradient(to right, rgba(139, 92, 246, 0.1), transparent); border-left: 4px solid #8B5CF6; }
    </style>
</head>
<body class="bg-animate min-h-screen flex">

    <!-- SIDEBAR (Identique au Dashboard) -->
    <aside class="w-64 glass border-r border-white/10 hidden md:flex flex-col sticky top-0 h-screen">
        <div class="p-6">
            <h1 class="text-xl font-extrabold tracking-tighter gradient-text">AI.REVENUE</h1>
        </div>
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-400 sidebar-link transition">
                <i class="fas fa-chart-line"></i>
                <span>Vue d'ensemble</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-400 sidebar-link transition">
                <i class="fas fa-robot"></i>
                <span>Stratégies IA</span>
            </a>
            <div class="pt-10 pb-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Configuration</div>
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg bg-white/5 border-l-4 border-purple-500 transition">
                <i class="fas fa-user-circle text-purple-400"></i>
                <span class="font-medium text-white">Mon Profil</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg text-gray-400 sidebar-link transition">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </nav>
        <div class="p-6 border-t border-white/10">
            <button class="flex items-center space-x-3 text-red-400 hover:text-red-300 transition">
                <i class="fas fa-sign-out-alt"></i>
                <span class="font-medium">Déconnexion</span>
            </button>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col min-w-0">
        <!-- TOPBAR -->
        <header class="h-16 flex items-center justify-between px-8 border-b border-white/5 bg-black/20 backdrop-blur-md">
            <h2 class="text-lg font-semibold text-gray-300">Paramètres / <span class="text-white">Profil</span></h2>
        </header>

        <div class="p-8 max-w-4xl mx-auto w-full">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Mon <span class="gradient-text">Profil</span></h1>
                <p class="text-gray-400">Gérez vos informations personnelles et la sécurité de votre compte.</p>
            </div>

            <div class="grid grid-cols-1 gap-8">
                
                <!-- SECTION PHOTO / ENTÊTE -->
                <div class="glass p-8 rounded-3xl flex flex-col md:flex-row items-center gap-6">
                    <div class="relative group">
                        <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-purple-600 to-cyan-400 flex items-center justify-center text-3xl font-bold border-4 border-white/10">
                            JD
                        </div>
                        <button class="absolute bottom-0 right-0 bg-purple-600 p-2 rounded-full text-xs border-2 border-bg-dark hover:bg-purple-500 transition">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    <div class="text-center md:text-left">
                        <h2 class="text-xl font-bold text-white">Jean Dupont</h2>
                        <p class="text-gray-400 text-sm">Membre depuis Janvier 2024</p>
                        <span class="inline-block mt-2 px-3 py-1 bg-purple-500/20 text-purple-400 text-xs font-bold rounded-full uppercase">Plan Premium</span>
                    </div>
                </div>

                <!-- FORMULAIRE DE MODIFICATION -->
                <form action="#" method="POST" class="glass p-8 rounded-3xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Nom Complet -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-400 ml-1">Nom complet</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" name="name" value="Jean Dupont" 
                                    class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-white">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-400 ml-1">Adresse Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="email" value="jean.dupont@example.com" 
                                    class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-white">
                            </div>
                        </div>

                        <div class="md:col-span-2 my-4 border-t border-white/5"></div>

                        <!-- Mot de passe -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-400 ml-1">Nouveau mot de passe</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" placeholder="••••••••" 
                                    class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-white">
                            </div>
                        </div>

                        <!-- Confirmation Mot de passe -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-400 ml-1">Confirmer le mot de passe</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                    <i class="fas fa-shield-alt"></i>
                                </span>
                                <input type="password" name="password_confirmation" placeholder="••••••••" 
                                    class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-white">
                            </div>
                        </div>
                    </div>

                    <!-- BOUTONS D'ACTION -->
                    <div class="mt-10 flex flex-col md:flex-row gap-4 items-center justify-between border-t border-white/5 pt-8">
                        <p class="text-xs text-gray-500 max-w-xs text-center md:text-left">
                            <i class="fas fa-info-circle mr-1"></i> 
                            Laissez les champs de mot de passe vides si vous ne souhaitez pas les modifier.
                        </p>
                        <div class="flex gap-4">
                            <button type="button" class="px-8 py-3 glass rounded-xl font-semibold hover:bg-white/5 transition border border-white/10">
                                Annuler
                            </button>
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-purple-600 to-cyan-500 text-white rounded-xl font-bold hover:opacity-90 transition transform hover:scale-[1.02] shadow-lg shadow-purple-500/20">
                                Sauvegarder les modifications
                            </button>
                        </div>
                    </div>
                </form>

                <!-- ZONE DE DANGER -->
                <div class="glass border-red-500/20 p-8 rounded-3xl">
                    <h3 class="text-red-400 font-bold flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i> Zone de danger
                    </h3>
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-sm text-gray-400 text-center md:text-left">
                            Une fois votre compte supprimé, toutes vos données et vos revenus générés par l'IA seront définitivement effacés.
                        </p>
                        <button class="px-6 py-2 border border-red-500/50 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition text-sm font-bold">
                            Supprimer le compte
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>