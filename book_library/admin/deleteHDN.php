<?php
    require('../db/connect.php');
    if(isset($_GET['HDN_ID'])){
        $del_id = $_GET['HDN_ID'];
    }
    //
    $sql_str = "DELETE from hoadonnhap where HDN_ID = $del_id";
    $res = mysqli_query($conn, $sql_str);
    if($res){
        header("location: listHDN.php");

    }else{
        echo "Không thể xóa sản phẩm này";
    }
    
    ?>