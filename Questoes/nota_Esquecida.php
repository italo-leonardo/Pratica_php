<?php
// Lê a nota conhecida (A)
$A = intval(fgets(STDIN));

// Lê a média das duas notas (M)
$M = intval(fgets(STDIN));

// Calcula a outra nota (B) usando a fórmula da média: M = (A + B) / 2
$B = (2 * $M) - $A;

// Exibe a outra nota
echo $B . "\n";
