<?php 

$erreur = null;

if (!empty($_POST['login'] && !empty($_POST['password']))) {
    if ($_POST['login'] == 'lauric' && $_POST['password'] == 'lolo') {
       session_start();
       $_SESSION['loggedIn'] = 1;
       $_SESSION['login'] = $_POST['login'];
       header('Location: dashboard.php');
    } else {
        $error = "Identifiants incorrects";
    }
}

require_once 'auth.php';
if (isLoggedIn()) {
    header('Location: dashboard.php');
}

require_once 'header.php';
$title = "Login";
?>

<main>

    <h1>Login</h1>
    <?php if($error): ?>
     <div><?= $error ?></div>
    <?php endif ?>
    <form method="post" action="">
        <label for="login">Login</label>
        <input type="text" name="login" autocomplete="off" placeholder="Login">

        <label for="password">Password</label>
        <input type="password" name="password" autocomplete="off" placeholder="Login">

        <button type="submit">Login →</button>
    </form>

</main>

<?php require_once 'footer.php'; ?>