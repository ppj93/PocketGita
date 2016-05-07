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
	
	$pctGtaLinksTemplate = '<span class="dropdown">
		  <button class="btn btn-default btn-sm dropdown-toggle %s" type="button" data-toggle="dropdown"> Share <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
			<li><a href="%s" target="_blank"  title="Share on Facebook" style="target-new: tab;">Facebook</a></li>
			<li><a href="%s" target="_blank"  title="Share on Twitter" style="target-new: tab;">Twitter</a></li>
			<li><a href="%s" target="_blank"  title="Share on Google+" style="target-new: tab;">Google+</a></li>
		  </ul>
		</span>';
	
	echo sprintf($pctGtaLinksTemplate, $cssBtnClasses, $pctGtaFBShareLink, $pctGtaTwitterShareLink, $pctGtaGoogleShareLink);	

}
// END ENQUEUE PARENT ACTION
