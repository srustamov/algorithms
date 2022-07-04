<?php

namespace Binary;

/**
 * @param int [] $array
 * @param int $number
 * @return false|int
 */
function search(array $array, int $number): false|int
{
    $start = 0;

    $end = count($array) - 1;

    while ($start <= $end) {

        $middle = floor(($start + $end) / 2);

        if ($array[$middle] == $number) {
            return $middle;
        }

        if ($array[$middle] < $number) {
            $start = $middle + 1;
        } else {
            $end = $middle - 1;
        }
    }

    return false;
}












