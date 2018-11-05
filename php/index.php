<!DOCTYPE html>
<html>
	<head>
		<title>Biggest Loser</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<!--Navbar container-->
		<div class="navbar navbar-inverse navbar-static-top" id="navbar">
			<div class="container" id="navbar">
				<a href="" class="navbar-brand">Biggest Loser</a>
				<div class="collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="">Home</a></li><!--Link to home page-->
						<li class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown">Groups <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="">Group name</a></li><!--Link to group page-->
								</ul>
						</li>
						<li><a href="">Logout</a></li><!--Link to login page-->
					</ul>
				</div>	
			</div>
		</div>
		<!--Content container-->
		<div class="container" id="userInfo">
			<div class="row">
				<div class="col-md-4" id="col1">
					<img src="http://mainenordmenn.com/wp-content/uploads/2017/09/Maine-Nordmenn-Board-Generic-Profile.jpg" class="img-rounded">
					<h5>User: <em>Display Name</em></h5> <!--Needs to grab username from database-->
					<h5>Current Weight: <em>Display Weight</em></h5> <!--Needs current weight from database-->
					<h5>Total weight lost: <em>Display Net Weight Loss/Gain</em></h5> <!--Needs total weight lost from database-->
					<form class="form-inline" method="get" action=""> <!-- Sends info to database -->
					<div class="form-group">
						<input type="text" name="weight" id="weight" class="form-control" onfocus="" placeholder="Enter new weight:">
					</div>
					<input class="btn btn-primary" type="submit" value="Enter Weight">
					</form>
				</div>	
				<div class="col-md-8" id="col2">
					<h3>Your Groups: </h3>
					<ul> <!--Will display all groups-->
						<li><a href="">List groups here</a></li><!--Links to group page-->
					</ul>
					<a href="#groupInfo" class="btn btn-primary" data-toggle="modal">Start a new group</a>
				</div>
			</div>
		</div>
		<!--Popup container-->
		<div class="modal fade" id="groupInfo" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Group Info</h3>
					</div>
					<div class="modal-body">
						<form method="get" action=""><!--Sends info to database-->
							<div class="form-group">
								<label for="groupName">Group name:</label>
								<input type="text" name="groupName" class="form-control" onfocus="" placeholder="Enter group name:">
							</div>
							<div class="form-group">
								<label for="groupMembers">Add members:</label>
								<input type="text" name="groupMembers" class="form-control" onfocus="" placeholder="i.e. (name, name, name)">
							</div>
							<input class="btn btn-primary" type="submit" value="Create group" href=""><!--Takes user to group page-->
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
		
	</body>
</html>