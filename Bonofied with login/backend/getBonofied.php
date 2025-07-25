<?php
session_start();

$host = "127.0.0.1";  
$port = 3306;
$user = "root";
$pass = "mathematics";
$db   = "Bonofied";

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_POST['search'];
$stmt = $conn->prepare("SELECT * FROM students WHERE enrollment = ? OR name = ?");
$stmt->bind_param("ss", $search, $search);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $_SESSION['student'] = $row;
    header("Location: getpdf.php");
    exit;
} else {
    echo "<script>alert('No student found!'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
