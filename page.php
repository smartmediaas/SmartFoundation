<?php get_header(); ?>

	<section id="primary" <?php primary_class(); ?> role="main">
		
		<?php while( have_posts() ) : the_post(); ?> 
	
			<?php get_template_part('content', 'page'); ?>
		
		<?php endwhile; ?>
		
	</section><!-- end #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>