<?php 
	 require_once 'funcAdmin.php';
	 $sql = "delete from slide where id_slide = '$_GET[id]'";
	 mysqli_query($con,$sql);
	 header('location:?page=slider');
 ?>