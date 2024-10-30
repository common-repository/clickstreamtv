<?php 

/**
 * Main admin 'controller'
 * 
 * @return void
 */
function cstv_admin()
{
    $bloginfo = get_bloginfo('version');
    if((int) $bloginfo < 3.0)
    {
        echo '<div class="error below-h2">This plugin requires WordPress version 3.0 or greater</div>';
        return;
    }
    // dispatch, if necessary  
    if(isset($_REQUEST['cstv_action']) && function_exists($_REQUEST['cstv_action']))
    {
        $_REQUEST['cstv_action']();
    }
    
    $opts = get_option(CSTV_OPTS_PL);
    
    if(!get_option(CSTV_OPTS))  // first time setup page
    {
        include(dirname(__FILE__) . "/views/cstv_admin_setup.php");
    }        
    else // regular setup page
    {
        include(dirname(__FILE__) . "/views/cstv_admin.php");
    }        
}

/**
 * Authenticate account id and api key
 * 
 * @return void
 */
function set_cstv_auth()
{
    // validation
    $errors = '';
    if(!$_POST['cstv_auth'])
    {
        $errors .= 'Please enter your ClickStreamTV API key.<br/>';
    }
    if(!$_POST['cstv_acct'])
    {
        $errors .= 'Please enter your ClickStreamTV account ID.<br/>'; 
    }

    if($errors)
    {
        set_error_msg($errors);
        return false;
    }
    
    // check with cstv    
    $res = @file_get_contents(CSTV_HOME . "/do/auth/verify/plaintext?a={$_POST['cstv_acct']}&k={$_POST['cstv_auth']}");
        
    if($res == 'success') // valid creds
    {        
        $opts = array(
                'cstv_acct' => $_POST['cstv_acct'],
                'cstv_auth' => $_POST['cstv_auth'] 
        );
        
        if(!get_option(CSTV_OPTS)) // first time, add options
        {
            //dump($opts);die('add');
            add_option(CSTV_OPTS, $opts);
            
            // initialize plugin
            $opts_pl = array(
                'single_video'  => 'enabled',
                'playlist'      => 'enabled',
                'wysiwyg'       => 'enabled'
            );
            add_option(CSTV_OPTS_PL,$opts_pl);
        }
        else // subsequent times, update
        {
            update_option(CSTV_OPTS, $opts);
        }
    }
    else // invalid creds
    {        
        set_error_msg('The ClickStreamTV API key you provided is not valid.');
        return false;
    }
    
    // all done
    set_msg('Your ClickStreamTV plugin has been successfully configured.');
    return true;
}


/**
 * admin actions/registraions
 */
add_action('admin_print_scripts', 'wp_gear_manager_admin_scripts'); 
add_action('admin_print_styles', 'wp_gear_manager_admin_styles');
add_action('admin_init', 'cstv_register_options' );

function cstv_register_options()
{
    register_setting(CSTV_OPTS_PL, CSTV_OPTS_PL);
}

function wp_gear_manager_admin_scripts() 
{
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'tribe-clickstreamtv', plugins_url('assets/script.js', __FILE__), array('thickbox'), FALSE, TRUE );
}

function wp_gear_manager_admin_styles() 
{
    wp_enqueue_style('thickbox');
}
?>