<?php
function __autoload($class_name) {
    include $class_name . '.php';
}
$user = new Register_new;

if ($user->_is_logged()) {
    $res = $user->_search();

    if($res){
        echo "Znaleziono takiego uzytkownika! <br/>" ;
        echo "Imię: ". $res['fname'] ." <br/>" ;
        echo "Nazwisko: ". $res['lname'] ." <br/>" ;
        echo "E-mail: ". $res['email'] ." <br/>" ;
    } else {
        echo "Nie znaleziono takiego uzytkownika";
    }
    
    echo "<p><a href='zad04.php'>Powrot do programu glownego</a></p>";
}
?>
