jQuery(document).ready(function(){
	window.send_to_editor = function(html) {
		imgurl = jQuery('img', html).attr('src');
		jQuery('.upload_image_cstv').val(imgurl);
		jQuery('.cstv_thumb').attr('src', imgurl);
		tb_remove();
	}
});
function cstv_set_thumb(){
	formfield = jQuery('.upload_image_cstv').attr('name');
	tb_show('', 'media-upload.php?type=image&TB_iframe=true');
	return false;
}