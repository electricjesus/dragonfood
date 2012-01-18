<?php WpMvc::app()->view->render('header');?>
			<div class="homegroup group0 slideshowgrp">
			    <!-- start slideshow plugin -->
			    <?php WpMvc::app()->view->render('widgets/widgetSlideshow')?>
				<!-- end slideshow plugin -->
				<script type="text/javascript">			
					jQuery(document).ready(function($){
						$('#slider').tinycarousel({ pager: true, interval:true });		
					});
				</script>				
			</div>
			<div class="homegroup group1">
				<div class="homeicon01">
					<a href="shop.html">
						<img src="<?php bloginfo('template_directory'); ?>/images/home/home_icon01.png" alt="" class="a" />
						<img src="<?php bloginfo('template_directory'); ?>/images/home/home_icon01_over.png" alt="" class="b" />
					</a>
				</div>
				<div class="homeicon02">
					<a href="series01.html">
						<img src="<?php bloginfo('template_directory'); ?>/images/home/home_icon02.png" alt="" class="a" />
						<img src="<?php bloginfo('template_directory'); ?>/images/home/home_icon02_over.png" alt="" class="b" />
					</a>
				</div>						
				<div class="homeicon04-container">
					<div class="homeicon04">
						<img src="<?php bloginfo('template_directory'); ?>/images/home/twitter_noborder.png" alt=""/ class="box">
					</div>							
					<div id="twitter_t"><a href="http://www.twitter.com/dragonfood/">@DragonFood</a></div>							
					<div id="twitter_m">
						<div id="twitter_container">
						<ul id="twitter_update_list"></ul>
						</div>
					</div>	
				</div>						
			</div>
			<div class="homegroup group2">
				<div class="homeicon03">
					<a href="/blog"><img src="<?php bloginfo('template_directory'); ?>/images/home/dfn.gif" alt=""/ class="box"></a>
				</div>
			</div>
			<script src="http://twitter.com/javascripts/blogger.js" type="text/javascript"></script><script src="http://twitter.com/statuses/user_timeline/eatthebirdie.json?callback=twitterCallback2&count=1" type="text/javascript"></script></span>
<?php WpMvc::app()->view->render('footer');?>
