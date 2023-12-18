<?php
    $id = $_GET['NXB_ID'];
    require("../db/connect.php");
    $sql_str = "SELECT * FROM NhaXuatBan where NXB_ID = $id";
    $result = mysqli_query($conn, $sql_str);
    $kq = mysqli_fetch_assoc($result);
    if(isset($_POST['name'])){
        $id = $_GET['NXB_ID'];
        $name = $_POST['name'];
    }
    if(isset($_POST['luu'])){
        $sql = "UPDATE NhaXuatBan SET NXB_ID = '$id', TenNXB = '$name' WHERE NXB_ID = $id";
        mysqli_query($conn, $sql);
        header("location: nhaxuatban.php");
    } else {
    require("includes/header.php");
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
                                    <h5 class="card-header">Sửa nhà xuất bản</h5>
                                    <div class="card-body">
                                        <form action="#" method="post" id="basicform" data-parsley-validate="">
                                            <div class="form-group">
                                                <label for="name">Sửa nhà xuất bản</label>
                                                <input id="name" type="text" name="name" data-parsley-trigger="change" required="" value="<?php echo $kq['TenNXB']?>" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                </div>
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" class="btn btn-space btn-primary" name="luu">Lưu</button>
                                                        <a href="nhaxuatban.php" class="btn btn-space btn-secondary">Hủy</a>
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
</div>
<?php
    require("includes/footer.php");
    }
?>