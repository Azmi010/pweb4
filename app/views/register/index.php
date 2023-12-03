
    <h1>Registrasi</h1>
    <form action="<?= BASEURL; ?>/register/processRegistration" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <br>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required>
        <br>
        <label for="fakultas">Fakultas:</label>
        <input type="text" name="fakultas" required>
        <br>
        <label for="prodi">Program Studi:</label>
        <input type="text" name="prodi" required>
        <br>
        <label for="role">Role:</label>
        <select name="role" required>
            <?php foreach ($data['roles'] as $peran) : ?>
                <option value="<?= $peran; ?>"><?= $peran; ?></option>
            <?php endforeach ?>
        </select>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Register</button>
    </form>
