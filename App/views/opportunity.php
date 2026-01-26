<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth | Opportunités</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

        /* Custom scrollbar for textareas */
        textarea::-webkit-scrollbar { width: 5px; }
        textarea::-webkit-scrollbar-thumb { background: #8B5CF6; border-radius: 10px; }
    </style>
</head>
<body class="bg-animate min-h-screen flex" x-data="{ openSuggest: false, showResults: <?= isset($opportunities_suggestions) ? 'true' : 'false' ?> }">

    <aside class="w-64 glass border-r border-white/10 hidden md:flex flex-col sticky top-0 h-screen">
        <div class="p-6">
            <h1 class="text-xl font-extrabold tracking-tighter gradient-text">AI.REVENUE</h1>
        </div>
        
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="<?= $_ENV["BASE_PATH"] ?>/dashboard" class="flex items-center space-x-3 p-3 rounded-lg active-link transition">
                <i class="fas fa-chart-line text-purple-400"></i>
                <span class="font-medium">Vue d'ensemble</span>
            </a>
            <a href="<?= $_ENV["BASE_PATH"] ?>/opportunity" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-robot"></i>
                <span>Opportunité IA</span>
            </a>
            <a href="<?= $_ENV["BASE_PATH"] ?>/profil" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-wallet"></i>
                <span>Profil</span>
            </a>
        </nav>

        <div class="p-6 border-t border-white/10">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-purple-600 to-cyan-400 flex items-center justify-center font-bold">
                    <?= strtoupper($user->getFullName()[0]) ?><?= strtolower($user->getFullName()[1]) ?>
                </div>
                <div>
                    <p class="text-sm font-bold"><?= $user->getFullName() ?></p>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 relative">
        
        <div class="absolute top-8 right-8 z-10">
            <button @click="openSuggest = true" class="glass px-4 py-2 rounded-full border border-purple-500/50 hover:bg-purple-500/20 transition flex items-center space-x-2">
                <i class="fas fa-lightbulb text-yellow-400"></i>
                <span class="text-sm font-semibold">Nouvelle Idée</span>
            </button>
        </div>

        <div class="p-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
                <div>
                    <h1 class="text-3xl font-bold italic">Opportunités <span class="gradient-text">Détectées</span></h1>
                    <p class="text-gray-400">L'IA a analysé les marchés pour vous. Voici les meilleures options actuelles.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if(isset($opportunities)): ?>                
                    <?php foreach($opportunities as $op):?>
                        <div class="glass p-6 rounded-3xl glass-hover flex flex-col">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-orange-500/20 rounded-2xl">
                                    <i class="fab fa-bitcoin text-orange-500 text-xl"></i>
                                </div>
                                <div class="badge-ai px-3 py-1 rounded-full text-[10px] font-bold text-cyan-400 tracking-widest uppercase">
                                    <?= $op->getStatus() ?>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-2"><?= $op->getTitle() ?></h3>
                            <p class="text-gray-400 text-sm mb-6 flex-1">
                                <?= $op->getDescription() ?>
                            </p>
                            <div class="grid mb-6">
                                <div class="bg-white/5 p-3 rounded-2xl text-center w-full">
                                    <p class="text-[10px] text-gray-500 uppercase font-bold">Profit Est.</p>
                                    <p class="text-green-400 font-bold capitalize"><?= $op->getEarning_estimate() ?></p>
                                </div>
                            </div>
                            <a href="<?= $_ENV["BASE_PATH"] ?>/opportunity/<?= $op->getId() ?>" class="text-center w-full py-3 bg-white text-black rounded-2xl font-bold hover:bg-purple-500 hover:text-white transition-all">
                                Details
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div x-show="openSuggest" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-md" style="display: none;">
            <div @click.away="openSuggest = false" class="glass w-full max-w-lg p-8 rounded-3xl border border-white/20">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold gradient-text">Qu'avez-vous en tête ?</h2>
                    <button @click="openSuggest = false" class="text-gray-400 hover:text-white text-xl">&times;</button>
                </div>
                <form action="<?= $_ENV["BASE_PATH"] ?>/suggestions" method="post" class="space-y-6">
                    <textarea 
                        name="user_interest" 
                        rows="4" 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-white focus:outline-none focus:border-purple-500 transition"
                        placeholder="Ex: Je m'intéresse à l'immobilier automatisé ou au trading haute fréquence..."></textarea>
                    <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-cyan-500 text-white font-bold py-4 rounded-2xl shadow-lg hover:shadow-purple-500/20 transition">
                        Générer des suggestions
                    </button>
                </form>
            </div>
        </div>

        <?php if (isset($opportunities_suggestions)): ?>
        <div x-show="showResults" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-xl">
            <div class="glass w-full max-w-2xl max-h-[80vh] overflow-y-auto p-8 rounded-3xl border border-cyan-500/30">
                <div class="flex justify-between items-center mb-8 border-b border-white/10 pb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Suggestions <span class="text-cyan-400">IA</span></h2>
                        <p class="text-gray-400 text-sm">Cliquez sur un titre pour voir les détails</p>
                    </div>
                    <button @click="showResults = false" class="text-gray-400 hover:text-white text-2xl">&times;</button>
                </div>
                
                <div class="space-y-4">
                    <?php foreach($opportunities_suggestions as $obj): ?>
                        <details class="group glass rounded-2xl border border-white/5 overflow-hidden">
                            <summary class="flex justify-between items-center p-5 cursor-pointer list-none hover:bg-white/5 transition">
                                <span class="font-semibold text-lg"><?= $obj->title ?></span>
                                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <div class="p-5 pt-0 text-gray-400 text-sm leading-relaxed">
                                <p class="mb-4"><?= $obj->description ?></p>
                                <form action="<?= $_ENV["BASE_PATH"] ?>/opportunity/commit" method="post">
                                    <input type="hidden" name="title" value="<?= $obj->title?>">
                                    <input type="hidden" name="description" value="<?= $obj->description ?>">
                                    <button type="submit" class="px-6 py-2 bg-green-600/20 text-green-400 border border-green-600/50 rounded-xl font-bold hover:bg-green-600 hover:text-white transition w-full md:w-auto">
                                        <i class="fas fa-check mr-2"></i> Accepter la stratégie
                                    </button>
                                </form>
                            </div>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </main>
</body>
</html>