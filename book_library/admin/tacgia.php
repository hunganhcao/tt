<?php
    require('includes/header.php');
?>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh sách tác giả</h2>
                </div>
                <div class="aside-compose" style="width: 30%;">
                    <a class="btn btn-lg btn-secondary btn-block" href="./themtacgia.php">Thêm tác giả</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên tác giả</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require('../db/connect.php');
                                        $sql_str = "Select TG_ID, TenTG from TacGia order by TG_ID";
                                        $result = mysqli_query($conn, $sql_str);
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <td><?=$row['TG_ID']?></td>
                                        <td><?=$row['TenTG']?></td>
                                        <td>
                                            <a href="edittacgia.php?TG_ID=<?=$row['TG_ID']?>">Sửa</a> | 
                                            <a href="deletetacgia.php?TG_ID=<?=$row['TG_ID']?>" onclick="return confirm('Bạn chắc chắn muốn xóa mục này?');">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
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