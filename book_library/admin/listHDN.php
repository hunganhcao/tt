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
                            <?php 
                                require('../db/connect.php');
                                $search = isset($_GET['search']) ? $_GET['search'] : "";
                                if($search){
                                    $where = "Where `TenNV` LIKE '%". $search . "%'";
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
                                                <th>HDN_ID</th>
                                                <th>NgayNhap</th>
                                                <!-- <th>GhiChu</th> -->
                                                <th>TenNV</th>
                                                <th>TongTien</th>
                                                <!-- <th>Operation</th> -->
                                            </tr>
                                        </thead>
                                    <tbody>
                                            <?php
                                                require('../db/connect.php');
                                                $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
                                                $current_page = !empty($_GET['page'])?$_GET['page']:1; 
                                                $offset = ($current_page - 1) * $item_per_page;
                                                if($search){
                                                    $sql_str = "Select HDN_ID,NgayNhap,TongTien,nhanvien.TenNV from hoadonnhap 
                                                    join nhanvien on hoadonnhap.NV_ID = nhanvien.NV_ID $where
                                                    order by HDN_ID LIMIT $item_per_page Offset $offset";
                                                    $result = mysqli_query($conn, $sql_str);
                                                    $record = mysqli_query($conn, "Select HDN_ID,NgayNhap,TongTien,nhanvien.TenNV from hoadonnhap 
                                                    join nhanvien on hoadonnhap.NV_ID = nhanvien.NV_ID $where
                                                    order by HDN_ID");
                                                }else{
                                                    $sql_str = "Select HDN_ID,NgayNhap,TongTien,nhanvien.TenNV from hoadonnhap 
                                                    join nhanvien on hoadonnhap.NV_ID = nhanvien.NV_ID 
                                                    order by HDN_ID LIMIT $item_per_page Offset $offset";
                                                    $result = mysqli_query($conn, $sql_str);
                                                    $record = mysqli_query($conn, "Select HDN_ID,NgayNhap,TongTien,nhanvien.TenNV from hoadonnhap 
                                                    join nhanvien on hoadonnhap.NV_ID = nhanvien.NV_ID
                                                    order by HDN_ID");
                                                }
                                                $totalRecords = $record->num_rows;
                                                $totalpage = ceil($totalRecords/$item_per_page);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                        
                                    <tr>
                                        <td><?=$row['HDN_ID']?></td>
                                        <td><?=$row['NgayNhap']?></td>
                                        <td><?=$row['TenNV']?></td>
                                        <td><?=$row['TongTien']?></td>
                                        <!-- <td>EDIT | DELETE</td> -->
                                        
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

