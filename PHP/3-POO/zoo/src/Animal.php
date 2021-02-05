<?php


namespace App;

abstract class Animal
{
    private string $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() : string {
        return $this->name;
    }

    abstract protected function getNoise(): string;

    public function noise(): string {
        return $this->getNoise();
    }

}