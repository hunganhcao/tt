<?php
    require('../db/connect.php');
    if(isset($_GET['CTSP_ID'])){
        $del_id = $_GET['CTSP_ID'];
    }
    //
    $sp_id = $_GET['SP_ID'];
    // echo $sp_id;
    $sql_str = "DELETE from chitietsp where CTSP_ID = $del_id";
    $res = mysqli_query($conn, $sql_str);
    if($res){
        header("location: detailproduct.php?SP_ID=$sp_id");

    }else{
        echo "Không thể xóa sản phẩm này";
    }
    
    ?>