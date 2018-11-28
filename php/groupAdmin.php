<button type="button" id="addAdmin" class="btn btn-primary" data-toggle="modal"
	data-target="#addAdminDiv">
	Add Group Admin
</button>
<button type="button" id="deleteAdmin" class="btn btn-primary" data-toggle="modal"
	data-target="#deleteAdminDiv">
	Delte Group Admin
</button>
<button type="button" id="addUser" class="btn btn-primary" data-toggle="modal"
	data-target="#addUserDiv">
	Add User
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
						<label for="selectGroupAdmin">Select New Group Admin</label>
						<select name="selectGroupAdmin" id="selectGroupAdmin" class="form-control" size="10">
							<?php
								for($i = 0 ; $i < count($members) ; $i++)
								{
									if($members[$i]['Username'] != $UN)
									{
										print "<option value='" . $members[$i]['Username'] . "'>";
										print $members[$i]['Username'];
										print "</option>";
									}
								}
							?>
						</select>
						<br>
						<input type="hidden" name="groups" value= <?php print $group ?> >
						<input class="btn btn-info form-control" name="btnAddAdmin" id="btnAddAdmin"
						 	type="submit" value="Add New Admin">
					</div>
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
								for($i = 0; $i < count($admins); $i++)
								{
									print "<option value='" . $admins[$i]['Username'] . "'>";
									print $admins[$i]['Username'];
									print "</option>";
								}
							 ?>
						</select>
						<input type="hidden" name="groups" value= <?php print $group ?> >
						<input class="btn btn-info form-control" name="btnDeleteAdmin" id="btnDeleteAdmin"
						 	type="submit" value="Delete Admin">
					</div>
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
							<?php
								for($i = 0; $i < count($members); $i++)
								{
									print "<option value='" . $members[$i]['Username'] . "'>";
									print $members[$i]['Username'];
									print "</option>";
								}
							 ?>
						</select>
						<input type="hidden" name="groups" value= <?php print $group ?> >
						<input class="btn btn-info form-control" name="btnDeleteUser"
						 	id="btnDeleteUser" type="submit" value="Delete User">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addUserDiv" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Add User</h3>
			</div>
			<div class="modal-body">
				<form method="post" action="groupHomePage.php"><!--Sends info to database-->
					<div class="form-group">
						<!-- TODO: allow add multiple users at once -->
						<label for="txtAddUser">Username:</label>
						<input type="text" class="form-control" name="txtAddUser" id="txtAddUser">
						<br>
						<input type="hidden" name="groups" value= <?php print $group ?> >
						<input class="btn btn-info form-control" name="btnAddUser"
						 	id="btnAddUser" type="submit" value="Add User">
					</div>
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
						<input id="newEndDate" name="newEndDate" type="date" class="form-control">
						<input type="hidden" name="groups" value= <?php print $group ?> >
						<br>
						<input class="btn btn-info form-control" name="btnUpdateEndDate" id="btnUpdateEndDate"
							type="submit" value="Update End Date">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
