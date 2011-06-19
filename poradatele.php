<html>
<head>
	<?php 
	require("functions.php");
	require("admin/db.php");

	 ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title>České Budějovice - Praha</title>


   <link rel="stylesheet" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" type="text/css">
   <style type="text/css">
   #custom-doc { width:76.92em;*width:75.07em;min-width:1000px; margin:auto; text-align:left; }
   </style>


<?php
	printGeneralInclude();
?>
<?php
	printRolloverInclude();

?>


</head>
<body>
<div id="custom-doc" class="yui-t1">
   <div id="hd" role="banner">
   		<?php
			printHeader();
		?>
   </div>
   <div id="bd" role="main">
	<div id="yui-main">
	<div class="yui-b"><div class="yui-ge">
    <div class="yui-u first">
	    <h1>Realizační tým:</h1>
		<p>

			<ul>
				<li>Odvárko Michael &nbsp;+420 776 699 436</li>
				<li>Náprstek Petr   &nbsp;+420 777 336 361</li>
				<li>Odvárko Tomáš   &nbsp;+420 728 952 693</li>
			</ul>
			<b>e-mail:</b> budejovicepraha(at)gmail.com
		</p>

			
	</div>
    <div class="yui-u">
		<?php
			printBanners();
		?>
    </div>
</div>
</div>
	</div>
	<div class="yui-b">
    	<?php
			printLeftMenu();

    	?>
	</div>
	
	</div>
   <div id="ft" role="contentinfo">
   	 <?php
   	 	printFooter();
   	 ?>
   </div>
</div>
</body>
</html>








