<?php

class Guestbook {
    public function __construct($fichier) {
        $this->fichier = $fichier;
    }

    public function addMessage(Message $message) {
        // canot use message as array -> need to find way to access message datas
        // add message to db
        $username = $message['username'];
        $message = $message['message'];
        $insert = $this->fichier->prepare(
            'INSERT INTO users(username, message, date)
             VALUES(?, ?, NOW()');
        $insert->execute(array($username, $message));
    }

    //public function getMessages(): array {
        // get message from db
    //}
}