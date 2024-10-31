<?php
/*
Plugin Name: Nice Accordion
Plugin URI: https://plugins-demo.nayeemriddhi.info/nice-accor/
Description:Nice Accordion is Customizable Nice Accordion For Your Website
Author: Nayeem Hyder
Author URI: http://www.nayeemriddhi.info
Text Domain: nice-accor
Version: 1.0.0
*/


//For Metabox
include_once( plugin_dir_path( __FILE__ ) . '/library/metabox/metabox.php' );

include_once( plugin_dir_path( __FILE__ ) . '/library/metabox/cmb2-tabs/main.php' );
include_once( plugin_dir_path( __FILE__ ) . '/library/metabox/cmb2-tabs/functions.php' );

// For Plugin Functions
include_once( plugin_dir_path( __FILE__ ) . '/functions.php' );

// Frontend Shortcode Script
include_once( plugin_dir_path( __FILE__ ) . '/accor-shortcode.php' );


//Load Js file for plugin
function nice_accor_plugin_main_js() {

     wp_enqueue_script( 'nice-accordion-customjs', plugins_url( '/assets/js/accor-cjs.js', __FILE__ ), array('jquery'), time(), true);

}  add_action('init','nice_accor_plugin_main_js');


//Load Css file for plugin
function nice_accor_plugin_main_css() {
   
    wp_enqueue_style( 'nice-accor-css', plugins_url( '/assets/css/style.css', __FILE__ ));
    wp_enqueue_style( 'nice-accor-font-awesome-css', plugins_url( '/assets/css/font-awesome.min.css', __FILE__ ));

} add_action('init','nice_accor_plugin_main_css');







