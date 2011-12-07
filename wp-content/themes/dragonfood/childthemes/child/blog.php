<?php WpMvc::app()->view->render('header');?>
<div class="blogcontainer">
    <?php WpMvc::app()->view->render('loop',array('thePosts'=>$thePosts));?>
</div>
<div id="widgetwrapper">
    <?php dynamic_sidebar('ContentRight');?>
</div>
<?php WpMvc::app()->view->render('footer');?>