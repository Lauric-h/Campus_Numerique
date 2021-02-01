<?php 
require_once 'auth.php';

var_dump(isLoggedIn());
userLoggedIn ();

$title = "Dashboard";
require_once 'header.php';
$user = $_SESSION['login'];

?>

<main>

    <div>
        <h1>Hello, <?= $user ?>!</h1>

        <p> Vous êtes bien connecté </p>
    </div>

    <div> 
        <a href="logout.php">Se déconnecter</a>
    </div>

<?php require_once 'footer.php'; ?>