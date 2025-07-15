<?php

$username = $_POST['username'];
$password = $_POST['password'];

// Redirect to info.php with data in URL
header("Location: info.php?username=" . urlencode($username) . "&password=" . urlencode($password));
exit;
?>
