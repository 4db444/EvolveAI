<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth | Récupérer mon mot de passe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        :root { --primary: #8B5CF6; --secondary: #06B6D4; --bg-dark: #030712; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-dark); color: white; margin: 0; overflow: hidden; }
        
        .bg-animate { 
            background: linear-gradient(-45deg, #030712, #0f172a, #1e1b4b, #030712); 
            background-size: 400% 400%; 
            animation: gradientBG 15s ease infinite; 
        }
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
    </style>
</head>
<body class="bg-animate min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md relative">
        <!-- Effet de lumière décoratif -->
        <div class="absolute -top-20 -left-20 w-64 h-64 bg-purple-600/10 rounded-full blur-[100px]"></div>
        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-cyan-600/10 rounded-full blur-[100px]"></div>

        <!-- LOGO -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-black tracking-tighter gradient-text">AI.REVENUE</h1>
        </div>

        <!-- CARD -->
        <div id="recovery-card" class="glass p-8 md:p-10 rounded-[2.5rem] shadow-2xl relative z-10">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-tr from-purple-600/20 to-cyan-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/10">
                    <i class="fas fa-shield-alt text-2xl text-purple-400"></i>
                </div>
                <h2 class="text-2xl font-bold">Mot de passe oublié ?</h2>
                <p class="text-gray-400 text-sm mt-2">
                    Pas d'inquiétude. Entrez votre adresse email et notre système IA vous enverra un lien de réinitialisation sécurisé.
                </p>
            </div>

            <!-- FORMULAIRE -->
            <form action="<?= $_ENV["BASE_PATH"] ?>/restorepassword" method="POST" class="space-y-6">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1">Adresse Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" required
                            class="input-field w-full pl-11 pr-4 py-4 rounded-2xl text-white placeholder:text-gray-600"
                            placeholder="exemple@email.com">
                    </div>
                </div>

                <button type="submit" 
                    class="w-full py-4 bg-gradient-to-r from-purple-600 to-cyan-500 text-white rounded-2xl font-bold hover:opacity-90 transition transform hover:scale-[1.02] shadow-lg shadow-purple-500/25">
                    Envoyer le lien de récupération
                </button>
            </form>

            <div class="mt-8 text-center">
                <a href="<?= $_ENV["BASE_PATH"] ?>/auth/login" class="text-sm text-gray-400 hover:text-white transition flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2 text-xs"></i> Retour à la connexion
                </a>
            </div>
        </div>

        <!-- SUCCESS MESSAGE (Caché par défaut) -->
        <div id="success-message" class="hidden glass p-10 rounded-[2.5rem] text-center shadow-2xl relative z-10">
            <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6 border border-green-500/30">
                <i class="fas fa-paper-plane text-3xl text-green-400"></i>
            </div>
            <h2 class="text-2xl font-bold mb-2">Email envoyé !</h2>
            <p class="text-gray-400 text-sm mb-8 leading-relaxed">
                Si un compte est associé à <span id="display-email" class="text-white font-semibold"></span>, vous recevrez un lien de réinitialisation d'ici quelques instants.
            </p>
            <div class="space-y-4">
                <button onclick="location.reload()" class="w-full py-3 glass rounded-xl text-sm font-bold hover:bg-white/5 transition">
                    Renvoyer l'email
                </button>
                <a href="login.php" class="block text-sm text-purple-400 font-bold hover:text-purple-300 transition">
                    Retourner à la page de connexion
                </a>
            </div>
        </div>

        <!-- FOOTER -->
        <p class="text-center text-gray-600 text-[10px] mt-8 uppercase tracking-[0.2em]">
            Protection par cryptage de niveau militaire
        </p>
    </div>

    <!-- SCRIPT POUR SIMULER L'INTERACTION -->
    <script>
        const form = document.getElementById('recovery-form');
        const recoveryCard = document.getElementById('recovery-card');
        const successMessage = document.getElementById('success-message');
        const displayEmail = document.getElementById('display-email');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = document.getElementById('email').value;
            
            // On affiche l'email saisi dans le message de succès
            displayEmail.textContent = emailInput;

            // Animation simple pour simuler l'envoi
            recoveryCard.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                recoveryCard.style.display = 'none';
                successMessage.classList.remove('hidden');
                successMessage.classList.add('animate-fade-in');
            }, 300);
        });
    </script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.5s ease forwards; }
    </style>

</body>
</html>