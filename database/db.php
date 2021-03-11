<?php 
	try {
		//$conn=new PDO("mysql:host=localhost;dbname=du_an_mau;charset=utf8","root","");
		$hostname = "localhost";
		$user = "root";
		$pass = "";
		$db = "du_an_1";

		$con = mysqli_connect($hostname,$user,$pass,$db);
		mysqli_query($con,$db);
		mysqli_set_charset($con,"utf8");
		
	} catch (PDOException $e) {
		echo "Lỗi kết nối";
	}
 ?>