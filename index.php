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
		<?php

			$result = selectAct();
			while($row = mysql_fetch_array($result))
			  {
				echo '<div id="aktualitaDiv">';
					echo "<table width='100%' class='aktualita' id='aktualita'>";
					echo "<tr><td class='first'>autor: ".$row['name']."</td><td class='first'>".$row['publishdate']."</td></tr>";
					echo "<tr><td colspan='2'>".$row['aktualita']."</td></tr>";
					echo "</table>";
				echo '</div>';
			  }

		?>

			
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





