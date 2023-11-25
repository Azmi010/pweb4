<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Mahasiswa</title>
    <link rel="stylesheet" href="Daftar Akun Mahasiswa.css">
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
        <div class="signup-form">
            <h1>Sign Up</h1>
            <p>Silahkan melakukan pendaftaran akun!</p>
            <form action="reg.php" method="post">
                <label>Nama</label><br>
                <input type="text" required>
                <label>NIM</label><br>
                <input type="text" name="username" required>
                <div class="dropdown">
                    <label for="prodi">Prodi</label>
                    <select id="prodi">
                        <option value="TI">Informatika</option>
                        <option value="SI" selected>Teknologi Informasi</option>
                        <option value="IF">Sistem Informasi</option>
                    </select>
                    <label for="fakultas">Fakultas</label>
                    <select id="fakultas">
                        <option value="TI">Fakultas Hukum</option>
                        <option value="SI" selected>Fakultas Ilmu Komputer</option>
                        <option value="IF">Fakultas Ilmu Budaya</option>
                    </select>
                </div>
                <label>Password</label><br>
                <input type="password" name="password" required>
                <input type="submit" name="reg" value="Register" class="signup-btn">
            </form>
        </div>
</section>
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