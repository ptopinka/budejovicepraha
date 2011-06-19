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