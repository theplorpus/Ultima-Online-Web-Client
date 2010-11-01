<?
	/*****************************************************************\
	 * One loader to bring them all and in the darkness - bind them! *
	\*****************************************************************/

	// Returns a JSON array of all scripts that the client uses
	function loadScripts( $path = '.', $level = 0 ){ 

		// Output array
		$return;

    // Directories to ignore when listing output. Many hosts 
    // will deny PHP access to the cgi-bin. 
    $ignore = array( 'cgi-bin', '.', '..' ); 

		// Open the directory to the handle $dh 
    $dh = @opendir( $path ); 

		// Loop through the directory
    while( false !== ( $file = readdir( $dh ) ) ){ 

				// Check that this file is not to be ignored 
        if( !in_array( $file, $ignore ) ){ 

						// Get the pathinfo
						$pathparts = pathinfo($path.'/'.$file);

						// Check that this file is a .js file
						if( $pathparts['extension'] == 'js' ) {

								// Its a directory, so we need to keep reading down...
								if( is_dir( "$path/$file" ) ){ 

										// Recurse on a new directory. 
										getDirectory( "$path/$file", ($level+1) ); 

								} else { 

										// Add to the array
										$return[] = $file;

								} 
						}
        } 
    } 

    // Close the directory handle 
    closedir( $dh ); 

		// Encode to JSON and return
		return json_encode($return);
} 
