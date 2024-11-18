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
    <link rel="stylesheet" href="../../assets\css\admin.css">
    <link rel="shortcut icon" href="../../assets\imgs\logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Página de Admin - AK</title>
</head>

<body>
    <nav>
        <div class="services">
            <a href="maintenance.php"> <i class="fa-solid fa-plus"></i> Novo serviço</a>
            <a href="vehicles.php"> <i class="fa-solid fa-gear"></i> Controle de veículos</a>
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
            $controller = new ServicesController();
            $lastServices = $controller->getLastServices();

            foreach ($lastServices as $lastService) {
                $toDo = $lastService['services'];
                $toDo = json_decode($toDo);

                echo '
                <div class="card">
            <div class="infos-text">
            <div class="vehicle-image">
                <img src="../../assets/imgs/img-vazia.jfif" alt="">
            </div>
                <div>
                    <div class="vehicle-name">
                        <h1>' . $lastService["vehicle"] . '</h1>
                    </div>
                    <div class="infos">
                        <p>' . $lastService["customer"] . '</p>
                        <p>' . $lastService["mileage"] . 'km</p>
                    </div>
                </div>
            </div>
            ';

            ?>
                <div class="services-needed">
                    <ul>
                        <h3>Serviços</h3>
                        <?php
                        for ($i = 0; $i < count($toDo); $i++) {
                            echo "<li>" . $toDo[$i]  . "</li>";
                        };
                        ?>
                    </ul>
                </div>
                <div class="btns">
                    <div class="delete-btn">
                        <a href="delete.php?id=<?=$lastService['id']?>"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                    <div class="edit-btn">
                        <a href="maintenance.php?id=<?=$lastService['id']?>"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                </div>
        </div>
    <?php } ?>
    </div>

    </section>

    <footer>

        <div>
            © Todos os direitos reservados
        </div>

    </footer>
</body>

</html>