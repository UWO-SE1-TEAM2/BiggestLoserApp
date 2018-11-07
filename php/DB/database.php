<?php

  require_once('dbCredentials.php');

  /* Connect to the database with the credentials given in the file above
     Return a handle to the PDO instance or output an error message and exit (stop execution)
   */
  function db_connect() 
  {
	  try 
	  {
		  $db = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_SERVER, DB_USER, DB_PWD, 
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	  } 
	  catch (PDOException $ex) 
	  {
		  die("Unable to connect to database.");
	  }
	  
	  return $db;
  }

  /* disconnect from the database, if needed
   */
  function db_disconnect() 
  {

    global $db;
	  $db = null;

  }

 ?>
