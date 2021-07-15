<?php session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/loker-Polban/config.php');
if (isset($_GET['id'])) {
    $LKR = $loker->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}
if (isset($_POST['submit'])) {
    require($_SERVER['DOCUMENT_ROOT'] . '/loker-Polban/config.php');
    $loker->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    $_SESSION['success'] = "Akun Berhasil dihapus";
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
        <CENTER>
            <h1>Hapus Data Akun</h1>
        </CENTER>
        <h3> Hapus akun <?php echo "$usr->nama"; ?> dengan Nomor Induk <?php echo "$usr->nomor_induk"; ?> ? </h3>
        <form method="POST">
            <div class="form-group">
                <input type="hidden" value="<?php echo "$usr->nomor_induk"; ?>" class="form-control" name="nomor_induk">
                <a href="data_akun.php" class="btn btn-primary">Kembali</a>
                <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</body>

</html>