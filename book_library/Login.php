<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Book Library</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <section>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <img src="images/bg.jpg" class="bg" alt="">
            <div class="login">
                <h2>Sign In</h2>
                <div class="inputBox">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="inputBox">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="inputBox">
                    <input type="submit" name="login" value="Login" id="btn">
                </div>
                <div class="group">
                    <a href="#">Foget Password</a>
                    <a href="#">Sign Up</a>
                     <a href="signup.php">Sign Up</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html> -->
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
    if ($query == NULL) 
    {        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
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
?>
<div id="vien"><div class="center"><div id="ban"><a id="ba" href="/index.php">Trang chủ</a> > <font color="#008744">Đăng nhập tài khoản</font>
</div></div></div>
<div id="vien"><div class="center"><div id="ban">
    <h2>ĐĂNG NHẬP TÀI KHOẢN</h2>
    <p>Nếu đã có tài khoản, đăng nhập tại đây</p></div>
    <div id="ban">
        <form action='/Login.php?do=login' method='POST'>
                    <p>Tên đăng nhập </p>
                    <p><input id="TenDangNhap" type='text' size="50" name='TenDangNhap' /></p>
                    <p>Mật khẩu :</p>
                    <p><input id="MatKhau" type='password' name='MatKhau' /></p>
                    <p><input type='submit' name="dangnhap" value='Đăng nhập' onclick=" return Check()" />
                    <a href='dangky.php' title='Đăng ký'>Đăng ký</a></p>
        </form>
</div></div></div>
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