<?php 
    require('includes/header.php');
    require('../db/connect.php');
    if(isset($_GET['HDB_ID'])){
        $id = $_GET['HDB_ID'];
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
                                 <a class="btn btn-lg btn-secondary btn-block" href="./adddetailHDB.php?HDB_ID=<?php echo $id?>">Thêm Chi Tiết Hóa Đơn Bán</a></div>
                               
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Chi Tiết Hóa Đơn Bán</h5>
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
                                                <!-- <th>HDB_ID</th> -->
                                                <th>ID Chi tiết sản phẩm</th>
                                                <th>SỐ lượng</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>

                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                            $HDB_ID = $_GET['HDB_ID'];
                                            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
                                            $current_page = !empty($_GET['page'])?$_GET['page']:1; 
                                            $offset = ($current_page - 1) * $item_per_page;
                                            if($search){
                                                $sql_str = "Select chitiethdb.HDB_ID, chitiethdb.CTSP_ID, chitiethdb.SoLuong from chitiethdb
                                                join hoadonban on chitiethdb.HDB_ID = hoadonban.HDB_ID
                                                join chitietsp on chitiethdb.CTSP_ID = chitietsp.CTSP_ID
                                                where chitiethdb.$where and chitiethdb.HDB_ID = $HDB_ID
                                                order by chitiethdb.HDB_ID LIMIT $item_per_page Offset $offset";
                                                $result = mysqli_query($conn, $sql_str); 
                                                $record = mysqli_query($conn, "Select chitiethdb.HDB_ID, chitiethdb.CTSP_ID, chitiethdb.SoLuong from chitiethdb
                                                join hoadonban on chitiethdb.HDB_ID = hoadonban.HDB_ID
                                                join chitietsp on chitiethdb.CTSP_ID = chitietsp.CTSP_ID
                                                where chitiethdb.$where and chitiethdb.HDB_ID = $HDB_ID
                                                order by chitiethdb.HDB_ID");
                                            }else{
                                                $sql_str = "Select chitiethdb.HDB_ID, chitiethdb.CTSP_ID, chitiethdb.SoLuong from chitiethdb
                                                join hoadondat on chitiethdb.HDB_ID = hoadondat.HDB_ID
                                                join chitietsp on chitiethdb.CTSP_ID = chitietsp.ChiTietThu
                                                where chitiethdb.HDB_ID = $HDB_ID
                                                order by chitiethdb.HDB_ID LIMIT $item_per_page Offset $offset";
                                                $result = mysqli_query($conn, $sql_str); 
                                                $record = mysqli_query($conn, "Select chitiethdb.HDB_ID, chitiethdb.CTSP_ID, chitiethdb.SoLuong from chitiethdb
                                                join hoadondat on chitiethdb.HDB_ID = hoadondat.HDB_ID
                                                join chitietsp on chitiethdb.CTSP_ID = chitietsp.ChiTietThu
                                                where chitiethdb.HDB_ID = $HDB_ID
                                                order by chitiethdb.HDB_ID");
                                            }
                                            $totalRecords = $record->num_rows;
                                            $totalpage = ceil($totalRecords/$item_per_page);
                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                        
                                            <tr>
                                                <td><?=$row['CTSP_ID']?></td>
                                                <td><?=$row['SoLuong']?></td>
                                                <td><a href="editdetailHDB.php?HDB_ID=<?=$row['HDB_ID']?>&CTSP_ID=<?=$row['CTSP_ID']?>" class="btn btn-space btn-warning">EDIT</a></td>
                                                <td><a href="deletedetailHDB.php?HDB_ID=<?=$row['HDB_ID']?>&CTSP_ID=<?=$row['CTSP_ID']?>" class="btn btn-space btn-danger" 
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa mục này?');">DELETE</a></td> 
                                            </tr>
                                            <?php
                                                    // echo $row["HDB_ID"];
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
                                <?php require('./includes/phantrangdetailHDB.php'); ?>
                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <a href="listHDB.php" class="btn btn-space btn-secondary">Cancel</a>
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

