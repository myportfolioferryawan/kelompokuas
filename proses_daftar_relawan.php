<?php
include ("./config.php");
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
// $status = $_POST['status'];

$sql = "INSERT INTO user (name, email, password, nohp, alamat ) VALUE ('$name','$email','$password','$nohp','$alamat')";
$query = mysqli_query ($mysqli, $sql) or die ("Tidak ada database"); 

if($query) {
    echo "<script>alert('Daftar relawan sukses!')</script>";
    echo "<script>top.location='./FormLogin.php'</script>";
    
}else {
    echo "<script>alert('Daftar relawan Gagal')</script>";
    echo "<script>top.location='./FormLogin.php'</script>";
}

?>