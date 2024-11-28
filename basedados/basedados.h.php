<?php

// Configuração da base de dados
$servidor = "localhost"; // Endereço do servidor (pode ser 127.0.0.1)
$utilizador = "root"; // Utilizador do MySQL
$senha = ""; // Palavra-passe do MySQL
$baseDados = "felixbus"; // Nome da base de dados

// Criar a ligação
$conn = new mysqli($servidor, $utilizador, $senha, $baseDados);

// Verificar ligação
if ($conn->connect_error) {
    die("Erro de ligação: " . $conn->connect_error);
}

?>