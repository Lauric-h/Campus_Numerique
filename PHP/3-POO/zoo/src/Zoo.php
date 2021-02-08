<?php


namespace App;
use App\Interfaces\CanFly;
use App\Interfaces\CanSwim;
use App\Interfaces\CanWalk;

class Zoo
{
    private static ?Enclosure $aquarium = null;
    private static ?Enclosure $fence = null;
    private static ?Enclosure $aviary = null;

    public static function getAquarium(): Enclosure  {
        return self::$aquarium;
    }
    public static function getAviary(): Enclosure {
        return self::$aviary;
    }

    public static function getFence(): Enclosure  {
        return self::$fence;
    }

    public static function addAnimal(Animal $animal) {
        if ($animal instanceof CanFly) {
            if (!isset(self::$aviary)) {
                self::$aviary = new Enclosure();
            }
            self::$aviary->addAnimal($animal);
            return;
        }
        if ($animal instanceof CanWalk) {
            if (!isset(self::$fence)) {
                self::$fence = new Enclosure();
            }
            self::$fence->addAnimal($animal);
            return;
        }
        if ($animal instanceof CanSwim) {
            if (!isset(self::$aquarium)) {
                self::$aquarium = new Enclosure();
            }
            self::$aquarium->addAnimal($animal);
            return;
        }
    }

    public static function visitTheZoo() {
        echo "Fence : \n";
        self::$fence->toString();
        echo "Aviary : \n";
        self::$aviary->toString();
        echo "Aquarium : \n";
        self::$aquarium->toString();
    }
}