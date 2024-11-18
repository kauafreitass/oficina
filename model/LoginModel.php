<?php

require_once('C:\aluno2\htdocs\oficina\config.php');

class LoginModel {
    public $dados;    
    private $pdo;
    public function __construct()
    {
        $database = new Config();
        $this->pdo = $database->getConnection();
    }

    public function Login($login, $password)
    {
        try {
            $usuarioExiste = $this->usuarioExiste($login);

            if ($usuarioExiste) {
                $verificaSenha = $this->VerificaSenha($login, $password);

                if ($verificaSenha) {
                    $_SESSION['logado'] = true;
                    header('Location: ../admin/index.php');
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

    public function usuarioExiste($login)
    {
        // Verifica se o usuário existe
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->bindParam(':login', $login);
        return $stmt->execute();
    }

    public function VerificaSenha($login, $password)
    {
        // Verifica senha
        $password = md5($password);
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }

    public function vericaIdSessao($id)
    {
        try {
            // Consulta ao banco de dados
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar dados do usuário: " . $e->getMessage();
        }
    }
}
