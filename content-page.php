<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2 id="page-title"><?php the_title(); ?></h2>
	</header>
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>