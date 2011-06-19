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
	    <h1>	Výsledková listina</h1>
		 <p><h2>	Výsledky za rok 2010</h2>
			<ul>
				<li>Dlouhý závod    <a href="img/vysledky_cbp_2010.pdf">zde</a></li>
				<li>Krátký závod    <a href="img/vysledky_cbp_2010_kratky.pdf">zde</a><li>
			</ul>
<p>

			
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








