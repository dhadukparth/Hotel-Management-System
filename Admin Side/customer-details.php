<?php

    include "Include/navbar.php";
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information | Admin Side | Imperial Hotel - Rajkot</title>


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
                <h2>Customer Information</h2>
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
                        $query = "select * from `customer_details` where concat(`id`, `fname`, `lname`, `room_no`, `checkin`, `checkout`, `member`, `children`, `mobile`, `email`, `address`) LIKE '%".$searchText."%'";
                        $search_result = filterTable($query);
                    }
                    else
                    {
                        $query = "select * from `customer_details`";
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
                            <th>Room Price</th>
                            <th>Mobile</th>
                            <th>CheckIn</th>
                            <th>CheckOut</th>
                            <th>Member</th>
                            <th>Children</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                            while($f = mysqli_fetch_array($search_result))
                            {
                                if($f['Dstatus']==0)
                                {

                        ?>
                                    <tr>
                                        <td><?php echo $f['id'];?></td>
                                        <td><?php echo $f['fname'], $f['lname'];?></td>
                                        <td><?php echo $f['room_no'];?></td>
                                        <td><?php echo $f['price'];?></td>
                                        <td><?php echo $f['mobile'];?></td>
                                        <td><?php echo $f['checkin'];?></td>
                                        <td><?php echo $f['checkout'];?></td>
                                        <td><?php echo $f['member'];?></td>
                                        <td><?php echo $f['children'];?></td>
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
                                        <td class="hidedata"><?php echo $f['address']; ?></td>
                                        <td class="hidedata"><?php echo $f['room_type']; ?></td>
                                        <td class="hidedata"><?php echo $f['email']; ?></td>
                                        <td>
                                            <?php
                                                if($f['status']==0)
                                                {
                                                    echo "<button class='model-btn'>Edit</button>";
                                                }
                                                elseif($f['status']==1)
                                                {
                                                    echo "<button class='model-btn dis' disabled='disabled'>Edit</button>";
                                                }
                                                else
                                                {
                                                    echo "<button class='model-btn dis' disabled='disabled'>Edit</button>";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    
                        <?php
                                }
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>




    <!-- Edit Model Start -->
    <div class="model">
        <div class="modal-bg">

            <form action="Code/customerdetailscodedata.php" method="post">
                <div class="modal">
                    <div class="model-header">
                        <input type="hidden" name="update_id" id="idno">
                        <input type="text" name="name" id="name" required readonly>
                    </div>
                    <div class="model-body">
                        <div class="input">
                            <label for="">Room No *</label>
                            <input type="text" name="roomno" id="roomno" readonly required autocomplete="off">
                        </div>
                        <div class="input">
                            <label for="">Room Type *</label>
                            <input type="text" id="roomtype" readonly required autocomplete="off">
                        </div>
                        <div class="input">
                            <label for="">Email *</label>
                            <input type="email" name="email" id="email" required autocomplete="off">
                        </div>
                        <div class="input">
                            <label for="">Mobile *</label>
                            <input type="text" name="mobile" id="mobile" required autocomplete="off">
                        </div>
                        <div class="input">
                            <label for="">Address *</label>
                            <textarea id="address" name="address" required  autocomplete="off"></textarea>
                        </div>
                        <div class="input">
                            <label for="">Status *</label>
                            <select name="selectData" required>
                                <option value="">-- Select Status --</option>
                                <option value="0">Booking</option>
                                <option value="-1">Cancel</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btn-update" class="btn modal-edit">Update</button>
                        <button type="submit" name="btn-delete" class="btn modal-delete">Delete</button>
                        <button type="submit" name="btn-close" class="btn modal-close">Close</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Edit Model End -->





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