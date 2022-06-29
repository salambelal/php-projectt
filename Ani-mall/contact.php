<?php require "config.php";
require "navbar.php";

?>


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<div class="container">
		<form>
			<div class="form-group">
			  <label for="exampleInputEmail1">Email address</label>
			  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
			  <label for="exampleInputName1">Full Name</label>
			  <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
			</div>
			<div class="form-group">
				<label for="exampleInputSubject1">Subject</label>
				<input type="text" class="form-control" id="exampleInputSubject1" placeholder="Subject">
			  </div>
			  <div class="form-group">
				<p><label for="exampleTextArea1">your Massage</label></p>
				<textarea name="" id="exampleTextArea1" placeholder="Type something" cols="30" rows="10"></textarea>
			  </div>
			<div class="form-check">
			  <input type="checkbox" class="form-check-input" id="exampleCheck1">
			  <label class="form-check-label" for="exampleCheck1">Check me out</label>
			</div>
			<button type="submit" class="btn btn-danger">Send</button>
		  </form>
		</div>
		

		<?php require "footer.php"; ?>