(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event;
 
    Event.onDOMReady(function() {
        var layout = new YAHOO.widget.Layout('doc1', {
            height: Dom.getClientHeight(), //Height of the viewport
            width: Dom.get('doc1').offsetWidth, //Width of the outer element
            minHeight: 150, //So it doesn't get too small
			
            units: [
                { position: 'top', height: 160, body: 'hd', gutter: '5px' },
                { position: 'left', width: 160, body: 'nav', grids: true },
                { position: 'right', width: 240, body: 'ban' },
                { position: 'center', body: 'bd', grids: true, gutter: '5px' , scroll:true }
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
