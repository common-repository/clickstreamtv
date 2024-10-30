<?php
/**
 * Short Code displays
 */
?>
<?php if($atts['content'] == 'video' && $atts['type'] == 'embed'): ?>
    <iframe src="http://embed.clickstreamtv.net/embed/video/<?php echo $atts['id']; ?>/" style="width:<?php echo $atts['width']; ?>px;height:<?php echo $atts['height']; ?>px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" vspace="0" hspace="0"></iframe>

<?php elseif($atts['content'] == 'playlist' && $atts['type'] == 'embed'): ?>
    <iframe src="http://embed.clickstreamtv.net/embed/playlist/<?php echo $atts['id']; ?>/" style="width:<?php echo $atts['width']; ?>px;height:<?php echo $atts['height']; ?>px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" vspace="0" hspace="0"></iframe>

<?php elseif($atts['content'] == 'embedcode' && $atts['type'] == 'embed'): list($link,$w,$h) = explode('::',$atts['id']);?>
    <iframe src="http://embed.clickstreamtv.net/embed/link/<?php echo $link; ?>/" style="width:<?php echo $w; ?>px;height:<?php echo $h; ?>px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" vspace="0" hspace="0"></iframe>

<?php elseif($atts['content'] == 'video' && $atts['type'] == 'js'): ?>
    <a href="#" onclick="play('http://link.clickstreamtv.net/video/<?php echo $atts['id']; ?>',<?php echo $atts['width']; ?>,<?php echo $atts['height']; ?>);return false;" >
        <?php echo $atts['text']; ?>
        <div style="clear:both;"></div>
        <img src="<?php echo $atts['image']; ?>" border="0">
    </a>
    <script type="text/javascript" language="javascript" src="https://cst.clickstreamtv.net/gateway/link/launcher.js"></script>

<?php elseif($atts['content'] == 'playlist' && $atts['type'] == 'js'): ?>
    <a href="#" onclick="play('http://link.clickstreamtv.net/playlist/<?php echo $atts['id']; ?>',<?php echo $atts['width']; ?>,<?php echo $atts['height']; ?>);return false;" >
        <?php echo $atts['text']; ?>
        <div style="clear:both;"></div>
        <img src="<?php echo $atts['image']; ?>" border="0">
    </a>
    <script type="text/javascript" language="javascript" src="https://cst.clickstreamtv.net/gateway/link/launcher.js"></script>
    
<?php elseif($atts['content'] == 'video' && $atts['type'] == 'simple'): ?>
    <a href="http://link.clickstreamtv.net/video/<?php echo $atts['id']; ?>" >
        <?php echo $atts['text']; ?>
        <div style="clear:both;"></div>
        <img src="<?php echo $atts['image']; ?>" border="0">
    </a>
    
<?php elseif($atts['content'] == 'playlist' && $atts['type'] == 'simple'): ?>
    <a href="http://link.clickstreamtv.net/playlist/<?php echo $atts['id']; ?>" >
        <?php echo $atts['text']; ?>
        <div style="clear:both;"></div>
        <img src="<?php echo $atts['image']; ?>" border="0">
    </a>
       
<?php endif; ?>