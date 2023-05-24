<?php
include "./database.php";
// Menggunakan Konsep OOP
/*
    class user {
    private $email;
    private $password;
    private $name;
    private $nohp;
    private $alamat;
    public function __construct($email, $password, $name,$nohp,$alamat) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->nohp = $nohp;
        $this->alamat = $alamat;
    }
    public function save() {
        $database = new Database();
        $conn = $database->getConnection();
        
        $sql = "INSERT INTO user (email, password, name, nohp, alamat) VALUES ('$this->email', '$this->password', '$this->name', '$this->nohp','$this->alamat')";
        if($conn->query($sql) === TRUE) {
            echo "<script>alert('Daftar relawan sukses!')</script>";
            echo "<script>top.location='./FormLogin.php'</script>";
        } else {
            echo "<script>alert('Daftar relawan Gagal')</script>";
            echo "<script>top.location='./FormLogin.php'</script>";
            echo "Err
            or: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    
    $user = new user($email, $password, $name,);
    $user->save();
}
 */
// Coding tanpa OOP 
include ("./config.php");
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
// $status = $_POST['status'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$sql = "INSERT INTO user (name, email, password, nohp, alamat ) VALUE ('$name','$email','$password','$nohp','$alamat')";
$query = mysqli_query ($mysqli, $sql) or die ("Tidak ada database"); 

if($query) {
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;     //Enable verbose debug output
        $mail->isSMTP();                       //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';  //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                 //Enable SMTP authentication
        $mail->Username   = 'ferry908ardiansyah@gmail.com';      //SMTP username
        $mail->Password   = 'hbzxlnxyvzqrddgq';                 //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //Enable implicit TLS encryption
        $mail->Port       = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('from@example.com', 'Daftar Sukses');
        $mail->addAddress($email, $username); //Add a recipient
        //Content
        $mail->isHTML(true);                   //Set email format to HTML
        $mail->Subject = 'Daftar Relawan';
        $mail->Body    = 'Selamat '.$name. '<br></br> Email Anda : '.$email.'<br></br> Password Anda : '.$password.'<br></br> Anda Berhasil daftar <b>Volunteer ATS</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    echo "<script>alert('Daftar relawan sukses!')</script>";
    echo "<script>top.location='./FormLogin.php'</script>";
    
}else {
    echo "<script>alert('Daftar relawan Gagal')</script>";
    echo "<script>top.location='./FormLogin.php'</script>";
}

?>