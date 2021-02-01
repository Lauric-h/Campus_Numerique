<?php

class Creneau {
    public $debut;

    public $fin;

    public function __construct (int $debut, int $fin) 
    {
        $this->debut = $debut;
        $this->fin = $fin;
    }

    public function toHTML (): string {
        return "de {$this->debut}h à {$this->fin}h";
    }

    public function includeHour(int $hour): bool 
    {
        return $hour >= $this->debut && $hour <= $this->fin;
    }

    public function intersect (Creneau $creneau): bool {
        return $this->includeHour($creneau->debut) ||
            $this->includeHour($creneau->fin) ||
            ($this->debut > $creneau->debut && $this->fin < $creneau->fin);
    }
}