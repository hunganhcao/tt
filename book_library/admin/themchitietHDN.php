<?php 
require('../db/connect.php');
if(isset($_POST['ctsp'])){
    $sp_id = $_GET['HDN_ID'];
    // $ctsp_id = $_GET['CTSP_ID'];
    $ctsp = $_POST['ctsp'];
    $soluong = $_POST['soluong'];

    $sql_str = "Select CTSP_ID from chitiethdn Where HDN_ID = $sp_id";
    // echo $sql_str;
    $check = mysqli_query($conn, $sql_str);
        while($row = mysqli_fetch_assoc($check)){
        if($ctsp == $row['CTSP_ID']){
            // header("location: adddetailHDB.php?HDN_ID=$sp_id");
            echo '<script>alert("Dữ liệu không hợp lệ");</script>';
            echo '<script>window.location.href = document.referrer;</script>';

        }else{
            $ctsp = $_POST['ctsp'];
        }           

    }
    $sql_str1 = "INSERT into `chitiethdn` (`HDN_ID`,`CTSP_ID`,`SoLuong`)
           values ('$sp_id','$ctsp','$soluong')";
           $query = mysqli_query($conn, $sql_str1);
       
       if($query){
           header("location: detailHDN.php?HDN_ID=$sp_id");
       }else{
           echo "Lỗi";
           }
}

?>