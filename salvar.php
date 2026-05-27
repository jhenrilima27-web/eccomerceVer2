<?php

// Verifica se veio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pegando os dados
    $nome = $_POST['Nome'] ?? '';
    $cpf = $_POST['CPF'] ?? '';
    $email = $_POST['Email'] ?? '';
    $senha = $_POST['Senha'] ?? '';
    $telefone = $_POST['Telefone'] ?? '';
    $cep = $_POST['CEP'] ?? '';
    $estado = $_POST['Estado'] ?? '';
    $cidade = $_POST['Cidade'] ?? '';
    $bairro = $_POST['Bairro'] ?? '';
    $complemento = $_POST['Complemento'] ?? '';

    // Nome do arquivo (vai virar "Excel")
    $arquivo = 'dados.csv';

    // Verifica se o arquivo já existe
    $novoArquivo = !file_exists($arquivo);

    // Abre o arquivo para escrever (append)
    $file = fopen($arquivo, 'a');

    // Se for novo, escreve o cabeçalho
    if ($novoArquivo) {
        fputcsv($file, [
            'Nome', 'CPF', 'Email', 'Senha', 'Telefone',
            'CEP', 'Estado', 'Cidade', 'Bairro', 'Complemento'
        ], ',', '"', '\\');
    }

    // Escreve os dados
    fputcsv($file, [
        $nome, $cpf, $email, $senha, $telefone,
        $cep, $estado, $cidade, $bairro, $complemento
    ], ',', '"', '\\');

    fclose($file);

    header("Location: pagLogin.html");
    exit;

} else {
    echo "Acesso inválido.";
}
?>