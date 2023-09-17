<?php
    $config = include_once("./server/s.config.php");

    require_once("./server/s.db.php");

    session_start();

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: /dashboard/");
        exit;
    }

    function UUIDv4() {
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
		);
	}

    $err = $username_err = $password_err = $confirm_password_err = "";
    if (isset($_POST["register"])) {
        if (strlen(mysqli_escape_string($mysqli, $_POST["username"])) < 3) {
            $username_err = "Username Must Have Atleast 4 Characters!";
        } else {
            if ($stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?")) {
                $stmt->bind_param("s", $param_username);
                $param_username = mysqli_escape_string($mysqli, $_POST["username"]);
                if ($stmt->execute()) {
                    $stmt->store_result();
                    if ($stmt->num_rows == 1) {
                        $username_err = "Username Is Already Taken!";
                    } else {
                        $username = mysqli_escape_string($mysqli, $_POST["username"]);
                    }
                } else {
                    $err = "ERROR!";
                }
                $stmt->close();
            }
        }

        if (strlen(mysqli_escape_string($mysqli, $_POST["password"])) < 7) {
            $password_err = "Password Must Have Atleast 8 Characters!";
        } else {
            $password = mysqli_escape_string($mysqli, $_POST["password"]);
        }

        if ($password != mysqli_escape_string($mysqli, $_POST["confirm_password"])) {
            $password_err = "Passwords Do Not Match!";
        } else {
            $confirm_password = mysqli_escape_string($mysqli, $_POST["confirm_password"]);
        }

        if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
            if ($stmt = $mysqli->prepare("INSERT INTO users (uuid, username, password) VALUES (?, ?, ?)")) {
                $stmt->bind_param("sss", $param_uuid, $param_username, $param_password);
                $param_uuid = UUIDv4();
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                if ($stmt->execute()) {
                    header("location: /login");
                } else {
                    $err = "ERROR!";
                }
                $stmt->close();
            }
        }

        $mysqli->close();
    }
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config->appName); ?> &mdash; Get Started!</title>
    <link rel="shortcut icon" href="https://cdn3.emoji.gg/emojis/5058-stonedyay.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/scroll.css">
</head>
<body class="bg-[#0f0f0f]" style="font-family: 'Poppins', sans-serif !important;" onload="spin()">
    <!-- Loader -->
    <div class="spinner">
        <?php require_once("./components/spinner.php"); ?>
    </div>

    <div class="main hidden">
        <!-- Main Hero -->
        <main class="text-center sm:container sm:px-32 sm:mx-auto flex w-full h-screen">
            <div class="m-auto">
                <p class="text-white text-4xl">Get Started</p>
                <p class="text-gray-400 mb-4">Glad To See You! :D</p>
                <form action="register" method="post" class="space-y-4">
                    <input required type="text" name="username" id="username" placeholder="Username" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#1f1f1f]">
                    <input required type="password" name="password" id="password" placeholder="Password" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#1f1f1f]">
                    <input required type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="transition-all duriation-150 px-4 py-2 rounded text-white placeholder-gray-400 font-medium w-full flex outline-none border-none shadow-lg bg-[#1f1f1f]">
                    <div class="g-recaptcha" data-theme="dark" data-sitekey="<?php echo htmlspecialchars($config->recaptcha_sitekey); ?>" data-action="REGISTER"></div>
                    <button type="submit" name="register" class="transition-all duriation-150 px-4 py-2 rounded text-white font-medium text-center w-full flex items-center justify-center bg-purple-600 hover:bg-purple-700">
                        Get Started
                    </button>
                    <p class="text-gray-400">Already Have An Account? <a href="/login" class="transition-all duriation-150 hover:text-white font-medium">Login</a></p>
                </form>
                <p class="text-red-600">
                    <?php echo htmlspecialchars($err); ?>
                    <?php echo htmlspecialchars($username_err); ?>
                    <?php echo htmlspecialchars($password_err); ?>
                    <?php echo htmlspecialchars($confirm_password_err); ?>
                </p>
            </div>
        </main>

        <!-- Footer -->
        <?php require_once("./components/footer.php"); ?>
    </div>
</body>
<script src="https://cdn.tailwindcss.com/"></script>
<script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="./assets/spinner.js"></script>
</html>