<!-- <button class='btn btn-primary my-4 ml-5'><a href='model.php' class='text-light'>New User</a></button>"; -->
<!-- /*
File name: Exercise 2 
Created Date: 14-03-2023
File Type: Variable creation
Created By: Viraj Joshi
*/ -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <style>
            .tablestyle{
                text-align: center;
            }
            .tbstyle{
                text-align: center;
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
            $sql= "SELECT * FROM mydata";
            $result = mysqli_query($conn,$sql);
            echo "<div>
                <button class='btn btn-primary my-4 ml-5'><a href='Usermodel.php' class='text-light'>Add a User</a></button>";
                if (mysqli_num_rows($result) > 0) 
                {
                    echo "<br>";
                    echo "<div>";
                    echo "<table class='table table-bordered mr-3'>
                        <thead>
                            <tr>
                                <th scope='col' class ='tablestyle'> id </th>
                                <th scope='col' class ='tablestyle'> First Name </th>
                                <th scope='col' class ='tablestyle'> Last Name </th>
                                <th scope='col' class ='tablestyle'> Mobile </th>
                                <th scope='col' class ='tablestyle'> Email </th>
                                <th scope='col' class ='tablestyle'> password </th>
                                <th scope='col' class ='tablestyle'> operation </th>
                            </tr>
                        </thead>";
                    
                        while ($row = mysqli_fetch_assoc($result)) 
                            {
                                $id = $row["id"];
                                $fname = $row["first name"];
                                $name = $row["last name"];
                                $number = $row["mobile"];
                                $mail = $row["email"];
                                $password = $row["password"];
                                echo " <tr>
                                    <th scope='row' class ='tbstyle'> " . $id . "</th>
                                    <td class ='tbstyle'> " . $fname . "</td>
                                    <td class ='tbstyle'> " . $name . "</td>
                                    <td class ='tbstyle'> " . $number . "</td>
                                    <td class ='tbstyle'> " . $mail . "</td>
                                    <td class ='tbstyle'> " . $password . "</td>";
                                    echo ' <td class ="tbstyle">
                                        <button class="btn btn-primary"><a href="Usermodel.php?updateid='.$id.'" class="text-light"> Update </a></button>
                                        <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light"> Delete </a></button>
                                    </td>';
                                echo "</tr>";
                            }
                        echo "</table>";
                    echo "</div>";
                } else {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No users found in database";
                }
            echo "</div>";
        ?>
    </body>
</html>