<?php
// Inicia a sessão
session_start();

// Verifica se o utilizador é administrador
if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'administrador') {
    $_SESSION['erro'] = "Acesso negado!";
    header("Location: index.php");

    exit();
}


// Inclui a conexão com a base de dados
require_once '../basedados/basedados.h.php';



// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']);
    $novo_estado = trim($_POST['novo_estado']);

    // Verifica se o estado é válido
    if (!in_array($novo_estado, ['ativo', 'suspenso'])) {
        $_SESSION['erro'] = "Estado inválido!";
        header("Location: administrador.php");
        exit();
    }

    // Atualiza o estado do utilizador na base de dados
    $sql = "UPDATE utilizadores SET estado = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $novo_estado, $id);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Estado do utilizador atualizado com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao atualizar o estado do utilizador.";
    }

    header("Location: administrador.php");
    exit();
}
?>