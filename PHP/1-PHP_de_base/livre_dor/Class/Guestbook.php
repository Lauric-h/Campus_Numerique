<?php

class Guestbook {
    private $fichier;
    public function __construct($fichier) {
        $this->fichier = $fichier;
    }

    // add message to db
    public function addMessage(Message $message) {
        $username = $message->username;
        $date = $message->date;
        $message = $message->message;
        $insert = $this->fichier->prepare(
            'INSERT INTO users(username, message, date)
             VALUES(?, ?, ?)');
        $insert->execute(array($username, $message, $date));
    }

    //get message from db
    public function getMessages() {
        $messageList = $this->fichier->query('SELECT username, message, date FROM users ORDER BY date DESC');
        while ($row = $messageList->fetch()) {
            $messages[] = new Message($row['username'], $row['message'], new DateTime("@" . $row['date']));
        }
        return $messages;
    }
}