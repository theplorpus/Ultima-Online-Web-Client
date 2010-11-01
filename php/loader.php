<?
    /*****************************************************************\
    * One loader to bring them all and in the darkness - bind them! *
    \*****************************************************************/
    
    // Output array
    $return = array();
	
    // Returns a JSON array of all scripts that the client uses
    function loadScripts( $path = '../online/js', $level = 0, $return = array() ){
        
        // Directories to ignore when listing output. Many hosts 
        // will deny PHP access to the cgi-bin. 
        $ignore = array( 'cgi-bin', '.', '..' ); 
        
        // Open the directory to the handle $dh 
        $dh = @opendir( $path ); 
        
        // Loop through the directory
        while( false !== ( $file = readdir( $dh ) ) ){ 
        
            // Check that this file is not to be ignored 
            if( !in_array( $file, $ignore ) ){ 
                
                // Its a directory, so we need to keep reading down...
                if( is_dir( "$path/$file" ) ){ 
                    
                    // Recurse on a new directory. 
                    $return = loadScripts( "$path/$file", ($level+1), $return ); 
                   
                } else { 
                        
		    // Get the pathinfo
                    $pathparts = pathinfo($path.'/'.$file);

                    // Check that this file is a .js file
                    if( $pathparts['extension'] == 'js' ) {
                       
		        // Add to the array
                        array_push($return, $path.'/'.$file);
			
		    }
                } 
            } 
        } 
    
        // Close the directory handle 
        closedir( $dh ); 
	
	return $return;
    }
    
    // Function to get JS array
    function getJS() {
	
        // Encode to JSON and return
        return loadScripts();
	
    }
?>

