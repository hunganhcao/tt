<?php 
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
                                <h5 class="card-header">Thêm Hóa Đơn Nhập</h5>
                                <div class="card-body">
                                    <form action="addHDN.php" method="post" id="basicform" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Ngày Nhập</label>
                                            <input type="datetime-local" name="ngaynhap" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tổng Tiền</label>
                                            <input type="number" name="tongtien" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Ghi chú</label>
                                            <div class="col-12 col-sm-6 col-lg-12">
                                                <textarea name="ghichu" class="form-control"></textarea>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="tacgia">Nhân Viên</label>
                                            <select class="form-control" name="nv" required>
                                            <option disabled selected></option>
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
                                            <!-- <input id="tacgia"  type="Text" required="" placeholder="" class="form-control"> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <!-- <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                </label> -->
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                    <a href="listHDN.php" class="btn btn-space btn-secondary">Cancel</a>
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
        <?php require('includes/footer.php'); ?>

