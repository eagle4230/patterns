<?php

include 'array_create.php';
include 'bubble.php';
include 'insert.php';

$rand_array = array_fill_rand(1000000);
//print_r($rand_array);

$start = microtime(true);
sort($rand_array);
echo "Сортировка штатным 'sort()'=> " . (microtime(true) - $start) . PHP_EOL;

$start = microtime(true);
bubble($rand_array);
echo "Сортировка 'пузырьком' => " . (microtime(true) - $start) . PHP_EOL;

$start = microtime(true);
insertSort($rand_array);
echo "Сортировка 'вставкой' => " . (microtime(true) - $start) . PHP_EOL;
