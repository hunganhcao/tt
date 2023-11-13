<?php 
require('../db/connect.php');
if(isset($_POST['ctsp'])){
    $sp_id = $_GET['HDB_ID'];
    $ctsp = $_POST['ctsp'];
    $soluong = $_POST['soluong'];

    $sql_str = "INSERT into `chitiethdb` (`HDB_ID`,`CTSP_ID`,`SoLuong`)
    values ('$sp_id','$ctsp','$soluong')";
    $query = mysqli_query($conn, $sql_str);
    
    if($query){
        header("location: detailHDB.php?HDB_ID=$sp_id");
    }else{
        echo "Lỗi";
    }
}else{
    echo "Lỗi dưới";
}

?>