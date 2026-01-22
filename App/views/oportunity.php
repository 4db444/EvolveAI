<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth | Opportunités</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        :root { --primary: #8B5CF6; --secondary: #06B6D4; --bg-dark: #030712; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-dark); color: white; margin: 0; }
        
        .bg-animate { background: linear-gradient(-45deg, #030712, #0f172a, #1e1b4b, #030712); background-size: 400% 400%; animation: gradientBG 15s ease infinite; }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .glass-hover { transition: all 0.3s ease; }
        .glass-hover:hover { background: rgba(255, 255, 255, 0.07); transform: translateY(-5px); border-color: rgba(139, 92, 246, 0.5); }
        
        .gradient-text { background: linear-gradient(to right, #8B5CF6, #06B6D4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .sidebar-link:hover { background: linear-gradient(to right, rgba(139, 92, 246, 0.1), transparent); border-left: 4px solid #8B5CF6; }
        
        .badge-ai { background: linear-gradient(90deg, rgba(139, 92, 246, 0.2), rgba(6, 182, 212, 0.2)); border: 1px solid rgba(139, 92, 246, 0.3); }
    </style>
</head>
<body class="bg-animate min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 glass border-r border-white/10 hidden md:flex flex-col sticky top-0 h-screen">
        <div class="p-6">
            <h1 class="text-xl font-extrabold tracking-tighter gradient-text">AI.REVENUE</h1>
        </div>
        
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="<?= $_ENV["BASE_PATH"] ?>/dashboard" class="flex items-center space-x-3 p-3 rounded-lg active-link transition">
                <i class="fas fa-chart-line text-purple-400"></i>
                <span class="font-medium">Vue d'ensemble</span>
            </a>
            <a href="<?= $_ENV["BASE_PATH"] ?>/oportunity" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-robot"></i>
                <span>Stratégies IA</span>
            </a>
            <a href="<?= $_ENV["BASE_PATH"] ?>/profil" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-wallet"></i>
                <span>Profil</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-history"></i>
                <span>Historique</span>
            </a>
            <div class="pt-10 pb-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Configuration</div>
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </nav>

        <div class="p-6 border-t border-white/10">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-purple-600 to-cyan-400 flex items-center justify-center font-bold">
                    JD
                </div>
                <div>
                    <p class="text-sm font-bold">Jean Dupont</p>
                    <p class="text-xs text-gray-400">Plan Pro</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col min-w-0">
        <!-- TOPBAR -->
        <header class="h-16 flex items-center justify-between px-8 border-b border-white/5 bg-black/20 backdrop-blur-md">
            <div class="flex items-center space-x-4">
                <span class="text-gray-400">Scan IA en cours...</span>
                <div class="flex space-x-1">
                    <div class="w-1 h-4 bg-purple-500 animate-bounce"></div>
                    <div class="w-1 h-4 bg-cyan-500 animate-bounce" style="animation-delay: 0.2s"></div>
                    <div class="w-1 h-4 bg-purple-500 animate-bounce" style="animation-delay: 0.4s"></div>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="glass px-4 py-1.5 rounded-full text-sm font-bold border-purple-500/30">
                    <span class="text-purple-400">Score IA Global: 98/100</span>
                </div>
            </div>
        </header>

        <div class="p-8">
            <!-- HEADER SECTION -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
                <div>
                    <h1 class="text-3xl font-bold italic">Opportunités <span class="gradient-text">Détectées</span></h1>
                    <p class="text-gray-400">L'IA a analysé les marchés pour vous. Voici les meilleures options actuelles.</p>
                </div>
                <!-- FILTERS -->
                <div class="flex bg-white/5 p-1 rounded-xl border border-white/10">
                    <button class="px-4 py-2 rounded-lg bg-purple-600 text-sm font-bold">Tout</button>
                    <button class="px-4 py-2 rounded-lg hover:bg-white/5 text-sm text-gray-400 transition">Crypto</button>
                    <button class="px-4 py-2 rounded-lg hover:bg-white/5 text-sm text-gray-400 transition">Affiliation</button>
                    <button class="px-4 py-2 rounded-lg hover:bg-white/5 text-sm text-gray-400 transition">E-commerce</button>
                </div>
            </div>

            <!-- OPPORTUNITIES GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- OPPORTUNITY CARD 1 -->
                <div class="glass p-6 rounded-3xl glass-hover flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-orange-500/20 rounded-2xl">
                            <i class="fab fa-bitcoin text-orange-500 text-xl"></i>
                        </div>
                        <div class="badge-ai px-3 py-1 rounded-full text-[10px] font-bold text-cyan-400 tracking-widest uppercase">
                            Confiance 94%
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Arbitrage Flash BTC/USDT</h3>
                    <p class="text-gray-400 text-sm mb-6 flex-1">
                        Détection d'un écart de prix entre Binance et Kraken. Exécution automatisée recommandée pour capturer la marge.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white/5 p-3 rounded-2xl text-center">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">Profit Est.</p>
                            <p class="text-green-400 font-bold">+240€</p>
                        </div>
                        <div class="bg-white/5 p-3 rounded-2xl text-center">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">Risque</p>
                            <p class="text-yellow-500 font-bold">Faible</p>
                        </div>
                    </div>
                    <a href="<?= $_ENV["BASE_PATH"] ?>/tasks" class="w-full py-3 bg-white text-black rounded-2xl font-bold hover:bg-purple-500 hover:text-white transition-all">
                        Lancer l'automatisation
                    </a>
                </div>

                <!-- OPPORTUNITY CARD 2 -->
                <div class="glass p-6 rounded-3xl glass-hover flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-blue-500/20 rounded-2xl">
                            <i class="fas fa-shopping-cart text-blue-500 text-xl"></i>
                        </div>
                        <div class="badge-ai px-3 py-1 rounded-full text-[10px] font-bold text-cyan-400 tracking-widest uppercase">
                            Confiance 88%
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">High-Ticket Affiliate</h3>
                    <p class="text-gray-400 text-sm mb-6 flex-1">
                        Logiciel SaaS IA en pleine explosion. Campagne publicitaire TikTok prête à être déployée avec un ROAS estimé de 3.5.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white/5 p-3 rounded-2xl text-center">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">Profit Est.</p>
                            <p class="text-green-400 font-bold">+1,200€/m</p>
                        </div>
                        <div class="bg-white/5 p-3 rounded-2xl text-center">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">Difficulté</p>
                            <p class="text-blue-400 font-bold">Moyen</p>
                        </div>
                    </div>
                    <button class="w-full py-3 glass border-white/20 text-white rounded-2xl font-bold hover:bg-white/10 transition-all">
                        Voir le plan d'action
                    </button>
                </div>

                <!-- OPPORTUNITY CARD 3 -->
                <div class="glass p-6 rounded-3xl glass-hover flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-purple-500/20 rounded-2xl">
                            <i class="fas fa-palette text-purple-500 text-xl"></i>
                        </div>
                        <div class="badge-ai px-3 py-1 rounded-full text-[10px] font-bold text-cyan-400 tracking-widest uppercase">
                            Confiance 76%
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Niche Print-on-Demand IA</h3>
                    <p class="text-gray-400 text-sm mb-6 flex-1">
                        Analyse des tendances Etsy : Les designs générés par IA sur le thème "Cyberpunk Pet Portait" sont en rupture de stock.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-white/5 p-3 rounded-2xl text-center">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">Profit Est.</p>
                            <p class="text-green-400 font-bold">+450€</p>
                        </div>
                        <div class="bg-white/5 p-3 rounded-2xl text-center">
                            <p class="text-[10px] text-gray-500 uppercase font-bold">Setup</p>
                            <p class="text-purple-400 font-bold">15 min</p>
                        </div>
                    </div>
                    <button class="w-full py-3 glass border-white/20 text-white rounded-2xl font-bold hover:bg-white/10 transition-all">
                        Générer les Designs
                    </button>
                </div>

                <!-- OPPORTUNITY CARD 4 (Verrouillée / Pro) -->
                <div class="glass p-6 rounded-3xl relative overflow-hidden group">
                    <!-- Overlay Flou pour opportunité verrouillée -->
                    <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px] z-10 flex flex-col items-center justify-center p-6 text-center">
                        <i class="fas fa-lock text-3xl mb-3 text-purple-500"></i>
                        <h4 class="text-lg font-bold">Opportunité Exclusive</h4>
                        <p class="text-xs text-gray-300 mb-4">Passez au plan Whale pour débloquer les signaux institutionnels.</p>
                        <button class="px-6 py-2 bg-gradient-to-r from-purple-600 to-cyan-500 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">Upgrade</button>
                    </div>
                    
                    <div class="opacity-30">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-green-500/20 rounded-2xl">
                                <i class="fas fa-university text-green-500 text-xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Private Equity Deal</h3>
                        <p class="text-gray-400 text-sm mb-6">Investissement en pré-vente sur un projet de santé assistée par IA.</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/5 p-3 rounded-2xl text-center"><p class="text-green-400 font-bold">+5,000€</p></div>
                            <div class="bg-white/5 p-3 rounded-2xl text-center"><p class="text-red-500 font-bold">Élevé</p></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>