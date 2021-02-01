<?php

class Guestbook {
    public function __construct($fichier) {
        $this->fichier = $fichier;
    }

    public function addMessage(Message $message) {
        // add message to db
    }

    public function getMessages(): array {
        // get message from db
    }
}