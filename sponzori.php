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


<script type="text/javascript" src="js/highslide/highslide.js"></script>
<link rel="stylesheet" type="text/css" href="js/highslide/highslide.css" />

<link rel="stylesheet" type="text/css" href="yui/build/tabview/assets/skins/sam/tabview.css" /> 
<script type="text/javascript" src="yui/build/tabview/tabview-min.js"></script> 

<!--
    2) Optionally override the settings defined at the top
    of the highslide.js file. The parameter hs.graphicsDir is important!
-->

<script type="text/javascript">
    hs.graphicsDir = 'js/highslide/graphics/';
    hs.outlineType = 'rounded-white';
</script>





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
	    
	
		<h1 > Hlavní partneři závodu </h1>
		
		<div  align="center">
	    	<a href="http://www.navaclavce.cz/"><img src="img/logonavaclavce.PNG"></a>
	    	
	    	<a href="http://www.ubuldoka.cz/"><img src="img/logobuldok.PNG"></a>
	    	
	    	<a href="http://www.regulus.cz"><img src="img/regulus.png"></a>
	    
		</div>
 		
				<h1 > Partneři závodu </h1>
				
		   		
				
			    <!--
			    	<a href="http://www.dr-abe.cz"><img src="img/logo_strom.png"></a>
				-->
			
			 			
			    	<!--a href="http://www.vehicle.cz"><img width="100px" src="img/logo_vehicle.png"></a-->
				
					<br/>
			
					<div align="center">
				   	<a href="http://www.mamacoffee.cz"><img src="img/mama.jpeg"></a>
			    	
			    	<a href="http://www.sportzbraslav.org"><img src="img/zbraslavbaner1.PNG"></a>
		  	    	</div>
					<br/>
					<div align="center">
					<a href="http://www.kickthewaves.com/"><img src="img/waves.png"></a>
					<!--a href="http://www.trojkaenergy.cz"><img src="img/logo_trojka.PNG"></a-->
					</div>
	
					<br/>
				  	
					<div align="center">
			    	<a href="http://www.hiko.cz"><img src="img/hiko.PNG"></a>
		    		<a href="http://h2omaniaks.com/"><img src="img/H2Omaniaks.jpg"></a>
					</div>
				<h1 >Partnerské instituce</h1>
			    <div class="banner">	
				<a href="http://www.c-budejovice.cz/en/stranky/welcome-page.aspx"><img src="img/cb_logo.jpeg"></a>
				</div>
				<h1 >Mediální partneři</h1>
			    <div  class="banner_3jezy">
			    	<a href="http://www.hydromagazin.cz"><img src="img/hydro.png"></a>
				</div>

			    <div  class="banner_3jezy">
				    	<a href="http://www.adrex.cz"><img src="img/adrex.jpeg"></a>
				</div>


				<h1 >Partnerské akce</h1>
				 <div align="center">
				   	<a href="http://www.krumlovskymaraton.com"><img src="img/krumlov.PNG"></a>
				</div>
				<br/>
				 <div align="center">
			    	<a href="http://3jezy.skauting.cz"><img src="img/Praha_logo_bar.jpg"></a>
				</div>
					<br/>
					<br/>
					<br/>
				
				
				
				
		
		



		

			
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








