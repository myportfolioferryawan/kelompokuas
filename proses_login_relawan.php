<?php
include ("./config.php");
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT id_member, username FROM user WHERE email='$email' AND password='$password'";
$query = mysqli_query($mysqli, $sql) or die ("Tidak ada databases");
$data = mysqli_fetch_array($query);
$row = mysqli_num_rows($query);

session_start();
$_SESSION['id_member'] = $data['id_member'];
$_SESSION['username'] = $data['username'];
$_SESSION['name'] = $data['name'];


if($row==1){
    echo"<script>alert('Login relawan sukses')</script>";
    echo"<script>top.location='./index.php'</script>";
} else {
    echo"<script>alert('Daftar relawan gagal')</script>";
    echo"<script>top.location='./FormLogin.php'</script>";
}
?>