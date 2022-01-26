<?php
/**
 * Plugin Name: Google Map Shortcode
 * Plugin URI:
 * Description: .
 * Version:     1.0
 * Author:      Sabbir Mia
 * Author URI:  https://sabbirmia.com/
 * License:     GPL v2 or later
 * Text Domain: gms
 * Domain Path: /languages
 */
function gms_load_textdomain() {
 load_plugin_textdomain( 'gms', false, plugin_dir_url( __FILE__ ) . 'languages' );
}
add_action( 'plugins_loaded', 'gms_load_textdomain' );

function google_map_shortcode($atts){
	//It's a default value
	$default = array(
		 'location'=>'Dhaka',
		 'width'=>'600',
		 'height'=>'500',

	);
	// You will pass default value after that user define values
	$map_attrs = shortcode_atts($default,$atts);
	$mapEmbadderCode = <<<EOD
	<div>
		<div>
			<iframe width="{$map_attrs['width']}" height="{$map_attrs['height']}"
			src="https://maps.google.com/maps?q={$map_attrs['location']}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

		</div>
	</div>
EOD;
return $mapEmbadderCode;
}
add_shortcode('map','google_map_shortcode');
