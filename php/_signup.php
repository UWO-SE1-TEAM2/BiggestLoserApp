<!--
    Handle Validations in Javascript
    - Password and Confirm Mismatch
    - Ajax call to check if username taken
-->
<!DOCTYPE html>

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sign Up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css"  href="account.css" />
    
    </head>


<form  method="post">
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <div class="form-group">
            <label>Username</label>
            <input id="username" type="text" name="username" class="form-control" required>
            <span id="usernameErr"></span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
            <span id="passwordErr"></span>
        </div>
        <div class="form-group">
            <label class="confirm_password">Confirm Password</label>
            <input id="confirm_password" type="password" name="confirm_password" class="form-control" required>
            <span id="confirmErr"></span>
        </div>
        <div class="form-group button">
            <input type="submit" class="btn btn-primary" value="Register">
        </div>
        <p>Already have an account? <a href="_login.php">Login here</a>.</p>
    </div>
</form>
</html>


