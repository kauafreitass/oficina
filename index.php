<?php
// Conexão
require_once './login/db_connect.php';
session_start();

// Verificação
if (isset($_SESSION['logado'])) {
    $id = $_SESSION['id_usuario'];

    try {
        // Consulta ao banco de dados
        $stmt = $connect->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar dados do usuário: " . $e->getMessage();
    }
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
    <title>Início - E-Commerce</title>
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

            echo '<a class="login-btn" href="./login/logout.php" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>';
        } else {
            echo '<a class="login-btn" href="./login/index.php" title="Login"><i class="fa-solid fa-user"></i></a>';
        }
        ?>

    </div>

</nav>

<!-- Se estiver logado, irá dizer bem vindo -->
<?php if (isset($_SESSION['logado'])) { ?>
    <div class="nav-profile">
        <span>Bem vindo, <strong><?php echo $dados['nome']; ?></strong></span>
    </div>
<?php } ?>


<section class="product-container" id="first-product-container">

    
</section>

    <footer>

        <div>
            © Todos os direitos reservados
        </div>

    </footer>
</body>

</html>