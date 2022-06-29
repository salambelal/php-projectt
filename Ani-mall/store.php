<?php require 'config.php' ?>

		<?php require "navbar.php"; ?>

		<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php">All Categories</a></li>
						<li><a href="#"><?php echo $_GET['name']; ?></a></li>

					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

		<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">Categories</h3>
						<div class="checkbox-filter">
							<?php
							$sql = 'SELECT * FROM categories';
							$statement = $db->query($sql);
							$data = $statement->fetchAll();
							foreach ($data as $category) :
							?>

								<div class="input-checkbox">
									<input type="checkbox" id="<?php echo $category['category_id']; ?>">
									<label for="<?php echo $category['category_id']; ?>">
										<span></span>
										<?php echo $category['category_name']; ?>
										
									</label>
								</div>
							<?php endforeach ?>

						</div>
					</div>
					<!-- /aside Widget -->
					

					<!-- aside Widget -->
					<div class="aside">
						<h3 class="aside-title">LATEST PRODUCTS</h3>
						<?php
						$count = 1;
						$sql = 'SELECT * FROM products';
						$statement = $db->query($sql);
						$data = $statement->fetchAll();
						foreach ($data as $product) :

							if ($count <= 3) {
						?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./admin/products/public/<?php echo $product['product_main_image']; ?>" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-name"><a href="product.php?product_id=" .<?php echo $product['product_id']; ?>><?php echo $product['product_name']; ?></a></h3>
										<h4 class="product-price"><?php echo $product['product_price']; ?> $</h4>
									</div>
								</div>
						<?php $count++;
							}
						endforeach ?>

					</div>
					<!-- /aside Widget -->
					
					
				</div>
				<!-- /ASIDE -->

				<!-- STORE -->
				<div id="store" class="col-md-9">
					<!-- store top filter -->
				
					<!-- /store top filter -->
					<?php
					
					$select_products ='';
					$category_id = $_GET['category'];
					if(isset($_GET['sort'])){
					$value=$_GET['val'];}
				if($value =='0'){
							
					$select_products = $db->prepare("SELECT * FROM `products` WHERE product_categorie_id=$category_id ORDER BY product_price ASC");
					
				}
				else if($value=='1'){
					$select_products = $db->prepare("SELECT * FROM `products` WHERE product_categorie_id=$category_id ORDER BY product_price DESC");
					
				}
				else if($value=='2'){
					$select_products = $db->prepare("SELECT * FROM `products` WHERE product_categorie_id=$category_id ORDER BY product_name DESC");
					
				}
				else{
					$select_products = $db->prepare("SELECT * FROM `products` WHERE product_categorie_id=$category_id ORDER BY product_name ASC");
					
				}
			
				$select_products->execute();
					$count =  $select_products->rowCount();
					if ($select_products->rowCount() > 0) {
						while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {

					?>
							<!-- store products -->
							<div class="row">
								<!-- product -->
								<div class="col-md-4 col-xs-6">
									<div class="product">
										<div class="product-img">
											<img src="./admin/products/public/<?php echo $fetch_products['product_main_image']; ?>" alt="">
											<div class="product-label">

												<span class="new">NEW</span>
											</div>
										</div>
										<div class="product-body">
											<p class="product-category"><?php echo  $_GET['name'] ?></p>
											<h3 class="product-name"><a href="#"><?php echo $fetch_products['product_name']; ?></a></h3>
											<h4 class="product-price"><?php echo $fetch_products['product_price']; ?> $</h4>
											
											<div class="product-btns">

												<button class="quick-view"><a href="product.php?productId=<?php echo $fetch_products['product_id']; ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
											</div>
										</div>
										<div class="add-to-cart">
											<button class="add-to-cart-btn" name='addToCart'><a href="addToCart.php?productId=<?php echo $fetch_products['product_id']; ?>&cat_id=<?php echo $category_id ?>&c_name=<?php echo  $_GET['name'] ?>" ><i class="fa fa-shopping-cart"></i> add to cart</a></button>
										</div>
									</div>
								</div>
						<?php
					


						}
					} else {
						echo '<p class="empty">no products available!</p>';
					}
						?>
						<!-- /product -->


							</div>
							<!-- /store products -->

							<!-- store bottom filter -->
							<div class="store-filter clearfix">
								<span class="store-qty">Showing <?php echo $count; ?>-<?php
																						$select_allproducts = $db->prepare("SELECT * FROM `products` ");
																						$select_allproducts->execute();
																						$countt = $select_allproducts->rowCount();
																						echo $countt ?> products</span>

							</div>


							<!-- /store bottom filter -->
				</div>
				<!-- /STORE -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<?php require "footer.php"; ?>