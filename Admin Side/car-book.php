<?php

    include "Include/navbar.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Book Information | Admin Side | Imperial Hotel - Rajkot</title>


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
                        $query = "select * from `cars_booking` where concat(`id`, `name`, `email`, `mobile`, `cars`) LIKE '%".$searchText."%'";
                        $search_result = filterTable($query);
                    }
                    else
                    {
                        $query = "select * from `cars_booking`";
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
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Driver Name</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                            while($f = mysqli_fetch_array($search_result))
                            {

                        ?>
                            <tr>
                                <td><?php echo $f['id']; ?></td>
                                <td><?php echo $f['name']; ?></td>
                                <td><?php echo $f['email']; ?></td>
                                <td><?php echo $f['mobile']; ?></td>
                                <td><?php echo $f['cars']; ?></td>
                            </tr>
                        
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
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