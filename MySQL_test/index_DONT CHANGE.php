<!-- This doc tests MySQL with PHP. The individual block of code, delimited by comments
for each block, should not all be run at the same time. -->

<?php
$con=mysqli_connect("localhost","root","root", "my_db");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {
  	echo "Connected to database. <br />";
  }

/*Create database
$sql="CREATE DATABASE my_db";
if (mysqli_query($con,$sql))
  {
  echo "Database my_db created successfully. <br />";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con) . ".<br />";
  }*/

/*Create table
$sql = "CREATE TABLE Persons (
PID INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(PID),
FirstName CHAR(15),
LastName CHAR(15),
Age INT
)";

// Execute query
if (mysqli_query($con,$sql))
  {
  echo "Table persons created successfully. <br />";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con) . ".<br />";
  }*/

/*Insert data into table.
mysqli_query($con,"INSERT INTO Persons (FirstName, LastName, Age)
VALUES ('Peter', 'Griffin', 35)");

mysqli_query($con,"INSERT INTO Persons (FirstName, LastName, Age)
VALUES ('Glenn', 'Quagmire', 33)");
*/

/*Store query in variable.
$result = mysqli_query($con,"SELECT * FROM Persons");

//Store results in array, loop through and display all results.
while($row = mysqli_fetch_array($result))
  {
  echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br>";
  }*/

//Store results in variable.
$result = mysqli_query($con,"SELECT * FROM Persons");

//Set up HTML table.
echo "<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
</tr>";

//Echo results in an HTML table.
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "</tr>";
  }
echo "</table>";



mysqli_close($con);

?> 




























