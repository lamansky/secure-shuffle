<?php
namespace Lamansky\SecureShuffle;

function shuffle (array &$arr) : void {
    $arr = array_values($arr);
    $length = count($arr);
    for ($i = $length - 1; $i > 0; $i--) {
        $j = random_int(0, $i);
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }
}

function shuffled (array $arr) : array {
    shuffle($arr);
    return $arr;
}

function shuffle_assoc (array &$arr) : void {
    $arr = shuffled_assoc($arr);
}

function shuffled_assoc (array $arr) : array {
    $keys = shuffled(array_keys($arr));
    $shuffled = [];
    foreach ($keys as $key) { $shuffled[$key] = $arr[$key]; }
    return $shuffled;
}
