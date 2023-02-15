<?php


$count = 5;

$array = [
    'currentArray' => [],
    'mapArray'     => [],
    'repeat' => 0,
];

for ($i = 1; $i <= 4; $i++){
    $array['mapArray'][$i] = $i;
}

for ($i = 1; $i < $count; $i++){


    echo '<pre>';
    print_r($array['mapArray']);
    echo '</pre>';
}