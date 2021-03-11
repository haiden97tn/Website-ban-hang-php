<?php include ('database/db2.php')?>
    <?php
    if (isset($_POST['register'])) {
        $name = $_POST['user'];
        $email = $_POST['email'];
        $passwd = md5($_POST['passwd']);
        $permission = 1; //user
        $active = 1; //dang hoat dong
        $check_name = "SELECT * FROM user WHERE user = '$name'";
        $check_email = "SELECT * FROM user WHERE email = '$email'";
        $cout_name = $conn->prepare($check_name);
        $cout_name->execute();
        $cout_mail = $conn->prepare($check_email);
        $cout_mail->execute();
        if ($cout_name->rowCount() > 0) {
            $error = "Name này đã có người sử dụng. Vui lòng chọn Số khác khác ";
        } elseif ($cout_mail->rowCount() > 0) {
            $error = "email này đã có người sử dụng. Vui lòng chọn Số khác khác! ";
        } else {
            action("INSERT INTO user (user,email,passwd,permission,active) VALUES ('$name','$email','$passwd','$permission','$active')");
            $error = "Tạo mới thành công!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPT | Đăng ký</title>
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
                <p>Đăng Ký</p>
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
                <p>Đăng Ký:</p>
                <span><?php
				if (isset($error)) { ?>
					<p class="alert alert-danger"><?= $error ?></p>
				<?php
				}
				?></span>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="user" id="user" placeholder="Nhập Username..." required/> <br>
                    <input type="password" name="passwd" id="passwd" placeholder="Nhập Password..." required/>
                    <input type="email" name="email" id="email" placeholder="Nhập Email..." required/>
                    <button type="submit" name="register" class="btn btn-primary">Đăng Ký</button>
                </form>
                <div class="form-add">
                    <a href="#">Quên mật khẩu?</a>
                    <a href="login.php">Đăng Nhập</a>
                </div>
            </div>
            
        </div>
        <div class="footer">
            <?php include_once('template/footer.php'); ?>
        </div>
    </div>
</body>
</html>