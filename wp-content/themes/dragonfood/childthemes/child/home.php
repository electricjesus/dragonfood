<?php WpMvc::app()->view->render('header');?>
			<div class="homegroup group0 slideshowgrp">
				<div id="slider" class="bordered-container">
					<div class="controls">
						<ul class="pager">
							<li><a rel="0" id="slide-link-1" class="pagenum" href="#">1</a></li>
							<li><a rel="1" class="pagenum" href="#">2</a></li>
							<li><a rel="2" class="pagenum" href="#">3</a></li>
							<li><a rel="3" class="pagenum" href="#">4</a></li>
							<li><a rel="4" class="pagenum" href="#">5</a></li>
							<li><a rel="5" class="pagenum" href="#">6</a></li>
							<li><a rel="6" class="pagenum" href="#">7</a></li>
							<li><a rel="7" class="pagenum" href="#">8</a></li>
						</ul>
					</div>
					<div class="viewport">
						<ul class="overview">
							<li><a href="shop.html"><img id="slide-img-1" src="<?php bloginfo('template_directory'); ?>/images/home/slider/photo.png" class="slide" alt="" /></a></li>
							<li><a href="shop.html"><img id="slide-img-2" src="<?php bloginfo('template_directory'); ?>/images/home/slider/photo1.png" class="slide" alt="" /></a></li>
							<li><a href="http://emergetradeshow.com/" target="_blank"><img id="slide-img-3" src="<?php bloginfo('template_directory'); ?>/images/home/slider/photo2.png" class="slide" alt="" /></a></li>
							<li><a href="http://www.twitter.com/DragonFood/"><img id="slide-img-4" src="<?php bloginfo('template_directory'); ?>/images/home/slider/photo3.png" class="slide" alt="" /></a></li>
							<li><a href="http://www.facebook.com/DragonFood/"><img id="slide-img-5" src="<?php bloginfo('template_directory'); ?>/images/home/slider/photo4.png" class="slide" alt="" /></a></li>
							<li><a href="#"><img id="slide-img-6" src="<?php bloginfo('template_directory'); ?>/images/home/slider/photo1.png" class="slide" alt="" /></a></li>                            
							<li><a href="#"><img id="slide-img-7" src="<?php bloginfo('template_directory'); ?>/images/home/slider/photo.png" class="slide" alt="" /></a></li>
							<li>
								<div class="htmlslide">
									<div class="htmlslide-content">
									<h1 style="color:#000">Holy shit, dude</h1>
									<h2 style="color:#000">an HTML Slide!</h2>
									<p style="text-align:justify;color:#fff">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed libero ac orci sodales lacinia. Pellentesque sit amet sem sit amet justo convallis sagittis. Phasellus adipiscing ultrices aliquam. Curabitur iaculis luctus lorem, non congue mauris ultricies vitae. Phasellus egestas, augue sit amet interdum consectetur, magna velit luctus nisl, et aliquet magna felis at nibh. Aenean id mi quis sapien mollis dictum. Aliquam euismod lectus venenatis massa congue rhoncus. Aliquam placerat molestie arcu, in egestas purus adipiscing ac. Etiam ut neque magna, at laoreet orci. Nulla leo lacus, pellentesque a volutpat at, viverra vitae felis. Aliquam in metus a turpis varius sagittis nec quis tortor. Sed vitae nibh nibh. Duis sem felis, viverra vel consectetur sit amet, elementum ac tellus. Aenean facilisis condimentum augue. Sed gravida porttitor arcu sit amet condimentum. </p>
									</div>
								</div>
							</li>
						</ul>
					</div> 
				</div>
				<script type="text/javascript">			
					$(document).ready(function(){
						$('#slider').tinycarousel({ pager: true, interval:false });		
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
					<a href="blog.html"><img src="<?php bloginfo('template_directory'); ?>/images/home/dfn.gif" alt=""/ class="box"></a>
				</div>
			</div>
<?php WpMvc::app()->view->render('footer');?>
