<?php
session_start();
function __autoload($class_name) {
    include $class_name . '.php';
}
$user = new Register_new;

if (!$user->_is_logged()) {
    echo "<p><a href='zad04reg.html'>Rejestracja w serwisie</a></p>";
    echo "<p><a href='zad04log.html'>Logowanie do serwisu</a></p>";

} else {
    echo "<p><a href='zad04user.php'>Dane uzytkownika</a></p>";
    echo "<p><a href='zad04all.php'>Zarejestrowani uzytkownicy</a></p>";
    echo "<p><a href='zad04search.html'>Sprawdz czy istnieje</a></p>";
    echo "<p><a href='zad04sendNote.html'>Blog uzytkownika - nowy wpis</a></p>";
    echo "<p><a href='zad04readNotes.php'>Blog uzytkownika - lista wpisow</a></p>";
    echo "<p><a href='zad04out.php'>Wylogowanie z serwisu</a></p>";
}

?>
