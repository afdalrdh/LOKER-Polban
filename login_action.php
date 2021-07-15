<?php require_once 'config.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    session_start();
    if(chkLogin()){
        header("Location: beranda.php");
    }
?>
<?php

    if(isset($_POST['login'])){
//        print_r($_POST);
    $email = $_POST['email'];
    $upass = $_POST['pass'];
    if($email == "admin@admin" && $upass == "admin"){
        header("Location: admin/dashboard.php");
    }else{

        $criteria = array("email"=> $email);
        $query = $user->findOne($criteria);
        //var_dump($query);
        if(empty($query)){
            echo "Email ID is not registered.";
            echo "Either <a href='register.php'>Register</a> with the new Email ID or <a href='index.php'>Login</a> with an already registered ID";
        }
        else{
            
                $pass = $query["password"];
                if(password_verify($upass,$pass)){
                    $var = setsession($email);
//                    echo"<pre>";   
//                    print_r($_SESSION);
                  
                    
                    if($var){
                        
                    header("Location: beranda.php");
                    }
                    else{
                        echo "Some error";
                    }
                }
                else{
                    echo "You have entered a wrong password";
                    echo "<br>";
                    echo "Either <a href='register.php'>Register</a> with the new Email ID or <a href='index.php'>Login</a> with an already registered ID";
                }
                
            
        
        }
    }
    }
?>