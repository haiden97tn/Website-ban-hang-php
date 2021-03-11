<?php 
	include("database/db2.php");
	// if(!isset($_SESSION['user'])|| !isset($_SESSION['admin'])){
	// 	header("Location:index.php");
	// }
	
	if(isset($_GET['user'])){
		$user = $_GET['user'];
		foreach(selectDb("SELECT * FROM user WHERE user='$user'") as $row){
			$name = isset($row["user"])?$row['user']:'';
			$email = isset($row['email'])?$row['email']:'';
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
						Thông tin tài khoản
					</span>

					<span>
					<?php if (isset($error)) { ?>
						<p class="alert alert-danger"><?= $error ?></p>
					<?php
					}?>
					</span>

					<span class="txt1 p-b-11">
						Email:
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="email" name="email" value="<?=  $row['email'] ?>">
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						User:
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<input class="input100" type="text" name="fname" value="<?=$row['user'] ?>" >
						<span class="focus-input100"></span>
					</div>
                    
					
					

					<div class="container-login100-form-btn"> 
                        <a href="./edit_user.php?user=<?= $row['user'] ?>" class="login100-form-btn">ĐỔI MẬT KHẨU</a>
                        <a href="index.php" class="login100-form-btn" style="margin-left: 25px;">QUAY LẠI</a>
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