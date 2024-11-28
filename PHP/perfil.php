<?php
session_start();
if (isset($_SESSION['erro'])) {
    echo "<p style='color: red;'>" . htmlspecialchars($_SESSION['erro']) . "</p>";
    unset($_SESSION['erro']); // Limpa o erro após exibir
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/logIn.css">
    <title>Flexibus</title>
</head>
<body>

<header>
    <h1>Flexibus</h1>
    <div class="logotipo-header">
        <img src="../img/logotipotb.png" alt="Logotipo flexibus" class="logo">
    </div>
    
    <?php if (isset($_SESSION['nome'])): ?>
            <!-- Mostrar o ícone de logout ou menu do utilizador -->
            <div class="user-menu">
    <!-- Botão de Perfil -->
        <div class="profile-icon">
            <button class="profile-button">Perfil</button>
        </div>

        <!-- Dropdown Menu -->
        <div class="dropdown">
            <ul>
                <li><a href="perfil.php">Meu Perfil</a></li>
                <li><a href="configuracoes.php">Configurações</a></li>
                <li><a href="minhas_viagens.php">Minhas Viagens</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <h3><span>Bem vindo <?php echo htmlspecialchars($_SESSION['nome']); ?>, temos toda uma seleção de viagens á sua escolha!   </span></h3>
    <?php else: ?>
        <p>Soluções flexíveis para o transporte moderno!</p>
        <button class="login-btn" onclick="document.getElementById('login').style.display='block'" style="width:auto;">Login</button>
        <button class="register-btn" onclick="document.getElementById('register').style.display='block'" style="width:auto;">Registo</button>
        <?php endif; ?>
</header>

<main class="profile-container">
        <!-- Informações do Utilizador -->
        <div class="profile-info">
            <h2>Informações do Perfil</h2>
            <form id="profile-form" action="update_profile.php" method="POST">
                <!-- Campo Nome -->
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="João Silva" required>
                </div>

                <!-- Campo Email (apenas leitura) -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="joao.silva@email.com" readonly>
                </div>

                <!-- Botão para atualizar perfil -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">Atualizar Perfil</button>
                </div>
            </form>
        </div>

        <!-- Alterar Palavra-passe -->
        <div class="password-change">
            <h2>Alterar Palavra-passe</h2>
            <form id="password-form" action="update_password.php" method="POST">
                <!-- Palavra-passe atual -->
                <div class="form-group">
                    <label for="current-password">Palavra-passe atual:</label>
                    <input type="password" id="current-password" name="current_password" required>
                </div>

                <!-- Nova palavra-passe -->
                <div class="form-group">
                    <label for="new-password">Nova palavra-passe:</label>
                    <input type="password" id="new-password" name="new_password" required>
                </div>

                <!-- Confirmar nova palavra-passe -->
                <div class="form-group">
                    <label for="confirm-password">Confirmar nova palavra-passe:</label>
                    <input type="password" id="confirm-password" name="confirm_password" required>
                </div>

                <!-- Botão para alterar a palavra-passe -->
                <div class="form-actions">
                    <button type="submit" class="btn-primary">Alterar Palavra-passe</button>
                </div>
            </form>
        </div>
    </main>
    </body>