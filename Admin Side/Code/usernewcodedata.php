<?php

    session_start();
    include "../Include/connection.php";


    if (!isset($_POST['create'])) 
    {
        header("location: ../usernew.php");
    }
    else
    {
        if(isset($_POST['create']))
        {
            // Variables
            $image = $_FILES['profileImage']['name'];
            $user = $_POST['us'];
            $role = $_POST['role'];
            $email = $_POST['em'];
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];

            // Upload Images Folder 
            $foldernm = "../Userimages/". $image;
            // if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $foldernm))
            // {
            //     echo "success";
            // }
            // else{
            //     echo "Not Success";
            // }


            // Check Username Is 8 Characters
            if(strlen($user) >= 8)
            {
                // Check User Allready Query
                $checkuser = "SELECT * FROM `admin` WHERE username = '$user' ";
                $checkuser__result = mysqli_query($con,$checkuser);

                if(mysqli_fetch_array($checkuser__result) == true)
                {
                    // User ID Is Allready Exists
                    $_SESSION['alertbox'] = "Sorry! $user Username Is AllReady Exist";
                    $_SESSION['alertboxicon'] = "error";
                    header("location: ../usernew.php");
                }
                else
                {
                    // Check Email Allready Query
                    $checkemail = "SELECT * FROM `admin` WHERE email = '$email' ";
                    $checkemail__result = mysqli_query($con,$checkemail);
                    
                    if(mysqli_fetch_array($checkemail__result) == true)
                    {
                        // Email ID Is Allready Exists
                        $_SESSION['alertbox'] = "Sorry! $email Email Is AllReady Exist";
                        $_SESSION['alertboxicon'] = "error";
                        header("location: ../usernew.php");
                    }
                    else
                    {
                        // Check Password Is 8 Characters
                        if(strlen($pass) >= 8)
                        {
                            // Check The Password And Re - Password Equals
                            if($pass == $cpass)
                            {
                                // Upload Image
                                if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $foldernm))
                                {
                                    // New User Create Query
                                    $insertuser = "INSERT INTO `admin`(`username`, `role`, `email`, `password`, `images`, `Dstatus`) VALUES ('$user','$role','$email','$pass','$image','0')";
                                    $insertuser__result = mysqli_query($con,$insertuser);

                                    if($insertuser__result)
                                    {
                                        $_SESSION['alertbox'] = "$user Is Create SuccessFully";
                                        $_SESSION['alertboxicon'] = "success";
                                        header("location: ../usernew.php");
                                    }
                                    else
                                    {
                                        $_SESSION['alertbox'] = "$user Is Not Create SuccessFully";
                                        $_SESSION['alertboxicon'] = "error";
                                        header("location: ../usernew.php");
                                    }
                                }
                                else
                                {
                                    $_SESSION['alertbox'] = "Sorry! This Is Image Is Not Uploaded";
                                    $_SESSION['alertboxicon'] = "error";
                                    header("location: ../usernew.php");
                                }
                            }
                            else
                            {
                                $_SESSION['alertbox'] = "Sorry! This Password Not Match";
                                $_SESSION['alertboxicon'] = "error";
                                header("location: ../usernew.php");
                            }
                        }
                        else
                        {
                            $_SESSION['alertbox'] = "Sorry! Password Is Not 8 Character";
                            $_SESSION['alertboxicon'] = "error";
                            header("location: ../usernew.php");
                        }
                    }
                }
            }
            else
            {
                $_SESSION['alertbox'] = "Sorry! Username Is Not 8 Character";
                $_SESSION['alertboxicon'] = "error";
                header("location: ../usernew.php");
            }
        }

    }

?>


