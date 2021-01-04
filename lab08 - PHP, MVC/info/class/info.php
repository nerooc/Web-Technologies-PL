<?php
class info extends controller {

    protected $layout;
    protected $model;

    function __construct() {
        parent::__construct();
        $this->layout = new view('main');
        $this->layout->css = $this->css;
        $this->layout->menu = $this->menu;
        $this->layout->title = 'Simple MVC';
    }

    function index() {
        $this->layout->header = 'Simple MVC';
        $this->layout->content = 'MVC application!';
        return $this->layout;
    }

    function help() {
        $this->model = new model1();
        $this->layout->header = 'MVC';
        $this->view = new view('table');
        $this->view->data = $this->model->getTable();
        $this->layout->content = $this->view;
        return $this->layout;
    }
}

?>
