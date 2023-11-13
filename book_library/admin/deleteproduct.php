<?php
    require('../db/connect.php');
    if(isset($_GET['SP_ID'])){
        $del_id = $_GET['SP_ID'];
    }
    //
    $sql_str = "DELETE from sanpham where SP_ID = $del_id";
    $res = mysqli_query($conn, $sql_str);
    if($res){
        header("location: listbooks.php");

    }else{
        echo "Không thể xóa sản phẩm này";
    }
    
    ?>