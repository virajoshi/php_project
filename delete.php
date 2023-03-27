<?php
    $conn = new mysqli('localhost','root','','personal data');

    if(!$conn){
        die (mysqli_error($conn));
    }

    if (isset($_GET["deleteid"])){
        $id = $_GET["deleteid"];

        $sql = "DELETE FROM `mydata` WHERE id = $id";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('Location:/intership/user.php');
        } else {
            die(mysqli_error($conn));
        }
    }

?>
