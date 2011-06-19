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
		 			    <p><h1>	Přihlášky</h1>
		<p>
			Přihlášky prosím zasílejte e-mailem na naši adresu <A HREF="mailto:budejovicepraha@gmail.com?subject=Prihláška na Maraton Budějovice Praha&body= (Zde prosím vložte text přihlásky, který najdete na stránce )">budejovicepraha@gmail.com</a>. Do těla emailu vložte prosím text, který je uveden dole na této stránce. Text stačí zkopírovat a doplnit Vaše údaje. Z kategorií nechte pouze tu, do které se chcete přihlásit, zbytek vymažte.
		</p>
		</br>

		<div>
		<pre id="prihlaska">
Kategorie : muži - K1,C1,C2,
	    ženy - K1,K2,C1,C2 , K2 mix, 
	    veteráni/nky - K1,K2,C1,C2,K2 mix, 
	    junioři/rky K1,K2,C1,C2 , 
	    C2 turista 
	    K2 turista (viz propozice)
	    pramice

závod :   3-denní celý / 1-denní krátký 

Jméno a příjmení  : 

Oddíl : 
E-mail, telefon : 
Národnost : 
Rok narození :

Transport věcí během závodu:    mám / nemám zájem 
( max. 2 zavazadla na osobu )

Platba startovného :  
	1.převodem na účet :153612171/0600 , 
                        v.s. datum narození -DDMMRR
	2.nebo v hotovosti : Petr Náprstek , tel : +420777336361
		</pre>
		</div>
			
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








