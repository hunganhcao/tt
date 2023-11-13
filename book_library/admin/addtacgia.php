<?php
    require('../db/connect.php');
    $name = $_POST['name'];
    $sql_str = "INSERT INTO TacGia (TG_ID, TenTG) VALUE (NULL, '$name')";
    mysqli_query($conn, $sql_str);
    header("location: themtacgia.php");
?>