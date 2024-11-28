<?php

require_once '../basedados/basedados.h.php';

// Processar o formulário de registo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];
    $perfil = "cliente"; // Por padrão, o perfil é "cliente"
    $estado = "Pendente";
    


    if($senha != $confirmarSenha){
        echo("As senhas não são iguais!");
        exit;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo("Formato de email Inválido!");
        return;
    }

    $senhaIncript = md5($senha);

    // Inserir utilizador na base de dados
    $sql = "INSERT INTO utilizadores (nome, email, senha, perfil) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $senhaIncript, $perfil);


    if ($stmt->execute()) {
        echo "Registo realizado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>