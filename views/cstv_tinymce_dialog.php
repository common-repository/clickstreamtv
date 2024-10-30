<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<head>
  <title>ClickStreamTV Insert Video ShortCode</title>
  <script type="text/javascript" src="<?php echo str_replace('wp-content','wp-includes',WP_CONTENT_URL); ?>/js/tinymce/tiny_mce_popup.js"></script>
  <script type="text/javascript" src="<?php echo WP_PLUGIN_URL . '/clickstreamtv/tinymce/editor_insert.js'; ?>"></script>
  <script type="text/javascript">
  window.onload = function (){
  cstv_dialog.cstv_width = <?php echo $specs->width; ?>;
  cstv_dialog.cstv_height = <?php echo $specs->height; ?>;
  cstv_dialog.cstv_embed_playlist_width = <?php echo $specs->embed_playlist_width; ?>;
  cstv_dialog.cstv_embed_playlist_height = <?php echo $specs->embed_playlist_height; ?>;
  cstv_dialog.cstv_embed_video_width = <?php echo $specs->embed_video_width; ?>;
  cstv_dialog.cstv_embed_video_height = <?php echo $specs->embed_video_height; ?>;
  cstv_dialog.cstv_img = '<?php echo WP_PLUGIN_URL; ?>/clickstreamtv/assets/images/play_btn.png';   
  }
  </script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
html,body,td,th,input,select {
    font-family:Arial, Helvetica, sans-serif;
    font-size: 12px;
}
-->
</style>
</head>
<body>
<form onsubmit="cstv_dialog.insert();return false;" id="shortcode_form" action="#">
<div id="cstv_msg" style="border:#E0C61B solid 1px;padding:5px;color:#000;background:#F5F2E1;display:none;" >To change the text and/or image for this link, modify the "TEST" and "IMAGE" fields in the generated short code.</div>
<table width="100%">
  <tr>
    <td>&nbsp;</td>
    <td height="38" colspan="2"><h2>Insert Video Short Code</h2></td>
  </tr> 
  <tr>
    <td>I want to...</td>
    <td height="38" colspan="2">        
        <input type="radio" checked="checked" name="cstv_content" value="video" onclick="cstv_select_content('cstv_video','embed');" />
        <label for="cstv_content">Embed a video</label><br/>
        
        <input type="radio" name="cstv_content" value="playlist" onclick="cstv_select_content('cstv_playlist','embed');" />
        <label for="cstv_content">Embed a playlist</label><br/>
        
        <input type="radio" name="cstv_content" value="embedcode" onclick="cstv_select_content('cstv_embedcode','embed');" />
        <label for="cstv_content">Embed a code I created in the MCC</label><br/>

        <input type="radio" name="cstv_content" value="video" onclick="cstv_select_content('cstv_video','js');" />
        <label for="cstv_content">Insert a single video pop-up player link</label><br/>
        
        <input type="radio" name="cstv_content" value="video" onclick="cstv_select_content('cstv_video','simple');" />
        <label for="cstv_content">Insert a single video simple link</label><br/>
        
        <input type="radio" name="cstv_content" value="playlist" onclick="cstv_select_content('cstv_playlist','js');" />
        <label for="cstv_content">Insert a pop-up player link for a full playlist</label><br/>
        
        <input type="radio" name="cstv_content" value="playlist" onclick="cstv_select_content('cstv_playlist','simple');" />
        <label for="cstv_content">Insert a simple link to a full playlist</label><br/>
        </br/>
    </td>
  </tr> 
  <tr>
    <td width="70" height="30">Video</td>
    <td height="30" colspan="2">
       <select id="cstv_video" name="cstv_video" class="widefat" style="width:100%;">
           <?php foreach($videos as $v) : list($id,$title) = explode('::',$v); ?>
           <option value="<?php echo $id; ?>" ><?php echo $title ? $title : 'no title'; ?></option> 
           <?php endforeach; ?>
        </select>
      </td>
    </tr>
  <tr>
    <td width="70" height="30">Playlist</td>
    <td height="30" colspan="2">
       <select id="cstv_playlist" disabled name="cstv_playlist" class="widefat" style="width:100%;">
           <?php foreach($playlists as $v) : list($id,$title) = explode('::',$v); ?>
           <option value="<?php echo $id; ?>" ><?php echo $title ? $title : 'no title'; ?></option> 
           <?php endforeach; ?>
        </select>
      </td>
   </tr>
  <tr>
    <td width="70" height="30">Embed&nbsp;Code</td>
    <td height="30" colspan="2">
       <select id="cstv_embedcode" disabled name="cstv_embedcode" class="widefat" style="width:100%;">
           <?php foreach($embed_codes as $v) : list($title,$link_key,$w,$h) = explode('::',$v); if($title == 'empty') continue; ?>
           <option value="<?php echo $link_key.'::'.$w.'::'.$h; ?>" ><?php echo $title ? $title : 'no title'; ?></option> 
           <?php endforeach; ?>
        </select>
      </td>
   </tr>
   <tr>
    <td height="30">&nbsp;</td>
    <td height="30" width="50"><input type="button" id="insert" name="insert" value="{#insert}" onClick="cstv_dialog.insert();"  /></td>    
    <td height="30"><input type="button" id="cancel" name="cancel" value="{#cancel}" onClick="tinyMCEPopup.close();"  /></td>
  </tr>
</table>
<input type="hidden" id="cstv_type_hidden" name="cstv_type" value="embed" />
</form>
</body> 
</html>
