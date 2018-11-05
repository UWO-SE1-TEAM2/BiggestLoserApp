<!--
    Form needs to be styled
-->
<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css"  href="account.css" />
    
    </head>
        <body>
            <form method="post">
                <div class="wrapper">
                    <h2>Login</h2>
                    <p>Please fill in your credentials to login.</p>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="button">
                        
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    
                        <p>Don't have an account? <a href="_signup.php">Sign up now</a>.</p>
                </div>
            </form>
        </body>
</html>

