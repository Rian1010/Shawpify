<?php
	include "inc/head.inc.php";
?>
	<!--HEADER-->
	<header>
		<div class="container">
			<h1>Login</h1>
		</div>
	</header>

	<nav class='navbar navbar-inverse navbar-fixed-top'>
		<div class='container-fluid'>
			<header class='navbar-header'>
				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
				</button>
				<a class='navbar-brand' href='index.php'>Shawpify</a>

			</header>
			<div class='collapse navbar-collapse' id='myNavbar'>
				<ul class='nav navbar-nav'>
					<li><a href='#'>Products</a></li>
					<li><a href='#'>Deals</a></li>
				</ul>
				<ul class='nav navbar-nav navbar-right'>
					<li><a href='signin.php'><span class='glyphicon glyphicon-user'></span>Sign In</a></li>
					<li><a href='#'><span class='glyphicon glyphicon-shopping-cart'></span>Cart</a></li>
					<li>
						<form class='navbar-form' action='#' method='POST'>
							<input type='text' class='form-control' placeholder='Search for a Product'>
							<button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-search'></span></button>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--MAIN-->
	<main class='container'>
		<form action='inc/login.php' method='POST'>
			<div class="form-group">
				<label for='username'>Username:</label>
				<input type="text" name="username" class="form-control" id='username'>
			</div>
			<div class="form-group">
				<label for='password'>Password:</label>
				<input type="password" name="password" class="form-control" id='password'>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
		<hr>
		<p>Don&#8217;t have an account?</p>
		<a href="signup.php" class="btn btn-primary">Sign Up Here</a>
	</main>
	<!--FOOTER-->
	<?php
		include "inc/foot.inc.php"
	?>