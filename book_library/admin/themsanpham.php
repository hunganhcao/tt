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
                                <h5 class="card-header">Thêm Sản Phẩm</h5>
                                <div class="card-body">
                                    <form action="#" id="basicform" data-parsley-validate="">
                                        <div class="form-group">
                                            <label for="name">Tên sách</label>
                                            <input id="name" type="text" name="name" data-parsley-trigger="change" required=""  autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Hình Ảnh</label>
                                            <input id="image" type="text" name="image" data-parsley-trigger="change" required="" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-12 col-sm-1 col-form-label text-sm-right">Mô Tả</label>
                                            <div class="col-12 col-sm-6 col-lg-12">
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="nxb">Nhà Xuất Bản</label>
                                            <select class="form-control">
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
                                            <select class="form-control">
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
                                            <select class="form-control">
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
                                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
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
        <?php require('includes/footer.php'); ?>

