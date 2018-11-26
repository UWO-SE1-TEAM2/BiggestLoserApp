<button type="button" id="addAdmin" class="btn btn-primary" data-toggle="modal"
	data-target="#addAdminDiv">
	Add Group admin
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
						<input class="btn btn-info form-control" name="btnAdddmin" type="submit" value="Add Admin">
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
						<input class="btn btn-info form-control" name="btnDeleteUser" type="submit" value="Delete User">
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
						<input class="btn btn-info form-control" name="updateAdmin" type="submit" value="updateEndDate">
					</div>
					<!--Takes user to group page-->
				</form>
			</div>
		</div>
	</div>
</div>
