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
                            <h5 class="card-header">Danh Sách Hóa Đơn Bán</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>HDB_ID</th>
                                                <th>NgayBan</th>
                                                <th>TenKH</th>
                                                <th>TenNV</th>
                                                <th>PhuongThuc</th>
                                                <th>TongTien</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                    <tbody>
<?php
    require('../db/connect.php');
    $sql_str = "Select HDB_ID,NgayBan,TongTien,khachhang.TenKH,nhanvien.TenNV,thanhtoan.PhuongThuc from hoadonban 
    join khachhang on khachhang.KH_ID = hoadonban.KH_ID
    join nhanvien on nhanvien.NV_ID = hoadonban.NV_ID
    join thanhtoan on thanhtoan.TT_ID = hoadonban.KH_ID
    order by HDB_ID";
    $result = mysqli_query($conn, $sql_str);
    while($row = mysqli_fetch_assoc($result)){
        ?>
                                        
                                            <tr>
                                                <td><?=$row['HDB_ID']?></td>
                                                <td><?=$row['NgayBan']?></td>
                                                <td><?=$row['TenKH']?></td>
                                                <td><?=$row['TenNV']?></td>
                                                <td><?=$row['PhuongThuc']?></td>
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

