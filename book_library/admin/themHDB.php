
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
                                <h3 class="card-header">Thêm Hóa Đơn Bán</h3>
                                <div class="card-body">
                                    <form action="addHDB.php" method="post" id="basicform" enctype="multipart/form-data">
                                       
                                        <div class="form-group">
                                            <label for="nxb">Khách Hàng</label>
                                            <select class="form-control" name="kh" required>
                                                <option disabled selected></option>
                                            <?php
                                                require('../db/connect.php');
                                                $sql_str = "Select * from khachhang order by TenKH";
                                                $result = mysqli_query($conn, $sql_str);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                        <option value="<?php echo $row['KH_ID'] ?>"><?php echo $row['TenKH'] ?></option>
                                            <?php
                                                    // echo $row["SP_ID"];
                                                }
                                            ?>
                                            </select>
                                           
                                        </div>
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
                                           
                                        </div>
                                        <div class="form-group">
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Ghi Chú</label>
                                            <div class="col-12 col-sm-6 col-lg-12">
                                                <textarea name="ghichu" class="form-control"></textarea>
                                            </div>
                                        </div><br>
                                       
                                        <h3>Thêm Chi Tiết Hóa Đơn Bán</h3>

    <div id="invoice_details">
    <div class="form-group">
                                            <label for="name">ID Chi Tiết Sản Phẩm</label>
                                            <input type="number" name="ctsp[]" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Số lượng</label>
                                            <input type="number" name="soluong[]" required="" class="form-control">
                                        </div>
    </div>

    <button type="button" onclick="addDetail()">Add Detail</button>
    <br>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                <!-- <label class="be-checkbox custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                </label> -->
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
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
            <script>
    function addDetail() {
        var container = document.getElementById("invoice_details");
        var newDetail = document.createElement("div");
        newDetail.className = "detail";

        newDetail.innerHTML = `
        <div class="form-group">
                                            <label for="name">ID Chi Tiết Sản Phẩm</label>
                                            <input type="number" name="ctsp[]" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Số lượng</label>
                                            <input type="number" name="soluong[]" required="" class="form-control">
                                        </div>
        `;

        container.appendChild(newDetail);
    }
</script>
        <?php require('includes/footer.php'); ?>

