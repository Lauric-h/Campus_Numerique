<?php

// --- loops --- 
// for 
// for ($i = 0; $i < 10; $i++) {
//     echo $i;
// }

// while 
// $i = 11;
// while($i < 20) {
//     echo "$i\n";
//     $i++;
// }

// do while
// $i = 0;
// do {
//     echo $i;
//     $i++;
// } while ($i < 10);

// --- tableaux --- 

// $nums = [1, 2, 3, 4, 5, 6, 7];
// echo $nums[4];

// $villes = array('Paris', 'Annecy', 'Faverges');
// echo $villes[1];

// $cars = [
//     ['clio', 'twingo'],
//     ['focus', 'fiesta'],
//     ['polo', 'golf']
// ];
// echo $cars[1][0];

// $nba = array(
//     array(
//         "Los Angeles" => "Lakers",
//         "Denver" => "Nuggets"
//     ),
//     array(
//         "Toronto" => "Raptors",
//         "Miami" => "Heat"
//     )
//     );
// echo $nba[1]["Miami"];



$tableau = [
    [
        "nom" => "paul",
        "age" => 42,
        "donnees" => [10,20,30,40]
    ],
    [
        "nom" => "jackie",
        "age" => 32,
        "donnees" => [100,120,80,40]
    ],
    [
        "nom" => "tristan",
        "age" => 19,
        "donnees" => [110,230,430,540]
    ]
];
 
//afficher les 3 elements en utilisant un foreach : J'ai [age], je suis [nom], j'ai [nombre de donnees] qui sont [donnees1], [donnes2], [donnes3], [donnes4]

foreach($tableau as $key) {

    echo "J'ai " . $key["age"] . " ans, je suis " . $key['nom'] . "\r\n";
    echo "J'ai " . count($key['donnees']) . " données qui sont " . $key['donnees'][0];

}


?>

<!-- // 'j\'ai qui sont $key['donnes'][0], $key['donnes'][0], $key['donnes'][0], $key['donnes'][0]"; -->