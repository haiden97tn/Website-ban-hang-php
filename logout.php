<?php
session_start();
if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	unset($_SESSION['cart']);
	header("Location:index.php");
} elseif (isset($_SESSION['admin'])) {
	unset($_SESSION['admin']);
	header("Location:index.php");
}
?>