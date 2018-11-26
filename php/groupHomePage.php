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

	if ($_SERVER['REQUEST_METHOD'] === 'GET')
	{
		if(isset($_GET['groups']))
		{
			$group = $_GET['groups'];
			$admins = GetAllAdminForGroup($group);
			$isAdmin = FALSE;
			for($i = 0; $i < count($admins); $i++)
			{
				if($admins[$i]['Username'] == $UN)
				{
					$isAdmin = TRUE;
					break;
				}
			}
			//TODO: need php functions to get all group members and assign to $members
			//TODO: need php to get all the weights for members to create graph
			$dates = GetStartAndEndDateFromGroup($group);
			$startDate = $dates[0]['StartDate'];
			$endDate = $dates[0]['EndDate'];
		}
		else
		{
			print "<p class='text-center text-danger'>Error getting the group informat from
			the database.</p>";
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
	    if (isset($_POST['btnAddAdmin']))
		{
	        $insertAdmin = InsertAdminToGroup($_POST['selectGroupAdmin'], $group);
			if($insertAdmin)
			{
				print "<p class='text-center text-danger'>New admin successfully added.</p>";
			}
			else
			{
				print "<p class='text-center text-danger'>There was an error adding a new group admin.
				Please try again later.</p>";
			}
	    }

		if (isset($_POST['btnDeleteAdmin']))
		{
	        $deleteAdmin = DeleteAdminFromGroup($_POST['selectDeleteAdmin'], $group);
			if($deleteAdmin)
			{
				print "<p class='text-center text-danger'>Admin successfully deleted.</p>";
			}
			else
			{
				print "<p class='text-center text-danger'>There was an error deleting a group admin.
				Please try again later.</p>";
			}
	    }

		if(isset($_POST['btnDeleteUser']))
		{
			$deleteUser = DeleteUserFromGroup($_POST['selectDeleteUser'], $group);
			if($deleteUser)
			{
				print "<p class='text-center text-danger'>User successfully deleted.</p>";
			}
			else
			{
				print "<p class='text-center text-danger'>There was an error deleting a user.
				Please try again later.</p>";
			}
		}

		if(isset($_POST['btnAddUser']))
		{
			$newUser = trim($_POST['txtAddUser'], " ");
			$addUser = InsertUserIntoGroup($newUser, $group);
			if($addUser)
			{
				print "<p class='text-center text-danger'>User successfully added.</p>";
			}
			else
			{
				print "<p class='text-center text-danger'>There was an error adding a user.
				Please try again later.</p>";
			}
		}

		//TODO: Add function to update end date
	}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Biggest Loser</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="stylesheet" type="text/css"  href="../css/mainStyle.css" />
	</head>
	<body>
		<?php include_once 'navigationBar.php';?>
		<div class="container">
			<h2 id="groupName" class="biggestLoser">
				<?php print $group?>
			</h2>
			<?php
				if($isAdmin)
				{
					print "<div id='admin'>";
					include_once 'groupAdmin.php';
					print "</div>";
				}
			?>
			<div id="graph">
			</div>
			<div class = "container">
				<h2>Weight Lost Progress</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Member</th>
							<th>Weight Lost Progress</th>
						</tr>
					</thead>
					<!--Print the rest of the data with php from DB-->
				</table>
			</div>
		</div>
		<br>
		<?php include_once 'footer.php';?>
	</body>
</html>
