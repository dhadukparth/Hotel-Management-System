<?php

    session_start();
    include "../Include/connection.php";

?>


<!------------------------------------------------- CheckOut button Start ------------------------------------------------->

<?php

    if(!isset($_POST['btn-checkout']))
    {
        header("location: checkout.php");
    }
    else
    {
        if(isset($_POST['btn-checkout']))
        {
            // Variables
            $id = $_POST['id'];
            $name = $_POST['name'];

            // Query
            $update = "UPDATE `customer_details` SET `status`='1' WHERE id='$id'";

            $update_result = mysqli_query($con,$update);

            if($update_result)
            {         

                // Variables
                $roomno = $_POST['roomno'];

                // Query
                $roomupdate = "UPDATE `rooms` SET `status`=1 WHERE room_no='$roomno' ";
                $roomupdate_result = mysqli_query($con,$roomupdate);
                if($roomupdate_result)
                {
                    $_SESSION['alertbox'] = "Checkout SuccessFully";
                    $_SESSION['alertboxicon'] = "success";
                    header("location: ../checkout.php");
                }
                else{
                    $_SESSION['alertbox'] = "Not Checkout";
                    $_SESSION['alertboxicon'] = "error";
                    header("location: ../checkout.php");
                }
                
            }
            else{
                $_SESSION['alertbox'] = "Not Checkout";
                $_SESSION['alertboxicon'] = "error";
                header("location: ../checkout.php");
            }
        }
    }

?>

<!------------------------------------------------- CheckOut button Start ------------------------------------------------->



<!------------------------------------------------- Close button Start ------------------------------------------------->
<?php
    if(isset($_POST['btn-close']))
    {
        header("location: ../checkout.php");
    }
?>
<!------------------------------------------------- Close button End ------------------------------------------------->