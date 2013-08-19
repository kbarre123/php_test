<?php 

/* Connect to the MySQL database via PDO */
$db_host 		= "localhost";
$db_username 	= "root";
$db_password 	= "root";
$db_name 		= "test_db";

try {
$db = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_name, $db_username, $db_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}

catch(PDOException $e) {
	echo $e->getMessage(); //This method returns the error message.
}





/* Connect to the MySQL database via mysqli
$db=mysqli_connect("localhost","root","root", "test_db");

 //Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 
 */

  
?>
