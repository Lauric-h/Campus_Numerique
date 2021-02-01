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

    public function getErrors(): array {
        // logs errors
        $errors = [];
        if (empty($this->username) || strlen($this->username) <= 3) {
            $errors = ['Nom d\'utilisateur invalide'];
        }
        if (empty($this->message) || strlen($this->message) <= 10) {
            $errors = array_push($errors, 'Message non valide');
        }
        return ['Nom d\'utilisateur invalide', 'Message non valide'];
    }

    public function toHTML(): string {
        // format to HTML
        return "<p><strong><?= $this->username ?></strong><em>le <?= $this->date ?> à 12h00</em><br>
        <?= $this->message ?>
        </p>";
    }
}

