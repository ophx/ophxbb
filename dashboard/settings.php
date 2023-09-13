<?php
    $config = include_once("../server/s.config.php");

    require_once("../server/s.db.php");

    session_start();

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: /");
        exit;
    }

    $err = $msg = "";
    if (isset($_POST["change_password"])) {
        $old_password = mysqli_escape_string($mysqli, $_POST["old_password"]);
        $new_password = mysqli_escape_string($mysqli, $_POST["new_password"]);
        $confirm_new_password = mysqli_escape_string($mysqli, $_POST["confirm_new_password"]);
        $id = mysqli_escape_string($mysqli, $_SESSION["id"]);

        if ($new_password == $confirm_new_password) {
            $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if (!empty($row)) {
                $hashedPassword = $row["password"];
                $password = password_hash($new_password, PASSWORD_DEFAULT);
                if (password_verify($old_password, $hashedPassword)) {
                    $stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE id = ?");
                    $stmt->bind_param("si", $password, $id);
                    $stmt->execute();
                    $msg = "Changed Password Successfully!";
                    header("location: /logout");
                } else {
                    $err = "Invalid Password!";
                }
            }
        } else {
            $err = "New Passwords Do Not Match!";
        }
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

                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-[#1f1f1f] shadow-lg rounded p-4">
                            <p class="text-white text-xl">Change Password</p>
                            <form action="settings" method="post" class="space-y-4">
                                <input type="password" name="old_password" id="old_password" placeholder="Current Password" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#2f2f2f]">
                                <input type="password" name="new_password" id="new_password" placeholder="New Password" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#2f2f2f]">
                                <input type="password" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#2f2f2f]">
                                <button type="submit" name="change_password" class="transition-all duriation-150 px-4 py-2 rounded text-white font-medium text-center w-full flex items-center justify-center bg-purple-600 hover:bg-purple-700">
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