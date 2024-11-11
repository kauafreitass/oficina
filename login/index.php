<?php
// Conexão
require_once 'db_connect.php';
// Sessão
session_start();

// Botão Enviar
if (isset($_POST['login-button'])) {
    $erros = [];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (empty($login) || empty($senha)) {
        $erros[] = '<li class="login-error">Preencha todos os campos</li>';
    } else {
        try {
            // Verifica se o usuário existe
            $stmt = $connect->prepare("SELECT * FROM usuarios WHERE login = :login");
            $stmt->bindParam(':login', $login);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Verifica senha
                $senha = md5($senha);
                $stmt = $connect->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha");
                $stmt->bindParam(':login', $login);
                $stmt->bindParam(':senha', $senha);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {
                    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['logado'] = true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    header('Location: ../index.php');
                    exit;
                } else {
                    $erros[] = '<li class="login-error"> Usuário e senha não conferem. </li>';
                }
            } else {
                $erros[] = '<li class="login-error"> Usuário inexistente </li>';
            }
        } catch (PDOException $e) {
            $erros[] = '<li class="login-error">Erro ao conectar ao banco de dados</li>';
        }
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
                <i id="mode_icon" class="fa-solid fa-moon"></i>
            </div>

            <!-- SOCIAL MEDIA LINKS -->
            <div id="social_media">
                <!-- FACEBOOK -->
                <a href="#">
                    <img src="assets/imgs/facebook.png" alt="">
                </a>

                <!-- GOOGLE -->
                <a href="#">
                    <img src="assets/imgs/google.png" alt="Google logo">
                </a>

                <!-- GITHUB -->
                <a href="#">
                    <img src="assets/imgs/github.png" alt="">
                </a>
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
                            <input type="password" id="password" name="senha" >
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
            if (empty($erros)) {
            } else {
                foreach ($erros as $erro) {
                    echo $erro;
                }
            }
            ?>

            <!-- LOGIN BUTTON -->
            <button type="submit" id="login_button" name="login-button">
                Login
            </button>
        </form>
    </main>

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>