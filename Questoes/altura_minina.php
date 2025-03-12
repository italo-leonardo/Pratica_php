<?php
function main() {
    // Lê a primeira linha: N (número de brinquedos) e H (altura de Carlitos)
    list($n, $h) = array_map('intval', explode(' ', trim(fgets(STDIN))));

    // Lê a segunda linha: alturas mínimas dos brinquedos
    $alturas = array_map('intval', explode(' ', trim(fgets(STDIN))));

    // Conta quantos brinquedos Carlitos pode aproveitar
    $contador = 0;
    foreach ($alturas as $altura) {
        if ($h >= $altura) {
            $contador++;
        }
    }

    // Imprime o resultado
    echo $contador . "\n";
}

main();
?>