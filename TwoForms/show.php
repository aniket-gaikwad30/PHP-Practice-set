<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Submission</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f5f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        #main {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 90%;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        p {
            font-size: 18px;
            color: #444;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        strong {
            color: #111;
        }

        @media (max-width: 500px) {
            #main {
                padding: 20px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div id="main">
        <h1>User Details</h1>
        
        <?php if (isset($_SESSION['name']) && isset($_SESSION['email'])): ?>
            <p><strong>Name:</strong> <?= htmlspecialchars($_SESSION['name']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?></p>
        <?php else: ?>
            <p>No user details submitted yet.</p>
        <?php endif; ?>

        <?php if (isset($_SESSION['feedback'])): ?>
            <p><strong>Feedback:</strong> <?= nl2br(htmlspecialchars($_SESSION['feedback'])) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
