<?php
    $config = include_once("../server/s.config.php");

    require_once("../server/s.db.php");

    session_start();

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: /");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config->appName); ?> &mdash; Settings</title>
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
                        <p class="text-white text-xl">Settings</p>
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