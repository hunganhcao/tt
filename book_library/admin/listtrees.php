<?php 
    require('./includes/header.php');
?>
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <!-- <h2 class="pageheader-title">Danh Sách Sản Phẩm </h2> -->
                                <div class="aside-compose" style="width: 30%; padding-left: 0;" >
                                <a class="btn btn-lg btn-secondary btn-block" href="./themsanpham.php">Thêm Sản Phẩm</a>
                            </div>
                               
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Danh Sách Sản Phẩm</h5>
                            <?php 
                                require('../db/connect.php');
                                $search = isset($_GET['search']) ? $_GET['search'] : "";
                                if($search){
                                    $where = "Where `TenSach` LIKE '%". $search . "%'";
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
                                                <!-- <th>SP_ID</th> -->
                                                <th>Tên cây</th>
                                                <th>Hình ảnh</th>
                                                <th>Mô tả</th>
                                                <th>Số lượng</th>
                                                <th>Chi Tiết</th>

                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                            require('../db/connect.php');
                                            //nếu nó khác rỗng thì get , rỗng thì mặc định = 4
                                            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
                                            $current_page = !empty($_GET['page'])?$_GET['page']:1; 
                                            $offset = ($current_page - 1) * $item_per_page;
                                            if($search){
                                                $sql_str = "Select SP_ID,TenSach,HinhAnh,nhaxuatban.TenNXB,tacgia.TenTG,theloai.TenTL from sanpham 
                                                join nhaxuatban on nhaxuatban.NXB_ID = sanpham.NXB_ID
                                                join tacgia on tacgia.TG_ID = sanpham.TG_ID
                                                join theloai on theloai.TL_ID = sanpham.TL_ID $where
                                                order by SP_ID LIMIT $item_per_page Offset $offset";
                                                $result = mysqli_query($conn, $sql_str);    
                                                $record = mysqli_query($conn, "Select SP_ID,TenSach,HinhAnh,nhaxuatban.TenNXB,tacgia.TenTG,theloai.TenTL from sanpham
                                                join nhaxuatban on nhaxuatban.NXB_ID = sanpham.NXB_ID
                                                join tacgia on tacgia.TG_ID = sanpham.TG_ID
                                                join theloai on theloai.TL_ID = sanpham.TL_ID $where
                                                order by SP_ID");
                                            }else{
                                                $sql_str = "Select Cay_ID,TenCay,HinhAnh,MoTa,SoLuong from Cay 
                                                
                                                order by Cay_ID LIMIT $item_per_page Offset $offset";
                                                $result = mysqli_query($conn, $sql_str);
                                                $record = mysqli_query($conn, "Select Cay_ID,TenCay,HinhAnh,SoLuong
                                                from Cay
                                                order by Cay_ID");
                                            }
                                            $totalRecords = $record->num_rows;
                                            $totalpage = ceil($totalRecords/$item_per_page);
                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                        
                                            <tr>
                                                <!-- <td><?=$row['Cay_ID']?></td> -->
                                                <td><?=$row['TenCay']?></td>
                                                <td><img src="upload/<?=$row['HinhAnh']?>" alt="" width="100px"></td>
                                                <td><?=$row['MoTa']?></td>
                                                <td><?=$row['SoLuong']?></td>
                                                <td><a href="detailproduct.php?Cay_ID=<?=$row['Cay_ID']?>" class="btn btn-space btn-success">VIEW</a></td>
                                                <!-- <td><a href="editproduct.php?SP_ID=<?=$row['SP_ID']?>" class="btn btn-space btn-warning">EDIT</a></td>
                                                <td><a href="deleteproduct.php?SP_ID=<?=$row['SP_ID']?>" class="btn btn-space btn-danger" 
                                                    onclick="return confirm('Bạn chắc chắn muốn xóa mục này?');">DELETE</a></td>  -->
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
<?php require('./includes/footer.php'); ?>

