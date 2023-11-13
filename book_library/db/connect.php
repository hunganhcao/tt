<?php
    global $conn;
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn,"bansach");
?>