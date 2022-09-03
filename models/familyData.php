<?php
require_once('dataBase.php');

class FamilyData
{
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function insert ($dni,$name,$surname,$kinship,$f_dni){
        $sql = "INSERT INTO `family_data`(`dni`, `name`, `surname`, `kinship`, `f_dni`) 
                VALUES (:dni,:name,:surname,:kinship,:f_dni)";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':dni', $dni);
        $sth->bindParam(':name', $name);
        $sth->bindParam(':surname', $surname);
        $sth->bindParam(':kinship', $kinship);
        $sth->bindParam(':f_dni', $f_dni);
        $result=$sth->execute();

        return $result;
    }

    public function select ($dni)
    {
        $sql= "SELECT * FROM `family_data` WHERE dni=:dni";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':dni', $dni);
        $sth->execute();

        $result = $sth;
        
        return $result;
    }
}
?>