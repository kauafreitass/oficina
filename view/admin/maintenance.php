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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plate = $_POST['plate'];
    $vehicle = $_POST['vehicle'];
    $mileage = $_POST['mileage'];
    $customer = $_POST['customer'];

    $services = [$_POST['service1'] ?? '', $_POST['service2'] ?? '', $_POST['service3'] ?? ''];

    $controller = new ServicesController;
    $controller->addService($plate, $vehicle, $mileage, $customer, $services);
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets\css\maintenance.css">
    <link rel="shortcut icon" href="../../assets\imgs\logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Página de Admin - AK</title>
</head>

<body>
    <nav>
        <div class="services">
            <a href="index.php"> <i class="fa-solid fa-home"></i> Início</a>
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

    <section>
        <div class="maintenance">
            <form action="<?php
                            if (isset($_GET['id'])) {
                                echo 'edit.php?id=' . $_GET['id'];
                            } else {
                                echo $_SERVER['PHP_SELF'];
                            }
                            ?>" method="post">
                <div class="form-title">Novo serviço</div>
                <div class="form-group">
                    <div class="form-field">
                        <label for="plate">Placa do veículo:</label>
                        <div class="form-input">
                            <i class="fa-solid fa-sign-hanging"></i>
                            <input type="text" id="plate" name="plate" required>
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="vehicle">Nome do veículo:</label>
                        <div class="form-input">
                            <i class="fa-solid fa-car-side"></i>
                            <input type="text" id="vehicle" name="vehicle" required>
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="mileage">Quilometragem do veículo:</label>
                        <div class="form-input">
                            <i class="fa-solid fa-car-battery"></i>
                            <input type="text" id="mileage" name="mileage" required>
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="customer"">Nome do cliente:</label>
                        <div class=" form-input">
                            <i class="fa-regular fa-id-card"></i>
                            <input type="text" id="customer" name="customer"" required>
                        </div>

                    </div>

                    <div class=" form-services">
                            <label for="services">Serviços:</label>

                            <div class="form-check">
                                <input type="checkbox" name="service1" id="oil" value="Troca de óleo">
                                <label for="oil">Troca de óleo</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" name="service2" id="motor" value="Troca de motor">
                                <label for="motor">Troca de motor</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" name="service3" id="wheel" value="Troca de pneu">
                                <label for="wheel">Troca de pneu</label>
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