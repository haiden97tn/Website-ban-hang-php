<?php 
    include("database/db2.php");
?>
<?php
     include "admin/funcAdmin.php";
    $sql6 = "select * from information ";
    $result6 = mysqli_query($con,$sql6);
    $row6 = mysqli_fetch_array($result6);
?>
<style>
    #user{
        color: white;
    }
    #admin{
        color: white;
    }
     .search form input:focus{
        outline:0;
    }
    .search form button:focus{
        outline:0;
        border: 1px solid gray;
    }
</style>
<div class="menu">
    <div class="menu-child">
        <a href="index.php">Trang chủ</a> |
        <a href="?pages=cate">Sản phẩm</a> |
        <a href="?pages=tintuc">Tin tức</a> |
        <a href="?pages=hotro">Hỗ trợ</a> 
    </div>
    <div class="menu-child">
    <?php
            if (isset($_SESSION['admin'])) { ?>
                    <a href="#" id="admin">Admin: <?= $_SESSION['admin'] ?></a> |
                    <a href="admin/index.php"> Quản trị</a> |
                    <a href="logout.php" onclick="return window.confirm('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng xuất</a>
                       
            <?php
            } elseif (isset($_SESSION['user'])) { ?>
                    <a href="./profile.php?user=<?= $_SESSION['user'] ?> " id="user">User: <?= $_SESSION['user'] ?></a> |
                    <a href="logout.php" onclick="return window.confirm('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng xuất</a>
            <?php
            } else { ?>
                <a href="?pages=login">Đăng nhập</a> |
                <a href="./dangky.php">Đăng ký</a>
            <?php
            }
            ?>
    </div>
    
</div>
<div class="search">
    <a href="index.php"><img src="admin/upload1/<?php echo $row6['logo']; ?>" alt=""></a>
    <form action="?pages=search" method="POST">
        <input type="text" name="name" placeholder="Tìm sản phẩm, thương hiệu và tên shop" required>
        <button type="submit" name="search" class="btn btn-primary">Search</button>
    </form>
    <div class="img-cart">
        <a href="?pages=cart"><img src="images/cart.png" alt="" ></a>
    </div>
</div>


