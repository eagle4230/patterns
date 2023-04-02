<?php

function binarySearch ($myArray, $num) {
//определяем границы массива
    $left = 0;
    $right = count($myArray) - 1;

    $i = 1;
    while ($left <= $right) {
        //находим центральный элемент с округлением индекса в меньшую сторону
        $middle = floor(($right + $left)/2);
        echo "Шаг " . $i . PHP_EOL;
        $i++;
        //если центральный элемент и есть искомый
        if ($myArray[$middle] == $num) {
            return $middle;
        }
        elseif ($myArray[$middle] > $num) {
            //сдвигаем границы массива до диапазона от left до middle-1
            $right = $middle - 1;
        }
        elseif ($myArray[$middle] < $num) {
            $left = $middle + 1;
        }
    }
    return null;
}
