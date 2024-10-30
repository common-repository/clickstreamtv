<?php
/**
* Tinymce Editor Button
 * 
 * @return void
 */
function cstv_add_button() 
{
   // check permissions
   if(!current_user_can('edit_posts') && !current_user_can('edit_pages'))
   {
       return false;
   } 
 
   // Add only in Rich Editor mode
   if(get_user_option('rich_editing') == 'true') 
   {
     add_filter("mce_external_plugins", "cstv_tinymce_plugin"); // add plugin url to plugin url array.
     add_filter('mce_buttons', 'register_cstv_button'); //add button to first row.
   }
}

/**
 * Insert button
 * 
 * @return array buttons
 */
function register_cstv_button($buttons) 
{
   array_push($buttons, "separator", "cstv");
   return $buttons;
}

/**
 * Load the TinyMCE plugin : editor_plugin.js (wp2.5)
 */ 
function cstv_tinymce_plugin($plugin_array) 
{  
    $url_to_plugin =  WP_PLUGIN_URL."/clickstreamtv/tinymce/editor_plugin.js";	
	
	//check option settings whether to load in TinyMCE button
	$opts = get_option(CSTV_OPTS_PL);
	if(isset($opts['wysiwyg']) && $opts['wysiwyg'] == 'enabled')
	{
    	$plugin_array['cstv'] = $url_to_plugin; //add to tinymce plugins array
    
	}

	return $plugin_array;	

}

// register
add_action('init', 'cstv_add_button');
?>