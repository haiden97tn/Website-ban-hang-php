<?php 
	ob_start();
	@session_start();
	if(!isset($_SESSION['admin'])){
		header("location:../index.php");
	}
	require_once 'template/head.php';
	require_once 'template/sidebar.php';
	require_once 'template/header.php';

	$page=isset($_GET['page'])?$_GET['page']:"";

	switch ($page) {
		case '':
			include_once 'home.php';
			break;
		case 'cate':
			$action=isset($_GET['action'])?$_GET['action']:'';
			switch ($action) {
				case '':
					include_once "category/showCate.php";
					break;
				case 'add':
					include_once "category/addCate.php";
					break;
				case 'update':
					include_once "category/updateCate.php";	
					break;
				case 'del':					
					include_once "category/delCate.php";				
					break;		
				default:
					# code...
					break;
			}				
			break;
		case 'product':
			$action=isset($_GET['action'])?$_GET['action']:'';
			switch ($action) {
				case '':
					include_once "products/showProduct.php";
					break;
				case 'add':
					include_once "products/addProduct.php";
					break;
				case 'detail':					
					include_once "products/showDetails.php";				
					break;
				case 'update':
					include_once "products/updateProduct.php";	
					break;
				case 'del':					
					include_once "products/delProducts.php";				
					break;		
				default:
					# code...
					break;
			}				
			break;
			case 'slider':
				$action=isset($_GET['action'])?$_GET['action']:'';
				switch ($action) {
					case '':
						include_once "slider/showSlider.php";
						break;
					case 'add':
						include_once "slider/addSlider.php";
						break;
					case 'update':
						include_once "slider/updateSlider.php";	
						break;
					case 'del':					
						include_once "slider/delSlider.php";				
						break;		
					default:
						# code...
						break;
				}				
				break;
				case 'user':
					$action=isset($_GET['action'])?$_GET['action']:'';
					switch ($action) {
						case '':
							include_once "user/showUser.php";
							break;
						case 'update':
							include_once "user/updateUser.php";
							break;
						case 'del':					
							include_once "user/delUser.php";				
							break;		
						default:
							# code...
							break;
					}				
					break;
					case 'info':
						$action=isset($_GET['action'])?$_GET['action']:'';
						switch ($action) {
							case '':
								include_once "information/showInfo.php";
								break;
							case 'update':
								include_once "information/updateInfo.php";
								break;	
							default:
								# code...
								break;
						}				
						break;
					case 'cm':
						$action=isset($_GET['action'])?$_GET['action']:'';
						switch ($action) {
							case '':
								include_once "comment/showCM.php";
								break;
							case 'listcm':
								include_once "comment/listCM.php";
								break;
							case 'del':					
								include_once "comment/delCM.php";				
								break;
							default:
								# code...
								break;
						}				
						break;
						case 'news':
							$action=isset($_GET['action'])?$_GET['action']:'';
							switch ($action) {
								case '':
									include_once "news/showNews.php";
									break;
								case 'add':
									include_once "news/addNews.php";
									break;
								case 'content':
									include_once "news/contentNews.php";
									break;
								case 'update':
									include_once "news/updateNews.php";	
									break;
								case 'del':					
									include_once "news/delNews.php";				
									break;		
								default:
									# code...
									break;
							}				
							break;
						case 'banner':
							$action=isset($_GET['action'])?$_GET['action']:'';
							switch ($action) {
								case '':
									include_once "banner/showBanner.php";
									break;
								case 'add':
									include_once "banner/addBanner.php";
									break;
								case 'update':
									include_once "banner/updateBanner.php";	
									break;
								case 'del':					
									include_once "banner/delBanner.php";				
									break;		
								default:
									# code...
									break;
							}				
							break;		
						
						case 'support':
							$action=isset($_GET['action'])?$_GET['action']:'';
							switch ($action) {
								case '':
									include_once "support/showSupport.php";
									break;
								case 'del':
									include_once "support/delSupport.php";
									break;
								case 'phan-hoi':
									include_once "support/phan-hoi.php";
									break;	
								default:
									# code...
									break;
							}				
							break;
							case 'order':
								$action=isset($_GET['action'])?$_GET['action']:'';
								switch ($action) {
									case '':
										include_once "order/showOrder.php";
										break;
									case 'orderDetails':
										include_once "order/orderDetails.php";
										break;
									case 'del':					
										include_once "order/delOrder.php";				
										break;
									case 'xac-nhan':
										include_once "order/xac-nhan.php";
										break;		
									default:
										# code...
										break;
								}				
								break;
								case 'code':
									$action=isset($_GET['action'])?$_GET['action']:'';
									switch ($action) {
										case '':
											include_once "code/showCode.php";
											break;
										case 'add':
											include_once "code/addCode.php";
											break;
										case 'update':					
											include_once "code/updateCode.php";				
											break;
										case 'del':
											include_once "code/delCode.php";
											break;		
										default:
											# code...
											break;
									}				
									break;
		default:
			# code...
			break;
	}

	require_once 'template/footer.php';

 ?>