
<?php
include('header.php');
    require(__DIR__."/user.php");
    require(__DIR__."/db.php");
if (isset($_SESSION['username']) && $_SESSION['username']){
    echo'Bạn đã đăng nhập rồi.';
    echo'<a href="/index.php">Click để quay về trang chủ</a>';
} else {
    //Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['TenDangNhap']);
    $password = addslashes($_POST['MatKhau']);
    //Kiểm tra tên đăng nhập có tồn tại không
    $sql = "SELECT Username, Pass FROM user WHERE Username='$username'";
    $query = mysqli_query($connection, $sql);
    if (mysqli_num_rows($query)<=0 ) 
    {        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     else{
           //Lấy mật khẩu trong database ra
        $row = mysqli_fetch_array($query);
    
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['Pass']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    $roles = checkuser($username, $password,$connection);
    $_SESSION['Roles'] = $roles;

    $_SESSION['username'] = $username;
    if($roles == 0) {header('location: index.php');$_SESSION['username'] = $username;}
    else if($roles == 1) {header('location: admin/index.php');$_SESSION['username'] = $username;}
    else header('location: login.php');
    //Lưu tên đăng nhập
}

    
}
?>
<div class="container">
        <div id="ban">
            <h2>ĐĂNG NHẬP TÀI KHOẢN </h2>
        </div>
        <div class="d-flex align-items-center justify-content-center">
        <form action='/Login.php?do=login' method='POST'>
            <table>
                <tr>
                    <td>
                        <p>Tên đăng nhập* <br />
                            <input id="TenDangNhap" type="text" name="TenDangNhap" size="50" />
                        </p>
                    </td>
                    </tr>
                <tr>
                    <td>
                        <p>Mật khẩu* <br />
                            <input id="MatKhau" type="password" name="MatKhau" size="50" />
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="dangnhap" value="Đăng Nhập" onclick=" return Check()" />
                        &nbsp;<a href="dangky.php"> Đăng Ký </a>
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
<!-- <div class="text-center">
    <h2>ĐĂNG NHẬP TÀI KHOẢN</h2>
    <p>Nếu đã có tài khoản, đăng nhập tại đây</p>
    <section>
    
        <form action='/Login.php?do=login' method='POST'>
                    <p>Tên đăng nhập </p>
                    <div class="form-outline mb-4">
                        <input id="TenDangNhap" type='text'  name='TenDangNhap' />
                    </div>
                   
                    <p>Mật khẩu :</p>
                    <div class="form-outline mb-4">
                        <input id="MatKhau" type='password' name='MatKhau' />
                    </div>
                    <div class="form-outline mb-4">
                        <input type='submit' name="dangnhap" value='Đăng nhập' onclick=" return Check()" />
                    </div>
                    <p><a href='dangky.php' title='Đăng ký'>Đăng ký</a></p>
        </form>
</div>
</section>
</div> -->
<script type="text/javascript">
    function Check() {
        var tendangnhap = $('#TenDangNhap').val();
        var matkhau = $('#MatKhau').val();

        if (tendangnhap == "" || matkhau == "") {
            alert("Vui lòng điền đầy đủ thông tin.");
            return false;
        }
        return true;
    }
</script>
<?php
}
?>