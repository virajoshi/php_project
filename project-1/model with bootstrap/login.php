<!DOCTYPE html>
<html lang="en">
    <head>
        <title>login form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            body{
                background-image: url(photo/subtle-prism-triangle-pattern.jpg);
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password1 = "";
            $dbname = "personal data";
            $conn = mysqli_connect($servername, $username, $password1, $dbname);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {    
                $mail = $_POST["mail"];
                $password = $_POST["password"];
                $query = "SELECT * FROM `mydata` WHERE email = '$mail' AND PASSWORD = '$password'";
                $result = mysqli_query($conn,$query);
                if (mysqli_num_rows($result) >= 1) {
                } else {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }
            }
            mysqli_close($conn);
        ?>
        <form method="POST" action="" class="container">
            <div class="card mx-5 my-5 shadow-lg"  style="background-color: transparent;">
                <div class="card-header text-center font-weight-bold btn-lg">
                    Log In
                </div>
                <form class="form-inline">
                    <div class="form-group row mx-3 mt-4">
                        <label for="staticEmail" class="col-sm-2 col-form-label btn-lg">Email address : </label>
                        <div class="col-sm-10">
                            <input type="email" name="mail" class="form-control" id="inputEmail3" placeholder="">
                            <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="form-group row mx-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label btn-lg">Password : </label>
                        <div class="col-sm-10">
                            <input type="password" name="password"class="form-control" id="inputPassword3" placeholder="">
                            <div class="text-right" style="margin-top: 15px;font-size: 17px;">
                                <a>Forget Password..</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="btn-lg">
                            <a href="model.php">Go To Registration</a>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary mr-3 mt-1" type="submit" onclick="alert('Well done! your log in successfully stored')">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </body>
</html>