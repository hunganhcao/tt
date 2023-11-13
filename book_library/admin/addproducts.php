<?php 
    require('../db/connect.php');
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $mota = $_POST['mota'];
        $nxb = $_POST['nxb'];
        $tacgia = $_POST['tacgia'];
        $theloai = $_POST['theloai'];
        if(isset($_FILES['image'])){
            $file = $_FILES['image'];
            $fileName = $file['name'];
            move_uploaded_file($file['tmp_name'], './upload/'. $fileName);
        }
    }
    if(empty($_POST['nxb']) || empty($_POST['tacgia']) || empty($_POST['theloai'])){ 
        echo '<script>alert("Bạn chưa nhập đủ thông tin");</script>';
        echo '<script>window.location.href = document.referrer;</script>';
    }else{
        $sql_str = "INSERT into `sanpham` (`TenSach`,`HinhAnh`,`MoTa`, `NXB_ID`,`TG_ID`,`TL_ID`)
        values ('$name', '$fileName','$mota',$nxb,$tacgia,$theloai);";
        $query = mysqli_query($conn, $sql_str);
    
        if($query){
            header("location: listbooks.php");
        }else{
            echo "Lỗi";
        }
    }
    ?>  