<?php
/* Jakbym przypadkiem czegoś nie wysłał - Całość aplikacji z tą funkcjonalnością (jak i z funkcjonalnością szukania) znajduje się na mojej stronie na Pascal'u :) */
/* Jest też w folderze 'public_html/php' natomiast raczej wszystko tutaj dosłałem.*/

class Note implements NoteInterface{
   private $dbh;
   private $dbfile = "files/blog.db";
   protected $data = array();

   function __construct() {
      session_start();
   }
   
   function _read() {
      $email = $_SESSION['user'];
      $this->data['email'] = $email;
      $this->data['date'] = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);;
      $this->data['note'] = $_POST['note'] ;
   }
   
   function _save_messages() {
      $this->dbh = dba_open($this->dbfile, "c");
      $serialized_data = serialize($this->data);
      $key = $this->data['email'] . '+' . $this->data['date'];

      dba_insert($key, $serialized_data, $this->dbh);
      dba_close($this->dbh);
   }
    
   function _read_messages() {
      
      $table = array();
      $this->dbh = dba_open($this->dbfile, "r");

      $email = $_SESSION['user'];
      $key = dba_firstkey($this->dbh);

      while ($key) {
         [$key_email, $key_date] = explode('+', $key);

         if($key_email === $email){
            $serialized_data = dba_fetch($key, $this->dbh);
            $this->data = unserialize($serialized_data);
            $table[$key]['email'] = $this->data['email'];
            $table[$key]['date'] = $this->data['date'];
            $table[$key]['note'] = $this->data['note'];
         }

         $key = dba_nextkey($this->dbh);
      }

      dba_close($this->dbh);
      return $table;
   }
}
?>