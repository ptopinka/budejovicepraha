<?php

function printHeader() {
	print <<<END
  		 <div id="header">
	    	<a href="index.php" alt="Závod České Budějovice - Praha" title="Závod České Budějovice - Praha"><img src="img/web_zahlavi.png"></a>
		  </div>
END;
}

function printFooter() {
	print <<<END
<div align="center"><p>pavel(.)topinka(at)gmail(.)com & Jakub Náprstek  - Tvorba stránek a grafický design</p></div>
END;
}

function printRolloverInclude() {
	print <<<END
		<style type="text/css">
			img {cursor:hand;cursor:pointer}
		</style>
		<script type="text/javascript" src="yui/build/yahoo/yahoo-min.js"></script>
		<script type="text/javascript" src="yui/build/dom/dom-min.js"></script>
	    <script type="text/javascript" src="yui/build/selector/selector-min.js"></script>
	    <script type="text/javascript" src="yui/build/event/event-min.js" ></script>
		<script type="text/javascript" src="js/metadata-min.js"></script>
		<script type="text/javascript" src="js/swapimage-min.js"></script>

		<script type="text/javascript">
			YAHOO.plugin.SwapImage.bind(".swapImage");
		</script>

END;
}


function printBanners() {
	print <<<END
<p> 



  		<div  class="banner">
	    	<a href="http://www.navaclavce.cz/"><img src="img/logonavaclavce.PNG"></a>

		</div>
    <div  class="banner">
  	  	<a href="http://http://www.ubuldoka.cz/"><img src="img/logobuldok.PNG"></a>
		</div>

 		<div  class="banner">
	    	<a href="http://www.regulus.cz"><img src="img/regulus.png"></a>
		</div>

		  		<div  class="banner">
	    	<a href="http://www.sportzbraslav.org"><img src="img/zbraslavbaner.PNG"></a>

		</div>
		<div  class="banner">
			    	<a href="http://www.mamacoffee.cz"><img src="img/mama.jpeg"></a>

				</div>

			  		<div  class="banner">
				    	<a href="http://www.hiko.cz"><img src="img/hiko.PNG"></a>

					</div>

		  	

			  		<div  class="banner_waves">
				    	<a href="http://www.kickthewaves.com/"><img src="img/waves.png"></a>

					</div>

	
	
	    
		
		
			<div  class="banner_vehicle">
		    	<a href="http://h2omaniaks.com/"><img src="img/H2Omaniaks.jpg"></a>

			</div>

				<div  class="banner">
			    	<a href="http://www.krumlovskymaraton.com"><img src="img/krumlov.PNG"></a>

				</div>

		    <div  class="banner_3jezy">
		    	<a href="http://www.hydromagazin.cz"><img src="img/hydro.png"></a>

			</div>

			    <div  class="banner_3jezy">
			    	<a href="http://www.adrex.cz"><img src="img/adrex.jpeg"></a>

				</div>

		    
		    <div  class="banner_3jezy">
		    	<a href="http://3jezy.skauting.cz"><img src="img/Praha_logo_bar.jpg"></a>

			</div>
			
			    <div  class="banner_3jezy">
			    	<a href="http://www.c-budejovice.cz/en/stranky/welcome-page.aspx"><img src="img/cb_logo.jpeg"></a>

				</div>
			
			<div class="bannerr">
			<!--<a href="http://www.facebook.com/pages/Praha-5-Zbraslav/SK-Sport-Zbraslav/116004558438997" title="SK Sport Zbraslav" target="_TOP" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;">SK Sport Zbraslav</a><br/><a href="http://www.facebook.com/pages/Praha-5-Zbraslav/SK-Sport-Zbraslav/116004558438997" title="SK Sport Zbraslav" target="_TOP"><img src="http://badge.facebook.com/badge/116004558438997.905.215768317.png" width="120" height="163" style="border: 0px;" /></a><br/><a href="http://www.facebook.com/business/dashboard/" title="Make your own badge!" target="_TOP" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;">Promote your Page too</a> -->
			</div>

</p>	
END;
}


function printLeftMenu() {
	print <<<END
		<div id="leftmenu" class="yuimenuu">
    <p><script type="text/javascript" src="js/mapper.js"></script></p> 
    <div style="margin-left:0px; margin-top:5px;"> 


<img src="img/web_menu.png" alt="USA Image Map Example" usemap="#usamap" class="mapper" alt="Shapes" ismap="ismap" />
<map name="usamap"> 
  <area href="index.php" shape="polygon" coords="33,18, 153,28, 151,51, 32, 41" alt="Alaska"/>
  <area href="historie.php" shape="polygon" coords="23,59, 134,41, 141,67, 28,86" alt="Alaska"/>
  <area href="propozice.php" shape="polygon" coords="51,85, 165,72, 166,103, 52,112" alt="Alaska"/>
  <area href="podrobnosti.php" shape="polygon" coords="38, 109, 168,109, 167,138, 38,138" alt="Alaska"/>
  <area href="etapy.php" shape="polygon" coords="19,150, 88,139, 148,139, 152,160, 23, 176" alt="Alaska"/>
  <area href="prihlasky.php" shape="polygon" coords="62,171, 79,168 , 167,180, 165,202, 59,188" alt="Alaska"/>
  <area href="foto.php" shape="polygon" coords="40,192 , 108,195, 145,200, 143,220, 105,223, 38,215" alt="Alaska"/>
  <area href="vysledky.php" shape="polygon" coords="71,226, 165,219, 166,243, 88,249, 74,248" alt="Alaska"/>
  <area href="poradatele.php" shape="polygon" coords="34,245, 152,256, 151,279, 31, 268" alt="Alaska"/>
  <area href="press.php" shape="polygon" coords="33,290, 147,276, 152,304, 36,316" alt="Alaska"/>
  <area href="sponzori.php" shape="polygon" coords="31,317, 147,312, 147,335, 33, 339 alt="Alaska"/>

</map>
</div>
<!--
<a href="#"><img src="img/web_menu.png" 
 style="border: none;" alt="Shapes" ismap="ismap"/></a>

-->						 
<!--
						<ul>

			            <li>
			                <a  id="propozice" href="index.php">
			                       <img class="swapImage {src: 'img/buttons/aktuality2.PNG'}" src="img/buttons/aktuality1.PNG" alt="propozice">
			                </a>
			            </li>
</ul>

			            <li >
			                <a  href="historie.php">
			                       <img class="swapImage {src: 'img/buttons/historie2.PNG'}" src="img/buttons/historie1.PNG" alt="propozice">
			                </a>
			            </li>

				            <li>
				                <a  id="propozice" href="propozice.php">
				                       <img class="swapImage {src: 'img/buttons/propozice2.PNG'}" src="img/buttons/propozice1.PNG" alt="propozice">
				                </a>
				            </li>
				            <li >
				                <a  href="podrobnosti.php">
				                       <img class="swapImage {src: 'img/buttons/podrobneinfo2.PNG'}" src="img/buttons/podrobneinfo1.PNG" alt="propozice">
				                </a>
				            </li>
				            <li >
				                <a  href="etapy.php">
				                       <img class="swapImage {src: 'img/buttons/popisetap2.PNG'}" src="img/buttons/popisetap1.PNG" alt="">
				                </a>
				            </li>
				            <li >
				                <a  href="prihlasky.php">
				                       <img class="swapImage {src: 'img/buttons/prihlasky2.PNG'}" src="img/buttons/prihlasky1.PNG" alt="">
				                </a>
				            </li>
				            <li >
				                <a  href="foto.php">
				                       <img class="swapImage {src: 'img/buttons/fotogalerie2.PNG'}" src="img/buttons/fotogalerie1.PNG" alt="">
				                </a>
				            </li>
				            <li >
				                <a  href="vysledky.php">
				                       <img class="swapImage {src: 'img/buttons/vysledky2.PNG'}" src="img/buttons/vysledky1.PNG" alt="">
				                </a>
				            </li>
				            <li >
				                <a  href="poradatele.php">
				                       <img class="swapImage {src: 'img/buttons/poradatele2.PNG'}" src="img/buttons/poradatele1.PNG" alt="">
				                </a>
				            </li>
				            <li >
				                <a  href="press.php">
				                       <img class="swapImage {src: 'img/buttons/press2.PNG'}" src="img/buttons/press1.PNG" alt="">
				                </a>
				            </li>				
				            <li >
				                <a  href="sponzori.php">
				                       <img class="swapImage {src: 'img/buttons/sponzori2.PNG'}" src="img/buttons/sponzori1.PNG" alt="">
				                </a>
				            </li>
				        </ul>
						
-->	
	
		</div>
		<div>
		<div  class="bbanner">
			<a href="img/proposition_english.pdf"><img src="img/flag_english.png"></a>
			<a href="img/proposition_german.pdf"><img src="img/flag_german.png"></a>

		</div>
		</div>
END;
}

function printGeneralInclude() {
	print <<<END
	
		
		<script type="text/javascript" src="yui/build/element/element-min.js"></script> 
		<script type="text/javascript" src="yui/build/selector/selector-min.js"></script> 



		<!-- Standard reset, fonts and grids --> 
		<link rel="stylesheet" type="text/css" href="yui/build/reset-fonts-grids/reset-fonts-grids.css"> 

		<link rel="stylesheet" type="text/css" href="yui/build/button/assets/skins/sam/button.css">
		<link rel="stylesheet" type="text/css" href="yui/build/container/assets/skins/sam/container.css"> 
		<script type="text/javascript" src="yui/build/utilities/utilities.js"></script>
		<script type="text/javascript" src="yui/build/button/button-min.js"></script>
		<script type="text/javascript" src="yui/build/container/container-min.js"></script>


		<!-- Page-specific styles --> 
		<link rel="stylesheet" type="text/css" href="js/global.css">
		<!-- Dependency source files --> 
		<script type="text/javascript" src="yui/build/yahoo-dom-event/yahoo-dom-event.js"></script> 
END;
}



?>