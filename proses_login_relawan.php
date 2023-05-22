<?php
include "./database.php";
 $email = $_POST['email'];
 $password = $_POST['password'];

$sql = "SELECT id_member, username,name,foto FROM user WHERE email='$email' AND password='$password'";
$query = mysqli_query($mysqli, $sql) or die ("Tidak ada databases");
$data = mysqli_fetch_array($query);
$row = mysqli_num_rows($query);

session_start();
$_SESSION['id_member'] = $data['id_member'];
$_SESSION['name'] = $data['name'];
$_SESSION['foto'] = $data['foto'];


if($row==1){
    echo"<script>alert('Login relawan sukses')</script>";
    echo"<script>top.location='./dasboard.php'</script>";
} else {
    echo"<script>alert('Login relawan gagal')</script>";
    echo"<script>top.location='./FormLogin.php'</script>";
}
?>