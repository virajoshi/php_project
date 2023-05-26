<?php
    $conn = new mysqli('localhost','root','','personal data');

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    // $id = $_GET["deleteid"];
    // $sql = "UPDATE mydata SET deleted = 1 WHERE id = $id";
    // if($conn->query($sql) === TRUE){
    //     header('Location:/project-1/user.php');
    // } else {
    //     die(mysqli_error($conn));
    // }


    if (isset($_GET['deleteid'])) {

        $id = $_GET['deleteid'];
        
        $query = "UPDATE mydata SET deleted = 1 WHERE id = $id";

        mysqli_query($conn, $query);

        header('Location:/project-1/user.php');
    }
    $conn->close();
?>
