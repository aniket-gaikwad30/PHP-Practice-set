<?php

$host = "127.0.0.1";  
$port = 3306;        
$user = "root";       
$pass = "mathematics"; 
$db   = "Bonofied";   

$conn = new mysqli($host, $user, $pass, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name       = $_POST['name'];
$enroll     = $_POST['enrollment'];
$branch     = $_POST['branch'];
$dob        = $_POST['dob'];
$phone      = $_POST['phone'];
$address    = $_POST['address'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO students (name, enrollment, branch, dob, phone, address) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $enroll, $branch, $dob, $phone, $address);

// Execute and check result
if ($stmt->execute()) {
    echo "<script>
        alert('Student added successfully!');
        window.location.href = '../frontend/options/index.html';
    </script>";
} else {
    echo "<script>
        alert('Error: " . $stmt->error . "');
        window.history.back();
    </script>";
}

$stmt->close();
$conn->close();
?>
