<!DOCTYPE html>
<html>

<head>
    <title>Halaman Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }

        .container {
            display: flex;
            width: 800px;
        }

        .left {
            background-color: #00c497;
            padding: 30px;
            border-radius: 5px 5px 5px 5px;
            width: 50%;
            color: white;
            text-align: center;
        }

        .right {
            background-color: white;
            padding: 30px;
            border-radius: 5px 5px 5px 5px;
            width: 50%;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #00c497;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .forgot-password a {
            color: #2ecc71;
            text-decoration: none;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-group input {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <h1>Selamat Datang Kembali!</h1>
            <p>Untuk tetap terhubung dengan kami, silahkan masuk dengan akun anda</p>
            <button><a href="/loginregister/login">SIGN IN</a></button>
        </div>
        <div class="right">
            <h1>Buat Akun</h1>
            <form method="POST" action="/register">
                @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Nama Lengkap" class="input-field" required>
                </div>
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" class="input-field" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Alamat Email" class="input-field" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Kata Sandi" class="input-field" required>
                </div>
                <div class="form-group">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Kata Sandi" class="input-field" required>
                </div>
                <button type="submit">SIGN UP</button>
            </form>
        </div>
    </div>
</body>

</html>
