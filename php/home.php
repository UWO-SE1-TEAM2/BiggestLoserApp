<?php
	session_start()  ;
	require_once('initialize.php') ;
	global $db ;
	if(!isset($_SESSION['username']))
	{
		header("Location:" . "index.php") ;
	}
	else
	{
		$UN = $_SESSION['username'] ;
	}
	
	require_once("initialize.php");
	/*InsertWeight Procedure*/
	if(isset($_POST["submitBtn"]))
	{
		if(isset($UN))
		{
			try
			{
				InsertWeight($UN, $_POST["weight"], $_POST["dateOfWeight"]);
			}
			catch(PDOException $e)
			{
				echo "Database Error." ;
			}
		}
		
	}
	/*end*/
?>
<!DOCTYPE html>
<html>
	<head>
		<title>The Biggest Loser</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="stylesheet" type="text/css"  href="../css/mainStyle.css" />
	</head>
	<body>
		<!--Navbar container-->
		<?php include_once 'navigationBar.php';?>
		<!--Content container-->
		<div class="container">
			<div class="row">
				<div class="col-md-4" id="col1">
					<!-- TODO: connect GUI to DB -->
					<h2 id="username" class="biggestLoser">
						<?php echo $UN;?>
					</h2>
					Current Weight: 
					<?php
						try{
							$returnWght = GetCurrentWeightOfUser($UN);
						}
						catch(PDOException $e)
						{
							echo "Database failure";
						}
						if(isset($returnWght))
						{
							echo $returnWght;
						}
						else
						{
							echo "No weight data available";
						}
					?>
					<br>
					Progress: <em id="totalWeightDifference">No weight data available.</em>
					<br>
					<br>
					<form method="post" action=""> <!-- Sends info to database -->
						<div class="form-group">
							<input type="text" name="weight" id="weight" class="form-control" placeholder="Enter new weight">
							<br>
							<input type="date" name="dateOfWeight" class="form-control">
							<br>
							<input type="submit" name="submitBtn" class="btn btn-info form-control" value="Update Weight">
						</div>
						<div class="form-group">

						</div>
					</form>
					<button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#groupInfo">
					  Start New Group
					</button>
				</div>
				<div class="col-md-8" id="col2">
					<h2>Your Groups: </h2>
					<ul> <!-- TODO: generate group from DB-->
						<li><a href="">Group 1</a></li>
					</ul>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-md-6 col-md-offset-3" id="graphContainer">
					Graph
				</div>
			</div>
			<!--Popup container-->
			<div class="modal fade" id="groupInfo" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3>Provide Group Info</h3>
						</div>
						<div class="modal-body">
							<form method="get" action=""><!--Sends info to database-->
								<div class="form-group">
									<label for="groupName">Group Name:</label>
									<input type="text" name="groupName" class="form-control" required>
									<br>
									<label for="groupMembers">Add members (if adding multiple members
										at once separate with ','):</label>
									<input type="text" name="groupMembers" class="form-control"
										placeholder="i.e. username, username, username">
									<br>
									<label for="startDate">Biggest Loser Start Date:</label>
									<input type="date" id="startDate" class="form-control" required>
									<br>
									<label for="endDate">Biggest Loser End Date:</label>
									<input type="date" id="endDate" class="form-control" required>
									<br>
									<input class="btn btn-info form-control" type="button" value="Create group" href="">
								</div>
								<!--Takes user to group page-->
							</form>
						</div>
					</div>
				</div>
			</div>
			<br>
			<?php include_once 'footer.php';?>
		</div>
	</body>
</html>
