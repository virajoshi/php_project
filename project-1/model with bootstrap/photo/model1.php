<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>model1</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <style>
            body {
                background-image: url(photo/subtle-prism-triangle-pattern.jpg);
                background-size: cover;
            }
        </style>
    </head>
    <body>
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
                public function edit_user($uid){
                    return mysqli_query($this->conn,"SELECT * FROM `mydata` WHERE id = $uid");
                }
                public function update_user($data){
                    $id = $data['id'];
                    $fname = $data['fname'];
                    $lname = $data['lname'];
                    $number = $data['number'];
                    $mail = $data['mail'];

                    $sql = "UPDATE `mydata` SET `first name`='$fname',`last name`='$lname', `mobile`='$number', `email`='$mail' WHERE id = $id";
                    $result = mysqli_query($this->conn,$sql);
                    if($result){
                        header('location:/intership/user.php');
                    }
                }
            }
            $user1 = new User();
            $id = $_GET["updateid"];
            $result = $user1->edit_user($id);
            $row = mysqli_fetch_assoc($result);
            
            if(isset($_POST['update_user'])) {
                $user1->update_user($_POST);
            }

        ?>
        <form action="model.php" method="POST">
            <div class="card mx-5 my-5 shadow-lg" style="background-color: transparent;">
                <div class="card-header text-center font-weight-bold btn-lg">
                    Edit User
                </div>
                <form class="form-inline">
                    <div class="form-group row mx-3 mt-3">
                        <label for="exampleInputName" class="col-sm-2 col-form-label btn-lg">First name : </label>
                        <div class="col-sm-10">
                            <input type="text" name="fname" placeholder="" class="form-control"  required >
                        </div>
                    </div>
                    <div class="form-group row mx-3">
                        <label for="exampleInputName" class="col-sm-2 col-form-label btn-lg">Last name : </label>
                        <div class="col-sm-10">
                            <input type="text" name="lname" placeholder="" class="form-control" required >
                        </div>
                    </div>
                    <div class="form-group row mx-3">
                        <label for="exampleInputName" class="col-sm-2 col-form-label btn-lg">Mobile Number : </label>
                        <div class="col-sm-10">
                            <input type="tel" name="number" placeholder="" class="form-control" required >
                        </div>
                    </div>
                    <div class="form-group row mx-3">
                        <label for="staticEmail" class="col-sm-2 col-form-label btn-lg">Email address : </label>
                        <div class="col-sm-10">
                            <input type="email" name="mail" placeholder="" class="form-control" id="inputEmail3" required >
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="text-muted text-right">
                            <input type="hidden" name="hid" value="<?php echo '$id'; ?>">
                            <button class="btn btn-primary mr-3 mt-1" type="submit" name="update_user" onclick="alert('Success! Your registration successfully done.')">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </body>
</html>