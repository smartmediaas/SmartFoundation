<article id="<?php the_ID(); ?>" <?php post_class(list_class()); ?>>
    <?php if(has_post_thumbnail()){ ?>
        <div <?php list_class('image'); ?>>
            <?php the_post_thumbnail('thumbnail'); ?>
        </div>
    <?php } ?>
    <div <?php list_class('content'); ?>>
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