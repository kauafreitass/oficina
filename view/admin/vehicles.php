<?php
// Conexão
require_once '../../config.php';
require_once '../../controller/LoginController.php';
require_once '../../controller/ServicesController.php';
session_start();

// Verificação
if (!isset($_SESSION['logado'])) {
    header('location: ../login/index.php');
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets\css\vehicles.css">
    <link rel="shortcut icon" href="../../assets\imgs\logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Página de Admin - AK</title>
</head>

<body>
    <nav>
        <div class="services">
            <a href="index.php"> <i class="fa-solid fa-home"></i> Início</a>
            <a href="maintenance.php"> <i class="fa-solid fa-plus"></i> Novo serviço</a>
        </div>
        <div class="login">
            <?php
            if (isset($_SESSION['logado'])) {
                echo '<a class="login-btn" href="../login/logout.php" title="Logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>';
            } else {
                header('location: index.php');
                echo '<a class="login-btn" href="../login/index.php" title="Login"><i class="fa-solid fa-user"></i> Login</a>';
            }
            ?>

        </div>

    </nav>

    <section class="vehicles">
        <?php 
        $controller = new ServicesController();
        $lastServices = $controller->getLastServices();
        foreach ($lastServices as $lastService) {
            echo '
            <div class="vehicle-card">
            <img src="../../assets/imgs/img-vazia.jfif" alt="'. $lastService['vehicle'] .'">
            <p>Modelo: ' . $lastService['vehicle'] . '</p>
            <p>Placa: ' . $lastService['plate'] . '</p>
            </div>
        ';
        }
        ?>
    </section>

    <footer>

        <div>
            © Todos os direitos reservados
        </div>

    </footer>
</body>

</html>