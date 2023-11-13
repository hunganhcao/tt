<?php 
    
    $sp_id = $_GET['SP_ID'];
    //
    require('../db/connect.php');
    $sql_str = "Select * from sanpham where SP_ID = $sp_id";
    $sql_str2 = "Select SP_ID,TenSach,HinhAnh,nhaxuatban.TenNXB,tacgia.TenTG,theloai.TenTL from sanpham
    join nhaxuatban on nhaxuatban.NXB_ID = sanpham.NXB_ID
    join tacgia on tacgia.TG_ID = sanpham.TG_ID
    join theloai on theloai.TL_ID = sanpham.TL_ID
    where SP_ID = $sp_id";
    // echo $sql_str;
    $res = mysqli_query($conn, $sql_str);
    $res1 = mysqli_query($conn, $sql_str2);
    $tensach = mysqli_fetch_assoc($res);
    $info = mysqli_fetch_assoc($res1);
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $mota = $_POST['mota'];
        $nxb = $_POST['nxb'];
        $tacgia = $_POST['tacgia'];
        $theloai = $_POST['theloai'];

        if(isset($_FILES['image'])){
            $file = $_FILES['image'];
            $fileName = $file['name'];
            if(empty($fileName)){
                $fileName = $tensach['HinhAnh'];
            }else{
                move_uploaded_file($file['tmp_name'], './upload/'. $fileName);
            }
        }
    }

        if(isset($_POST['btnUpdate'])){
            $sql_str1 = "update sanpham 
            set TenSach='$name', HinhAnh='$fileName', MoTa='$mota', NXB_ID=$nxb,
            TG_ID=$tacgia, TL_ID=$theloai where SP_ID = $sp_id";
            mysqli_query($conn, $sql_str1);
            // echo $sql_str1;
            header("location: listbooks.php");

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
                                <h5 class="card-header">Cập Nhật Sản Phẩm</h5>
                                <div class="card-body">
                                    <form action="#" id="basicform" data-parsley-validate="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Tên sách</label>
                                            <input id="name" type="text" name="name" value="<?php echo $tensach['TenSach']?>"  required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Hình Ảnh</label>
                                            <input id="image" type="file" name="image" value="<?php echo $tensach['HinhAnh']?>"   class="form-control">
                                            <img src="upload/<?php echo $tensach['HinhAnh']?>" alt="" style="width:100px;">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Mô Tả</label>
                                            <div class="col-12 col-sm-6 col-lg-12">
                                                <textarea id="mota" name="mota" value="<?php echo $tensach['MoTa']?>" class="form-control"><?php echo $tensach['MoTa']?></textarea>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="nxb">Nhà Xuất Bản</label>
                                            <select class="form-control" name="nxb">
                                                <option value="<?php echo $tensach['NXB_ID']?>"><?php echo $info['TenNXB']?></option>
                                                <?php
                                                require('../db/connect.php');
                                                $sql_str = "Select * from nhaxuatban order by TenNXB";
                                                $result = mysqli_query($conn, $sql_str);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                        
                                                        <option value="<?php echo $row['NXB_ID'] ?>"><?php echo $row['TenNXB'] ?></option>                                        
                                            <?php
                                                    // echo $row["SP_ID"];
                                                }
                                            ?>
                                            </select>
                                            <!-- <input id="nxb"  type="Text" required="" placeholder="" class="form-control"> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="tacgia">Tác Giả</label>
                                            <select class="form-control" name="tacgia">
                                                <option value="<?php echo $tensach['TG_ID']?>"><?php echo $info['TenTG']?></option>
                                                <?php
                                                require('../db/connect.php');
                                                $sql_str = "Select * from tacgia order by TenTG";
                                                $result = mysqli_query($conn, $sql_str);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                        <option value="<?php echo $row['TG_ID'] ?>"><?php echo $row['TenTG'] ?></option>                                        
                                            <?php
                                                    // echo $row["SP_ID"];
                                                }
                                            ?>
                                            </select>
                                            <!-- <input id="tacgia"  type="Text" required="" placeholder="" class="form-control"> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="theloai">Thể Loại</label>
                                            <select class="form-control" name="theloai">
                                                <option value="<?php echo $tensach['TL_ID']?>"><?php echo $info['TenTL']?></option>
                                                <?php
                                                require('../db/connect.php');
                                                $sql_str = "Select * from theloai order by TenTL";
                                                $result = mysqli_query($conn, $sql_str);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                        <option value="<?php echo $row['TL_ID'] ?>"><?php echo $row['TenTL'] ?></option>                                        
                                            <?php
                                                    // echo $row["SP_ID"];
                                                }
                                            ?>
                                            </select>
                                            <!-- <input id="theloai"  type="text" required="" placeholder="" class="form-control"> -->
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
                                                    <a href="listbooks.php" class="btn btn-space btn-secondary">Cancel</a>
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

