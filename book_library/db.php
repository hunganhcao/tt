<?php

$connection = mysqli_connect('localhost', 'root', '', 'bansach');
mysqli_query($connection, "SET NAMES 'utf8'");

if (!$connection) {
    exit('Kết nối không thành công!');
}
?>