

<?php require "config.php";
require "navbar.php"; ?>

	<!-- Carousel -->
<div id="myCarousel" class="carousel  ">

<!-- Menu -->
<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
  
<!-- Items -->
<div class="carousel-inner">
	
	<!-- Item 1 -->
  <div class="item active">
	  <img src="./img/ffff.jpg"/>
	<div class="container">
	  <div class="carousel-caption">
		<h1 class="h1 fw-bold">Welcome</h1>
	  </div>
	</div>
  </div>
	
	<!-- Item 2 -->
  <div class="item">
	  <img src="./img/dd.jpg"/>
	<div class="container">
	  <div class="carousel-caption">
	  <h1 class="h1 fw-bold">To Our</h1>
	  </div>
	</div>
  </div>
	
	<!-- Item 3 -->
  <div class="item">
	  <img src="./img/cc.jpg" />
	<div class="container">
	  <div class="carousel-caption">
		<h1 class="h1 fw-bold shadow-lg">Store</h1>
	  </div>
	</div>
  </div>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
  <span class="icon-prev"></span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
  <span class="icon-next"></span>
</a>  

<div id="carouselButtons" style="display: none;">
	<button id="playButton" type="button" class="btn btn-default btn-xs">
		<span class="glyphicon glyphicon-play"></span>
	 </button>
	<button id="pauseButton" type="button" class="btn btn-default btn-xs">
		<span class="glyphicon glyphicon-pause"></span>
	</button>
</div>
</div>
	
   
 

		<!-- SECTION -->
		<?php
$sql='SELECT * FROM categories';
$statement=$db->query($sql);
$data=$statement->fetchAll();

		?>
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<?php
					foreach($data as $value):
					?>
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./admin/categorys/public/<?php echo $value['category_image'];?>" alt="">
							</div>
							<div class="shop-body">
								<h3><?php echo $value['category_name'];?><br>Collection</h3>
								<a href="store.php?category=<?php echo $value['category_id']?>&name=<?php echo $value['category_name']?>  " class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<?php endforeach?>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->

		<?php $select="SELECT categories.category_name,products.product_main_image,products.product_price,products.product_name,products.product_id 
									FROM products LEFT JOIN categories ON categories.category_id = product_categorie_id";
									$fromd=$db->prepare($select);
									$fromd->execute();
									$shwwl= $fromd->fetchAll();
									foreach($shwwl as $value):
									
									?>

										<div class="product">
											<div class="product-img">
												<img src="./admin/products/public/<?php echo $value['product_main_image']; ?>" alt="">
												<div class="product-label">
													
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $value['category_name']; ?></p>
												<h3 class="product-name"><a href="#"><?php echo $value['product_name']; ?></a></h3>
												<h4 class="product-price"><?php echo $value['product_price']; ?> </h4>
												
												<div class="product-btns">
												<a href="product.php?productId=<?php echo $value['product_id']; ?>" ><button class="btn btn-success"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button></a>
													
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										<!-- /product -->
<?php endforeach; ?> 
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3></h3>
										<span></span>
									</div>
								</li>
								<li>
									<div>
										<h3></h3>
										<span></span>
									</div>
								</li>
								<li>
									<div>
										<h3></h3>
										<span></span>
									</div>
								</li>
								<li>
									<div>
										<h3></h3>
										<span></span>
									</div>
								</li>
							</ul>
							
							
							<a class="primary-btn cta-btn" href="store.php">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		
							
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

		

	<?php require "footer.php"; ?>