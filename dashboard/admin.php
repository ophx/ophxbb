<?php
    $config = include_once("../server/s.config.php");

    require_once("../server/s.db.php");

    session_start();

    if (!isset($_SESSION["role"]) || $_SESSION["role"] == "User") {
        header("HTTP/1.0 403 Forbidden", TRUE, 403);
        exit;
    }

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: /");
        exit;
    }

    $err = $msg = "";
    if (isset($_POST["change_motd"])) {
        $new_motd = mysqli_escape_string($mysqli, $_POST["new_motd"]);
        try {
            mysqli_query($mysqli, "UPDATE motd SET message='$new_motd'");
            $msg = "Updated MOTD Successfully!";
        } catch (\Exception $e) {
            $err = "ERROR!";
        }
    }

    $tabTitle = "settings";
    if (isset($_GET["settings"])) {
        $tabTitle = "settings";
    }
    if (isset($_GET["users"])) {
        $tabTitle = "users";
    }
    if (isset($_GET["stats"])) {
        $tabTitle = "stats";
    }

    $user_num_query = mysqli_query($mysqli, "SELECT count(1) FROM `users`");
    $user_num_row = mysqli_fetch_row($user_num_query);
    $user_num = $user_num_row[0];

    $latest_mem_query = mysqli_query($mysqli, "SELECT `username` FROM `users` WHERE id = (SELECT MAX(id) FROM `users`)");
    $latest_mem_row = mysqli_fetch_row($latest_mem_query);
    $latest_mem = $latest_mem_row[0];

    $user_list = mysqli_query($mysqli, "SELECT * FROM `users` ORDER BY id DESC");

    require_once("../components/dashboard/functions.php");
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config->appName); ?> &mdash; Admin Panel</title>
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
                    
                    <div class="flex gap-4 w-full">
                        <button onclick="window.location.href='?settings'" class="w-full transition-all duriation-150 px-4 py-2 text-sm font-medium rounded <?php echo ($tabTitle == "settings") ? "shadow-lg text-purple-600 bg-[#2f2f2f]" : "shadow-lg text-white hover:text-purple-600 bg-[#1f1f1f] hover:bg-[#2f2f2f]" ?>">
                            Basic Admin Settings
                        </button>
                        <button onclick="window.location.href='?users'" class="w-full transition-all duriation-150 px-4 py-2 text-sm font-medium rounded <?php echo ($tabTitle == "users") ? "shadow-lg text-purple-600 bg-[#2f2f2f]" : "shadow-lg text-white hover:text-purple-600 bg-[#1f1f1f] hover:bg-[#2f2f2f]" ?>">
                            User List 
                        </button>
                        <button onclick="window.location.href='?stats'" class="w-full transition-all duriation-150 px-4 py-2 text-sm font-medium rounded <?php echo ($tabTitle == "stats") ? "shadow-lg text-purple-600 bg-[#2f2f2f]" : "shadow-lg text-white hover:text-purple-600 bg-[#1f1f1f] hover:bg-[#2f2f2f]" ?>">
                            <?php echo htmlspecialchars($config->appName); ?> Statistics 
                        </button>
                    </div>
                    
                    <?php if ($tabTitle == "settings") { ?>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                <p class="text-white text-xl">Change MOTD</p>
                                <form action="admin" method="post" class="space-y-4">
                                    <input autocomplete="off" type="text" name="new_motd" id="new_motd" placeholder="New MOTD" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#2f2f2f]">
                                    <button type="submit" name="change_motd" class="transition-all duriation-150 px-4 py-2 rounded text-white font-medium text-center w-full flex items-center justify-center bg-purple-600 hover:bg-purple-700">
                                        Update
                                    </button>
                                    <?php if (!empty($err)) { ?>
                                        <p class="text-red-600">
                                            <?php echo htmlspecialchars($err); ?>
                                        </p>
                                    <?php } ?>
                                    <?php if (!empty($msg)) { ?>
                                        <p class="text-green-600">
                                            <?php echo htmlspecialchars($msg); ?>
                                        </p>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    <?php } else if ($tabTitle == "users") { ?>
                        <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                            <p class="text-white text-xl">User List</p>
                            <table class="w-full text-left text-gray-400">
                                <thead class="bg-[#2f2f2f] shadow-lg">
                                    <tr>
                                        <th scope="col" class="px-4 py-2 rounded-l">
                                            ID
                                        </th>
                                        <th scope="col" class="px-4 py-2">
                                            Username
                                        </th>
                                        <th scope="col" class="px-4 py-2">
                                            Created At
                                        </th>
                                        <th scope="col" class="px-4 py-2">
                                            Role
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="font-normal">
                                    <?php while ($row = mysqli_fetch_array($user_list)) { ?>
                                        <tr class="border-b border-[#2f2f2f]">
                                            <td class="px-4 py-2">
                                                <?php echo htmlspecialchars($row["id"]); ?>
                                            </td>
                                            <td class="px-4 py-2">
                                                <?php echo htmlspecialchars($row["username"]); ?>
                                            </td>
                                            <td class="px-4 py-2">
                                                <?php echo htmlspecialchars($row["created_at"]); ?>
                                                (<?php
                                                    $d = strtotime(htmlspecialchars($row["created_at"]));
                                                    echo timeAgo($d);
                                                ?>)
                                            </td>
                                            <td class="px-4 py-2">
                                                <?php echo htmlspecialchars($row["role"]); ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else if ($tabTitle == "stats") { ?>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                <p class="text-white text-xl"><?php echo htmlspecialchars($user_num); ?></p>
                                <p class="text-gray-400">Users</p>
                            </div>
                            <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                <p class="text-white text-xl"><?php echo htmlspecialchars($latest_mem); ?></p>
                                <p class="text-gray-400">Recently Joined</p>
                            </div>
                            <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                <p class="text-white text-xl">1337</p>
                                <p class="text-gray-400">Registered Today</p>
                            </div>
                            <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                                <p class="text-white text-xl">1337</p>
                                <p class="text-gray-400">Logged In Today</p>
                            </div>
                        </div>
                    <?php } ?>
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