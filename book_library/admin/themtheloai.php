<?php 
    require('includes/header.php');
?>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Thêm thể loại</h5>
                                    <div class="card-body">
                                        <form action="#" id="basicform" data-parsley-validate="">
                                            <div class="form-group">
                                                <label for="name">Tên thể loại</label>
                                                <input id="name" type="text" name="name" data-parsley-trigger="change" required=""  autocomplete="off" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                    <!-- <label class="be-checkbox custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                                    </label> -->
                                                </div>
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" class="btn btn-space btn-primary">Thêm</button>
                                                        <a href="theloai.php" class="btn btn-space btn-secondary">Hủy</a>
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