<?php
/*
* Single video widget
*/ 

class Cstv_playlist_widget extends WP_Widget {

    /**
     * Constructor
     */
    function Cstv_playlist_widget()
    {

        $widget_ops = array('classname' => 'cstv_playlist', 
                            'description' => __('Playlist Pop-Up Player.', 
                            'cstv_playlist'));

        $control_ops = array('width' => 200, 
                             'height' => 350, 
                             'id_base' => 'cstv_playlist');
                             
        $this->WP_Widget('cstv_playlist', __('CSTV Playlist Pop-Up Player', 'cstv_playlist'), $widget_ops, $control_ops);

    }
	
    /**
     * Front end display w/wrapper
     * 
     * @param $args
     * @param $instance
     * 
     * @return void
     */
    function widget($args, $instance) 
    {
        extract($args);
        
        // display					
		echo $before_widget;        
        $this->display_widget($instance);		
		echo $after_widget;		
    }
    
    /**
     * Widget display
     * 
     * @param $instance
     * 
     * @return void
     */
    function display_widget($instance)
    {
        //get widget settings
        $link_text = $instance['cstv_popup_text'];
        $playlist_id = $instance['cstv_playlist'];
        $popup_type = $instance['cstv_popup_type'];
        $popup_w = $instance['cstv_popup_w'];
        $popup_h = $instance['cstv_popup_h'];
        $popup_thumb = $instance['cstv_popup_thumb'];
        $no_thumb = $instance['cstv_popup_nothumb'];
        
        // display
        $path = dirname(__FILE__) . '/../views/cstv_playlist_link.php';
        include($path); 
    }

    /**
     * Update
     * 
     * @param $new_instance
     * @param $old_instance
     * 
     * @return instance settings
     */
    function update($new_instance, $old_instance) 
    {
        // copy settings
        $instance = $old_instance;
        
        $specs = get_acct_specs();
                
        // set data 
        $instance['cstv_playlist'] = $new_instance['cstv_playlist'];
        $instance['cstv_popup_text'] = $new_instance['cstv_popup_text'];
        $instance['cstv_popup_type'] = $new_instance['cstv_popup_type'];
        $instance['cstv_popup_thumb'] = $new_instance['cstv_popup_thumb'];
        $instance['cstv_popup_nothumb'] = $new_instance['cstv_popup_nothumb'];
        $instance['cstv_popup_w'] = $specs->width;
        $instance['cstv_popup_h'] = $specs->height;

        return $instance;
    }

    /**
     * Displays the widget settings controls on the widget panel
     * 
     * @param $instance
     * 
     * @return void
     */
    function form($instance) 
    {
        // settings and options
        $instance = wp_parse_args( (array) $instance);
        $opts = get_option(CSTV_OPTS); 
        $playlists = @file_get_contents(CSTV_HOME . "/get/playlist/list/plaintext?a={$opts['cstv_acct']}&k={$opts['cstv_auth']}");    
        
        // get preview
        ob_start();
        $this->display_widget($instance);
        $preview = ob_get_contents();
        ob_end_clean();
        
        // display
        $path = dirname(__FILE__) . '/../views/cstv_playlist_settings.php';
        include($path);
    }

}
?>