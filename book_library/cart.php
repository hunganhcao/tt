<?php
		session_start();
		ob_start();
		if(!isset($_SESSION['cart'])) $_SESSION['cart']=[];
		if(isset($_GET['delid'])&&($_GET['delid']>=0)){
			array_splice($_SESSION['cart'],$_GET['delid'],1);
		}
		//lấy dữ liệu từ form	
		if(isset($_POST['addcart'])&&($_POST['addcart'])){
			$img = $_POST['img'];
			$tensp = $_POST['tensp'];
			$price = $_POST['price'];
			$soluong = $_POST['soluong'];
			
			$fl = 0;// biến kiểm tra sản phẩm có trùng hay ko
			// kiem tra sp co trong gio hang khong
			for($i = 0; $i< sizeof($_SESSION['cart']); $i++){
				if($_SESSION['cart'][$i][1] == $tensp){
					$fl =1;
					$soluongnew = $soluong+$_SESSION['cart'][$i][3];
					$_SESSION['cart'][$i][3] = $soluongnew;
					break;
				}
			}


			// khởi tạo mảng trước khi đưa vào giỏ hàng và nếu sp không trùng thì thêm mới 
			if($fl == 0){
			$item =[$img,$tensp,$price,$soluong];
			
			$_SESSION['cart'][]=$item;
			//var_dump($_SESSION['cart']);
		}
		}
		function showcart(){
			if(isset($_SESSION['cart'])&& (is_array($_SESSION['cart']))){
				$tong = 0;
				for($i = 0; $i< sizeof($_SESSION['cart']); $i++){
					$tt = (int)$_SESSION['cart'][$i][2] * (int)$_SESSION['cart'][$i][3];
					$tong += $tt; 
					echo '<tr>
					<td> '.($i+1).'</td>
					<td class="product-col">
						<div class="product">
							<figure class="product-media">
								<a href="#">
									<img src="images/books/' . $_SESSION['cart'][$i][0] . '"  style="width:100px; height: 110px;" alt="Product image">
								</a>
							</figure>

							<h3 class="product-title">
								<a href="#">'. $_SESSION['cart'][$i][1].'</a>
							</h3><!-- End .product-title -->
						</div><!-- End .product -->
					</td>
					<td class="price-col">'. $_SESSION['cart'][$i][2].'</td>
					<td >'.$_SESSION['cart'][$i][3].'</td>
					<td class="total-col">'.$tt.'</td>
					<td >
					 <a href="cart.php?delid='.$i.'">Xoa</a>
					</td>
				</tr>';
				}
				echo '<tr >
							<th colspan = "4">Total:</th>
							<th>'.$tong.'</th>
						</tr>';
			}
		}
		?>
<!DOCTYPE html>
<html lang="en">


<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->


<body>
    <?php
	include(__DIR__."/header.php");
	?>

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
							
									<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>STT</th>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th>Dellete</th>
										</tr>
									</thead>
								
										<?php
										
											showcart();

										?>
										<!--<tbody>
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="images/books/' . $hinh . '"  style="width:200px; height: 300px;" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="#">Beige knitted elastic runner shoes</a>
													</h3>
												</div>
											</td>
											<td class="price-col">'.$price.'</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                </div>
                                            </td>
											<td class="total-col">$84.00</td>
											<td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
										</tr>
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="assets/images/products/table/product-2.jpg" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="#">Blue utility pinafore denim dress</a>
													</h3><
												</div>
											</td>
											<td class="price-col">$76.00</td>
											<td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                </div>                              
                                            </td>
											<td class="total-col">$76.00</td>
											<td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
										</tr> -->
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
									<a href="index.php" class="btn btn-outline-dark-2"><span>Continue shopping</span><i class="icon-refresh"></i></a>
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title"></h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						

	                						
	                						

	                						

	                						<tr class="summary-shipping-estimate">
	                							<td> <a href="dashboard.html">Checkout</a></td>
	                						
	                						</tr><!-- End .summary-shipping-estimate -->

	                						
	                					</tbody>
	                				</table><!-- End .table table-summary -->
									
									
									
							
	                			
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <?php
		include(__DIR__."/footer.php");
		?>
    
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->
</html>