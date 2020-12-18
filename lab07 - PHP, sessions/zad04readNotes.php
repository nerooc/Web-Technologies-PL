<?php

function __autoload($class_name) {
  include $class_name . '.php';
}

$user = new Register_new;
$notes = new Note;

if ($user->_is_logged()) {
    $table = $notes->_read_messages();
    $email = $_SESSION['user'];
    echo "<h2>Informacje uzytkownika $email</h2>";

    foreach ($table as $key => $record) {
        echo "</br>" . $record['date'] . "</br>" . $record['note'] . "</br></br>";
    }

    echo "<p><a href='zad04.php'>Powrot do programu glownego</a></p>";
}
?>