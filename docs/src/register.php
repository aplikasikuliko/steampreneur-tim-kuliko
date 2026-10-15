<?php
session_start();
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $usaha = trim($_POST["usaha"] ?? "");
    $password = $_POST["password"] ?? "";
    $alamat = trim($_POST["alamat"] ?? "");
    $telepon = trim($_POST["telepon"] ?? "");


    if ($username === "" || $usaha === "" || $alamat === "" || $telepon === "" || strlen($password) < 8) {
        exit("Isi semua data. Password minimal 8 karakter.");
    }

    // Cek username sudah digunakan atau belum
    $stmt = mysqli_prepare(
        $koneksi,
        "SELECT id FROM pengguna WHERE username = ?"
    );

    if (!$stmt) {
        exit("Gagal menyiapkan pemeriksaan username.");
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        exit("Username sudah digunakan. Silakan pilih username lain.");
    }

    mysqli_stmt_close($stmt);

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Simpan akun
    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO pengguna (username, usaha, password, alamat, telepon)
         VALUES (?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        exit("Gagal menyiapkan penyimpanan akun.");
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $username,
        $usaha,
        $passwordHash,
        $alamat,
        $telepon
    );

    if (mysqli_stmt_execute($stmt)) {
        // Simpan data akun yang baru dibuat
        $userId = mysqli_insert_id($koneksi);

        // Buat session login
        session_regenerate_id(true);

        $_SESSION["user_id"] = $userId;
        $_SESSION["username"] = $username;
        $_SESSION["usaha"] = $usaha;
        $_SESSION["alamat"] = $alamat;
        $_SESSION["telepon"] = $telepon;

        mysqli_stmt_close($stmt);

        // Langsung masuk dashboard
        header("Location: dashboard.php");
        exit;
    }

    mysqli_stmt_close($stmt);
    error_log("Registrasi gagal: " . mysqli_error($koneksi));
    exit("Akun gagal disimpan. Periksa struktur tabel database.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KULIKO - Register</title>
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
        input[type="text"], input[type="password"] {
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
        <h1>Register</h1>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="usaha">Usaha:</label>
            <input type="text" id="usaha" name="usaha" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required><br><br>

            <label for="telepon">No. Telepon:</label>
            <input type="text" id="telepon" name="telepon" required><br><br>

            <input type="submit" value="Register">

            <label id="login-link">Already have an account? <a href="index.php">Login here</a></label>
        </form>
    </div>
    

</body>
</html>