<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        die("Username and password are required.");
    }

    $host = "127.0.0.1";
    $port = 3306;
    $user = "root";
    $pass = "mathematics";
    $db   = "Bonofied";

    $conn = new mysqli($host, $user, $pass, $db, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $userFromDb, $hashedPasswordFromDb);
            $stmt->fetch();

            if (password_verify($password, $hashedPasswordFromDb)) {
               
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $userFromDb;

                echo "Login successful! Welcome, $userFromDb";
                header("Location: ../frontend/options/index.html");
                exit;
               
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "No user found with that username.";
        }
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
