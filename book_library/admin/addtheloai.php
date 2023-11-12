<?php
    require('../db/connect.php');
    $name = $_POST['name'];
    $sql_str = "INSERT INTO TheLoai (TL_ID, TenTL) VALUE (NULL, '$name')";
    mysqli_query($conn, $sql_str);
    header("location: index.php");
?>