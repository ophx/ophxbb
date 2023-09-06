<?php
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OphxBB</title>
    <link rel="shortcut icon" href="https://cdn3.emoji.gg/emojis/5058-stonedyay.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-[#0f0f0f]" style="font-family: 'Poppins', sans-serif !important;">
    <!-- Main Hero -->
    <main class="text-center sm:container sm:px-32 sm:mx-auto flex w-full h-screen">
        <div class="m-auto">
            <p class="text-white text-4xl">Get Started</p>
            <p class="text-gray-400 mb-4">Glad To See You! :D</p>
            <form action="register" method="post" class="space-y-4">
                <input type="text" name="username" id="username" placeholder="Username" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#1f1f1f]">
                <input type="password" name="password" id="password" placeholder="Password" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#1f1f1f]">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#1f1f1f]">
                <input type="text" name="invite_code" id="invite_code" placeholder="Invite Code" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#1f1f1f]">
                <button type="submit" class="transition-all duriation-150 px-4 py-2 rounded text-white font-medium text-center w-full flex items-center justify-center bg-purple-600 hover:bg-purple-700">
                    Get Started
                </button>
                <p class="text-gray-400">Already have an account? <a href="/login" class="transition-all duriation-150 hover:text-white">Login</a></p>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <?php require_once("./components/footer.php"); ?>
</body>
<script src="https://cdn.tailwindcss.com/"></script>
</html>