<?php
/**
 * Template part for displaying single posts.
 *
 * @package musik
 */

?>
<section class="w-f-md">
    <section class="vbox">
    	<section class="scrollable wrapper-lg">
		  <div class="row">
		    <!--<div class="col-sm-9">-->
			<div class="col-sm-12"> <!-- Added by Pravin Joshi -->
				<div class="panel wrapper-md">
					<div itemscope="" itemtype="http://schema.org/Product">
					    <div class="row">
							<div class="col-sm-3">
								<?php 
									$list = function_exists('edd_get_bundled_products') ? edd_get_bundled_products( $post->ID ) : array();
									if ( has_post_thumbnail() ): ?>
							    <?php the_post_thumbnail( 'medium', array( 'class' => 'm-b img-full' ) ); ?>
								<?php else: ?>
								    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/default_300_300.jpg" alt="<?php the_title_attribute(); ?>" class="img-full m-b"/>
								<?php endif ?>
							</div>
							<div class="col-sm-9">
								<?php the_title( '<h1 class="m-t-xs m-b-sm entry-title text-black"><span itemprop="name">', '</span></h1>' ); ?>
								<div class="entry-meta clearfix m-b-lg">
								  <?php
								        echo get_the_term_list( $post->ID, 'download_artist', '<span class="m-r">'.esc_html__( 'Artist', 'music' ).': ', ', ' , '</span>'); 
								        $year = get_post_meta( get_the_ID(), 'year', true );
								        if ( $year ) {
								            echo '<span class="m-r">'.esc_html__( 'Publish', 'music' ). ': '.esc_html( $year ).'</span>';
								        }
								        echo get_the_term_list( $post->ID, 'download_category', '<span class="m-r">'.__( 'in', 'music' ).': ', ', ' , '</span>'); 
								    ?>
								</div>
								<div class="m-b-lg">
								  <a href="javascript:;" data-id="<?php echo $post->ID; ?>" class="pctGtaAlbum-play-button play-me btn btn-default btn-icon">
								    <i class="fa fa-play text"></i>
								    <i class="fa fa-pause text-active"></i>
								  </a>
								  
						
								  <span>
									<?php

									if(empty($list)){
										require_once "wp-admin/includes/media.php"; 
										$pctGtaDownloadFile = edd_get_download_files( $post->ID, $variable_price_id = null );
										$pctGtaPathStartIndex = strpos($pctGtaDownloadFile[1]["file"], "wp-content/uploads");
										$pctGtaMetadata = wp_read_audio_metadata(substr($pctGtaDownloadFile[1]["file"], $pctGtaPathStartIndex));
							  			
									  	//var_dump($pctGtaDownloadFile);
										$pctGtaAudioControls = '<span class="pctGtaAudioOptions pctGta-md-m-l pctGta-font-xlarge">%s</span>
								
										<a title="Download MP3" class="pctGtaAudioOptions" href="%s" download><span class="icon-cloud-download pctGta-download-mp3 pctGta-font-xlarge"></span><a>
								
										<a></a> <!-- bootstrap dropdown below doesnt work without this a tag..Strange.! -->';
							  	
							  			echo sprintf($pctGtaAudioControls, $pctGtaMetadata["length_formatted"], 
													 $pctGtaDownloadFile[1]["file"]);
									}
									//var_dump($pctGtaMetadata);
									?>	
									
								</span> <!--Added by Pravin Joshi-->
								  
								  <?php 
								  	$itunes = get_post_meta( get_the_ID(), 'itunes', true );
								  	$googleplay = get_post_meta( get_the_ID(), 'googleplay', true );
								  	if ( $itunes ) {
								  	?>
							        	<a href="<?php echo esc_url( $itunes ); ?>" class="btn btn-default"><?php esc_html_e('iTunes', 'Musik'); ?></a>
							        <?php }
							        if ( $googleplay ) {
								  	?>
							        	<a href="<?php echo esc_url( $googleplay ); ?>" class="btn btn-default"><?php esc_html_e('Google Play', 'Musik'); ?></a>
							        <?php }

							        //echo musik_share(get_the_title( $post->ID ), get_permalink( $post->ID ));
								pctGtaAddShareWidget(get_permalink( $post->ID ), 'pctGtaShareAlbumBtn');
								  ?>
								</div>
								<?php $hide_btn = get_post_meta( get_the_ID(), '_edd_hide_purchase_link', true ); if($hide_btn !== 'on'){ ?>
									<div class="m-b-lg">
										<?php  echo do_shortcode('[purchase_link id="'.$post->ID.'" text="Add to Cart" style="btn btn-info"]') ?>
									</div>
								<?php } ?>
							</div>
					    </div>
					</div>
					<div class="m-t">
						<?php the_content(); ?>
						<?php echo get_the_term_list( $post->ID, 'download_tag', '<div><span class="badge bg-info text-u-c">'.esc_html__( 'Tag', 'music' ).'</span> ', ', ' , '</div>'); ?>
					</div>
				</div>
		        <?php
			
		        if ( ! empty( $list ) ){
		        	?>
		        	<h3 class="m-b"><?php esc_html_e('Music', 'musik'); ?></h3>
		        	<div class="list-group list-group-lg">
		        		<?php
		        			$args = array(
		        				'posts_per_page'   => -1,
                                'orderby'          => 'date',
                                'order'            => 'DESC',
                                'post_type'        => 'download',
							    'post__in' 		   => $list
                            );
							$posts = get_posts($args);

		        			foreach ( $posts as $post ) : setup_postdata( $post );
								?>
								<div class="list-group-item">
                    	<?php get_template_part( 'template-parts/content', 'download-list' ); ?>
		
		                    	</div>
		                    <?php endforeach;
	                        wp_reset_postdata();
		        		?>
		        	</div>
			    <?php } ?>

			    <div>
			    	<?php
                        the_widget( 
                        	'music_post_widget',
                        	array(
                        		'count'   => 6,
                        		'orderby' => 'date',
                        		'exclude' => true,
                        		'type' 	  => empty( $list ) ? 'single' : 'bundle',
                        		'title'   => esc_html__('Related music', 'musik')
                        	),
                        	array(
                        		'before_title'=>'<h3 class="m-b">', 
                        		'after_title'=>'</h3>'
                        	)
                        );
                    ?>
			    </div>

		        <?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

		    </div>
		    
		  </div>
	  </section>
  	</section>
</section>
<?php get_template_part( 'template-parts/player' ); ?>