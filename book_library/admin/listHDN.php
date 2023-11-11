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
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Danh Sách Hóa Đơn Nhập</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>HDN_ID</th>
                                                <th>NgayNhap</th>
                                                <!-- <th>GhiChu</th> -->
                                                <th>TenNV</th>
                                                <th>TongTien</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                    <tbody>
<?php
    require('../db/connect.php');
    $sql_str = "Select HDN_ID,NgayNhap,TongTien,nhanvien.TenNV from hoadonnhap 
    join nhanvien on hoadonnhap.NV_ID = nhanvien.NV_ID
    order by HDN_ID";
    $result = mysqli_query($conn, $sql_str);
    while($row = mysqli_fetch_assoc($result)){
        ?>
                                        
                                            <tr>
                                                <td><?=$row['HDN_ID']?></td>
                                                <td><?=$row['NgayNhap']?></td>
                                                <td><?=$row['TenNV']?></td>
                                                <td><?=$row['TongTien']?></td>
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

