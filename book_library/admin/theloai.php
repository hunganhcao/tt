<?php
    require('includes/header.php');
?>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh sách thể loại</h2>
                </div>
                <div class="aside-compose" style="width: 30%;">
                    <a class="btn btn-lg btn-secondary btn-block" href="./themtheloai.php">Thêm thể loại</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Basic Table</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên thể loại</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require('../db/connect.php');
                                        $sql_str = "Select TL_ID, TenTL from TheLoai order by TL_ID";
                                        $result = mysqli_query($conn, $sql_str);
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <td><?=$row['TL_ID']?></td>
                                        <td><?=$row['TenTL']?></td>
                                        <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên thể loại</th>
                                        <th>Operation</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require('includes/footer.php');
?>