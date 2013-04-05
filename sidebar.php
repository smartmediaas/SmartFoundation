<?php if(is_active_sidebar('sidebar-1')): ?>
	<section id="secondary" <?php secondary_class('widget-area'); ?> role="complementary">		
		<?php dynamic_sidebar('sidebar-1'); ?>
	</section>
<?php endif; ?>