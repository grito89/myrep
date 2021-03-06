<?php
/*
Plugin Name: Bottom Right PopUp Window
Plugin URI: http://wordpress.org/plugins/bottom-right-popup-window/
Description: Displays a right bottom pop up window with an image of your choice as a link to another (or the same) website.
Author: Fotis Daskalou, Yannis Papastamatis (yannispi)
Version: 0.1 alpha
Licence: GNU General Public Licence v2 or later
Licence URI: http://www.gnu.org/licenses/gpl-2.0.html
*/ 

// register style.css 
add_action( 'wp_enqueue_scripts', 'register_plugin_styles_for_popup' );

function register_plugin_styles_for_popup() {
	wp_register_style( 'bottom-right-popup-window', plugins_url( 'bottom-right-popup-window/css/style.css' ) );
	wp_enqueue_style( 'bottom-right-popup-window' );
}

add_action( 'wp_enqueue_scripts', 'load_js_file_for_popup' );

// load popup.js 
function load_js_file_for_popup() {
	wp_enqueue_script('bottom-right-popup-window', plugins_url( 'bottom-right-popup-window/js/popup.js' ) );
	wp_enqueue_script('jquery');
}

// function for the shortcode
function my_popup_shortcode( $atts ) {
 
// link and img url the 2 attributes 
    $my_popup_atts = shortcode_atts( array(
        'link-url' => 'Link-Url',
        'img-url' => 'Img-Url',
    ), $atts );
	
	global $output1, $output2, $plugins_url, $flag;

// flag to appear the popup window to the footer only in the pages that the shortcode is called.
	$flag = 1;
	
	$output1 = '';
	$output2 = '';

// output1 and output2 the 2 links from the shortcode
	$output1 = wp_kses_post( $my_popup_atts[ 'link-url' ]  );
	$output2 = wp_kses_post( $my_popup_atts[ 'img-url' ] );

// the url for the close_button.png
	$plugins_url = plugins_url('\bottom-right-popup-window\images\close_button.png','bottom-right-popup-window');
	
}

add_shortcode( 'my_popup', 'my_popup_shortcode' );

// create the popup window
function bottom_right_popup_window() {
	
	global $output1, $output2, $plugins_url, $flag;
	
	if($flag==1) { echo "<dialog id='myDialog_popup'><a href= '$output1' target='_blank'><img src= '$output2' height='250' width='250' alt='$output2' title='Pop up Window' /></a>
	<img src='$plugins_url' alt='close-window-button' id='close_button' /></dialog>"; }
 
}

// make the shortcode appear with the footer of the theme
add_action('wp_footer', 'bottom_right_popup_window');

?>
