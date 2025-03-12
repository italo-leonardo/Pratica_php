<?php
function hungarianAlgorithm($matrix) {
    $n = count($matrix);
    $u = array_fill(0, $n, 0);
    $v = array_fill(0, $n, 0);
    $p = array_fill(0, $n, -1);
    $way = array_fill(0, $n, -1);

    for ($i = 0; $i < $n; $i++) {
        $p[0] = $i;
        $j0 = 0;
        $minv = array_fill(0, $n, PHP_INT_MAX);
        $used = array_fill(0, $n, false);

        do {
            $used[$j0] = true;
            $i0 = $p[$j0];
            $delta = PHP_INT_MAX;
            $j1 = -1;

            for ($j = 0; $j < $n; $j++) {
                if (!$used[$j]) {
                    $cur = $matrix[$i0][$j] - $u[$i0] - $v[$j];
                    if ($cur < $minv[$j]) {
                        $minv[$j] = $cur;
                        $way[$j] = $j0;
                    }
                    if ($minv[$j] < $delta) {
                        $delta = $minv[$j];
                        $j1 = $j;
                    }
                }
            }

            for ($j = 0; $j < $n; $j++) {
                if ($used[$j]) {
                    $u[$p[$j]] += $delta;
                    $v[$j] -= $delta;
                } else {
                    $minv[$j] -= $delta;
                }
            }

            $j0 = $j1;
        } while ($p[$j0] != -1);

        do {
            $j1 = $way[$j0];
            $p[$j0] = $p[$j1];
            $j0 = $j1;
        } while ($j0 != 0);
    }

    $result = array();
    for ($j = 0; $j < $n; $j++) {
        $result[$p[$j]] = $j + 1;
    }
    ksort($result);
    return array_values($result);
}

function main() {
    $n = intval(trim(fgets(STDIN)));
    $matrix = array();

    for ($i = 0; $i < $n; $i++) {
        $row = array_map('intval', explode(' ', trim(fgets(STDIN))));
        $matrix[] = $row;
    }

    $result = hungarianAlgorithm($matrix);
    echo implode(' ', $result) . "\n";
}

main();
?>