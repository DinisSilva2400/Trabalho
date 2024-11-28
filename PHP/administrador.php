<?php
require_once '../basedados/basedados.h.php';

// Busca todos os utilizadores da base de dados
$sql = "SELECT id, nome, email, estado, perfil FROM utilizadores";
$result = $conn->query($sql);

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'administrador') {
    $_SESSION['erro'] = "Acesso negado!";
    header("Location: index.php");

    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Utilizadores</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <header>
        
    </header>
    <h1>Gestão de Utilizadores</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Perfil</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['nome']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['estado']); ?></td>
                <td><?php echo htmlspecialchars($user['perfil']); ?></td>
                <td>
                    <form action="altera_estado.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <select name="novo_estado">
                            <option value="ativo" <?php if ($user['estado'] === 'ativo') echo 'selected'; ?>>Ativo</option>
                            <option value="suspenso" <?php if ($user['estado'] === 'suspenso') echo 'selected'; ?>>Suspenso</option>
                        </select>
                        <button type="submit">Alterar Estado</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>