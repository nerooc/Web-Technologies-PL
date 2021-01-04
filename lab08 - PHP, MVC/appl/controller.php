<?php

abstract class controller {

    protected $css;
    protected $menu;

    function __construct() {
        $this->css = "<link rel=\"stylesheet\" href=\"css/baza.css\" type=\"text/css\" media=\"screen\" >";
        $user = new user;
        
        // SPRAWDZAMY CZY UZYTKOWNIK JEST ZALOGOWANY
        if (!$user->_is_logged()) {
            $this->menu = file_get_contents('template/menu.tpl');
        }
        else {
            $this->menu = file_get_contents('template/menu_logged.tpl');
        }

    }

    static function http404() {
        header('HTTP/1.1 404 Not Found');
        print '<!doctype html><html><head><title>404 Not Found</title></head><body><p>Invalid URL</p></body></html>';
        exit;
    }

    function __call($name, $arguments) {
        self::http404();
    }
}

?>
