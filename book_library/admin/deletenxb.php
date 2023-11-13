<?php
    require('../db/connect.php');
    if(isset($_GET['NXB_ID'])){
        $id = $_GET['NXB_ID'];
    }
    //
    $sql_str = "DELETE FROM NhaXuatBan WHERE NXB_ID = $id";
    $res = mysqli_query($conn, $sql_str);
    if($res){
        header("location: nhaxuatban.php");

    }else{
        echo "Không thể xóa thể loại này";
    }
?>