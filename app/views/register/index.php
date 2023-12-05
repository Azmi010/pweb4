<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/register.css">
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        <form>
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="text" name="nim" placeholder="NIM/NIP" required>
            <select id="Status">
                <option value="" disabled selected hidden>Status</option>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Operator Akademik">Operator Akademik</option>
                <option value="Tim SKPI">Tim SKPI</option>
                <option value="Wadek">Wakil Dekan</option>
            </select>
            <select id="Prodi">
                <option value="" disabled selected hidden>Program Studi</option>
                <option value="TI">Sistem Informasi</option>
                <option value="SI">Teknologi Informasi</option>
                <option value="IF">Informatika</option>
            </select>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>