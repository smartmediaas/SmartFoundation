<?php get_header(); ?>

	<div id="primary" class="large-8 columns">
	
		<?php while( have_posts() ) : the_post(); ?> 
	
			<?php get_template_part('list', 'post'); ?>
		
		<?php endwhile; ?>
		
	</div><!-- end #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>