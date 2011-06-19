/**
 * mapper.js 1.01 (21-Dec-2007)
 * (c) by Christian Effenberger 
 * All Rights Reserved
 * Source: mapper.netzgesta.de
 * Distributed under NSL
 * License permits free of charge
 * use on non-commercial and 
 * private web sites only 
**/

// To add the highlighting for a map just  
// set class="mapper" to an image surrounded 
// by a block level element (e.g. div,p..).

var canvascheck = document.createElement('canvas');
var isIE = window.navigator.systemLanguage?1:0;
var isVM = document.namespaces?1:0; var isJG = 0;
var isCV = canvascheck.getContext?1:0; var jg = new Array();

if(isVM) {
	if(document.namespaces['v'] == null) {
		var stl = document.createStyleSheet();
		stl.addRule("v\\:*", "behavior: url(#default#VML); antialias: true;"); 
		document.namespaces.add("v", "urn:schemas-microsoft-com:vml"); 
	}
}

function getClasses(classes,string){
	var temp = '';
	for (var j=0;j<classes.length;j++) {
		if (classes[j] != string) {
			if (temp) {temp += ' '; }
			temp += classes[j];
		}
	}
	return temp;
}
function getClassValue(classes,string){
	var temp = 0; var pos = string.length;
	for (var j=0;j<classes.length;j++) {
		if (classes[j].indexOf(string) == 0) {
			temp = Math.min(classes[j].substring(pos),100);
			break;
		}
	}
	return Math.max(0,temp);
}
function getClassRGBColor(classes,string,color){
	var temp, val = color, pos = string.length;
	for (var j=0;j<classes.length;j++) {
		if (classes[j].indexOf(string) == 0) {
			temp = classes[j].substring(pos);
			val = temp.toLowerCase();
			break;
		}
	}
	if(!val.match(/^[0-9a-f][0-9a-f][0-9a-f][0-9a-f][0-9a-f][0-9a-f]$/i)) {val = color||'000000'; }
	if(!isCV) {return val; }else {
		function hex2dec(hex){return(Math.max(0,Math.min(parseInt(hex,16),255)));}
		var cr=hex2dec(val.substr(0,2)),cg=hex2dec(val.substr(2,2)),cb=hex2dec(val.substr(4,2));
		return cr+','+cg+','+cb;
	}
}
function getClassAttribute(classes,string){
	var temp = 0; var pos = string.length;
	for (var j=0;j<classes.length;j++) {
		if (classes[j].indexOf(string) == 0) {
			temp = 1; break;
		}
	}
	return temp;
}

function getMaps(className){
	var children = document.getElementsByTagName('img'); 
	var elements = new Array(); var i = 0; var mapname = '';
	var child; var classNames; var j = 0; var mapid = '';
	for(i=0;i<children.length;i++) {
		child = children[i]; classNames = child.className.split(' ');
		for(j=0;j<classNames.length;j++) {
			if(classNames[j]==className) {
				mapname = child.useMap.split("#");
				if(mapname[1]!=''&&mapname[1].length>=1) {
					mapid = document.getElementsByName(mapname[1]);
					if(mapid) {
						if(child.id=='') {child.id = 'map_'+i;}
						elements.push(child); break;
					}
				}
			}
		}
	}
	return elements;
}

function fadeCanvas(id,opac) {
	var obj = document.getElementById(id);
    if(opac<=100) {
		obj.style.opacity = opac/100; opac += 10;
		window.setTimeout("fadeCanvas('"+id+"',"+opac+")",10);
	}
}

function setAreaOver(obj,id,b,c,o,n,f,z) {
	var i, j, x, y, context, p = '', canvas = document.getElementById(id);
	var v = obj.coords.split(","); 
	if(isVM) {
		if(obj.shape.toLowerCase()=='rect') {
			canvas.innerHTML = '<v:rect strokeweight="1" filled="t" stroked="'+(n<1?"t":"f")+'" strokecolor="#'+b+'" style="zoom:1;margin:0;padding:0;display:block;position:absolute;left:'+parseInt(v[0])+'px;top:'+parseInt(v[1])+'px;width:'+parseInt(v[2]-v[0])+'px;height:'+parseInt(v[3]-v[1])+'px;"><v:fill color="#'+c+'" opacity="'+o+'" /></v:rect>';
		}else if(obj.shape.toLowerCase()=='circle') {
			canvas.innerHTML = '<v:oval strokeweight="1" filled="t" stroked="'+(n<1?"t":"f")+'" strokecolor="#'+b+'" style="zoom:1;margin:0;padding:0;display:block;position:absolute;left:'+parseInt(v[0]-v[2])+'px;top:'+parseInt(v[1]-v[2])+'px;width:'+(parseInt(v[2])*2)+'px;height:'+(parseInt(v[2])*2)+'px;"><v:fill color="#'+c+'" opacity="'+o+'" /></v:oval>';
		}else {
			for(j=2;j<v.length;j+=2) {p += parseInt(v[j])+','+parseInt(v[j+1])+',';}
			canvas.innerHTML = '<v:shape strokeweight="1" filled="t" stroked="'+(n<1?"t":"f")+'" strokecolor="#'+b+'" coordorigin="0,0" coordsize="'+canvas.width+','+canvas.height+'" path="m '+parseInt(v[0])+','+parseInt(v[1])+' l '+p+' x e" style="zoom:1;margin:0;padding:0;display:block;position:absolute;top:0px;left:0px;width:'+canvas.width+'px;height:'+canvas.height+'px;"><v:fill color="#'+c+'" opacity="'+o+'" /></v:shape>'; 
		}
	}else if(isCV) {
		if(f<1) {canvas.style.opacity = 0;}
		context = canvas.getContext("2d");
		context.beginPath();
		if(obj.shape.toLowerCase()=='rect') {
			context.rect(0.5+parseInt(v[0]),0.5+parseInt(v[1]),parseInt(v[2]-v[0]),parseInt(v[3]-v[1])); context.closePath();
		}else if(obj.shape.toLowerCase()=='circle') {
			context.arc(0.5+parseInt(v[0]),0.5+parseInt(v[1]),parseInt(v[2]),0,(Math.PI/180)*360,false);		
		}else {
		  	context.moveTo(parseInt(v[0]),parseInt(v[1]));
			for(j=2;j<v.length;j+=2) {context.lineTo(parseInt(v[j]),parseInt(v[j+1]));} context.closePath();
		}
		context.fillStyle = 'rgba('+c+','+o+')';
		context.strokeStyle = 'rgba('+b+',1)';
		context.fill(); if(n<1) {context.stroke();}
  		if(f<1) {fadeCanvas(id,0);}
	}else {
  		jg[z].setColor("#"+c);
		if(obj.shape.toLowerCase()=='rect') {
  			jg[z].fillRect(parseInt(v[0]),parseInt(v[1]),parseInt(v[2]-v[0])+1,parseInt(v[3]-v[1])+1);
		}else if(obj.shape.toLowerCase()=='circle') {
			jg[z].fillEllipse(parseInt(v[0]-v[2]),parseInt(v[1]-v[2]),parseInt(v[2])*2+1,parseInt(v[2])*2+1);
		}else {
			x = new Array(); y = new Array(); i = 0;
			for(j=0;j<v.length;j+=2) {x[i] = parseInt(v[j]); y[i] = parseInt(v[j+1]); i++;} 
			jg[z].fillPolygon(x,y);
		} jg[z].paint();
	}
}

function setAreaOut(obj,id,f,z) {
	var canvas = document.getElementById(id);
	if(isVM) {canvas.innerHTML = '';}else 
	if(isJG) {jg[z].clear();}else if(isCV) {
		var context = canvas.getContext("2d");
		context.clearRect(0,0,canvas.width,canvas.height);
	}
}

function addMapper() {
	var themaps = getMaps('mapper');
	var image, object, bgrnd, canvas, context, mapid, mname; 
	var classes = '', newClasses = '', i, j, o, b , c, n, f;
	for(i=0;i<themaps.length;i++) {
		image = themaps[i]; object = image.parentNode;
		object.style.position = (object.style.position=='static'||object.style.position==''?'relative':object.style.position);
		object.style.height = image.height+'px';
		object.style.width = image.width+'px';
		bgrnd = document.createElement('img');
		n = 0; f = 0; b = '0000ff'; c = '000000'; o = 33;
		if(isCV) {canvas = document.createElement('canvas');}else if(isVM) {
		canvas = document.createElement(['<var style="zoom:1;overflow:hidden;display:block;width:'+image.width+'px;height:'+image.height+'px;padding:0;">'].join(''));
		}else {canvas = document.createElement('div');}
		canvas.id = image.id+'_canvas';
		classes = image.className.split(' '); 
		o = getClassValue(classes,"iopacity");
		b = getClassRGBColor(classes,"iborder",'133D00');
		c = getClassRGBColor(classes,"icolor",'000000');
		n = getClassAttribute(classes,"noborder");
		f = getClassAttribute(classes,"nofade");
		o = o==0?0.33:o/100;
		newClasses = getClasses(classes,"mapper");
		image.className = newClasses;
		mname = image.useMap.split("#");
		mapid = document.getElementsByName(mname[1]);
		for(j=0;j<mapid[0].areas.length;j++) {
			if(mapid[0].areas[j].shape.match(/(rect|poly|circle)/i)&&mapid[0].areas[j].coords!='') {
				if(isVM||isIE) {
					mapid[0].areas[j].onmouseover = new Function('setAreaOver(this,"'+canvas.id+'","'+b+'","'+c+'","'+o+'",'+n+','+f+','+i+');'); 
					mapid[0].areas[j].onmouseout = new Function('setAreaOut(this,"'+canvas.id+'",'+f+','+i+');'); 
				}else {
					mapid[0].areas[j].setAttribute("onmouseover","setAreaOver(this,'"+canvas.id+"','"+b+"','"+c+"','"+o+"',"+n+","+f+","+i+");"); 
					mapid[0].areas[j].setAttribute("onmouseout","setAreaOut(this,'"+canvas.id+"',"+f+","+i+");"); 
				}
			}
		}
		canvas.style.height = image.height+'px';
		canvas.style.width = image.width+'px';
		canvas.height = image.height;
		canvas.width = image.width;
		canvas.left = 0; canvas.top = 0;
		canvas.style.position = 'absolute';
		canvas.style.left = 0+'px';
		canvas.style.top = 0+'px';
		image.className = '';
		image.style.cssText = '';
		image.left = 0; image.top = 0;
		image.style.position = 'absolute';
		image.style.height = image.height+'px';
		image.style.width = image.width+'px';
		image.style.left = 0+'px';
		image.style.top = 0+'px';
		if(isIE) {image.style.filter = "Alpha(opacity=0)";
		}else {image.style.opacity = 0;
  		image.style.MozOpacity = 0;
  		image.style.KhtmlOpacity = 0;}
		bgrnd.src = image.src;
		bgrnd.left = 0; bgrnd.top = 0;
		bgrnd.style.position = 'absolute';
		bgrnd.style.height = image.height+'px';
		bgrnd.style.width = image.width+'px';
		bgrnd.style.left = 0+'px';
		bgrnd.style.top = 0+'px';
		object.insertBefore(canvas,image);
		if(isCV) {
			context = canvas.getContext("2d");
			context.clearRect(0,0,canvas.width,canvas.height);
		}else if(!isVM && !isCV) {if(isIE) {
			canvas.style.filter = "Alpha(opacity="+(o*100)+")";
			}else { canvas.style.opacity = o;
  			canvas.style.MozOpacity = o;
  			canvas.style.KhtmlOpacity = o;}
			if(typeof(window['jsGraphics']) !== 'undefined') {
				jg[i] = new jsGraphics(canvas); isJG = 1;
			}
		}		
		object.insertBefore(bgrnd,canvas);
	}
}

var mapperOnload = window.onload;
window.onload = function () { if(mapperOnload) mapperOnload(); addMapper(); }