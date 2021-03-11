<?php 
	 require_once 'funcAdmin.php';
	 $sql = "delete from support where id_support = '$_GET[id]'";
	 mysqli_query($con,$sql);
	 header('location:?page=support');
 ?>