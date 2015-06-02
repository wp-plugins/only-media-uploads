<?php 
/*
Plugin Name: Media Only Uploads
Plugin URI: http://riyadarefin.com
Description: Restrict uploads to common Media file types only (images: jpg, gif, png | videos: wmv, avi, mpeg, mp4, mkv)
Author: Riyad Arefin
Author URI: http://riyadarefin.com
Version: 0.0.1
*/
/* Version check */
function fbogmeta_url( $path = '' ) {
	global $wp_version;
	if ( version_compare( $wp_version, '2.8', '<' ) ) { // Using WordPress 2.7
		$folder = dirname( plugin_basename( __FILE__ ) );
		if ( '.' != $folder )
			$path = path_join( ltrim( $folder, '/' ), $path );

		return plugins_url( $path );
	}
	return plugins_url( $path, __FILE__ );
}

add_filter('upload_mimes','restrict_mime');
function restrict_mime($mimes) {
$mimes = array(

				// Image formats
				'jpg|jpeg|jpe'                 => 'image/jpeg',
				'gif'                          => 'image/gif',
				'png'                          => 'image/png',
				'bmp'                          => 'image/bmp',
				'ico'                          => 'image/x-icon',
	
				// Video formats
				'wmv'                          => 'video/x-ms-wmv',
				'avi'                          => 'video/avi',
				'mpeg|mpg|mpe'                 => 'video/mpeg',
				'mp4|m4v'                      => 'video/mp4',
				'mkv'                          => 'video/x-matroska',
	
);
return $mimes;
}
?>