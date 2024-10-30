<div style="text-align:center;border:solid #ccc 1px;">
    <div style="font-style:italic;font-weight:bold;font-size:14px;">Pop-Up Link Preview</div>
    <?php echo $preview; ?>
</div>
<hr/>
<p>
   <label for="<?php echo $this->get_field_id( 'cstv_video' ); ?>"><?php _e('Select a video:', 'cstv_video'); ?></label> 
   <select id="<?php echo $this->get_field_id( 'cstv_video' );?>" name="<?php echo $this->get_field_name( 'cstv_video' );?>" class="widefat" style="width:100%;">
       <?php $videos = explode('|',urldecode($videos)); foreach($videos as $v) : list($id,$title) = explode('::',$v); ?>
       <option value="<?php echo $id; ?>" <?php echo $instance['cstv_video'] == $id ? 'selected="selected"' : ''; ?> ><?php echo $title; ?></option>
       <?php endforeach; ?>
    </select>
</p>

<p>
   <label for="<?php echo $this->get_field_id( 'cstv_popup_type' ); ?>"><?php _e('Select link type:', 'cstv_popup_type'); ?></label> 
   <select id="<?php echo $this->get_field_id( 'cstv_popup_type' );?>" name="<?php echo $this->get_field_name( 'cstv_popup_type' );?>" class="widefat" style="width:100%;">
       <option value="js" <?php echo $instance['cstv_popup_type'] == 'js' ? 'selected="selected"' : ''; ?> >JavaScript Popup</option>
       <option value="simple" <?php echo $instance['cstv_popup_type'] == 'simple' ? 'selected="selected"' : ''; ?> >Simple link</option>       
   </select>
</p>

<p>
	<label for="<?php echo $this->get_field_id('cstv_popup_text'); ?>">Link text: </label>
	<input class="widefat" id="<?php echo $this->get_field_id('cstv_popup_text'); ?>" name="<?php echo $this->get_field_name('cstv_popup_text'); ?>" type="text" value="<?php echo isset($instance['cstv_popup_text']) ? $instance['cstv_popup_text'] : 'Watch Video Now'; ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'cstv_popup_nothumb' ); ?>"><?php _e('Display thumbnail:', 'cstv_popup_nothumb'); ?></label>
    <select id="<?php echo $this->get_field_id( 'cstv_popup_nothumb' );?>" name="<?php echo $this->get_field_name( 'cstv_popup_nothumb' );?>" class="widefat" style="width:100%;">
       <option value="yes" <?php echo $instance['cstv_popup_nothumb'] == 'yes' ? 'selected="selected"' : ''; ?> >Yes</option>
       <option value="no" <?php echo $instance['cstv_popup_nothumb'] == 'no' ? 'selected="selected"' : ''; ?> >No</option>
    </select>
</p>

<p>
    <img class="cstv_thumb" src="<?php echo isset($instance['cstv_popup_thumb']) ? $instance['cstv_popup_thumb'] : WP_PLUGIN_URL.'/clickstreamtv/assets/images/play_btn.png'?>" /><br/>
    <div style="clear:both;"></div>
    <a href="#" class="thickbox-image-widget" title='<?php echo $image_title; ?>' onClick="cstv_set_thumb();;return false;" style="text-decoration:none">
        <img src='images/media-button-image.gif' alt='set thumbnail' title="set thumbnail" align="absmiddle" /> Set thumbnail
    </a>
    <input class="upload_image_cstv" id="<?php echo $this->get_field_id('cstv_popup_text'); ?>" type="hidden" value="<?php echo isset($instance['cstv_popup_thumb']) ? $instance['cstv_popup_thumb'] : WP_PLUGIN_URL.'/clickstreamtv/assets/images/play_btn.png'?>" class="upload_image_cstv" name="<?php echo $this->get_field_name( 'cstv_popup_thumb' );?>"   />
</p>