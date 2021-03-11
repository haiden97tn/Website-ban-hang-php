<?php 
   $host = "localhost";
   $user = "root";
   $password = "";
   $db = "du_an_1";
   $conn = null;
   try {
       $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$password);
   } catch (PDOException $e) {
       echo $e->getMessage();
   }
  
?>