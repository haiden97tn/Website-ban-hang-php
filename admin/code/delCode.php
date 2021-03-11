<?php 
	 require_once 'funcAdmin.php';
	 $sql = "delete from discount_code where id = '$_GET[id]'";
	 mysqli_query($con,$sql);
	 header('location:?page=code');
 ?>