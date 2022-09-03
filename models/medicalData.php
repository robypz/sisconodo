<?php
require_once('dataBase.php');

class MedicalData
{
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function insert ($dni,$psychopedagogical_evaluation,$medical_certificate){
        $sql = "INSERT INTO `medical_data`(`dni`, `psychopedagogical_evaluation_url`, `medical_certificate_url`)
                VALUES (:dni,:psychopedagogical_evaluation,:medical_certificate)";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':dni', $dni);
        $sth->bindParam(':psychopedagogical_evaluation', $psychopedagogical_evaluation);
        $sth->bindParam(':medical_certificate', $medical_certificate);
        $result=$sth->execute();
        return $result;
    }

    public function select ($dni)
    {
        $sql= "SELECT * FROM `medical_data` WHERE dni=:dni";
        
        $sth = $this->db->prepare($sql);
        $sth->bindParam(':dni', $dni);
        $sth->execute();
        $result = $sth;
        return $result;
    }

}
?>