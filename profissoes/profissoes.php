<?php
// Conexão
global $connect;
require_once '../login/db_connect.php';
// Sessão
session_start();

// Verificação
if (isset($_SESSION['logado'])) {
    // header('Location: ./login/index.php');
    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * from usuarios WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    mysqli_close($connect);
}
// Dados

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profissoes.css">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Profissões - E-Commerce</title>
</head>

<body>
<nav>
    <div class="nav-logo">
        <a href="../index.php">
        <img src="../assets\imgs\logo.png" alt="" width="80px">
        </a>
    </div>
    <form action="" method="post">
        <div class="nav-search">
            <input type="search" name="" id="" placeholder="Pesquisar">
            <div class="search-line"></div>
            <button class="search-btn" type="submit" title="Pesquisar"><i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </form>
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

<main class="infos">
    <div class="container-info">
        <div class="info-main">
            <div class="info-title">
                <h2>Quais opções de profissões o e-commerce engloba?</h2>
            </div>
            <div class="info-text">
                <p>
                    O <strong>e-commerce</strong> oferece um <strong>universo</strong> de <strong>oportunidades
                        profissionais</strong> para
                    quem deseja se aventurar nesse ramo
                    empolgante. As áreas de atuação mais <strong>promissoras</strong> são:
                </p>
            </div>
        </div>
        <div class="info-profissao">
            <div class="column">
                <div class="gestao">
                    <h3>Gestão</h3>
                    <ul>
                        <li>Gerente de E-commerce</li>
                        <li>Analista de E-commerce</li>
                        <li> Especialista em Marketplace</li>
                    </ul>
                </div>

                <div class="marketing">
                    <h3>Marketing</h3>
                    <ul>
                        <li>Analista de Marketing Digital</li>
                        <li>Especialista em SEO</li>
                        <li>Gestor de Tráfego Pago</li>
                        <li>Produtor de Conteúdo</li>
                        <li>Especialista em Mídias Sociais</li>
                    </ul>
                </div>

                <div class="logistica">
                    <div>
                        <h3>Logística</h3>
                        <ul>
                            <li>Analista de Logística</li>
                            <li>Especialista em Armazenagem</li>
                            <li>Transportador</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="tecnologia">
                    <div>
                        <h3>Tecnologia</h3>
                        <ul>
                            <li>Desenvolvedor Web</li>
                            <li>Web Designer</li>
                            <li>DevOps</li>
                            <li>Analista de Segurança da Informação</li>
                        </ul>
                    </div>
                </div>

                <div class="atendimento">
                    <h3>Atendimento</h3>
                    <ul>
                        <li>Atendente de Vendas</li>
                        <li>Especialista em SAC</li>
                    </ul>
                </div>

                <div class="outras-areas">
                    <h3>Outras áreas</h3>
                    <ul>
                        <li>Fotógrafo</li>
                        <li>Copywriter</li>
                        <li>Especialista em Jurídico Digital</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>

    <div>
        © Todos os direitos reservados
    </div>

</footer>

</body>
</html>