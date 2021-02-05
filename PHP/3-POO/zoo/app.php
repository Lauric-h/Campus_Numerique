<?php
require __DIR__ . '/vendor/autoload.php';
use App\Animals\Fish;
use App\Animals\BubbleFish;
use App\Animals\CatFish;
use App\Animals\ClownFish;
use App\Animals\Dove;
use App\Animals\Elephant;
use App\Animals\Parrot;
use App\Animals\Whale;
use App\Animals\Zebra;
use App\Zoo;

$animalList = [
    Fish::class => 5,
    BubbleFish::class => 3,
    CatFish::class => 2,
    ClownFish::class => 1,
    Elephant::class => 2,
    Zebra::class => 1,
    Parrot::class => 10,
    Dove::class => 2
];

$animals = [];

foreach($animalList as $key => $value) {
    while ($value > 0) {
        $animals[] = new $key($key . $value);
        $value--;
    }
}

$zoo = new Zoo();

foreach($animals as $value) {
   Zoo::addAnimal($value);
}

//$zoo->getFence()->toString();
//$zoo->getAviary()->toString();
//$zoo->getAquarium()->toString();

//var_dump($zoo->getFence());
//var_dump($zoo->getAviary());
//var_dump($zoo->getAquarium());

Zoo::visitTheZoo();





