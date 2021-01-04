<?php
class model1 {

    private $table = array();

    function __construct() {
        $this->table['main'] = 'mvc/ , mvc/index.php, mvc/index.php?sub=info';
        $this->table['info'] = 'mvc/index.php?sub=info&action=help';
        $this->table['list'] = 'mvc/index.php?sub=baza, mvc/index.php?sub=baza&action=list';
        $this->table['form'] = 'mvc/index.php?sub=baza&action=form';
        $this->table['search'] = 'mvc/index.php?sub=baza&action=searchRec';
    }

    function getTable() {
        return $this->table;
    }

}
?>
