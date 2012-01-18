<?php WpMvc::app()->view->render('header');?>
<? /*
<div class="main-col span-15">
    <h1><?php echo $thePost->title;?></h1>
    <div><?= the_content(); ?></div>

    <?php if($thePost->type==='post'):?>
    <div class="post-meta align-right">
        <?php if(count($thePost->tags) > 0): ?>
            <p>Tag: </p>
        <?php endif; ?>
        <p>Posted in : <?php print_r($thePost->categories);?></p>
    </div>
    <?php endif;?>
    <?php WpMvc::app()->view->render('widgets/widgetShare')?>
   
    <?php WpMvc::app()->view->render('comments',array('thePost'=>$thePost));?>
</div>
 */ ?>
<div class="blogcontainer">
<div class="blogwrapper  blog-post-1">
		<div class="blogimage" style="overflow:hidden;">
			<img src="<?= get_featured_image(); ?>" alt="<?php the_title(); ?>" />
		</div>
		<div class="blogheader">
			<div class="blogtitle">Title goes here plz<?php the_title(); ?></div>
			<div class="blogdate">Date goes here plz<?php the_date();?></span> | <a class="author">by <?php the_author();?></div>
		</div>
		<div class="blogbody">
			<?php global $more; $more = 1; ?>
			<?=	 the_content();?>
			<img src="/wp-content/themes/dragonfood/images/divider.png" class="divider" height="1" width="550"/>
			<?php if($thePost->type==='post'):?>
			<div class="post-meta post-tags">
			</div>
			<?php endif; ?>
			<div class="comments">
				<?php WpMvc::app()->view->render('comments',array('thePost'=>$thePost));?>
			</div>
		</div>
	</div>
</div>
<div id="widgetwrapper">
    <div class="widget share">
        <h3>Do you like this?</h3>
        <span class="twitter-share">
            <a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="thinkrooms">Tweet</a>
            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        </span>
        &nbsp;&nbsp;
        <span class="fb-share">
            <iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink();?>&amp;layout=button_count&amp;show_faces=false&amp;width=150&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:21px; color:#FFF;" allowTransparency="true"></iframe>
        </span>
    </div>
    <?php dynamic_sidebar('ContentRight');?>
</div>
<?php WpMvc::app()->view->render('footer');?>
