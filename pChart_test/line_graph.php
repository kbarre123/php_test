<?php

/* Include files */
include("header.php");

//This can be swapped for either PDO or mysqli versions of line_graph_generator
include("line_graph_generator_PDO.php"); 
?>

<div class="container">
	<div class="graph_12">
		<h1>Average Live Crawfish Prices</h1>
		<br />
		<p>
			Notes for this graph:
		</p>
		<ul>
			<li>Why are there only 48 weeks?.</li>
			<li>Need to redo the numbering scheme to have 52 weeks, not 48.</li>
		</ul>
	</div>
	<br />
	<div class="graph_12">
		<img src="graphs/small.png">
	</div>
	<div class="graph_12">
		<span data-picture data-alt="A graph of average seafood prices during 2013.">
	        <span data-src="graphs/medium_640.png" data-media="(min-width: 640px)"></span>
	        <span data-src="large_1200.png" data-media="(min-width: 800px)"></span>

	        <!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
	        <noscript>
	            <img src="graphs/small.jpg" alt="A graph of average seafood prices during 2013.">
	        </noscript>
	    </span>
	</div>
</div>

<?php 
/* Include footer */
include("footer.php");

?>