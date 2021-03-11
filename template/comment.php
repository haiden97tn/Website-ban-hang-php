<?php 
    //session_start();
    include_once("./database/db2.php");

    $id = null;
    $prod_id = null;
$view = 1;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach (selectDb("SELECT * FROM products WHERE id_products = '$id'") as $row11) {
        $prod_id  = $row11['id_products'];
        $view += $row11['view'];
        action("UPDATE products SET view='$view' WHERE id_products = '$id'");
    }
} 
if (isset($_SESSION['user']) && isset($_POST['gui_cm'])) {
    $user1 = $_SESSION['user'];
    $content = $_POST['comment'];
    foreach (selectDb("SELECT * FROM user WHERE user = '$user1'") as $row12) {
        $id_user = $row12['user'];
    }
    action("INSERT INTO comments (content,user,id_products) VALUES ('$content','$id_user','$prod_id')");

} elseif (isset($_SESSION['admin']) && isset($_POST['gui_cm'])) {
    $user2 = $_SESSION['admin'];
    $content = $_POST['comment'];
    foreach (selectDb("SELECT user FROM user WHERE user = '$user2'") as $row13) {
        $id_user = $row13['user'];
    }
    action("INSERT INTO comments (content,user,id_products) VALUES ('$content','$id_user','$prod_id')");
} elseif (!isset($_SESSION['user']) && isset($_POST['gui_cm'])) {
    echo "<script>alert('Vui lòng đăng nhập trước khi bình luận!')</script>";
}

    ?>

    <!-- comment -->
        <div class="comment">
            <div class="comments">
                <h3>Bình Luận</h3>
                <hr class="ke-dong">
                <?php
                foreach (selectDb("SELECT * FROM comments WHERE id_products = '$id' ORDER BY id_comments DESC limit 4") as $row14) {
                    $id_user = $row14['user'];
                    foreach (selectDb("SELECT * FROM user WHERE user = '$id_user'") as $tow1) { ?>
                    <div class="comment-user">
                        <div class="fn-user">
                            <p class="name"><?= $row14['user'] ?>:</p>
                            <p class="cm"><?= $row14['content'] ?></p>
                        </div>
                        <p class="create"><?= $row14['create_at'] ?></p>
                    </div>  
                    
                <?php
                    }
                }
                ?> 
                <form action="" method="POST">
                    <input type="text" name="comment" id="comment" class="form-control" placeholder="Comments...">
                    <button type="submit" name="gui_cm" id="gui_cm" class="btn btn-primary">Gửi</button>
                </form>
            </div>
            <div class="advertisement">
                <img src="images/the-gioi-di-dong-quang-cao-banner-1.jpg" alt="">
            </div>

    </div>
<!-- end comment -->


