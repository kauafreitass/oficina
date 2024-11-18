<?php

require_once 'C:\aluno2\htdocs\oficina\model\ServicesModel.php';

class ServicesController {
    private $model;

    public function __construct() {
        $this->model = new ServicesModel();
    }

    public function addService($plate, $vehicle, $mileage, $customer, $services ) {
        $this->model->addService($plate, $vehicle, $mileage, $customer, $services);
    }

    public function getLastServices() {
        return $this->model->getLastServices();
    }

    public function deleteService($id) {
        $this->model->deleteService($id);
    }

    public function editService($id, $plate, $vehicle, $mileage, $customer, $services) {
        $this->model->editService($id, $plate, $vehicle, $mileage, $customer, $services);
    }
}