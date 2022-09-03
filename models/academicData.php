<?php
require_once('dataBase.php');

class AcademicData
{
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function insert ($dni,$title,$courses,$merits,$experiences,$title_url){
        $sql = "INSERT INTO `academic_data`(`dni`, `title`, `courses`, `merits`, `experiences`,`title_url`) 
                VALUES (:dni,:title,:courses,:merits,:experiences,:title_url)";

        $sth = $this->db->prepare($sql);

        $sth->bindParam(':dni', $dni);
        $sth->bindParam(':title', $title);
        $sth->bindParam(':courses', $courses);
        $sth->bindParam(':merits', $merits);
        $sth->bindParam(':experiences', $experiences);
        $sth->bindParam(':title_url', $title_url);

        $result=$sth->execute();
        return $result;
    }

    public function select ($dni)
    {
        $sql= "SELECT * FROM `academic_data` WHERE dni=:dni";
        $sth = $this->db->prepare($sql);
        $sth->bindParam(':dni', $dni);
        $sth->execute();
        $result=$sth;
        return $result;
    }

}
?>