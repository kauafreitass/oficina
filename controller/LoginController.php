<?php

require_once 'C:\aluno2\htdocs\oficina\model\LoginModel.php';

class LoginController {
    private $model;

    public function __construct() {
        $this->model = new LoginModel();
    }
    
    public function Login($login, $password) {
        $this->model->login($login, $password);
    }

    public function vericaIdSessao($id) {
        $this->model->vericaIdSessao($id);
    }
}