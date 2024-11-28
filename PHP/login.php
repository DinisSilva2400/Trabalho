<?php
// Inicia a sessão
session_start();

// Inclui a conexão com a base de dados
require_once '../basedados/basedados.h.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']); 
    

    // Verifica se o email e senha foram fornecidos
    if (empty($email) || empty($senha)) {
        $_SESSION['erro'] = "Preencha todos os campos!";
        header("Location: index.php");
        exit();
    }

    // Prepara a consulta para buscar o utilizador pelo email
    $sql = "SELECT id, nome, senha, estado, perfil FROM utilizadores WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $senha_md5 = md5($senha);
    

    // Verifica se encontrou o utilizador
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $estado = $user['estado'];
        // Verifica a senha
        if ($senha_md5 === $user['senha']) {
            if($estado == "Ativo"){// Login bem-sucedido
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['estado'] = $user['estado'];
            $_SESSION['perfil'] = $user['perfil'];
            header("Location: index.php"); // Redireciona para a página inicial
            }else{
                $_SESSION['erro'] = "Conta não Ativa!!!";
                header("Location: index.php");
                exit();
            }  
        } else {
            // Senha incorreta
            $_SESSION['erro'] = "Credenciais inválidas!";
            header("Location: index.php"); // Redireciona de volta para o login
            exit();
        }
    } else {
        // Utilizador não encontrado
        $_SESSION['erro'] = "Credenciais inválidas!";
        header("Location: index.php"); // Redireciona de volta para o login
        exit();
    }
    
    exit();
}
?>

