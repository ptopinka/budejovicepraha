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
