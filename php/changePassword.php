<?PHP
	session_start()  ;
	if(!isset($_SESSION['username']))
	{
		header("Location:" . "index.php") ;
	}
	else
	{
		$UN = $_SESSION['username'] ;
	}


    require_once('initialize.php');
//    include('updatePassword.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$oldPassword = $_POST['oldPassword'];
		$result = GetUserbyUsername($UN);
		$newPassword = $_POST['password'];
		if(password_verify($oldPassword, $result[0]['Password']))
		{
			$update = UpdatePasswordForUser($newPassword, $UN);
			if($update)
			{
				print "<p class='text-center text-danger'>Password successfully updated.</p>";
			}
			else
			{
				print "<p class='text-center text-danger'>Error updating password.
				 Please try again. </p>";
			}
		}
	}
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
        <?php include_once 'navigationBar.php';?>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h1 class="text-center">Please fill this form to change your password.</h1>
					<form  method="post" action="changePassword.php">
				        <div class="form-group">
				            <label for="oldPassword"> Old Password</label>
				            <input id="oldPassword" type="password" name="oldPassword" class="form-control" required>
						</div>
						<div class="form-group">
				            <label for="password">New Password</label>
				            <input id="password" type="password" name="password" class="form-control" required>
				        </div>
				        <div class="form-group">
				            <label for="confirmPassword">Confirm New Password</label>
				            <input id="confirmPassword" type="password" name="confirmPassword" class="form-control" required>
							<br>
				            <p id="confirmMsg" class="text-center"></p>
				        </div>
				        <div class="form-group">
				            <input id = "submit" type="submit" class="btn btn-info form-control" value="Change Password">
				        </div>
					</form>
				</div>
			</div>
		</div>
		<?php include_once 'footer.php';?>
	</body>
</html>
