<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
		<?php the_post_thumbnail(); ?>
		
		<h2 id="post-title"><?php the_title(); ?></h2>
		
        <?php if(has_excerpt()): ?>
            <div class="entry-content"><?php the_excerpt(); ?></div>
        <?php endif; ?>
		
		<div class="entry-meta"><?php the_time('j. F Y'); ?></div>
	</header>
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>