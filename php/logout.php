<?php 
session_start(); 

if(isset($_SESSION['username'])){ 
    unset($_SESSION['username']);
    session_destroy();
}?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Biggest Loser : Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
	<link rel="stylesheet" type="text/css"  href="../css/mainStyle.css" />

</head>

<body>
    <?php include_once 'header.php';?>
        <div class="form-group">

            <p class = "text-center text-danger"><?= 'You have sucessfully logged out!';?></p> 
            <p class = "text-center"><a href="index.php">Click here to Login</a></p>
        </div>
    <?php include_once 'footer.php';?>
</body>
</html>