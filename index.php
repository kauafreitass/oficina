<?php
// Conexão
require_once 'config.php';
require_once 'controller/LoginController.php';
session_start();

// Verificação
if (isset($_SESSION['logado'])) {
    $id = $_SESSION['id_usuario'];

    $controller = new LoginController();
    $controller->vericaIdSessao($id);
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\index.css">
    <link rel="shortcut icon" href="assets\imgs\logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Início - AK</title>
</head>

<body>
    <nav>
        <div class="nav-logo">
            <a href="index.php">
                <img src="assets\imgs\logo.png" alt="">
            </a>
        </div>
        <div class="login">
            <?php
            if (isset($_SESSION['logado'])) {
                header('location: view/admin/index.php');
                echo '<a class="login-btn" href="view/login/logout.php" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>';
            } else {
                echo '<a class="login-btn" href="view/login/index.php" title="Login"><i class="fa-solid fa-user"></i></a>';
            }
            ?>

        </div>

    </nav>


    <section class="main-container">
        <div class="welcome-container">
            <h1>Bem-vindo à Mecânica AK!</h1>
            <h2>Estamos aqui para cuidar do seu carro com excelência!</h2>
            <p>
                É com grande satisfação que recebemos você em nosso espaço virtual. Aqui na Mecânica AK, nos dedicamos a oferecer serviços de manutenção e reparação automotiva com qualidade, confiança e agilidade. Nossa missão é garantir que seu veículo esteja sempre em perfeitas condições para rodar com segurança e desempenho.
            </p>
            <p>
                Navegue à vontade e descubra nossos serviços, soluções e como podemos ajudar a manter o seu carro em ótimo estado. Se tiver dúvidas ou precisar de um atendimento especializado, nossa equipe está pronta para atendê-lo com toda a atenção que você merece.
            </p>
            </div>

    </section>

    <footer>

        <div>
            © Todos os direitos reservados
        </div>

    </footer>
</body>

</html>