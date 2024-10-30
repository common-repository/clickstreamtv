<div class="wrap">
    <?php msg(); ?>
    <img width="39" style="float:left;margin-right:5px;" src="<?php echo WP_PLUGIN_URL.'/clickstreamtv/assets/images/camera.png'?>"/>
    <h2>ClickStreamTV Settings</h2><br/>
    <div style="border:green solid 1px; padding:5px; background:#EBF5EB;font-size:14px;">
        Before you start using the ClickStreamTV plugin, you must enter your ClickStreamTV <b>account id</b> and <b>API key</b>.
        Both of these items can be found int your ClickStreamTV Media Control Center under the <b>Settings</b> tab.
    </div>

    <div style="margin:10px;" id="cstv-creds">
        <form method="post">
            <table>
                <tr>
                    <td><label for="cstv_auth" style="width:150px;" >API Key: </label></td>
                    <td>
                    <input type="text" name="cstv_auth" />
                    </td>
                </tr>
                <tr>
                    <td><label for="cstv_acct"  style="width:250px;">Account ID: </label></td>
                    <td>
                    <input type="text" name="cstv_acct"/>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                    <input type="submit" value="submit" />
                    </td>
                </tr>
            </table>
            <input type="hidden" name="cstv_action" value="set_cstv_auth" />
        </form>
    </div>

    <hr style="margin-top:15px;" />
    <p><span class="description" style="font-size:16px">
        With the ClickStreamTV plugin and widgets, you can incorporte video into your site with just a couple of clicks.
        To start using it, please enter your ClickStreamTV credentials in the form above and submit.  
    </span></p>
        <div style="float:left;padding:5px;margin:10px 10px 10px 0px;text-align:center">
            <img style='border:1px solid #eee;padding:5px;' src="<?php echo WP_PLUGIN_URL.'/clickstreamtv/assets/images/single-widget-screenshot.png'?>"/>
            <br/>
            <label>Single Video Pop-Up Player Widget</label>
            <input  type="checkbox" disabled="disabled" />
        </div>
        <div style="float:left;padding:5px;margin:10px 10px 10px 0px;text-align:center">
            <img style='border:1px solid #eee;padding:5px;' src="<?php echo WP_PLUGIN_URL.'/clickstreamtv/assets/images/playlist-widget-screenshot.png'?>"/>
            <br/>
            <label>Playlist Pop-Up Player Widget</label>
            <input disabled="disabled" type="checkbox"  />
        </div>
        <div style="float:left;padding:5px;margin:10px 10px 10px 0px;text-align:center">
            <img style='border:1px solid #eee;padding:5px;' src="<?php echo WP_PLUGIN_URL.'/clickstreamtv/assets/images/wysiwyg-screenshot.png'?>"/>
            <br/>
            <label>TinyMCE Editor Button</label>
            <input disabled="disabled" type="checkbox"  />
        </div>
</div>