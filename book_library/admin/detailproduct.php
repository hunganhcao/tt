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
                                <!-- <div class="aside-compose" style="width: 30%;"><a class="btn btn-lg btn-secondary btn-block" href="./themsanpham.php">Thêm Sản Phẩm</a></div> -->
                               
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Chi Tiết Sản Phẩm</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <!-- <th>SP_ID</th> -->
                                                <th>TenSach</th>
                                                <th>TapSo</th>
                                                <th>SoLuong</th>
                                                <th>SoTrang</th>
                                                <th>HinhAnh</th>
                                                <th>NamXB</th>
                                                <th>GiaNhap</th>
                                                <th>GiaBan</th>
                                                <th>Thêm</th>
                                                <th>Sửa</th>

                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php
                                            $id = $_GET['SP_ID'];
                                            require('../db/connect.php');
                                            $sql_str = "Select chitietsp.SP_ID, CTSP_ID, TenSach,chitietsp.HinhAnh,TapSo,SoLuong, SoTrang, NamXB, GiaNhap,GiaBan
                                            from chitietsp
                                            join sanpham on chitietsp.SP_ID = sanpham.SP_ID
                                            where chitietsp.SP_ID = $id
                                            order by CTSP_ID";
                                            $result = mysqli_query($conn, $sql_str);
                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                        
                                            <tr>
                                                <!-- <td><?=$row['SP_ID']?></td> -->
                                                <td><?=$row['TenSach']?></td>
                                                <td><?=$row['TapSo']?></td>
                                                <td><?=$row['SoLuong']?></td>
                                                <td><?=$row['SoTrang']?></td>
                                                <td><img src="upload/<?=$row['HinhAnh']?>" alt="" width="200px"></td>
                                                <th><?=$row['NamXB']?></th>
                                                <th><?=$row['GiaNhap']?></th>
                                                <th><?=$row['GiaBan']?></th>
                                                <td><a href="adddetail.php?&SP_ID=<?=$row['SP_ID']?>" class="btn btn-space btn-success">ADD</a></td>
                                                <td><a href="editdetail.php?CTSP_ID=<?=$row['CTSP_ID']?>" class="btn btn-space btn-warning">EDIT</a></td>
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
                        <div class="row">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                <!-- <label class="be-checkbox custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                </label> -->
                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <a href="listbooks.php" class="btn btn-space btn-secondary">Cancel</a>
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

