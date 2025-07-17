<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];
    $result = "";

    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Cannot divide by zero.";
            }
            break;
        default:
            $result = "Invalid operation selected.";
    }
} else {
    $result = "Invalid request.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator Result</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .result-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
        }
        a {
            text-decoration: none;
            color: #007bff;
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="result-box">
        <h2>Result: <?= $result ?></h2>
        <a href="index.html">🔙 Back to Calculator</a>
    </div>
</body>
</html>
