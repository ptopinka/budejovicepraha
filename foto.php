<html>
<head>
	<?php 
	require("functions.php");
	require("admin/db.php");

	 ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title>České Budějovice - Praha</title>


   <style type="text/css">
   #custom-doc { width:76.92em;*width:75.07em;min-width:1000px; margin:auto; text-align:left; }
   </style>
 
<link rel="stylesheet" type="text/css" href="yui/build/assets/skins/sam/skin.css">


<script type="text/javascript" src="js/bubbling-min.js"></script>

<?php
	printGeneralInclude();
?>
<?php
	printRolloverInclude();

?>


<script type="text/javascript"> 
/*
Copyright (c) 2009, Dave Lozier
Code licensed under the BSD License:
http://davelozier.com/bsd/license.txt
version: 1.0
*/
YAHOO.namespace("simpleLightbox");
var myLightbox = function () {
	var Event = YAHOO.util.Event, Dom = YAHOO.util.Dom, currentThumb, slbActive = false, slbDisplay;
	var slblinks = Dom.getElementsByClassName('slbLink', 'a');
 
	var fadeIn = function() {
		var ani = new YAHOO.util.Anim(slbDisplay , { opacity: {from: 0, to: 1 } }, .5, YAHOO.util.Easing.easeOut);
		ani.animate();
	}
 
	var showImage = function (obj,header) {
		var vpw = Dom.getViewportWidth() - 50;
		var vph = Dom.getViewportHeight() - 100;
		if (obj.width > vpw || obj.height > vph){
			var objRatio = obj.width / obj.height;
			var vpRatio = vpw / vph;
			if (objRatio <= vpRatio) {
				obj.height = vph;
				obj.width = obj.width * (vph / obj.height);
			} else {
				obj.width = vpw;
				obj.height = obj.height * (vpw / obj.width);
			}
		}
		YAHOO.simpleLightbox.photoViewer.cfg.setProperty('width', (obj.width + 20)  + 'px');
		YAHOO.simpleLightbox.photoViewer.setHeader(unescape(header));
		Dom.setStyle(slbDisplay,'width', obj.width+'px');
		Dom.setStyle(slbDisplay,'height', obj.height+'px');
		Dom.setStyle(slbDisplay,'background', 'url('+obj.src+') no-repeat');
		YAHOO.simpleLightbox.photoViewer.center();
		if (slbActive == false) {
			slbActive = true;
			YAHOO.util.Dom.setStyle(slbDisplay, 'opacity', '1');
			YAHOO.simpleLightbox.photoViewer.show();
		} else {
			fadeIn();
		}
	}
 
	var fadeOut = function(obj,header) {
		if (slbActive == true) {
			var ani = new YAHOO.util.Anim(slbDisplay , { opacity: {from: 1, to: 0 } }, .5, YAHOO.util.Easing.easeOut);
			ani.animate();
			ani.onComplete.subscribe(function(){showImage(obj,header)});
		} else {
			showImage(obj,header);
		}
	}
	
	var loadImage = function(el) {
		if (el.src && el.src != '') {
			currentThumb = el.src;
			var imageSrc = el.parentNode.href;
			var header = (el.alt != null) ? el.alt : '';
			var objImage = new Image();
			Event.on(objImage, 'load', function(){fadeOut(objImage,header);});
			objImage.src = imageSrc;
		}
	}
	
	var prevThumb = function() {
		for (i=0; i<slblinks.length; i++) {
			if (slblinks[i].firstChild.src == currentThumb) {
				if (i == 0) {
					i = slblinks.length-1;
				} else {
					i = i - 1;
				}
				loadImage(slblinks[i].firstChild);
				break;
			}
		}
	}
	
	var nextThumb = function() {
		for (i=0; i<slblinks.length; i++) {
			if (slblinks[i].firstChild.src == currentThumb) {
				if (i == slblinks.length-1) {
					i = 0;
				} else {
					i = i + 1;
				}
				loadImage(slblinks[i].firstChild);
				break;
			}
		}
	}
	
	var hideMe = function() {
		slbActive = false;
		this.hide();
	}
	
	YAHOO.simpleLightbox.photoViewer = new YAHOO.widget.SimpleDialog("photoViewer",{
		width: "300px",
		fixedcenter: true,
		visible: false,
		draggable: false,
		close: false,
		modal: true,
		text: '<div id="slbDisplay"></div>',
		constraintoviewport: true,
		effect: [ {effect:YAHOO.widget.ContainerEffect.FADE,duration:0.5} ],
		buttons: [ { text:"Prev", handler:prevThumb },{ text:"Next", handler:nextThumb },{ text:"Close", handler:hideMe, isDefault:true } ]
	});
	
	YAHOO.simpleLightbox.photoViewer.setHeader('Simple Lightbox');
	YAHOO.simpleLightbox.photoViewer.render("container");
	slbDisplay = Dom.get('slbDisplay');
	
	YAHOO.Bubbling.addDefaultAction('slbLink',
		function (layer, args) {
			loadImage(args[1].target);
			return true;
		}
	);
}
YAHOO.util.Event.addListener(window, "load", myLightbox);
</script>


<script type="text/javascript" src="js/highslide/highslide.js"></script>
<link rel="stylesheet" type="text/css" href="js/highslide/highslide.css" />

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
		<p><h1>	Fotografie ze závodů</h1>

					<h2> Fotografie z ročníku 2010</h2>
					<h4>za následující fotografie děkujeme autorům: Tereza Svobodové, Tomáši Odvárkovi a Vladimíru Fořtovi</h4>
			 	<table width="100%">
					<tr>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8402.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8402_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8406.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8406_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8407.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8407_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
				    </tr>

					<tr><td colspan="3">&nbsp;</td></tr>
					<tr>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8411.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8411_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8415.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8415_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8418.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8418_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
				    </tr>

					<tr><td colspan="3">&nbsp;</td></tr>

					<tr>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8419.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8419_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8422.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8422_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8424.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8424_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
				    </tr>
					<tr><td colspan="3">&nbsp;</td></tr>

					<tr>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8425.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8425_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8442.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8442_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8447.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8447_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
				    </tr>
					<tr><td colspan="3">&nbsp;</td></tr>

					<tr>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8450.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8450_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8453.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8453_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
						<td align="right"><a id="thumb1" href="img/2010/DSC_8456.JPG" class="highslide" onclick="return hs.expand(this)">
							<img src="img/2010/th/DSC_8456_t.jpg" alt="Highslide JS"
								title="Click to enlarge"  /></a>
						<div class="highslide-caption">
						    	...
						</div>
						</td>
				    </tr>

				</table>

			<h3>Oficiální plakát závodu</h3>
			Kliknutím na obrázek si můžete stáhnout pdf soubor
			<a href="img/plakat.pdf"><img src="img/plakat.jpg"></a>


			<br/><br/>
			<h1>Trocha historie</h1>
<!--


<table class="imageTable"> 
<tr> 
<td><img src="img/old/1-th.jpg" id="photo1"/></td> 
<td><img src="img/old/2-th.jpg" id="photo2"/></td> 
<td><img src="img/old/3-th.jpg" id="photo3"/></td> 
</tr> 
<tr> 
<td><img src="img/old/4-th.jpg" id="photo4"/></td> 
<td><img src="img/old/5-th.jpg" id="photo5"/></td> 
<td><img src="img/old/6-th.jpg" id="photo6"/></td> 
</tr> 
<tr> 
<td><img src="img/old/7-th.jpg" id="photo7"/></td> 
<td><img src="img/old/8-th.jpg" id="photo8"/></td> 
<td><img src="img/old/9-th.jpg" id="photo9"/></td> 
</tr> 

</table>
-->
<div align="center">
<table class="imageTable"> 
<tr> 
	<td align="right"><a id="thumb1" href="img/old/1.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/old/1-th.jpg" alt="Highslide JS"
			title="Click to enlarge"  /></a>
	<div class="highslide-caption">
	    	...
	</div>
	</td>
	<td align="right"><a id="thumb1" href="img/old/2.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/old/2-th.jpg" alt="Highslide JS"
			title="Click to enlarge"  /></a>
	<div class="highslide-caption">
	    	...
	</div>
	</td>
	<td align="right"><a id="thumb1" href="img/old/3.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/old/3-th.jpg" alt="Highslide JS"
			title="Click to enlarge"  /></a>
	<div class="highslide-caption">
	    	...
	</div>
	</td>

</tr> 
<tr align="center"> 
	<td align="right"><a id="thumb1" href="img/old/4.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/old/4-th.jpg" alt="Highslide JS"
			title="Click to enlarge"  /></a>
	<div class="highslide-caption">
	    	...
	</div>
	</td>
	<td align="right"><a id="thumb1" href="img/old/5.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/old/5-th.jpg" alt="Highslide JS"
			title="Click to enlarge"  /></a>
	<div class="highslide-caption">
	    	...
	</div>
	</td>
	<td align="right"><a id="thumb1" href="img/old/6.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/old/6-th.jpg" alt="Highslide JS"
			title="Click to enlarge"  /></a>
	<div class="highslide-caption">
	    	...
	</div>
	</td>

<tr align="center"> 

	<td align="right"><a id="thumb1" href="img/old/7.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/old/7-th.jpg" alt="Highslide JS"
			title="Click to enlarge"  /></a>
	<div class="highslide-caption">
	    	...
	</div>
	</td>
	<td align="right"><a id="thumb1" href="img/old/8.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/old/8-th.jpg" alt="Highslide JS"
			title="Click to enlarge"  /></a>
	<div class="highslide-caption">
	    	...
	</div>
	</td>
	<td align="right"><a id="thumb1" href="img/old/9.jpg" class="highslide" onclick="return hs.expand(this)">
		<img src="img/old/9-th.jpg" alt="Highslide JS"
			title="Click to enlarge"  /></a>
	<div class="highslide-caption">
	    	...
	</div>
	</td>

</tr> 

</table>


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









