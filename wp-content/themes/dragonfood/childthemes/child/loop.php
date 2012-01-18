<?php foreach ($thePosts as $thePost):?>
	<div class="blogwrapper  blog-post-1">
		<div class="blogimage" style="overflow:hidden;">
			<img src="<?= get_featured_image(); ?>" alt="<?php the_title(); ?>" />
		</div>
		<div class="blogheader">
			<div class="blogtitle"><?php the_title(); ?></div>
			<div class="blogdate"><?php the_date();?></span> | <a class="author">by <?php the_author();?></div>
		</div>
		<div class="blogbody">
			<?php global $more; $more = 0; ?>
			<?=	 get_the_content();?>
			<img src="/wp-content/themes/dragonfood/images/divider.png" class="divider" height="1" width="550"/>
			<div class="seemore">
				<a href="<?php the_permalink();?>">To see more, click here.</a>
			</div>
		</div>
	</div>
<?php endforeach;?>
<?php
	global $wp_query; 
	if ( $wp_query->max_num_pages > 1 ) : 
?>
	<div class="navigation">
		<?php next_posts_link( "<img src='".get_template_directory_uri()."/images/next.png' class='right button-prev'/>" ); ?>
		<?php previous_posts_link(  "<img src='".get_template_directory_uri()."/images/prev.png' class='left button-next'/>" ); ?>
	</div><!-- #nav-above -->
<?php endif; ?>
