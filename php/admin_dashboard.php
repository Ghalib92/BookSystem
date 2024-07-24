<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .container a {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-decoration: none;
        }

        .container a:hover {
            text-decoration: underline;
        }

        .container form {
            margin-bottom: 30px;
        }

        .container form label {
            display: block;
            margin-bottom: 5px;
        }

        .container form input,
        .container form select,
        .container form textarea,
        .container form button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .container form textarea {
            height: 100px;
        }

        .container form button {
            background: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .container form button:hover {
            background: #575757;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <a href="logout.php">Logout</a>
        <h3>Add Book</h3>
        <form action="add_book.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
            <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="local">Local</option>
                <option value="vip">VIP</option>
            </select>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
            <button type="submit">Add Book</button>
        </form>

        <h3>Remove Book</h3>
        <form action="remove_book.php" method="post">
            <label for="book_id">Book ID:</label>
            <input type="number" id="book_id" name="book_id" required>
            <button type="submit">Remove Book</button>
        </form>
    </div>
</body>
</html>
