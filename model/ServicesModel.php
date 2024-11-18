<?php

require_once("C:\aluno2\htdocs\oficina\config.php");

class ServicesModel
{

    private $pdo;
    public function __construct()
    {
        $database = new Config();
        $this->pdo = $database->getConnection();
    }

    public function addService($plate, $vehicle, $mileage, $customer, $services)
    {
        $json = json_encode($services);

        $sql = 'INSERT INTO vehicles (vehicle, plate, mileage, customer, services) VALUES (?, ?, ? ,? ,?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$vehicle, $plate, $mileage, $customer, $json]);
    }

    public function getLastServices() {
        $sql = 'SELECT * FROM vehicles ORDER BY id DESC LIMIT 6';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function deleteService($id) {
        $sql = 'DELETE FROM vehicles WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function editService($id, $plate, $vehicle, $mileage, $customer, $services)
    {
        $json = json_encode($services);

        $sql = 'UPDATE vehicles SET vehicle = ?, plate = ?, mileage = ?, customer = ?, services = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$vehicle, $plate, $mileage, $customer, $json, $id]);
    }
}
