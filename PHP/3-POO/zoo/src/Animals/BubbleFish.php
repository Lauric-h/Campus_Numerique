<?php


namespace App\Animals;
use App\Animal;
use App\Interfaces\CanSwim;
use App\Animals\Fish;

class BubbleFish extends Fish implements CanSwim {}