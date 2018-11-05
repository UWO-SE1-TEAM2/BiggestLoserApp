<html>
	<head> 
		<meta charset="utf-8" />
		<title>Biggest Loser</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<?php include_once 'header.php';?>
		<div class="container-fluid">
			<p id="groupName">Group 1</p>
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
		<?php include_once 'footer.php';?>
	</body>
</html>