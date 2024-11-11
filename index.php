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
    <script src="https://kit.fontawesome.com/904bf533d7.js" crossorigin="anonymous"></script>
    <title>Início - E-Commerce</title>
</head>

<body>
<nav>
    <div class="nav-logo">
        <a href="index.php">
        <img src="assets\imgs\logo.png" alt="" width="100px">
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

<!-- Se estiver logado, irá dizer bem vindo -->
<?php if (isset($_SESSION['logado'])) { ?>
    <div class="nav-profile">
        <span>Bem vindo, <strong><?php echo $dados['nome']; ?></strong></span>
    </div>
<?php } ?>


<div class="banner">
    <img src="assets\imgs\social_media_banner_consumer_week_with_20_off (1).jpg" alt="" width="1200px">
</div>


<section class="product-container" id="first-product-container">

    <div class="most-visited-product">

        <div class="most-visited-title">
            <p>Mais visitado</p>
        </div>

        <div class="products">
            <a href="./definicao/definicao.php" target="_blank">
                <div class="product">
                    <div class="product-logo"><img src="assets\imgs\definicao.jpg" alt=""></div>
                    <div class="product-title">
                        <p>Definição de E-commerce</p>
                    </div>
                    <div class="product-price">
                        <span class="old-price">Não vale de nada</span>
                        <p>E-Commerce<strong class="promotion-text">13% OFF</strong></p>
                        <b>A área onde o céu é o limite!</b>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <div class="others-products">

        <div class="others-products-title">
            <p>Outras opções</p>
        </div>

        <div class="products">

            <a href="./profissoes/profissoes.php" target="_blank">
                <div class="product">
                    <div class="product-logo"><img src="assets\imgs\profissoes.png" alt=""></div>
                    <div class="product-title">
                        <p>Possíveis profissões</p>
                    </div>
                    <div class="product-price">
                        <span class="old-price">Acabou as vagas</span>
                        <p>Profissões <strong class="promotion-text">17% OFF</strong></p>
                        <b>Tem de tudo!</b>
                    </div>
                </div>
            </a>

            <a href="./formacao/formacao.php" target="_blank">
                <div class="product">
                    <div class="product-logo"><img src="assets\imgs\formacao.jpg" alt=""></div>
                    <div class="product-title">
                        <p>Formações e Habilidades</p>
                    </div>
                    <div class="product-price">
                        <span class="old-price">Pra que me formar?</span>
                        <p>Formações<strong class="promotion-text">7% OFF</strong></p>
                        <b>Sim, é necessario.</b>
                    </div>
                </div>
            </a>

            <a href="./desenvolvedor/desenvolvedor.php" target="_blank">
                <div class="product">
                    <div class="product-logo"><img src="assets\imgs\dev.jpg" alt=""></div>
                    <div class="product-title">
                        <p>Desenvolvedor Web</p>
                    </div>
                    <div class="product-price">
                        <span class="old-price">Salário de médico?</span>
                        <p>Desenvolvedor <strong class="promotion-text">9% OFF</strong></p>
                        <b>Definitivamente não.</b>
                    </div>
                </div>
            </a>

        </div>
    </div>
</section>

<section class="product-container">

    <div class="more-products">

        <div class="others-products-title">
            <p>Mais opções</p>
        </div>

        <div class="products more" id="more-products">

        <a href="./campo-atuacao/campo-atuacao.php" target="_blank">
                <div class="product">
                    <div class="product-logo"><img src="assets\imgs\campo-atuacao.jpg" alt=""></div>
                    <div class="product-title">
                        <p>Campo de atuação</p>
                    </div>
                    <div class="product-price">
                        <span class="old-price">O que eles fazem?</span>
                        <p>Atuação<strong class="promotion-text">5% OFF</strong></p>
                        <b>Fazem, e muito.</b>
                    </div>
                </div>
            </a>

            <a href="./empresas-envolvidas/empresas-envolvidas.php" target="_blank">
                <div class="product">
                    <div class="product-logo"><img src="assets\imgs\empresas.jpg" alt=""></div>
                    <div class="product-title">
                        <p>Empresas envolvidas</p>
                    </div>
                    <div class="product-price">
                        <span class="old-price">Não tem vagas</span>
                        <p>Empresas<strong class="promotion-text">15% OFF</strong></p>
                        <b>Faltam profissionais.</b>
                    </div>
                </div>
            </a>

            <a href="./materiais-utilizados/materiais-utilizados.php" target="_blank">
                <div class="product">
                    <div class="product-logo"><img src="assets\imgs\materiais.jpg" alt=""></div>
                    <div class="product-title">
                        <p>Materiais utilizados</p>
                    </div>
                    <div class="product-price">
                        <span class="old-price">Só o computador?</span>
                        <p>Materiais<strong class="promotion-text">19% OFF</strong></p>
                        <b>Mas o que se usa?</b>
                    </div>
                </div>
            </a>

            <a href="./contato/contato.php" target="_blank">
                <div class="product">
                    <div class="product-logo"><img src="assets\imgs\contact.jpg" alt=""></div>
                    <div class="product-title">
                        <p>Contato</p>
                    </div>
                    <div class="product-price">
                        <span class="old-price">Não queremos você</span>
                        <p>Fale conosco<strong class="promotion-text">99% OFF</strong></p>
                        <b>Deixe seu feedback</b>
                    </div>
                </div>
            </a>

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