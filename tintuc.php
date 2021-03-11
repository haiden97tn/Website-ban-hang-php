<?php
    include "admin/funcAdmin.php";

    $sql7 = "select * from news ";
    $result7 = mysqli_query($con,$sql7);

    $sql8 = "select * from news ORDER BY id DESC limit 1";
    $result8 = mysqli_query($con,$sql8);

    $sql9 = "select * from news limit 4";
    $result9 = mysqli_query($con,$sql9);

    $sql10 = "select * from news ORDER BY RAND() limit 3";
    $result10 = mysqli_query($con,$sql10);

    $sql11 = "select * from products limit 5";
    $result11 = mysqli_query($con,$sql11);

    $sql12 = "select * from news limit 3";
    $result12 = mysqli_query($con,$sql12);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="stylesheet" href="css/tintuc.css">
    <link rel="stylesheet" href="css/style.css">
     
</head>
<body>
    <div class="container">
        <div class="nav">
            <?php
                require_once('template/header.php');
            ?>
        </div>
        <h2 style="color:orangered">TIN TỨC</h2>
        <div class="article">
            <div class="article1">
                <?php while ($rows = mysqli_fetch_array($result8)) {
                ?>
                <div class="article11">
                    <img alt="" src="admin/upload1/<?php echo $rows['images'];  ?>" >
                    <a href="?pages=chitiet-tt&id=<?php echo $rows['id']?>"><h2><?php echo $rows['title']; ?></h2></a>
                    <p><?php echo $rows['create_at']; ?></p>
                </div>
                <?php } ?>
                <div class="article12">
                <?php while ($rows = mysqli_fetch_array($result10)) {
                ?>
                    <div class="article121">
                        <div class="article121a">
                            <img alt="" src="admin/upload1/<?php echo $rows['images'];  ?>" >
                        </div>
                        <div class="article121b">
                        <a href="?pages=chitiet-tt&id=<?php echo $rows['id']?>"><?php echo $rows['title']; ?></a>
                        </div>   
                    </div>
                    <hr style="margin-left:5%; margin-right:5%; color: rgb(70, 67, 67)">
                <?php } ?>
                </div>
            </div>
            <div class="article2">
                <h3>Xem nhiều</h3>
                <hr>
                <ol>
                <?php while ($rows = mysqli_fetch_array($result9)) {
                ?>
                    <li><a href="?pages=chitiet-tt&id=<?php echo $rows['id']?>"><?php  echo $rows['title']  ?></a></li>
                <?php } ?>
                </ol>
            </div>
        </div>
        <div class="news">
            <div class="article3">
            <?php while ($rows = mysqli_fetch_array($result12)) {
            ?>
                <div class="article3a">
                    <img alt="" src="admin/upload1/<?php echo $rows['images'];  ?>" width="300px" height="200">
                    <div class="content">
                        <a href="?pages=chitiet-tt&id=<?php echo $rows['id']?>"><h2><?php echo $rows['title']; ?></h2></a>
                        <p><?php $str=$rows['content']; echo substr($str,0,200),'...';   ?></p>
                        <p><?php echo $rows['create_at']; ?></p>
                    </div>
                </div>
            <?php } ?>
                <h3><a href="">Xem thêm</a></h3>
            </div>

            <div class="article4">
                <h3>Sản phẩm mới nhất</h3>
                <hr>
                <?php while ($rows = mysqli_fetch_array($result11)) {
                ?>
                <div class="article4a">
                    <img alt="" src="admin/upload1/<?php echo $rows['images'];  ?>" width="100%" >
                    <a href="?pages=chitiet&id=<?php echo $rows['id_products']?>"><?php echo $rows['name_products']; ?></a>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="picture">
            <a href="#"><img src="images/banner/637350328978976361_H5_1200x200.jpg" alt=""></a>
        </div>
        <div class="footer">
        <?php
            require_once('template/footer.php');
        ?>
        </div>
    </div>

</body>
</html>