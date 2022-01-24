<?php

    session_start();
    include "connection.php";
    include "security.php";
    $username = $_SESSION['username'];
    $userrole = $_SESSION['userrole'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- CSS Files Links -->
    <link rel="icon" type="image/ico" href="Images/icon.png" />

</head>

<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bx-building'></i>
                <div class="logo_name">Imperial Hotel</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="home.php">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="customer-details.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Customer</span>
                </a>
                <span class="tooltip">Customer</span>
            </li>

            <?php
                if($userrole == "1" or $userrole == "2")
                {
            ?>
                    <li>
                        <a href="admin-room-book.php">
                            <i class='bx bx-book'></i>
                            <span class="links_name">Booking</span>
                        </a>
                        <span class="tooltip">Booking</span>
                    </li>

            <?php
                }

                if($userrole == "1")
                {
            ?>
                    <li>
                        <a href="addnewroom.php">
                            <i class='bx bx-plus'></i>
                            <span class="links_name">New Room</span>
                        </a>
                        <span class="tooltip">New Room</span>
                    </li>
                    <li>
                        <a href="usernew.php">
                            <i class='bx bx-user-plus'></i>
                            <span class="links_name">New User</span>
                        </a>
                        <span class="tooltip">New User</span>
                    </li>
                    <li>
                        <a href="userdelete.php">
                            <i class='bx bx-user-x'></i>
                            <span class="links_name">Delete User</span>
                        </a>
                        <span class="tooltip">Delete User</span>
                    </li>
            <?php
                }
            ?>

            <li>
                <a href="checkout.php">
                    <i class='bx bx-user-check'></i>
                    <span class="links_name">Check Out</span>
                </a>
                <span class="tooltip">Check Out</span>
            </li>
            <li>
                <a href="car-book.php">
                    <i class='bx bx-car'></i>
                    <span class="links_name">Car Book</span>
                </a>
                <span class="tooltip">Car Book</span>
            </li>
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                    <span class="links_name">Log Out</span>
                </a>
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
        
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    
                    <?php
                        $des = "SELECT * FROM `admin` WHERE username='$username'";
                        $des_result = mysqli_query($con, $des);
                        while ($d = mysqli_fetch_array($des_result)) 
                        {
                            echo"<img src='Userimages/".$d['images']."'>";
                        }
                        
                    ?>

                    <div class="name_job">
                        <div class="name">
                            <?php
                                echo $username;
                            ?>
                        </div>

                        <div class="job">
                            <?php
                                if($userrole == "1")
                                {
                                    echo "Main - Manager";
                                }
                                elseif($userrole == "2")
                                {
                                    echo "Manager";
                                }
                                else{
                                    echo "Staf";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>