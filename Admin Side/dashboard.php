<?php

    include "Include/navbar.php";
    $userrole = $_SESSION['userrole'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord | Admin Side | Imperial Hotel - Rajkot</title>


    <!-- CSS Files Links -->
    <link rel="icon" type="image/ico" href="Images/icon.png" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Fonts/Poppins.css">
    <link rel="stylesheet" href="SCSS/style.css">


</head>

<body>

    <main>
        
        <div class="dashboard-section">

            <div class="hotel-title">
                <h2>Welcome To Imperial Hotel</h2>
            </div>

            <div class="main-box">

                <div class="box">
                    <div class="icon_text">
                        <div class="icon">
                            <i class="bx bx-hotel"></i>
                        </div>
                        <div class="text">
                            <?php
                                $allroom = "SELECT * FROM `rooms`";
                                $allroom_result = mysqli_query($con,$allroom);
                                $all = mysqli_num_rows($allroom_result);
                                echo "<h2>$all</h2>";
                            ?>
                            <p>All Room</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="icon_text">
                        <div class="icon">
                            <i class="bx bx-book"></i>
                        </div>
                        <div class="text">
                            <?php
                                $bookroom = "SELECT * FROM `rooms` WHERE status='0'";
                                $bookroom_result = mysqli_query($con,$bookroom);
                                $book = mysqli_num_rows($bookroom_result);
                                echo "<h2>$book</h2>";
                            ?>
                            <p>Booking Room</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="icon_text">
                        <div class="icon">
                            <i class="bx bx-book"></i>
                        </div>
                        <div class="text">
                            <?php
                                $unbookroom = "SELECT * FROM `rooms` WHERE status='1' or status='-1' ";
                                $unbookroom_result = mysqli_query($con,$unbookroom);
                                $unbook = mysqli_num_rows($unbookroom_result);
                                echo "<h2>$unbook</h2>";
                            ?>
                            <p>UnBooking Room</p>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="icon_text">
                        <div class="icon">
                            <i class="bx bx-user-check"></i>
                        </div>
                        <div class="text">
                            <?php
                                $checkoutroom = "SELECT * FROM `rooms` WHERE status='1' or status='1'";
                                $checkoutroom_result = mysqli_query($con,$checkoutroom);
                                $checkout = mysqli_num_rows($checkoutroom_result);
                                echo "<h2>$checkout</h2>";
                            ?>
                            <p>CheckOut</p>
                        </div>
                    </div>
                </div>

            </div>



            <div class="new-customer_profile">

                <div class="new-customer">
                    <div class="box-head">
                        <h2>New Customer</h2>
                        <a href="customer-details.php">
                            <span>See All -></span>
                        </a>
                    </div>
                    <div class="box-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Room No</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $fquery = "select * from customer_details order by id desc limit 0,13";
                                    $limitquery = mysqli_query($con,$fquery);
                                    while($f = mysqli_fetch_array($limitquery))
                                    {
                                        if($f['Dstatus']==0)
                                        {
                                ?>
                                            <tr>
                                                <td><?php echo $f['id']; ?></td>
                                                <td><?php echo $f['fname'], $f['lname'];?></td>
                                                <td><?php echo $f['room_no']; ?></td>
                                                <td><?php echo $f['mobile']; ?></td>
                                                <td>
                                                    <?php
                                                        if($f['status']==0)
                                                        {
                                                            echo "<font color='green'>Booking</font>";
                                                        }
                                                        elseif($f['status']==1)
                                                        {
                                                            echo "<font color='Blue'>CheckOut</font>";
                                                        }
                                                        else{
                                                            echo "<font color='red'>Cancle</font>";
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php echo $f['address']; ?></td>
                                            </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="admin-profile">
                    <div class="profile-info">
                        <h2>Admin Profile</h2>
                    </div>
                    <div class="profile-body">
                        <div class="image">
                        <?php
                            $des = "SELECT * FROM `admin` WHERE username='$username'";
                            $des_result = mysqli_query($con, $des);
                            while ($d = mysqli_fetch_array($des_result)) 
                            {
                                echo"<img src='Userimages/".$d['images']."'>";
                            }
                        ?>

                        </div>
                        <div class="content">
                            <h2>
                                <?php
                                    echo $username;
                                ?>
                            </h2>
                            <span>
                                <?php
                                    if($userrole == "1")
                                    {
                                        echo "Main - Manager";
                                    }
                                    elseif($userrole == "2")
                                    {
                                        echo "Manager";
                                    }
                                    else
                                    {
                                        echo "Staf";
                                    }
                                ?>
                            </span>

                            <div class="icon">
                                <i class="bx bxl-facebook"></i>
                                <i class="bx bxl-whatsapp"></i>
                                <i class="bx bxl-instagram"></i>
                            </div>
                        </div>
                    </div>
                    <div class="logout">
                        <a href="logout.php">
                            <i class='bx bx-log-out' id="log_out"></i>
                            <span>LogOut</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </main>


    <!-- Java Scripts Files -->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/sweetalert.min.js"></script>
    <script src="JS/main.js"></script>


</body>

</html>