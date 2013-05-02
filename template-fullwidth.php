<?php 
/*
Template Name: Fullbredde
*/
get_header(); ?>

	<section id="primary" class="large-12 columns" role="main">
		
		<?php while( have_posts() ) : the_post(); ?> 
	
			<?php get_template_part('content', 'page'); ?>
		
		<?php endwhile; ?>
		
	</section><!-- end #primary -->

<?php get_footer(); ?>