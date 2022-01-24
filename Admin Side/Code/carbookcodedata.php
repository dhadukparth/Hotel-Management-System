<?php

    include "../Include/connection.php";


?>

<!------------------------------------------------- Car Booking Button Start ------------------------------------------------->

<?php

    if(!isset($_POST['btn-cars']))
    {
        header("location: ../checkout.php");
    }
    else
    {

        if(isset($_POST['btn-cars']))
        {
            // Variables

            $cname = $_POST['cname'];
            $cemail = $_POST['cemail'];
            $cmobile = $_POST['cmobile'];
            $drivername = $_POST['drivername'];

            // Query

            $insert = "INSERT INTO `cars_booking`(`name`, `email`, `mobile`, `cars`) VALUES ('$cname','$cemail','$cmobile','$drivername')";

            $insert_result = mysqli_query($con,$insert);

            if($insert_result)
            {
                $_SESSION['alertbox'] = "Car Booking SuccessFully";
                $_SESSION['alertboxicon'] = "success";
                header("location: ../checkout.php");
            }
            else{
                $_SESSION['alertbox'] = "Car Booking Not SuccessFully";
                $_SESSION['alertboxicon'] = "success";
                header("location: ../checkout.php");
            }

        }
    }
?>

<!------------------------------------------------- Car Booking Button End ------------------------------------------------->


<!------------------------------------------------- Car Button Close Start ------------------------------------------------->

<?php

    if(isset($_POST['btn-close']))
    {
        header("location: ../checkout.php");
    }

?>

<!------------------------------------------------- Car Button Close End ------------------------------------------------->