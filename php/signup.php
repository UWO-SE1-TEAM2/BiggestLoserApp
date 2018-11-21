<?PHP
	session_start()  ;
	require_once('initialize.php');
?>
<!DOCTYPE html>

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>The Biggest Loser : Sign Up</title>
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
					<p class="text-center">Please fill this form to create an account.</p>
					<form  method="post" action="signup.php">
						<?PHP
							if($_SERVER['REQUEST_METHOD'] === 'POST')
							{
								global $db ;
								$UN = $_POST['username'] ;
								$PW = $_POST['password'] ;

								try
								{
									$dbResult = GetUserbyUsername($UN);
									
									if(count($dbResult) > 0)
									{
										echo '<p class="text-center text-danger">The user name ';
										echo $UN;
										echo ' already exists. Please choose a different username or
											check if you already have an account.<p>';
									}
									else
									{
										$result = InsertUser($UN, $PW);
										if($result)
										{
											$_SESSION['username'] = $UN ;
											header("Location: " . "home.php");
										}
										else
										{
											echo "There was an error creating your account.
												Please try again.";
										}
									}

								}
								catch(PDOException $e)
								{
									echo "Database Error." ;
								}
							}
						?>
				        <div class="form-group">
				            <label for="username">Username</label>
				            <input id="username" type="text" name="username" class="form-control" required>
				            <span id="usernameErr"></span>
				        </div>
				        <div class="form-group">
				            <label for="password">Password</label>
				            <input id="password" type="password" name="password" class="form-control" required>
				        </div>
				        <div class="form-group">
				            <label for="confirmPassword">Confirm Password</label>
				            <input id="confirmPassword" type="password" name="confirmPassword" class="form-control" required>
							<br>
				            <p id="confirmMsg" class="text-center"></p>
				        </div>
				        <div class="form-group">
				            <input type="submit" class="btn btn-info form-control" value="Register">
				        </div>
				        <p class="text-center">Already have an account? <a href="index.php">Login here</a>.</p>
					</form>
				</div>
			</div>
		</div>
		<?php include_once 'footer.php';?>
	</body>
</html>
