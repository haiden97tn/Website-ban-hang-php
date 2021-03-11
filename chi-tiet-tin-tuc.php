<?php
    include "admin/funcAdmin.php";

    $id = $_GET['id'];

    $sql7 = "select * from news where id = '$id' ";
    $result7 = mysqli_query($con,$sql7);

    $sql8 = "select * from news ORDER BY id DESC limit 1";
    $result8 = mysqli_query($con,$sql8);

    $sql9 = "select * from news limit 5  ";
    $result9 = mysqli_query($con,$sql9);

    $sql10 = "select * from news ORDER BY RAND() limit 4";
    $result10 = mysqli_query($con,$sql10);

    $sql11 = "select * from products limit 5";
    $result11 = mysqli_query($con,$sql11);

    $sql12 = "select * from news limit 4";
    $result12 = mysqli_query($con,$sql12);

    $sql13 = "select * from products limit 5";
    $result13 = mysqli_query($con,$sql13);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tin tức</title>
    <link rel="stylesheet" href="css/chi-tiet-tin-tuc.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container">
        <div class="nav">
            <?php
                require_once('template/header.php');
            ?>
        </div>
        <h4><a href="index.php?pages=tintuc">Quay lại</a> </h4>
        <div class="article">
            <div class="article1">
                <?php while ($rows = mysqli_fetch_array($result7)) {
                ?>
                <div class="article11">
                    <a href="?pages=tintuc&id=<?php echo $rows['id']?>"><h1><?php echo $rows['title']; ?></h1></a>
                    <img alt="" src="admin/upload1/<?php echo $rows['images'];  ?>" style="width:90%">
                    <p><?php echo $rows['content']; ?></p>
                    <p><?php echo $rows['create_at']; ?></p>
                </div>
                <?php } ?>
            </div>
            <div class="articles">
                <div class="article2">
                    <h3>Xem nhiều</h3>
                    <hr style="margin: 0 5%">
                    <ol>
                    <?php while ($rows = mysqli_fetch_array($result12)) {
                    ?>
                        <li><a href="?pages=chitiet-tt&id=<?php echo $rows['id']?>"><?php  echo $rows['title']  ?></a></li>
                    <?php } ?>
                    </ol>
                </div>
                    <div class="article4">
                        <h3>Sản phẩm mới nhất</h3>
                        <hr>
                        <?php while ($rows = mysqli_fetch_array($result13)) {
                        ?>
                        <div class="article4s">
                            <img alt="" src="admin/upload1/<?php echo $rows['images'];  ?>" width="100%" >
                            <a href="?pages=chitiet&id=<?php echo $rows['id_products']?>"><?php echo $rows['name_products']; ?></a>
                        </div>
                        <?php } ?>
                </div>
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