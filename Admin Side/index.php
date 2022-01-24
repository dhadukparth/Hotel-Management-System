<?php

    session_start();
    include "Include/connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | Admin Side | Imperial Hotel - Rajkot</title>
     

    <!-- CSS Files Links -->
    <link rel="icon" type="image/ico" href="Images/icon.png" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Fonts/Poppins.css">
    <link rel="stylesheet" href="SCSS/style.css">


</head>

<body>

    <div class="login-body">
        <div class="login__container">
            <div class="login__left">
                <div class="login__image">
                    <img src="Images/login.jpg" alt="">
                </div>
            </div>
            <div class="login__right">
                <div class="login__title">
                    <h2>Login</h2>
                </div>
                <form action="#" method="POST">
                    <div class="input">
                        <div class="icon">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="text">
                            <input type="text" name="user" id="Username" title="Enter Username" required>
                            <label for="Username">Username</label>
                        </div>
                    </div>
                    <div class="input">
                        <div class="icon">
                            <i class='bx bx-lock'></i>
                        </div>
                        <div class="text">
                            <input type="password" name="pass" id="Password" title="Enter Password" required>
                            <label for="Password">Password</label>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit" name="btnlogin">
                            <div class="icon">
                                <i class='bx bx-log-in'></i>
                            </div>
                            <div class="text">Login</div>
                        </button>
                    </div>
                </form>
                <div class="password__reset">
                    <a href="forgotpasswordfirst.php">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Java Scripts Files -->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/sweetalert.min.js"></script>
    <script src="JS/main.js"></script>

</body>

</html>




<?php

    if(isset($_POST['btnlogin']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $checkuser = "SELECT * FROM `admin` WHERE username='$user'";
        $checkpass = "SELECT * FROM `admin` WHERE password='$pass'";
        $login = "SELECT * FROM `admin` WHERE username = '$user' AND password = '$pass' AND Dstatus = '0' ";

        $checkuser_result = mysqli_query($con,$checkuser);
        $checkpass_result = mysqli_query($con,$checkpass);
        $login_result = mysqli_query($con,$login);

        
        if(mysqli_fetch_array($checkuser_result))
        {
            if(mysqli_fetch_array($checkpass_result))
            {
                if(mysqli_fetch_array($login_result))
                {
                    $des = "SELECT * FROM `admin` WHERE username='$user' ";
                    $des_result = mysqli_query($con, $des);
                    while ($d = mysqli_fetch_array($des_result)) 
                    {
                        $_SESSION['username'] = $user;
                        $_SESSION['userrole'] = $d['role'];
                        header("location: Home.php");
                    }
                }
                else
                {
                    echo"
                        <script>
                            swal({
                                title: 'Sorry! $user User Is Not Avaliable',
                                icon: 'error',
                                button: 'Ok',
                            });
                        </script>
                    ";
                }    
            }
            else
            {
                echo"
                    <script>
                        swal({
                            title: 'Ronge Password',
                            text: 'Please, Enter Your Current Password!....',
                            icon: 'error',
                            button: 'Ok',
                        });
                    </script>
                ";
            }    
        }
        else
        {
            echo"
                <script>
                    swal({
                        title: 'Ronge Username',
                        text: 'Please, Enter Your Current Username!....',
                        icon: 'error',
                        button: 'Ok',
                    });
                </script>
            ";
        }
    }

?>