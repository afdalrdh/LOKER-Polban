<?php
    
    function register($document){
        global $collection;
        $collection->insertOne($document);
        return true;
    }

    function chkemail($email){
        global $collection;
        $temp = $collection->findOne(array('Email Address'=> $email));
        if(empty($temp)){
        return true;
        }
        else{
            return false;
        }
    }
    function setsession($email){
     
        $_SESSION["userLoggedIn"] = 1;
        global $collection;
        $temp = $collection->findOne(array('Email Address'=> $email));
        $_SESSION["uname"] = $temp["Full Name"];
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