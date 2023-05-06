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
        <div class="new-room-body newuser">
            <div class="new-room">
                <div class="title">
                    <h2>Create New User</h2>
                </div>
                <form method="post" action="Code/usernewcodedata.php" enctype="multipart/form-data">
                    <div class="image">
                        <img src="Userimages/default.png" id="profileDisplay" onclick="chooseimage()" alt="Choose Your Image" title="Choose Your Image">
                        <label for="Choose Images">Choose Your Image</label>
                        <input type="file" name="profileImage" onchange="displayImage(this)" required id="profileImage" style="display: none;">
                    </div>
                    <div class="input">
                        <label for="us">Enter New Username *</label>
                        <input type="text" id="us" name="us" title="Enter Username" required autocomplete="off">
                    </div>
                    <div class="input">
                        <label for="role">User Role *</label>
                        <select name="role" id="role" title="Choose User Role" required>
                            <option value="">-- Select User Role --</option>
                            <option value="1">Main - Manager</option>
                            <option value="2">Manager</option>
                            <option value="3">Staff</option>
                        </select>
                    </div>
                    <div class="input">
                        <label for="em">Enter New Email ID *</label>
                        <input type="email" id="em" name="em" title="Enter User Email ID" required autocomplete="off">
                    </div>
                    <div class="input">
                        <label for="pass">Enter New Password *</label>
                        <input type="password" id="pass" name="pass" title="Enter Password" required autocomplete="off">
                    </div>
                    <div class="input">
                        <label for="cpass">Enter New Re - Password *</label>
                        <input type="password" id="cpass" name="cpass" title="Enter Re- Password" required autocomplete="off">
                    </div>
                    <div class="button">
                        <button type="submit" name="create" title="Submit Form">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Java Scripts Files -->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/sweetalert.min.js"></script>
    <script src="JS/main.js"></script>
    <script>
        function chooseimage(){
            document.querySelector('#profileImage').click();
        }

        function displayImage(e){
            if(e.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>

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