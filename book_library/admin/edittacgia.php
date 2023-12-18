<?php
    $id = $_GET['TG_ID'];
    require("../db/connect.php");
    $sql_str = "SELECT * FROM TacGia where TG_ID = $id";
    $result = mysqli_query($conn, $sql_str);
    $kq = mysqli_fetch_assoc($result);
    if(isset($_POST['name'])){
        $id = $_GET['TG_ID'];
        $name = $_POST['name'];
    }
    if(isset($_POST['luu'])){
        $sql = "UPDATE TacGia SET TG_ID = '$id', TenTG = '$name' WHERE TG_ID = $id";
        mysqli_query($conn, $sql);
        header("location: tacgia.php");
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
                                    <h5 class="card-header">Sửa tác giả</h5>
                                    <div class="card-body">
                                        <form action="#" method="post" id="basicform" data-parsley-validate="">
                                            <div class="form-group">
                                                <label for="name">Sửa tác giả</label>
                                                <input id="name" type="text" name="name" data-parsley-trigger="change" required="" value="<?php echo $kq['TenTG']?>" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                </div>
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" class="btn btn-space btn-primary" name="luu">Lưu</button>
                                                        <a href="tacgia.php" class="btn btn-space btn-secondary">Hủy</a>
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