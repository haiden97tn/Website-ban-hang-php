
<?php
	include "database/db1.php";
    $data = 9;
    $name = null;
    if (isset($_POST['search']) && !isset($_GET['products'])) {
        $name = $_POST['name'];
        $product = 1;
        // echo $name;
    } elseif (isset($_GET['products']) && isset($_POST['search'])) {
        $name = $_POST['name'];
        $product = $_GET['products'];
    } else {
        header("Location:index.php");
    }
    $sql = "SELECT COUNT(*) FROM products WHERE name_products LIKE  '%$name%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $number = $stmt->fetchColumn();
    $page = ceil($number / $data);
    $tin = ($product - 1) * $data;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="nav">
        <?php include_once ("template/header.php"); ?>
    </div>
    <div class="product-hot">
            <h3 id="labtop">Tìm thấy <?=$number?> kết quả mong muốn:</h3>
            <div class="product">
            <?php foreach (selectDb("SELECT * FROM products WHERE name_products LIKE '%$name%' ORDER BY id_products DESC LIMIT $tin,$data") as $row) { ?>  
                    <a href="?pages=chitiet&id=<?php echo $row['id_products']?>">
                    <div class="product-child">
                        <div class="img">
                            <img alt="" src="admin/upload1/<?php echo $row['images']; ?>">
                        </div>
                        <div class="badge-warning">Trả góp 0%</div>
                        <div class="product-name"><?php echo $row['name_products']; ?></div>
                        <?php if($row['price'] != 0){ ?>
                            <div class="promotional-price">
                                <?php if($row['sale']==0){
                                    echo number_format($row['price']) ." đ";
                                }else{
                                    echo number_format($row['sale']) ." đ";
                                } ?>
                            </div>
                            <div class="cost">
                                <?php if($row['sale']!=0){
                                    echo number_format($row['price']) ." đ";
                                }else{
                                    echo "";
                                } ?>
                            </div>
                        <?php   }else{ ?>
                            <div class="promotional-price">
                                <?php if($row['sale']==0){
                                    echo number_format($row['price']) ." đ";
                                }else{
                                    echo number_format($row['sale']) ." đ";
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
</body>
</html>