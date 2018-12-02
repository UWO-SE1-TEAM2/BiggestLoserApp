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
	/*Create Group and Insert Users*/
	if(isset($_POST["createGroupBtn"]))
	{
		if(isset($UN))
		{
			$allGroups = GetAllGroups();
			$groupAlreadyExists = FALSE;
			/*
				Checks if the selcted group name already exists or not. Group names must be unique.
			*/
			for($i = 0; $i < count($allGroups); $i++)
			{
				if($allGroups[$i]['Name'] == $_POST['groupName'])
				{
					$groupAlreadyExists = TRUE;
					break;
				}
			}

			//Creates Group
			if(!$groupAlreadyExists)
			{
				InsertGroupUser($_POST["groupName"], $_POST["startDateInsert"], $_POST['endDateInsert']);
				//Adds creater to admin group
				InsertAdminToGroup($UN, $_POST['groupName']);
				//Adds creater to group
				InsertUserIntoGroup($UN, $_POST['groupName']);
				//Inserts Users into group
				$users = $_POST["groupMembers"];
				$userArr = explode(', ', $users);
				if(isset($userArr))
				{
					try
					{
						for($i = 0; $i < count($userArr); $i++)
						{
							$currUsername = GetUserbyUsername($userArr[$i]);
							if(count($currUsername) > 0)
							{
								InsertUserIntoGroup($userArr[$i], $_POST["groupName"]);
							}
							else
							{
								print "<p class='text-center text-danger'>The username " .
								$userArr[$i] . " does not exist and could
								not be added to the group " . $_POST['groupName'] . ".</p>";
							}
						}
					}
					catch(PDOException $e)
					{
						echo "Database Error.";
					}
				}
			}
			else
			{
				print "<p class='text-center text-danger'>The group name " . $_POST['groupName'] .
				" is already taken. Please try a different group name.</p>";
			}
		}
	}

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

	$groups = GetGroupsByUser($UN);

	$weights = GetCurrentWeightOfUser($UN);
	$countWeights = count($weights);
	if($countWeights > 0)
	{
		$currWeight = $weights[$countWeights - 1]['Weight'];
		$firstWeight = $weights[0]['Weight'];
		$weightLost = intval($currWeight) - intval($firstWeight);
		$weightExists = TRUE;
	}
	else
	{
		$weightExists = FALSE;
	}
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
					<h2 id="username">
						<?php echo $UN;?>
					</h2>
					<!--Display Current weight-->
					Current Weight:
					<em id="currentWeight">
						<?php
							if($weightExists)
							{
								print $currWeight . " lbs";
							}
							else
							{
								print "No weight data available.";
							}
						?>
					</em>
					<br>
					Progress:
					<em id="totalWeightDifference">
						<?php
							if($weightExists)
							{
								print $weightLost . " lbs ";
								if(intval($currWeight) > intval($firstWeight))
								{
									print "gained";
								}
								else
								{
									print "lost";
								}
							}
							else
							{
								print "No weight data available";
							}
						 ?>
					</em>
					<br>
					<br>
					<form method="post" action="home.php"> <!-- Sends info to database -->
						<div class="form-group">
							<label for="weight">Weight (lbs)</label>
							<input type="text" name="weight" id="weight" class="form-control"
								placeholder="Enter new weight">
							<br>
							<label for="dateOfWeight">Date of Weight</label>
							<input type="date" id="dateOfWeight" name="dateOfWeight" class="form-control">
							<br>
							<input type="submit" name="submitBtn" class="btn btn-info form-control"
								value="Update Weight">
						</div>
						<div class="form-group">

						</div>
					</form>
				</div>
				<div class="col-md-8" id="col2">
					<h2>Your Groups: </h2>
					<form method="post" action="groupHomePage.php">
						<div class="form-group">
							<select name="groups" class="form-control" size="8">
								<!--TODO: generate groups from db and delete static group 1 option -->
								<?php
									for($i = 0; $i < count($groups); $i++)
									{
										print "<option value='" . $groups[$i]['GroupName'] . "'>";
										print $groups[$i]['GroupName'];
										print "</option>";
									}
								 ?>
							</select>
							<br>
							<input name="goToGroup" type="submit" class="btn btn-info form-control" value="Go To Group">
						</div>
					</form>

					<div class="form-group">
						<button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#groupInfo">
						  Start New Group
						</button>
					</div>

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
							<form method="post" action=""><!--Sends info to database-->
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
									<input type="date" id="startDate" name="startDateInsert" class="form-control" required>
									<br>
									<label for="endDate">Biggest Loser End Date:</label>
									<input type="date" id="endDate" name="endDateInsert" class="form-control" required>
									<br>
									<input class="btn btn-info form-control" name="createGroupBtn" type="submit" value="Create group">
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
