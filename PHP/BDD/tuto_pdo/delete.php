<?php
require_once 'database.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = $_POST['product'];
    deleteProduct($bdd, $product);
    header('Location: index.php');
}   