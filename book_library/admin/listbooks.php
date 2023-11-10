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
                                <div class="aside-compose" style="width: 30%;"><a class="btn btn-lg btn-secondary btn-block" href="./themsanpham.php">Thêm Sản Phẩm</a></div>
                               
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Danh Sách Sản Phẩm</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>SP_ID</th>
                                                <th>TenSach</th>
                                                <th>HinhAnh</th>
                                                <th>TenNXB</th>
                                                <th>TenTG</th>
                                                <th>TenTL</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                    <tbody>
<?php
    require('../db/connect.php');
    $sql_str = "Select SP_ID,TenSach,HinhAnh,nhaxuatban.TenNXB,tacgia.TenTG,theloai.TenTL from sanpham
    join nhaxuatban on nhaxuatban.NXB_ID = sanpham.NXB_ID
    join tacgia on tacgia.TG_ID = sanpham.TG_ID
    join theloai on theloai.TL_ID = sanpham.TL_ID
    order by SP_ID";
    $result = mysqli_query($conn, $sql_str);
    while($row = mysqli_fetch_assoc($result)){
        ?>
                                        
                                            <tr>
                                                <td><?=$row['SP_ID']?></td>
                                                <td><?=$row['TenSach']?></td>
                                                <td><?=$row['HinhAnh']?></td>
                                                <td><?=$row['TenNXB']?></td>
                                                <td><?=$row['TenTG']?></td>
                                                <td><?=$row['TenTL']?></td>
                                                <td>EDIT | DELETE</td>
                                                
                                            </tr>
<?php
        // echo $row["SP_ID"];
    }
?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            <?php require('includes/footer.php'); ?>

