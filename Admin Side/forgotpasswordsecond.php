<?php

    session_start();
    $fcunm = $_SESSION['checkuser'];
    include "Include/connection.php";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Admin Side | Imperial Hotel</title>

    <!-- CSS Files Links -->
    <link rel="icon" type="image/ico" href="Images/icon.png" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Fonts/Poppins.css">
    <link rel="stylesheet" href="SCSS/style.css">

</head>
<body>
    <div class="login-body">
        <div class="login__container forgotpassword">
            <div class="login__right">
                <div class="login__title">
                    <h2>Forgot Password</h2>
                </div>
                <form action="" method="POST">
                    <div class="input">
                        <div class="icon">
                            <i class='bx bx-lock'></i>
                        </div>
                        <div class="text">
                            <input type="password" name="password" id="newpassword" title="Enter New Password" required>
                            <label for="newpassword">New Password</label>
                        </div>
                    </div><div class="input">
                        <div class="icon">
                            <i class='bx bx-lock'></i>
                        </div>
                        <div class="text">
                            <input type="password" name="repassword" id="repassword" title="Enter New Re - Password" required>
                            <label for="repassword">Re - Password</label>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit" name="updatepass">
                            <div class="icon">
                                <i class='bx bx-lock'></i>
                            </div>
                            <div class="text">Password Update</div>
                        </button>
                    </div>
                </form>
                <div class="links">
                    <a href="forgotpasswordfirst.php">Back</a>
                    <a href="index.php">Login</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Java Script Liinks -->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/sweetalert.min.js"></script>
    <script src="JS/main.js"></script>

</body>
</html>

<?php

    // Check Session
    if(!$fcunm)
    {
        header("location: forgotpasswordfirst.php");
    }
    else
    {

        if(isset($_POST['updatepass']))
        {

            // Variables
            $pass = $_POST['password'];
            $repass = $_POST['repassword'];


            // Password Length Conditions
            if(strlen($pass) >= 8)
            {
                
                // Password Match Condition
                if($pass == $repass)
                {
                    $passwordupdate = "UPDATE `admin` SET `password`='$pass' WHERE username = '$fcunm' ";
                    $passwordupdate_result = mysqli_query($con,$passwordupdate);

                    if($passwordupdate_result == true)
                    {
                        session_destroy();
                        header("location: index.php");
                    }
                    else{
                        session_destroy();
                        echo"
                            <script>
                                swal({
                                    title: 'Not Update Password',
                                    text: 'Sorry! Password Is Not Update',
                                    icon: 'error',
                                    button: 'Ok',
                                });
                            </script>
                        ";    
                    }
                }
                else{
                    echo"
                        <script>
                            swal({
                                title: 'Not Match Password',
                                text: 'Sorry! Password Is Not Match',
                                icon: 'error',
                                button: 'Ok',
                            });
                        </script>
                    ";
                }
            }
            else{
                echo"
                    <script>
                        swal({
                            title: 'Not 8 Character',
                            text: 'Password Is Not 8 Character',
                            icon: 'error',
                            button: 'Ok',
                        });
                    </script>
                ";
            }
        }
    }
?>