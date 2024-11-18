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
    <link rel="stylesheet" href="../../assets\css\manutencao.css">
    <link rel="shortcut icon" href="../../assets\imgs\logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Página de Admin - AK</title>
</head>

<body>
    <nav>
        <div class="services">
            <a href="index.php"> <i class="fa-solid fa-home"></i> Início</a>
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

    <section>
        <div class="maintenance">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-title">Nova manutenção</div>
                <div class="form-group">
                    <div class="form-input">
                        <label for="placa">Placa do veículo:</label>
                        <input type="text" id="placa" name="placa" required>
                    </div>

                    <div class="form-input">
                        <label for="veiculo">Nome do veículo</label>
                        <input type="text" id="veiculo" name="veiculo" required>
                    </div>

                    <div class="form-input">
                        <label for="quilometragem">Quilometragem do veículo:</label>
                        <input type="text" id="quilometragem" name="quilometragem" required>
                    </div>

                    <div class="form-input">
                        <label for="cliente">Nome do cliente:</label>
                        <input type="text" id="cliente" name="cliente" required>
                    </div>

                    <div class="form-services">
                        <label for="services">Serviços:</label>

                        <div class="form-check">
                            <input type="checkbox" name="service-oil" id="oil">
                            <label for="oil">Troca de óleo - R$ 20</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="service-motor" id="motor">
                            <label for="motor">Troca de motor - R$ 200</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="service-wheel" id="wheel">
                            <label for="wheel">Troca de pneu - R$ 50</label>
                        </div>
                    </div>
                    <div class="form-button">
                        <button type="submit">Salvar</button>
                    </div>
                </div>

            </form>
        </div>
    </section>


</body>

</html>