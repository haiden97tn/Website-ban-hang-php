<?php 
	 require_once 'funcAdmin.php';
	 $sql = "delete from banner where id = '$_GET[id]'";
	 mysqli_query($con,$sql);
	 header('location:?page=banner');
 ?>