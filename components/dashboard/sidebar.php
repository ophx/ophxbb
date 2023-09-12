<?php
    $page = basename($_SERVER["PHP_SELF"]);
?>
<aside class="fixed top-0 left-0 z-40 w-64 h-screen">
    <div class="h-full py-4 px-2 overflow-y-auto bg-[#1f1f1f] shadow-lg flex flex-col justify-between">
        <div>
            <ul class="space-y-1">
                <li class="mb-4">
                    <a href="/dashboard/" class="flex items-center gap-2 justify-center">
                        <img src="https://cdn3.emoji.gg/emojis/5058-stonedyay.png" class="h-8 w-8">
                        <span class="text-white"><?php echo htmlspecialchars($config->appName); ?></span>
                    </a>
                </li>
                <li>
                    <div class="border-b border-[#2f2f2f]"></div>
                </li>
                <li>
                    <a href="/dashboard/" class="transition-all duriation-150 flex items-center p-2 text-base font-medium <?php if($page=='index.php'){echo 'text-purple-600';}else{echo 'text-gray-400 hover:text-purple-600';} ?>">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/dashboard/me" class="transition-all duriation-150 flex items-center p-2 text-base font-medium <?php if($page=='me.php'){echo 'text-purple-600';}else{echo 'text-gray-400 hover:text-purple-600';} ?>">
                        Profile
                    </a>
                </li>
                <li>
                    <a href="/dashboard/settings" class="transition-all duriation-150 flex items-center p-2 text-base font-medium <?php if($page=='settings.php'){echo 'text-purple-600';}else{echo 'text-gray-400 hover:text-purple-600';} ?>">
                        Settings
                    </a>
                </li>
                <li>
                    <div class="border-b border-[#2f2f2f]"></div>
                </li>
                <?php if ($_SESSION["role"] == "Administrator") { ?>
                    <li>
                        <a href="/dashboard/admin" class="transition-all duriation-150 flex items-center p-2 text-base font-medium <?php if($page=='admin.php'){echo 'text-purple-600';}else{echo 'text-gray-400 hover:text-purple-600';} ?>">
                            Admin Panel
                        </a>
                    </li>
                    <li>
                        <div class="border-b border-[#2f2f2f]"></div>
                    </li>
                <?php } ?>
                <li>
                    <a href="/logout" class="transition-all duriation-150 flex items-center p-2 text-base font-medium <?php if($page==''){echo 'text-red-600';}else{echo 'text-gray-400 hover:text-red-600';} ?>">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="bg-[#2f2f2f] shadow-lg rounded p-4 flex items-center">
                <div>
                    <?php if ($_SESSION["avatar"] != "") { ?>
                        <img src="" class="mr-2 max-w-11 max-h-11 rounded shadow-lg">
                    <?php } else { ?>
                        <div class="w-11 mr-2">
                            <div class="relative h-11 w-11 overflow-hidden bg-[#3f3f3f] rounded shadow-lg">
                                <svg class="absolute h-11 w-11 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div>
                    <p class="text-white"><?php echo htmlspecialchars($_SESSION["username"]); ?> <span class="text-gray-400">(<?php echo htmlspecialchars($_SESSION["role"]); ?>)</span></p>
                    <p class="text-gray-400 text-sm">UID <?php echo htmlspecialchars($_SESSION["id"]); ?></p>
                </div>
            </div>
        </div>
    </div>
</aside>