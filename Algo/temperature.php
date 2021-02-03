<?php

$tableauTemp = [1.2 , 5, 2, 3, -0.5, 0.02];

function getTemp($arr) {
    $positiveTemp = [];
    $negativeTemp = [];
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == 0) {
            return '0 est le plus proche de zéro, duh';
        }
        if ($arr[$i] > 0) {
            array_push($positiveTemp, $arr[$i]);
        }
        if ($arr[$i] < 0) {
            array_push($negativeTemp, $arr[$i]);
        }
    }

    if (count($positiveTemp) == 0) {
        return max($negativeTemp);
    }
    if (count($negativeTemp) == 0) {
        return $minTemp = min($positiveTemp);
    }

    $minTemp = min($positiveTemp);
    $maxTemp = max($negativeTemp);

    if (($maxTemp + $minTemp) < 0) {
        return $minTemp;
    } elseif (($maxTemp + $minTemp) > 0) {
        return $maxTemp;
    } else {
        return $minTemp . ' et ' . $maxTemp . ' sont aussi proches de 0';
    }
}

$temp = [1, -0.2, 55, 0.1, -0.05];


function getTempe($arr) {
    $closest = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($closest == 0) {
            $closest = $arr[$i];
        } elseif ($arr[$i] > 0 && $arr[$i] <= abs($closest)) {
            $closest = $arr[$i];
        } elseif ($arr[$i] < 0 && abs($arr[$i]) < abs($closest)) {
            $closest = $arr[$i];
        }
    }
    return $closest;
}

echo getTempe($tableauTemp);



?>