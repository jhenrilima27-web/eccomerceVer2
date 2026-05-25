<?php

// RETORNO JSON  produtos_pdo.php
header("Content-Type: application/json; charset=UTF-8");

try {

    // CONFIGURAÇÃO DO BANCO
    $host    = "sql302.infinityfree.com";
    $banco   = "if0_41679144_angel_db";
    $usuario = "if0_41679144";
    $senha   = "XSjVvTFvxk5m";

    // CONEXÃO PDO
    $pdo = new PDO( "mysql:host=$host;dbname=$banco;charset=utf8",
        $usuario,  $senha   );

    // CONFIGURA PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // SQL
    $sql = "SELECT * FROM produtos";
    // PREPARA A QUERY
    $stmt = $pdo->prepare($sql);
    // EXECUTA
    $stmt->execute();

    // BUSCA TODOS OS DADOS
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // CONVERTE TIPOS
    foreach($produtos as &$produto){
        $produto["id"] = (int)$produto["id"];
        $produto["preco"] = (float)$produto["preco"];
    }

    // RETORNA JSON
    echo json_encode(
        $produtos,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

} catch(PDOException $erro){

    // ERRO EM JSON
    echo json_encode([
       "erro" => $erro->getMessage()
    ]);
}

?>
