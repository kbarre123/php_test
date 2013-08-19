<?php 

//This shows how to connect to DB, query and generate a chart using PDO *PREFERRED METHOD*

include("database.php");

/* pChart library inclusions */
include("pChart2.1.3/class/pDraw.class.php");
include("pChart2.1.3/class/pImage.class.php");
include("pChart2.1.3/class/pData.class.php");

/* Create and populate the pData object */
$myData = new pData();  

/* Build the query that will returns the data to graph */
$Result = $db->query("SELECT * FROM Avg_Prices
						WHERE product_id=2");

/* Set fetch type */
$Result->setFetchMode(PDO::FETCH_ASSOC);

/* Push the results of the query to an array */
$week_id=""; 
$avg_price="";

while($row = $Result->fetch()) {
	$week_id[]   = $row["week"];
	$avg_price[] = $row["avg_price"];
}
 
/* Save the data in the pData array */
$myData->addPoints($week_id,"week"); //don't change name
$myData->addPoints($avg_price,"avg_price"); //name used in the legend
 
/* Put the week_print column on the abscissa axis */
$myData->setAbscissa("week");

/* Y axis will be dedicated to $USD */
$myData->setAxisName(0,"Dollars");
$myData->setAxisUnit(0,"$");

/* Create the pChart object */
$myPicture = new pImage(1100, 360, $myData);

/* Turn of Antialiasing */
$myPicture->Antialias = FALSE;

/* Add a border to the picture */
$myPicture->drawRectangle(0, 0, 1099, 359, array("R"=>0, "G"=>0, "B"=>0));

/* Write the chart title */
$myPicture->setFontProperties(array("FontName"=>"pChart2.1.3/fonts/Forgotte.ttf","FontSize"=>11));
$myPicture->drawText(200, 35, "Average Live Crawfish Price", array("FontSize"=>20, "Align"=>TEXT_ALIGN_BOTTOMMIDDLE));

/* Set the default font */
$myPicture->setFontProperties(array("FontName"=>"pChart2.1.3/fonts/pf_arma_five.ttf", "FontSize"=>8));

/* Define the chart area */
$myPicture->setGraphArea(60, 40, 1045, 318);

/* Draw the scale */
$scaleSettings = array("XMargin"=>10, "YMargin"=>10, "Floating"=>TRUE, "GridR"=>200, "GridG"=>200, "GridB"=>200, "DrawSubTicks"=>TRUE, "CycleBackground"=>TRUE);
$myPicture->drawScale($scaleSettings);

/* Turn on Antialiasing */
$myPicture->Antialias = TRUE;

/* Draw the line chart */
$myPicture->drawLineChart();

/* Write the chart legend */
$myPicture->drawLegend(540, 20, array("Style"=>LEGEND_NOBORDER, "Mode"=>LEGEND_HORIZONTAL));

/* Save the graph to the server */
$myPicture->Render("graphs/line_graph.png");

//Close connection.
$db = NULL;

?>