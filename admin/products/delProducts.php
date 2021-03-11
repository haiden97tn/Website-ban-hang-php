<?php 
	 require_once 'funcAdmin.php';
	 $sql = "delete from products where id_products = '$_GET[id]'";
	 mysqli_query($con,$sql);
	 header('location:?page=product');
 ?>