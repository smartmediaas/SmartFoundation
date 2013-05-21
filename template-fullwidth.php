<?php 
/*
Template Name: Fullbredde
*/
get_header(); ?>

	<div id="primary" class="large-12 columns" role="main">
		
		<?php if( have_posts() ) : ?>
            <?php while( have_posts() ) : the_post(); ?> 
        
                <?php get_template_part('content', 'page'); ?>
            
            <?php endwhile; ?>
		
            <?php smart_pagination(); ?>
        <?php else : ?>
        
            <?php get_template_part('content', 'notfound'); ?>
        
        <?php endif; ?>
		
	</div><!-- end #primary -->

<?php get_footer(); ?>