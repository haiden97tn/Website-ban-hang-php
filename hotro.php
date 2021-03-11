<?php
	require_once "admin/funcAdmin.php";
	$sql = "select * from support";
	$result = mysqli_query($con,$sql);
?>
<?php 
	if(isset($_POST["btn_add"]))
	{
        $title = mysqli_escape_string($con,$_POST["title"]);
        $content = mysqli_escape_string($con,$_POST["content"]);
        $full_name = mysqli_escape_string($con,$_POST["full_name"]);
        $email = mysqli_escape_string($con,$_POST["email"]);
        $phone = mysqli_escape_string($con,$_POST["phone"]);
    
        $sql = "insert into support(title,content,full_name,email,phone) values('$title','$content','$full_name','$email','$phone')";
        mysqli_query($con,$sql);
        $error = "Câu hỏi của bạn đã được ghi nhận và sẽ được phản hồi trong thời gian sớm nhất";  
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPT | Hỗ trợ</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hotro.css">
</head>
<body>
    <div class="container">
        <div class="nav">
            <?php include_once ("template/header.php"); ?>
        </div>
        <h2>HỖ TRỢ</h2>
        <div class="content">
            <div class="support">
                <div class="child-title">
                   <p> Xin hân hạnh được hỗ trợ quý khách</p>
                </div>
                <div class="form">
                    <form action="" method="POST">
                        <span style="color:orangered">
                        <?php if (isset($error)) { ?>
                            <p class="alert alert-danger"><?= $error ?></p>
                        <?php
                        }?>
                        </span>
                        <table>
                            <tr>
                                <td class="label"><label for="">Tiêu đề:</label></td>
                                <td class="input"><input type="text" name="title" placeholder="Nhập nội dung..." required></td>
                            </tr>
                            <tr>
                                <td class="label">Nội dung:</td>
                                <td class="input"><textarea name="content" id="content" cols="30" rows="10" placeholder="Nhập nội dung..."></textarea></td>
                            </tr>
                            <tr>
                                <td class="label"><label for="">Họ tên:</label></td>
                                <td class="input"><input type="text" name="full_name" placeholder="Nhập họ tên..." required></td>
                            </tr>
                            <tr>
                                <td class="label"><label for=""></label>Email:</label></td>
                                <td class="input"><input type="email" name="email" placeholder="Nhập email..." required></td>
                            </tr>
                            <tr>
                                <td class="label"><label for=""></label>SĐT:</label></td>
                                <td class="input"><input type="text" name="phone" placeholder="Nhập số điện thoại..." required></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button type="submit" name="btn_add">Gửi Đi</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="information">
                <div class="child-title">
                   <p class="title-1"> Thông tin liên hệ khác</p>
                    <p class="title-2">Tìm siêu thị fpt? Xin mời ghé thăm trang Tìm siêu thị để xem bản đồ và địa chỉ các siêu thị trên toàn quốc.</p>
                </div>
                <div class="content-information">
                    <ul>
                        <li>Báo chí, hợp tác: liên hệ <em>baochi@fptpoly.com</em></li>
                        <li>Tổng đài tư vấn, hỗ trợ khách hàng (7h30 đến 22h): <strong>1800.1060</strong> hoặc <strong>094.2990.923</strong></li>
                        <li>Tổng đài khiếu nại: <strong>1800.1062</strong></li>
                        <li>Email: <em>cskh@fptpoly.com</em> </li>
                    </ul>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19132.082433797055!2d105.7417573100593!3d21.037034810352694
                        !2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0
                        !3m2!1sen!2s!4v1605848613918!5m2!1sen!2s" width="100%" height="250px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php include_once('template/footer.php'); ?>
        </div>
    </div>
</body>
</html>
