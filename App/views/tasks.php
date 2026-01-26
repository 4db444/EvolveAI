<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth | Mission Detail</title>
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
        
        .task-card { transition: all 0.3s ease; border-left: 4px solid transparent; }
        .task-active { border-left-color: #8B5CF6; background: rgba(139, 92, 246, 0.05); }
        .task-done { border-left-color: #22c55e; opacity: 0.6; }
        
        .ai-pulse { position: relative; }
        .ai-pulse::after { content: ''; position: absolute; width: 10px; height: 10px; background: #06B6D4; border-radius: 50%; top: 0; right: -5px; box-shadow: 0 0 10px #06B6D4; animation: pulse 2s infinite; }
        @keyframes pulse { 0% { transform: scale(1); opacity: 1; } 100% { transform: scale(2.5); opacity: 0; } }
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
            <a href="<?= $_ENV["BASE_PATH"] ?>/opportunity" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-robot"></i>
                <span>Stratégies IA</span>
            </a>
            <a href="<?= $_ENV["BASE_PATH"] ?>/profil" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-wallet"></i>
                <span>Profil</span>
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
            <div class="flex items-center text-sm text-gray-400">
                <a href="#" class="hover:text-white transition">Opportunités</a>
                <i class="fas fa-chevron-right mx-3 text-[10px]"></i>
                <span class="text-white font-semibold">Détail du Plan</span>
            </div>
        </header>

        <div class="p-8 max-w-6xl mx-auto w-full">
            
            <!-- OPPORTUNITY HERO SECTION -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-400 text-xs font-bold rounded-lg uppercase tracking-widest"><?= $opportunity->getStatus() ?></span>
                    </div>
                    <h1 class="text-4xl font-black mb-4"><?= $opportunity->getTitle() ?></h1>
                    <p class="text-gray-400 text-lg">
                        <?= $opportunity->getDescription() ?>
                    </p>
                </div>
                <div class="glass p-6 rounded-[2rem] flex flex-col justify-center border-white/10 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-purple-600/10 rounded-full blur-2xl"></div>
                    <p class="text-gray-500 text-xs font-bold uppercase mb-1">Estimation Des Revenus</p>
                    <p class="text-3xl font-black text-green-400 mb-4"><?= $opportunity->getEarning_estimate() ?></span></p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                
                <!-- LEFT COLUMN: DAILY PLAN & TASKS (User Story D) -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold italic">Plan d'action <span class="text-purple-500">Quotidien</span></h3>
                    </div>

                    <?php foreach ($tasks as $index => $task): ?>

                        <?php if ($task->progress->isCompleted()): ?>
                            <!-- ✅ Completed Task -->
                            <div class="glass p-6 rounded-2xl task-card task-done flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 rounded-full bg-green-500/20 text-green-500 flex items-center justify-center">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold"><?= htmlspecialchars($task->getTitle()) ?></h4>
                                        <p class="text-xs text-gray-500"><?= htmlspecialchars($task->getDescription) ?></p>
                                    </div>
                                </div>
                                <span class="text-[10px] font-bold text-gray-500 uppercase">Terminé</span>
                            </div>

                        <?php elseif (!$currentTaskFound): ?>
                            <?php 
                                $currentTaskFound = true; 
                                $currentTaskIndex = $index
                            ?>

                            <div class="glass p-8 rounded-3xl task-card task-active relative border border-purple-500/20">
                                <div class="flex items-start space-x-4 mb-6">
                                    <div class="w-10 h-10 rounded-full bg-purple-600 text-white flex items-center justify-center font-bold shadow-lg shadow-purple-500/40">
                                        <?= $index + 1 ?>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex justify-between">
                                            <h4 class="font-bold text-lg"><?= htmlspecialchars($task->getTitle()) ?></h4>
                                            <span class="text-[10px] bg-purple-500/20 text-purple-400 px-2 py-1 rounded font-bold">
                                                En cours
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-400 mt-1"><?= htmlspecialchars($task->getDescription()) ?></p>
                                    </div>
                                </div>

                                <div class="bg-black/40 rounded-2xl p-6 border border-white/5 space-y-4">
                                <h5 class="text-xs font-bold text-gray-300 uppercase tracking-widest flex items-center">
                                    <i class="fas fa-terminal mr-2 text-cyan-400"></i>
                                    Console de Soumission IA
                                </h5>

                                <textarea
                                    class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-sm text-gray-300 focus:outline-none focus:border-cyan-500/50 transition h-32 font-mono"
                                    placeholder="Collez votre prompt ou le lien de votre projet ici..."
                                ></textarea>

                                <div class="flex justify-between items-center pt-2">
                                    <div class="text-[10px] text-gray-500">
                                    <i class="fas fa-shield-virus mr-1"></i>
                                    L'IA analysera la pertinence et le score SEO.
                                    </div>

                                    <button
                                    class="px-6 py-2 bg-gradient-to-r from-purple-600 to-cyan-500 text-white rounded-xl font-bold text-sm hover:scale-105 transition shadow-lg shadow-purple-500/20"
                                    >
                                    Soumettre pour Évaluation
                                    </button>
                                </div>
                                </div>

                            </div>

                        <?php else: ?>
                            <!-- 🔒 Upcoming Task -->
                            <div class="glass p-6 rounded-2xl task-card opacity-30 cursor-not-allowed">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 rounded-full bg-white/10 text-gray-500 flex items-center justify-center font-bold">
                                        <?= $index + 1 ?>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-500"><?= htmlspecialchars($task->getTitle()) ?></h4>
                                        <p class="text-xs text-gray-600 italic">
                                            Débloqué après validation de la tâche précédente.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>

                <!-- RIGHT COLUMN: SKILLS & RESOURCES & COMMUNITY (User Story E & F) -->
                <div class="space-y-8">
                    
                    <!-- SKILLS (User Story E) -->
                    <div class="glass p-6 rounded-[2rem]">
                        <h3 class="font-bold mb-4 flex items-center text-sm">
                            <i class="fas fa-brain mr-2 text-purple-400"></i> Skills ciblés
                        </h3>
                        <div class="space-y-4">
                            <?php foreach(array_unique(array_map(fn ($task) => $task->getTargetSkill(), $tasks)) as $skill): ?>
                                <div class="flex justify-between text-[10px] mb-1">
                                    <span class="text-gray-400 uppercase"><?= $skill ?></span>
                                </div>
                                <div>
                                    <div class="w-full bg-white/5 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-purple-500 h-full" style="width: 0%"></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- RESOURCES (User Story E) -->
                    <div class="glass p-6 rounded-[2rem]">
                        <h3 class="font-bold mb-4 flex items-center text-sm">
                            <i class="fas fa-lightbulb mr-2 text-yellow-400"></i> Ressources IA
                        </h3>
                        <div class="space-y-3">
                            <?php foreach($tasks[$currentTaskIndex]->resources as $res): ?>
                                <div class="p-3 bg-white/5 rounded-xl border border-white/5 hover:border-cyan-500/30 transition cursor-pointer group">
                                    <div class="flex justify-between items-start">
                                        <p class="text-xs font-bold group-hover:text-cyan-400"><?= $res["title"] ?></p>
                                        <a href="<?= $res["link"] ?>" target="_blank">
                                            <i class="fas fa-external-link-alt text-[10px] text-gray-600"></i>
                                        </a>
                                    </div>
                                    <p class="text-[10px] text-gray-500 mt-1">Lien externe • <?= $res["type"] ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>