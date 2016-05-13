<?php
/**
 * Template Name: Home
*/

get_header(); ?>


<section class="w-f-md">
    <section class="hbox stretch">
        <section>
            <section class="vbox">
                <section class="scrollable wrapper-lg pctGta-0-pad">
	                <!--<?php dynamic_sidebar( 'home-header' ); ?>-->
				 
				  
				  <div style="margin-top: 0px">
				  <?php putRevSlider("slider1") ?>
				  </div>
				
                    <div class="row">
                    	<div class="col-md-4">
                            <?php dynamic_sidebar( 'home-col-1' ); ?>
                    	</div>
                    	<div class="col-md-4">
                    		<?php dynamic_sidebar( 'home-col-2' ); ?>
                    	</div>
                        <div class="col-md-4">
                            <?php dynamic_sidebar( 'home-col-3' ); ?>
                        </div>
                    </div>
				  <div class="pctGta-home-section2"><?php dynamic_sidebar( 'home-body'); ?></div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php dynamic_sidebar( 'home-col-4' ); ?>
                        </div>
                        <div class="col-md-6">
                            <?php dynamic_sidebar( 'home-col-5' ); ?>
                        </div>
                    </div>
                    <?php dynamic_sidebar( 'home-footer' ); ?>
                </section>
            </section>
        </section>
    </section>
</section>


<?php get_template_part( 'template-parts/player' ); ?>
<?php get_footer( );  ?>

