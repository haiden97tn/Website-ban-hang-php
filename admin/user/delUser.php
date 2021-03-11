<?php 
	 require_once 'funcAdmin.php';
	 $sql = "delete from user where user = '$_GET[id]'";
	 mysqli_query($con,$sql);
	 header('location:?page=user');
 ?>