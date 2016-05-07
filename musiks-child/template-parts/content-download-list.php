<?php
/**
 * Partial: Content Download
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('item m-b-none clearfix'); ?>>
	<div class="pos-rlt pull-left m-r">
	    <div class="item-overlay opacity r bg-black">
	        <div class="center text-center m-t-n-sm">
	          <a href="javascript:;" data-id="<?php echo esc_attr( $post->ID ); ?>" class="play-me i-lg">
	             
	            <i class="icon-control-play text"></i>
	            <i class="icon-control-pause text-active"></i>
	          </a>
	        </div>
	    </div>
	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="thumb">
	        <?php if ( has_post_thumbnail() ): ?>
	            <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'r img-full' ) ); ?>
	        <?php else: ?>
	            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/default_300_300.jpg" alt="<?php the_title_attribute(); ?>" class="r img-full"/>
	        <?php endif ?>
	    </a>
	</div>

	<div class="clear pctGta-audio-title">
	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="font-bold m-b-xs"><?php the_title(); ?></a>
	    <?php
	        $artist = get_the_term_list( $post->ID, 'download_artist', '', ', ', '' );
	        if (!is_wp_error( $artist ) && '' != $artist ) {
	            echo '<div class="text-muted text-sm text-ellipsis">'. esc_html__('by ', 'musik') . $artist .'</div>';
	        }
	    ?>
	</div>

	
	<div>
		<?php
		  
		 
			require_once "wp-admin/includes/media.php"; 
			$pctGtaDownloadFile = edd_get_download_files( $post->ID, $variable_price_id = null );
			//var_dump($pctGtaDownloadFile);
			//var_dump($post);
			//echo file_exists($pctGtaDownloadFile[1]["file"]) ? "true" : "false";
			
			
			//echo function_exists("wp_read_audio_metadata");
			$pctGtaPathStartIndex = strpos($pctGtaDownloadFile[1]["file"], "wp-content/uploads");
			//echo $pctGtaPathStartIndex;
			//echo substr($pctGtaDownloadFile[1]["file"], $pctGtaPathStartIndex);
			$pctGtaMetadata = wp_read_audio_metadata(substr($pctGtaDownloadFile[1]["file"], $pctGtaPathStartIndex));
			//var_dump($pctGtaMetadata);
		?>	

		<span class="pctGtaAudioOptions"> <?php echo $pctGtaMetadata["length_formatted"]?></span>

		<a title="Download MP3" class="pctGtaAudioOptions" href="<?php echo $pctGtaDownloadFile[1]["file"]?>" download><span class="icon-cloud-download pctGta-download-mp3"></span><a>

		<a></a> <!-- bootstrap dropdown below doesnt work without this a tag..Strange.! -->

	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<span class="pctGtaAudioOptions" style="vertical-align: middle !important"><span class="icon-docs">				</span></span> </a>
		<span class="pctGtaAudioOptions pctGta-sm-line2"><?php pctGtaAddShareWidget($post->ID, "pctGtaShareTrackBtn"); ?></span>

		 
		
	</div> <!--Added by Pravin Joshi-->
</article>