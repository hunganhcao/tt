<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Book Library</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body class="tg-home tg-homeone">

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<?php
		include(__DIR__ . "/header.php");
		?>
		<!--************************************
				Header End
		*************************************-->

		<!--************************************
					Best Selling Start
			*************************************-->
		
		<section class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-sectionhead">
							<h2><span>People’s Choice</span>Bestselling Books</h2>
							<a class="tg-btn" href="products.php">View All</a>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
							<?php
							$sql = "SELECT TenSach,sanpham.SP_ID,sanpham.HinhAnh,chitietsp.GiaBan,TenTG ,TenTL,theloai.TL_ID
									 FROM sanpham  
									 join chitietsp ON sanpham.SP_ID=chitietsp.SP_ID 
									 join tacgia on sanpham.TG_ID=tacgia.TG_ID 
									 join theloai on sanpham.TL_ID=theloai.TL_ID
									 WHERE chitietsp.TapSo =1 ORDER BY TenSach ASC LIMIT 10";

							// 3. Thực thi câu truy vấn
							$result = mysqli_query($connection, $sql);

							while ($row = mysqli_fetch_array($result)) {
								$id = $row['SP_ID'];
								$name = $row['TenSach'];
								$price = $row['GiaBan'];
								$hinh = $row['HinhAnh'];
								$tg = $row['TenTG'];
								$tl = $row['TenTL'];
								$tlid = $row['TL_ID'];
								echo '<div class="item" > ';
								echo '<div class="tg-postbook">';
								echo '<figure class="tg-featureimg"><a href="productdetail.php?id=' . $id . '">';
								echo '<div class="tg-bookimg">';
								echo '<div class="tg-frontcover ">
										 <img src="images/books/' . $hinh . '"  style="width:200px; height: 300px;" class="img-fluid"></div>';
								echo '<div class="tg-backcover"><img src="images/books/' . $hinh . '" style="width: 200px; height: 150px;" class="img-fluid"></div>';
								echo '	</div>';

								echo '</a></figure>';
								echo '<div class="tg-postbookcontent">';
								echo	'<ul class="tg-bookscategories">
												<li><a href="products.php?id=' . $tlid . '">' . $tl . '</a></li>
											</ul>';
								echo '	<div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>';
								echo '<div class="tg-booktitle" >';
								echo '	<h3><a href="productdetail.php?id=' . $id . '">' . $name . '</a></h3>' .
									'</div>' .
									'<span class="tg-bookwriter">By: <a href="javascript:void(0);">' . $tg . '</a></span>' .
									'<span class="tg-stars"><span></span></span>' .
									'<span class="tg-bookprice">' .
									'<ins>' . $price . 'đ</ins>' .

									'</span>' .
									'<form action="cart.php" method="post">	
														<div class="tg-quantityholder">
															
															<input type="number" class="result" value="1" min="1" max="10" id="quantity1" name="soluong">
															
														</div>
														<div>
															<input class="tg-btn tg-active tg-btn-lg" type="submit" value="Add To Basket" name="addcart">

														</div>
												 		<div>
														 	
															<input type="hidden" value="'.$name.'" name="tensp" >
															<input type="hidden" value="'.$hinh.'" name="img" >
															<input type="hidden" value="'.$price.'" name="price" >
															
														</div>

									  					</form>'.
									'</div>' .
									'</div>' .
									'</div>';
							}

							?>


						</div>
					</div>
				</div>
			</div>
	</div>
	</div>
	</section>
	<!--************************************
					Best Selling End
			*************************************-->

	<!--************************************
					Featured Item Start
			*************************************-->
	<section class="tg-bglight tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-featureditm">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
						<figure><img src="images/img-02.png" alt="image description"></figure>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<div class="tg-featureditmcontent">
							<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
							<div class="tg-booktitle">
								<h3><a href="javascript:void(0);">Things To Know About Green Flat Design</a></h3>
							</div>
							<span class="tg-bookwriter">By: <a href="javascript:void(0);">Farrah Whisenhunt</a></span>
							<span class="tg-stars"><span></span></span>
							<div class="tg-priceandbtn">
								<span class="tg-bookprice">
									<ins>$23.18</ins>
									<del>$30.20</del>
								</span>
								<a class="tg-btn tg-btnstyletwo tg-active" href="javascript:void(0);">
									<i class="fa fa-shopping-basket"></i>
									<em>Add To Basket</em>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Featured Item End
			*************************************-->
	<!--************************************
					New Release Start
			*************************************-->
	<section class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-newrelease">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="tg-sectionhead">
							<h2><span>Taste The New Spice</span>New Release Books</h2>
						</div>
						<div class="tg-description">
							<p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcoiars nisiuip commodo consequat aute irure dolor in aprehenderit aveli esseati cillum dolor fugiat nulla pariatur cepteur sint occaecat cupidatat.</p>
						</div>
						<div class="tg-btns">
							<a class="tg-btn tg-active" href="javascript:void(0);">View All</a>
							<a class="tg-btn" href="javascript:void(0);">Read More</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="row">
							<div class="tg-newreleasebooks">
								<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="images/books/img-07.jpg" alt="image description"></div>
												<div class="tg-backcover"><img src="images/books/img-07.jpg" alt="image description"></div>
											</div>
											<a class="tg-btnaddtowishlist" href="javascript:void(0);">
												<i class="icon-heart"></i>
												<span>add to wishlist</span>
											</a>
										</figure>
										<div class="tg-postbookcontent">
											<ul class="tg-bookscategories">
												<li><a href="javascript:void(0);">Adventure</a></li>
												<li><a href="javascript:void(0);">Fun</a></li>
											</ul>
											<div class="tg-booktitle">
												<h3><a href="javascript:void(0);">Help Me Find My Stomach</a></h3>
											</div>
											<span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
											<span class="tg-stars"><span></span></span>
										</div>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="images/books/img-08.jpg" alt="image description"></div>
												<div class="tg-backcover"><img src="images/books/img-08.jpg" alt="image description"></div>
											</div>
											<a class="tg-btnaddtowishlist" href="javascript:void(0);">
												<i class="icon-heart"></i>
												<span>add to wishlist</span>
											</a>
										</figure>
										<div class="tg-postbookcontent">
											<ul class="tg-bookscategories">
												<li><a href="javascript:void(0);">Adventure</a></li>
												<li><a href="javascript:void(0);">Fun</a></li>
											</ul>
											<div class="tg-booktitle">
												<h3><a href="javascript:void(0);">Drive Safely, No Bumping</a></h3>
											</div>
											<span class="tg-bookwriter">By: <a href="javascript:void(0);">Sunshine Orlando</a></span>
											<span class="tg-stars"><span></span></span>
										</div>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-3 col-lg-4 hidden-md">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="images/books/img-09.jpg" alt="image description"></div>
												<div class="tg-backcover"><img src="images/books/img-09.jpg" alt="image description"></div>
											</div>
											<a class="tg-btnaddtowishlist" href="javascript:void(0);">
												<i class="icon-heart"></i>
												<span>add to wishlist</span>
											</a>
										</figure>
										<div class="tg-postbookcontent">
											<ul class="tg-bookscategories">
												<li><a href="javascript:void(0);">Adventure</a></li>
												<li><a href="javascript:void(0);">Fun</a></li>
											</ul>
											<div class="tg-booktitle">
												<h3><a href="javascript:void(0);">Let The Good Times Roll Up</a></h3>
											</div>
											<span class="tg-bookwriter">By: <a href="javascript:void(0);">Elisabeth Ronning</a></span>
											<span class="tg-stars"><span></span></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					New Release End
			*************************************-->
	<!--************************************
					Collection Count Start
			*************************************-->
	<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-04.jpg">
		<div class="tg-sectionspace tg-collectioncount tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-collectioncounters" class="tg-collectioncounters">
						<div class="tg-collectioncounter tg-drama">
							<div class="tg-collectioncountericon">
								<i class="icon-bubble"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Drama</h2>
								<h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">6,179,213</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-horror">
							<div class="tg-collectioncountericon">
								<i class="icon-heart-pulse"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Horror</h2>
								<h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">3,121,242</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-romance">
							<div class="tg-collectioncountericon">
								<i class="icon-heart"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Romance</h2>
								<h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">2,101,012</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-fashion">
							<div class="tg-collectioncountericon">
								<i class="icon-star"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Fashion</h2>
								<h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">1,158,245</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Collection Count End
			*************************************-->
	<!--************************************
					Picked By Author Start
			*************************************-->

	<!--************************************
					Picked By Author End
			*************************************-->
	<!--************************************
					Testimonials Start
			*************************************-->

	<!--************************************
					Testimonials End
			*************************************-->

	<!--************************************
					Call to Action Start
			*************************************-->
	<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-06.jpg">
		<div class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-calltoaction">
							<h2>Open Discount For All</h2>
							<h3>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore.</h3>
							<a class="tg-btn tg-active" href="javascript:void(0);">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Call to Action End
			*************************************-->
	<!--************************************
					Latest News Start
			*************************************-->

	<!--************************************
					Latest News End
			*************************************-->
	</main>
	<!--************************************
				Main End
		*************************************-->
	<!--************************************
				Footer Start
		*************************************-->
	<?php
	include(__DIR__ . "/footer.php");
	?>
	<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.vide.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/countTo.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/gmap3.js"></script>
	<script src="js/main.js"></script>
</body>

</html>