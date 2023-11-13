<?php 
    $hdb_id = $_GET['HDB_ID'];
    require('../db/connect.php');
    $sql_str = "Select * from hoadonban where HDB_ID = $hdb_id";
    $sql_str2 = "Select HDB_ID,NgayBan,TongTien,khachhang.TenKH,nhanvien.TenNV,thanhtoan.PhuongThuc from hoadonban 
    join khachhang on khachhang.KH_ID = hoadonban.KH_ID
    join nhanvien on nhanvien.NV_ID = hoadonban.NV_ID
    join thanhtoan on thanhtoan.TT_ID = hoadonban.TT_ID where HDB_ID = $hdb_id order by HDB_ID";
    // echo $sql_str;
    $res = mysqli_query($conn, $sql_str);
    $res1 = mysqli_query($conn, $sql_str2);
    $hoadonban = mysqli_fetch_assoc($res);
    $info = mysqli_fetch_assoc($res1);
    if(isset($_POST['ngayban'])){
        $ngayban = $_POST['ngayban'];
        $ghichu = $_POST['ghichu'];
        $tongtien = $_POST['tongtien'];
        $kh = $_POST['kh'];
        $nv = $_POST['nv'];
        $tt = $_POST['tt'];
    }

        if(isset($_POST['btnUpdate'])){
            $sql_str1 = "update hoadonban 
            set NgayBan='$ngayban', GhiChu='$ghichu', TongTien='$tongtien', KH_ID=$kh,
            NV_ID=$nv, TT_ID=$tt where HDB_ID = $hdb_id";
            mysqli_query($conn, $sql_str1);
            // echo $sql_str1;
            header("location: listHDB.php");

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
                                <h5 class="card-header">Thêm Hóa Đơn Bán</h5>
                                <div class="card-body">
                                    <form action="#" method="post" id="basicform">
                                        <div class="form-group">
                                            <label for="name">Ngày Bán</label>
                                            <input type="datetime-local" name="ngayban" value="<?php echo $hoadonban['NgayBan']?>" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Ghi Chú</label>
                                            <div class="col-12 col-sm-6 col-lg-12">
                                                <textarea name="ghichu" value="<?php echo $hoadonban['GhiChu']?>" class="form-control"></textarea>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="name">Tổng Tiền</label>
                                            <input type="number" value="<?php echo $hoadonban['TongTien']?>" name="tongtien" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="nxb">Khách Hàng</label>
                                            <select class="form-control" name="kh">
                                                <option value="<?php echo $hoadonban['KH_ID']?>"><?php echo $info['TenKH']?></option>
                                            <?php
                                                require('../db/connect.php');
                                                $sql_str = "Select * from khachhang order by TenKH";
                                                $result = mysqli_query($conn, $sql_str);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                        <option value="<?php echo $row['KH_ID'] ?>"><?php echo $row['TenKH'] ?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tacgia">Nhân Viên</label>
                                            <select class="form-control" name="nv">
                                            <option  value="<?php echo $hoadonban['NV_ID']?>"><?php echo $info['TenNV']?></option>
                                            <?php
                                                require('../db/connect.php');
                                                $sql_str = "Select * from nhanvien order by TenNV";
                                                $result = mysqli_query($conn, $sql_str);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                        <option value="<?php echo $row['NV_ID'] ?>"><?php echo $row['TenNV'] ?></option> 
                                                                                             
                                            <?php
                                                    // echo $row["SP_ID"];
                                                }
                                            ?>
                                            </select>
                                            <!-- <input id="tacgia"  type="Text"="" placeholder="" class="form-control"> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="theloai">Thanh Toán</label>
                                            <select class="form-control" name="tt">
                                            <option value="<?php echo $hoadonban['TT_ID']?>"><?php echo $info['PhuongThuc']?></option>
                                            <?php
                                                require('../db/connect.php');
                                                $sql_str = "Select * from thanhtoan order by PhuongThuc";
                                                $result = mysqli_query($conn, $sql_str);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                        <option value="<?php echo $row['TT_ID'] ?>"><?php echo $row['PhuongThuc'] ?></option> 
                                                                                             
                                            <?php
                                                    // echo $row["SP_ID"];
                                                }
                                            ?>
                                            </select>
                                            <!-- <input id="theloai"  type="text"="" placeholder="" class="form-control"> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <!-- <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                </label> -->
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary" name="btnUpdate">Submit</button>
                                                    <a href="listHDB.php" class="btn btn-space btn-secondary">Cancel</a>
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

