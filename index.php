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
    <style>
        .floating { 
            animation-name: floating;
            animation-duration: 3s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
        }
        @keyframes floating {
            0% { transform: translate(0,  0px); }
            50% { transform: translate(0, 15px); }
            100% { transform: translate(0, -0px); }   
        }
    </style>
</head>
<body class="bg-[#0f0f0f]" style="font-family: 'Poppins', sans-serif !important;">
    <!-- Navbar -->
    <?php require_once("./components/navbar.php"); ?>

    <!-- Main Hero -->
    <main class="text-center sm:container sm:px-32 sm:mx-auto flex w-full h-screen">
        <div class="m-auto">
            <p class="text-white text-5xl sm:text-6xl mb-4">OphxBB<span style="text-shadow: 0px 0px 2px #9333EA, 0px 0px 3px #9333EA, 0px 0px 7px #9333EA, 0px 0px 5px #9333EA, 0px 0px 8px #9333EA, 0px 0px 8px #9333EA; background: no-repeat, url(https://vacban.wtf/uploads/sparkles/sparkle_purple.gif);">.space</span></p>
            <p class="text-gray-400 text-xl scramble"></p>
            <div class="flex gap-4 justify-center mt-4">
                <a href="/register" class="transition-all duriation-150 px-4 py-2 rounded text-white font-medium text-center flex items-center justify-center bg-purple-600 hover:bg-purple-700">
                    Get Started!
                </a>
                <a href="https://discord.gg/cntHjp32WV" target="_blank" class="transition-all duriation-150 px-4 py-2 rounded text-white font-medium text-center flex items-center justify-center bg-purple-600 hover:bg-purple-700">
                    Discord
                </a>
            </div>
            <div class="mt-4 floating text-gray-400 flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-7 h-7">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </main>

    <div class="space-y-60">
        <!-- Stats -->
        <main class="text-center sm:container sm:px-32 sm:mx-auto">
            <p class="text-white text-3xl mb-4">Stats</p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-start">
                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                    <p class="text-white text-xl">0</p>
                    <p class="text-gray-400">User</p>
                </div>
                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                    <p class="text-white text-xl">null</p>
                    <p class="text-gray-400">Latest Member</p>
                </div>
                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                    <p class="text-white text-xl">0</p>
                    <p class="text-gray-400">Banned</p>
                </div>
            </div>
        </main>
        <!-- Features -->
        <main class="text-center sm:container sm:px-32 sm:mx-auto">
            <p class="text-white text-3xl mb-4">Features</p>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-start">
                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                    <p class="text-white flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                            <path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 01-.375.65 2.249 2.249 0 000 3.898.75.75 0 01.375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 17.625v-3.026a.75.75 0 01.374-.65 2.249 2.249 0 000-3.898.75.75 0 01-.374-.65V6.375zm15-1.125a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0V6a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zm-.75 3a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0v-.75a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-.75zM6 12a.75.75 0 01.75-.75H12a.75.75 0 010 1.5H6.75A.75.75 0 016 12zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
                        </svg>
                    </p>
                    <p class="text-white text-xl">feature 1</p>
                    <p class="text-gray-400">description</p>
                </div>
                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                    <p class="text-white flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                            <path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 01-.375.65 2.249 2.249 0 000 3.898.75.75 0 01.375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 17.625v-3.026a.75.75 0 01.374-.65 2.249 2.249 0 000-3.898.75.75 0 01-.374-.65V6.375zm15-1.125a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0V6a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zm-.75 3a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0v-.75a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-.75zM6 12a.75.75 0 01.75-.75H12a.75.75 0 010 1.5H6.75A.75.75 0 016 12zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
                        </svg>
                    </p>
                    <p class="text-white text-xl">feature 1</p>
                    <p class="text-gray-400">description</p>
                </div>
                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                    <p class="text-white flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                            <path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 01-.375.65 2.249 2.249 0 000 3.898.75.75 0 01.375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 17.625v-3.026a.75.75 0 01.374-.65 2.249 2.249 0 000-3.898.75.75 0 01-.374-.65V6.375zm15-1.125a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0V6a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zm-.75 3a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0v-.75a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-.75zM6 12a.75.75 0 01.75-.75H12a.75.75 0 010 1.5H6.75A.75.75 0 016 12zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
                        </svg>
                    </p>
                    <p class="text-white text-xl">feature 1</p>
                    <p class="text-gray-400">description</p>
                </div>
                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                    <p class="text-white flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                            <path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 01-.375.65 2.249 2.249 0 000 3.898.75.75 0 01.375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 17.625v-3.026a.75.75 0 01.374-.65 2.249 2.249 0 000-3.898.75.75 0 01-.374-.65V6.375zm15-1.125a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0V6a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zm-.75 3a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0v-.75a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-.75zM6 12a.75.75 0 01.75-.75H12a.75.75 0 010 1.5H6.75A.75.75 0 016 12zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
                        </svg>
                    </p>
                    <p class="text-white text-xl">feature 1</p>
                    <p class="text-gray-400">description</p>
                </div>
                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                    <p class="text-white flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                            <path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 01-.375.65 2.249 2.249 0 000 3.898.75.75 0 01.375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 17.625v-3.026a.75.75 0 01.374-.65 2.249 2.249 0 000-3.898.75.75 0 01-.374-.65V6.375zm15-1.125a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0V6a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zm-.75 3a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0v-.75a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-.75zM6 12a.75.75 0 01.75-.75H12a.75.75 0 010 1.5H6.75A.75.75 0 016 12zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
                        </svg>
                    </p>
                    <p class="text-white text-xl">feature 1</p>
                    <p class="text-gray-400">description</p>
                </div>
                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                    <p class="text-white flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10">
                            <path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 01-.375.65 2.249 2.249 0 000 3.898.75.75 0 01.375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 17.625v-3.026a.75.75 0 01.374-.65 2.249 2.249 0 000-3.898.75.75 0 01-.374-.65V6.375zm15-1.125a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0V6a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zm-.75 3a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0v-.75a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0V18a.75.75 0 001.5 0v-.75zM6 12a.75.75 0 01.75-.75H12a.75.75 0 010 1.5H6.75A.75.75 0 016 12zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
                        </svg>
                    </p>
                    <p class="text-white text-xl">feature 1</p>
                    <p class="text-gray-400">description</p>
                </div>
            </div>
        </main>

        <!-- Ready To Use Us? c: -->
        <main class="text-center sm:container sm:px-32 sm:mx-auto">
            <p class="text-white text-3xl mb-4">Ready To Use OphxBB?</p>
            <a href="/register" class="transition-all duriation-150 px-4 py-2 rounded text-white font-medium text-center items-center justify-center bg-purple-600 hover:bg-purple-700">
                Get Started!
            </a>
        </main>
    </div>

    <!-- Footer -->
    <?php require_once("./components/footer.php"); ?>
</body>
<script src="https://cdn.tailwindcss.com/"></script>
<script src="./assets/scramble.js"></script>
</html>