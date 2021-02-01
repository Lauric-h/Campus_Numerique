<?php 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['page'])) {
        switch($_GET['page']) {
            case "contact":
                include 'web/contact.php';
                break;
            case "cv":
                include 'web/cv.php';
                break;
            case "home":
                include 'web/home.php';
                break;
            default:
                include "web/home.php";
        }
    } else {
        include 'web/home.php';
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['page'] == 'contact'){
    include 'web/contact.php';
}

?>




