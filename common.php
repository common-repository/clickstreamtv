<?php

/**
* Set flash error msg
*
* @param String to display
* 
* @return void
*/
function set_error_msg($msg)
{
    $_SESSION['cstv_msg'] = '<div class="error below-h2">' . $msg . '</div>';
}
     
/**
* Set flash success msg
*
* @param String to display
* 
* @return void
*/
function set_msg($msg)
{
    $_SESSION['cstv_msg'] = '<div class="updated below-h2">' . $msg . '</div>';
}
     
/**
* Display flash msg
* 
* @return void
*/
function msg()
{
    if(!isset($_SESSION['cstv_msg'])) return false;
     echo $_SESSION['cstv_msg'];
     unset($_SESSION['cstv_msg']);
}
     
/**
* Clean dump
*
* @param mixed $msg
*
* @return void
*/
function dump($msg)
{
    echo '<pre>';var_dump($msg);echo '</pre>';
}

/**
 * Get account specs
 * 
 * @return object specs
 */
function get_acct_specs()
{
    $opts = get_option(CSTV_OPTS);
    
    // init specs
    $obj = new stdClass();
    $obj->width = 786;
    $obj->height = 640;
    $obj->embed_playlist_width = 642;
    $obj->embed_playlist_height = 360;
    $obj->embed_video_width = 642;
    $obj->embed_video_height = 396;
        
    // assign specs, if available
    if($specs = @file_get_contents(CSTV_HOME . "/get/account/specs/plaintext?a={$opts['cstv_acct']}&k={$opts['cstv_auth']}"))
    {
        $parts = explode('|',urldecode($specs));
        $obj->width = $parts[0];
        $obj->height = $parts[1];
        $obj->embed_playlist_width = $parts[2];
        $obj->embed_playlist_height = $parts[3];
        $obj->embed_video_width = $parts[4];
        $obj->embed_video_height = $parts[5];
    }

    return $obj;
}

?>