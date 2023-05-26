<?php
    class User 
    {
        private $servername  = "localhost";
        private $username    = "root";
        private $password1   = "";
        private $dbname      = "personal data"; 
        public $conn;

        function __construct()
        {
            $this->conn = new mysqli($this->servername,$this->username,$this->password1,$this->dbname);
            if(!$this->conn->connect_error){
                return $this->conn;
            }
        }
        public function delete_user($uid) {
            $sql = "DELETE FROM `mydata` WHERE id = $uid";
            $result = mysqli_query($this->conn,$sql);
            if($result) {
                //echo "delete user";
                header('Location:/intership/user.php');
            }
        }
    }

    $u1 = new User();
    $id = $_GET["deleteid"];
    $u1->delete_user($id);
?>