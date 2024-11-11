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
    <link rel="stylesheet" href="materiais-utilizados.css">
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Campo Atuação - E-Commerce</title>
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
                    <h2>Materiais Essenciais para Desenvolvedores Web</h2>
                </div>
                <div class="info-text">
                    <p>
                        O trabalho de um desenvolvedor web exige uma variedade de ferramentas e recursos para criar, manter e otimizar sites e aplicativos web. Esta lista completa dos materiais essenciais para desenvolvedores web te ajudará a se organizar e ter tudo o que precisa para seus projetos:</p>
                    </p>
                </div>
            </div>
            <div class="info-profissao">
                <div class="column">
                    <h2>Computador</h2>

                    <ul>
                        <li>Hardware: Um computador com processador potente, boa memória RAM e armazenamento em SSD é fundamental para garantir um bom desempenho durante o desenvolvimento.</li>
                        <li>Sistema Operacional: A escolha do sistema operacional é pessoal, mas os mais utilizados por desenvolvedores web são Windows, macOS e Linux.</li>
                        <li>Software de Desenvolvimento: Você precisará de um editor de código como Visual Studio Code, Sublime Text ou Atom para escrever e editar seus códigos.</li>
                    </ul>
                </div>

                <div>
                    <h2>Ferramentas de Desenvolvimento</h2>

                    <ul>
                        <li>Navegadores Web: É importante ter acesso a diferentes navegadores web, como Chrome, Firefox, Safari e Edge, para testar seus sites em diversos ambientes.</li>
                        <li>Ferramentas de Depuração: Ferramentas como o DevTools do Chrome e o Firefox Developer Tools permitem depurar e inspecionar o código do seu site para identificar e corrigir erros.</li>
                        <li>Gerenciadores de Versão: Git e SVN são ferramentas essenciais para controlar as alterações no seu código e colaborar com outros desenvolvedores.</li>
                        <li>Ferramentas de Minificação e Otimização: Ferramentas como o UglifyJS e o CSSO podem minificar e otimizar seus arquivos CSS e JavaScript para reduzir o tempo de carregamento do seu site.</li>
                        <li>Bibliotecas e Frameworks: Existem diversas bibliotecas e frameworks disponíveis para facilitar o desenvolvimento web, como jQuery, React, Angular e Vue.js.</li>
                        <li>Ferramentas de Teste: Ferramentas de teste automatizado como Selenium e Cypress podem te ajudar a garantir a qualidade do seu código e evitar bugs.</li>
                    </ul>
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