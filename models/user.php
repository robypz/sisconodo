<?php
require_once('dataBase.php');

class User
{
    private $db;

    public function __construct() 
    {
        $this->db = new DataBase();
    }

    public function insert ($username,$password,$user)
    {
        $sql = "INSERT INTO `users`(`username`, `password`, `user_type`) VALUES (:username,:password,:user)";

        $password=password_hash($password, PASSWORD_DEFAULT);

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->bindParam(':user', $user);
        $result=$sth->execute();

        return $result;
    }

    public function select ($username)
    {
        $sql= "SELECT * FROM `users` WHERE username=:username";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':username', $username);
        $sth->execute();

        $result = $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sth->fetchAll();

        return $result;
    }

    public function update ($username,$password)
    {
        $sql= "UPDATE `users` SET `password`=:password WHERE `username`=:username";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->execute();
    }

    public function login($username,$password)
    {
        $sql= "SELECT * FROM `users` WHERE username=:username";

        $sth = $this->db->prepare($sql);
        $sth->bindParam(':username', $username);
        $sth->execute();

        $result = $sth->setFetchMode(PDO::FETCH_ASSOC);
        $result=$sth->fetchAll();
        
        foreach ($result as $key => $user) {
            
            if(password_verify($password, $user["password"])){

                session_start();
                $_SESSION["username"]=$user["username"];
                $_SESSION["user_type"]=$user["user_type"];
                return true;   
            }
            else{
                return false;
            }
        }
    }
}

/*$user = new User();

$user->insert('root','s1sc0n0d0','ROOT');*/

?>