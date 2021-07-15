<?php session_start();
   require($_SERVER['DOCUMENT_ROOT'] . '/loker-Polban/config.php');
   if (isset($_GET['id'])) {
      $LKR = $loker->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
      $loker->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['status' => true,]]
      );
      $_SESSION['success'] = "Loker berhasil disetujui";
      header("Location: data_loker.php");
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Admin Page</title>
      <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <br>
         <CENTER><h1>Setujui Loker</h1></CENTER>
         <form method="POST">
            <div class="form-group">
               <strong>Yakin setujui loker?</strong>
               <br>
               <button type="submit" name="submit" class="btn btn-success">Ya</button>
               <a href="data_akun.php" class="btn btn-primary">Kembali</a>
            </div>
         </form>
      </div>
   </body>
</html>