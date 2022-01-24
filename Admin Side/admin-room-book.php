<?php

    include "Include/navbar.php";

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

<main>
        <div class="room-container">

            <!---------------------------- Single Ac Room ----------------------------->

            <div class="room_title">
                <h2>Single Ac Room</h2>
                <div class="main-box">

                <?php
                    $squery = "SELECT * FROM `rooms` WHERE room_type='Single Ac' ";
                    $single = mysqli_query($con,$squery);
                    while($s = mysqli_fetch_array($single))
                    {
                        if($s['Dstatus'] == 0)
                        {
                                        
                ?>
                            <div class="box">
                                <div class="room_number">
                                    <h2>
                                        <span>Room No :</span>
                                        <span><?php echo $s['room_no']; ?></span>
                                    </h2>
                                </div>
                                <div class="room_detail">
                                    <h2>
                                        <span>Room Status :</span>
                                        <span>
                                            <?php
                                                if($s['status']==0)
                                                {
                                                    echo "<font color='red'>Unavailable</font>";
                                                }
                                                else{
                                                    echo "<font color='green'>Available</font>";
                                                }
                                            ?>
                                        </span>
                                    </h2>
                                    <div class="button">
                                        <?php
                                            if($s['status']==0)
                                            {
                                        ?>
                                                <a href="#" style="display: none;">Book</a>
                                        <?php
                                            }
                                            else{
                                        ?>
                                                <a name="abtn" href="booking-form.php?rn=<?php echo $s['room_no']; ?>">Book</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                <?php
                        }
                    }
                ?>
                
                </div>
            </div>







            <!---------------------------- Single Non - Ac Room ----------------------------->

            <div class="room_title">
                <h2>Single Non Ac Room</h2>
                <div class="main-box">

                <?php

                    $snquery = "SELECT * FROM `rooms` WHERE room_type='Single Non Ac' ";
                    $singlenon = mysqli_query($con,$snquery);
                    while($sn = mysqli_fetch_array($singlenon))
                    {
                        if($sn['Dstatus'] == 0)
                        {
                    
                ?>


                            <div class="box">
                                <div class="room_number">
                                    <h2>
                                        <span>Room No :</span>
                                        <span><?php echo $sn['room_no']; ?></span>
                                    </h2>
                                </div>
                                <div class="room_detail">
                                    <h2>
                                        <span>Room Status :</span>
                                        <span>
                                            <?php
                                                if($sn['status']==0)
                                                {
                                                    echo "<font color='red'>Unavailable</font>";
                                                }
                                                else{
                                                    echo "<font color='green'>Available</font>";
                                                }
                                            ?>
                                        </span>
                                    </h2>
                                    <div class="button">
                                        <?php
                                            if($sn['status']==0)
                                            {
                                        ?>
                                                <a href="#" style="display: none;">Book</a>
                                        <?php
                                            }
                                            else{
                                        ?>
                                                <a href="booking-form.php?rn=<?php echo $sn['room_no']; ?>">Book</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                <?php
                        }
                    }
                ?>


                </div>
            </div>









            <!---------------------------- Double Ac Room ----------------------------->

            <div class="room_title">
                <h2>Double Ac Room</h2>
                <div class="main-box">

                <?php

                    $dquery = "SELECT * FROM `rooms` WHERE room_type='Double Ac' ";
                    $double = mysqli_query($con,$dquery);
                    while($d = mysqli_fetch_array($double))
                    {
                        if($d['Dstatus'] == 0)
                        {
                    
                ?>

                            <div class="box">
                                <div class="room_number">
                                    <h2>
                                        <span>Room No :</span>
                                        <span><?php echo $d['room_no']; ?></span>
                                    </h2>
                                </div>
                                <div class="room_detail">
                                    <h2>
                                        <span>Room Status :</span>
                                        <span>
                                            <?php
                                                if($d['status']==0)
                                                {
                                                    echo "<font color='red'>Unavailable</font>";
                                                }
                                                else{
                                                    echo "<font color='green'>Available</font>";
                                                }
                                            ?>
                                        </span>
                                    </h2>
                                    <div class="button">
                                        <?php
                                            if($d['status']==0)
                                            {
                                        ?>
                                                <a href="#" style="display: none;">Book</a>
                                        <?php
                                            }
                                            else{
                                        ?>
                                                <a href="booking-form.php?rn=<?php echo $d['room_no']; ?>">Book</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                <?php
                        }
                    }
                ?>

                </div>
            </div>


            <!---------------------------- Double Non - Ac Room ----------------------------->

            <div class="room_title">
                <h2>Double Non Ac Room</h2>
                <div class="main-box">

                <?php

                    $dnquery = "SELECT * FROM `rooms` WHERE room_type='Double Non Ac' ";
                    $doublenon = mysqli_query($con,$dnquery);
                    while($dn = mysqli_fetch_array($doublenon))
                    {
                        if($dn['Dstatus'] == 0)
                        {
                    
                ?>

                            <div class="box">
                                <div class="room_number">
                                    <h2>
                                        <span>Room No :</span>
                                        <span><?php echo $dn['room_no']; ?></span>
                                    </h2>
                                </div>
                                <div class="room_detail">
                                    <h2>
                                        <span>Room Status :</span>
                                        <span>
                                            <?php
                                                if($dn['status']==0)
                                                {
                                                    echo "<font color='red'>Unavailable</font>";
                                                }
                                                else{
                                                    echo "<font color='green'>Available</font>";
                                                }
                                            ?>
                                        </span>
                                    </h2>
                                    <div class="button">
                                        <?php
                                            if($dn['status']==0)
                                            {
                                        ?>
                                                <a href="#" style="display: none;">Book</a>
                                        <?php
                                            }
                                            else{
                                        ?>
                                                <a href="booking-form.php?rn=<?php echo $dn['room_no']; ?>">Book</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                <?php
                        }
                    }
                ?>

                </div>
            </div>

            <!---------------------------- Luxury Room ----------------------------->

            <div class="room_title">
                <h2>Luxury Room</h2>
                <div class="main-box">

                <?php

                    $lquery = "SELECT * FROM `rooms` WHERE room_type='Luxury' ";
                    $luxury = mysqli_query($con,$lquery);
                    while($l = mysqli_fetch_array($luxury))
                    {
                        if($l['Dstatus'] == 0)
                        {
                                       
                ?>

                            <div class="box">
                                <div class="room_number">
                                    <h2>
                                        <span>Room No :</span>
                                        <span><?php echo $l['room_no']; ?></span>
                                    </h2>
                                </div>
                                <div class="room_detail">
                                    <h2>
                                        <span>Room Status :</span>
                                        <span>
                                            <?php
                                                if($l['status']==0)
                                                {
                                                    echo "<font color='red'>Unavailable</font>";
                                                }
                                                else{
                                                    echo "<font color='green'>Available</font>";
                                                }
                                            ?>
                                        </span>
                                    </h2>
                                    <div class="button">
                                        <?php
                                            if($l['status']==0)
                                            {
                                        ?>
                                                <a href="#" style="display: none;">Book</a>
                                        <?php
                                            }
                                            else{
                                        ?>
                                                <a href="booking-form.php?rn=<?php echo $l['room_no']; ?>">Book</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                <?php
                        }
                    }
                ?>

                </div>
            </div>

        </div>
</main>


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