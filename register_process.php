<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    try {
        if ($stmt->execute()) {
            header("Location: login.php?registration_success=true");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            header("Location: register.php?error=username_exists");
            exit();
        } else {
            echo "Error: " . $e->getMessage();
        }
    }

    $stmt->close();
    $conn->close();
}
?>
