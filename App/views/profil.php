<?php

use App\Services\UserProfileService;
use App\Repositories\UserProfileRepository;
use App\Core\Database;

session_start();
$user = $_SESSION['user'];
?>
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
        
        select option { background-color: #0f172a; color: white; }
    </style>
</head>
<body class="bg-animate min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 glass border-r border-white/10 hidden md:flex flex-col sticky top-0 h-screen">
        <div class="p-6">
            <h1 class="text-xl font-extrabold tracking-tighter gradient-text">AI.REVENUE</h1>
        </div>
        
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="<?= $_ENV["BASE_PATH"] ?>/dashboard" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/5 transition">
                <i class="fas fa-chart-line text-purple-400"></i>
                <span class="font-medium">Vue d'ensemble</span>
            </a>
            <a href="<?= $_ENV["BASE_PATH"] ?>/oportunity" class="flex items-center space-x-3 p-3 rounded-lg sidebar-link transition text-gray-400 hover:text-white">
                <i class="fas fa-robot"></i>
                <span>Stratégies IA</span>
            </a>
            <a href="<?= $_ENV["BASE_PATH"] ?>/profil" class="flex items-center space-x-3 p-3 rounded-lg bg-white/5 border-l-4 border-purple-500 transition text-white">
                <i class="fas fa-user-circle"></i>
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
                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-purple-600 to-cyan-400 flex items-center justify-center font-bold text-black">
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
            <h2 class="text-lg font-semibold text-gray-300">Paramètres / <span class="text-white">Profil</span></h2>
        </header>

        <div class="p-8 max-w-4xl mx-auto w-full space-y-8">
            <div class="mb-4">
                <h1 class="text-3xl font-bold">Mon <span class="gradient-text">Profil</span></h1>
                <p class="text-gray-400">Gérez vos informations personnelles et vos préférences IA.</p>
            </div>

            <!-- SECTION PHOTO / ENTÊTE -->
            <div class="glass p-8 rounded-3xl flex flex-col md:flex-row items-center gap-6">
                <div class="relative group">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-purple-600 to-cyan-400 flex items-center justify-center text-3xl font-bold border-4 border-white/10 text-black">
                        <?php 
                            $fullname = $user->getFullName();
                            echo substr($fullname, 0, 2);
                        ?>
                    </div>
                    <button class="absolute bottom-0 right-0 bg-purple-600 p-2 rounded-full text-xs border-2 border-[#030712] hover:bg-purple-500 transition">
                        <i class="fas fa-camera"></i>
                    </button>
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-xl font-bold text-white"><?= $user->getFullName() ?></h2>
                    <p class="text-gray-400 text-sm">Membre depuis Janvier 2024</p>
                    <span class="inline-block mt-2 px-3 py-1 bg-purple-500/20 text-purple-400 text-xs font-bold rounded-full uppercase">Plan Premium</span>
                </div>
            </div>

            <?php 

                $userprofilerepo = new UserProfileRepository(Database::get_instance());
                $userprofile = new UserProfileService($userprofilerepo);
                $userprofile->findByUserId($_SESSION["id"]);
            ?>

            <!-- FORMULAIRE INFORMATIONS DE BASE -->
            <form action="#" method="POST" class="glass p-8 rounded-3xl">
                <h3 class="text-xl font-bold mb-6 italic border-b border-white/10 pb-2">Informations de compte</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Nom complet</label>
                        <input type="text" name="name" value="<?= $user->getFullName() ?>" class="input-field w-full px-4 py-3 rounded-xl text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Adresse Email</label>
                        <input type="email" name="email" value="<?= $user->getEmail() ?>" class="input-field w-full px-4 py-3 rounded-xl text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Nouveau mot de passe</label>
                        <input type="password" name="password" placeholder="••••••••" class="input-field w-full px-4 py-3 rounded-xl text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" class="input-field w-full px-4 py-3 rounded-xl text-white">
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-8 py-3 bg-purple-600 text-white rounded-xl font-bold hover:bg-purple-700 transition transform hover:scale-105">
                        Mettre à jour le compte
                    </button>
                </div>
            </form>

            <!-- FORMULAIRE QUESTIONNAIRE IA (LES 6 QUESTIONS) -->
            <form action="#" method="POST" class="glass p-8 rounded-3xl">
                <h3 class="text-xl font-bold mb-6 italic border-b border-white/10 pb-2">Personnalisation & Objectifs IA</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- 1. Âge -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Quel est votre âge ?</label>
                        <select name="age_interval" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none" required>
                            <option value="" disabled selected>Sélectionnez votre tranche d'âge</option>
                            <option>18-24</option>
                            <option>25-34</option>
                            <option>35-44</option>
                            <option>45+</option>
                        </select>
                    </div>

                    <!-- 2. Rythme de travail -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Rythme de travail actuel</label>
                        <select name="work_rhythm" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none" required>
                            <option value="" disabled selected>Sélectionnez une option</option>
                            <option value="Horaire classique (9h–17h)">💼 Horaire classique (9h–17h)</option>
                            <option value="Travail de nuit">🌙 Travail de nuit</option>
                            <option value="Horaires flexibles">🌀 Horaires flexibles</option>
                            <option value="Je suis à la retraite">🧶 Je suis à la retraite</option>
                        </select>
                    </div>

                    <!-- 3. Heures de travail souhaitées -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Heures de travail / jour souhaitées</label>
                        <select name="work_hours" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none" required>
                            <option value="" disabled selected>Sélectionnez une option</option>
                            <option>Moins de 4 heures</option>
                            <option>4 à 6 heures</option>
                            <option>6 à 8 heures</option>
                            <option>Plus de 8 heures</option>
                        </select>
                    </div>

                    <!-- 4. Situation financière -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Situation financière actuelle</label>
                        <select name="financial_situation" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none" required>
                            <option value="" disabled selected>Sélectionnez une option</option>
                            <option value="Je suis financièrement stable">😌 Je suis financièrement stable</option>
                            <option value="Je m en sors, mais c est serré">🤕 Je m'en sors, mais c'est serré</option>
                            <option value="J ai du mal à suivre">😐 J'ai du mal à suivre</option>
                        </select>
                    </div>

                    <!-- 5. Appareil -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Appareil utilisé pour apprendre</label>
                        <select name="device" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none" required>
                            <option value="" disabled selected>Sélectionnez une option</option>
                            <option>Téléphone</option>
                            <option>Ordinateur</option>
                            <option>Tablette</option>
                            <option>Plusieurs appareils</option>
                        </select>
                    </div>

                    <!-- 6. Format de leçon -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-400 ml-1">Format de leçon préféré</label>
                        <select name="lesson_format" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none" required>
                            <option value="" disabled selected>Sélectionnez une option</option>
                            <option>Texte</option>
                            <option>Vidéo</option>
                            <option>Leçons interactives</option>
                            <option>Peu importe</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 p-4 bg-purple-500/10 border border-purple-500/20 rounded-xl mb-6">
                    <p class="text-xs text-purple-300">
                        <i class="fas fa-robot mr-2"></i> L'IA réévaluera dynamiquement votre plan quotidien après la mise à jour de ces préférences.
                    </p>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-8 py-3 bg-cyan-500 text-black font-bold rounded-xl hover:bg-cyan-400 transition transform hover:scale-105 shadow-lg shadow-cyan-500/20">
                        Mettre à jour mes préférences IA
                    </button>
                </div>
            </form>

          

        </div>
    </main>

</body>
</html>