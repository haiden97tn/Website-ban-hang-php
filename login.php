<?php 
@session_start();
include("./database/db1.php");
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
	header("Location:index.php");
}
if (isset($_POST['login'])) {
	$user = $_POST['user'];
	$password = md5($_POST['passwd']);
	$check = "SELECT * FROM user WHERE user = '$user' AND passwd = '$password' AND active = :active AND permission=:permission";
	$count = $conn->prepare($check);
	$count->execute(array(
		'permission' => 1,
		'active' => 1
	));
	$check_admin = "SELECT * FROM user WHERE user = '$user' AND passwd = '$password' AND permission= :permission AND active = :active ";
	$cout_admin = $conn->prepare($check_admin);
	$cout_admin->execute(array(
		':permission' => 0,
		':active' => 1
	));
	if ($cout_admin->rowCount() > 0) {
		$_SESSION['admin'] = $user;
		header("Location:admin/index.php");
	} elseif ($count->rowCount() > 0) {
		$_SESSION['user'] = $user;
		header("location:index.php");
	} else {
		$error = "UserName hoặc mật khẩu chưa đúng hoặc tài khoản của bạn đã bị khóa!";
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPT | Login</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        .section .form-login form input:focus{
            outline:0;
        }
        .section .form-login form button:focus{
            outline:0;
            border: 1px solid gray;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <div class="nav-left">
                <a href="index.php"><img src="images/logo.png" alt=""></a>
                <p>Đăng Nhập</p>
            </div>
            <div class="nav-right">
                <a href="#">Cần trợ giúp?</a>
            </div>
        </div>
        <div class="section">
            <div class="background">
                <img src="images/Untitled-2.jpg" alt="">
            </div>
            <div class="form-login">
                <p>Đăng Nhập:</p>
                <span>
					<?php if (isset($error)) { ?>
						<p class="alert alert-danger"><?= $error ?></p>
					<?php
					}?>
					</span>
                <form action="" method="post">
                    <input type="text" name="user" id="user" placeholder="Nhập UserName" required/> <br>
                    <input type="password" name="passwd" id="passwd" placeholder="Mật khẩu" required/>
                    <button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
                </form>
                <div class="form-add">
                    <a href="#">Quên mật khẩu?</a>
                    <a href="dangky.php">Đăng ký</a>
                </div>
                <hr>
                <div class="thank">Cảm ơn bạn đã đến với FPT.</div>
            </div>
        </div>
        <div class="footer">
            <?php include_once('template/footer.php'); ?>
        </div>
    </div>
</body>
</html>