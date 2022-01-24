<?php

    session_start();
    $username = $_SESSION['username'];
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


    <!-- CSS Files Links -->
    <link rel="icon" type="image/ico" href="Images/icon.png" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Fonts/Poppins.css">
    <link rel="stylesheet" href="SCSS/style.css">


</head>

<body>

    <?php
        if(!isset($_SESSION['username']))
        {
            header("location: 404.php");
        }
        else
        {
            if(!$rno && !$rtype && !$rprice)
            {
                header("location: admin-room-book.php");
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
                                    <label for="">First Name *</label>
                                    <input type="text" name="firstname" required autocomplete="off">
                                </div>
                                
                                <div class="w50">
                                    <label for="">Last Name *</label>
                                    <input type="text" name="lastname" required autocomplete="off">
                                </div>
                            </div>

                            <div class="input">
                                <label for="">Room No *</label>
                                <input type="text" name="roomno" required autocomplete="off" readonly value="<?php echo $rno; ?>">
                            </div>

                            <div class="input">
                                <label for="">Room Type *</label>
                                <input type="text" name="roomtype" required autocomplete="off" readonly value="<?php echo $r['room_type']; ?>">
                            </div>

                            <div class="input">
                                <label for="">Room Price *</label>
                                <input type="text" name="roomprice" required autocomplete="off" readonly value="<?php echo $r['room_price']; ?>">
                            </div>
                    
                            <div class="input">
                                <label for="">CheckIn Date *</label>
                                <input type="date" name="checkin" required autocomplete="off">
                            </div>
                    
                            <div class="input">
                                <label for="">CheckOut Date *</label>
                                <input type="date" name="checkout" required autocomplete="off">
                            </div>
                    
                            <div class="input">
                                <label for="">Member *</label>
                                <input type="number" name="member" required autocomplete="off">
                            </div>
                    
                            <div class="input">
                                <label for="">Children *</label>
                                <input type="number" name="children" required autocomplete="off">
                            </div>
                    
                            
                            <div class="input">
                                <label for="">Mobile *</label>
                                <input type="number" name="mobile" required autocomplete="off">
                            </div>
                            
                            <div class="input">
                                <label for="">Email *</label>
                                <input type="email" name="email" required autocomplete="off">
                            </div>

                            <div class="input">
                                <label for="">Address *</label>
                                <textarea name="address" cols="30" rows="3" required autocomplete="off"></textarea>
                            </div>
                            
                            <div class="button">
                                <button type="submit" name="insert">Submit</button>
                            </div>
                        </form>

                        <div class="back-button">
                            <button onclick="window.history.back(-1)">Back</button>
                        </div>
                    </div>
    <?php
                }
            }
        }
    ?>

    <!-- Java Scripts Files -->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/sweetalert.min.js"></script>
    <script src="JS/main.js"></script>

    <?php
        if(isset($_SESSION['alertbox']) && $_SESSION['alertbox'] != '')
        {
    ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['alertbox']; ?>",
                    icon: "<?php echo $_SESSION['alertboxicon']; ?>",
                    button: "Ok",
                });
            </script>
    <?php
            unset($_SESSION['alertbox']);
        }
    ?>

</body>

</html>