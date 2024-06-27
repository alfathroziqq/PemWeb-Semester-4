<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background-color: white;
            padding: 30px;
            border-radius: 5px 5px 5px 5px;
            width: 50%;
        }

        .right {
            background-color: #00c497;
            padding: 30px;
            border-radius: 5px 5px 5px 5px;
            width: 50%;
            color: white;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 10px;
            cursor: pointer;
        }

        .social-icon i {
            font-size: 20px;
        }

        .input-field {
            width: 94%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        a {
            text-decoration: none;
            color: white;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #00c497;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #00c497;
            text-decoration: none;
        }

        h2 {
            margin-top: 50px;
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <h1>Sign in</h1>
            <form method="POST" action="/login">
                @csrf <!-- Tambahkan CSRF token -->
                <input type="text" name="username" class="input-field" placeholder="Username" required>
                <input type="password" name="password" class="input-field" placeholder="Password" required>
                <button type="submit">SIGN IN</button>
                @if (session('failed'))
                    <p style="color: red; margin-top: 10px;">{{ session('failed') }}</p>
                @endif
            </form>
            <div class="forgot-password">
                <a href="/loginregister/register">Belum punya akun?</a>
            </div>
        </div>
        <div class="right">
            <h2>Halo, Teman!</h2>
            <p>Daftarkan diri anda dan mulai gunakan layanan kami segera</p>
            <button><a href="/loginregister/register">SIGN UP</a></button>
        </div>
    </div>
</body>

</html>
