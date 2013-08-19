<!DOCTYPE>

<html>
<head>
  <title>test_db</title>
  <link rel="stylesheet" type="text/css" href="../../../bogusbarrett/buyouseafood/codiqa.ext.css">
</head>
<body>

<!-- Calculate average price of all items in Prices table. -->

<?php

//Include file to connect with database.
require("../database.php");

//Calculate total of price column from Prices table.
$result_1a = $db->query("SELECT SUM(price) FROM Prices WHERE product_id=1 AND price!=0");
//Put results into array.
$data_1a = $result_1a->fetchAll(PDO::FETCH_ASSOC);

//Count number of rows in Price table
$result_1b = $db->query("SELECT count(*) FROM Prices WHERE product_id=1 AND price!=0");
$rows = $result_1b->fetch(PDO::FETCH_NUM);

//Calculate average price.
	//Store total_price.
		$total_price = $data_1a[0]['SUM(price)'];
	//Store number_rows.
		$number_rows = $rows[0];
	//Divide total price by total rows.
		$avg = $total_price / $number_rows;
?>

<div class="grid_10 black_center">
	<?php 
	echo "Average Price: $";
	echo number_format((float)$avg, 2, '.', '');
	?>
</div>

<div class="grid_10">
<?php

//Query
$result = $db->query("SELECT * FROM Vendors V INNER JOIN Prices P ON V.vendor_id=P.vendor_id INNER JOIN Products PR ON PR.product_id=P.product_id WHERE PR.product_id=1 AND price!=0 ORDER BY price");

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
</div>


</body>
</html>




























