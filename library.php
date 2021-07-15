<?php
require_once 'config.php';
    
    function register($document){
        global $user;
        $user->insertOne($document);
        return true;
    }

    function chkemail($email){
        $user = (new MongoDB\Client)->db_tubes_loker->user;
        $temp = $user->findOne(array('email'=> $email));
        if(empty($temp)){
        return true;
        }
        else{
            return false;
        }
    }

    function chkAdmin($email){
        $admin = (new MongoDB\Client)->db_tubes_loker->admin;
        $temp = $admin->findOne(array('email'=> $email));
        if(empty($temp)){
        return true;
        }
        else{
            return false;
        }
    }

    function setsession($email){
     
        $_SESSION["userLoggedIn"] = 1;
        global $user;
        $temp = $user->findOne(array('email'=> $email));
        $_SESSION["uname"] = $temp->nama;
        $_SESSION["email"] = $email;
        return true;
        
    }
    function chkLogin(){
        
        // if($_SESSION["userLoggedIn"] == 1){
        //     return true;
        // }
        // else{
        //     return false;
        // }
        
        if(isset($_SESSION["userLoggedIn"])){
            return true;
        }else{
            return false;
        }
    }

    function removeall(){
        unset($_SESSION["userLoggedIn"]);
        unset($_SESSION["uname"]);
        unset($_SESSION["email"]);
        return true;
    }

?>