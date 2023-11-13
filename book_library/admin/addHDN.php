<?php 
    require('../db/connect.php');
    if(isset($_POST['ngaynhap'])){
        $ngaynhap = $_POST['ngaynhap'];
        $ghichu = $_POST['ghichu'];
        $tongtien = $_POST['tongtien'];
        $nv = $_POST['nv'];
    }
    if(empty($_POST['nv'])){ 
            header("location: themHDB.php");
    }else{
        $sql_str = "INSERT into `hoadonnhap` (`NgayNhap`,`GhiChu`,`TongTien`,`NV_ID`)
        values ('$ngaynhap', '$ghichu','$tongtien',$nv);";
        $query = mysqli_query($conn, $sql_str);
    
        if($query){
            header("location: listHDN.php");
        }else{
            echo "Lỗi";
        }
    }
    ?>  