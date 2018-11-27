<?PHP
	session_start()  ;
	require_once('initialize.php');
?>
<!DOCTYPE html>

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>The Biggest Loser : Change Password</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="../js/functions.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="stylesheet" type="text/css"  href="../css/mainStyle.css" />
	</head>

	<body>
		<?php include_once 'header.php';?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<p class="text-center">Please fill this form to change your password.</p>
					<form  method="post" action="forgotPassword.php">
						
				        <div class="form-group">
				            <label for="username">Username</label>
				            <input id="username" type="text" name="username" class="form-control" required>
				            <span id="usernameErr"></span>
				        </div>
				        <div class="form-group">
				            <label for="oldPassword"> old Password</label>
				            <input id="password" type="password" name="oldPassword" class="form-control" required>
						</div>
						<div class="form-group">
				            <label for="newPassword">New Password</label>
				            <input id="password" type="password" name="newPassword" class="form-control" required>
				        </div>
				        <div class="form-group">
				            <label for="confirmNewPassword">Confirm New Password</label>
				            <input id="confirmPassword" type="password" name="confirmNewPassword" class="form-control" required>
							<br>
				            <p id="confirmMsg" class="text-center"></p>
				        </div>
				        <div class="form-group">
				            <input type="submit" class="btn btn-info form-control" value="Register">
				        </div>
				        <p class="text-center"><a href="index.php">Login here</a>.</p>
					</form>
				</div>
			</div>
		</div>
		<?php include_once 'footer.php';?>
	</body>
</html>