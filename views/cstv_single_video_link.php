<?php if($popup_type == 'js'): ?>
<script type="text/javascript" language="javascript" src="https://cst.clickstreamtv.net/gateway/link/launcher.js"></script>
<a href="#" onclick="play('http://link.clickstreamtv.net/video/<?php echo $file_id; ?>',<?php echo $popup_w; ?>,<?php echo $popup_h; ?>);return false;" >
    <?php echo $link_text; ?>
    <?php if($no_thumb == 'yes'): ?>
    <div style="clear:both;"></div>
    <img src="<?php echo $popup_thumb; ?>" />
    <?php endif; ?>
</a>
<?php else: ?>
<a href="http://link.clickstreamtv.net/video/<?php echo $file_id; ?>" >
    <?php echo $link_text; ?>
    <?php if($no_thumb == 'yes'): ?>
    <div style="clear:both;"></div>
    <img src="<?php echo $popup_thumb; ?>" />
    <?php endif; ?>
</a>
<?php endif; ?>