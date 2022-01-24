<?php

    session_start();
    include "../include/connection.php";


    if(!isset($_POST['insert']))
    {
        header("location: booking-form.php");
    }
    else
    {

        if(isset($_POST['insert']))
        {

            // Variables
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $roomno = $_POST['roomno'];
            $roomtype = $_POST['roomtype'];
            $roomprice = $_POST['roomprice'];
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
            $member = $_POST['member'];
            $children = $_POST['children'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $date = date("d-m-Y");

            // Mobile Number Check 10 Digits
            if(strlen($mobile) == 10)
            {
                // Input Emali Check Allready
                $checkmobile = "SELECT * FROM `customer_details` WHERE mobile = '$mobile' ";
                $checkmobile__result = mysqli_query($con,$checkmobile);

                if(mysqli_fetch_array($checkmobile__result))
                {
                    $_SESSION['alertbox'] = "Sorry! $mobile Is Allready Exists";
                    $_SESSION['alertboxicon'] = "error";
                    header("location: ../booking-form.php");
                }
                else
                {
                    // Input Emali Check Allready
                    $checkemail = "SELECT * FROM `customer_details` WHERE email = '$email' ";
                    $checkemail__result = mysqli_query($con,$checkemail);

                    if(mysqli_fetch_array($checkemail__result) == true)
                    {
                        $_SESSION['alertbox'] = "Sorry! $email Is Allready Exists";
                        $_SESSION['alertboxicon'] = "error";
                        header("location: ../booking-form.php");
                    }

                    else
                    {

                        // Insert Query
                        $insertquery = "INSERT INTO `customer_details`(`fname`, `lname`, `room_no`, `room_type`, `checkin`, `checkout`, `member`, `children`, `mobile`, `email`, `address`, `price`, `status`, `Dstatus`) VALUES ('$firstname', '$lastname', '$roomno', '$roomtype', '$checkin', '$checkout', '$member', '$children', '$mobile', '$email', '$address', '$roomprice', '0', '0')";
                        $insertquery__result = mysqli_query($con,$insertquery);

                        if($insertquery__result)
                        {

                            // Variable
                            $roomno = $_POST['roomno'];

                            // Rooms Update Query
                            $roomupdate = "UPDATE `rooms` SET `status`= '0' WHERE room_no='$roomno'";
                            $roomupdate__result = mysqli_query($con,$roomupdate);

                            if($roomupdate__result)
                            {
                                $_SESSION['pdfname'] = $firstname;
                                $_SESSION['pdflname'] = $lastname;
                                
                                $_SESSION['alertbox'] = "Room Book SuccessFully";
                                $_SESSION['alertboxicon'] = "success";
                                header("location: ../downloadpdf.php");                    
                            }
                            else
                            {
                                $_SESSION['alertbox'] = "Room Book Not SuccessFully";
                                $_SESSION['alertboxicon'] = "error";
                                header("location: ../booking.php");
                            }
                        }
                        else
                        {
                            $_SESSION['alertbox'] = "Not Insert Record SuccessFully";
                            $_SESSION['alertboxicon'] = "error";
                            header("location: ../booking.php");
                        }
                    }
                }
            }
            else
            {
                $_SESSION['alertbox'] = "Sorry! $mobile Is Not Current";
                $_SESSION['alertboxicon'] = "error";
                header("location: ../booking-form.php");
            }
        }
    }

?>