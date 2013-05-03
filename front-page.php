<?php get_header(); ?>
		
	<section id="primary" class="large-8 columns" role="main">		
		
		<?php if( have_posts() ) : ?>
            <?php while( have_posts() ) : the_post(); ?> 
        
                <?php get_template_part('content', 'page'); ?>
            
            <?php endwhile; ?>
		
            <?php smart_pagination(); ?>
        <?php else : ?>
        
            <?php get_template_part('content', 'notfound'); ?>
        
        <?php endif; ?>
        
	</section><!-- end #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>