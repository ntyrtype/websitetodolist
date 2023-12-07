<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['registration_success']) && $_GET['registration_success'] == 'true') {
            echo '<p style="color: green;">Registrasi berhasil! Silakan login.</p>';
        }
        ?>

        <form action="login_process.php" method="post">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>

    </div>
    <center><p>Belum punya akun? <a href="register.php">Daftar disini</a></p></center>
    </div>
</body>
</html>
