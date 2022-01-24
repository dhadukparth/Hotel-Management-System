<?php

    session_start();
    include "../Include/connection.php";


    if (!isset($_POST['create'])) 
    {
        header("location: ../addnewcode.php");
    }
    else
    {
        if(isset($_POST['create']))
        {
            // Variables
            $rno = $_POST['roomno'];
            $rtype = $_POST['roomtype'];

            // Check Room Query
            $checkroom = "SELECT * FROM `rooms` WHERE room_no='$rno' AND room_type='$rtype' AND Dstatus='0' ";
            $checkroom__result = mysqli_query($con,$checkroom);

            // Check Dstatus Room Query
            $checkdstatus = "SELECT * FROM `rooms` WHERE room_no='$rno' AND room_type='$rtype' AND Dstatus='1'";
            $checkdstatus__result = mysqli_query($con,$checkdstatus);

            // Check Room Number Query
            $checkrno = "SELECT * FROM `rooms` WHERE room_no='$rno' ";
            $checkrno__result = mysqli_query($con,$checkrno);


            if(mysqli_fetch_array($checkroom__result) == true)
            {
                // Room Is Allready Exists
                $_SESSION['alertbox'] = "Sorry! This Room Is AllReady Exist";
                $_SESSION['alertboxicon'] = "error";
                header("location: ../addnewroom.php");
            }
            else
            {
                if(mysqli_fetch_array($checkdstatus__result) == true)
                {
                    // Update Dstatus Query
                    $updatedstatus = "UPDATE `rooms` SET `Dstatus`= '0' WHERE room_no = '$rno' AND room_type='$rtype' ";
                    $updatedstatus__result = mysqli_query($con,$updatedstatus);

                    if($updatedstatus__result)
                    {
                        $_SESSION['alertbox'] = "Create Room SuccessFully";
                        $_SESSION['alertboxicon'] = "success";
                        header("location: ../addnewroom.php");
                    }
                    else
                    {
                        $_SESSION['alertbox'] = "Not Create Room SuccessFully";
                        $_SESSION['alertboxicon'] = "error";
                        header("location: ../addnewroom.php");
                    }
                }
                else
                {
                    if(mysqli_fetch_array($checkrno__result) == true)
                    {
                        // New Create Room
                        $_SESSION['alertbox'] = "This Room Number Is All ready Create";
                        $_SESSION['alertboxicon'] = "error";
                        header("location: ../addnewroom.php");   
                    }
                    else
                    {
                        // New Create Room
                        $createquery = "INSERT INTO `rooms`(`room_no`, `room_type`, `room_price`, `status`, `Dstatus`) VALUES ('$rno','$rtype','1','0')";
                        $createquery__result = mysqli_query($con,$createquery);

                        if($createquery__result)
                        {
                            $_SESSION['alertbox'] = "Create New Room";
                            $_SESSION['alertboxicon'] = "success";
                            header("location: ../addnewroom.php");
                        }
                        else
                        {
                            $_SESSION['alertbox'] = "Not Create New Room";
                            $_SESSION['alertboxicon'] = "error";
                            header("location: ../addnewroom.php");
                        }
                    }
                }
            }

        }

    }


    // -------------------------------------------------  Delete Rooms -----------------------------------------------------------
    if(isset($_POST['delete']))
    {
        // Variables
        $rno = $_POST['roomno'];
        $rtype = $_POST['roomtype'];

        // Check Room
        $dcheckroom = "SELECT * FROM `rooms` WHERE room_no = '$rno' AND room_type = '$rtype' AND Dstatus = '0' ";
        $dcheckroom__result = mysqli_query($con,$dcheckroom);


        if(mysqli_fetch_array($dcheckroom__result) == true)
        {
            // Update Dstatus Room
            $deleteroom = "UPDATE `rooms` SET `Dstatus`= '1' WHERE room_no = '$rno' AND room_type = '$rtype' ";
            $deleteroom__result = mysqli_query($con,$deleteroom);

            if($deleteroom__result)
            {
                $_SESSION['alertbox'] = "Delete Room SuccessFully";
                $_SESSION['alertboxicon'] = "success";
                header("location: ../addnewroom.php");
            }
            else
            {
                $_SESSION['alertbox'] = "Delete Room Not SuccessFully";
                $_SESSION['alertboxicon'] = "error";
                header("location: ../addnewroom.php");
            }
        }
        else
        {
            $_SESSION['alertbox'] = "This Room Not Avaliable";
            $_SESSION['alertboxicon'] = "error";
            header("location: ../addnewroom.php");
        }
    }
?>