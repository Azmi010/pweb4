
    <div class="mt-36">
        <h1>Login</h1>
        <form action="/login/processLogin" method="post" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>
            <input type="file" name="gambar">
            <button type="submit">Login</button>
        </form>
    </div>
