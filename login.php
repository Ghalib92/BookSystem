<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="php/process_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="admin">Administrator</option>
                <option value="local">Local User</option>
                <option value="vip">VIP User</option>
            </select>
            <button type="submit">Login</button>
        </form>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>
