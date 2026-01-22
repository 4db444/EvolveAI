<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        :root { --primary: #8B5CF6; --secondary: #06B6D4; --bg-dark: #030712; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-dark); color: white; margin: 0; }
        
        .bg-animate { background: linear-gradient(-45deg, #030712, #0f172a, #1e1b4b, #030712); background-size: 400% 400%; animation: gradientBG 15s ease infinite; }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .glass-hover:hover { background: rgba(255, 255, 255, 0.07); border: 1px solid rgba(139, 92, 246, 0.3); transition: all 0.3s ease; }
        
        .gradient-text { background: linear-gradient(to right, #8B5CF6, #06B6D4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .sidebar-link:hover { background: linear-gradient(to right, rgba(139, 92, 246, 0.1), transparent); border-left: 4px solid #8B5CF6; }
        .active-link { background: linear-gradient(to right, rgba(139, 92, 246, 0.2), transparent); border-left: 4px solid #8B5CF6; }
    </style>
</head>
<body class="bg-animate min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 glass border-r border-white/10 hidden md:flex flex-col sticky top-0 h-screen">
        <div class="p-6">
            <h1 class="text-xl font-extrabold tracking-tighter gradient-text">AI.REVENUE</h1>
        </div>
        
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg active-link transition">
                <i class="fas fa-chart-line text-purple-400"></i>
                <span class="font-medium">Vue d'ensemble</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-robot"></i>
                <span>Stratégies IA</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-wallet"></i>
                <span>Portefeuille</span>
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
    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- TOPBAR -->
        <header class="h-16 flex items-center justify-between px-8 border-b border-white/5 bg-black/20 backdrop-blur-md">
            <h2 class="text-lg font-semibold">Tableau de Bord</h2>
            <div class="flex items-center space-x-6">
                <button class="relative text-gray-400 hover:text-white">
                    <i class="fas fa-bell"></i>
                    <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="h-8 w-[1px] bg-white/10"></div>
                <button class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg text-sm font-semibold transition">
                    <i class="fas fa-plus mr-2"></i> Nouveau Plan
                </button>
            </div>
        </header>

        <!-- DASHBOARD CONTENT -->
        <div class="p-8 overflow-y-auto">
            <!-- WELCOME -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold">Ravi de vous revoir, <span class="gradient-text">Jean</span> 👋</h1>
                <p class="text-gray-400">Voici l'analyse de vos revenus générés par l'IA aujourd'hui.</p>
            </div>

            <!-- STATS CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="glass p-6 rounded-2xl glass-hover">
                    <p class="text-gray-400 text-sm">Solde Total</p>
                    <h3 class="text-2xl font-bold mt-1">12 450,20 €</h3>
                    <p class="text-green-400 text-xs mt-2"><i class="fas fa-arrow-up"></i> +12.5% ce mois</p>
                </div>
                <div class="glass p-6 rounded-2xl glass-hover">
                    <p class="text-gray-400 text-sm">Revenus IA (24h)</p>
                    <h3 class="text-2xl font-bold mt-1">142,05 €</h3>
                    <p class="text-cyan-400 text-xs mt-2"><i class="fas fa-robot"></i> 4 agents actifs</p>
                </div>
                <div class="glass p-6 rounded-2xl glass-hover">
                    <p class="text-gray-400 text-sm">Taux de Succès</p>
                    <h3 class="text-2xl font-bold mt-1">94.2%</h3>
                    <div class="w-full bg-white/10 h-1.5 rounded-full mt-3">
                        <div class="bg-gradient-to-right from-purple-500 to-cyan-400 h-1.5 rounded-full" style="width: 94%"></div>
                    </div>
                </div>
                <div class="glass p-6 rounded-2xl glass-hover">
                    <p class="text-gray-400 text-sm">Temps Gagné</p>
                    <h3 class="text-2xl font-bold mt-1">184h</h3>
                    <p class="text-purple-400 text-xs mt-2">Automatisation active</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- CHART PLACEHOLDER (Main) -->
                <div class="lg:col-span-2 glass p-6 rounded-3xl relative overflow-hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-xl text-white">Performance des Stratégies</h3>
                        <select class="bg-white/5 border border-white/10 rounded-md px-3 py-1 text-sm outline-none">
                            <option>7 derniers jours</option>
                            <option>30 derniers jours</option>
                        </select>
                    </div>
                    <!-- Placeholder pour un graphique -->
                    <div class="h-64 w-full flex items-end justify-between space-x-2 px-2">
                        <div class="bg-purple-500/20 w-full rounded-t-lg hover:bg-purple-500/40 transition-all cursor-pointer" style="height: 40%"></div>
                        <div class="bg-purple-500/20 w-full rounded-t-lg hover:bg-purple-500/40 transition-all cursor-pointer" style="height: 60%"></div>
                        <div class="bg-purple-500/20 w-full rounded-t-lg hover:bg-purple-500/40 transition-all cursor-pointer" style="height: 50%"></div>
                        <div class="bg-purple-500/20 w-full rounded-t-lg hover:bg-purple-500/40 transition-all cursor-pointer" style="height: 85%"></div>
                        <div class="bg-purple-500/40 w-full rounded-t-lg hover:bg-purple-500/60 transition-all cursor-pointer border-t-2 border-purple-400" style="height: 95%"></div>
                        <div class="bg-purple-500/20 w-full rounded-t-lg hover:bg-purple-500/40 transition-all cursor-pointer" style="height: 70%"></div>
                        <div class="bg-purple-500/20 w-full rounded-t-lg hover:bg-purple-500/40 transition-all cursor-pointer" style="height: 80%"></div>
                    </div>
                    <div class="flex justify-between mt-4 text-gray-500 text-xs">
                        <span>LUN</span><span>MAR</span><span>MER</span><span>JEU</span><span class="text-purple-400 font-bold">VEN</span><span>SAM</span><span>DIM</span>
                    </div>
                </div>

                <!-- RIGHT SIDE: AI RECOMMENDATIONS -->
                <div class="glass p-6 rounded-3xl">
                    <h3 class="font-bold text-xl mb-6 flex items-center">
                        <i class="fas fa-bolt text-yellow-400 mr-2"></i> Actions IA
                    </h3>
                    <div class="space-y-4">
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5 hover:border-purple-500/50 transition cursor-pointer">
                            <p class="text-xs text-purple-400 font-bold mb-1 uppercase tracking-wider">Opportunité</p>
                            <p class="text-sm font-medium">Arbitrage Crypto détecté sur la paire BTC/USDT (+2.4%)</p>
                            <button class="mt-3 text-xs bg-white text-black px-3 py-1.5 rounded-full font-bold">Exécuter</button>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5 hover:border-cyan-500/50 transition cursor-pointer">
                            <p class="text-xs text-cyan-400 font-bold mb-1 uppercase tracking-wider">Optimisation</p>
                            <p class="text-sm font-medium">Réduire les coûts publicitaires de la campagne #4</p>
                            <button class="mt-3 text-xs glass border-white/20 px-3 py-1.5 rounded-full font-bold">Détails</button>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5 opacity-60">
                            <p class="text-xs text-gray-400 font-bold mb-1 uppercase tracking-wider">Planifié</p>
                            <p class="text-sm font-medium">Génération du rapport hebdomadaire automatisé</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RECENT TRANSACTIONS -->
            <div class="mt-8 glass rounded-3xl overflow-hidden">
                <div class="p-6 border-b border-white/5">
                    <h3 class="font-bold text-xl text-white">Activités Récentes</h3>
                </div>
                <table class="w-full text-left">
                    <thead class="bg-white/5 text-gray-400 text-sm uppercase">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Source / Stratégie</th>
                            <th class="px-6 py-4 font-semibold">Statut</th>
                            <th class="px-6 py-4 font-semibold">Date</th>
                            <th class="px-6 py-4 font-semibold text-right">Montant</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4 flex items-center">
                                <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center mr-3">
                                    <i class="fab fa-amazon text-blue-400"></i>
                                </div>
                                <span>Affiliation Amazon AI</span>
                            </td>
                            <td class="px-6 py-4"><span class="px-2 py-1 rounded-full bg-green-500/20 text-green-400 text-xs font-bold">Complété</span></td>
                            <td class="px-6 py-4 text-gray-400 text-sm">Il y a 2h</td>
                            <td class="px-6 py-4 text-right font-bold text-green-400">+ 45,00 €</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition">
                            <td class="px-6 py-4 flex items-center">
                                <div class="w-8 h-8 rounded-lg bg-yellow-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-coins text-yellow-400"></i>
                                </div>
                                <span>Copy Trading Bot v2</span>
                            </td>
                            <td class="px-6 py-4"><span class="px-2 py-1 rounded-full bg-blue-500/20 text-blue-400 text-xs font-bold">En cours</span></td>
                            <td class="px-6 py-4 text-gray-400 text-sm">Il y a 5h</td>
                            <td class="px-6 py-4 text-right font-bold">+ 12,80 €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>