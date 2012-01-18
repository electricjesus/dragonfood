<?php
   /*
   Plugin Name: Cardoza Facebook Like Box
   Plugin URI: http://fingerfish.com/cardoza-facebook-like-box/
   Description: Cardoza Facebook Like Box enables you to display the facebook page likes in your website.
   Version: 1.1
   Author: Vinoj Cardoza
   Author URI: http://fingerfish.com/about-me/
   License: GPL2
   */

add_action("plugins_loaded", "cardoza_fb_like_init");
add_action("admin_menu", "cardoza_fb_like_options");
add_shortcode("cardoza_facebook_like_box", "cardoza_facebook_like_box_sc");

//The following function will retrieve all the avaialable 
//options from the wordpress database

function cfblb_retrieve_options($opt_val){
	$opt_val = array(
			'title' => stripslashes(get_option('cfblb_title')),
			'fb_url' => stripslashes(get_option('cfblb_fb_url')),
			'width' => stripslashes(get_option('cfblb_width')),
			'height' => stripslashes(get_option('cfblb_height')),
			'color_scheme' => stripslashes(get_option('cfblb_color_scheme')),
			'show_faces' => stripslashes(get_option('cfblb_show_faces')),
			'stream' => stripslashes(get_option('cfblb_stream')),
			'header' => stripslashes(get_option('cfblb_header')),
	); 
	return $opt_val;
}

function cardoza_fb_like_options(){
	add_menu_page(
		__('FB Like Box'), 
		'FB Like Box', 
		'manage_options', 
		'slug_for_fb_like_box', 
		'cardoza_fb_like_options_page',
		plugin_dir_url(__FILE__).'images/Vinoj.jpg');
}

function cardoza_fb_like_options_page(){
	$cfblb_options = array(
			'cfb_title' => 'cfblb_title',
			'cfb_fb_url' => 'cfblb_fb_url',
			'cfb_width' => 'cfblb_width',
			'cfb_height' => 'cfblb_height',
			'cfb_color_scheme' => 'cfblb_color_scheme',
			'cfb_show_faces' => 'cfblb_show_faces',
			'cfb_stream' => 'cfblb_stream',
			'cfb_header' => 'cfblb_header',
	);
	
	if(isset($_POST['frm_submit'])){
		if(!empty($_POST['frm_title'])) update_option($cfblb_options['cfb_title'], $_POST['frm_title']);
		if(!empty($_POST['frm_url'])) update_option($cfblb_options['cfb_fb_url'], $_POST['frm_url']);
		if(!empty($_POST['frm_width'])) update_option($cfblb_options['cfb_width'], $_POST['frm_width']);
		if(!empty($_POST['frm_height'])) update_option($cfblb_options['cfb_height'], $_POST['frm_height']);
		if(!empty($_POST['frm_color_scheme'])) update_option($cfblb_options['cfb_color_scheme'], $_POST['frm_color_scheme']);
		if(!empty($_POST['frm_show_faces'])) update_option($cfblb_options['cfb_show_faces'], $_POST['frm_show_faces']);
		if(!empty($_POST['frm_stream'])) update_option($cfblb_options['cfb_stream'], $_POST['frm_stream']);
		if(!empty($_POST['frm_header'])) update_option($cfblb_options['cfb_header'], $_POST['frm_header']);
?>
		<div id="message" class="updated fade"><p><strong><?php _e('Options saved.', 'c3dtc_tans_domain' ); ?></strong></p></div>
<?php	
	}
	$option_value = cfblb_retrieve_options($opt_val);
?>
	<div class="wrap">
		<h2><?php _e("Cardoza FB Like Box Options", "cfblb_tans_domain");?></h2><br />
		<!-- Administration panel form -->
		<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<h3>General Settings</h3>
		<table>
		<tr><td width="150"><b>Title:</b></td><td><input type="text" name="frm_title" size="50" value="<?php echo $option_value['title'];?>"/></td></tr>
        <tr><td width="150"></td><td>(Title of the facebook like box)</td></tr>
        <tr><td width="150"><b>Facebook Page URL:</b></td><td><input type="text" name="frm_url" size="50" value="<?php echo $option_value['fb_url'];?>"/></td></tr>
        <tr><td width="150"></td><td>(Copy and paste your facebook page url here)</td></tr>
		<tr><td width="150"><b>Width:</b></td><td><input type="text" name="frm_width" value="<?php echo $option_value['width'];?>"/>px</td></tr>
		<tr><td width="150"></td><td>(Width of the facebook like box)</td></tr>
		<tr><td width="150"><b>Height:</b></td>
        <td><input type="text" name="frm_height" value="<?php echo $option_value['height'];?>"/>px</td></tr>
		<tr><td width="150"></td><td>(Height of the facebook like box)</td></tr>
        <tr><td width="150"><b>Color Scheme:</b></td>
		<td><select name="frm_color_scheme">
		<option value="light" <?php if($option_value['color_scheme']=="light") echo "selected='selected'";?>>light</option>
		<option value="dark" <?php if($option_value['color_scheme']=="dark") echo "selected='selected'";?>>dark</option></select></td></tr>
		<tr><td width="150"></td><td>(Select the color scheme you want to display)</td></tr>
		<tr><td width="150"><b>Show Faces:</b></td>
		<td><select name="frm_show_faces">
		<option value="true" <?php if($option_value['show_faces']=="true") echo "selected='selected'";?>>Yes</option>
		<option value="false" <?php if($option_value['show_faces']=="false") echo "selected='selected'";?>>No</option></select></td></tr>
		<tr><td width="150"></td><td>(Select the option to show the faces)</td></tr>
		<tr><td width="150"><b>Stream:</b></td>
		<td><select name="frm_stream">
		<option value="true" <?php if($option_value['stream']=="true") echo "selected='selected'";?>>Yes</option>
		<option value="false" <?php if($option_value['stream']=="false") echo "selected='selected'";?>>No</option></select></td></tr>
		<tr><td width="150"></td><td>(Select the option to display the stream)</td></tr>
		<tr><td width="150"><b>Header</b></td>
		<td><select name="frm_header">
		<option value="true" <?php if($option_value['header']=="true") echo "selected='selected'";?>>Yes</option>
		<option value="false" <?php if($option_value['header']=="false") echo "selected='selected'";?>>No</option></select></td></tr>
		<tr><td width="150"></td><td>(Select the option to display the title)</td></tr>
		<tr height="60"><td></td><td><input type="submit" name="frm_submit" value="Update Options" style="background-color:#CCCCCC;font-weight:bold;"/></td>
		</table>
		</form>
	</div>
<?php
}

function widget_cardoza_fb_like($args){
	$option_value = cfblb_retrieve_options($opt_val);
	$option_value['fb_url'] = str_replace(":", "%3A", $option_value['fb_url']);
	$option_value['fb_url'] = str_replace("/", "%2F", $option_value['fb_url']);
	extract($args);
	echo $before_widget;
	echo $before_title;
	if(empty($option_value['title'])) $option_value['title'] = "Facebook Likes";
	echo $option_value['title'];
	echo $after_title;
	?>
	<iframe 
	src="//www.facebook.com/plugins/likebox.php?href=<?php echo $option_value['fb_url'];?>&amp;
	width=<?php echo $option_value['width'];?> &amp;
	height=<?php echo $option_value['height'];?>&amp;
	colorscheme=<?php echo $option_value['color_scheme'];?>&amp;
	show_faces=<?php echo $option_value['show_faces'];?>&amp;
	stream=<?php echo $option_value['stream'];?>&amp;
	header=<?php echo $option_value['header'];?>"&amp;
	border_color=%23FFF&amp;
	scrolling="no" 
	frameborder="0" 
	style="border:none; overflow:hidden; width:<?php echo $option_value['width'];?>px; height:<?php echo $option_value['height'];?>px;" allowTransparency="true">
	</iframe>
<?php
	global $wpdb;
	echo $after_widget;
}
function cardoza_facebook_like_box_sc($atts){
    $option_value = cfblb_retrieve_options($opt_val);
    $option_value['fb_url'] = str_replace(":", "%3A", $option_value['fb_url']);
    $option_value['fb_url'] = str_replace("/", "%2F", $option_value['fb_url']);
    ?>
    <iframe 
    src="//www.facebook.com/plugins/likebox.php?href=<?php echo $option_value['fb_url'];?>&amp;
    width=<?php echo $option_value['width'];?> &amp;
    height=<?php echo $option_value['height'];?>&amp;
    colorscheme=<?php echo $option_value['color_scheme'];?>&amp;
    show_faces=<?php echo $option_value['show_faces'];?>&amp;
    stream=<?php echo $option_value['stream'];?>&amp;
    header=<?php echo $option_value['header'];?>"&amp;
    border_color=%23FFF&amp;
    scrolling="no" 
    frameborder="0" 
    style="border:none; overflow:hidden; width:<?php echo $option_value['width'];?>px; height:<?php echo $option_value['height'];?>px;" allowTransparency="true">
    </iframe>
<?php
}

function cardoza_fb_like_init(){
	register_sidebar_widget(__('Cardoza\'s Facebook Like Box'), 'widget_cardoza_fb_like');
}


?>