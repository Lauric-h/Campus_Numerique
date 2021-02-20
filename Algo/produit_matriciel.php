<?php


// on prend la première ligne de A
// On prend la première colonne de B
// On multiplie la 1ère case de la première ligne de A avec la première case de la première colonne de B
// [
//     [Aa, Ab, Ac]
//     [Ad, Ae, Af]
//     [Ag, Ah, Ai]
// ]
// [
//     [Ba, Bb, Bc]
//     [Bd, Be, Bf]
//     [Bg, Bh, Bi]
// ]
// (Aa * Ba) + (Ab * Bd) + (Ac * Bg)

/**
* Multiply two matrices together.
* @param array
* @param array
* @return array? null
*/

function multiply_matrix(array $one, array $two) {
    $result = [];
    
    for ($i = 0; $i < count($one); $i++) {
        for ($j = 0; $j < count($one); $j++) {
            $result[$i][$j] = $one[$i][$j] * $two[$i][$j] + $one[$i][$j + 1] * $two[$i][$j + 1];
        }
    }
    
    return $result;
}

$one = [
    [1, 2],
    [3, 4]
];

$two = [
    [5, 6],
    [7, 8]
];

multiply_matrix($one, $two);
