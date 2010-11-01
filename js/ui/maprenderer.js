//// CLASS: MapRenderer
function MapRenderer() {
	
	// Rendered map list
	this.maps = Array();
	this.uihandle = '#map';
	
}

	//// METHOD: Render Map
	MapRenderer.method('renderMap', function (map) {
		
		//debug counter
		var tileCount = 0;
		
		// set the size of the map
		$(this.uihandle).attr('width',(44*size)+44);
 		
		// draw the map
		var x = (44*size)/2; var y = 0; var sh = false;
		for(var j = 0; j<=size; j++, y+=22, x-=22) {
			for(var i = 0; i<=size; i++, y+=22, x+=22) {
				//$('#debug').append('<p>'+x+', '+y+'</p>');
					renderTile(x,y,1);
					tileCount++;
					debugger.add('Tile Count',tileCount);
					debugger.add('Map Width',tileCount*22);
					debugger.add('Map Height',tileCount*22);
			}
			x-=(22*size)+22; y-=(22*size)+22;
		}
		// Position it correctly
		$(this.uihandle).css('top','-'+($('#world').height())+'px');
	});