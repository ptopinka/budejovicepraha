/*
* Author: Cuong Tham
* You must not remove the following information:
* YUI Lightbox Beta
* From TheCodeCentral.com
* 1/1/2007
*
* For installation instruction, bug report and feature suggestion,
* please visit http://thecodecentral.com/2008/01/01/yui-based-lightbox-final
*
* Licensed under the Creative Commons Attribution-ShareAlike License, Version 3.0 (the "License")
* You may obtain a copy of the License at
* http://creativecommons.org/licenses/by-sa/3.0/
*/

YAHOO.namespace('com.thecodecentral');

var $E = YAHOO.util.Event;
var $  = YAHOO.util.Dom.get;
var $D = YAHOO.util.Dom;
var $TCC = YAHOO.com.thecodecentral;
//var $L = console.log;

/**
* clear the content of a given DOM element
* @private
*/
YAHOO.com.thecodecentral.empty = function(elem){
	while(elem.firstChild){
		elem.removeChild(elem.firstChild);
	}
};

/**
 * Count the length of an associative array 
 */
YAHOO.com.thecodecentral.countAsc = function(a){
	var counter = 0;
	for(var i in a){
		counter++;
	}
	return counter;
};
YAHOO.com.thecodecentral.LoadingPanel = function(conf){
	if(conf == undefined){
		conf = new Array();
	}
	if(conf.id == undefined){
		conf.id = 'loadingPanel';
	}
	if(conf.header == undefined){
		conf.header = 'Loading, please wait...';
	}
	if(conf.width == undefined){
	  conf.width = "240px";
	}

	this.conf = conf;
	this.init();
	
};

YAHOO.com.thecodecentral.LoadingPanel.prototype = {
	init:function(){
		this.loadingPanel =
		new YAHOO.widget.Panel(this.conf.id,{
			width:this.conf.width,
			fixedcenter:true,
			close:false,
			draggable:false,
			modal:true,
			visible:false,
			zindex: "150"
		});

		
		this.loadingPanel.setBody(this.conf.header + '<img src="http://us.i1.yimg.com/us.yimg.com/i/us/per/gr/gp/rel_interstitial_loading.gif" />');
		this.loadingPanel.render(document.body);
		$D.addClass(this.loadingPanel.id, 'tcc_lightboxLoader');
		
		var cancelLink = document.createElement('a');
		$D.setStyle(cancelLink, 'cursor', 'pointer');
		cancelLink.appendChild(document.createTextNode('Cancel'));
		$E.on(cancelLink, 'click', function(e, o){
		    o.self.hide();
		}, {self:this.loadingPanel});
		this.loadingPanel.appendToBody(document.createElement('br'));
		this.loadingPanel.appendToBody(cancelLink);
		$D.setStyle(this.loadingPanel.body, 'text-align', 'center');
	},
	show:function(text){
	    if(text != undefined){
	        this.loadingPanel.setHeader(text);
	    }else{
	        this.loadingPanel.setHeader(this.conf.header);
	    }
		this.loadingPanel.show();
	},
	hide:function(){
		this.loadingPanel.hide();
	},
	getInstance: function(){
	    return this.loadingPanel;	
	}
};
/**
* A class preload image of the given URL
* @param url location of the image to preload
* @param conf.onLoad the event handler called when the image is loaded
* @param conf.param an optional parameter pass to onLoad halder
*/
YAHOO.com.thecodecentral.ImageLoader = function(url){
	this.url = url;
	this.image = null;
	this.loadEvent = new YAHOO.util.CustomEvent("onLoad", this);
};

YAHOO.com.thecodecentral.ImageLoader.prototype = {
	load:function(){
		this.image = document.createElement('img');
		$E.on(this.image, 'load', function(e, o){
			//fire this.loadEvent
			o.fire();
			}, this.loadEvent);
		this.image.src = this.url;
	},
	getImage:function(){
		return this.image;
	}
};
/**
* A class preload image of the given URL
* @param url location of the image to preload
* @param conf.onLoad the event handler called when the image is loaded
* @param conf.param an optional parameter pass to onLoad halder
*/
YAHOO.com.thecodecentral.ImageGallery = function(dataSource, lightboxPanel){
	this.dataSource = dataSource;
	this.lightboxPanel = lightboxPanel;
	this.init();
	this.lightboxPanel.gallery = this;
	this.initKeyboardShortcut();
};


YAHOO.com.thecodecentral.ImageGallery.prototype = {
	init:function(){
		var galleryList = new YAHOO.com.thecodecentral.ImageGalleryList(this.dataSource, true);
		
		var nextImgDiv = document.createElement('div');
		nextImgDiv.title = 'Forward';
		$D.addClass(nextImgDiv, 'tcc_slideShowCtrlNext');
		
		var prevImgDiv = document.createElement('div');
		prevImgDiv.title = "Backward";
		$D.addClass(prevImgDiv, 'tcc_slideShowCtrlPrev');
		
		var closeDiv = document.createElement('div');
		closeDiv.title = "Close this gallery";
		$D.addClass(closeDiv, 'tcc_slideShowCtrlClose');
		
		var resizeDiv = document.createElement('div');
		resizeDiv.title = "Resize";
		$D.addClass(resizeDiv, 'tcc_slideShowCtrlResize');
		
		var infoDiv = document.createElement('div');
		infoDiv.title = "Toggle tooltip";
		$D.addClass(infoDiv, 'tcc_slideShowCtrlInfo');
		
		var helpDiv = document.createElement('div');
		helpDiv.title = "Toggle Help";
		$D.addClass(helpDiv, 'tcc_slideShowCtrlHelp');
		
		var dragDiv = document.createElement('div');
		dragDiv.title = "Move toolbar";
		dragDiv.id = this.lightboxPanel.showImgPanel.id + "Dragger";
		$D.addClass(dragDiv, 'tcc_slideShowCtrlDrag');
		/*
	    var playImg = document.createElement('img');
		playImg.src = 'js/lightbox/play.png';
		playImg.title = "Play";
		$D.setStyle(playImg, 'cursor', 'pointer');
		
		var stopImg = document.createElement('img');
		stopImg.src = 'js/lightbox/stop.png';
		stopImg.title = "Stop";
		$D.setStyle(stopImg, 'cursor', 'pointer');
		*/
		
		var navClickHandler = function(e, o){
			 if(o.dir == 'next'){
			 	 o.self.forward();
			 }else{
			 	 o.self.backward();
			 }
		};
		
		$E.on(nextImgDiv, 'click', navClickHandler, {self:this, dir:'next'});
		$E.on(prevImgDiv, 'click', navClickHandler, {self:this, dir:'prev'});
		$E.on(closeDiv, 'click', function(e, o){o.self.lightboxPanel.showImgPanel.hide();}, {self:this});
		$E.on(resizeDiv, 'click', function(e, o){o.self.lightboxPanel.switchSize();}, {self:this});
		$E.on(helpDiv, 'click', function(e, o){o.self.lightboxPanel.toggleHelpPanel();}, {self:this});
		$E.on(infoDiv, 'click', function(e, o){o.self.lightboxPanel.toggleTooltip();}, {self:this});
		
		var slideShowCtrl =  new YAHOO.widget.Panel('tcc_slideShowCtrl' + this.lightboxPanel.showImgPanel.id,
		{
			visible : false,
			close: false,
			draggable: false,
			underlay: "none"
		});
		
		slideShowCtrl.appendToBody(prevImgDiv);
		slideShowCtrl.appendToBody(nextImgDiv);
		slideShowCtrl.appendToBody(closeDiv);
		slideShowCtrl.appendToBody(infoDiv);
		slideShowCtrl.appendToBody(helpDiv);
		slideShowCtrl.appendToBody(resizeDiv);
		slideShowCtrl.appendToBody(dragDiv);
		//make slideShowCtrl movable
		var ctrlDragger = new YAHOO.util.DD(slideShowCtrl.id + "_c");
		var showImgPanel = this.lightboxPanel.showImgPanel;
		ctrlDragger.endDrag = function(e){
    		showImgPanel.sizeMask();
    	};
	    ctrlDragger.setHandleElId (this.lightboxPanel.showImgPanel.id + "Dragger");
		
		slideShowCtrl.render(document.body);
		
		$D.addClass(slideShowCtrl.id, 'tcc_slideShowCtrl');
		$D.setStyle(slideShowCtrl.id + '_c', 'opacity', this.lightboxPanel.conf.ctrlOpacity);
				
		slideShowCtrl.bringToTop();
		this.slideShowCtrl = slideShowCtrl;
		this.dockToolbar(true);

		this.lightboxPanel.loadingPanel.getInstance().showEvent.subscribe(function(t, a, o){
			o.slideShowCtrl.hide();
		}, this);
		this.lightboxPanel.loadingPanel.getInstance().hideEvent.subscribe(function(t, a, o){
			if(o.lightboxPanel.conf.ctrlVisible){
			  o.slideShowCtrl.show();
			}
		}, this);
		
		this.lightboxPanel.showImgPanel.showEvent.subscribe(function(t, a, o){
			if(o.lightboxPanel.conf.ctrlVisible){
				slideShowCtrl.show();
				slideShowCtrl.bringToTop();
			}
		}, this);
		this.lightboxPanel.showImgPanel.hideEvent.subscribe(function(t, a, o){
			slideShowCtrl.hide();
		});
		this.galleryList = galleryList;
		
		if(this.lightboxPanel.conf.ctrlVisible){
		$E.on(window, 'scroll', function(e){
			var r = $D.getRegion(document.body);
			slideShowCtrl.moveTo($D.getDocumentScrollLeft() + $D.getClientWidth()/2 - 100
			, $D.getDocumentScrollTop() + $D.getClientHeight() - 75);
		});
		}
	},
	forward:function(){	
		this.lightboxPanel.placeImage(this.galleryList.forward());
	},
	backward:function(){
	    this.lightboxPanel.placeImage(this.galleryList.backward());
	},

	initKeyboardShortcut:function(){
		var showImgPanel = this.lightboxPanel.showImgPanel;
		var keys = {};
		//add keyboard shortcut
		//add escape
		keys.escapeKey = new YAHOO.util.KeyListener(document, { keys:27 },                               
	                                              { fn:this.lightboxPanel.showImgPanel.hide, 
	                                                scope:this.lightboxPanel.showImgPanel, 
	                                                correctScope:true } ); 
	 
    	showImgPanel.cfg.queueProperty("keylisteners", keys.escapeKey); 
    	
    	keys.leftKey = new YAHOO.util.KeyListener(document, { keys:37 },                               
	                                              { fn:this.backward, 
	                                                scope:this, 
	                                                correctScope:true } ); 
	 
    	showImgPanel.cfg.queueProperty("keylisteners", keys.leftKey); 
    	
    	keys.upKey = new YAHOO.util.KeyListener(document, { keys:[38,32] },                               
	                                              { fn:this.lightboxPanel.switchSize, 
	                                                scope:this.lightboxPanel, 
	                                                correctScope:true } ); 
	 
    	showImgPanel.cfg.queueProperty("keylisteners", keys.upKey); 

    	
    	keys.rightKey = new YAHOO.util.KeyListener(document, { keys:39 },                               
		                                              { fn:this.forward, 
		                                                scope:this, 
		                                                correctScope:true } ); 
		 
	    showImgPanel.cfg.queueProperty("keylisteners", keys.rightKey); 
    	
    	keys.downKey = new YAHOO.util.KeyListener(document, { keys:40 },                               
	                                              { fn:this.lightboxPanel.toggleTooltip, 
	                                                scope:this.lightboxPanel, 
	                                                correctScope:true } ); 
	 
    	showImgPanel.cfg.queueProperty("keylisteners", keys.downKey);
    	
    	keys.f1Key = new YAHOO.util.KeyListener(document, { keys:112 },                               
	                                              { fn:this.lightboxPanel.toggleHelpPanel, 
	                                                scope:this.lightboxPanel, 
	                                                correctScope:true } ); 
	                                          
    	this.navKeys = keys; 
    	
    	//enable keyboard shortcuts only when lightbox panel is shown
    	showImgPanel.showEvent.subscribe(function(e, a, o){
    		o.self.setKeyboardEnabled(true);
    		//disable keyboard default behavior
    		$E.on(document, 'keydown', function(e, o){
    			$E.preventDefault(e);
    		});
    	}, {self:this});
    	showImgPanel.hideEvent.subscribe(function(e, a, o){
    		o.self.setKeyboardEnabled(false);
    		$E.purgeElement(document, false, 'keydown');	
    	}, {self:this});
    	
    	
	},
	/**
	 * Bring control panel into the current viewport
	 * @param force if this is set to true, move the control panel regardless where it is 
	 */
	dockToolbar:function(force){
		if(!this.lightboxPanel.conf.ctrlVisible){
			return;
		}
		
		force = force == undefined ? false: force;
		var ctrlRegion = $D.getRegion(this.slideShowCtrl.id);
		
		if(!force && (( this.lightboxPanel.pageScrollTopValue + $D.getClientHeight() > ctrlRegion.bottom + 5) &&
		   ( this.lightboxPanel.pagepageScrollLeftValue + $D.getClientWidth() > ctrlRegion.right + 5))
		 ){
			return;
		}
		window.scroll(0, this.lightboxPanel.pageScrollTopValue);
		this.slideShowCtrl.cfg.setProperty("x",
			$D.getViewportWidth()/2 - (ctrlRegion.right - ctrlRegion.left)/2);
		this.slideShowCtrl.center();
		this.slideShowCtrl.cfg.setProperty("y",
			$D.getViewportHeight() + $D.getDocumentScrollTop() - 75);
	},
	/**
	 * Disable/enable keyboard shortcuts on navigation
	 */
    setKeyboardEnabled:function(state){
		if(state == true){
			for(var i in this.navKeys){
				this.navKeys[i].enable();
			}
		}else{
			for(var i in this.navKeys){
				this.navKeys[i].disable();
			}
		}
	},
	getList:function(){
		return this.galleryList;
	}
	
};


/**
 * A data structure emulating a gallery
 */
YAHOO.com.thecodecentral.ImageGalleryList = function(dataSource, isCircular){
	this.list = new Array();
	this.curIndex = 0;
	this.isCircular = isCircular == undefined ? false : isCircular;
	this.dataSource = dataSource;
	this.doIndex();
};

YAHOO.com.thecodecentral.ImageGalleryList.prototype = {
	/**
	* Create an index for a give data source for sequential access
	* @private
	*/
	doIndex:function(){
		for(var i in this.dataSource){
			this.list.push(i);
		}
	},
	getFirst:function(){
		return this.list[0];
	},
	getLast:function(){
		return this.list[this.getSize() - 1];
	},
	//return id of the image
	getCurrent:function(){
		return this.list[this.curIndex];
	},
	//return index of this list structure
	getCurrentIndex:function(){
		return this.curIndex;
	},
	setCurrentIndex:function(index){
		index = parseInt(index);
		if(index > this.getSize()){
			this.curIndex = this.getSize() - 1;
		}else if(index < 0){
			this.curIndex = 0;
		}else{
			this.curIndex = index;
		}
	},
	/**
	 * Supply id of an image, will return index of this list
	 */
	getIndexByImageId:function(imgId){
		for(var i in this.list){
			if(this.list[i] == imgId){
				return i;
			}
		}
		return -1;
	},

	getNextIndex:function(){
		var i;
		if(this.curIndex + 1 < this.getSize()){
			i = this.curIndex + 1;
		}else{
			if(this.isCircular){
				i = 0;
			}else{
			    i = this.curIndex;
			}
		}

		return i;
	},
	getNext:function(){
		return this.list[this.getNextIndex()];
	},
	getPreviousIndex:function(){
		var i;
		if(this.curIndex > 0){
			i = this.curIndex - 1;
		}else{
			if(this.isCircular){
			    i = this.getSize() - 1;
			  
			}else{
				i = 0;
			}
		}
		
		return i;
		
	},
	getPrevious:function(){
		return this.list[this.getPreviousIndex()];
	},
	forward:function(){
		this.curIndex = this.getNextIndex();
		return this.getCurrent();
	},
	backward:function(){
		this.curIndex = this.getPreviousIndex();
	    return this.getCurrent();
	},
	getSize:function(){
		return this.list.length;
	},
	toString:function(){
		var s = '';
		for(var i in this.list){
			s += i + ':' + this.list[i] + ' ';
		}
		return s;
	}
};
YAHOO.com.thecodecentral.LightboxPanel = function(conf){
	this.STATE_MAX = 0;
	this.STATE_FIT = 1;
	this.conf = conf == null ? {} : conf;
	this.conf.hasThumbnails = conf.hasThumbnails == null ? true: conf.hasThumbnails;
	this.conf.effect = conf.effect == null ? true:  conf.effect;
	this.conf.effectDuration = conf.effectDuration == null ? 1 : conf.effectDuration;
	this.conf.ctrlVisible = conf.ctrlVisible == null ? true : conf.ctrlVisible;
	this.conf.ctrlOpacity = conf.ctrlOpacity == null ? .5 : conf.ctrlOpacity;
	this.conf.id = conf.id == null ? 'tcc_showImgPanel' : conf.id;
	this.conf.tooltip = conf.tooltip == null ? true : conf.tooltip;
	this.conf.tooltipOpacity = conf.tooltipOpacity == null ? .9 : conf.tooltipOpacity;
	this.imgCache = {};
	//this will be set after gallery has been created
	this.gallery = null;
	this.init();

};

YAHOO.com.thecodecentral.LightboxPanel.prototype = {
	init:function(){
		//create custom events
		//event fired when preload image starts
		this.preloadStartEvent = new YAHOO.util.CustomEvent("preloadStartEvent", this);
		//event fired whe preload image complete
		this.preloadCompleteEvent = new YAHOO.util.CustomEvent("preloadCompleteEvent", this);
		//After all images are preloaded, this event will be fired
		this.preloadAllCompleteEvent = new YAHOO.util.CustomEvent("preloadAllCompleteEvent", this);
		
		this.loadingPanel = new YAHOO.com.thecodecentral.LoadingPanel();
		this.initLightbox();
		if(this.conf.hasThumbnails){
		  this.prepareThumbnails();
		}
		this.pageScrollTopValue = 0;
		this.pageScrollLeftValue = 0;
		
		if(this.conf.effect == true){
			//+ 'ImgHolder'
			this.imgPanelFadeIn = new YAHOO.util.Anim(this.showImgPanel.id , { 
	    	opacity: {from: 0, to: 1 }  
	    	}, this.conf.effectDuration, YAHOO.util.Easing.easeOut); 
		} 
		
		//init image state
		for(var i in this.conf.dataSource){
			if(this.conf.dataSource[i].state == undefined){
				this.conf.dataSource[i].state = this.STATE_FIT;
			}
		}
		
		$D.addClass(document.body, 'yui-skin-sam');
	},
	/**
	* Load data source and add click event to image thumbnails
	* @private
	*/
	prepareThumbnails:function(){
		var r = this.conf.dataSource

		//for each image ID in the data source
		for(var i in r){

			//event handler fired when the thumbnail is clicked
			var onImgClick = function(e, o){
				o.self.show(o.imgId);
			};//end of onImgClick
			var imgSmall = $(i); //get element by image ID
			$D.setStyle(imgSmall, 'cursor', 'pointer');
			//add click handler to this thumbnail image
			$E.on(imgSmall, 'click', onImgClick, {self: this, imgId: i});
		}
	},
	/**
	* Preload an image, and store it in the imgCache
	* @param imgId Image ID in dataSource
	* @param boolean conf.progressBar Set to false to hide progress bar. Default true.
	*        function conf.callback   Event handler fired when the image is loaded
	*        function conf.param      Parameters passed to the callback function
	* @param preloadOnly if set to true, don't the lightbox after finishing preloading and hide loading panel
	*/
	preloadImage:function(imgId, conf, preloadOnly){
		preloadOnly = preloadOnly == null ? false : preloadOnly;
		this.preloadStartEvent.fire({imageId:imgId, ds:this.conf.dataSource[imgId]});
		if(conf == undefined){conf = {};}
		if(conf.progressBar == undefined){conf.progressBar = true;}
		var imgLoader = new YAHOO.com.thecodecentral.ImageLoader(this.conf.dataSource[imgId].url);
		imgLoader.loadEvent.subscribe(function(e, a, o){
		    o.self.loadingPanel.hide();
			//save this image to cache, along image width and height
			var img = this.getImage();
			o.self.imgCache[o.imgId] = img;
			o.self.conf.dataSource[o.imgId].width = img.width;
			o.self.conf.dataSource[o.imgId].height = img.height;
			if(!preloadOnly){
			  o.self.show(o.imgId);
			}
			//notify subscribers that this image has been preloaded
			o.self.preloadCompleteEvent.fire({imageId:o.imgId, ds:o.self.conf.dataSource[o.imgId]});
			//if number of elements in the cache is equal to the number in the data source,
			// then all images have been loaded
		    if($TCC.countAsc(o.self.conf.dataSource) == $TCC.countAsc(o.self.imgCache)){
		    	o.self.preloadAllCompleteEvent.fire($TCC.countAsc(o.self.conf.dataSource));
		    }
		}, {self:this, imgId: imgId, conf:conf});
		if(conf.callback != undefined){
			imgLoader.loadEvent.subscribe(conf.callback, conf.param);
		}
		if(conf.progressBar && !preloadOnly){
			this.loadingPanel.show("Loading image ...");
		}
		imgLoader.load();
	},
	/**
	 * Preload all images from dataSource. To monitor the status of preloading,
	 * You can subscribe to these events:
	 * this.preloadStartEvent
	 * this.preloadCompleteEvent
	 * this.preloadAllCompleteEvent
	 */
	 preloadAll:function(){
	 	var queue = new Array();
	    for(var i in this.conf.dataSource){
	 		queue.push(i);
	 	}
	 	queue.reverse();
	 	
	 	this.preloadImage(queue.pop(), null, true);
	 	this.preloadCompleteEvent.subscribe(function(e, a, o){
	 		if(queue.length > 0){
	 		  o.self.preloadImage(o.queue.pop(), null, true);
	 		}
	 	}, {self:this, queue:queue});
	 },
	setOpacity:function(percent){
		//+ 'ImgHolder'
		  $D.setStyle(this.showImgPanel.id , 'opacity', percent);
	},
	savePageScrollPosition:function(){
		this.pageScrollLeftValue = $D.getDocumentScrollLeft();
		this.pageScrollTopValue =  $D.getDocumentScrollTop();		
	},
	restorePageScrollPosition:function(){
		window.scroll(this.pageScrollLeftValue, this.pageScrollTopValue);
	},
	/**
	 * Save page scroll location and call placeImage
	 * Use this function only to show the lightbox
	 */
	show:function(imgId){
        this.savePageScrollPosition();
		if(imgId == null){
			imgId = this.gallery.galleryList.getFirst();
		}
		this.placeImage(imgId);
	},
	/**
	* Place an given image to the image panel
	* @param imgId ID of the image
	* @private
	*/
	placeImage:function(imgId){
		
		this.gallery.dockToolbar();
		
		//update index of galleryList structure
		this.gallery.galleryList.setCurrentIndex(this.gallery.galleryList.getIndexByImageId(imgId));
		
		//check if the image is already cached
		var image = this.imgCache[imgId];
		this.gallery.setKeyboardEnabled(false); //disable keyboard shortcuts when loading
		
		if(image == undefined){
			this.preloadImage(imgId);
			return;
		}
		this.gallery.setKeyboardEnabled(true);
		if(this.conf.effect == true){
			this.imgPanelFadeIn.stop();
			this.setOpacity(0);
			this.imgPanelFadeIn.animate();
		}
		$TCC.empty(this._imgHolder);
		
		
		this.restorePageScrollPosition();
		
		//attach double click handler on image
		$E.purgeElement(this.showImgPanel.body, false, 'dblclick');
		$E.on(this.showImgPanel.body, 'dblclick', function(e, o){
		    o.self.restorePageScrollPosition(); 
		    o.self.switchSize();
			
		}, {imgId:imgId, self:this, image: image});
		
		//setting up tooltip
		var title;
		var text;
		var toolTipText = "";
		if(this.conf.dataSource[imgId].title == null ||
		this.conf.dataSource[imgId].title.length == 0){
			title = '&nbsp;';
		}else{
			title = this.conf.dataSource[imgId].title;
		}
		
		if(this.conf.dataSource[imgId].text == null ||
		this.conf.dataSource[imgId].text.length == 0){
			text = '&nbsp;';
		}else{
			text = this.conf.dataSource[imgId].text;
		}
		this.setTooltipText(title, text);
		

		this.showImgPanel.show();
		
		//the following two lines provide fix for opera
		var imageNode = document.createElement('img');
		imageNode.src = image.src;
		this._imgHolder.appendChild(imageNode);
		
		this._autoFit(image, imgId);
		this.sizeMask();
		

	},
	sizeMask:function(){
		$D.setStyle(this.showImgPanel.id + '_mask', 'width', $D.getClientWidth() + 'px');
		$D.setStyle(this.showImgPanel.id + '_mask', 'height', $D.getClientHeight() + 'px');
		this.showImgPanel.sizeMask();
	},
	/**
	 * if the lightbox is minimized, maximize it, reverse otherwise
	 */
	switchSize:function(){
		this.gallery.dockToolbar();
		var imgId = this.gallery.getList().getCurrent();
		var image =  $(this._imgHolder.id).getElementsByTagName('img')[0];
		if(this.conf.dataSource[imgId].state == this.STATE_MAX){
			this._autoFit(image, imgId);
		}else{
			this._maximize(image, imgId);
		}
		this.sizeMask();
	},
	_autoFit:function(){
		var imgId = this.gallery.getList().getCurrent();
		this.conf.dataSource[imgId].state = this.STATE_FIT;
		var image =  $(this._imgHolder.id).getElementsByTagName('img')[0];
		var iw = this.conf.dataSource[imgId].width;
		var ih = this.conf.dataSource[imgId].height;
		var vw = $D.getViewportWidth() - 50;
		var vh = $D.getViewportHeight() - 50;
	
			if(iw > vw || ih > vh){
				var ratioi = iw/ih;
				var ratiow = vw/vh;
				if(ratioi <= ratiow){
					image.height = vh;
					image.width = iw * (vh / ih);
				}else{
					image.width = vw;
					image.height = ih * (vw / iw);
				}
			}
		this.showImgPanel.cfg.setProperty('width', (image.width + 20)  + 'px');
		this.showImgPanel.center();
	},
	//DOM image instance to maximize its size
	_maximize:function(){
		var imgId = this.gallery.getList().getCurrent();
		var image =  $(this._imgHolder.id).getElementsByTagName('img')[0];
		this.conf.dataSource[imgId].state = this.STATE_MAX;
		image.width = this.conf.dataSource[imgId].width;
		image.height = this.conf.dataSource[imgId].height;
		this.showImgPanel.cfg.setProperty('width',
		(parseInt(this.conf.dataSource[imgId].width) + 20)+ 'px');
		this.showImgPanel.cfg.setProperty('x', 5);
		this.showImgPanel.center();
	},
	initLightbox:function(){
		var panelConf = {
			width: '100px',
			visible : false,
			draggable:false,
			modal: true,
			close:false
			//constraintoviewport: true
		};
		if(this.conf.modal != undefined && this.conf.modal == false){
			panelConf.modal = false;
		}
		var showImgPanel = new YAHOO.widget.Panel(this.conf.id, panelConf);

		var imgHolder = document.createElement('div');
		imgHolder.id = showImgPanel.id + 'ImgHolder';
		$D.setStyle(imgHolder, 'text-align', 'center');
		showImgPanel.setBody(imgHolder);
		showImgPanel.render(document.body);
		$D.addClass(showImgPanel.id, 'tcc_showImgPanel');
		
		
		var isDragged = false;
		$E.on(showImgPanel.body, 'click', function(e, o){
		    if(!isDragged){
				showImgPanel.hide();
			}
			isDragged = false;
		}, {self:this});
		
        var imgPanelDragger = new YAHOO.util.DD(showImgPanel.id + "_c");
        
    	imgPanelDragger.startDrag = function(e){
    		isDragged = true;
    	};
         
    	imgPanelDragger.endDrag = function(e){
    		showImgPanel.sizeMask();
    	};
    	
        //add behavior that when mask is clicked, close the panel
		$E.on(showImgPanel.id + '_mask', 'click', function(e, o){
			o.self.showImgPanel.hide();
		}, {self:this});


		showImgPanel.beforeShowEvent.subscribe(function(){
			this.sizeMask();
		});
		showImgPanel.moveEvent.subscribe(function(){
			this.sizeMask();
		});

		//set mask opacity and color
		var maskHandler = function(t, a, o){
			o.self.imageTooltip.bringToTop();
			if(o.self.conf.maskOpacity != undefined){
				$D.setStyle(this.id + '_mask', 'opacity', o.self.conf.maskOpacity);
			}
			if(o.self.conf.maskBgColor != undefined){
				$D.setStyle(this.id + '_mask', 'background-color', o.self.conf.maskBgColor);
			}
		};
		showImgPanel.showEvent.subscribe(maskHandler, {self:this});

		this.loadingPanel.getInstance().showEvent.subscribe(maskHandler, {self:this});

		showImgPanel.beforeHideEvent.subscribe(function(t, a, o){
		  //shrink image so it won't create a scroll bar after hiding the panel
		    o.self.restorePageScrollPosition();
			o.self._autoFit();
		}, {self:this});
		showImgPanel.hideEvent.subscribe(function(t, a, o){
			o.self.imageTooltip.hide();
			o.self.helpPanel.hide();
		}, {self:this});
		

		this._imgHolder = imgHolder;
		this.showImgPanel = showImgPanel;
		
		//init tooltip
		var imageTooltip = new YAHOO.widget.Dialog( this.showImgPanel.id + "Tooddtip", {  
			  width: "180px",
			  close: false,
			  draggable: false,
			  visible: false
	    } );
	    
	    imageTooltip.setBody('&nbsp;');
	    imageTooltip.render(document.body);
	    $D.addClass(imageTooltip.id, 'tcc_imageTooltip');
	    $D.setStyle(imageTooltip.id, 'opacity', this.conf.tooltipOpacity);
	    
	    //pin tooltip to top left screen
	     $E.on(window, 'scroll', function(e){
			var r = $D.getRegion(document.body);
			imageTooltip.moveTo($D.getDocumentScrollLeft() + 15, 
			 $D.getDocumentScrollTop()+ 15);
		});
	    
	    var imgTooltipDragger = new YAHOO.util.DD(imageTooltip.id + "_c"); 
	    
    	imgTooltipDragger.endDrag = function(e){
    		showImgPanel.sizeMask();
    	};
    	
        imgTooltipDragger.endDrag = function(e){
    		showImgPanel.sizeMask();
    	};
	    
	    this.imageTooltip = imageTooltip;
	    
	    //init help panel
	    var helpPanel = new YAHOO.widget.Panel( this.showImgPanel.id + "HelpPanel", {  
			  width: "250px",
			  close: false,
			  draggable: false,
			  visible: false,
			  fixedcenter: true,
			  effect:{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.10} 
	    } );
	    helpPanel.setBody(' ');
	    helpPanel.render(document.body);
	    $D.addClass(helpPanel.id, 'tcc_imageHelPanel');
    	$E.on(helpPanel.body, 'click', function(){
    		helpPanel.hide();
    	});
    	
    	this.helpPanel = helpPanel;
    	this._setHelpPanelBody();
    	
    	
	},
	_setHelpPanelBody:function(){
		this.helpPanel.setBody(
		'<div class="tcc_helpPanelTitle">Basic Operations:</div>' +
		'<strong>Click</strong> to close the lightbox<br/>' + 
		'<strong>Drag</strong> to move the lightbox<br/>'+
		'<br/>' +   
		'<div class="tcc_helpPanelTitle">Keyboard Shortcuts:</div>' + 
		'<strong>Arrow Left</strong> - Previous photo<br/>' +
		'<strong>Arrow Up/Space bar</strong> - Toggle maximize/restore<br/>' + 
		'<strong>Arrow Right</strong> - Next photo<br/>' + 
		'<strong>Arrow Down</strong> - Toggle tooltip<br/>' + 
		'<strong>Escape</strong> - Close gallery<br/>' + 
		'<strong>F1</strong> - Show help<br/>' + 
		'<br/>Click this panel to close<br/>');
	},
	toggleTooltip:function(){
		this.conf.tooltip = !this.conf.tooltip;
		if(this.imageTooltip.cfg.getProperty('visible') == true && !this.conf.tooltip){
			this.imageTooltip.hide();
		}else{
			this.imageTooltip.show();
			this.imageTooltip.bringToTop();
		}
	},
	toggleHelpPanel:function(){
		if(this.helpPanel.cfg.getProperty('visible') == true){
			this.helpPanel.hide();
		}else{
			this.helpPanel.show();
			this.helpPanel.bringToTop();
		}
	},
	setTooltipText:function(title, text){
		title = (title == null || title == '&nbsp;') ? '':title;
		text = (text == null || text == '&nbsp;') ? '':text;
		
		if(title.length == 0 && text.length == 0 ){
			this.imageTooltip.hide();
		  
		}else{
			if(this.conf.tooltip){
				this.imageTooltip.show();
			}
			
			this.imageTooltip.setBody('<div class="tcc_imageTooltipTitle" id=".' + this.imageTooltip.id + 'Title">' + title + '</div>' + 
		    '<div class="tcc_imageTooltipText" id=".' + this.imageTooltip.id + 'Text">' + text + '</div>');
		    
		}
	}
};
YAHOO.com.thecodecentral.Lightbox = function(dataSource, conf){
	this.init(dataSource, conf);
};

YAHOO.com.thecodecentral.Lightbox.prototype = {
	init:function(dataSource, conf){
		conf = conf == null ? {} : conf;
		conf.dataSource = dataSource;
		this.conf = conf;
		this.lightboxPanel = new YAHOO.com.thecodecentral.LightboxPanel(conf);
		this.imageGallery = new YAHOO.com.thecodecentral.ImageGallery(conf.dataSource, this.lightboxPanel);
	},
	show:function(imgId){
		this.lightboxPanel.show(imgId);
	},
	preloadAll:function(){
		this.lightboxPanel.preloadAll();
	},
	setDataSource:function(dataSource){
		this.lightboxPanel.conf.dataSource = dataSource;
	    this.lightboxPanel.imgCache = {};
		this.imageGallery.dataSource = dataSource;
		this.imageGallery.galleryList = new YAHOO.com.thecodecentral.ImageGalleryList(dataSource, true);
	},
	dispose:function(){
		this.lightboxPanel.showImgPanel.destroy();
		this.lightboxPanel.imageTooltip.destroy();
		this.imageGallery.slideShowCtrl.destroy();
		this.lightboxPanel.loadingPanel.loadingPanel.destroy();
		this.lightboxPanel.helpPanel.destroy();
	}
};
