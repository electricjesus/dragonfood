<?php
/*
Plugin Name: Stop SOPA
Description: We are against of SOPA!
Plugin URI: http://www.icprojects.net/stop-sopa.html
Version: 1.00
Author: Ivan Churakov
Author URI: http://www.freelancer.com/affiliates/ichurakov/
*/
wp_enqueue_script("jquery");

class stopsopa_class
{
	function __construct() {
		if (is_admin())
		{
		}
		else
		{
			$browser = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
			if (strpos($browser, 'Mobile') === false && strpos($browser, 'Symbian') === false && strpos($browser, 'Opera M') === false && strpos($browser, 'Android') === false && stripos($browser, 'HTC_') === false && strpos($browser, 'Fennec/') === false && stripos($browser, 'Blackberry') === false) {
				add_action("wp_footer", array(&$this, "front_header_desktop"));
				add_action("wp_footer", array(&$this, "front_footer_desktop"));
			}
		}
	}

	function front_header_desktop()
	{
		echo '
<style type="text/css">
.stop-sopa-box {
	width: 345px;
	height: 27px;
	position: fixed;
	bottom: 0px;
	right: 20px;
	overflow: hidden;
	z-index: 9999;
}
.stop-sopa-content {
	width: 335px;
	height: 115px;
	background-color: #000;
	-moz-box-shadow: 0 0 5px #000;
	-webkit-box-shadow: 0 0 5px #000;
	box-shadow: 0 0 5px #000;
	-moz-border-radius: 5px 0px 0px 0px;
	border-radius: 5px 0px 0px 0px;
	margin-top: 32px;
	margin-left: 5px;
	position: relative;
}
.stop-sopa-tab {
	height: 27px;
	background: #000 url('.get_bloginfo("wpurl").'/wp-content/plugins/stop-sopa/arrow_up.png) 10px 4px no-repeat;
	-moz-box-shadow: 0 0 5px #000;
	-webkit-box-shadow: 0 0 5px #000;
	box-shadow: 0 0 5px #000;
	-moz-border-radius: 5px 5px 0px 0px;
	border-radius: 5px 5px 0px 0px;
	cursor: pointer;
	float: right;
	margin-top: 5px;
	margin-right: 5px;
	color: #CCC;
	font-family: verdana;
	font-weight: normal;
	font-size: 12px;
	padding-left: 30px;
	padding-right: 10px;
	padding-top: 3px;
}
img.stop-sopa-foto {
	margin: 10px 13px 10px 10px;
	float: left;
}
p.stop-sopa-quote {
	color: white;
	font-family: arial;
	font-size: 13px;
	text-align: left;
	padding: 10px 15px 4px 10px;
	margin: 0px;
	line-height: 20px;
}
p.stop-sopa-quote em {font-size: 13px;}
p.stop-sopa-text {
	color: #CCC;
	font-family: arial;
	font-size: 13px;
	text-align: left;
	padding: 10px;
	margin: 0px 3px 0px 0px;
	text-align: right;
	line-height: 20px;
}
</style>
<!--[if lt IE 7]>
<style type="text/css">
.stop-sopa-box {
	display: none;
}
</style>
<![endif]-->
<script type="text/javascript">
	jQuery(document).ready(function() {
		var stop_sopa_box_height_min = jQuery(".stop-sopa-tab").height();
		var stop_sopa_box_height_max = jQuery(".stop-sopa-tab").height() + jQuery(".stop-sopa-content").height();
		var stop_sopa_box_height_next = stop_sopa_box_height_max;
		jQuery(".stop-sopa-tab").click(function() {
			jQuery(".stop-sopa-box").animate({
				height: stop_sopa_box_height_next
			}, 300, function() {
				if (stop_sopa_box_height_next <= stop_sopa_box_height_min) {
					stop_sopa_box_height_next = stop_sopa_box_height_max;
					jQuery(".stop-sopa-tab").css("backgroundImage", "url('.get_bloginfo("wpurl").'/wp-content/plugins/stop-sopa/arrow_up.png)");
				}
				else {
					jQuery(".stop-sopa-tab").css("backgroundImage", "url('.get_bloginfo("wpurl").'/wp-content/plugins/stop-sopa/arrow_down.png)");
					stop_sopa_box_height_next = stop_sopa_box_height_min;
				}
			});
		});
	});
</script>
';
	}

	function front_footer_desktop()
	{
		echo '
<div class="stop-sopa-box">
	<div class="stop-sopa-tab">STOP SOPA!</div>
	<div class="stop-sopa-content">
	<img class="stop-sopa-foto" src="'.get_bloginfo("wpurl").'/wp-content/plugins/stop-sopa/stopsopa.png" height="90" alt="We are against of SOPA!">
	<p class="stop-sopa-quote">
		SOPA breaks our internet freedom!<br />
		Any site can be shut down whether or not we\'e done anything wrong.
	</p>
	<p class="stop-sopa-text">We are against of SOPA!</p>
	</div>
</div>
';
	}

}
$stopsopa = new stopsopa_class();
?>