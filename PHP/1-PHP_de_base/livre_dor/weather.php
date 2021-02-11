<?php
require "Class/OpenWeather.php";



$meteo = new OpenWeather();
$temps = $meteo->getForecast('Paris');
var_dump($meteo->getForecast('Paris'));