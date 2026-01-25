<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth | Nouveau Mot de Passe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        :root { --primary: #8B5CF6; --secondary: #06B6D4; --bg-dark: #030712; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-dark); color: white; margin: 0; }
        
        .bg-animate { background: linear-gradient(-45deg, #030712, #0f172a, #1e1b4b, #030712); background-size: 400% 400%; animation: gradientBG 15s ease infinite; }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.1); }
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
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.2);
        }

        .requirement { font-size: 0.75rem; color: #6b7280; display: flex; items-center: center; gap: 0.5rem; transition: all 0.3s; }
        .requirement.met { color: #22c55e; }
        .requirement.met i { color: #22c55e; }
    </style>
</head>
<body class="bg-animate min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md relative">
        <!-- Effets de fond -->
        <div class="absolute -top-20 -left-20 w-64 h-64 bg-purple-600/10 rounded-full blur-[100px]"></div>
        
        <!-- LOGO -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-black tracking-tighter gradient-text">AI.REVENUE</h1>
        </div>

        <!-- CARD -->
        <div class="glass p-8 md:p-10 rounded-[2.5rem] shadow-2xl relative z-10">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold">Réinitialisation</h2>
                <p class="text-gray-400 text-sm mt-2">Choisissez un nouveau mot de passe robuste pour protéger vos revenus.</p>
            </div>

            <form action="#" method="POST" class="space-y-5">
                
                <!-- NOUVEAU MOT DE PASSE -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1">Nouveau mot de passe</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="password" required
                            class="input-field w-full pl-11 pr-4 py-4 rounded-2xl text-white placeholder:text-gray-600"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- CONFIRMATION -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1">Confirmer le mot de passe</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                            <i class="fas fa-shield-check"></i>
                        </span>
                        <input type="password" id="confirm_password" required
                            class="input-field w-full pl-11 pr-4 py-4 rounded-2xl text-white placeholder:text-gray-600"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- VALIDATION DE COMPLEXITÉ (User Story A.1) -->
                <div class="grid grid-cols-2 gap-2 bg-white/5 p-4 rounded-2xl">
                    <div id="req-length" class="requirement"><i class="fas fa-circle text-[6px]"></i> 8+ caractères</div>
                    <div id="req-upper" class="requirement"><i class="fas fa-circle text-[6px]"></i> Une majuscule</div>
                    <div id="req-number" class="requirement"><i class="fas fa-circle text-[6px]"></i> Un chiffre</div>
                    <div id="req-match" class="requirement"><i class="fas fa-circle text-[6px]"></i> Correspondance</div>
                </div>

                <button type="submit" 
                    class="w-full py-4 bg-gradient-to-r from-purple-600 to-cyan-500 text-white rounded-2xl font-bold hover:opacity-90 transition transform hover:scale-[1.02] shadow-lg shadow-purple-500/25 mt-4">
                    Mettre à jour le mot de passe
                </button>
            </form>
        </div>

        <p class="text-center text-gray-600 text-[10px] mt-8 uppercase tracking-[0.2em]">
            Votre sécurité est notre priorité IA
        </p>
    </div>

    <!-- SCRIPT DE VALIDATION EN TEMPS RÉEL -->
    <script>
        const password = document.getElementById('password');
        const confirm = document.getElementById('confirm_password');
        
        const reqs = {
            length: document.getElementById('req-length'),
            upper: document.getElementById('req-upper'),
            number: document.getElementById('req-number'),
            match: document.getElementById('req-match')
        };

        function validate() {
            const val = password.value;
            const confVal = confirm.value;

            // Longueur
            if(val.length >= 8) reqs.length.classList.add('met');
            else reqs.length.classList.remove('met');

            // Majuscule
            if(/[A-Z]/.test(val)) reqs.upper.classList.add('met');
            else reqs.upper.classList.remove('met');

            // Chiffre
            if(/[0-9]/.test(val)) reqs.number.classList.add('met');
            else reqs.number.classList.remove('met');

            // Match
            if(val === confVal && val !== "") reqs.match.classList.add('met');
            else reqs.match.classList.remove('met');
        }

        password.addEventListener('input', validate);
        confirm.addEventListener('input', validate);
    </script>

</body>
</html>