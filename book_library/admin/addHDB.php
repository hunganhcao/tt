<?php

require('../db/connect.php');

// ... (rest of the PHP code remains the same)

// Xử lý khi biểu mẫu được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ghichu = $_POST['ghichu'];
        $tongtien = 0;
        $kh = $_POST['kh'];
        $nv = $_POST['nv'];
        $invoice_id=0;
   
        $sql_str = "INSERT into `hoadondat` (`GhiChu`,`TongTien`, `KH_ID`,`NV_ID`)
        values ( '$ghichu','$tongtien',$kh,$nv);";
        $conn->query($sql_str);

        $invoice_id = $conn->insert_id;

    
    $total_amount = 0;
    if (isset($_POST["ctsp"]) && is_array($_POST["ctsp"])) {
    // Xử lý thêm chi tiết hóa đơn
    $ctsp=$_POST["ctsp"];
    $quantities = $_POST["soluong"]; 
    foreach ($ctsp as $key => $product) {
        $quantity =$quantities [$key];
        $sql_product = "SELECT GiaBan FROM chitietsp WHERE ChiTietThu = '$product'";
        $dongia = $conn->query($sql_product);
        $row = $dongia->fetch_assoc();
                $unit_price = $row["GiaBan"];
                $total_price = $quantity * $unit_price;
        $sql_detail = "INSERT INTO `chitiethdb`  (`HDB_ID`,`CTSP_ID`,`SoLuong`) 
                       VALUES ('$invoice_id', '$product', '$quantity')";
        $query = mysqli_query($conn, $sql_detail);
        $total_amount += $total_price;
       
    }
    $sql_update_invoice = "UPDATE hoadondat SET TongTien = '$total_amount' WHERE HDB_ID = '$invoice_id'";
    $conn->query($sql_update_invoice);
    if (headers_sent()) {
       
    }
    else{
        header("location: listHDB.php");
    }
    
    }
}
?>