<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>user module</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            body{
                background-image: url(photo/subtle-prism-triangle-pattern.jpg);
                background-size: cover; 
            }
            #form{
                box-shadow: 0px 0px 5px rgb(0, 0, 0);
                border-radius: 5px;
                color: black;
                background-color: transparent;
                margin-top: 33px;
                padding: 25px;
            }   
            #mysearch{
                width: 100%;
                font-size: 14px;
                border: 2px solid #53525296;
                border-radius: 5px;
            }
            #mysearch1{
                width: 100%;
                font-size: 17px;
                border: 2px solid #53525296;
                border-radius: 5px;
            }
            p{
                font-size: 19px;
                margin: 8px 0px 8px 0px;
            }
            button{
                display: flex;
                justify-content: flex-end;
            }
        </style>
    </head>
    <body>
        <?php

            $conn = new mysqli('localhost','root','','personal data');
            if(!$conn){
                die(mysqli_error($conn));
            }

            if (isset($_POST["add"])) {
                $fname = $_POST["fname"];
                $name = $_POST["name"];
                $number = $_POST["number"];
                $mail = $_POST["mail"];
                $password = $_POST["password"];

                $sql = "INSERT INTO `mydata` (`first name`, `last name`, `mobile`, `email`, `password`) VALUES ('$fname', '$name', '$number', '$mail', '$password')";

                if ($conn->query($sql) === TRUE) {
                    header('Location:/intership/user.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            if(isset($_GET["updateid"]))
            {
                $id = $_GET["updateid"];

                $sql = "SELECT * FROM `mydata` WHERE id = $id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $fname = $row["first name"];
                $name = $row["last name"];
                $number = $row["mobile"];
                $mail = $row["email"];
                $password = $row["password"];

                if (isset($_POST["update"])) 
                {
                    $fname = $_POST["fname"];
                    $name = $_POST["name"];
                    $number = $_POST["number"];
                    $mail = $_POST["mail"];

                    $sql = "UPDATE `mydata` SET `first name`='$fname',`last name`='$name', `mobile`='$number', `email`='$mail' WHERE id = $id";
                    $result = mysqli_query($conn,$sql);
                    if ($result){
                        header('Location:/intership/user.php');
                    } else {
                        die(mysqli_error($conn));
                    }
                }
                ?>
                <div class="container">
                    <div class="row" style="display:flex;justify-content:center;">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" id="form" style="margin-top: 85px;">
                            <h4>Edit User</h4>
                            <hr/>
                            <form method="post" action="">
                                <p>First Name: </p>
                                <input type="search"  placeholder="" name="fname" id="mysearch1" class="form-control" value="<?php echo "$fname";?>">
                                <p>Last Name: </p>
                                <input type="search" placeholder="" name="name" id="mysearch1" class="form-control" value="<?php echo "$name";?>">
                                <p>Mobile Number: </p>
                                <input type="tel" placeholder="" name="number" id="mysearch1" class="form-control" value="<?php echo "$number";?>">
                                <p>Email address: </p>
                                <input type="search" placeholder="" name="mail" id="mysearch1" class="form-control" value="<?php echo "$mail";?>">
                                <hr/>
                                <div style="display: flex;justify-content:center;"> 
                                    <button name="update" Class="btn btn-primary btn-block btn-lg" onclick='alert("Success! Your data successfully change.")'>Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            } else {
            ?>
                <div class="container">
                    <div class="row d-flex justify-content-center" >
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" id="form">
                            <div style="display: flex;justify-content: flex-end;">
                                    <a href="user.php" style="color: black;font-size: 18px;font-weight: bold;">User Data table</a>
                            </div>
                            <h4>Add User</h4>
                            <hr/>
                            <form method="post" action="">
                                <div>
                                    <p>First Name : </p>
                                    <input type="search" placeholder="" name="fname" id="mysearch" class="form-control">
                                    <p>Last Name : </p>
                                    <input type="search" placeholder="" name="name" id="mysearch" class="form-control">
                                    <p>Mobile Number : </p>
                                    <input type="tel" placeholder="" name="number" id="mysearch" class="form-control">
                                    <p>Email address : </p>
                                    <input type="search" placeholder="" name="mail" id="mysearch" class="form-control">
                                    <p>Password : </p>
                                    <input type="password" name="password" id="mysearch" class="form-control">
                                    <p>Confirm Password : </p>
                                    <input type="password" name="cpassword" id="mysearch" class="form-control">
                                    <hr/>
                                    <div style="display: flex;justify-content:space-between;align-items: center;">
                                        <a href="Userlogin.php" style="color: black;font-size: 15px;font-weight: bold;">Go to Log in</a>
                                        <button type="submit" name="add" Class="btn btn-primary" onclick="alert('Success! Your registration successfully done.')">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            } 
        ?>
    </body>              
</html>