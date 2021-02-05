<?php


namespace App\Animals;
use App\Animal;
use App\Interfaces\CanFly;
use App\Interfaces\CanSwim;
use App\Interfaces\CanWalk;


class Dove extends Animal implements CanSwim, CanWalk, CanFly
{

    protected function getNoise(): string
    {
        return 'Rou Rouuu';
    }
}