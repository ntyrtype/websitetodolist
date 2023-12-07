<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'username_exists') {
            echo '<p style="color: red;">Username sudah ada. Silakan pilih username lain.</p>';
        }
        ?>

        <form action="register_process.php" method="post">
            <h2>Register</h2>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
