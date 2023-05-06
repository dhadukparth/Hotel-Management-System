<?php
    session_start();
    include "./include/connection.php";
    $fnm = $_SESSION['pdfname'];
    $lnm = $_SESSION['pdflname'];

    if($fnm == "" or $lnm == "")
    {
        header("location: booking-form.php");
    }
    else
    {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Images/hotel2.webp">
    <title>Download PDF | Imperial Hotel - Rajkot</title>

    <!-- CSS Files Start -->
    <link rel="icon" href="Images/logo.png">
    <link rel="stylesheet" href="SCSS/style.css">
    <!-- CSS Files End -->
</head>

<body style="background-color: white;">
    <main>

        <form method="post">
            <div class="page_title">
                <div class="page_name">
                    <h2>Download PDF</h2>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Room No</th>
                                <th>Room Price</th>
                                <th>Mobile</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                <?php
                    $featchquery = "SELECT * FROM `customer_details` WHERE fname='$fnm' AND lname='$lnm' ";
                    $featchquery__result = mysqli_query($con,$featchquery);
                    while($r = mysqli_fetch_array($featchquery__result))
                    {
                ?>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?php echo $fnm, $lnm; ?></td>
                                <td><?php echo $r['room_no']; ?></td>
                                <td><?php echo $r['price']; ?></td>
                                <td><?php echo $r['mobile']; ?></td>
                                <td><button type="submit" name="pdf">PDF</button></td>
                            </tr>
                        </tbody>
                <?php
                    }
                ?>
                    </table>
                </div>

                <div class="box">
                    <h2>Thansk For Booking
                        <a href="index.php">Click Here</a>
                    </h2>
                </div>
            </div>
        </form>
    </main>


    <!-- Java Script Files Start -->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/all.min.js"></script>
    <script src="JS/sweetalert.min.js"></script>
    <script src="JS/main.js"></script>
    <!-- Java Script Files End -->


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
    }
    ?>


</body>

</html>

<?php
    if(isset($_POST['pdf']))
    {
        session_start();
        $_SESSION['pdfname'] = $fnm;
        $_SESSION['pdflname'] = $lnm;
        header("location: pdf.php");
    }
?>