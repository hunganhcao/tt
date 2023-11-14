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
            <?php 
                    require('../db/connect.php');
                    $search = isset($_GET['search']) ? $_GET['search'] : "";
                    if($search){
                        $where = "WHERE `TenTG` LIKE '%" .$search. "%'";
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
                                        <th>Tên tác giả</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require('../db/connect.php');
                                        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:10;
                                        $current_page = !empty($_GET['page'])?$_GET['page']:1; 
                                        $offset = ($current_page - 1) * $item_per_page;
                                        if($search){
                                            $sql_str = "SELECT TG_ID, TenTG FROM TacGia $where ORDER BY TG_ID LIMIT $item_per_page Offset $offset";
                                            $result = mysqli_query($conn, $sql_str);
                                            $record = mysqli_query($conn, "SELECT TG_ID, TenTG FROM TacGia $where ORDER BY TG_ID");
                                        } else {
                                            $sql_str = "SELECT TG_ID, TenTG FROM TacGia ORDER BY TG_ID LIMIT $item_per_page Offset $offset";
                                            $result = mysqli_query($conn, $sql_str);
                                            $record = mysqli_query($conn,"SELECT TG_ID, TenTG FROM TacGia ORDER BY TG_ID");
                                        }
                                        $totalRecords = $record->num_rows;
                                        $totalpage = ceil($totalRecords/$item_per_page);
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
            <?php require('./includes/phantrang.php') ?>
        </div>
    </div>
</div>
<?php
    require('includes/footer.php');
?>