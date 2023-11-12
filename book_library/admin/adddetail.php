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
                                <h5 class="card-header">Thêm Chi Tiết</h5>
                                <div class="card-body">
                                    <form action="themchitiet.php" method="post" id="basicform" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Tập số</label>
                                            <input type="number" name="tapso" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Số lượng</label>
                                            <input type="number" name="soluong" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Số trang</label>
                                            <input type="number" name="sotrang" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Hình Ảnh</label>
                                            <input id="image" type="file" name="image" data-parsley-trigger="change" required="" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Năm xuất bản</label>
                                            <input type="text" name="namxb" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Giá nhập</label>
                                            <input type="number" name="gianhap" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Giá bán</label>
                                            <input type="number" name="giaban" required="" class="form-control">
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
                                                    <a href="detailproduct.php" class="btn btn-space btn-secondary">Cancel</a>
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

