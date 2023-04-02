<?php

function array_fill_rand($limit)
{
    $limit = (int)$limit;
    $array = array();

    for ($i=0; $i<$limit; $i++)
        {
            $array[$i] = rand();
        }

    return $array;
}
