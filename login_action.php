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
    $criteria = array("email"=> $email);
    $temp = $admin->findOne($criteria);
    if(!empty($temp)){
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
                $sts = $query["status"];
                $pass = $query["password"];
                if(password_verify($upass,$pass) && $sts == true){
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
                    echo "You have entered a wrong password or your account status is pending";
                    echo "<br>";
                    echo "Either <a href='register.php'>Register</a> with the new Email ID or <a href='index.php'>Login</a> with an already registered ID";
                }
                
            
        
        }
    }
    }
?>