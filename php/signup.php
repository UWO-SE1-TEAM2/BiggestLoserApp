<!--
    Handle Validations in Javascript
    - Password and Confirm Mismatch
    - Ajax call to check if username taken
-->
<!DOCTYPE html>

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>The Biggest Loser : Sign Up</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="stylesheet" type="text/css"  href="../css/mainStyle.css" />
	</head>

	<body>
		<?php include_once 'header.php';?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<p class="text-center">Please fill this form to create an account.</p>
					<form  method="post" action="index.php">
				        <div class="form-group">
				            <label>Username</label>
				            <input id="username" type="text" name="username" class="form-control" required>
				            <span id="usernameErr"></span>
				        </div>
				        <div class="form-group">
				            <label>Password</label>
				            <input id="password" type="password" name="password" class="form-control" required>
				            <span id="passwordErr"></span>
				        </div>
				        <div class="form-group">
				            <label class="confirm_password">Confirm Password</label>
				            <input id="confirm_password" type="password" name="confirm_password" class="form-control" required>
				            <span id="confirmErr"></span>
				        </div>
				        <div class="form-group">
				            <input type="submit" class="btn btn-info form-control" value="Register">
				        </div>
				        <p class="text-center">Already have an account? <a href="login.php">Login here</a>.</p>
					</form>
				</div>
			</div>
		</div>
		<?php include_once 'footer.php';?>
	</body>
</html>
