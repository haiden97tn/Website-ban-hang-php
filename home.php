<?php
    include "admin/funcAdmin.php";
    $sql = "select * from slide";
  $result = mysqli_query($con,$sql);

    $sql1 = "select * from category";
    $result1 = mysqli_query($con,$sql1);

    $sql2 = "select * from products where id_category = 18 limit 8";
    $result2 = mysqli_query($con,$sql2);

    $sql3 = "select * from products where id_category = 13 limit 4";
    $result3 = mysqli_query($con,$sql3);


    $sql4 = "select * from products ";
    $result4 = mysqli_query($con,$sql4);
    $row4 = mysqli_fetch_array($result4);
   
    $sql5 = "select * from products  ORDER BY view DESC limit 4";
    $result5 = mysqli_query($con,$sql5);

    $sql6 = "select * from information ";
    $result6 = mysqli_query($con,$sql6);
    $row6 = mysqli_fetch_array($result6);

    // quan tri bannner
    $sql7 = "select * from banner where location = 'vitri1' ";
    $result7 = mysqli_query($con,$sql7);

    $sql8 = "select * from banner where location = 'vitri2'";
    $result8 = mysqli_query($con,$sql8);

    $sql9 = "select * from banner where location = 'vitri3'";
    $result9 = mysqli_query($con,$sql9);

    $sql10 = "select * from banner where location = 'vitri4'";
    $result10 = mysqli_query($con,$sql10);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPT | Trang chủ</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.4.js"></script>
    <style >
        #slider{
            margin: 0px;
            width: 100%;
            position: relative;
        }
        .slide{
            width: 100%;
        }
        #prev{
            text-transform:uppercase;
            top:45%;
            left:5%;
            position:absolute;
            width: 10%;
        }
        #next{
            text-transform:uppercase;
            top:45%;
            right:-3%;
            position:absolute;
            width: 10%;
        }

        .product a .product-child .icon{
            width: 50%;
            display: grid;
            grid-template-columns:  10% 30% 60%;
            margin-top: -6%;
            margin-left: 10%;
        }
        .product a .product-child .icon .view{
            font-size: 80%;
            margin-top: 3%;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('#1').show();
            var stt = 0;
            starImg = $("img.slide:first").attr("stt");
            endImg = $("img.slide:last").attr("stt");
            $("img.slide").each(function(){
                if($(this).is(':visible'))
                    stt = $(this).attr("stt");
            });
            $("#next").click(function(){
                if(stt == endImg){
                    stt = -1;
                }
                next = ++stt;
                $("img.slide").hide();
                $("img.slide").eq(next).show();
            });
            $("#prev").click(function(){
                if(stt==0){
                    stt=endImg;
                    prev = stt++;
                }
                prev = --stt;
                $("img.slide").hide();
                $("img.slide").eq(prev).show();
            });
            setInterval(function(){
                $("#next").click();
            },3900);
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="nav"  id="main-menu-tto">
            <?php include_once ("template/header.php"); ?>
         </div>
         <div class="banner">
            <?php include_once ("template/banner.php"); ?>
         </div>
        <div class="product-portfolio">
            <?php while ($rows = mysqli_fetch_array($result1)) {
                ?>
                    <a href="?pages=cate&id=<?php echo $rows['id_category']?>">
                    <div class="portfolio">
                        <div class="img">
                            <img alt="" src="admin/upload1/<?php echo $rows['images']; ?>">
                        </div>
                        <div class="name">
                            <p><?php echo $rows['name_category']; ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>

        <div class="product-hot">
            <div class="title">
                <img src="images/fire.png" alt="">
                <h3>SẢN PHẨM NỔI BẬT:</h3>
            </div>
            <div class="product">
                <?php while ($row5 = mysqli_fetch_array($result5)) {
                    ?>
                        <a href="?pages=chitiet&id=<?php echo $row5['id_products']?>">
                        <div class="product-child">
                            <div class="img">
                                <img alt="" src="admin/upload1/<?php echo $row5['images']; ?>">
                            </div>
                            <div class="badge-warning">Trả góp 0%</div>
                            <div class="product-name"><?php echo $row5['name_products']; ?></div>
                            <?php if($row5['price'] != 0){ ?>
                                    <div class="promotional-price">
                                        <?php if($row5['sale']==0){
                                            echo number_format($row5['price']) ." đ";
                                        }else{
                                            echo number_format($row5['sale']) ." đ";
                                        } ?>
                                    </div>
                                    <div class="cost">
                                        <?php if($row5['sale']!=0){
                                            echo number_format($row5['price']) ." đ";
                                        }else{
                                            echo "";
                                        } ?>
                                    </div>
                                <?php   }else{ ?>
                                    <div class="promotional-price">
                                        <?php if($row5['sale']==0){
                                            echo number_format($row5['price']) ." đ";
                                        }else{
                                            echo number_format($row5['sale']) ." đ";
                                        } ?> 
                                    </div>
                                <?php } ?>
                            <div class="icon">
                                <div class="img"><img src="images/iconmat.png" alt=""></div>
                                <div class="view"><?php echo $row5['view']; ?></div>
                                <div></div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
<!-- -------- -->
        <?php while ($row7 = mysqli_fetch_array($result7)) {
        ?>
        <div class="picture">
            <a href="<?php echo $row7['link']; ?>"><img alt="" src="admin/upload1/<?php echo $row7['images']; ?>"   ></a>
        </div>
        <?php } ?>
 <!-- -------- -->
        <div class="product-hot">
            <h3 id="phone">ĐIỆN THOẠI NỔI BẬT:</h3>
            <div class="product">
            <?php while ($row1 = mysqli_fetch_array($result2)) {
                ?>
                    <a href="?pages=chitiet&id=<?php echo $row1['id_products']?>">
                    <div class="product-child">
                        <div class="img">
                            <img alt="" src="admin/upload1/<?php echo $row1['images']; ?>">
                        </div>
                        <div class="badge-warning">Trả góp 0%</div>
                        <div class="product-name"><?php echo $row1['name_products']; ?></div>
                        <?php if($row1['price'] != 0){ ?>
                            <div class="promotional-price">
                                <?php if($row1['sale']==0){
                                    echo number_format($row1['price']) ." đ";
                                }else{
                                    echo number_format($row1['sale']) ." đ";
                                } ?>
                            </div>
                            <div class="cost">
                                <?php if($row1['sale']!=0){
                                    echo number_format($row1['price']) ." đ";
                                }else{
                                    echo "";
                                } ?>
                            </div>
                        <?php   }else{ ?>
                            <div class="promotional-price">
                                <?php if($row1['sale']==0){
                                    echo number_format($row1['price']) ." đ";
                                }else{
                                    echo number_format($row1['sale']) ." đ";
                                } ?> 
                            </div>
                        <?php } ?>
                    </div>
                </a>
            <?php } ?>
            </div>
        </div>
<!-- -------- -->
<?php while ($row8 = mysqli_fetch_array($result8)) {
        ?>
        <div class="picture">
            <a href="<?php echo $row8['link']; ?>"><img alt="" src="admin/upload1/<?php echo $row8['images']; ?>"   ></a>
        </div>
        <?php } ?>
 <!-- -------- -->
        <div class="product-hot">
            <h3 id="labtop">LABTOP MỚI NHẤT:</h3>
            <div class="product">
            <?php while ($row2 = mysqli_fetch_array($result3)) {
                ?>
                    <a href="?pages=chitiet&id=<?php echo $row2['id_products']?>">
                    <div class="product-child">
                        <div class="img">
                            <img alt="" src="admin/upload1/<?php echo $row2['images']; ?>">
                        </div>
                        <div class="badge-warning">Trả góp 0%</div>
                        <div class="product-name"><?php echo $row2['name_products']; ?></div>
                        <?php if($row2['price'] != 0){ ?>
                            <div class="promotional-price">
                                <?php if($row2['sale']==0){
                                    echo number_format($row2['price']) ." đ";
                                }else{
                                    echo number_format($row2['sale']) ." đ";
                                } ?>
                            </div>
                            <div class="cost">
                                <?php if($row2['sale']!=0){
                                    echo number_format($row2['price']) ." đ";
                                }else{
                                    echo "";
                                } ?>
                            </div>
                        <?php   }else{ ?>
                            <div class="promotional-price">
                                <?php if($row2['sale']==0){
                                    echo number_format($row2['price']) ." đ";
                                }else{
                                    echo number_format($row2['sale']) ." đ";
                                } ?> 
                            </div>
                        <?php } ?>
                    </div>
                </a>
            <?php } ?>
            </div>
        </div>
        <div class="bn-picture">
            <?php while ($row9 = mysqli_fetch_array($result9)) {
            ?>
                <a href="<?php echo $row9['link']; ?>"><div><img alt="" src="admin/upload1/<?php echo $row9['images']; ?>"></div></a>
            <?php } ?>
            <?php while ($row10 = mysqli_fetch_array($result10)) {
            ?>
                <a href="<?php echo $row10['link']; ?>"><div><img alt="" src="admin/upload1/<?php echo $row10['images']; ?>"></div></a>
            <?php } ?>
        </div>
        <div class="footer">
            <?php include_once('template/footer.php'); ?>
        </div>
    </div>
</body>
</html>

