<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title>České Budějovice - Praha</title>


<script type="text/javascript" src="yui/build/menu/menu-min.js"></script>
<link rel="stylesheet" type="text/css" href="yui/build/menu/assets/skins/sam/menu.css" /> 

<link rel="stylesheet" type="text/css" href="yui/build/reset-fonts-grids/reset-fonts-grids.css" /> 
<link rel="stylesheet" type="text/css" href="yui/build/layout/assets/layout-core.css" /> 
<script type="text/javascript" src="yui/build/yahoo-dom-event/yahoo-dom-event.js"></script> 
<script type="text/javascript" src="yui/build/element/element-min.js"></script> 
<script type="text/javascript" src="yui/build/selector/selector-min.js"></script> 
<script type="text/javascript" src="yui/build/layout/layout-min.js"></script>
   <link rel="stylesheet" href="yui/build/reset-fonts-grids/reset-fonts-grids.css" 




<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/fonts/fonts-min.css" /> 

<script type="text/javascript" src="yui/build/container/container_core-min.js"></script> 
<script type="text/javascript" src="yui/build/menu/menu-min.js"></script> 
 <script type="text/javascript" src="yui/build/menu/menu.js"></script> 


<link rel="stylesheet" type="text/css" href="js/global.css"/>



   <style type="text/css">
   #doc1 { width:76.92em;*width:75.07em;min-width:1000px; margin:auto; text-align:left; }


/*margin and padding on body element
  can introduce errors in determining
  element position and are not recommended;
  we turn them off as a foundation for YUI
  CSS treatments. */
	
    div.yuimenu .bd {
    
        zoom: normal;
    
    }
   </style>
</head>
<body>
<div id="doc1" class="yui-t2">
   <div id="hd" >	
	 <div id="header">
   		<img src="img/header_1.jpg">
	  </div>
	</div>
	<div id="bd" role="main">
		<div id="yui-main">
			<div class="yui-b">
				<div class="yui-g">
				    <h1>	ZÁVOD České Budějovice - Praha</h1>
					<p></p>
						<h2>Úvod</h2>
					<p>

						<div id="imguvod1" class="imguvod1">
						
						
						</div>
						Závod České Budějovice - Praha je pro všechny kanoisty " žijící " legenda. Zanikl
						v roce 1954 v souvislosti s napuštěním Vltavské přehradní kaskády, kdy zmizelo staré koryto
						řeky s proudící vodou pod klidnou hladinou vodních nádrží.
						Jak se změnila řeka, tak se změnila i kanoistika. A nyní přichází čas ukázat, že dnešní
						borci jsou ještě lepší než naši předchůdci před padesáti lety...
						Závod České Budějovice – Praha by měl ukázat, v dnešní době opomíjenou, střední
						Vltavu jako krásné místo ke sportovní a rekreační plavbě...

					</p>
			<!-- YOUR DATA GOES HERE -->
				</div>
			</div>
		</div>
		<div id="nav" class="yui-b">
			<div id="basicmenu" class="yuimenu"></div>
		
		</div>
        <div id="right" role="contentinfo">
			<div  class="banner">
		    	<img src="img/vajda.jpg">

			</div>
		    <div  class="banner">
		    	<img src="img/nelo.jpg">

			</div>
		</div>

	</div><!--end of body-->
</div>

<script> 

YAHOO.util.Event.onDOMReady( function () {
 

	    var oenu = new YAHOO.widget.Menu("basicmenu", {
			position: "static",
			hidedelay:  750, 
			shadow: true,
            lazyload: true
	});

	    oenu.addItems([

	            { text: "Úvod", url: "index.php" },
	            { text: "Aktuality", url: "aktuality.php" },
				{ text: "Propozice", url: "propozice.php" },
				{ text: "Podrobné info k závodu", url: "podrobnosti.php" },
				{ text: "Popis Etap", url: "etapy.php" },
				{ text: "Přihlášky", url: "prihlasky.php" },
				{ text: "Foto", url: "foto.php" },
				{ text: "Výsledky", url: "vysledky.php", selected: "true" },
	            { text: "Pořadatelé",  url: "poradatele.php" },
	            { text: "Sponzoři",  url: "sponzori.php" }

	        ]);



	    oenu.render();


	    // Show the Menu instance    

	    oenu.show();


	/*
	    var oMenu = new YAHOO.widget.Menu("basicmenu",{  
			                                            position: "static",  
			                                            hidedelay:  750, 
			 											shadow: true,
			                                            lazyload: true });

	    oMenu.render();
	    oMenu.show();
	*/

});


(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event;
 
    Event.onDOMReady(function() {
        var layout = new YAHOO.widget.Layout('doc1', {
            height: Dom.getClientHeight(), //Height of the viewport
            width: Dom.get('doc1').offsetWidth, //Width of the outer element
            minHeight: 150, //So it doesn't get too small
            units: [
                { position: 'top', height: 150	, body: 'hd' },
                { position: 'left', width: 180, body: 'nav', grids: true },
                { position: 'right', width: 240, body: 'right',grids:true },
                { position: 'center', body: 'bd', grids: true }
            ]
        });
        layout.on('beforeResize', function() {
            Dom.setStyle('doc1', 'height', Dom.getClientHeight() + 'px');
        });
 
        layout.render();
 
        //Handle the resizing of the window
        Event.on(window, 'resize', layout.resize, layout, true);
    });
})();





</script>

</body>
</html>