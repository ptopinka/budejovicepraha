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