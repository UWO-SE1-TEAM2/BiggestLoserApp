<?PHP
$error='';
if(isset($_POST['submit'])) {
	$password_1=$_POST['newPassword'];
	$password_2=$_POST['confirmNewPassword'];
	if (empty($_POST['oldPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmNewPassword'])) {
		$error = "Error : change password fields must all be completed";
	}
	else if ($password_1 === $password_2){
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['oldPassword'];
		$newPassword=$_POST['confirmNewPassword'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$connection = mysql_connect("localhost", "SWTeam2", "SWTeam2", "j670");
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// Selecting Database
		$db = mysql_select_db("SWTeam2", $connection);
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysql_query("SELECT * FROM User WHERE HashedPassword='$password' AND Username='$username'", $connection);
		$rows = mysql_num_rows($query);
		if ($rows == 1) {
			$query = mysql_query("UPDATE User SET HashedPassword='$newPassword' WHERE Username='$username'", $connection);
			$rows = mysql_num_rows($query);
			$error="Success! Your password has been updated.";
		} 
		else
			$error = "Error : username or password is incorrect";
	mysql_close($connection); // Closing Connection
	
	}
	else
		$error = "Error : new passwords do not match";
}
?>