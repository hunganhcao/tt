<?php
    require('../db/connect.php');
    if(isset($_GET['TG_ID'])){
        $id = $_GET['TG_ID'];
    }
    //
    $sql_str = "DELETE FROM TacGia WHERE TG_ID = $id";
    $res = mysqli_query($conn, $sql_str);
    if($res){
        header("location: theloai.php");

    }else{
        echo "Không thể xóa tác giả này";
    }
?>