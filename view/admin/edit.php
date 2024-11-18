<?php

require_once 'C:\aluno2\htdocs\oficina\controller\ServicesController.php';

$id = intval($_GET['id']);  
$plate = $_POST['plate'];
$vehicle = $_POST['vehicle'];
$mileage = $_POST['mileage'];
$customer = $_POST['customer'];

$services = [$_POST['service1'] ?? '', $_POST['service2'] ?? '', $_POST['service3'] ?? ''];

$controller = new ServicesController();
$controller->editService($id, $plate, $vehicle, $mileage, $customer, $services);

header('location: index.php');
