<!DOCTYPE>

<html>
<head>
  <title>test_db</title>
  <link rel="stylesheet" type="text/css" href="../../bogusbarrett/buyouseafood/codiqa.ext.css">
</head>
<body>

<?php

//Establish connection with database.
require("database.php");

$result = mysqli_query($con,
    "SELECT * FROM Vendors v 
        INNER JOIN Prices p ON v.vendor_id=p.vendor_id 
        INNER JOIN Products pr ON pr.product_id=p.product_id 
        ORDER BY v.vendor_name"
    );
?>

<!-- Averages div -->
<div class="grid_10 stats">
</div>

<!-- Table div -->
<div class="grid_10">
    <?php
    //Store results in array, loop through and display all results.     
    //Set up HTML table.

    echo "<table class='main_table' border='1'>
        <thead class='table_head'>
            <tr>
                <th>Vendor Name</th>
                <th>Price</th>
                <th>Feeds</th>
                <th>$/person</th>
            </tr>
        </thead>";

    //Echo results in an HTML table.
        echo "<tbody>";
    while($row = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td>" . $row['vendor_name'] . "</td>";
        echo "<td>$" . number_format((float)($row['price']), 2, '.', '') . "</td>";
        echo "<td>" . $row['feeds'] . "</td>";

        //Calculate $/person, round float to 2 decimal places.
        echo "<td>$" . number_format((float)($row['price']/$row['feeds']), 2, '.', '') . "</td>";      

        echo "</tr>";
      }
        echo "</tbody>";
        echo "</table>";

    //Close connection.
    mysqli_close($con);
    ?>
</div>
</body>
</html>




























