<?php 
	//require "../database/db.php";
	$hostname = "localhost";
	$user = "root";
	$pass = "";
	$db = "du_an_1";
	$con = mysqli_connect($hostname,$user,$pass,$db);
	mysqli_query($con,$db);
	mysqli_set_charset($con,"utf8");
	// Xóa 1 danh mục
	/*function deleteCate($id){
		$sql="delete from category where id_category='$id'";
		return execSQL($sql);
	}
	// Xóa 1 sản phẩm
	function deleteProduct($id){
		$sql="delete from products where id_products='$id'";
		return execSQL($sql);
	}
	// Xóa 1 slider
	function deleteSlider($id){
		$sql="delete from slide where id_slide='$id'";
		return execSQL($sql);
	}

	//table product
	*/
	
 ?>