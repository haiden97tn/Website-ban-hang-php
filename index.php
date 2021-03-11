<?php
session_start();
    $pages=isset($_GET['pages'])?$_GET['pages']:"";

	switch ($pages) {
		case '':
			include_once 'home.php';
			break;
		case 'chitiet':
            include_once "chitietsp.php";			
            break;
        case 'cate':
            include_once "category.php";
            break;
        case 'login':
            include_once "login.php";
        break;
        case 'search':
            include_once "search.php";
        break;
        case 'hotro':
            include_once "hotro.php";
        break;
        case 'tintuc':
            include_once "tintuc.php";
        break;
        case 'cart':
            include_once "cart.php";
        break;
        case 'chitiet-tt':
            include_once "chi-tiet-tin-tuc.php";
        break;
        case 'thanh-toan':
            include_once "thanh-toan.php";
        break;
        default:
        # code...
        break;
    }
?>
