<?php

class Message {
    public $username;
    public $message;
    public $date;

    public function __construct(string $username, string $message, DateTime $date = null) {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date;
    }

    public function isValid(): bool {
        // check if message and username are valid
        if (empty($this->username) || empty($this->message)) {
            return false;
        }
        if (strlen($this->username) <= 3 || strlen($this->message) <= 10) {
            return false;
        }
        return true;
    }

    // logs errors
    public function getErrors(): array{
        $errors = [];
        if (!$this->isValid()) {
            if (empty($this->username)) {
                $errors['username'] = 'Vous devez entrer un nom';
            } else if (strlen($this->username) < 3) {
                $errors['username'] = 'Le pseudo doit être supérieur à 3 lettres';
            }
            if (empty($this->message)) {
                $errors['message'] = 'Vous devez entrer un message';
            } else if (strlen($this->message) < 10) {
                $errors['message'] = 'Le message doit être supérieur à 10 lettres';
            }
        }
        return $errors;
    }
}

