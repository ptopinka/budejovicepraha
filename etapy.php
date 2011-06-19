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

<!--
	1 ) Reference to the files containing the JavaScript and CSS.
	These files must be located on your server.
-->

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
		    <p><h1>Trasa - Jednotlivé Etapy</h1>
			<p>Stažení popisu trati k vytištění na loď <a href="img/popis_trat_lod.pdf">zde</a></p>
			<div id="etapyTab" class="yui-navset">
			    <ul class="yui-nav">
			        <li class="selected"><a href="#tab1"><em>1.etapa</em></a></li>
			        <li><a href="#tab2"><em>2.etepa</em></a></li>
			        <li><a href="#tab3"><em>3.etapa</em></a></li>
					<li><a href="#tab4"><em>celá trasa</em></a></li>
			    </ul>            
			    <div class="yui-content">
			        <div id="tab1"><p>


				<table border="1" width="100%">
					<CAPTION><EM>1.ETAPA</EM></CAPTION>
					<thead>
						<tr><td colspan="2">POPIS TRATI</td>
							<td>říční km</td>
							<td>km etapy</td>
						</tr>
					</thead>

				<tr>

				<tr><td colspan="3">start hromadný pro všechny kategorie<td></tr>
				<tr>
				<td>START</td>
				<td>České Budějovice - ústí Malše do Vlt.</td>
				<td>240</td>
				<td>0</td>
				</tr>
				<tr>
				<td>1.přenáška</td>
				<td>jez České Vrbné</td>
				<td>233,1</td>
				<td>6,5</td>
				</tr>
				<tr>
				<td>2.přenáška</td>
				<td>jez u zámku Hluboká</td>
				<td>229,1</td>
				<td>10,5</td>
				</tr><tr>
				<td>3.přenáška</td>
				<td>VD Hněvkovice</td>
				<td>210,3</td>
				<td>29</td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td>občerstvovací stanice</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
				
				<tr>
				<td>4.přenáška</td>
				<td>jez v Hněvkovicích</td>
				<td>208</td>
				<td>31,5</td>
				</tr><tr>
				<td>5.přenáška</td>
				<td>VD Kořensko</td>
				<td>200,2</td>
				<td>39,3</td>
				</tr>
        <tr>
				<td>CÍL</td>
				<td>Zvíkov - ústí Otavy do Vltavy</td>
				<td>&nbsp;</td>
				<td>70</td>

				</tr>
				</table >
				</p>


				<h2>PODROBNÝ POPIS PRVNÍ ETAPY</h2>

				<h3>1. start České Budějovice - přístaviště Lannova loděnice</h3>
				- Vltavské nábřeží GPS souřadnice: 
				<ul>
					<li>48°58'43.15"N severní šířky</li> 
					<li>14°27'53.664"E východní délky </li>
				</ul>

				<div> 
				<a id="thumb1" href="img/trasa/01_start_CB.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/01_start_CB.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    Start v Českých Budějovicích
				</div>


				<a id="thumb1" href="img/trasa/1_start_CB.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/1_start_CB.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    Start v Českých Budějovicích
				</div>

				<a id="thumb1" href="img/trasa/2_start_CB.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/2_start_CB.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    Start v Českých Budějovicích
				</div>
				</div>



				<h3>2. jez České Vrbné – přenáška vlevo kolem slalomové dráhy</h3>
				<table border="0" width="100%">
					<tr>
					<td>-	vysedání před stavidlem vpusti do slalomové dráhy na břeh nebo zpevněný kraj vpusti


					</td>
					<td>
						<a id="thumb1" href="img/trasa/th/3_Vrbne_vystup.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/3_Vrbne_vystup.JPG" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
						<div class="highslide-caption">
						    Výstup na jezu ve Vrbné
						</div>
					</td>
					<tr>	
					<td>-	přenáška po silnici kolem slalomové dráhy ( cca 600 m )
					</td>
					<td>
					<a id="thumb1" href="img/trasa/02_ceske_vrbne.jpg" class="highslide" onclick="return hs.expand(this)">
						<img src="img/trasa/th/02_ceske_vrbne.jpg" alt="Highslide JS"
							title="Click to enlarge" height="120" width="160" /></a>
					<div class="highslide-caption">
					    Výstup na jezu ve Vrbné
					</div>
					</td>
					</tr>
					<tr>

					<td>-	nasedání na konci slalomové dráhy ze břehu ( po cca 150m pod Kolovadlem je drobný výškový stupeň – průjezdný pro C2 turista a lodě bez kormidla pod lodí)

						</td>
						<td>
						<a id="thumb1" href="img/trasa/4_Vrbne_nastup.jpg" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/4_Vrbne_nastup.jpg" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
						<div class="highslide-caption">
						    Výstup na jezu ve Vrbné
						</div>
						</td>
						</tr>

				</table>
				<br/><br/>


				<h3>3. jez na Hluboké – přenáška vpravo po navigaci ( průjezd propustí – cca 1m vysoký stupeň )</h3>

				<table width="100%">
				<tr  >
				<td witdth="80%">-	vysedání na navigaci vpravo nad  jezem</td>
				<td align="right"><a id="thumb1" href="img/trasa/5_Hluboka_vystup.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/5_Hluboka_vystup.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>

				<div class="highslide-caption">
				    Výstup na Hluboké
				</div>
				</td></tr>
				<tr>
					<td>-	přenáška po navigaci kolem propusti</td>
				<td align="right">
				<a id="thumb1" href="img/trasa/03_hluboka.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/03_hluboka.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    Přenáška po navigaci kolem propusti
				</div></td>
				</tr>
				<tr>
					<td>-	Propust</td>
				<td align="right">
				<a id="thumb1" href="img/trasa/6_Hluboka_jez.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/6_Hluboka_jez.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    Propust
				</div></td>
				</tr>

				<tr>
				<td>-	nasedání z navigace pod propustí</td>
				<td align="right">
				<a id="thumb1" href="img/trasa/7_Hluboka_nastup.JPG" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/7_Hluboka_nastup.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    nasedání z navigace pod propustí
				</div>
				</td>
				</tr>

				<tr>
				<td colspan="2">-	pod jezem po zhruba 1km mělčina ( štěrkový ostrov ) uprostřed řeky</td>

				</tr>
				<tr>

				<td colspan="2">-	po zhruba 2,5km po jezem hrázka v pravé části řeky ( průjezd vlevo )</td>

				<tr>
				</table>


				<br/><br/>

				<h3>4. VD Hněvkovice – přenáška vpravo po silnici</h3>
				<table width="100%">
					<tr>
					<td>-	vysedání na betonové rampě do vody vpravo</td>
					<td>
					<a id="thumb1" href="img/trasa/8_VD_Hnevkovice_vystup.JPG" class="highslide" onclick="return hs.expand(this)">
						<img src="img/trasa/th/8_VD_Hnevkovice_vystup.jpg" alt="Highslide JS"
							title="Click to enlarge" height="120" width="160" /></a>
					<div class="highslide-caption">
					    vysedání na betonové rampě do vody vpravo
					</div>
					</td>
					</tr>
					<tr>
					<td>-	přenáška po betonové silnici ( cca 400 m )</td>

					<td><a id="thumb1" href="img/trasa/04_hnevkovice_prehr.jpg" class="highslide" onclick="return hs.expand(this)">
						<img src="img/trasa/th/04_hnevkovice_prehr.jpg" alt="Highslide JS"
							title="Click to enlarge" height="120" width="160" /></a>
					<div class="highslide-caption">
					    vysedání na betonové rampě do vody vpravo
					</div>
					</td>
					</tr>
					<tr>
					<td>-	nasedání na konci silnice z betonové rampy nebo ze zpevněného břehu</td>
					<td>	<a id="thumb1" href="img/trasa/9_VD_Hnevkovice_nastup.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/9_VD_Hnevkovice_nastup.jpg" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
						<div class="highslide-caption">
						    nasedání na konci silnice z betonové rampy nebo ze zpevněného břehu
						</div>
						</td>
					</tr>
				</table>
				<br/><br/>

				<h3>5. jez v Hněvkovicích – přenáška vlevo po břehu kolem jezu</h3>
				<table width="100%">
				<tr>
					<td> jez v Hněvkovicích</td>
				<td align="right"><a id="thumb1" href="img/trasa/11_jez_Hnevkovice.JPG" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/11_jez_Hnevkovice.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    vysedání na schodech na jezem vlevo
				</div>
				</td>
				</tr>
				<tr>
					<td>-	vysedání na schodech na jezem vlevo</td>
					<td align="right"><a id="thumb1" href="img/trasa/10_jez_Hnevkovice_vystup.JPG" class="highslide" onclick="return hs.expand(this)">
						<img src="img/trasa/th/10_jez_Hnevkovice_vystup.jpg" alt="Highslide JS"
							title="Click to enlarge" height="120" width="160" /></a>
					<div class="highslide-caption">
					    vysedání na schodech na jezem vlevo
					</div>
					</td></tr>
					<tr>
					<td>-	nasedání na schodech pod jezem vlevo<br/>
						- nasedání dle vodního stavu</td>
					<td align="right"><a id="thumb1" href="img/trasa/12_jez_Hnevkovice_nastup.JPG" class="highslide" onclick="return hs.expand(this)">
						<img src="img/trasa/th/12_jez_Hnevkovice_nastup.jpg" alt="Highslide JS"
							title="Click to enlarge" height="120" width="160" /></a>
					<div class="highslide-caption">
					    nasedání na schodech pod jezem vlevo
					</div>
					</td>
				</table>


				<h3>6. VD Kořensko – přenáška vpravo po betonové cestě</h3>
				<table width="100%">
					<tr>
						<td>-	Soutok s Lužnicí</td>
						<td align="right"><a id="thumb1" href="img/trasa/1etapa_09.jpg" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/1etapa_09.jpg" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
						<div class="highslide-caption">
						    	Soutok s Lužnicí
						</div>
						</td></tr>
					
					<tr>
				<td>VD Kořensko</td>
				<td align="right"><a id="thumb1" href="img/trasa/14_VD_Korensko.JPG" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/14_VD_Korensko.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    VD Kořensko – přenáška vpravo po betonové cestě
				</div>
				</td></tr>
				<tr>
					<td>-	vysedání na betonové rampě do vody vpravo</td>
					<td align="right"><a id="thumb1" href="img/trasa/13_VD_Korensko_vystup.JPG" class="highslide" onclick="return hs.expand(this)">
						<img src="img/trasa/th/13_VD_Korensko_vystup.jpg" alt="Highslide JS"
							title="Click to enlarge" height="120" width="160" /></a>
					<div class="highslide-caption">
					    	vysedání na betonové rampě do vody vpravo
					</div>
					</td>
				</tr>
				<tr>
					<td>-	nasedání z betonové navigace</td>
					<td align="right"><a id="thumb1" href="img/trasa/15_VD_Korensko_nastup.JPG" class="highslide" onclick="return hs.expand(this)">
						<img src="img/trasa/th/15_VD_Korensko_nastup.jpg" alt="Highslide JS"
							title="Click to enlarge" height="120" width="160" /></a>
					<div class="highslide-caption">
					    	nasedání z betonové navigace
					</div>
					</td></tr>

				</table>
				<h3>7. Cíl první etapy - Zvíkov - ústí Otavy do Vltavy </h3>

				<table width="100%">

 
	<tr>
		<td> Zvíkov - ústí Otavy do Vltavy </td>
		<td align="right">
	<a id="thumb1" href="img/trasa/2etapa_01.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/trasa/th/2etapa_01.jpg" alt="Highslide JS"
			title="Click to enlarge" height="120" width="160" /></a>
	<div class="highslide-caption">
	    Cíl druhé etapy Zvíkov - ústí Otavy do Vltavy
	</div>
	</td>
	</tr>
				</table>

			
			
			</div> <!-- end div tab1-->
			
			
			
			
			
			
			
			
			<div id="tab2"><p>			
				<br/>
				<table border="1" width="100%">
				<caption>2.ETAPA</caption>
				<thead>
					<tr><td colspan="2">POPIS TRATI</td>

						<td>říční km</td>
						<td>km etapy</td>
					</tr>
				</thead>
				<tr><td colspan="3">start hromadný pro všechny kategorie<td></tr>
				<tr>
				<td>START</td>
				<td>Zvíkov - ústí Otavy do Vltavy</td>
				<td>169,1</td>
				<td>0</td>
				</tr>
			
			<tr>

				<td>1.přenáška</td>
				<td>VD Orlík</td>
				<td>144,6</td>
				<td>28</td>
			</tr>
					<tr>
						<td>&nbsp;</td>
						<td>občerstvovací stanice</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						</tr>
						<tr>
			<tr>

				<td>2.přenáška</td>
				<td>VD Kamýk</td>
				<td>134,7</td>
				<td>39</td>
			</tr>
	

				<td>CÍL</td>
				<td>Skalice - kemp</td>
				<td>95</td>
				<td>75</td>
				</tr>
				</table>
				</p>
				
				<h2>PODROBNÝ POPIS DRUHÉ ETAPY</h2>
	
	
				
				<h3>2.start –  ústí Otavy do Vltavy</h3>
			
							<table width="100%">


      	<tr>
      		<td> Zvíkov  </td>
      		<td align="right">
      	<a id="thumb1" href="img/trasa/2etapa_01.jpg" class="highslide" onclick="return hs.expand(this)">
      		<img src="img/trasa/th/2etapa_01.jpg" alt="Highslide JS"
      			title="Click to enlarge" height="120" width="160" /></a>
      	<div class="highslide-caption">
      	    start 2.etapy - ústí Otavy do Vltavy
      	</div>
      	</td>
      	</tr>
      				</table>
			
		
				<h3>2. VD Orlík – přenáška vpravo ( zastavení času na 30min na občerstvení a svoz lodí lodním
				výtahem nebo automobil s vlekem )</h3>
				<table width="100%">
					<tr>
						<td>- vysedání na schodech nebo zpevněném břehu napravo od hráze, zastavení času na 30min
							<br/>
								- převoz lodí dolů výtah nebo auto, občerstvovací stanice
							<br/>
								- nasedání vpravo pod hrází , vystartování pořadatelem
						 </td>
						<td align="right">
					<a id="thumb1" href="img/trasa/08_orlik.jpg" class="highslide" onclick="return hs.expand(this)">
						<img src="img/trasa/th/08_orlik.jpg" alt="Highslide JS"
							title="Click to enlarge" height="120" width="160" /></a>
					<div class="highslide-caption">
					    vysedání na schodech nebo zpevněném břehu napravo od hráze, zastavení času na 30min
					</div>
					</td>
					</tr>
				<!--
				<tr>
					<td> 	- převoz lodí dolů výtah nebo auto, občerstvovací stanice</td>
					<td align="right">
				<a id="thumb1" href="img/trasa/08_orlik.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/08_orlik.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    	 převoz lodí dolů výtah nebo auto, občerstvovací stanice
				</div>
				</td>
				</tr>

			
				<tr>
					<td> nasedání vpravo pod hrází , vystartování pořadatelem</td>
					<td align="right">
				<a id="thumb1" href="img/trasa/08_orlik.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/08_orlik.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    nasedání vpravo pod hrází , vystartování pořadatelem
				</div>
				</td>
				</tr>
-->
				
				
				</table  >
				<h3>3.VD Kamýk – přenáška vpravo po silnici</h3>
				<table width="100%">
					<tr>
						<td> - vysedání na schodech vpravo mezi ocelovými lávkami</td>
						<td align="right">
					<a id="thumb1" href="img/trasa/16_VD_Kamyk_vystup.jpg" class="highslide" onclick="return hs.expand(this)">
						<img src="img/trasa/th/16_VD_Kamyk_vystup.jpg" alt="Highslide JS"
							title="Click to enlarge" height="120" width="160" /></a>
					<div class="highslide-caption">
					    - vysedání na schodech vpravo mezi ocelovými lávkami
					</div>
					</td>
					</tr>
				
				<tr>
					<td> - přenáška po silnici mezi ploty ( cca 300 m )</td>
					<td align="right">
				<a id="thumb1" href="img/trasa/09_kamyk.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/09_kamyk.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    - přenáška po silnici mezi ploty ( cca 300 m )
				</div>
				</td>
				</tr>
				
				<tr>
					<td> - nasedání na schodech nebo ze zpevněného břehu</td>
					<td align="right">
				<a id="thumb1" href="img/trasa/17_VD_Kamyk_nastup.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/17_VD_Kamyk_nastup.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    - nasedání na schodech nebo ze zpevněného břehu
				</div>
				</td>
				</tr>
				
				</table>
				<h3>4. cíl – Autokemp Slapy Skalice – molo pro přistávání lodí vlevo</h3>
				<table  width="100%">
				<tr>
					<td>  Autokemp Slapy Skalice – molo pro přistávání lodí vlevo</td>
					<td align="right">
				<a id="thumb1" href="img/trasa/Slapy_001.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/Slapy_001.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    Autokemp Slapy Skalice – molo pro přistávání lodí vlevo
				</div>
				</td>
				</tr>
				</table>
				
				</div> <!-- end tab2-->
				
				
		        <div id="tab3">
			<br/>
			<p>
				<table border="1" width="100%">
					<caption>3.ETAPA</caption>
					<thead>
						<tr><td colspan="2">POPIS TRATI</td>
							<td>říční km</td>
							<td>km etapy</td>
						</tr>
					</thead>
					<tr>
					
				<tr>
				<td colspan="3">přesun po vodě na start Skalice - VD Slapy + přenos</td>
					
				<td>cca 4km</td>
				</tr><tr>
				<td>START</td>
				<td>VD Slapy - pod hrází</td>
				<td>91,7</td>
				<td>0</td>
			</tr><tr>
				<td>1.přenáška</td>
				<td>VD Štěchovice</td>
				<td>84,4</td>
				<td>7</td>
			</tr><tr>
				<td>2.přenáška</td>
				<td>VD Vranné</td>
				<td>71,4</td>
				<td>20</td>
			</tr><tr>
				<td>&nbsp;</td><td>občerstvovací stanice</td><td>&nbsp;</td><td>&nbsp;</td>
			</tr><tr>
				<td>3.přenáška/průjezd</td>
				<td>jez Modřany</td>
				<td>62,2</td>
				<td>29</td>
			</tr><tr>
				<td>CÍL</td>
				<td>Praha - Braník ( u loděnice Konstruktiva )</td>
				<td>60,5</td>
				<td>31,5</td>
					</tr>
				</table>
				</p>
				
				<h2>PODROBNÝ POPIS TŘETÍ ETAPY</h2>
				
				
				<h3>1. Přesun po vodě – cca 3 km k VD Slapy – přenáška vlevo</h3>
				<table  width="100%">
				<tr>
					<td> - vysedání na rampě vlevo cca 200 m před hrází </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/Slapy_002.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/Slapy_002.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				- vysedání na rampě vlevo cca 200 m před hrází    
				</div>
				</td>
				</tr>
				
				<tr>
					<td> - přenáška po cestě od rampy na silnici, poté po silnici, která jde přes hráz, dále směrem do obce Slapy, po cca 200 m od hráze schody ve stráni vedoucí dolů k řece <br/>
						- délka přenášky cca 1km<br/>
						-	nasedání z rampy na konci silnice vedoucí k vodě
						</td>
					<td align="right">
				<a id="thumb1" href="img/trasa/11_slapy_start3etapy.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/11_slapy_start3etapy.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
					- přenáška po cestě od rampy na silnici, poté po silnici, která jde přes hráz, dále směrem do obce Slapy, po cca 200 m od hráze schody ve stráni vedoucí dolů k řece				    
				</div>
				</td>
				</tr>


	
		
				
				</table>
				
				
				<h3>2. start pod VD Slapy – na levé straně u rampy do vody</h3>

				<h3>3. VD Štěchovice – přenáška vpravo</h3>
				<table  width="100%">
				<tr>
					<td> - vysedání na schodech ve zpevněném břehu vpravo cca 100m od hráze </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/1_vylez_Stechovice.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/1_vylez_Stechovice.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				- vysedání na schodech ve zpevněném břehu vpravo cca 100m od hráze    
				</div>
				</td>
				</tr>
				
				<tr>
					<td> - přenáška po silnici kolem hráze ( cca 300 m ) </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/12_stechovice.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/12_stechovice.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    - přenáška po silnici kolem hráze ( cca 300 m )
				</div>
				</td>
				</tr>
				
				<tr>
					<td> - nasedání z betonové rampy do vody </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/2_nastup_Stechovice.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/2_nastup_Stechovice.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				   - nasedání z betonové rampy do vody 
				</div>
				</td>
				</tr>
				
				<tr>
					<td> - pod VD Štěchovice 3km ostrov Kilián uprostřed řeky, doporučujeme objet zprava, dálenásleduje přítok Sázavy zprava </td>
									<td align="right">
								<a id="thumb1" href="img/trasa/3etapa_02.jpg" class="highslide" onclick="return hs.expand(this)">
									<img src="img/trasa/th/3etapa_02.jpg" alt="Highslide JS"
										title="Click to enlarge" height="120" width="160" /></a>
								<div class="highslide-caption">
								   - Ostrov Kilian a přítok Sázavy 
								</div>
								</td>			
									</tr>
				
				</table>
				<h3>4. VD Vrané nad Vlt. – přenáška vlevo</h3>
				<table  width="100%">
				<tr>
					<td>- vysedání na schodech vlevo  </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/3_vylez_Vrany.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/3_vylez_Vrany.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    - vysedání na schodech vlevo
				</div>
				</td>
				</tr>
				
				<tr>
					<td> 	- přenáška po cestě kolem hráze a pak dolů k vodě </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/13_vrane.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/13_vrane.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				    	- přenáška po cestě kolem hráze a pak dolů k vodě
				</div>
				</td>
				</tr>

			
				<tr>
					<td> 	- nasedání schody nebo z nezpevněného břehu na konci cesty </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/4_nastup_Vrany.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/4_nastup_Vrany.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				  	- nasedání schody nebo z nezpevněného břehu na konci cesty   
				</div>
				</td>
				</tr>

			
				<tr>
					<td>- 1km za novým dálničním mostem přítok Berounky zleva  </td>
					
									<td align="right">
								<a id="thumb1" href="img/trasa/3etapa_06.jpg" class="highslide" onclick="return hs.expand(this)">
									<img src="img/trasa/th/3etapa_06.jpg" alt="Highslide JS"
										title="Click to enlarge" height="120" width="160" /></a>
								<div class="highslide-caption">
								   - 1km za novým dálničním mostem přítok Berounky zleva 
								</div>
								</td>
				</tr>

				
				</table>
				<h3>5. jez Modřany – přenáška vlevo ( průjezd sportovní propustí vlevo )</h3>
				<table  width="100%">
				<tr>
					<td> - vysedání na betonové schody před začátkem náhonu do propusti  </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/5_vystup_Modrany.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/5_vystup_Modrany.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				 - vysedání na betonové schody před začátkem náhonu do propusti    
				</div>

				</td>
				</tr>
				<tr>
					<td> -  nebo na schodech	z náhonu vedoucího do sportovní propusti </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/6_vystup2_Modrany.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/6_vystup2_Modrany.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				 -  nebo na schodech	z náhonu vedoucího do sportovní propusti    
				</div>

				</td>
				</tr>
				
				<tr>
					<td> - přenáška po břehu nebo silnici </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/14_modrany.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/14_modrany.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				   - přenáška po břehu nebo silnici 
				</div>
				</td>
				</tr>

				
				<tr>
					<td> - sportovní propust – „ retardéra „ - průjezd možný i na rychlostních kajacích s kormidlem pod lodí  
						<br/>
						- nasedání na schodech pod koncem propusti nebo z betonová rampy na konci cesty
						
						
						</td>
					<td align="right">
				<a id="thumb1" href="img/trasa/7_nastup_retardera_Modrany.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/7_nastup_retardera_Modrany.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
					- sportovní propust – „ retardéra „ - průjezd možný i na rychlostních kajacích s kormidlem pod lodí    
				</div>
				</td>
				</tr>

		<!--		
				<tr>
					<td> 	-nasedání na schodech pod koncem propusti nebo z betonová rampy na konci cesty </td>
					<td align="right">
						<a id="thumb1" href="img/trasa/7_nastup_retardera_Modrany.jpg" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/7_nastup_retardera_Modrany.jpg" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				-nasedání na schodech pod koncem propusti nebo z betonová rampy na konci cesty	    
				</div>
				</td>
				</tr>
				-->
				</table>
			
				<h3>6.cíl AC Sparta Praha, U ledáren 8, Praha 4 - Braník – molo pro přistávání lodí vpravo</h3>
				<table  width="100%">
				<tr>
					<td> -za železničním mostem objíždět ostrov zprava, cíl po 600m </td>
					<td align="right">
				<a id="thumb1" href="img/trasa/15_cil_sparta.jpg" class="highslide" onclick="return hs.expand(this)">
					<img src="img/trasa/th/15_cil_sparta.jpg" alt="Highslide JS"
						title="Click to enlarge" height="120" width="160" /></a>
				<div class="highslide-caption">
				-za železničním mostem objíždět ostrov zprava, cíl po 600m    
				</div>
				</td>
				</tr>
				
				</table>
				
				
				
				</div> <!--end of tab 3-->
				<div id="tab4"><p>
						<h2>Celková trasa</h2>
						<table  width="100%">
						<tr>
							<td> - Třetí etapa start a cíl </td>
							<td align="right">
						<a id="thumb1" href="img/trasa/3etapa_komplet.jpg" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/3etapa_komplet.jpg" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
						<div class="highslide-caption">
						- Třetí etapa    
						</div>
						</td>
						</tr>
						<tr>
							<td> - Druhá etapa cíl </td>
							<td align="right">
						<a id="thumb1" href="img/trasa/2etapa_cast2.jpg" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/2etapa_cast2.jpg" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
						<div class="highslide-caption">
						- Druhá etapa   
						</div>
						</td>
						</tr>
						<tr>
							<td> - Druhá etapa start</td>
							<td align="right">
						<a id="thumb1" href="img/trasa/2etapa_cast1.jpg" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/2etapa_cast1.jpg" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
						<div class="highslide-caption">
						- Druhá etapa     
						</div>
						</td>
						</tr>
						<tr>
							<td> - První etapa cíl </td>
							<td align="right">
						<a id="thumb1" href="img/trasa/1etapa_cast2.jpg" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/1etapa_cast2.jpg" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
						<div class="highslide-caption">
						- První etapa    
						</div>
						</td>
						</tr>
						<tr>
							<td> - První etapa start </td>
							<td align="right">
						<a id="thumb1" href="img/trasa/1etapa_cast1.jpg" class="highslide" onclick="return hs.expand(this)">
							<img src="img/trasa/th/1etapa_cast1.jpg" alt="Highslide JS"
								title="Click to enlarge" height="120" width="160" /></a>
						<div class="highslide-caption">
						- První etapa    
						</div>
						</td>
						</tr>
						
					</table>	


				</div>

			    </div><!-- end of tab content-->
			



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

<script type="text/javascript">
    var tabView = new YAHOO.widget.TabView('etapyTab');
</script>

</body>
</html>






