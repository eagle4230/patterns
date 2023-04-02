<?php


$arr = [1, 2, 3, 4, 3, 5];
echo json_encode($arr) . PHP_EOL;

$val = 3;

foreach ($arr as $key => $value) {
    if ($value == $val) {
        unset($arr[$key]);
    }
}

echo json_encode($arr) . PHP_EOL;