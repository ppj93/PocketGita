<?php
// Exit if accessed directly
//echo '<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>';
//echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/jplayer/jquery.jplayer.js"></script>';

if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );


function pctGtaAddShareWidget($filePath, $cssBtnClasses) {
	$pctGtaFBShareBase = "https://facebook.com/sharer.php?u=%s&t=Check+this+out";
	$pctGtaFBShareLink = sprintf($pctGtaFBShareBase, get_permalink($post->ID));	
	$pctGtaGoogleShareBase = "https://plus.google.com/share?url=%s";
	$pctGtaGoogleShareLink = sprintf($pctGtaGoogleShareBase, get_permalink($post->ID));	
	$pctGtaTwitterShareBase = "https://twitter.com/home?status=%s";
	$pctGtaTwitterShareLink = sprintf($pctGtaTwitterShareBase, get_permalink($post->ID));
  
  $pctGtaFBShare = '<a href="%s" class="%s" target="_blank"  title="Share on Facebook"><span class="fa fa-facebook"></span></a>';
	echo sprintf($pctGtaFBShare, $pctGtaFBShareLink, $cssBtnClasses);
}
// END ENQUEUE PARENT ACTION


function pctGtaSliderListenNowWidget($audioId) {
	$template = ' <a href="javascript:;" data-id="%s" class="play-me i-lg">             
<span class="pctGta-start-listening">start listening</span>
    <span class="fa fa-play text" style="color: white"></span>
	<i class="fa fa-pause text-active"  style="color: #46b6cb"></i>
</a>';
  	echo sprintf($template, $audioId);
}
