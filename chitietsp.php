<?php
    @session_start();
    include "admin/funcAdmin.php";

    $id_products = $_GET['id'];

    // $id_user = $_SESSION['user'];

    $sql = "select * from products where id_products = '$_GET[id]'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $sql1 = "select * from products where id_category = (select id_category from products where id_products = '$_GET[id]'  ) ORDER BY RAND() limit 4" ;
    $result1 = mysqli_query($con,$sql1);

    try{
        $conn = new PDO("mysql:host=localhost;dbname=du_an_1;charset=utf8","root","");
    }catch(PDOException $e){
        echo "loi ket noi";
    }
    function selectOne($sql){
        $kq = $GLOBALS['conn']->query($sql);
        return $kq->fetch();
    }
    function execSQL($sql){
        $kq = $GLOBALS['conn']->prepare($sql);
        return $kq->execute();
    }
    function oneProduct($id_sp){
        $sql = "select * from products where id_products='$id_sp' ";
        return selectOne($sql);
    }
    function updateView($id_sp,$view_sp){
        $sql = "update products set view='$view_sp' where id_products='$id_sp' ";
        return execSQL($sql);
    }
    
    if(isset($_GET['id'])){
        $id_sp = $_GET['id'];
        $result = oneProduct($id_sp);
        //$result['view']++;
        $view_sp = $result['view']++;
        $rows = updateView($id_sp,$view_sp);
        $result['view'];
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['name_products']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/chitietsp.css">

</head>
<body>
    <div class="container">
        <div class="nav">
            <?php include_once ("template/header.php"); ?>
         </div>
        <div class="dtbox">
            <div class="pdname"><?php echo $row['name_products']; ?></div>
            <div class="dtbott">
                <div class="dtimg">
                    <img alt="" src="admin/upload1/<?php echo $row['images']; ?>">
                </div>
                <div class="dtinfo">
                    <div class="dtprice">
                    <?php if($row['price'] != 0){ ?>
                            <div class="new-price">
                                <?php if($row['sale']==0){
                                    echo number_format($row['price']) ." VNĐ";
                                }else{
                                    echo number_format($row['sale']) ." VNĐ";
                                } ?> 
                            </div>
                            <div class="old-price">
                                <?php  if($row['sale']!=0){
                                    echo number_format($row['price']) ." VNĐ";
                                }else{
                                    echo "";
                                } ?>
                            </div>
                        <?php   }else{ ?>
                            <div class="new-price">
                                <?php echo number_format($row['sale']) ?> VNĐ
                            </div>
                        <?php } ?>
                    </div>
                    <div class="fk-boxs">
                        <p class="fk-tit">Khuyến mại đặc biệt (SL có hạn)</p>
                        <div class="fk-main">
                            <ul>
                                <li>Trả góp 0% + 0đ thẻ tín dụng</li>
                            </ul>
                            <ul>
                                <li>Giảm ngay 5% (đã trừ vào giá)</li>
                            </ul>
                            <ul>
                                <li>Tặng PMH 100,000đ mua Đồng hồ</li>
                            </ul>
                            <p class="tkm">Ưu đãi độc quyền:</p>
                            <ul>
                                <li>Thu cũ đổi mới - Trợ giá ngay 15%</li>
                            </ul>
                        </div>
                    </div>
                    <form action="" method="post">
                        <a href="?pages=cart" class="fs-oder">MUA NGAY</a> 
                        <input type="hidden" name="id_products" value="<?=$row['id_products']?>">
                        <button name="btn_add" class="fs-tgop" style="border:1px solid blue; cursor: pointer;">Thêm giỏ hàng</button>
                    </form>
                    

                    <p class="fs-dtinoti">Gọi <strong>1800-6601</strong> để được tư vấn mua hàng (Miễn phí)</p>
                </div>
                <div class="dtckr">
                    <div class="dttop">Thông tin chi tiết</div>
                    <div class="dtbottom" style="font-size:14px;word-spacing:-1.5px;">
                        <?php echo $row['detal']; ?>
                    </div>
                </div>
            </div>
        </div>
<!-- comment -->
        <?php include_once ("template/comment.php"); ?>
<!-- end comment -->
        <div class="product-hot">
            <div class="title">
                <h3 id="nm">CÁC SẢN PHẨM LIÊN QUAN:</h3>
                <style>
                    #nm{
                        color: red;
                        margin-left: 4%;
                    }
                </style>
            </div>
            <div class="product">
            <?php while ($row1 = mysqli_fetch_array($result1)) {
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
        <div class="footer">
            <?php include_once('template/footer.php'); ?>
        </div>
    </div>
</body>
</html>
<?php 
    include "admin/funcAdmin.php";
    if(isset($_POST["btn_add"]))
    {
        if (isset($_SESSION['user'])) {
            $id = $_GET['id'];
            if(isset($_SESSION['cart'][$id])){
                $qty = $_SESSION['cart'][$id] + 1;
            }
            else{
                $qty=1;
            }
            $_SESSION['cart'][$id]=$qty;
            header("Location:cart.php");


            // if(empty($_GET['id'])){
            //     header('Location:index.php');
            // }
            // $idsp = intval($_GET['id']);
            // if($idsp<=0){
            //     header('Location:index.php');
            // }
            // if(!isset($_SESSION['cart'])){
            //     $_SESSION['cart'] = [];
            // }
            // if(!isset($_SESSION['cart'][$idsp])){
            //     $_SESSION['cart'][$idsp] = 1;

            // }else{
            //     $_SESSION['cart'][$idsp] ++;
            // }

            

            // $sql2 = "select * from user where user = '$_SESSION[user]'";

            // $result2 = mysqli_query($con,$sql2);
            // $user = mysqli_fetch_array($result2);
                
            // $sql3 = "insert into bill(email,user_phone,user_name,user_address,tinh_trang,id_user,id_products) values('$user[email]','$user[user_phone]','$user[user]','$user[user_address]','Đang xác nhận','$_SESSION[user]','$row[id_products]')";
            // mysqli_query($con,$sql3);
           
        }
        

        
    }else{
        echo "Them that bai";
    }
?>
