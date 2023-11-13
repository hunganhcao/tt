<?php 
    require('../db/connect.php');
    if(isset($_POST['ngayban'])){
        $ngayban = $_POST['ngayban'];
        $ghichu = $_POST['ghichu'];
        $tongtien = $_POST['tongtien'];
        $kh = $_POST['kh'];
        $nv = $_POST['nv'];
        $tt = $_POST['tt'];
    }
    if(empty($_POST['kh']) || empty($_POST['nv']) || empty($_POST['tt'])){ 
            header("location: themHDB.php");
    }else{
        $sql_str = "INSERT into `hoadonban` (`NgayBan`,`GhiChu`,`TongTien`, `KH_ID`,`NV_ID`,`TT_ID`)
        values ('$ngayban', '$ghichu','$tongtien',$kh,$nv,$tt);";
        $query = mysqli_query($conn, $sql_str);
    
        if($query){
            header("location: listHDB.php");
        }else{
            echo "Lỗi";
        }
    }
    ?>  