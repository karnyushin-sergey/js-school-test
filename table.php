<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
        padding: 3px;
    }
</style>

<?php

$n = 5;

function drawTable(int $n) {

    $tableArray = [];

    $directions = [
        ['x' => 1, 'y' => 0],
        ['x' => 0, 'y' => 1],
        ['x' => -1, 'y' => 0],
        ['x' => 0, 'y' => -1],
    ];

    $dirIndex = 0;
    $x = 1;
    $y = 1;

    for ($i = 1; $i <= $n*$n; $i++) {
        $tableArray[$y][$x] = $i;
        $nX = $x + $directions[$dirIndex]['x'];
        $nY = $y + $directions[$dirIndex]['y'];
        if (($nX > $n) || ($nY > $n) || ($nX < 1) || ($nY < 1) || isset($tableArray[$nY][$nX])) {
            $dirIndex = ($dirIndex === 3) ? 0 : ($dirIndex + 1);
        }
        $x = $x + $directions[$dirIndex]['x'];
        $y = $y + $directions[$dirIndex]['y'];
    }

    $s = '<table>';
    for ($i = 1; $i <= $n; $i++) {
        $s .= '<tr>';
        for ($j = 1; $j <= $n; $j++) {
            $s .= "<td>{$tableArray[$i][$j]}</td>";
        }
        $s .= '</tr>';
    }
    $s .= '</table>';

    echo $s;

}

drawTable($n);
