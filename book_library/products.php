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

<body>

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
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>All Products</h1>
							<ol class="tg-breadcrumb">
								<li><a href="javascript:void(0);">home</a></li>
								<li class="tg-active">Products</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					News Grid Start
			*************************************-->
			<?php
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$sql = "SELECT TenSach,sanpham.SP_ID,sanpham.HinhAnh,chitietsp.GiaBan,TenTG ,TenTL,theloai.TL_ID
									 FROM sanpham  
									 join chitietsp ON sanpham.SP_ID=chitietsp.SP_ID 
									 join tacgia on sanpham.TG_ID=tacgia.TG_ID 
									 join theloai on sanpham.TL_ID=theloai.TL_ID
									 WHERE chitietsp.TapSo =1 AND sanpham.TL_ID= $id ";

				// 3. Thực thi câu truy vấn
				$result = mysqli_query($connection, $sql);
				$loai = "SELECT * FROM theloai WHERE TL_ID = $id";
				$loaisp = mysqli_query($connection, $loai);
				$loaisp = mysqli_fetch_array($loaisp);
			}
			?>
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-products">
										<div class="tg-sectionhead">
											<h2><span>People’s Choice</span>Bestselling Books</h2>
										</div>
										<div class="tg-featurebook alert" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<div class="tg-featureditm">
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
														<figure><img src="images/img-04.png" alt="image description"></figure>
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
										<div class="tg-productgrid">
											<div class="tg-refinesearch">

												<form class="tg-formtheme tg-formsortshoitems">
													<fieldset>
														<div class="form-group">
															<label>sort by:</label>
															<span class="tg-select">
																<select>
																	<option>name</option>
																	<option>name</option>
																	<option>name</option>
																</select>
															</span>
														</div>
														<div class="form-group">
															<label>show:</label>
															<span class="tg-select">
																<select>
																	<option>8</option>
																	<option>16</option>
																	<option>20</option>
																</select>
															</span>
														</div>
													</fieldset>
												</form>
												<?php
												echo '<span>' . $loaisp['TenTL'] . '</span>';
												?>

											</div>
											<?php

											while ($row = mysqli_fetch_array($result)) {
												$id = $row['SP_ID'];
												$name = $row['TenSach'];
												$price = $row['GiaBan'];
												$hinh = $row['HinhAnh'];
												$tg = $row['TenTG'];
												$tl = $row['TenTL'];

												echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">';
												echo '<div class="tg-postbook">';
												echo '<figure class="tg-featureimg"><a href="productdetail.php?id=' . $id . '">';
												echo '<div class="tg-bookimg">';
												echo '<div class="tg-frontcover ">
										 <img src="images/books/' . $hinh . '"  style="width:200px; height: 300px;" class="img-fluid"></div>';
												echo '<div class="tg-backcover"><img src="images/books/' . $hinh . '" style="width: 200px; height: 150px;" class="img-fluid"></div>';
												echo '	</div>';

												echo '</a></figure>';
												echo '<div class="tg-postbookcontent">';
												echo	'	<ul class="tg-bookscategories">
												<li><a href="javascript:void(0);">' . $tl . '</a></li>
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
													'<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">' .
													'<i class="fa fa-shopping-basket"></i>' .
													'<em>Add To Basket</em>' .
													'</a>' .
													'</div>' .
													'</div>' .
													'</div>';
											}
											?>

										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetsearch">
										<form class="tg-formtheme tg-formsearch">
											<div class="form-group">
												<button type="submit"><i class="icon-magnifier"></i></button>
												<input type="search" name="search" class="form-group" placeholder="Search by title, author, key...">
											</div>
										</form>
									</div>
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Categories</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li><a href="javascript:void(0);"><span>Art &amp; Photography</span><em>28245</em></a></li>
												<li><a href="javascript:void(0);"><span>Biography</span><em>4856</em></a></li>
												<li><a href="javascript:void(0);"><span>Children’s Book</span><em>8654</em></a></li>
												<li><a href="javascript:void(0);"><span>Craft &amp; Hobbies</span><em>6247</em></a></li>
												<li><a href="javascript:void(0);"><span>Crime &amp; Thriller</span><em>888654</em></a></li>
												<li><a href="javascript:void(0);"><span>Fantasy &amp; Horror</span><em>873144</em></a></li>
												<li><a href="javascript:void(0);"><span>Fiction</span><em>18465</em></a></li>
												<li><a href="javascript:void(0);"><span>Fod &amp; Drink</span><em>3148</em></a></li>
												<li><a href="javascript:void(0);"><span>Graphic, Anime &amp; Manga</span><em>77531</em></a></li>
												<li><a href="javascript:void(0);"><span>Science Fiction</span><em>9247</em></a></li>
												<li><a href="javascript:void(0);"><span>View All</span></a></li>
											</ul>
										</div>
									</div>

									<div class="tg-widget tg-widgetinstagram">
										<div class="tg-widgettitle">
											<h3>Instagramsssssss</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<li>
													<figure>
														<img src="images/instagram/img-01.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-02.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-03.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-04.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-05.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-06.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-07.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-08.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
												<li>
													<figure>
														<img src="images/instagram/img-09.jpg" alt="image description">
														<figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a></figcaption>
													</figure>
												</li>
											</ul>
										</div>
									</div>

								</aside>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
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