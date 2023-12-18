<?php 
    require('../db/connect.php');
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $mota = $_POST['mota'];
        $sl = $_POST['amount'];
        if(isset($_FILES['image'])){
            $file = $_FILES['image'];
            $fileName = $file['name'];
            move_uploaded_file($file['tmp_name'], './upload/'. $fileName);
        }
    }
    if(empty($_POST['name']) || empty($_POST['amount']) || empty($_POST['mota'])){ 
        echo '<script>alert("Bạn chưa nhập đủ thông tin");</script>';
        echo '<script>window.location.href = document.referrer;</script>';
    }else{
        $sql_str = "INSERT into `Cay` (`TenCay`,`HinhAnh`,`MoTa`,`SoLuong`)
        values ('$name', '$fileName','$mota',$sl);";
        $query = mysqli_query($conn, $sql_str);
    
        if($query){
            header("location: listtrees.php");
        }else{
            echo "Lỗi";
        }
    }
    ?>  