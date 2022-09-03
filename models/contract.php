<?php
require_once('dataBase.php');

class Contract 
{
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function insert ($dni){
        $sql = "INSERT INTO `contracts`(`dni`, `hiring_date`) VALUES (:dni,NOW())";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':dni', $dni);
        $sth->execute();
    }

    public function select ($dni=0,$school="")
    {
        $sql= "SELECT personal_data.dni,personal_data.name,personal_data.surname,contract_requests.school,contracts.hiring_date FROM personal_data INNER JOIN contract_requests ON personal_data.dni=contract_requests.dni INNER JOIN contracts ON contracts.dni=contract_requests.dni";

        $where=false;

        if($dni!=0){

            $sql .= " WHERE personal_data.dni=:dni";
            $where=true;
        }
        if($school!=""){
            if(!$where){
                $sql .= " WHERE contract_requests.school=:school";
            }
            else{
                $sql .= " AND contract_requests.school=:school";
                $where = true;
            }
        }

        $sth = $this->db->prepare($sql);


        if($dni!=0){
            $sth->bindParam(':dni', $dni);
        }

        if($school!=""){
            $sth->bindParam(':school', $school);
        }

        $sth->execute();
        $result = $sth;
        return $result;
    }
}
?>