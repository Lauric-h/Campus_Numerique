<?php
require_once 'database.php';
require_once 'web/header.php';
require_once 'functions.php';
require 'Class/Message.php';
require 'Class/Guestbook.php';


// connect to DB
$bdd = getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = new DateTime();
    $message = new Message(testInput($_POST['username']), testInput($_POST['message']), $date);
    if ($message->isValid()) {
        // add to DB
        $guestbook = new Guestbook($bdd);
        $guestbook->addMessage($message);
    } else {
        $errors = $message->getErrors();
    }
}

$guestbook = new Guestbook($bdd);
?>

<form method="POST" action="">
    <?php if (!empty($errors['username'])) {
        echo "<p>" . $errors['username']. "</p>";
    }
    ?>
    <input value="<?= $_POST['username'] ?? '' ?>" type="text" name="username" placeholder="Nom" autocomplete="off">
    <?php if (!empty($errors['message'])) {
        echo "<p>" . $errors['message']. "</p>";
    }
    ?>
    <textarea name="message" placeholder="Votre message...">"<?= $_POST['message'] ?? '' ?>"</textarea>
    <button type="submit">Envoyer</button>
</form>

<div>
    <?php if (!empty($messages)): ?>
        <h2>Messages</h2>
        <!-- add condition if guestbook is empty & display msg --> 
        <?php foreach($messages as $message): ?>
            <?= $message->toHTML(); ?>
        <?php endforeach ?>
    <?php endif ?>
        
</div>