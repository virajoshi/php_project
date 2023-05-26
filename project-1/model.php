<html lang="en">
    
    <head>
        <title>user module</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
                private $servername = "localhost";
                private $username = "root";
                private $password1 = "";
                private $dbname = "personal data";
                public $conn;

                function __construct()
                {
                    $this->conn  = new mysqli($this->servername, $this->username, $this->password1, $this->dbname);
                    if (!$this->conn->connect_error) {
                        return $this->conn;
                    }
                }
                public function addUser($post)
                {
                    $fname = $post["fname"];
                    $lname = $post["lname"];
                    $number = $post["number"];
                    $mail = $post["mail"];
                    $password = $post["password"];

                    $sql = "INSERT INTO mydata (`first name`, `last name`, `mobile`, `email`, `password`) VALUES ('$fname', '$lname', '$number', '$mail', '$password')";
                    $result = $this->conn->query($sql);
                    if ($result) {
                        header('location:user.php');
                    } else {
                        echo " Error " . $sql . "<br/>" . $this->conn->error;
                    }
                }
                public function updateUser($updateid)
                {
                    $fname = $_POST["fname"];
                    $lname = $_POST["lname"];
                    $number = $_POST["number"];
                    $mail = $_POST["mail"];
                    $updateid = $_POST["hid"];

                    $sql = "UPDATE `mydata` SET `first name`='$fname',`last name`='$lname', `mobile`='$number', `email`='$mail' WHERE id = $updateid";
                    $result = $this->conn->query($sql);
                    if ($result) {
                        header('location:user.php');
                    } else {
                        echo " Error " . $sql . "<br/>" . $this->conn->error;
                    }
                }
                
            }
            $user = new User();
            if (isset($_POST["submit"])) {
                $user->addUser($_POST);
            }
        ?>
        <form action="model.php" method="POST">
            <div class="card mx-5 my-5 shadow-lg" style="background-color: transparent;">
                <div class="card-header text-center font-weight-bold btn-lg">
                    Registration
                </div>
                <form class="form-inline">
                    <div class="form-group row mx-3 mt-3">
                        <label for="exampleInputName" class="col-sm-2 col-form-label btn-lg">First name : </label>
                        <div class="col-sm-10">
                            <input type="text" name="fname" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row mx-3">
                        <label for="exampleInputName" class="col-sm-2 col-form-label btn-lg">Last name : </label>
                        <div class="col-sm-10">
                            <input type="text" name="lname" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row mx-3">
                        <label for="exampleInputName" class="col-sm-2 col-form-label btn-lg">Mobile Number : </label>
                        <div class="col-sm-10">
                            <input type="tel" name="number" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row mx-3">
                        <label for="staticEmail" class="col-sm-2 col-form-label btn-lg">Email address : </label>
                        <div class="col-sm-10">
                            <input type="email" name="mail" class="form-control" id="inputEmail3" placeholder="" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="form-group row mx-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label btn-lg">Password : </label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mx-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label btn-lg">Confirm Password : </label>
                        <div class="col-sm-10">
                            <input type="password" name="cpassword" class="form-control" id="inputPassword3" placeholder="">
                        </div>
                    </div>
                </form>
                <div class="card-footer d-flex justify-content-between">
                    <div class="text-muted btn-lg">
                        <a href="login.html">Go Back to Log in</a>
                    </div>
                    <div class="text-muted text-right">
                        <button class="btn btn-primary mr-3 mt-1" type="submit" name="submit" onclick="alert('Success! Your registration successfully done.')">SUBMIT</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>