<?php

    session_start();
    include "../Include/connection.php";
    $username = $_SESSION['username'];


    if (!isset($_POST['delete'])) 
    {
        header("location: ../userdelete.php");
    }
    else
    {
        if(isset($_POST['delete']))
        {
            // Variables
            $user = $_POST['us'];
            $email = $_POST['em'];

            // Check User Allready Query
            $checkuser = "SELECT * FROM `admin` WHERE username = '$user' ";
            $checkuser__result = mysqli_query($con,$checkuser);

            // Check Email Allready Query
            $checkemail = "SELECT * FROM `admin` WHERE email = '$email' ";
            $checkemail__result = mysqli_query($con,$checkemail);

            // New User Create Query
            $deleteuser = "UPDATE `admin` SET `Dstatus`= '1' WHERE username = '$user' AND email = '$email' ";
            $deleteuser__result = mysqli_query($con,$deleteuser);

            if(mysqli_fetch_array($checkuser__result) == true)
            {
                if(mysqli_fetch_array($checkemail__result) == true)
                {
                    if($deleteuser__result)
                    {
                        if($username == $user)
                        {
                            unset($username);
                            $_SESSION['alertbox'] = "$user Is Delete SuccessFully";
                            $_SESSION['alertboxicon'] = "success";
                            session_destroy();
                            header("location: ../index.php");
                        }
                        else
                        {
                            $_SESSION['alertbox'] = "$user Is Delete SuccessFully";
                            $_SESSION['alertboxicon'] = "success";
                            header("location: ../userdelete.php");
                        }
                    }
                    else
                    {
                        $_SESSION['alertbox'] = "$user Is Not Delete SuccessFully";
                        $_SESSION['alertboxicon'] = "error";
                        header("location: ../userdelete.php");
                    }
                }
                else
                {
                    // Email ID Is Allready Exists
                    $_SESSION['alertbox'] = "Sorry! $email Email Is Not Avaliable";
                    $_SESSION['alertboxicon'] = "error";
                    header("location: ../userdelete.php");
                }
            }
            else
            {
                // User ID Is Allready Exists
                $_SESSION['alertbox'] = "Sorry! $user Username Is Not Avaliable";
                $_SESSION['alertboxicon'] = "error";
                header("location: ../userdelete.php");
            }
        }

    }

?>


