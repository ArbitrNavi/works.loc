<?php


$count = 5;

$array = [
    'currentArray' => [],
    'mapArray'     => [],
];

for ($i = 1; $i <= 4; $i++){
    $array['mapArray'][$i] = $i;
}

for ($i = 1; $i <= $count; $i++){
    $array['currentArray'] = array_filter(
        $array['mapArray'],
        function ($key) use ($i){
            return $key != $i;
        }, ARRAY_FILTER_USE_KEY);

    $array['currentArray'][$i] = $i;


    echo '<pre>';
    print_r($array['currentArray']);
    echo '</pre>';
}