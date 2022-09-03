<?php
require '../models/user.php';

$user = new User();

$log=$user->login($_POST['username'],$_POST['password']);

if($log){
    header("Status: 301 Moved Permanently");
    header("Location: ../views/home.php");
    exit;
}
else {
    header("Status: 301 Moved Permanently");
    header("Location: ../index.php?login=false");
    exit;
}
?>