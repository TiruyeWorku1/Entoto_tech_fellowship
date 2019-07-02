<?php
include_once 'dblogin.php';

if (isset($_POST['user']) and isset($_POST['pass'])){
    $user=$_POST['user'] ;
    $pass=$_POST['pass'] ;
    echo $user;
    echo $pass;
    $db=new dblogin();
    $result=$db->userlogin($user, $pass);
    if($result =='1'){
        echo 'successfuly login!!';
    }  else {
       echo 'incorrect usernameor password';
    }
   } else{
       echo 'error';
   }


 

