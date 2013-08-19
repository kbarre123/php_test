<!-- This is an example of how you can connect to a DB with PHP Data Object, or PDO.  I created a new PDO object and assigned it to the variable $db below.  Now, we can call methods on this object using the "->" operator. -->

<?php 

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

?>
