<button type="button" id="addAdmin" class="btn btn-primary" data-toggle="modal"
	data-target="#addAdminDiv">
	Add Group Admin
</button>
<button type="button" id="deleteAdmin" class="btn btn-primary" data-toggle="modal"
	data-target="#deleteAdminDiv">
	Delte Group Admin
</button>
<button type="button" id="deleteUser" class="btn btn-primary" data-toggle="modal"
	data-target="#deleteUserDiv">
	Delete User
</button>
<button type="button" id="updateEndDate" class="btn btn-primary" data-toggle="modal"
	data-target="#updateEndDateDiv">
	Update End Date
</button>

<div class="modal fade" id="addAdminDiv" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Add New Admin</h3>
			</div>
			<div class="modal-body">
				<form method="post" action="groupHomePage.php"><!--Sends info to database-->
					<div class="form-group" class="form-control" size="10">
						<!--TODO: generate drop down with group members usernames-->
						<select name="selectGroupAdmin">

						</select>
						<input class="btn btn-info form-control" name="btnAddAdmin" id="btnAddAdmin"
						 	type="submit" value="Add Admin">
					</div>
					<!--Takes user to group page-->
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteAdminDiv" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Delete Admin</h3>
			</div>
			<div class="modal-body">
				<form method="post" action="groupHomePage.php"><!--Sends info to database-->
					<div class="form-group" class="form-control" size="10">
						<!--TODO: generate drop down with group admins usernames-->
						<select name="selectDeleteAdmin">
							<?php
								for($i = 0; $i < count($admins[0]); $i++)
								{
									print "<option value=" . $admins[0]['Username'] . ">";
									print $admins[0]['Username'];
									print "</option>";
								}
							 ?>
						</select>
						<input class="btn btn-info form-control" name="btnDeleteAdmin" id="btnDeleteAdmin"
						 	type="submit" value="Delete Admin">
					</div>
					<!--Takes user to group page-->
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteUserDiv" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Delete User</h3>
			</div>
			<div class="modal-body">
				<form method="post" action="groupHomePage.php"><!--Sends info to database-->
					<div class="form-group">
						<!--TODO: generate drop down with group members usernames-->
						<select name="selectDeleteUser" class="form-control" size="10">

						</select>
						<input class="btn btn-info form-control" name="btnDeleteUser"
						 	id="btnDeleteUser" type="submit" value="Delete User">
					</div>
					<!--Takes user to group page-->
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="updateEndDateDiv" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Update End Date</h3>
			</div>
			<div class="modal-body">
				<form method="post" action="groupHomePage.php"><!--Sends info to database-->
					<div class="form-group">
						<!--TODO: generate drop down with group members usernames-->
						<label for="newEndDate">Update End Date</label>
						<input id="newEndDate" name="newEndDate" type="date">
						<input class="btn btn-info form-control" name="btnUpdateAdmin" id="btnUpdateAdmin"
							type="submit" value="updateEndDate">
					</div>
					<!--Takes user to group page-->
				</form>
			</div>
		</div>
	</div>
</div>
