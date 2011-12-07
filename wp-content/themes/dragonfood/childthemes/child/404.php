<?php WpMvc::app()->view->render('header');?>
<div id="wrapper">
	<div id="errorcontainer">
		<img src="/wp-content/themes/dragonfood/images/404-notfound.png" alt="OHNOES" /><p />
		Sorry, it appears the page you're looking for may have once been...<br />
		But is no more.<p />
		<a href="/">
		Return to the home page.
		</a>
	</div>
</div>
<?php WpMvc::app()->view->render('footer');?>