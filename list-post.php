<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(has_post_thumbnail()){ ?>
            <?php the_post_thumbnail('thumbnail'); ?>
    <?php } ?>
    <div>
        <header>
            <h4 class="subheader">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <div class="entry-meta"><?php the_time('j. F Y'); ?></div>
        </header>
        
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>
    </div>
    <hr />    
</article>