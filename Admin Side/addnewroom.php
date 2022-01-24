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
    <title>Create New Room | Admin Side | Imperial Hotel - Rajkot</title>


    <!-- CSS Files Links -->
    <link rel="icon" type="image/ico" href="Images/icon.png" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Fonts/Poppins.css">
    <link rel="stylesheet" href="SCSS/style.css">


</head>

<body>

    <main>
        <div class="new-room-body">
            <div class="new-room">
                <div class="title">
                    <h2>Create New Room</h2>
                </div>
                <form method="post" action="Code/addnewroomcodedata.php">
                    <div class="input">
                        <label for="">Room No *</label>
                        <input type="number" name="roomno" required autocomplete="off">
                    </div>
                    <div class="input">
                        <label for="">Room Type *</label>
                        <select name="roomtype" required>
                            <option value="">-- Select Room Type --</option>
                            <option value="Single Ac">Single Ac Room</option>
                            <option value="Single Non Ac">Single Non Ac Room</option>
                            <option value="Double Ac">Double Ac Room</option>
                            <option value="Double Non Ac">Double Non Ac Room</option>
                            <option value="Luxury">Luxury Room</option>
                        </select>
                    </div>
                    <div class="button">
                        <button type="submit" name="create">Create Room</button>
                        <button type="submit" name="delete">Delete Room</button>
                    </div>
                </form>
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