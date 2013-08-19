<!DOCTYPE>

<html>
<head>
  <title>test_db</title>
  <link rel="stylesheet" type="text/css" href="../../../bogusbarrett/buyouseafood/codiqa.ext.css">
</head>
<body>

<!-- Return query results using PDO object -->

<?php

//Include file to connect with database.
require("../database.php");

//Query
$result = $db->query("SELECT * FROM Vendors V INNER JOIN Prices P ON V.vendor_id=P.vendor_id INNER JOIN Products PR ON PR.product_id=P.product_id WHERE price!=0 ORDER BY price");

//Set up HTML table.
echo "<table class='main_table' border='1'>
    <thead>
        <tr>
            <th class='table_head'>Vendor Name</th>
            <th class='table_head'>Price</th>
        </tr>
    </thead>
    <tbody>";

//Echo results in an HTML table.
while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr>";
    echo "<td>" . $row['vendor_name'] . "</td>";
    echo "<td>$" . number_format((float)($row['price']), 2, '.', '') . " /lb.</td>";
    echo "</tr>";
  }
echo "</tbody>
	</table>";

?>

</body>
</html>




























