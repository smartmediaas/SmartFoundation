<?php get_header(); ?>

	<section id="primary" <?php primary_class(); ?> role="main">
		<header>
		    <h2 id="archive-title"><?php post_type_archive_title(); ?></h2>
		</header>
		<?php while( have_posts() ) : the_post(); ?> 
	
			<?php get_template_part('list', 'post'); ?>
		
		<?php endwhile; ?>
		
		<?php smart_pagination(); ?>
	</section><!-- end #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>