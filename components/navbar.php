<nav class="hidden sm:block fixed top-0 w-full px-4 py-2 bg-[#1f1f1f] shadow-lg">
    <div class="space-y-4 container px-32 mx-auto">
        <div class="flex justify-between items-center">
            <div>
                <a href="/" class="flex items-center gap-2">
                    <img src="https://cdn3.emoji.gg/emojis/5058-stonedyay.png" class="h-8 w-8">
                    <span class="text-white"><?php echo htmlspecialchars($config->appName); ?></span>
                </a>
            </div>
            <div class="flex text-sm items-center gap-8">
                <a href="#statistics" class="transition-all duriation-150 text-gray-400 hover:text-white font-medium">
                    Statistics
                </a>
                <a href="#features" class="transition-all duriation-150 text-gray-400 hover:text-white font-medium">
                    Features
                </a>
                <a href="/register" class="transition-all duriation-150 px-4 py-2 rounded text-white font-medium text-center flex items-center justify-center bg-purple-600 hover:bg-purple-700">
                    Get Started!
                </a>
            </div>
        </div>
    </div>
</nav>