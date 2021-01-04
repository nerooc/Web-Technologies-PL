<?php
 
include 'appl/view.php' ;
$view = new view('hello');
 
$view->title = 'Simple MVC' ;
$view->header = 'Test template_view' ;
$view->content = '<p>Hello, World</p>' ;
 
echo $view ;           
              
?>
