<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['role'] = $role;

            if ($role == 'admin') {
                header("Location: admin_dashboard.php");
            } elseif ($role == 'local') {
                header("Location: local_dashboard.php");
            } elseif ($role == 'vip') {
                header("Location: vip_dashboard.php");
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with the given username and role.";
    }

    $stmt->close();
    $conn->close();
}
?>
