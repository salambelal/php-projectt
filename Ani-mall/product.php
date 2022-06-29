<?php require "config.php";?>
<?php require "navbar.php"; ?>
		

   
		

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								

								<!-- Cart -->
								
									
									

											
										
										
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
							
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<?php $id=$_GET['productId'] ;?>
		<!-- /NAVIGATION -->
<?php  $select="SELECT * FROM products where product_id =$id" ;
$fromdb = $db->query($select);
$showw=$fromdb->fetchAll();
       foreach($showw as $value):

	
	   
	   
?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							
						
							
							<li class="active"><?php echo $value['product_name']; ?></li>
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
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./admin/products/public/<?php echo $value['product_main_image']; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./admin/products/public/<?php echo $value['product_desc_image_1']; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./admin/products/public/<?php echo $value['product_desc_image_2']; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./admin/products/public/<?php echo $value['product_desc_image_3']; ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./admin/products/public/<?php echo $value['product_main_image']; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./admin/products/public/<?php echo $value['product_desc_image_1']; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./admin/products/public/<?php echo $value['product_desc_image_2']; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="./admin/products/public/<?php echo $value['product_desc_image_3']; ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
						<h2 class="product-name"><?php echo $value['product_name']; ?></h2>
							
								
							</div>
							<div>
							<h3 class="product-price">$<?php echo $value['product_price']; ?> </h3>
								
							</div>
							<p><?php echo $value['product_description']; ?></p>

						

							<div class="add-to-cart">
								<div class="qty-label">
									
										<form action="">
											Qty
									<input type="number" name="" id="" >
											<input type="submit" class="btn btn-success" value="Add to cart">
										</form>
										
									
								</div>
								
								
								
							</div>
							


							

							
						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								<li><a data-toggle="tab" href="#tab3">Comments</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo $value['product_description']; ?> </p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
									<?php
								// 	 $join='SELECT comments.id ,comments.comment ,comments.comment_image,comments.comment_date,products.product_name From comments 
                                //    LEFT JOIN products ON comments.comment_product_id=product_id' 
								   ?> 
                            <?php
                                //  $st= $db->query($join);
                                // $publishers = $st->fetchAll();
                                  ?>
										
									<?php
$Showsql="SELECT * FROM comments";

$statment=$db->query($Showsql);

$show=$statment->fetchAll();



foreach($show as $value):
 ?>
    <div class="actionBox">
        <ul class="commentList">
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/50/50" />
                </div>
                <div class="commentText">
                <h5 class=" mb-0 ms-2"><?php echo $value['comment_image'];  ?></h5><br>
                    <p class=""><?php echo $value['comment']; ?></p></p> <span class="date sub-text">on <?php echo $value['comment_date']; ?></span>

                </div>
            </li>
            
        </ul>
        <?php endforeach ?>
      <?php  if(isset($_POST['submit'])){
     
     $name=$_POST['name'];
    $comment=$_POST['comment'];
    
    
    try {
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = 'INSERT INTO comments (comment,comment_image)
     VALUES (:comment,:comment_image)'; 
     $st= $db->prepare($sql);
 
     $st->execute([':comment'=>$comment,':comment_image'=>$name]);
    //  echo "New comment record created ";
 
    } catch (PDOException $e) {
        echo  $sql . "<br>" . $e->getMessage();
    }
 
 
     }
     
     ?>

        <form class="form-inline"  method="post" >
            <div class="form-group">
                <input class="form-control" type="text" name='name' placeholder="Your Name" />
                <input class="form-control" type="text" name='comment' placeholder="Your comments" />
            <div class="form-group">
                <input type="submit" value="Add" name="submit" class="btn btn-primary">
                
            </div></div>
            
        </form>
    </div>
									

									
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<?php endforeach;?>
		<!-- Section -->
		<div class="section">
			<!-- container -->
			
			<!-- /container -->
		</div>
		<!-- /Section -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				
    
   
	<div class="container">
					
					<div class="row">
<br>
<br><br><br>
					</div></div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
	</div>
	

	</div></div>
	<?php require "footer.php"; ?>