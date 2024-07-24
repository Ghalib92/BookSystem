<?php
session_start();
if ($_SESSION['role'] !== 'vip') {
    header("Location: ../login.php");
    exit();
}

include 'db.php';

$result = $conn->query("SELECT id, title, author, content FROM books WHERE category = 'vip'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIP User Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: #444;
        }

        a {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }

        h3 {
            margin-top: 0;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            font-size: 24px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background: #f9f9f9;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        li h4 {
            margin: 0;
            color: #333;
        }

        li p {
            margin: 5px 0;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 15px;
            }

            h2 {
                font-size: 20px;
            }

            h3 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>VIP User Dashboard</h2>
        <a href="logout.php">Logout</a>
        <h3>Exclusive Books</h3>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($row['author']); ?></p>
                    <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
