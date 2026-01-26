<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Wealth Accelerator | Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap');
        :root { --primary: #8B5CF6; --bg-dark: #030712; }
        body { font-family: 'Inter', sans-serif; background-color: var(--bg-dark); color: white; }
        .bg-animate { background: linear-gradient(-45deg, #030712, #1e1b4b, #1e1b4b, #030712); background-size: 400% 400%; animation: gradientBG 15s ease infinite; }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .gradient-text { background: linear-gradient(to right, #8B5CF6, #06B6D4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-animate min-h-screen flex items-center justify-center p-4">
    <nav class="fixed top-0 w-full p-6 flex justify-between items-center">
        <a href="<?= $_ENV["BASE_PATH"] ?>/landingpage" class="text-2xl font-extrabold gradient-text">AI.REVENUE</a>
    </nav>

    <div class="glass w-full max-w-md p-8 rounded-3xl">
        <h2 class="text-3xl font-bold mb-2">Bon retour !</h2>
        
        <p class="text-gray-400 mb-8">Connectez-vous pour accéder à vos plans.</p>
        <form action="<?= $_ENV["BASE_PATH"] ?>/auth/login"  method="POST" class="space-y-4">
            <input name="email" type="email" placeholder="Email" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-purple-500 transition outline-none text-white">
            <input name="password" type="password" placeholder="Mot de passe" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-purple-500 transition outline-none text-white">
            <button type="submit" class="w-full py-4 bg-purple-600 rounded-xl font-bold hover:bg-purple-700 transition">Se connecter</button>
            <p class="text-center text-sm text-gray-400 mt-4">Pas de compte ? <a href="<?= $_ENV["BASE_PATH"] ?>/auth/signup" class="text-purple-400 hover:underline">Créer un compte</a></p>
            <p class="text-center text-sm text-gray-400 mt-4">Restore Password ? <a href="<?= $_ENV["BASE_PATH"] ?>/showcheckEmail" class="text-purple-400 hover:underline">Oublié</a></p>
        </form>
    </div>
</body>
</html>