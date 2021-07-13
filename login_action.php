<?php require_once 'config.php'; ?>
<?php require_once 'library.php'; ?>
<?php
session_start();
if (chkLogin()) {
    header("Location: beranda.php");
}
?>
<?php

if (isset($_POST['login'])) {
    //        print_r($_POST);

    if ($_POST['email'] == "admin@admin" && $_POST['pass'] == "admin") {
        header("Location: /loker-Polban/admin/dashboard.php");
    } else {
        $email = $_POST['email'];
        $upass = $_POST['pass'];
        $criteria = array("email" => $email);
        $query = $collection->findOne($criteria);
        //var_dump($query);
        if (empty($query)) {
            echo "Email tidak terdaftar.";
            echo "Either <a href='register'>Register</a> with the new Email ID or <a href='index.php'>Login</a> with an already registered ID";
        } else {
            $sts = $query["status"];
            $pass = $query["password"];
            if (password_verify($upass, $pass) && $sts == true) {
                $var = setsession($email);
                //                    echo"<pre>";   
                //                    print_r($_SESSION);


                if ($var) {

                    header("Location: beranda.php");
                } else {
                    echo "Some error";
                }
            } else {
                echo "Password salah atau akun belum diverifikasi";
                echo "<br>";
                echo "Either <a href='register'>Register</a> with the new Email ID or <a href='index.php'>Login</a> with an already registered ID";
            }
        }
    }
}


?>