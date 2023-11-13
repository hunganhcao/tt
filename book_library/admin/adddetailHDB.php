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
                                <h5 class="card-header">Thêm Chi Tiết Hóa Đơn Bán</h5>
                                <div class="card-body">
                                    <?php
                                        require('../db/connect.php');
                                        if(isset($_GET['HDB_ID'])){
                                            $sp_id = $_GET['HDB_ID'];
                                            
                                        }
                                        ?>
                                    <form action="themchitietHDB.php?HDB_ID=<?php echo $sp_id?>" method="post" id="basicform">
                                        <div class="form-group">
                                            <label for="name">ID Chi Tiết Sản Phẩm</label>
                                            <input type="number" name="ctsp" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Số lượng</label>
                                            <input type="number" name="soluong" required="" class="form-control">
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
                                                    <a href="detailHDB.php?HDB_ID=<?=$sp_id?>" class="btn btn-space btn-secondary">Cancel</a>
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

