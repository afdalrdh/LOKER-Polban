<?php require_once 'config.php'; ?>
<?php require_once 'library.php'; ?>
<?php
    
    if(chkLogin()){
        header("Location: beranda.php");
    }
?>
<?php
// if (isset($_POST['submit'])) {
//     $insertOneResult = $loker->insertOne([
//         'pemilik' => $_POST['pemilik'],
//         'type' => $_POST['type'],
//         'jenis_loker' => $_POST['jenis_loker'],
//         'judul_loker' => $_POST['judul_loker'],
//         'deskripsi_loker' => $_POST['deskripsi_loker'],
//         'requirement' => $_POST['requirement'],
//         'tgl_berakhir' => $_POST['tgl_berakhir'],
//         'tgl_pengajuan' => $_POST['tgl_pengajuan'],
//         'status' => 'false',
//     ]);
//     $_SESSION['success'] = "Data Mahasiswa Berhasil di tambahkan";
//     header("Location: home.php");
// }
   if(isset($_POST['reg'])){
       
        $name = $_POST['name'];
        $pekerjaan = $_POST['pekerjaan'];
        $nomor_induk = $_POST['nomor_induk'];
        $prodi = $_POST['prodi'];
        $gender = $_POST['gender'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $temp  = $_POST['pass'];
        $options = array('cost' => 10);
        $pass = password_hash($temp, PASSWORD_BCRYPT, $options);
        $status = false;

        $arrays = array(
            
            "nama"          => $name,
            "type"          => $pekerjaan,
            "nomor_induk"   => $nomor_induk,
            "prodi"         => $prodi,
            "gender"        => $gender,
            "tgl_lahir"     => $tgl_lahir,
            "alamat"        => $alamat,
            "no_tlp"        => $no_telp,
            "email"         => $email,
            "password"      => $pass,
            "status"        => $status
        
        );
        
        $query = chkemail($email);
        if($query){
            register($arrays);
            header("Location: index.php");
            }
       else{
        echo "Email already registered!";
           echo"<br>";
        echo "Please <a href='register.php'>Register</a> with another email ID";
       }
}

?>