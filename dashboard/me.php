<?php
    $config = include_once("../server/s.config.php");

    require_once("../server/s.db.php");

    session_start();

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: /");
        exit;
    }

    require_once("../components/dashboard/functions.php");
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config->appName); ?> &mdash; Me</title>
    <link rel="shortcut icon" href="https://cdn3.emoji.gg/emojis/5058-stonedyay.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-[#0f0f0f]" style="font-family: 'Poppins', sans-serif !important;" onload="spin()">
    <!-- Loader -->
    <div class="spinner">
        <?php require_once("../components/spinner.php"); ?>
    </div>

    <!-- Dashboard -->
    <div class="main hidden">
        <div class="flex">
            <div>
                <?php require_once("../components/dashboard/sidebar.php"); ?>
            </div>
            <div class="ml-64 p-4 w-full">
                <div class="space-y-4">
                    <?php require_once("../components/dashboard/header.php"); ?>

                    <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                        <div class="flex items-center gap-4">
                            <div>
                                <div class="w-[75px]">
                                    <div class="relative h-[75px] w-[75px] overflow-hidden bg-[#2f2f2f] rounded shadow-lg">
                                        <svg class="absolute h-[75px] w-[75px] text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-white text-xl"><?php echo htmlspecialchars($_SESSION["username"]); ?> <span class="text-gray-400">(<?php echo htmlspecialchars($_SESSION["role"]); ?>)</span></p>
                                <p class="text-gray-400">UID <?php echo htmlspecialchars($_SESSION["id"]); ?></p>
                                <p class="text-gray-400">Registered: <?php
                                                                        $d = strtotime(htmlspecialchars($_SESSION["created_at"]));
                                                                        echo timeAgo($d);
                                                                    ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                        <p class="text-white text-xl">Active Subscriptions</p>
                    </div>

                    <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                        <p class="text-white text-xl">Purchase A Subscriptions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com/"></script>
<script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="../assets/spinner.js"></script>
</html>