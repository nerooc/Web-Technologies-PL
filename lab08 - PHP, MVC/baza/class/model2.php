<?php
class model2 {
    static $dsn = 'sqlite:sql/baza.db';
    protected static $db;
    private $sth;

    function __construct() {
        self::$db = new PDO(self::$dsn); //interfejs języka PHP przeznaczony do komunikacji z bazami danych
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function listAll() {
        $this->sth = self::$db->prepare('SELECT * FROM osoba');
        $this->sth->execute();
        $result = $this->sth->fetchAll();
        return $result;
    }

    public function saveRec($obj) {
        $this->sth = self::$db->prepare('INSERT INTO osoba VALUES ( :fname, :lname, :city)');
        $this->sth->bindValue(':fname', $obj->fname, PDO::PARAM_STR);
        $this->sth->bindValue(':lname', $obj->lname, PDO::PARAM_STR);
        $this->sth->bindValue(':city', $obj->city, PDO::PARAM_STR);
        $resp = ($this->sth->execute() ? 'true' : 'false');
        return $resp;
    }

    // CZĘŚĆ MODELU PRZEZNACZONA DO PRZESZUKIWANIA BAZY
    public function searchRec($obj) {
       // SPRAWDZAMY CZY ZNAJDUJE SIE W BAZIE
        $this->sth = self::$db->prepare(
           'SELECT 
               CASE WHEN EXISTS 
               (
                  SELECT * FROM osoba WHERE imie=:fname and nazwisko=:lname and miejscowosc=:city
               ) 
               THEN TRUE 
               ELSE FALSE 
            END AS doesExist');
        $this->sth->bindValue(':fname', $obj->fname, PDO::PARAM_STR);
        $this->sth->bindValue(':lname', $obj->lname, PDO::PARAM_STR);
        $this->sth->bindValue(':city', $obj->city, PDO::PARAM_STR);
        $this->sth->execute();
        $resp = ($this->sth->fetch());
        return $resp['doesExist'];
    }

}
?>
