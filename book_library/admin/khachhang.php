<?php
    require('includes/header.php');
?>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh sách khách hàng</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php 
                    require('../db/connect.php');
                    $search = isset($_GET['search']) ? $_GET['search'] : "";
                    if($search){
                        $where = "WHERE `TenKH` LIKE '%" .$search. "%'";
                    }
                    
                ?>
                            
                <form method="GET" id="custom-search" class="top-search-bar" style="padding-left: 20px;">
                    <input class="form-control"  value="<?=$search?>" type="text" placeholder="Search.." name="search" 
                    style="width:50%; display: inline-block;">
                    <button class="btn btn-space btn-info" type="submit">Tìm Kiếm</button>  
                </form>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Ngày sinh</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require('../db/connect.php');
                                        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
                                        $current_page = !empty($_GET['page'])?$_GET['page']:1; 
                                        $offset = ($current_page - 1) * $item_per_page;
                                        if($search){
                                            $sql_str = "SELECT KH_ID, TenKH, Ngaysinh, SDT, Diachi FROM KhachHang $where ORDER BY KH_ID LIMIT $item_per_page Offset $offset";
                                            $result = mysqli_query($conn, $sql_str);
                                            $record = mysqli_query($conn, "SELECT KH_ID, TenKH, Ngaysinh, SDT, Diachi FROM KhachHang $where ORDER BY KH_ID");
                                        } else {
                                            $sql_str = "Select KH_ID, TenKH, Ngaysinh, SDT, Diachi from KhachHang order by KH_ID LIMIT $item_per_page Offset $offset";
                                            $result = mysqli_query($conn, $sql_str);
                                            $record = mysqli_query($conn,"Select KH_ID, TenKH, Ngaysinh, SDT, Diachi from KhachHang order by KH_ID");
                                        }
                                        $totalRecords = $record->num_rows;
                                        $totalpage = ceil($totalRecords/$item_per_page);
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <td><?=$row['KH_ID']?></td>
                                        <td><?=$row['TenKH']?></td>
                                        <td><?=$row['Ngaysinh']?></td>
                                        <td><?=$row['SDT']?></td>
                                        <td><?=$row['Diachi']?></td>
                                    </tr>
                                    <?php } ?>
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
<?php
    require('includes/footer.php');
?>