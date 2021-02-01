<?php

function isLoggedIn ():bool {
    if (session_status() === PHP_SESSION_NONE ) {
        session_start();
    }
    return !empty($_SESSION['loggedIn']);
}

function userLoggedIn ():void {
    if(!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

?>