<?php
/**
 * Plugin Name: Elementor Addon Elements
 * Description: Add new elements to Elementor page builder plugin.
 * Plugin URI: http://www.elementoraddons.com/
 * Author: WebTechStreet
 * Version: 1.1
 * Author URI: http://www.webtchstreet.com/
 *
 * Text Domain: wts-eae
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ELEMENTOR_ADDON_URL', plugins_url( '/', __FILE__ ) );
define( 'ELEMENTOR_ADDON_PATH', plugin_dir_path( __FILE__ ) );


require_once ELEMENTOR_ADDON_PATH.'inc/elementor-helper.php';

if(is_admin()){
	require_once ELEMENTOR_ADDON_PATH. 'inc/admin/settings-page.php';
	require_once ELEMENTOR_ADDON_PATH. 'inc/admin/controls.php';
	require_once ELEMENTOR_ADDON_PATH. 'inc/admin/Settings.php';
}


function add_new_elements(){


   require_once ELEMENTOR_ADDON_PATH.'inc/helper.php';

   // load elements
   require_once ELEMENTOR_ADDON_PATH.'elements/textseparator.php';
   require_once ELEMENTOR_ADDON_PATH.'elements/pricetable.php';
   require_once ELEMENTOR_ADDON_PATH.'elements/flipbox.php';
   require_once ELEMENTOR_ADDON_PATH.'elements/shape-separator.php';
   require_once ELEMENTOR_ADDON_PATH.'elements/post-list.php';
   require_once ELEMENTOR_ADDON_PATH.'elements/animated-text.php';
   require_once ELEMENTOR_ADDON_PATH.'elements/splittext.php';

   require_once ELEMENTOR_ADDON_PATH.'elements/twitter.php';

   require_once ELEMENTOR_ADDON_PATH.'elements/gmap.php';

   require_once ELEMENTOR_ADDON_PATH.'elements/image-compare.php';


}
add_action('elementor/widgets/widgets_registered','add_new_elements');





function eae_scripts(){
   wp_enqueue_style('eae-css',ELEMENTOR_ADDON_URL.'assets/css/eae.css');

   /* animated text css and js file*/
   wp_enqueue_script('animated-main',ELEMENTOR_ADDON_URL.'assets/js/animated-main.js', array('jquery'),'1.0', true);

   wp_enqueue_script('eae-main',ELEMENTOR_ADDON_URL.'assets/js/eae.js', array('jquery'),'1.0', true);

   wp_enqueue_script('eae-partices',ELEMENTOR_ADDON_URL.'assets/js/particles.js', array('jquery'),'1.0', true);



   $map_key = get_option('wts_eae_gmap_key');
   if(isset($map_key) && $map_key != ''){
	   wp_register_script('eae-gmap', 'https://maps.googleapis.com/maps/api/js?key='.$map_key);
   }

   wp_register_script('pinit', '//assets.pinterest.com/js/pinit.js', '', '', false);

   
   wp_register_script('eae-stickyanything',ELEMENTOR_ADDON_URL.'assets/js/stickyanything.js',array('jquery'),'1.1.2',true);

}
add_action( 'wp_enqueue_scripts', 'eae_scripts' );



function eae_editor_enqueue_scripts(){
    wp_enqueue_script('eae-partices',ELEMENTOR_ADDON_URL.'assets/js/particles.js', array('jquery'),'1.0', true);
}
add_action('elementor/editor/wp_head',  'eae_editor_enqueue_scripts');





function _editor_enqueue_scripts(){
	$map_key = get_option('wts_eae_gmap_key');
	if(isset($map_key) && $map_key != ''){
		wp_enqueue_script('eae-gmap', 'https://maps.googleapis.com/maps/api/js?key='.$map_key);
	}

	wp_enqueue_script('pinit', '//assets.pinterest.com/js/pinit.js');
}
add_action('elementor/editor/wp_head', '_editor_enqueue_scripts');








