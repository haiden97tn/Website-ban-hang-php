<?php
    @session_start();
    include "admin/funcAdmin.php";
    //print_r( $_SESSION['cart']);
    if(!isset($_SESSION['user'])){
        echo '<script language="javascript">';
        echo 'alert("Bạn cần đăng nhập để có thể mua hàng")';
        echo '</script>';
        header("Location:login.php");
    }
    //echo $user = $_SESSION['user'];
    $sql = "SELECT * FROM `order` WHERE user = '$_SESSION[user]' ";
    $result = mysqli_query($con,$sql);
    while($rows = mysqli_fetch_array($result)){
        $id_order = $rows['id_order'];
        $total = $rows['total'];
        $date_set = $rows['date_set'];
        
    }

    $sql1 = "SELECT * FROM user WHERE user = '$_SESSION[user]' ";
    $result1 = mysqli_query($con,$sql1);
    while($rows1 = mysqli_fetch_array($result1)){
        $ho_ten = $rows1['ho_ten'];
        $user_address = $rows1['user_address'];
    
    }

    $sql2 = "SELECT * FROM order_details WHERE id_order = '$id_order' ";
    $result2 = mysqli_query($con,$sql2);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận thanh toán</title>
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
        .containers{
            height:auto;
        }
        .containers .form-khach{
            height:auto;
            margin-left:32%;
            width:500px;
            height:400px;
        }
        .form-khach{
            background-color:white;
            text-align:center; 
        }
    </style>
</head>
<body>
    <div class="containers">
        <div class="nav">
            <?php include_once ("template/header.php"); ?>
        </div>
  
        <h2 style="text-align: center; color:orangered; padding:20px;">Qúy khách đã đặt hàng thành công</h2>
        
        <table border=1 class="form-khach" >
            <tr>
                <td colspan=2><h2>Chi tiết hóa đơn</h2></td>
            </tr>
            <tr>
                <td>Mã đơn hàng</td>
                <td><?php echo $id_order; ?></td>
            </tr>
            <tr>
                <td>Tên khách hàng</td>
                <td><?php echo $ho_ten; ?></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><?php echo $user_address ?></td>
            </tr>
            <?php
                while($rows2 = mysqli_fetch_array($result2)){
                    $id_products = $rows2['id_products'];  
                    $sql3 = "SELECT * FROM products WHERE id_products='$id_products' ";
                    $result3 = mysqli_query($con,$sql3);
                    while($rows3 = mysqli_fetch_array($result3)){
            ?>
            <tr>
                <td>Sản phẩm đã mua</td>
                <td>
                    <?php             
                        echo $rows3['name_products'].'</br>';
                        if($rows3['sale']==0){
                            echo "Giá:". number_format($rows3['price']) ." VNĐ</br>";
                        }else{
                            echo "Giá:". number_format($rows3['sale']) ." VNĐ</br>";
                        }
                        
                        echo 'Số lượng: '.$rows2['quantity'].'</br>'; 
                    ?>
                </td>
            </tr>
            <?php 
                    }   
                }
            ?>
            <tr>
                <td>Ngày đặt hàng</td>
                <td><?php echo $date_set; ?></td>
            </tr>
            <tr>
                <td>Tổng tiền</td>
                <td><b><?php echo number_format($total);  ?> VND</b></td>
            </tr>
        </table>

        <div class="footer">
            <?php include_once('template/footer.php'); ?>
        </div>
    </div>
    
</body>
</html>