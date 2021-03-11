<?php 
include_once("database/db2.php");
// if(!isset($_SESSION['user'])|| !isset($_SESSION['admin'])){
// 	header("Location:index.php");
// }
if (isset($_GET['user'])) {
    $user = $_GET['user'];
    if (isset($_POST['updatePass'])) {
        $pass = md5($_POST['pass']);
        $passnew = md5($_POST['passnew']);
        $passconfirm = md5($_POST['passconfirm']);
        if ($passnew != $passconfirm) {
            $error = "Nhập lại mật khẩu chưa chính xác!";
        } else {
            $sql = "SELECT * FROM user WHERE user = '$user' AND passwd = '$pass'";
            $check = $conn->prepare($sql);
            $check->execute();
            if ($check->rowCount() > 0) {
                action("UPDATE user SET passwd = '$passnew' where user = '$user' ");
                $error = "Đổi mật khẩu thành công!";
            } else {
                $error = "Mật khẩu sai vui lòng thử lại!";
            }
        }
    }
}else{
    header("Location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thông tin tài khoản</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST">
					<span class="login100-form-title p-b-32">
						Đổi mật khẩu
					</span>

					<span style="width: 100%;color:red;">
					<?php if (isset($error)) { ?>
						<p class="alert alert-danger" style="color:red;"><?= $error ?></p>
					<?php
					}?>
					</span>

					<span class="txt1 p-b-11">
						Mật khẩu cũ:
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
                    </div>
                    
                    <span class="txt1 p-b-11">
						Mật khẩu mới:
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="passnew" >
						<span class="focus-input100"></span>
                    </div>
                    
                    <span class="txt1 p-b-11">
						Nhập lại mật khẩu:
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="passconfirm" >
						<span class="focus-input100"></span>
					</div>
					
					

					<div class="container-login100-form-btn"> 
                        <button type="submit" name="updatePass" class="login100-form-btn">ĐỔI MỚI</button>
                        <a href="./profile.php?user=<?=  $user ?>" class="login100-form-btn" style="margin-left: 25px;">QUAY LẠI</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>