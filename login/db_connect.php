<?php
// Conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "oficina";

try {
    $connect = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // Configura o PDO para lançar exceções em caso de erro
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
