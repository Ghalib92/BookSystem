<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO books (title, author, category, content) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $author, $category, $content);

    if ($stmt->execute()) {
        echo "Book added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
