<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "voluntter_ats";
    private $conn;
    
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function getConnection() {
        return $this->conn;
    }
}

// $database = new Database();
// $conn = $database->getConnection();

$host = "localhost";
$user = "root";
$pass = "";
$db ="volunter_ats";

$mysqli = mysqli_connect($host,$user,$pass, $db) or die ("Tidak dapat terkoneksi");

?>

