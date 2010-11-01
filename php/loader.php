<?
	/*****************************************************************\
	 * One loader to bring them all and in the darkness - bind them! *
	\*****************************************************************/
	
	// Returns a JSON array of all scripts that the client uses
	function loadScripts( $path = '.', $level = 0 ){ 

    // Directories to ignore when listing output. Many hosts 
    // will deny PHP access to the cgi-bin. 
    $ignore = array( 'cgi-bin', '.', '..' ); 

		// Open the directory to the handle $dh 
    $dh = @opendir( $path ); 

		// Loop through the directory
    while( false !== ( $file = readdir( $dh ) ) ){ 

				// Check that this file is not to be ignored 
        if( !in_array( $file, $ignore ) ){ 
             
						// Just to add spacing to the list, to better 
            // show the directory tree. 
            $spaces = str_repeat( '&nbsp;', ( $level * 4 ) ); 
            
						// Its a directory, so we need to keep reading down...
            if( is_dir( "$path/$file" ) ){ 

								// Re-call this same function but on a new directory. 
                // this is what makes function recursive. 
                echo "<strong>$spaces $file</strong><br />"; 
                getDirectory( "$path/$file", ($level+1) ); 
             
            } else { 
						
                // Just print out the filename 
                echo "$spaces $file<br />"; 
             
            } 
        } 
    } 
		
    // Close the directory handle 
    closedir( $dh ); 
} 