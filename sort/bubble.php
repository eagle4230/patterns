<?php

function bubble($rand_array)
{
    $count_elements = count($rand_array);
    $iterations = $count_elements - 1;

    for ($i=0; $i < $count_elements; $i++) {
        $changes = false;
        for ($j=0; $j < $iterations; $j++) {
            if ($rand_array[$j] > $rand_array[($j + 1)]) {
                $changes = true;
                list($rand_array[$j], $rand_array[($j + 1)]) = array($rand_array[($j + 1)], $rand_array[$j]);
            }
        }
        $iterations--;
        if (!$changes) {
            return $rand_array;
        }
    }
    return $rand_array;
}