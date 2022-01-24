<?php

    session_start();
    // include "Include/connection.php";
    include "../Include/connection.php"

?>



<!------------------------------------------------- Record Update Data Start ------------------------------------------------->

<?php


    if(!isset($_POST['btn-update']))
    {
        header("location: ../customer-details.php");
    }
    else
    {
        if(isset($_POST['btn-update']))
        {

            // Variables
            $id = $_POST['update_id'];

            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $status = $_POST['selectData'];


            // Query

            $uquery = "UPDATE `customer_details` SET `mobile`='$mobile',`email`='$email',`address`='$address',`status`='$status' WHERE id='$id' ";
            $update_result = mysqli_query($con,$uquery);

            if($update_result)
            {
                // Variable

                $roomno = $_POST['roomno'];
                $status = $_POST['selectData'];


                // Query

                $statusupdate = "UPDATE `rooms` SET `status`=$status WHERE room_no='$roomno' ";
                $statusupdate_result = mysqli_query($con,$statusupdate);

                if($statusupdate_result)
                {
                    $_SESSION['alertbox'] = "Data Is Update SuccessFully";
                    $_SESSION['alertboxicon'] = "success";
                    header("location: ../customer-details.php");
                }
                else
                {
                    $_SESSION['alertbox'] = "Data Is Not Update SuccessFully";
                    $_SESSION['alertboxicon'] = "error";
                    header("location: ../customer-details.php");
                }

            }
            else
            {
                $_SESSION['alertbox'] = "Data Is Not Update SuccessFully";
                $_SESSION['alertboxicon'] = "error";
                header("location: ../customer-details.php");
            }

        }
    }

?>

<!------------------------------------------------- Record Update Data End ------------------------------------------------->


<!------------------------------------------------- Record Delete Data Start ------------------------------------------------->

<?php

    if(isset($_POST['btn-delete']))
    {
        // Variables
        $Did = $_POST['update_id'];

        // Query
        $deleteupdate = "UPDATE `customer_details` SET `Dstatus`='1' WHERE id='$Did' ";
        $deleteupdate_result = mysqli_query($con,$deleteupdate);

        if($deleteupdate_result)
        {
            $_SESSION['alertbox'] = "Delete Record SuccessFully";
            $_SESSION['alertboxicon'] = "success";
            header("location: ../customer-details.php");
        }
        else
        {
            $_SESSION['alertbox'] = "Not Delete Record SuccessFully";
            $_SESSION['alertboxicon'] = "error";
            header("location: ../customer-details.php");
        }
    }

?>

<!------------------------------------------------- Record Delete Data End ------------------------------------------------->


<!------------------------------------------------- Close button Start ------------------------------------------------->
<?php

        if(isset($_POST['btn-close']))
        {
            header("location: ../customer-details.php");
        }

?>
<!------------------------------------------------- Close button End ------------------------------------------------->