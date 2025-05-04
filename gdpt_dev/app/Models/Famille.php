<?php

namespace App\Models;

class Famille extends Model{

    public function getList(){
        $this->getConnection();

        $sql = "SELECT * FROM ".PREFIXE_TABLE."famille";
        return $this->getResults($sql);
    }
}
?>