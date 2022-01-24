<?php

    if(!isset($_SESSION['username']))
    {
        header("location: 404.php");
    }

?>