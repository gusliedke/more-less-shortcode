<?php
/*
Plugin Name: More Less Shortcode
Plugin URI: http://www.pedalo.co.uk
Description: Shortcode to Show more less content
Version: 0.1 
Author: Gustavo Liedke
Author URI: http://www.gustavoliedke.com
*/

/*
Show more less shortcode (Wordpress Plugin)
Copyright (C) 2014 Gustavo Liedke
Contact me at http://www.pedalo.co.uk

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/
define( 'MORE_LESS_SHORTCODE', plugins_url( '' , __FILE__ ) );

add_shortcode('moreless', 'more_less_shortcode');

function more_less_shortcode( $attributes, $content = null ) {
	extract( shortcode_atts( array(
		'class' => ''
	), $attributes ) );

	//process plugin
	$shortcode_output = '<button class="moreless">Show more</button><div class="content-hide hide">' . $content . '</div>';
	//send back text to calling function
	return $shortcode_output;
}
// Registering a button to tinymce
function register_button( $buttons ) {
   array_push( $buttons, "|", "moreless" );
   return $buttons;
}
function add_plugin( $plugin_array ) {
   $plugin_array['moreless'] = MORE_LESS_SHORTCODE . '/assets/tinymce_button/plugin.js';
   return $plugin_array;
}
function moreless_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin' );
      add_filter( 'mce_buttons', 'register_button' );
   }

}
add_action('init', 'moreless_button');

/**
 * Include Stylesheet and Script
 *
 * @since 1.0.0
 */
function more_less_shortcode_scripts() {
	if( get_option( 'more_less_disable_scripts' ) != 'no' ) {
    wp_enqueue_style('more_less_shortcode', MORE_LESS_SHORTCODE .'/assets/css/more-less-shortcode.css');
    wp_enqueue_script('more_less_shortcode', MORE_LESS_SHORTCODE .'/assets/js/more-less-shortcode.js',array('jquery'), true);
	}
}
add_action( 'wp_enqueue_scripts', 'more_less_shortcode_scripts');
?>