<?php

    include "Include/navbar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page | Admin Side | Imperial Hotel - Rajkot</title>


    <!-- CSS Files Links -->
    <link rel="icon" type="image/ico" href="Images/icon.png" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Fonts/Poppins.css">
    <link rel="stylesheet" href="SCSS/style.css">


</head>

<body>

    <main>

        <div class="page_title">
            <div class="page_name">
                <h2>CheckOut Information</h2>
            </div>


            <form method="post">
                <div class="search-box">
                    <h2>Search Name</h2>
                    <div class="searchbox_button">
                        <div class="input">
                            <i class="bx bx-search"></i>
                            <input type="search" name="searchText" placeholder="Search for Any Data...">
                        </div>
                        <div class="button">
                            <button name="search-btn">Search</button>
                        </div>
                    </div>
                </div>

                <?php

                    if(isset($_POST['search-btn']))
                    {
                        $searchText = $_POST['searchText'];
                        $query = "select * from `customer_details` where `status`='0,1' and concat(`id`, `fname`, `lname`, `room_no`, `checkin`, `checkout`, `member`, `children`, `mobile`, `email`, `address`) LIKE '%".$searchText."%'";
                        $search_result = filterTable($query);
                    }
                    else
                    {
                        $query = "select * from `customer_details` where `status`='0,1'";
                        $search_result = filterTable($query);
                    }

                    function filterTable($query)
                    {
                        include "Include/connection.php";
                        $filter_Result = mysqli_query($con, $query);
                        return $filter_Result;
                    }

                ?>

            </form>


            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Room No</th>
                            <th>Mobile</th>
                            <th>Member</th>
                            <th>Children</th>
                            <th>CheckIn</th>
                            <th>CheckOut</th>
                            <th>Price</th>
                            <th>Car Book</th>
                            <th>CheckOut</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php


                    
                        while($f = mysqli_fetch_array($search_result))
                        {

                    ?>
                        <tr>
                            <td><?php echo $f['id'] ?></td>
                            <td><?php echo $f['fname'], $f['lname'];?></td>
                            <td><?php echo $f['room_no'];?></td>
                            <td><?php echo $f['mobile'];?></td>
                            <td><?php echo $f['member'];?></td>
                            <td><?php echo $f['children'];?></td>
                            <td><?php echo $f['checkin'];?></td>
                            <td><?php echo $f['checkout'];?></td>
                            <td><?php echo $f['price'];?></td>
                            
                            <td class="hidedata"><?php echo $f['email'];?></td>
                            <td class="hidedata"><?php echo $f['room_type'];?></td>

                            <td><button class="cars-btn">Car</button></td>
                            <td><button class="checkout-btn">CheckOut</button></td>
                        </tr>
                        
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>


    <!-- Checkout Model Start -->
    <div class="checkoutmodel">
        <div class="checkout-model-bg">

            <form action="Code/checkoutcodedata.php" method="post">
                <div class="model">
                    <div class="model-header">
                        <input type="hidden" name="id" id="idno" readonly>
                        <input type="text" name="name" id="name" readonly>
                    </div>
                    <div class="model-body">
                        <div class="input w100">
                            <div class="w50">
                                <label for="">CheckIn Date</label>
                                <input type="text" id="check_in" readonly>
                            </div>
                            <div class="w50">
                                <label for="">CheckOut Date</label>
                                <input type="text" id="check_out" readonly>
                            </div>
                        </div>
                        <div class="input">
                            <label for="">Room No</label>
                            <input type="text" name="roomno" id="room_no" readonly>
                        </div>
                        <div class="input">
                            <label for="">Room Type</label>
                            <input type="text" id="room_type" readonly>
                        </div>
                        <div class="input">
                            <label for="">Email</label>
                            <input type="text" id="email" readonly>
                        </div>
                        <div class="input">
                            <label for="">Payment</label>
                            <input type="text" id="price" readonly>
                        </div>
                    </div>
                    <div class="model-footer">
                        <button type="submit" name="btn-checkout" class="checkout-model-check">CheckOut</button>
                        <button type="submit" name="btn-close" class="checkout-model-close">Close</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Checkout Model End -->


    <!-- Car Model Start -->
    <div class="carbookmodel">
        <div class="car-model-bg">

            <form action="Code/carbookcodedata.php" method="post">
                <div class="model">
                    <div class="model-header">
                        <input type="hidden" name="id" id="cidno" readonly>
                        <input type="text" name="cname" id="cname" readonly>
                    </div>
                    <div class="model-body">
                        <div class="input">
                            <label for="">Email *</label>
                            <input type="text" name="cemail" id="cemail" required readonly>
                        </div>
                        <div class="input">
                            <label for="">Mobile *</label>
                            <input type="text" name="cmobile" id="cmobile" required readonly>
                        </div>
                        <div class="input">
                            <label for="">Driver Name *</label>
                            <select name="drivername">
                                <option value="Raj -> GJ03-AJ-4520">Raj</option>
                                <option value="Het -> GJ03-DG-7289">Het</option>
                                <option value="Meet -> GJ03-EG-4820">Meet</option>
                                <option value="Tej -> GJ03-XR-7475">Tej</option>
                            </select>
                        </div>
                        <div class="input">
                            <label for="">Payment *</label>
                            <input type="text" required readonly value="200">
                        </div>
                    </div>
                    <div class="model-footer">
                        <button type="submit" name="btn-cars" class="cars-model-check">Car Book</button>
                        <button type="submit" name="btn-close" class="cars-model-close">Close</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Car Model End -->



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