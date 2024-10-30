<?php
/*
Plugin Name: Clickstreamtv
Plugin URI: http://clickstreamtv.com
Description: ClickStreamTV Player
Version: 1.0.4
Author: ClickStreamTV
Author URI: http://clickstreamtv.com
License: GPL
Parent: Clickstreamtv
*/
error_reporting(0);

define('CSTV_HOME','http://50.19.213.14');
define('CSTV_OPTS','_cstv_auth');
define('CSTV_OPTS_PL','_cstv_plugin_options');
define('CSTV_NA','<b><i>Unavailable</i></b>');

// Common functions
require_once(dirname(__FILE__) . "/common.php");

// Admin settings
require_once(dirname(__FILE__) . "/admin.php");

// Single video widget class
require_once(dirname(__FILE__) . "/widgets/cstv_single_video.class.php");

// Playlist widget class
require_once(dirname(__FILE__) . "/widgets/cstv_playlist.class.php");

// Tinymce button
require_once(dirname(__FILE__) . "/tinymce/tinymce.php");



// Intercept wysiwyg dialog display
if(isset($_GET['cstv_action']) && $_GET['cstv_action'] == 'dialog')
{
    $specs = get_acct_specs();
    $opts = get_option(CSTV_OPTS); 
    $videos = explode('|',urldecode(@file_get_contents(CSTV_HOME . "/get/video/list/plaintext?a={$opts['cstv_acct']}&k={$opts['cstv_auth']}")));  
    $playlists = explode('|',urldecode(@file_get_contents(CSTV_HOME . "/get/playlist/list/plaintext?a={$opts['cstv_acct']}&k={$opts['cstv_auth']}")));
    $embed_codes = explode('|',urldecode(@file_get_contents(CSTV_HOME . "/get/embedcodes/list/plaintext?a={$opts['cstv_acct']}&k={$opts['cstv_auth']}")));
    include(dirname(__FILE__) . '/views/cstv_tinymce_dialog.php');
    exit(0);
}


/**
 * global actions/registraions
 */
add_action('admin_menu', 'cstv_settings_panel_link');
add_action('widgets_init', 'load_cstv_widgets');
add_shortcode("cstv", "cstv_shortcode_display");
add_filter( 'plugin_action_links', 'cstv_settings_link', 10, 2 );

function cstv_settings_link( $links, $file ) 
{
    if ( $file == plugin_basename( dirname(__FILE__).'/clickstreamtv.php' ) ) 
    {
        $links[] = '<a href="options-general.php?page=cstv_settings">'.__('Settings').'</a>';
    }   
    return $links;
}

function cstv_settings_panel_link() 
{
    add_options_page('ClickstreamTV', 'ClickStreamTV','manage_options','cstv_settings', 'cstv_admin');
}

function load_cstv_widgets()
{
    $opts = get_option(CSTV_OPTS_PL);
    
    if(!empty($opts['single_video']))
    {
        register_widget('cstv_single_video_widget');
    }
    
    if(!empty($opts['playlist']))
    {
        register_widget('cstv_playlist_widget');
    }
}

function cstv_shortcode_display($atts, $content = null) {
    $opts = get_option(CSTV_OPTS_PL);
    if(empty($opts['wysiwyg']))
    {
        return '';
    }
    extract(shortcode_atts(array(
        "id" => ' ',
        "type" => ' ',
        "content" => ' '
    ), $atts));
   ob_start();
   include(dirname(__FILE__) . '/views/cstv_shortcode_display.php');
   $display = ob_get_contents();
   ob_clean();
   return $display;
}



?>