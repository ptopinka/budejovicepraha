
/*
     Initialize and render the Menu when its elements are ready 
     to be scripted.
*/

YAHOO.util.Event.onContentReady("leftmenu", function () {

    /*
		Instantiate a Menu:  The first argument passed to the constructor
		is the id for the Menu element to be created, the second is an 
		object literal of configuration properties.
    */

    var oMenu = new YAHOO.widget.Menu("leftmenu", { 
                                            position: "static", 
                                            hidedelay:  750, 
                                            lazyload: true });


										    oMenu.addItems([
/*
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
*/
										        ]);



    oMenu.render();

});