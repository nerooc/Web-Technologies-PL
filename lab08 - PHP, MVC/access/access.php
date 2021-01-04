<?php

// KONTROLER OBSŁUGUJĄCY LOGOWANIE I REJESTRACJĘ
class access extends controller {

    protected $layout;
    protected $model;

    function __construct() {
        parent::__construct();
        $this->layout = new view('main');
        $this->layout->css = $this->css;
        $this->model = new user;
        $this->layout->menu = $this->menu;
    }
    
    function registerView() {
        $this->layout->header = 'Rejestracja';
        $this->view = new view('register');
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function register() {
      $reg = new user;
      $data = $_POST['data'];
      $obj = json_decode($data);
      if (isset($obj->fname) and isset($obj->lname) and isset($obj->email) and isset($obj->pass)) {
          $response = $this->model->_save($obj);
      }
      return ($response ? "Zarejestrowano!" : "Wystąpił błąd!");
    }

    function loginView() {
        $this->layout->header = 'Logowanie';
        $this->view = new view('login');
        $this->layout->content = $this->view;
        return $this->layout;
    }

    function login() {
        $reg = new user;
        $data = $_POST['data'];
        $obj = json_decode($data);
        if (isset($obj->email) and isset($obj->pass)) {
            $response = $this->model->_login($obj);
        }
        return ($response ? "Zalogowano!" : "Wystąpił błąd!");
    }

}

?>
