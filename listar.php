<?php

$arquivo = 'dados.csv';

echo "<h2>Lista de Cadastros</h2>";

if (file_exists($arquivo)) {

    $file = fopen($arquivo, 'r');

    echo "<table border='1' cellpadding='10'>";

    while (($linha = fgetcsv($file)) !== false) {
        echo "<tr>";

        foreach ($linha as $coluna) {
            echo "<td>$coluna</td>";
        }

        echo "</tr>";
    }

    echo "</table>";

    fclose($file);

} else {
    echo "Nenhum cadastro encontrado.";
}
?>
