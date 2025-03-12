<?php
function main() {
    // Lê a capacidade da cabine (C)
    $c = intval(trim(fgets(STDIN)));

    // Lê o número total de alunos (A)
    $a = intval(trim(fgets(STDIN)));

    // Calcula o número máximo de alunos por viagem
    $alunosPorViagem = $c - 1;

    // Calcula o número mínimo de viagens
    $viagens = intval($a / $alunosPorViagem);

    // Se houver alunos restantes, adiciona mais uma viagem
    if ($a % $alunosPorViagem != 0) {
        $viagens++;
    }

    // Imprime o resultado
    echo $viagens . "\n";
}

main();
?>