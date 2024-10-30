var cstv_dialog = {
	is_link:false,
	cstv_width:786,
	cstv_height:640,
	cstv_embed_playlist_width:642,
	cstv_embed_playlist_height:360,
	cstv_embed_video_width:642,
	cstv_embed_video_height:396,
	init : function() {
	},
	insert : function() {	
		var type = document.forms[0].cstv_type.value;
		var content = get_radio_value();
		var id = null;
		var extras = '';

		if(content == 'playlist' || content == 'jspopup_playlist' || content == 'simplelink_playlist'){ // playlists
			id = document.forms[0].cstv_playlist.value;
		}
		else if(content == 'embedcode'){ // embedcodes
			id = document.forms[0].cstv_embedcode.value;
		}
		else { // single video
			id = document.forms[0].cstv_video.value; // init to video
		}

		if(!id || id == '::::'){ // selected item invalid
			alert('Empty items can not be inserted.');
			return false;
		}
		if(this.is_link){ // pop-up players
			extras = ' TEXT="Watch Video Now" IMAGE="'+this.cstv_img+'"  width="'+this.cstv_width+'" height="'+this.cstv_height+'" ';
		} 
		else { // embedded players
			if(content == 'playlist'){ // playlist
				extras = ' width="'+this.cstv_embed_playlist_width+'" height="'+this.cstv_embed_playlist_height+'" ';

			}
			else { // single video
				extras = ' width="'+this.cstv_embed_video_width+'" height="'+this.cstv_embed_video_height+'" ';
			}
		}
		var cstv_shortcode = '[cstv id="'+id+'" type="'+type+'" content="'+content+'" '+extras+']';
		tinyMCEPopup.editor.execCommand('mceInsertRawHTML', false, cstv_shortcode);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(cstv_dialog.init, cstv_dialog);

function cstv_select_content(id,type){
	cstv_dialog.is_link = false;
	document.getElementById('cstv_msg').style.display='none';
	document.getElementById('cstv_video').disabled='disabled';
	document.getElementById('cstv_playlist').disabled='disabled';
	document.getElementById('cstv_embedcode').disabled='disabled';
	document.getElementById(id).disabled='';
	document.getElementById('cstv_type_hidden').value=type;
	if(type != 'embed'){
		cstv_dialog.is_link = true;
		document.getElementById('cstv_msg').style.display='block';
	}
}

function get_radio_value(){
	for (var i=0; i < document.forms[0].cstv_content.length; i++){if (document.forms[0].cstv_content[i].checked){return document.forms[0].cstv_content[i].value;}}
}
