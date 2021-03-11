<?php
     include "admin/funcAdmin.php";
    $sql6 = "select * from information ";
    $result6 = mysqli_query($con,$sql6);
    $row6 = mysqli_fetch_array($result6);
?>
<div class="footer-1">
    <img src="admin/upload1/<?php echo $row6['logo']; ?>" alt="">
    <p>Địa chỉ: <?php echo $row6['address']; ?></p>
        <p>Phone: <?php echo $row6['phone']; ?></p>
    <p>Email: <?php echo $row6['email']; ?></p>
    <div class="logo">
        <a href="https://www.facebook.com/Tran.Quang.Vinh.0309"><img src="images/icon1.png" alt=""></a>
        <a href="#"><img src="images/icon2.png" alt=""></a>
        <a href="#"><img src="images/icon3.png" alt=""></a>
        <a href="#"><img src="images/icon4.png" alt=""></a>
    </div>
</div>
<div class="footer-2">
    <p class="tieu-de">Thông tin</p>
    <a href="#">Về chúng tôi</a><br>
    <a href="#">Thủ tục thanh toán</a><br>
    <a href="#">Thông tin</a><br>
    <a href="#">Dịch vụ</a>
</div>
<div class="footer-2">
    <p class="tieu-de">Tài khoản của tôi</p>
    <a href="#">Tài khoản của tôi</a><br>
    <a href="#">Tiếp xúc</a><br>
    <a href="#">Giỏ hàng</a><br>
    <a href="#">Shop</a>
</div>
<div class="footer-3">
    <p class="tieu-de">Tham gia bản tin của chúng tôi ngay</p>
    <p>Cập nhật E-mail về cửa hàng mới nhất của <br> chúng tôi và nhận ưu đãi đặc biệt.</p>
    <input type="text" placeholder="Nhập Mail của bạn">
    <button>THEO DÕI</button>
</div>
