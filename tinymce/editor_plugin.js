(function() {
	tinymce.create('tinymce.plugins.Cstv_Shortcode_Plugin', {
		init : function(ed, url) {
			var url_dialog = window.location.pathname.replace('post.php','options-general.php?page=cstv_settings&cstv_action=dialog');
			ed.addCommand('cstv_mce', function() {
				ed.windowManager.open({
					file : url_dialog,
					width : 550 + parseInt(ed.getLang('cstv.delta_width', 0)),
					height : 390 + parseInt(ed.getLang('cstv.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url, // Plugin absolute URL
					some_custom_arg : 'custom arg' // Custom argument
				});
			});
			ed.addButton('cstv', {
				title : 'Insert ClickStreamTV Video Shortcode',
				cmd : 'cstv_mce',
				image : url + '/cstv.gif'
			});
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('cstv', n.nodeName == 'Video');
			});
		},
		createControl : function(n, cm) {
			return null;
		},		
		getInfo : function() {
			return {
				longname : 'ClickStreamTV Video Shortcode Plugin',
				author   :  'Zbigniew Jasek',
				authorurl : 'http://clickstreamtv.com',
				infourl : 'http://clickstreamtv.com',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('cstv', tinymce.plugins.Cstv_Shortcode_Plugin);
})();


