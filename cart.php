
<?php
    @session_start();
    include "admin/funcAdmin.php";
    //print_r( $_SESSION['cart']);
    if(!isset($_SESSION['user'])){
        echo '<script language="javascript">';
        echo 'alert("Bạn cần đăng nhập để có thể mua hàng")';
        echo '</script>';
        header("Location:login.php");die;
    }
    
    
        //thong tin user
        $id_user = $_SESSION['user'];
        $sql1 = "select * from user where user = '$id_user' ";
        $result1 = mysqli_query($con,$sql1);


        //xoa san pham 
        if(isset($_GET['id'])){
            unset(  $_SESSION['cart'][$_GET['id']]);
            header('Location:cart.php');die;
        }  
        
        //san pham lien quan
        $sql5 = "select * from products  ORDER BY view DESC limit 4";
        $result5 = mysqli_query($con,$sql5);

        //session cua san pham
        // if(empty($_SESSION['cart'])){
        //     header('Location:index.php');
        // }
        @$list_id = array_keys($_SESSION['cart']);
        @$list_id = implode(',',$list_id);
        $sql = "SELECT * FROM products WHERE id_products IN ($list_id) ";
        $result = mysqli_query($con,$sql);

        $sql7 = "SELECT * FROM products WHERE id_products IN ($list_id) ";
        $result7 = mysqli_query($con,$sql7);

        //$tongtien=0;

        //cap nhat lai thong tin khach
        if(isset($_POST['btn_update'])){
            $ho_ten = $_POST['ho_ten'];
            $user_address = $_POST['user_address'];
            $user_phone = $_POST['user_phone'];
            $email = $_POST['email'];

            $sql2 = "update user set ho_ten = '$ho_ten', user_address = '$user_address', user_phone = '$user_phone', email = '$email' where user = '$id_user' ";
            mysqli_query($con,$sql2);

        }
        //thong tin thanh toan 
    if(isset($_POST['btn_tt'])){
        $user = $_SESSION['user'];
        $amount = count($_SESSION['cart']);   
        $totalProducts = $_SESSION['cart'];
      
        $sql3 = "insert into `order`(user,amount,codes,total) values('$user','$amount','$_SESSION[codes]','$_SESSION[tongtien]')";
        mysqli_query($con,$sql3); 

        //laasy duw lieu tu bang order
        $sql6 = "select * from `order` WHERE user = '$user'";
        $result6 = mysqli_query($con,$sql6);
        $data = mysqli_fetch_all($result6);
        //vi tri product
        $index = $data[count($data) - 1];
        foreach($totalProducts as $key => $quantity)
        {
             $fetchData = "SELECT * FROM products WHERE id_products = '$key'";
             $data1 = mysqli_query($con,$fetchData);
             $data1 = mysqli_fetch_all($data1);
             $idProduct = $data1[0][0];
             $price = $data1[0][3];
             $insertToDetail_order = "INSERT INTO order_details(id_products,id_order,price,quantity) VALUES('$idProduct','$index[0]','$price','$quantity')";
             mysqli_query($con,$insertToDetail_order);
             
        }
        unset($_SESSION['cart']);
        header("location:?pages=thanh-toan");die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.4.js"></script>
    <link rel="stylesheet" href="https://fontawesome.com/v4.7.0/icons/">
  <style>
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
        .containers{
            
        }
        .cart{
            height:auto;
        }
        .cart .form-khach{
            height:auto;
            margin-left:25%;
            width:500px;
            height:400px;
        }
        .form-khach{
            background-color:white;
            text-align:center; 
        }
        .form-khach input{
            width:90%;
            border:none;
        }
        #error{
            text-align:center;
            width:100%;
        }
  </style>
</head>
<body>
    <div class="containers">
        <div class="nav">
            <?php include_once ("template/header.php"); ?>
        </div>
  
        <h1 style="text-align: center; color:orangered">Giỏ Hàng Của Bạn</h1>
        <div id="error" >
            <?php
                $ok=1;
                if(isset($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $k=>$v){
                        if(isset($k)){
                            $ok=2;
                        }
                    }
                }
                if($ok!=2){
                    echo 'Bạn không có món hàng nào trong giỏ hàng';
                }else{
                    $items = $_SESSION['cart'];
                    echo 'Bạn đang có <a href="cart.php"></a> '.count($items).' món hàng trong giỏ hàng';
                }
            ?>
        </div>
        <div class="cart">
            <div class="cart-product">
                <form action="">
                    <div class="container">
                    <table id="cart" class="table table-hover table-condensed"> 
                    <thead> 
                    <tr> 
                        <th style="width:50%">Tên sản phẩm</th> 
                        <th style="width:10%">Giá</th> 
                        <th style="width:8%">Số lượng</th> 
                        <th style="width:22%" class="text-center">Thành tiền</th> 
                        <th style="width:10%"> </th> 
                    </tr> 
                    </thead> 
                    <tbody>

              
                    <?php $tongtien=0; while (@$rows = mysqli_fetch_array($result)) {
                    ?>
                    <tr> 
                        <td data-th="Product"> 
                            <a href="?pages=chitiet&id=<?php echo $rows['id_products']?>">
                                    <div class="row"> 
                                    <div class="col-sm-2 hidden-xs"><img alt="" src="admin/upload1/<?php echo $rows['images'];  ?>" class="img-responsive" width="100" >
                                    </div> 
                                    <div class="col-sm-10"> 
                                    <h4 class="nomargin"><?php echo $rows['name_products'];  ?></h4> 
                                    </div> 
                                    </div> 
                                </a>
                        </td> 
                        <td data-th="Price"><?php  if($rows['sale']==0){
                                    echo number_format($rows['price']) ." VNĐ";
                                }else{
                                    echo number_format($rows['sale']) ." VNĐ";
                                } ?></td> 
                        <td data-th="Quantity"><input min=1 class="form-control text-center" value="<?php echo $_SESSION['cart'][$rows['id_products']]; ?>" type="number">
                        </td> 
                        <td data-th="Subtotal" class="text-center">
                            <?php 
                                $giasp =0; 
                                if($rows['sale']==0){
                                    $giasp =$rows['price']*$_SESSION['cart'][$rows['id_products']]; echo number_format($giasp);
                                }else{
                                    $giasp =$rows['sale']*$_SESSION['cart'][$rows['id_products']]; echo number_format($giasp);
                                }  ?> VNĐ</td> 
                        <td class="actions" data-th="">
                            <form action="" method="POST">
                                <!-- <button name="btn_xoa" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i>Xóa -->
                                <a onclick="return window.confirm('Bạn muốn xóa không');" name="" href="index.php?pages=cart&id=<?php echo $rows['id_products']; ?> " class="" style='background:none;border:none'><img src="images/x-mark.png" alt="" style="width:20%;margin-top:-2%"></a>
                            </form>
                            </button>
                        </td>
                    </tr> 
                    <?php $tongtien += $giasp; } ?>
                    </tbody>
                    <tr>
                        <td colspan="3" class="hidden-xs"> </td> 
                        <td colspan="3">
                        <form action="" method="post" >
                            <label for="">Mã Giảm Giá:</label>
                            <input type="text" name="code"  >
                            <button type="sudmit" name="btn_code">Sử dụng</button>
                        </form>
                    
                    <?php
                        if(isset($_POST['btn_code'])){
                            $code= $_POST['code'];
                            $check = "SELECT * FROM discount_code WHERE code = '$code' ";
                        
                            $sql8 = "select * from discount_code WHERE code = '$code' ";
                            $result8 = mysqli_query($con,$sql8);
                            while( $rows8 = mysqli_fetch_array($result8)){
                                $discount = $rows8['discount'];
                                $codes = $rows8['code'];
                                $_SESSION['codes']=$codes;
                            }
                        
                            if($check=@$discount){
                                $tienGiamGia = number_format(($tongtien*$discount)/100);
                                @$tongtien = $tongtien - (($tongtien*$discount)/100);
                                echo "<p style='color:red'>Bạn đã sử dụng mã:  $codes</p>";
                                echo "<p style='color:red'>Đã được trừ: - $tienGiamGia VND</p>";
                            }else{
                                echo "<p style='color:red'>Mã giảm giá không hợp lệ:</p>";
                            }
                           
                        }
                    ?>
                    </td>
                    </tr>
                   
                    <tfoot> 


                    <tr> 
                        <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                        </td> 
                        <td colspan="2" class="hidden-xs"> </td> 
                        
                        <td class="hidden-xs text-center"><strong style="color:blue; font-size:120%">Tổng tiền: <?php $_SESSION['tongtien'] = $tongtien; echo number_format($_SESSION['tongtien']); ?> VNĐ</strong>
                        </td> 
                        <form action="" method="POST">
                            <!-- <td><a href="" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a></td> -->
                            <td><button name="btn_tt" class="btn fs-tgop" style="background:red; color: white; "> Thanh toán</button></td>
                        </form>
                    </tr> 
                    <tr>
                        <td width=50% ></td>
                        <td width=10%></td>
                        <td width=5%></td>
                        <td width=10%></td>
                    </tr>
                    
                    </tfoot> 
                    </table>
                    <form action="" method="POST">
                        <table class="form-khach" border="1" >
                        <?php while( $rows1 = mysqli_fetch_array($result1)){
                        ?>
                            <tr>
                                <td colspan=2><h3>Thông tin khách hàng</h3></td>
                            </tr>
                            <tr>
                                <td>Tên khách hàng</td>
                                <td><input style="padding:7px" type="text" name="ho_ten" value="<?php echo $rows1['ho_ten'] ?>" placeholder="Nhập họ tên"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input style="padding:7px" type="text" name="user_address" value="<?php echo $rows1['user_address'] ?>" placeholder="Nhập địa chỉ"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input style="padding:7px" type="text" name="user_phone" value="<?php echo $rows1['user_phone'] ?>" placeholder="Nhập số điện thoại"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input style="padding:7px" type="text" name="email" value="<?php echo $rows1['email'] ?>"></td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <button><a href="logout.php">Thay đổi tài khoản</a> </button>
                                    <button name="btn_update" >Cập nhật </button>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                        </table>
                    </form>
                    </div>
                </form>    
            </div>
        </div>

        <div class="product-hot" style="background-color:white">
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
    <div class="footer">
        <?php include_once('template/footer.php'); ?>
    </div>
    </div>
    
</body>
</html>
<?php
    $_SESSION['tongtien'];
?>

