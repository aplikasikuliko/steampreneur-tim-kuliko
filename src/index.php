<?php
session_start();
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    $stmt = mysqli_prepare(
        $koneksi,
        "SELECT id, username, usaha, password, alamat, telepon
         FROM pengguna
         WHERE username = ?"
    );

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        if (
            $data &&
            password_verify($password, $data["password"])
        ) {
            session_regenerate_id(true);

            $_SESSION["user_id"] = $data["id"];
            $_SESSION["username"] = $data["username"];
            $_SESSION["usaha"] = $data["usaha"];
            $_SESSION["alamat"] = $data["alamat"];
            $_SESSION["telepon"] = $data["telepon"];

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Username atau password salah.";
        }
    } else {
        $error = "Terjadi kesalahan pada sistem login.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KULIKO - Login</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <style>
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #04003d;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #04003d;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ececec;
            color: #04003d;
        }

        #login-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (!empty($error)) : ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="index.php" method="POST">
            <label for="username">Username:</label>
            <input
                type="text"
                id="username"
                name="username"
                required
            >

            <label for="password">Password:</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <input type="submit" value="Login">

            <label id="login-link">
                Don't have an account?
                <a href="register.php">Register here</a>
            </label>
        </form>
    </div>
</body>
</html>