<?php

function writeData() {
    $file = "results/results.txt";
    file_put_contents($file, "");
    foreach ($_POST as $key => $value) {
        file_put_contents($file, "$key : $value\n", FILE_APPEND);
    }
}

function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function isEmpty($data, $reason) {
    if(empty($data)) {
        return true;
    } 
    return false;
}

function validateName($data) {
    if (!preg_match("/^[a-zA-Z-' ]*$/",$data)) {
        return false;
    } 
    return true;
}

function validateEmail() {
   if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
       return false;
   } 
   return true;
}

function validateMessage($data) {
    if (strlen($data) < 5) {
        return false;
    } 
    return true;
}

function validateForm($name, $email, $message, $reason) {
    if ($name == true && $email == true && $message == true && $reason == true) {
        return true;
    }
    return false;

}

?>


