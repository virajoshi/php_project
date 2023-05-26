<?php
    $servername = "localhost";
    $username = "root";
    $password1 = "";
    $dbname = "personal data";
    $conn = mysqli_connect($servername, $username, $password1, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST["password"];
        $npassword = $_POST["npassword"];
        $cpassword = $_POST["cpassword"];

        $sql ="DELETE FROM `mydata` WHERE PASSWORD = '$password'";
    }
    mysqli_close($conn);
?>