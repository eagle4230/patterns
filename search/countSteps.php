<?php

include 'array_create.php';
include 'binary.php';

$rand_array = array_fill_rand(1000);
//print_r($rand_array);

$findElement = $rand_array[990];
echo "Ищем элемент с индексом 990 и со значение = " . $findElement . PHP_EOL;

binarySearch($rand_array, $findElement);
