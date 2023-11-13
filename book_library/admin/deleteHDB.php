<?php
    require('../db/connect.php');
    if(isset($_GET['HDB_ID'])){
        $del_id = $_GET['HDB_ID'];
    }
    //
    $sql_str = "DELETE from hoadonban where HDB_ID = $del_id";
    $res = mysqli_query($conn, $sql_str);
    if($res){
        header("location: listHDB.php");

    }else{
        echo "Không thể xóa sản phẩm này";
    }
    
    ?>