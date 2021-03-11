<?php 
	 require_once 'funcAdmin.php';
	 $sql2 = "delete from comments where id_comments = '$_GET[id]'";
	 mysqli_query($con,$sql2);
	 header('location:?page=cm&action');
 ?>