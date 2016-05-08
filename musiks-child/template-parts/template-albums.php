<?php
/**
 * Template Name: Albums
*/

get_header(); ?>


<section class="w-f-md">
    <section class="hbox stretch">
        <section>
            <section class="vbox">
                <section class="scrollable wrapper-lg">
                    <div class="row">
					  <div class="col-sm-12 pctGtaAlbumThumbnail">
                            <?php the_title( '<h1 class="h2 m-b-md m-t-none font-thin">', '</h1>' ); ?>
                            <?php 
                                $count = get_option( 'posts_per_page' );
                                the_widget( 'music_post_widget', 'count='.$count.'&orderby=date&type=bundle&pagination=on' );
                            ?>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </section>
</section>


<?php get_template_part( 'template-parts/player' ); ?>
<?php get_footer( );  ?>

