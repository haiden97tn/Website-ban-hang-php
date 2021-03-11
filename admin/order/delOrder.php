<?php 
     require_once 'funcAdmin.php';
     $sqls = "delete from `order_details` where id_order = '$_GET[id]'";
     mysqli_query($con,$sqls);
	 $sql = "delete from `order` where id_order = '$_GET[id]'";
	 mysqli_query($con,$sql);
	 header('location:?page=order');
 ?>