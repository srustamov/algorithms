<?php


function maxElement($n, $maxSum, $index) {

    if($n == 1) {
        return $maxSum;
    }

    $right = $index;

    $left = $index;

    $count = 1;

    $limitRight = $n - 1;

    while($n <= $maxSum && ($left > 0 || $right < $limitRight)){

        $n += $right - $left + 1;

        if($left > 0) {
            $left--;
        }

        if($right < $limitRight) {
            $right++;
        }

        $count++;
    }

    if($n < $maxSum) {
        $count += ($maxSum - $n)/($right - $left + 1) + 1;
    }

    return $count-1;
}