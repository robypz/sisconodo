<?php
require_once('dataBase.php');

class PersonalData
{
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function insert ($dni,$name,$surname,$birthday,$marital_status,$gender,$address,$mobile_phone,$telephone,$photo){
        $sql = "INSERT INTO `personal_data`(`dni`, `name`, `surname`, `birthday`, `marital_status`, `gender`, `address`, `mobile_phone`, `telephone`,`photo`) 
                VALUES (:dni,:name,:surname,:birthday,:marital_status,:gender,:address,:mobile_phone,:telephone,:photo)";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':dni', $dni);
        $sth->bindParam(':name', $name);
        $sth->bindParam(':surname', $surname);
        $sth->bindParam(':birthday', $birthday);
        $sth->bindParam(':marital_status', $marital_status);
        $sth->bindParam(':gender', $gender);
        $sth->bindParam(':address', $address);
        $sth->bindParam(':mobile_phone', $mobile_phone);
        $sth->bindParam(':telephone', $telephone);
        $sth->bindParam(':photo', $photo);
        $result=$sth->execute();

        return $result;
    }

    public function select ($dni)
    {
        $sql= "SELECT * FROM `personal_data` WHERE dni=:dni";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':dni', $dni);
        $sth->execute();
        
        $result = $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sth;
        return $result;
    }

}
?>