<?php

class Guestbook {
    public function __construct($fichier) {
        $this->fichier = $fichier;
    }

    // add message to db
    public function addMessage(Message $message) {
        $username = $message->username;
        $message = $message->message;
        $insert = $this->fichier->prepare(
            'INSERT INTO users(username, message)
             VALUES(?, ?)');
        $insert->execute(array($username, $message));
    }

    //get message from db
    public function getMessages() {
        $messageList = $this->fichier->query('SELECT username, message, date FROM users ORDER BY date DESC');
        while ($row = $messageList->fetch()) {
            echo "<p><strong>" . $row['username'] . "</strong><em>le " . $row['date'] . "à 12h00</em><br>
            ". $row['message'] . "</p>";
        }
    }
}