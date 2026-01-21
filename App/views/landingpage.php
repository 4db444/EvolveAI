<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth Accelerator | Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        :root { --primary: #8B5CF6; --secondary: #06B6D4; --bg-dark: #030712; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-dark); color: white; overflow-x: hidden; }
        .bg-animate { background: linear-gradient(-45deg, #030712, #1e1b4b, #1e1b4b, #030712); background-size: 400% 400%; animation: gradientBG 15s ease infinite; }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        @keyframes float { 0% { transform: translateY(0px) rotate(0deg); } 50% { transform: translateY(-20px) rotate(5deg); } 100% { transform: translateY(0px) rotate(0deg); } }
        .float-element { animation: float 6s ease-in-out infinite; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .gradient-text { background: linear-gradient(to right, #8B5CF6, #06B6D4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-animate min-h-screen">
    <nav class="fixed top-0 w-full z-50 p-6 flex justify-between items-center bg-transparent">
        <div class="text-2xl font-extrabold tracking-tighter">
            <a href="/landingpage" class="gradient-text">AI.REVENUE</a>
        </div>
        <div class="space-x-4">
            <a href="/auth/login" class="px-5 py-2 hover:text-cyan-400 transition">Connexion</a>
            <a href="/auth/signup" class="px-6 py-2 bg-purple-600 rounded-full font-semibold hover:bg-purple-700 transition shadow-lg shadow-purple-500/20">Essayer Gratuitement</a>
        </div>
    </nav>

    <section class="min-h-screen flex flex-col justify-center items-center text-center px-4 pt-20">
        <div class="relative">
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-purple-600/20 rounded-full blur-[100px] float-element"></div>
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-cyan-600/20 rounded-full blur-[100px] float-element" style="animation-delay: 2s"></div>
            
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                Générez des Revenus <br> Propulsés par <span class="gradient-text">l'IA</span>
            </h1>
            <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mb-10">
                Débloquez votre potentiel financier avec des plans d'action quotidiens personnalisés et des opportunités réelles identifiées par notre moteur intelligent.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="/auth/signup" class="px-10 py-4 bg-white text-black rounded-full font-bold text-lg hover:bg-opacity-90 transition transform hover:scale-105">
                    Commencer l'Aventure
                </a>
                <button class="px-10 py-4 glass rounded-full font-bold text-lg hover:bg-white/10 transition border border-white/20">
                    Voir Démo
                </button>
            </div>
        </div>
    </section>
</body>
</html>