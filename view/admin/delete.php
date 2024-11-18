<?php 

require_once 'C:\aluno2\htdocs\oficina\controller\ServicesController.php';

$id = intval($_GET['id']);

$controller = new ServicesController();
$controller->deleteService($id);

header('location: index.php');