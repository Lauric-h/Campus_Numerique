<?php


namespace App;



class Enclosure
{
    public array $animals = [];
    public function addAnimal(Animal $animal) {
        $this->animals[] = $animal;
        //array_push($this->animals, $animal);
    }
    public function toString() {
        foreach($this->animals as $value) {
            echo "Le {$value->getName()} fait {$value->noise()} \n";
        }
    }
}