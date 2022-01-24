<?php

    include "Include/connection.php";
    $rno = $_GET['rn'];
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Book | Admin Side | Imperial Hotel - Rajkot</title>

        <!-- CSS Files Start -->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link rel="icon" href="Images/logo.png">
        <link rel="stylesheet" href="SCSS/style.css">
        <!-- CSS Files End -->

</head>

<body>

    <?php
        if(!$rno && !$rtype && !$rprice)
        {
            header("location: booking.php");
        }
        else
        {
            $featchdata = "SELECT * FROM `rooms` WHERE room_no='$rno' ";
            $featchdata__result = mysqli_query($con,$featchdata);
            while($r = mysqli_fetch_array($featchdata__result))
            {
    ?>

            <div class="booking_form">
                <form method="post" action="Code/bookingformcodedata.php">
                    <h2>Booking Form</h2>
            
                    <div class="input w100">
            
                        <div class="w50">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="firstname" autocomplete="off" required title="Enter First Name">
                        </div>
                        
                        <div class="w50">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lastname" autocomplete="off" required title="Enter Last Name">
                        </div>
                    </div>

                    <div class="input">
                        <label for="roomno">Room No</label>
                        <input type="text" id="roomno" name="roomno" autocomplete="off" required readonly title="Room Number" value="<?php echo $rno;?>">
                    </div>

                    <div class="input">
                        <label for="roomtype">Room Type</label>
                        <input type="text" id="roomtype" name="roomtype" autocomplete="off" required readonly title="Room Type" value="<?php echo $r['room_type']; ?>">
                    </div>

                    <div class="input">
                        <label for="roomprice">Room Price</label>
                        <input type="text" id="roomprice" name="roomprice" autocomplete="off" required readonly title="Room Price" value="<?php echo $r['room_price']; ?>">
                    </div>
        <?php
            }
        ?>
            
                    <div class="input">
                        <label for="cin">CheckIn Date</label>
                        <input type="date" id="cin" name="checkin" autocomplete="off" required title="Enter CheckIn Date">
                    </div>
            
                    <div class="input">
                        <label for="cout">CheckOut Date</label>
                        <input type="date" id="cout" name="checkout" autocomplete="off" required title="Enter CheckOut Date">
                    </div>
            
                    <div class="input">
                        <label for="mem">Member</label>
                        <input type="number" id="mem" name="member" autocomplete="off" required title="Enter All Members">
                    </div>
            
                    <div class="input">
                        <label for="chil">Children</label>
                        <input type="number" id="chil" name="children" autocomplete="off" required title="Enter Children">
                    </div>
                                        
                    <div class="input">
                        <label for="mobile">Mobile</label>
                        <input type="number" id="mobile" name="mobile" autocomplete="off" required title="Enter Mobile Number">
                    </div>
                    
                    <div class="input">
                        <label for="em">Email</label>
                        <input type="email" id="em" name="email" autocomplete="off" required title="Enter EmailID">
                    </div>

                    <div class="input">
                        <label for="addr">Address</label>
                        <textarea name="address" id="addr" cols="30" rows="3" autocomplete="off" required title="Enter Current Address"></textarea>
                    </div>
                    
                    <div class="button">
                        <button type="submit" name="insert" id="showdownloadbtn">Submit</button>
                    </div>
                </form>

                <div class="back-button">
                    <button onclick="window.history.back(-1)">Back</button>
                </div>
            </div>
    <?php
        }
    ?>

    <!-- Java Scripts Files -->
    <script src="JS/jquery.min.js"></script>
    <!-- <script src="JS/sweetalert.min.js"></script> -->
    <script src="JS/main.js"></script>


</body>

</html>