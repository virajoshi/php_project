<?php
    
?>
<!-- class User{
    private $db;

    public function __construct($servername,$username,$password1,$dbname) {
        $this->db = new mysqli($servername,$username,$password1,$dbname);
    }
    public function adduser($fname, $name, $mail, $password){
        $sql = "INSERT INTO `mydata` (`first name`, `last name`, `email`, `password`) VALUES ('$fname', '$name', '$mail', '$password')";
        if ($this->db->query($sql) === true) {
            header('Location:/intership/user.php');
            exit();
        } else {
            return false;
        }
    }
    public function __destruct() {
        $this->db->close();
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User("localhost","root","","personal data");

    $fname = $_POST["fname"];
    $name = $_POST["name"];
    $mail = ($_POST["mail"]);
    $password = ($_POST["password"]);

    $user->adduser($fname,$name,$mail,$password); 
}-->