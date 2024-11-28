    <!-- php -->
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

<!-- modal para realizar o login -->
    <div id="login" class="modal">
        <form class="modal-content animate" action="login.php" method="POST">
          <div class="imgcontainer">
            <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="../img/img_avatar.png"Avatar" class="avatar">
          </div>
      
          <div class="container">
            <label for="uname"><b>Introduza o seu Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
      
            <label for="psw"><b>Introduza a sua Password</b></label>
            <input type="password" placeholder="Enter Password" name="senha" required>
              
            <button type="submit">Login</button>
          </div>
        </form>
      </div>

    <!-- Fim do modal-->

    <!-- register-->

    <div id="register" class="modal">
        <form class="modal-content animate" action="register.php" method="post">
          <div class="imgcontainer">
            <span onclick="document.getElementById('register').style.display='none'" class="close" title="Close Modal">&times;</span>
          </div>
      
          <div class="container">
            <label for="uname"><b>Introduza o seu Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
            
            <label for="uname"><b>Introduza o seu Nome</b></label>
            <input type="text" placeholder="Enter Username" name="nome" required>

            <label for="psw"><b>Introduza uma Password</b></label>
            <input type="password" placeholder="Enter Password" name="senha" required>

            <label for="psw"><b>Volte a introduzir a Password</b></label>
            <input type="password" placeholder="Enter Password" name="confirmarSenha" required>
              
            <button type="submit">Register</button>
            
          </div>
      
        </form>
      </div>

    <!--Fim do register-->


    <div class="full-screen-image">
        <img src="../img/banner.jpg" alt="Imagem em tela cheia">
    </div>
    
    <nav>
        <a href="sobrenos.html">Sobre Nós</a>
        <a href="index2.html">Belheteira</a>
        <a href="../contactos.html">Contactos</a>
        <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] === "administrador"): ?>
        <a href="administrador.php">Administração</a>
        <?php endif; ?>
    </nav>

    

    <h2>Os Nossos principios</h2>
    <div class="features">
        <div class="feature-item">
            <div class="icon"> 
                <img src="../img/saude.png" alt="Ícone de Saúde e Segurança">
            </div>
            <h3>Saúde e Segurança</h3>
            <p>Mantém-te a ti e aos outros em segurança e viajas sempre connosco.</p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <img src="../img/conforto.jpg" alt="Ícone de Conforto a Bordo">
            </div>
            <h3>Conforto a Bordo</h3>
            <p>Os nossos autocarros estão equipados com assentos confortáveis, WC, Wi-Fi e tomadas.</p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <img src="../img/rede.jpg" alt="Ícone de Rede de Autocarros">
            </div>
            <h3>Uma Grande Rede</h3>
            <p>Escolhe a partir de 3 000 destinos de viagem em 35 países e descobre a Europa com a FlexiBus.</p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <img src="../img/eco.jpg" alt="Ícone de Viagem Ecológica">
            </div>
            <h3>Viajem Ecológica</h3>
            <p>Os nossos autocarros provaram ter uma excelente pegada de carbono por passageiro.</p>
        </div>
    </div>

    <div class="Maps">
        <h2>Encontra-nos no Mapa!</h2>
        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49773.27091252294!2d-9.1689455209944!3d38.
            76761599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd193342a4bf298d%3A0xda75026790d4c1c3!2s
            FlixBus%20Portugal!5e0!3m2!1spt-PT!2spt!4v1730970403576!5m2!1spt-PT!2spt" width="1000" height="500" style="border: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </p>
    </div>

    <main>
        <section id="about" class="section">
            <h2>Sobre Nós</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae vero perspiciatis inventore quisquam illum? Expedita suscipit beatae corporis fugit adipisci minima officiis odit dicta dolor sequi nostrum, aliquam ut nam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum vitae, tempora aspernatur dolor commodi provident assumenda quod totam soluta pariatur hic rem ducimus facere alias, voluptatibus perspiciatis? Minus, soluta necessitatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo repellat, alias harum rem eligendi rerum consectetur ipsa ea numquam maiores odio illum commodi sit, vel inventore blanditiis deleniti facere sapiente.</p>
            <img src="../img/autocarro_mp.jpg" alt="autocarro">
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Flexibus. Todos os direitos reservados.</p>
        <p>FlexibusPortugal@gmail.com</p>
    </footer>
</body>
</html>