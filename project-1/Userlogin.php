<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>login form</title>
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
                margin-top: 85px;
                padding: 25px;
            }
            #mysearch{
                width: 100%;
                font-size: 19px;
                border: 2px solid #53525296;
                border-radius: 5px;
            }
            p{
                font-size: 19px;
                margin-top: 15px;
            }
            a{
                margin-top: 15px;
                display: flex;
                justify-content: flex-end;
                font-size: 17px;
            }
            @media screen and (/* min-width: 450p */x) {
                body{
                    margin: 0;
                    padding: 0;
                    height: 100%;
                    width: 100%;
                }
                form {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    height: 100%;
                    width: 100%;
                }
                input[type=search], input[type=password] {
                    font-size: 18px;
                }
                input[type=submit] {
                    font-size: 18px;
                    padding: 15px 30px;
                }
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
                    echo "User not found.";
                }
            }
            mysqli_close($conn);
        ?>
        <div class="container">
            <div class="row d-flex justify-content-center" >
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" id="form">
                    <form method="post" action="Userlogin.php">
                        <div style="display: flex;justify-content: flex-end;">
                            <a href="Usermodel.php" style="color: black;font-size: 18px;">Account Registration</a>
                        </div>
                        <h3>Log In</h3>
                        <hr/>
                        <p>Email address : </p>
                        <input type="search" placeholder="" name="mail" id="mysearch" class="form-control">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        <p>Password : </p>
                        <input type="password" maxlength="9" name="password" id="mysearch" class="form-control">
                        <a>Forget Password.. </a>
                        <hr/>
                        <div style="display: flex;justify-content:flex-end;">
                            <button type="submit" Class="btn btn-primary" onclick="alert('Well done! your log in successfully stored')">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>