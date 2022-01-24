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
                <form method="POST">
                    <div class="input">
                        <div class="icon">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="text">
                            <input type="text" name="funm" id="Username" title="Enter Username" required>
                            <label for="Username">Username</label>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit" name="forgot">
                            <div class="text">
                                <span>Next</span>
                            </div>
                            <div class="icon">
                                <i class='bx bx-right-arrow-alt'></i>
                            </div>
                        </button>
                    </div>
                </form>
                <div class="links">
                    <a href="index.php">Back</a>
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

    if(isset($_POST['forgot']))
    {
        // Variable
        $funm = $_POST['funm'];

        // Condition
        $checkuser = "SELECT * FROM `admin` WHERE username='$funm' AND `Dstatus`='0' ";
        $checkuser_result = mysqli_query($con,$checkuser);

        if(mysqli_fetch_array($checkuser_result) == true)
        {
            $_SESSION['checkuser'] = $funm;
            header("location: forgotpasswordsecond.php");
        }
        else{
            echo"
                <script>
                    swal({
                        title: '$funm User Is Not Avaliable',
                        icon: 'error',
                        button: 'Ok',
                    });
                </script>
            ";
        }
    }

?>