<?php
    require_once __DIR__ . "/vendor/autoload.php";
    try{
    $collection = (new MongoDB\Client)->loginreg->userdata;
    //$m = new MongoDB\Client;
    //echo "Connection to database Successfull!";echo"<br />";
    
    //$db = $m->loginreg;
    //echo "Databse loginreg selected";
    
    //$collection = $db->userdata; 
    //echo "Collection userdata Selected Successfully";
    }
    catch (Exception $e){
        die("Error. Couldn't connect to the server. Please Check");
    }
       session_start();
?>

