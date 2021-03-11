<?php
    include "admin/funcAdmin.php";
    $sql = "select * from slide";
  $result = mysqli_query($con,$sql);

    $sql4 = "select * from products";
    $result4 = mysqli_query($con,$sql4);

    $sql1 = "select * from category";
    $result1 = mysqli_query($con,$sql1);

    @$sql2 = "select * from products where id_category = '$_GET[id]'";
    $result2 = mysqli_query($con,$sql2);
    
    @$sql3 = "select name_category from category where id_category = '$_GET[id]'";
    $result3 = mysqli_query($con,$sql3);
    $row3 = mysqli_fetch_array($result3);
    //inner join category on products.id_category = category.id_category
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row3['name_category']; ?></title>
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
            width:10%;
        }
        #next{
            text-transform:uppercase;
            top:45%;
            right:-3%;
            position:absolute;
            width:10%;
        }
    </style>
    <script>
        $(document).ready(function(){
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
            },1800);
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="nav">
            <?php include_once ("template/header.php"); ?>
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
            <h3 id="phone"><?php echo $row3['name_category']; ?></h3>
            <div class="product">
            <?php
                if (isset($_GET['id'])) { ?>
                    <?php while ($row2 = mysqli_fetch_array($result2)) {
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
                <?php
                    } else { ?>
                        
                        <?php while ($row4 = mysqli_fetch_array($result4)) {
                        ?>
                            <a href="?pages=chitiet&id=<?php echo $row4['id_products']?>">
                            <div class="product-child">
                                <div class="img">
                                    <img alt="" src="admin/upload1/<?php echo $row4['images']; ?>">
                                </div>
                                <div class="badge-warning">Trả góp 0%</div>
                                <div class="product-name"><?php echo $row4['name_products']; ?></div>
                                <?php if($row4['price'] != 0){ ?>
                                    <div class="promotional-price">
                                        <?php if($row4['sale']==0){
                                            echo number_format($row4['price']) ." đ";
                                        }else{
                                            echo number_format($row4['sale']) ." đ";
                                        } ?>
                                    </div>
                                    <div class="cost">
                                        <?php if($row4['sale']!=0){
                                            echo number_format($row4['price']) ." đ";
                                        }else{
                                            echo "";
                                        } ?>
                                    </div>
                                <?php   }else{ ?>
                                    <div class="promotional-price">
                                        <?php if($row4['sale']==0){
                                            echo number_format($row4['price']) ." đ";
                                        }else{
                                            echo number_format($row4['sale']) ." đ";
                                        } ?> 
                                    </div>
                                <?php } ?>
                            </div>
                        </a>
                    <?php } ?>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="footer">
            <?php include_once('template/footer.php'); ?>
        </div>
    </div>
</body>
</html>