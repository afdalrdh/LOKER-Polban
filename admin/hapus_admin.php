<?php session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/loker-Polban/config.php');
if (isset($_GET['id'])) {
    $adm = $admin->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}
if (isset($_POST['submit'])) {
    require($_SERVER['DOCUMENT_ROOT'] . '/loker-Polban/config.php');
    $admin->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    $_SESSION['success'] = "Admin Berhasil dihapus";
    header("Location: data_admin.php");
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
            <h1>Hapus Admin</h1>
        </CENTER>
        <h3> Hapus admin <?php echo "$adm->nama"; ?> dengan email <?php echo "$adm->email"; ?> ? </h3>
        <form method="POST">
            <div class="form-group">
                <a href="data_admin.php" class="btn btn-primary">Kembali</a>
                <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</body>

</html>