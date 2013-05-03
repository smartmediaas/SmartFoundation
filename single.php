<?php get_header(); ?>

	<section id="primary" class="large-8 columns" role="main">
		<?php if( have_posts() ) : ?>
            <?php while( have_posts() ) : the_post(); ?> 
        
                <?php get_template_part('content', 'single'); ?>
                
                <?php if( comments_open() || '0' != get_comments_number() ) comments_template( '', true ); ?>
            
            <?php endwhile; ?>
		
            <?php smart_pagination(); ?>
        <?php else : ?>
        
            <?php get_template_part('content', 'notfound'); ?>
        
        <?php endif; ?>
	</section><!-- end #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>