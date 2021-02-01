<?php 
if (session_status() === PHP_SESSION_NONE ) {
    session_start();
}
require_once 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <nav>
            <?php if (isLoggedIn()): ?>
                <a href="logout.php">Logout</a>
            <?php endif ?>
            <?php if (!isLoggedIn()): ?>
                <a href="login.php">Login</a>
            <?php endif ?>
        </nav>

    </header>
</body>
</html>