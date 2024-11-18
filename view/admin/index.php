<?php
// Conexão
require_once '../../config.php';
require_once '../../controller/LoginController.php';
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
    <link rel="stylesheet" href="../../assets\css\admin.css">
    <link rel="shortcut icon" href="../../assets\imgs\logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Página de Admin - AK</title>
</head>

<body>
    <nav>
        <div class="services">
            <a href="manutencao.php"> <i class="fa-solid fa-plus"></i> Nova manutenção</a>
            <a href="#"> <i class="fa-solid fa-gear"></i> Controle de veículos</a>
            <a href="#"> <i class="fa-solid fa-clock-rotate-left"></i> Histórico de serviços</a>
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

    <section class="last-services">

        <div class="last-services-title">
            <h1>Últimos serviços</h1>
        </div>


        <div class="last-services-cards">
            <?php
            for ($i = 0; $i < 4; $i++) {
                echo '
            <div class="card">
            <div class="infos-text">
            <div class="vehicle-image">
                <img src="../../assets/imgs/carro.jpg" alt="">
            </div>
                <div>
                    <div class="vehicle-name">
                        <h1>Lancer Evolution X</h1>
                    </div>
                    <div class="infos">
                        <p>Jobson</p>
                        <p>50.000km</p>
                        <p>R$ 390,00</p>
                    </div>
                </div>
            </div>
            <div class="services-needed">
                <ul>
                    <h3>Serviços</h3>
                    <li>Troca de óleo</li>
                    <li>Troca de pneu</li>
                    <li>Checar motor</li>
                </ul>
            </div>        
                </div>
                ';
            }
            ?>
        </div>

    </section>

    <footer>

        <div>
            © Todos os direitos reservados
        </div>

    </footer>
</body>

</html>