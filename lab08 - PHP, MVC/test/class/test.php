<?php
 
class test extends controller {
 
   protected $layout ;
 
   function __construct() {
      parent::__construct() ;
      $this->layout = new view('hello') ;
      $this->layout->css = $this->css ;
      $this->layout->menu = $this->menu ;    
      $this->layout->title = 'Test view_controller' ;
      $this->layout->content = 'Hello, World  - controller!' ;
   }
 
  function index() {
      return $this->layout ;
  }
}
 
?>
