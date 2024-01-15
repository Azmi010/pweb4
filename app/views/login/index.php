<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/login.css">
</head>
<body>
    <div class="login-container">
        <?php if (isset($data['error_message'])): ?>
            <p style="color: red;"><?= $data['error_message'] ?></p>
        <?php endif; ?>
        <h2>Sistem Informasi Fasilkom Credit Point<br>
            (SI-FCP)
        </h2>
        <form action="<?= BASEURL ?>/?url=Login/processLogin" method="post">
            <label for="">Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" required>
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>