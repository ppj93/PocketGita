<?php
/**
 * Template Name: Home
*/

get_header(); ?>


<section class="w-f-md">
    <section class="hbox stretch">
        <section>
            <section class="vbox">
                <section class="scrollable wrapper-lg">
	                <?php dynamic_sidebar( 'home-header' ); ?>
				  	
				  <?php putRevSlider("slider1") ?>


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
                    <?php dynamic_sidebar( 'home-body' ); ?>
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

