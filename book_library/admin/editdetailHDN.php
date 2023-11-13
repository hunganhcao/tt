<?php 
    
    $ctsp_id = $_GET['CTSP_ID'];
    $sp_id = $_GET['HDN_ID'];
    //
    require('../db/connect.php');
    $sql_str = "Select * from chitiethdn where HDN_ID = $sp_id and CTSP_ID='$ctsp_id'";
    $res = mysqli_query($conn, $sql_str);
    // $res1 = mysqli_query($conn, $sql_str2);
    $chitiet = mysqli_fetch_assoc($res);
    // $info = mysqli_fetch_assoc($res1);
    if(isset($_GET['CTSP_ID'])){
        $sp_id = $_GET['HDN_ID'];
        $ctsp = $_GET['CTSP_ID'];
        $soluong = $_POST['soluong'];

    }

        if(isset($_POST['btnUpdate'])){
            $sql_str1 = "update chitiethdn 
            set HDN_ID='$sp_id', SoLuong='$soluong', CTSP_ID='$ctsp' where HDN_ID = $sp_id and CTSP_ID='$ctsp'";
            mysqli_query($conn, $sql_str1);
            // echo $sql_str1;
            header("location: detailHDN.php?HDN_ID=$sp_id");

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
                                <h5 class="card-header">Cập nhật Chi Tiết Hóa Đơn Bán</h5>
                                <div class="card-body">
                                    <?php
                                        require('../db/connect.php');
                                        if(isset($_GET['HDN_ID'])){
                                            $sp_id = $_GET['HDN_ID'];
                                            
                                        }
                                        ?>
                                    <form action="#" method="post" id="basicform">
                                        <div class="form-group">
                                            <label for="name">Số lượng</label>
                                            <input type="number" name="soluong" value="<?php echo $chitiet['SoLuong']?>" required="" class="form-control">
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
                                                    <a href="detailHDN.php?HDN_ID=<?=$sp_id?>" class="btn btn-space btn-secondary">Cancel</a>
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

