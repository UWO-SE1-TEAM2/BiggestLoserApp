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

	/*
		gets the group user name
	*/
	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
	    //something posted
		if(isset($_POST['groups']))
		{
			$group = $_POST['groups'];
			$admins = GetAllAdminForGroup($group);
			print_r($admins);
			$isAdmin = false;
			for($i = 0; $i < count($admins[0]); $i++)
			{
				if($admins[0]['Username'] == $UN)
				{
					$isAdmin = true;
				}
			}
			//TODO: need php functions to get all group members and assign to $members
		}
		else
		{
			// code...
		}

	    if (isset($_POST['btnAddAdmin']))
		{
	        $insert = InsertAdminToGroup($_POST['selectGroupAdmin'], $group);
			if($insert)
			{
				print "<p class='text-center text-danger'>New admin successfully added</p>";
			}
	    }

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
