<?php

$array1 = [11, 22, 48, 54];
$array2_1 = [11, 48, 54, 22];
$array2_2 = [11, 12, 48, 54];

function check(array $a1, array $a2) {
    return (count(array_diff($a1, $a2)) === 0) && (count(array_diff($a2, $a1)) === 0);
}

var_dump(check($array1, $array2_1));
var_dump(check($array1, $array2_2));
