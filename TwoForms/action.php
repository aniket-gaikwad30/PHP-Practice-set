<?php
session_start();

if (isset($_POST['name']) && isset($_POST['email'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
}

if (isset($_POST['feedback'])) {
    $_SESSION['feedback'] = $_POST['feedback'];
}

// Redirect to show.php
header("Location: show.php");
exit();
?>
