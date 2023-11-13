<?php 
    require('includes/header.php');
    require('../db/connect.php');
    if(isset($_GET['HDN_ID'])){
        $id = $_GET['HDN_ID'];
    }
?>
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <!-- <h2 class="pageheader-title">Danh Sách Sản Phẩm </h2> -->
                                 <div class="aside-compose" style="width: 30%; padding-left: 0;">
                                 <a class="btn btn-lg btn-secondary btn-block" href="./adddetailHDN.php?HDN_ID=<?php echo $id?>">Thêm Chi Tiết Hóa Đơn Nhập</a></div>
                               
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Chi Tiết Hóa Đơn Nhập</h5>
                            <?php 
                                require('../db/connect.php');
                                $search = isset($_POST['search']) ? $_POST['search'] : "";
                                if($search){
                                    $where = "`CTSP_ID` LIKE '%". $search . "%'"; 
                                }
                                
                            ?>
                            
                            <form method="post" id="custom-search" class="top-search-bar" style="padding-left: 20px;">
                                <input class="form-control"  value="<?=$search?>" type="text" placeholder="Search.." name="search" 
                                style="width:50%; display: inline-block;">
                                <button class="btn btn-space btn-info" type="submit">Tìm Kiếm</button>  
                            </form>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <!-- <th>HDN_ID</th> -->
                                                <th>ID Chi tiết sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>

                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                            $HDN_ID = $_GET['HDN_ID'];
                                            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
                                            $current_page = !empty($_GET['page'])?$_GET['page']:1; 
                                            $offset = ($current_page - 1) * $item_per_page;
                                            if($search){
                                                $sql_str = "Select chitiethdn.HDN_ID, chitiethdn.CTSP_ID, chitiethdn.SoLuong from chitiethdn
                                                join hoadonnhap on chitiethdn.HDN_ID = hoadonnhap.HDN_ID
                                                join chitietsp on chitiethdn.CTSP_ID = chitietsp.CTSP_ID
                                                where chitiethdn.$where and chitiethdn.HDN_ID = $HDN_ID
                                                order by chitiethdn.HDN_ID LIMIT $item_per_page Offset $offset";
                                                $result = mysqli_query($conn, $sql_str); 
                                                $record = mysqli_query($conn, "Select chitiethdn.HDN_ID, chitiethdn.CTSP_ID, chitiethdn.SoLuong from chitiethdn
                                                join hoadonnhap on chitiethdn.HDN_ID = hoadonnhap.HDN_ID
                                                join chitietsp on chitiethdn.CTSP_ID = chitietsp.CTSP_ID
                                                where chitiethdn.$where and chitiethdn.HDN_ID = $HDN_ID
                                                order by chitiethdn.HDN_ID");
                                            }else{
                                                $sql_str = "Select chitiethdn.HDN_ID, chitiethdn.CTSP_ID, chitiethdn.SoLuong from chitiethdn
                                                join hoadonnhap on chitiethdn.HDN_ID = hoadonnhap.HDN_ID
                                                join chitietsp on chitiethdn.CTSP_ID = chitietsp.CTSP_ID
                                                where chitiethdn.HDN_ID = $HDN_ID
                                                order by chitiethdn.HDN_ID LIMIT $item_per_page Offset $offset";
                                                $result = mysqli_query($conn, $sql_str); 
                                                $record = mysqli_query($conn, "Select chitiethdn.HDN_ID, chitiethdn.CTSP_ID, chitiethdn.SoLuong from chitiethdn
                                                join hoadonnhap on chitiethdn.HDN_ID = hoadonnhap.HDN_ID
                                                join chitietsp on chitiethdn.CTSP_ID = chitietsp.CTSP_ID
                                                where chitiethdn.HDN_ID = $HDN_ID
                                                order by chitiethdn.HDN_ID");
                                            }
                                            $totalRecords = $record->num_rows;
                                            $totalpage = ceil($totalRecords/$item_per_page);
                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                        
                                            <tr>
                                                <td><?=$row['CTSP_ID']?></td>
                                                <td><?=$row['SoLuong']?></td>
                                                <td><a href="editdetailHDN.php?HDN_ID=<?=$row['HDN_ID']?>&CTSP_ID=<?=$row['CTSP_ID']?>" class="btn btn-space btn-warning">EDIT</a></td>
                                                <td><a href="deletedetailHDN.php?HDN_ID=<?=$row['HDN_ID']?>&CTSP_ID=<?=$row['CTSP_ID']?>" class="btn btn-space btn-danger" 
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa mục này?');">DELETE</a></td> 
                                            </tr>
                                            <?php
                                                    // echo $row["HDN_ID"];
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                <!-- <label class="be-checkbox custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                </label> -->
                                <?php require('./includes/phantrangdetailhdn.php'); ?>
                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <a href="listhdn.php" class="btn btn-space btn-secondary">Cancel</a>
                                </p>
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

