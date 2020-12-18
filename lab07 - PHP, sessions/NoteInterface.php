<?php
interface NoteInterface {
   /*  
    *   Metoda  _read()
    *       Odczyt danych przesłanych z formularza
    */
   function _read();
   /*  
    *   Metoda  _save_messages()
    *    Zapis przesłanej informacji na serwer w pliku notes.db 
    *    bazy Berkeley DB:
    *    klucz (e-mail&znacznik czasowy) => wartość(informacja) 
   */  
   function _save_messages();
   /*  
    *   Metoda  _read_messages()
    *    Odczyt wszystkich informacji dla danego użytkownika 
    *    z  bazy Berkeley DB:
    *    - klucz (e-mail&znacznik czasowy) => wartość(informacja) 
   */  
   function _read_messages();
}
?>