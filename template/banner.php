
<div id="slider">
    <?php while ($row = mysqli_fetch_array($result)) {
    ?>
        <a href="<?php echo $row['link']; ?>"><img id = "<?php echo $row['stt']; ?>" class="slide" src="admin/upload1/<?php echo $row['images']; ?>"  stt="<?php echo $row['stt']; ?>"  style="display: none"/></a>
    <?php } ?>
        <a href="#" id="prev" ><img src="images/Vector3.png"></a>
        <a href="#" id="next"><img src="images/Vector2.png"></a>
    </div>
    <div class="banner-child">
        <img src="images/banner/Banner-fpt.png" alt="">
    <img src="images/banner/truyen-hinh-fpt-banner.jpg" alt="">
</div>


