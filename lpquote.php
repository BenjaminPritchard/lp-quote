<?php
/*
Plugin Name: Random LP Quote
Plugin URI: https://www.benjaminpritchard.org/wp-lightning-path-quote/
Description: Puts a random LP quote in every admin screen, based on Hello Dolly example plugin
Author: Benjamin Pritchard
Version: 1.0
Author URI: https://benjaminpritchard.org
*/

// This just echoes the chosen line, we'll position it later
function insert_lp_quote() {
	echo "<p id='lp-quote'>$quote</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'insert_lp_quote' );

// We need some CSS to position the paragraph
function insert_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#lp-quote {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	.block-editor-page #lp-quote {
		display: none;
	}
	</style>
	";
}

add_action( 'admin_head', 'insert_css' );
wp_enqueue_script('lp-quote-js', plugin_dir_url(__FILE__) . 'lp-quote.js');


