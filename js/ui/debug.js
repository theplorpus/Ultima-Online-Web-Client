//// CLASS: Debugger
function Debugger () {
	
	this.uihandle = '#debug';
	this.entries = new Array();
	
}

	 /********\
	 * PUBLIC *
	 \********/
	 
	//// METHOD: Add an entry
	Debugger.method('add', function(name, content) {
		
		// Append the entries array
		this.entries.push({'name':name,'content':content});
		
		// Update the UI
		this.updateUI();
		
		// Return the id for reference
		return this.entries.length;
	});
	
	//// METHOD: Remove an entry
	Debugger.method('remove', function(id) {
		
		// Remove it from the entries array
		this.entries.remove(id);
		
		// Update the UI
		this.updateUI();
	});
	
	//// METHOD: Update an entry

	 /*********\
	 * PRIVATE *
	 \*********/
	 
	//// METHOD: Update the UI
	Debugger.method('updateUI', function() {
		$(this.uihandle).html( function () {
			var out;
			for(var i=0;i<=this.entries.length;i++) {
				out += '<div class="'+this.entries.length+'">'+str+'</span>';
			}
			return out;
		});
	});
