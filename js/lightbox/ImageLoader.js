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