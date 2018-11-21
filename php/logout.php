<?php 
session_start(); 

if(isset($_SESSION['username'])){
    
unset($_SESSION['username']);

session_destroy();

header("Location: " . "index.php");

echo '<h2>Thank you for Logging out.  You will now be redirected to our log in page.</h2>';

die();

}?>