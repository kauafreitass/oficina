<?php

require_once 'C:\aluno2\xampp\htdocs\oficina\model\LoginModel.php';

class LoginController {
    private $model;

    public function __construct() {
        $this->model = new LoginModel();
    }
    
    public function Login($login, $senha) {
        $this->model->login($login, $senha);
    }

    public function vericaIdSessao($id) {
        $this->model->vericaIdSessao($id);
    }
}