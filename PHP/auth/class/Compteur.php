<?php

class Compteur {
    protected $file;

    public function __construct (string $file) 
    {
        $this->file = $file;
    }

    public function increment (): void 
    {
        $compteur = 1;
        if (file_exists($this->file)) {
            $compteur = (int)file_get_contents($file);
            $compteur++;
        }
        file_put_contents($file, $compteur);
    }

    public function get (): int
    {
        if (!file_exists($this->file)) {
            return 0;
        }
        return (int)file_get_contents($this->file);
    }
}

?>