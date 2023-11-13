<?php
    require('../db/connect.php');
    $name = $_POST['name'];
    $sql_str = "INSERT INTO TheLoai (NXB_ID, TenNXB) VALUE (NULL, '$name')";
    mysqli_query($conn, $sql_str);
    header("location: themnxb.php");
?>