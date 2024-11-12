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
    <link rel="stylesheet" href="assets\css\admin.css">
    <link rel="shortcut icon" href="assets\imgs\logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Página de Admin - AK</title>
</head>

<body>
<nav>
    <div class="services">
        <a href="#"> <i class="fa-solid fa-plus"></i> Nova manutenção</a>
        <a href="#"> <i class="fa-solid fa-gear"></i> Controle de veículos</a>
        <a href="#"> <i class="fa-solid fa-clock-rotate-left"></i> Histórico de serviços</a>
    </div>
    <div class="login">
        <?php
        if (isset($_SESSION['logado'])) {
            echo '<a class="login-btn" href="./login/logout.php" title="Logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>';
        } else {
            // header('location: index.php');
            echo '<a class="login-btn" href="./login/index.php" title="Login"><i class="fa-solid fa-user"></i> Login</a>';
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

<section class="">

    <div class="card">
        <div class="info-texts">
            <div class="vehicle-name">
                <h1>Lancer Evolution X</h1>
            </div>
            <div class="other-service-infos">
                <p>Nome do cliente</p>
                <p>Quilometragem do veículo</p>
                <p>R$ 00,00</p>
            </div>
        </div>
        <div class="services-needed">
            <ul>
                <li>Troca de óleo</li>
                <li>Troca de pneu</li>
                <li>Checar motor</li>
            </ul>
        </div>        
    </div>
    
</section>

    <footer>

        <div>
            © Todos os direitos reservados
        </div>

    </footer>
</body>

</html>