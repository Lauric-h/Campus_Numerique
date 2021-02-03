<?php

class Message {
    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;
    public $username;
    public $message;
    public $date;

    public function __construct(string $username, string $message, DateTime $date = null) {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date;
    }

    public function isValid(): bool {
        return empty($this->getErrors());
    }

    // logs errors
    public function getErrors(): array{
        $errors = [];
        if (strlen($this->username) < self::LIMIT_USERNAME) {
            $errors['username'] = 'Le nom doit être supérieur à 3 lettres';
        }
        if (strlen($this->message) < self::LIMIT_MESSAGE) {
            $errors['message'] = 'Le message doit être supérieur à 10 lettres';
        }
        return $errors;
    }
}

