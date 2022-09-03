<?php
require_once('dataBase.php');

class ContractRequest
{
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function insert ($dni,$school,$schoool_dean_review,$academic_vice_rectorate_review,$hr_deparment_review){
        $sql = "INSERT INTO `contract_requests`(`dni`, `school`,`school_dean_review`, `academic_vice_rectorate_review`, `hr_department_review`) 
                VALUES (:dni,:school,:schoool_dean_review,:academic_vice_rectorate_review,:hr_deparment_review)";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':dni', $dni);
        $sth->bindParam(':school', $school);
        $sth->bindParam(':schoool_dean_review', $schoool_dean_review);
        $sth->bindParam(':academic_vice_rectorate_review', $academic_vice_rectorate_review);
        $sth->bindParam(':hr_deparment_review', $hr_deparment_review);
        $result=$sth->execute();

        return $result;
    }

    public function update($dni,$school_dean_review="",$academic_vice_rectorate_review="",$hr_department_review=""){
        $sql="UPDATE contract_requests SET"; /*`school_dean_review`='[value-4]',`academic_vice_rectorate_review`='[value-5]',`hr_department_review`='[value-6]'";*/

        if($school_dean_review!=""){
            $sql.= " school_dean_review=:school_dean_review WHERE dni=:dni";
        }

        if($academic_vice_rectorate_review!=""){
            $sql.= " academic_vice_rectorate_review=:academic_vice_rectorate_review WHERE dni=:dni";
        }

        if($hr_department_review!=""){
            $sql.= " hr_department_review=:hr_department_review WHERE dni=:dni";
        }

        $sth = $this->db->prepare($sql);

        if($school_dean_review!=""){
            $sth->bindParam(':school_dean_review', $school_dean_review);
            
        }

        if($academic_vice_rectorate_review!=""){
            $sth->bindParam(':academic_vice_rectorate_review', $academic_vice_rectorate_review);
        }

        if($hr_department_review!=""){
            $sth->bindParam(':hr_department_review', $hr_department_review);
        }

        $sth->bindParam(':dni',$dni);

        $result=$sth->execute();

        return $result;
    }

    public function select ($dni=0,$school="",$school_dean_review="",$academic_vice_rectorate_review="",$hr_department_review="")
    {
        $sql= "SELECT * FROM `contract_requests`";

        $where=false;

        if($dni!=0){
            $sql .= " WHERE dni=:dni";
            $where=true;
        }
        if($school!=""){
            if($where){
                $sql .= " AND school=:school";
            }else{
                $sql .= " WHERE school=:school";
                $where=true;
            }
        }
        if($school_dean_review!=""){
            if($where){
                $sql .= " AND school_dean_review=:school_dean_review";
            }else{
                $sql .= " WHERE school_dean_review=:school_dean_review";
                $where=true;
            }
        }
        if($academic_vice_rectorate_review!=""){
            if($where){
                $sql .= " AND academic_vice_rectorate_review=:academic_vice_rectorate_review";
            }else{
                $sql .= " WHERE academic_vice_rectorate_review=:academic_vice_rectorate_review";
                $where=true;
            }
        }
        if($hr_department_review!=""){
            if($where){
                $sql .= " AND hr_department_review=:hr_department_review";
            }else{
                $sql .= " WHERE hr_department_review=:hr_department_review";
                $where=true;
            }
        }
        
        $sth = $this->db->prepare($sql);
        
        if($dni!=0){
            $sth->bindParam(":dni", $dni);
        }
        if($school!=""){
            $sth->bindParam(":school", $school);
        }
        if($school_dean_review!=""){
            $sth->bindParam(":school_dean_review", $school_dean_review);
        }
        if($academic_vice_rectorate_review!=""){
            $sth->bindParam(":academic_vice_rectorate_review", $academic_vice_rectorate_review);
        }
        if($hr_department_review!=""){
            $sth->bindParam(":hr_department_review", $hr_department_review);
        }

        $sth->execute();
        $result=$sth;

        return $result;
    }

}
?>