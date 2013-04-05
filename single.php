<?php get_header(); ?>

	<section id="primary" <?php primary_class(); ?> role="main">
		
		<?php while( have_posts() ) : the_post(); ?> 
	
			<?php get_template_part('content', 'single'); ?>
			
			<?php if( comments_open() || '0' != get_comments_number() ) comments_template( '', true ); ?>
		
		<?php endwhile; ?>

	</section><!-- end #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>