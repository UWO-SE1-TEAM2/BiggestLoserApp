<?PHP
	session_start()  ;
	require_once('initialize.php') ;
?>

<!DOCTYPE html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>The Biggest Loser : Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

		 	  		<form method="post" action="index.php">
					<?PHP
						if($_SERVER['REQUEST_METHOD'] === 'POST')
						{
							global $db ;
							$UN = $_POST['username'] ;
							$PW = $_POST['password'] ;
							try
							{
								$result = GetUserbyUsername($UN);

								if(count($result) > 0)
								{
									//TODO: password_verify isn't working yet - double check tm
									if(password_verify($PW, $result[0]['Password']))
									{
										$_SESSION['username'] = $UN ;
										header("Location: " . "home.php") ;
									}
									else
									{
										echo "<p class='text-center text-danger'>Username or Password is incorrect.</p><br>" ;
									}
								}
								else
								{
									echo "<p class='text-center text-danger'>The username " . $UN .
										" does not exist. Please register.</p>";
								}
							}
							catch(PDOException $e)
							{
								echo "Database Error." ;
							}
						}
					?>
		        	<div class="form-group">
		                    <label>Username</label>
		                    <input type="text" name="username" class="form-control" required>
		                </div>
		                <div class="form-group">
							<label>Password</label>
		                    <input type="password" name="password" class="form-control" required>
		                </div>
		                <div class="form-group">
		                    <input type="submit" class="btn btn-info form-control" value="Login">
		                </div>
		                    <p class="text-center">Don't have an account? <a href="signup.php">Sign up now</a>.</p>
		                </div>
	              	</form>
				</div>
			</div>
		</div>
		<?php include_once 'footer.php';?>
    </body>

</html>
