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
        <form action="<?= BASEURL ?>/?url=Register/processRegister" method="post">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="text" name="nip_nim" placeholder="NIM/NIP" required>
            <select id="status" name="status" onchange="handleStatusChange()">
                <option value="" disabled selected hidden>Status</option>
                <?php foreach ($data['roles'] as $role) : ?>
                <option value="<?= $role['nama_role']; ?>"><?= $role['nama_role']; ?></option>
                <?php endforeach ?>
            </select>
            <select id="prodi" name="prodi">
                <option value="" disabled selected hidden>Program Studi</option>
                <?php foreach ($data['prodi'] as $prodi) : ?>
                <option value="<?= $prodi['nama_prodi']; ?>"><?= $prodi['nama_prodi']; ?></option>
                <?php endforeach ?>
            </select>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
    <script>
    function handleStatusChange() {
        var status = document.getElementById('status').value;
        var prodiDropdown = document.getElementById('prodi');

        // Reset prodiDropdown
        prodiDropdown.selectedIndex = 0;
        prodiDropdown.disabled = (status !== 'Mahasiswa');
    }
    </script>
</body>
</html>