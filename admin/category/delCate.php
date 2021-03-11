<?php 
	 require_once 'funcAdmin.php';
	 $sql = "delete from category where id_category = '$_GET[id]'";
	 mysqli_query($con,$sql);
	 header('location:?page=cate');
 ?>