<?php 
require('../db/connect.php');
if(isset($_GET['SP_ID'])){
    $sp_id = $_GET['SP_ID'];
    $tapso = $_POST['tapso'];
    $soluong = $_POST['soluong'];
    $sotrang = $_POST['sotrang'];
    $namxb = $_POST['namxb'];
    $gianhap = $_POST['gianhap'];
    $giaban = $_POST['giaban'];
    if(isset($_FILES['image'])){
        $file = $_FILES['image'];
        $fileName = $file['name'];
        move_uploaded_file($file['tmp_name'], './upload/'. $fileName);
    }
    $sql_str = "INSERT into `chitietsp` (`CTSP_ID`,`TapSo`,`SoLuong`,`SoTrang`, `HinhAnh`,`NamXB`,`SP_ID`,`GiaNhap`,`GiaBan`)
    values (null, '$tapso','$soluong','$sotrang', '$fileName','$namxb','$sp_id','$gianhap','$giaban')";
    $query = mysqli_query($conn, $sql_str);
    
    if($query){
        header("location: detailproduct.php?SP_ID=$sp_id");
    }else{
        echo "Lỗi";
    }
}else{
    echo "Lỗi dưới";
}

?>