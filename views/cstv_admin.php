<div class="wrap">
	<?php msg(); ?>
	<img width="39" style="float:left;margin-right:5px;" src="<?php echo WP_PLUGIN_URL.'/clickstreamtv/assets/images/camera.png'?>"/>
	<h2>ClickStreamTV Settings</h2><br/>

	<input name="Submit" type="submit" class="button-primary" onclick="var state=document.getElementById('cstv-creds').style.display=='none'?'block':'none';document.getElementById('cstv-creds').style.display=state;"  value="<?php esc_attr_e('Edit Credentials'); ?>" />
	<div style="display:none;margin:10px;" id="cstv-creds">
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

	<form action="options.php" method="post">
		<?php settings_fields(CSTV_OPTS_PL); ?>
		<p>
			<span class="description" style="font-size:14px">Select which components which you would like to make available.</span>
		</p>
		<div style="float:left;padding:5px;margin:10px 10px 10px 0px;text-align:center">
			<img style='border:1px solid #eee;padding:5px;' src="<?php echo WP_PLUGIN_URL.'/clickstreamtv/assets/images/single-widget-screenshot.png'?>"/>
			<br/>
			<label>Single Video Pop-Up Player Widget</label>
			<input <?php echo isset($opts['single_video']) ? 'checked="checked"' : ''; ?> id="single_video" name="<?php echo CSTV_OPTS_PL; ?>[single_video]" type="checkbox" value="enabled" />
		</div>
		<div style="float:left;padding:5px;margin:10px 10px 10px 0px;text-align:center">
			<img style='border:1px solid #eee;padding:5px;' src="<?php echo WP_PLUGIN_URL.'/clickstreamtv/assets/images/playlist-widget-screenshot.png'?>"/>
			<br/>
			<label>Playlist Pop-Up Player Widget</label>
			<input <?php echo isset($opts['playlist']) ? 'checked="checked"' : ''; ?> id="playlist" name="<?php echo CSTV_OPTS_PL; ?>[playlist]" type="checkbox" value="enabled" />
		</div>
		<div style="float:left;padding:5px;margin:10px 10px 10px 0px;text-align:center">
			<img style='border:1px solid #eee;padding:5px;' src="<?php echo WP_PLUGIN_URL.'/clickstreamtv/assets/images/wysiwyg-screenshot.png'?>"/>
			<br/>
			<label>TinyMCE Editor Button</label>
			<input <?php echo isset($opts['wysiwyg']) ? 'checked="checked"' : ''; ?> id="wysiwyg" name="<?php echo CSTV_OPTS_PL; ?>[wysiwyg]" type="checkbox" value="enabled" />
		</div>
		<br/>
		<div style="float:left;padding:5px;margin:10px 10px 10px 0px;clear:both">
			<p>
				<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
			</p>
		</div>
	</form>
</div>