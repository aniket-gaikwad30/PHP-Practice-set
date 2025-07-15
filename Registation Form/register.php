<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = htmlspecialchars($_POST["name"]);
    $email    = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $phone    = htmlspecialchars($_POST["phone"]);
    $address  = htmlspecialchars($_POST["address"]);


    echo "<h1>Registration Successful</h1>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Password:</strong> $password</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Address:</strong> $address</p>";
} else {
    echo "Invalid Request.";
}
?>
