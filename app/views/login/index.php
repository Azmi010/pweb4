<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Halaman Login.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar">
        </div>
    </nav>
    <section id="icon-login">
        <div class="icon-img">
            <img src="./Asset pweb/shape11.png" alt="" width="80%">
        </div>
        <div class="icon2-img">
            <img src="./Asset pweb/Logo_UNEJ-removebg-preview.png" alt="" width="21%">
        </div>
        <div class="icon3-img">
            <img src="./Asset pweb/figure.png" alt="" width="56%">
        </div>
        <div class="Login-form">
            <h1>Sign In</h1>
            <p>Silahkan login ke akun Anda!</p>
            <form action="../../controllers/login.php" method="post">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username disini" required>
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password disini" required>
                <input type="submit" name="login" value="Log In" class="login-btn">
            </form>
        </div>
    </section>
    <section id="icon2-login">
        <div class="img-sso">
            <img src="./Asset pweb/shape11.png" alt="" width="80%">
        </div>
        <div class="text-sso">
            <h1>Single Sign On (SSO)<br>
                Universitas Jember</h1>
            <p>SISTEM INFORMASI<br> 
            TERINTEGRASI (SISTER)<br>
            UNIVERSITAS JEMBER</p>
        </div>
    </section>
</body>
</html>