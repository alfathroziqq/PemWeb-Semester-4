<?php
require 'koneksi.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect jika pengguna sudah login
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

$error_messages = [];

if (isset($_POST["submit"])) {
    $name = trim($_POST["name"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    if (empty($name)) {
        $error_messages[] = "Nama tidak boleh kosong.";
    }
    
    if (empty($username)) {
        $error_messages[] = "Username tidak boleh kosong.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_messages[] = "Format email tidak valid.";
    }

    if (strlen($password) < 6) {
        $error_messages[] = "Kata sandi harus minimal 6 karakter.";
    }

    if ($password !== $confirmpassword) {
        $error_messages[] = "Kata sandi dan konfirmasi kata sandi tidak cocok.";
    }

    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        $error_messages[] = "Username atau Email sudah digunakan.";
    }

    if (empty($error_messages)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO user (name, username, email, password) VALUES ('$name', '$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Registrasi berhasil!');</script>";
        } else {
            $error_messages[] = "Terjadi kesalahan pada server.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <link rel="icon" href="apple.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #2c2c2c; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .split {
            display: flex;
            width: 80%; 
            height: 80vh;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .left {
            flex: 0.4; 
            background: #000000;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .right {
            flex: 0.6; 
            background: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 35px;
        }
        
        p {
            text-align: center;
            color: white;
            font-size: 20px;
        }
        .errors {
            background: #000000;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #000000;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: box-shadow 0.2s ease-in-out;
        }

        .form-group input:focus {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .eye-icon {
            position: absolute;
            top: 35px;
            right: 15px;
            cursor: pointer;
        }

        button {
            background: #4341ff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #5c64f8;
        }

        a {
            text-decoration: none;
            color: #000000;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #f63047; 
        }
    </style>
</head>
<body>
    <div class="split">
        <div class="left">
            <div>
                <p>Boleh dong diisi data kamu buat daftar akun ^_^</p>
            </div>
        </div>

        <div class="right">
            <h2>Registrasi</h2>
            <?php
            if (!empty($error_messages)) {
                echo '<div class="errors">';
                foreach ($error_messages as $error_message) {
                    echo "<p>$pesan</p>";
                }
                echo '</div>';
            }
            ?>
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Konfirmasi Kata Sandi:</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" required>
                </div>
                <button type="submit" name="submit">Daftar</button>
            </form>
            <br>
            <a href="login.php">Sudah punya akun? Login di sini.</a>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(id) {
            var input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</body>
</html>
