<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth Accelerator | Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        :root { --primary: #8B5CF6; --bg-dark: #030712; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-dark); color: white; }
        .bg-animate { background: linear-gradient(-45deg, #030712, #1e1b4b, #1e1b4b, #030712); background-size: 400% 400%; animation: gradientBG 15s ease infinite; }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .gradient-text { background: linear-gradient(to right, #8B5CF6, #06B6D4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .step-content { display: none; animation: slideIn 0.4s ease-out forwards; }
        .step-content.active { display: block; }
        @keyframes slideIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
    </style>
</head>
<body class="bg-animate min-h-screen flex items-center justify-center p-4">
    <nav class="fixed top-0 w-full p-6 flex justify-between items-center">
        <a href="/landingpage" class="text-2xl font-extrabold gradient-text">AI.REVENUE</a>
        <a href="/auth/login" class="text-gray-400 hover:text-white transition">Déjà membre ?</a>
    </nav>

    <form action="/dashboard" method="POST" class="glass w-full max-w-lg p-8 rounded-3xl relative overflow-hidden">
        <div class="mb-8">
            <div class="flex justify-between mb-4">
                <span id="step-indicator" class="text-xs font-bold uppercase tracking-widest text-purple-400">Étape 1 sur 3</span>
                <div class="flex gap-2">
                    <div id="bar-1" class="w-8 h-1 bg-purple-600 rounded-full"></div>
                    <div id="bar-2" class="w-8 h-1 bg-white/10 rounded-full"></div>
                    <div id="bar-3" class="w-8 h-1 bg-white/10 rounded-full"></div>
                </div>
            </div>
        </div>


        <!-- Étape 0 : Informations de base -->
        <div id="step-0" class="step-content active">
            <h2 class="text-3xl font-bold mb-6">Créer un compte</h2>
            <div class="space-y-4">
                <input type="text" placeholder="Nom complet" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none focus:ring-2 ring-purple-500">
                <input type="email" placeholder="Email" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none focus:ring-2 ring-purple-500">
                <input type="password" placeholder="Mot de passe" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none focus:ring-2 ring-purple-500">
                <input type="password" placeholder="Confirmer le mot de passe" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl">
                <button type="button" onclick="nextStep(1)" class="w-full py-4 bg-purple-600 rounded-xl font-bold hover:bg-purple-700 transition mt-4">Continuer</button>
            </div>
        </div>

        <!-- Étape 1 : Questionnaire IA (Partie 1) -->
        <div id="step-1" class="step-content">
            <h2 class="text-2xl font-bold mb-6">Personnalisation IA (1/2)</h2>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Objectif mensuel (€) ?</label>
                    <input type="texte" placeholder="ex: texte" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Objectif mensuel (€) ?</label>
                    <input type="texte" placeholder="ex: texte" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Objectif mensuel (€) ?</label>
                    <input type="texte" placeholder="ex: texte" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none">
                </div>
                <div class="flex gap-4">
                    <button type="button" onclick="nextStep(0)" class="w-1/3 py-4 glass rounded-xl font-bold">Retour</button>
                    <button type="button" onclick="nextStep(2)" class="w-2/3 py-4 bg-purple-600 rounded-xl font-bold">Suivant</button>
                </div>
            </div>
        </div>

        <!-- Étape 2 : Questionnaire IA (Partie 2) -->
        <div id="step-2" class="step-content">
            <h2 class="text-2xl font-bold mb-6">Dernière étape (2/2)</h2>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Objectif mensuel (€) ?</label>
                    <input type="texte" placeholder="ex: texte" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Objectif mensuel (€) ?</label>
                    <input type="texte" placeholder="ex: texte" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Expérience en ligne ?</label>
                    <textarea placeholder="Décrivez brièvement..." class="w-full bg-white/5 border border-white/10 p-4 rounded-xl h-24 outline-none resize-none"></textarea>
                </div>
                <div class="flex gap-4">
                    <button type="button" onclick="nextStep(1)" class="w-1/3 py-4 glass rounded-xl font-bold">Retour</button>
                    <button type="submit" class="w-2/3 py-4 bg-cyan-500 rounded-xl font-bold hover:bg-cyan-600 transition text-black shadow-lg shadow-cyan-500/20">Finaliser</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function nextStep(step) {
            document.querySelectorAll('.step-content').forEach(s => s.classList.remove('active'));
            document.getElementById('step-' + step).classList.add('active');

            const indicator = document.getElementById('step-indicator');
            const bars = [document.getElementById('bar-1'), document.getElementById('bar-2'), document.getElementById('bar-3')];

            indicator.innerText = `Étape ${step + 1} sur 3`;
            
            bars.forEach((bar, index) => {
                if (index <= step) {
                    bar.classList.replace('bg-white/10', 'bg-purple-600');
                } else {
                    bar.classList.replace('bg-purple-600', 'bg-white/10');
                }
            });
        }

    </script>
</body>
</html>