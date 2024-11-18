<?php
// Conexão
require_once '../../config.php';
require_once '../../controller/LoginController.php';
// Sessão
session_start();

// Botão Enviar
if (isset($_POST['login-button'])) {
    $erros = [];
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty($login) || empty($password)) {
        $erros[] = '<li class="login-error">Preencha todos os campos</li>';
    } else {
        $controller = new LoginController();
        $controller->login($login, $password);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets\imgs\logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>

<body>
    <main id="container">
        <form id="login_form" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
            <!-- FORM HEADER -->
            <div id="form_header">
                <h1>Login</h1>
            </div>

            <!-- INPUTS -->
            <div id="inputs">
                <!-- Usuário -->
                <div class="input-box">
                    <label for="name">
                        Usuário
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" id="name" name="login" >
                        </div>
                    </label>
                </div>


                <!-- Senha -->
                <div class="input-box">
                    <label for="password">
                        Senha
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" id="password" name="password">
                        </div>
                    </label>

                    <!-- Esqueci a senha -->
                    <div id="forgot_password">
                        <a href="#">
                            Esqueceu a senha?
                        </a>
                    </div>
                </div>
            </div>
    
            <?php
            if (empty($errors)) {
            } else {
                foreach ($errors as $error) {
                    echo $error;
                }
            }
            ?>

            <!-- LOGIN BUTTON -->
            <button type="submit" id="login_button" name="login-button">
                Login
            </button>
        </form>
    </main>

</body>

</html>