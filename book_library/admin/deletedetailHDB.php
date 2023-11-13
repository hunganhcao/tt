<?php
    require('../db/connect.php');
    if(isset($_GET['CTSP_ID'])){
        $del_id = $_GET['CTSP_ID'];
    }
    //
    $sp_id = $_GET['HDB_ID'];
    echo $sp_id;
    $sql_str = "DELETE from chitiethdb where CTSP_ID = $del_id";
    $res = mysqli_query($conn, $sql_str);
    if($res){
        header("location: detailHDB.php?HDB_ID=$sp_id");

    }else{
        echo "Không thể xóa sản phẩm này";
    }
    
    ?>