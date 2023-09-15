<?php
    $config = include_once("../server/s.config.php");

    require_once("../server/s.db.php");

    session_start();

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: /");
        exit;
    }

    $motd = mysqli_query($mysqli, "SELECT message FROM motd");
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config->appName); ?> &mdash; Home</title>
    <link rel="shortcut icon" href="https://cdn3.emoji.gg/emojis/5058-stonedyay.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/scroll.css">
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

                    <div class="flex gap-4 w-full items-start">
                        <div class="flex flex-col gap-4 w-full">
                            <div class="grid grid-cols-3 gap-4 w-full">
                                <?php while ($row = mysqli_fetch_array($motd)) { ?>
                                    <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                        <p class="text-white text-xl"><?php echo htmlspecialchars($row["message"]); ?></p>
                                        <p class="text-gray-400">MOTD</p>
                                    </div>
                                <?php } ?>
                                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                    <p class="text-white text-xl">1337</p>
                                    <p class="text-gray-400">Registered Today</p>
                                </div>
                                <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                    <p class="text-white text-xl">1337</p>
                                    <p class="text-gray-400">Logged In Today</p>
                                </div>
                            </div>
                            <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                <p class="text-white text-xl">Chatbox</p>
                                <div class="h-[500px] overflow-y-auto overflow-x-hidden">
                                    <div id="chats"></div>
                                </div>
                                <div class="flex justify-between w-full gap-4 items-center">
                                    <div class="w-full">
                                        <input autocomplete="off" type="text" name="new_chat" id="new_chat" placeholder="Whats On Your Mind?" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#2f2f2f]">
                                    </div>
                                    <div>
                                        <button name="send_chat" class="transition-all duriation-150 px-4 py-2 rounded text-white font-medium text-center w-full flex items-center justify-center bg-purple-600 hover:bg-purple-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                                <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4 w-[1000px]">
                            <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                <iframe width="100%" height="300" src="https://www.youtube.com/embed/AX8Xm6maEYw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                <p class="text-white text-xl">Update History</p>
                                <div class="h-[300px] overflow-y-auto overflow-x-hidden">
                                    <div class="space-y-4">
                                        <ul class="list-disc list-inside text-gray-400">
                                            test &bullet; 1/1/1
                                            <li>fdsfsdffd</li>
                                        </ul>
                                        <ul class="list-disc list-inside text-gray-400">
                                            neta est &bullet; 1/1/1
                                            <li>New UI</li>
                                            <li>User Profiles</li>
                                        </ul>
                                        <ul class="list-disc list-inside text-gray-400">
                                            test &bullet; 1/1/1
                                            <li>fdsfsdffd</li>
                                        </ul>
                                        <ul class="list-disc list-inside text-gray-400">
                                            neta est &bullet; 1/1/1
                                            <li>New UI</li>
                                            <li>User Profiles</li>
                                        </ul>
                                        <ul class="list-disc list-inside text-gray-400">
                                            test &bullet; 1/1/1
                                            <li>fdsfsdffd</li>
                                        </ul>
                                        <ul class="list-disc list-inside text-gray-400">
                                            neta est &bullet; 1/1/1
                                            <li>New UI</li>
                                            <li>User Profiles</li>
                                        </ul>
                                        <ul class="list-disc list-inside text-gray-400">
                                            test &bullet; 1/1/1
                                            <li>fdsfsdffd</li>
                                        </ul>
                                        <ul class="list-disc list-inside text-gray-400">
                                            neta est &bullet; 1/1/1
                                            <li>New UI</li>
                                            <li>User Profiles</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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