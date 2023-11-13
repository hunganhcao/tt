<?php
    require('../db/connect.php');
    if(isset($_GET['TL_ID'])){
        $id = $_GET['TL_ID'];
    }
    //
    $sql_str = "DELETE FROM TheLoai WHERE TL_ID = $id";
    $res = mysqli_query($conn, $sql_str);
    if($res){
        header("location: theloai.php");

    }else{
        echo "Không thể xóa thể loại này";
    }
?>