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
                                <div class="aside-compose" style="width: 30%; padding-left: 0;" >
                                <a class="btn btn-lg btn-secondary btn-block" href="./themHDB.php">Thêm Hóa Đơn Bán</a></div>
                               
                               
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Danh Sách Hóa Đơn Bán</h5>
                            <?php 
                                require('../db/connect.php');
                                $search = isset($_GET['search']) ? $_GET['search'] : "";
                                if($search){
                                    $where = "Where `TenKH` LIKE '%". $search . "%'";
                                }
                                
                            ?>
                            
                            <form method="GET" id="custom-search" class="top-search-bar" style="padding-left: 20px;">
                                <input class="form-control"  value="<?=$search?>" type="text" placeholder="Search.." name="search" 
                                style="width:50%; display: inline-block;">
                                <button class="btn btn-space btn-info" type="submit">Tìm Kiếm</button>  
                            </form>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>HDB_ID</th>
                                                <th>NgayBan</th>
                                                <th>TenKH</th>
                                                <th>TenNV</th>
                                               
                                                <th>TongTien</th>
                                                <th>Chi Tiết</th>
                                              
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                            require('../db/connect.php');
                                                $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
                                                $current_page = !empty($_GET['page'])?$_GET['page']:1; 
                                                $offset = ($current_page - 1) * $item_per_page;
                                                if($search){
                                                    $sql_str = "Select HDB_ID,NgayBan,TongTien,khachhang.TenKH,nhanvien.TenNV,thanhtoan.PhuongThuc from hoadonban 
                                                    join khachhang on khachhang.KH_ID = hoadonban.KH_ID
                                                    join nhanvien on nhanvien.NV_ID = hoadonban.NV_ID
                                                    join thanhtoan on thanhtoan.TT_ID = hoadonban.TT_ID $where
                                                    order by HDB_ID LIMIT $item_per_page Offset $offset";
                                                    $record = mysqli_query($conn, "Select HDB_ID,NgayBan,TongTien,khachhang.TenKH,nhanvien.TenNV,thanhtoan.PhuongThuc from hoadonban 
                                                    join khachhang on khachhang.KH_ID = hoadonban.KH_ID
                                                    join nhanvien on nhanvien.NV_ID = hoadonban.NV_ID
                                                    join thanhtoan on thanhtoan.TT_ID = hoadonban.TT_ID $where
                                                    order by HDB_ID");
                                                    $result = mysqli_query($conn, $sql_str);
                                                }else{
                                                    $sql_str = "Select HDB_ID,NgayDat,TongTien,khachhang.TenKH,nhanvien.TenNV from hoadondat 
                                                    join khachhang on khachhang.KH_ID = hoadondat.KH_ID
                                                    join nhanvien on nhanvien.NV_ID = hoadondat.NV_ID
                                                    
                                                    order by HDB_ID LIMIT $item_per_page Offset $offset";
                                                    $record = mysqli_query($conn, "Select HDB_ID,NgayDat,TongTien,khachhang.TenKH,nhanvien.TenNV from hoadondat 
                                                    join khachhang on khachhang.KH_ID = hoadondat.KH_ID
                                                    join nhanvien on nhanvien.NV_ID = hoadondat.NV_ID
                                                
                                                    order by HDB_ID");
                                                    $result = mysqli_query($conn, $sql_str);
                                                }
                                                $totalRecords = $record->num_rows;
                                                $totalpage = ceil($totalRecords/$item_per_page);
                                            
                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                        
                                            <tr>
                                                <td><?=$row['HDB_ID']?></td>
                                                <td><?=$row['NgayDat']?></td>
                                                <td><?=$row['TenKH']?></td>
                                                <td><?=$row['TenNV']?></td>
                                               
                                                <td><?=$row['TongTien']?></td>
                                                <td><a href="detailHDB.php?HDB_ID=<?=$row['HDB_ID']?>" class="btn btn-space btn-success">VIEW</a></td>
                                                
                                                
                                                
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
                <?php require('./includes/phantrang.php') ?>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<?php require('includes/footer.php'); ?>

