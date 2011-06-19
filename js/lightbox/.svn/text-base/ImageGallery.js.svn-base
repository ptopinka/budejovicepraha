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