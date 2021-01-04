<?php
 
include 'appl/view.php' ;
include 'appl/controller.php' ;
include 'test/class/test.php' ;
 
$obj = new test() ;
echo $obj->index() ;
 
?>

