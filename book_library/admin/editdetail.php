<?php 
    
    $ctsp_id = $_GET['CTSP_ID'];
    $sp_id = $_GET['SP_ID'];
    //
    require('../db/connect.php');
    $sql_str = "Select * from chitietsp where CTSP_ID = $ctsp_id and SP_ID= $sp_id";
    $res = mysqli_query($conn, $sql_str);
    // $res1 = mysqli_query($conn, $sql_str2);
    $chitiet = mysqli_fetch_assoc($res);
    // $info = mysqli_fetch_assoc($res1);
    if(isset($_POST['tapso'])){
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
            if(empty($fileName)){
                $fileName = $chitiet['HinhAnh'];
            }else{
                move_uploaded_file($file['tmp_name'], './upload/'. $fileName);
            }
        }
    }

        if(isset($_POST['btnUpdate'])){
            $sql_str1 = "update chitietsp 
            set TapSo='$tapso', SoLuong='$soluong', SoTrang='$sotrang', HinhAnh='$fileName',
            NamXB='$namxb', SP_ID='$sp_id', GiaNhap='$gianhap', GiaBan='$giaban' where CTSP_ID = $ctsp_id";
            mysqli_query($conn, $sql_str1);
            // echo $sql_str1;
            header("location: detailproduct.php?SP_ID=$sp_id");

        }
        else{
        require('includes/header.php');

?>
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <!-- <h2 class="pageheader-title">Danh Sách Sản Phẩm </h2> -->
                                <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Cập Nhật Chi Tiết Sản Phẩm</h5>
                                <div class="card-body">
                                    <form action="" method="post" id="basicform" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Tập số</label>
                                            <input type="number" name="tapso" value="<?php echo $chitiet['TapSo']?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Số lượng</label>
                                            <input type="number" name="soluong" value="<?php echo $chitiet['SoLuong']?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Số trang</label>
                                            <input type="number" name="sotrang" value="<?php echo $chitiet['SoTrang']?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Hình Ảnh</label>
                                            <input id="image" type="file" name="image" value="<?php echo $chitiet['HinhAnh']?>" autocomplete="off" class="form-control">
                                            <img src="upload/<?php echo $chitiet['HinhAnh']?>" alt="" style="width:100px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Năm xuất bản</label>
                                            <input type="text" name="namxb" value="<?php echo $chitiet['NamXB']?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Giá nhập</label>
                                            <input type="number" name="gianhap" value="<?php echo $chitiet['GiaNhap']?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Giá bán</label>
                                            <input type="number" name="giaban" value="<?php echo $chitiet['GiaBan']?>" required="" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <!-- <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                </label> -->
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary" name="btnUpdate">Update</button>
                                                    <a href="detailproduct.php?SP_ID=<?=$sp_id?>" class="btn btn-space btn-secondary">Cancel</a>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<?php require('includes/footer.php'); }?>

