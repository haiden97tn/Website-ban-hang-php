<?php 
	 require_once 'funcAdmin.php';
	 $sql = "delete from news where id = '$_GET[id]'";
	 mysqli_query($con,$sql);
	 header('location:?page=news');
 ?>