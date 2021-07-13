<?php session_start();
   require($_SERVER['DOCUMENT_ROOT'] . '/loker-Polban/config.php');
   if (isset($_GET['id'])) {
      $USR = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
      $collection->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['status' => true,]]
      );
      $_SESSION['success'] = "Data Mahasiswa berhasil diubah";
      header("Location: data_akun.php");
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>APLIKASI INTERAKTIF</title>
      <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <br>
         <CENTER><h1>Setujui Akun</h1></CENTER>
         <form method="POST">
            <div class="form-group">
               <strong>Yakin setujui akun?</strong>
               <br>
               <button type="submit" name="submit" class="btn btn-success">Ya</button>
               <a href="data_akun.php" class="btn btn-primary">Kembali</a>
            </div>
         </form>
      </div>
   </body>
</html>