<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once dirname(__FILE__) . '/framework/WpMvc.php';
WpMvc::init();
WpMvc::app()->theme = 'child';

 


if (function_exists('add_theme_support')) {
    add_theme_support('menus');
    add_theme_support('post-thumbnails');

}
register_sidebar(array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'name' => 'ContentRight',
    'description' => 'Sidebar on content right',
    'before_title' => '<h3>',
    'after_title' => '</h3>'));
register_sidebar(array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'name' => 'FooterLeft',
    'description' => 'Sidebar on content right',
    'before_title' => '<h3>',
    'after_title' => '</h3>'));
register_sidebar(array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'name' => 'FooterCenter',
    'description' => 'Sidebar on content right',
    'before_title' => '<h3>',
    'after_title' => '</h3>'));
register_sidebar(array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'name' => 'FooterRight',
    'description' => 'Sidebar on content right',
    'before_title' => '<h3>',
    'after_title' => '</h3>'));


function viewcomment($comment, $args, $depth) {
    WpMvc::app()->view->render('comment', compact('comment', 'args', 'depth'));
}

function my_new_contactmethods($contactmethods) {
    // Add Twitter
    $contactmethods['twitter'] = 'Twitter';
    //add Facebook
    $contactmethods['facebook'] = 'Facebook';

    return $contactmethods;
}

add_filter('user_contactmethods', 'my_new_contactmethods', 10, 1);

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/wp-content/themes/dragonfood/images/default.jpg";
  }
  return $first_img;
}

function get_featured_image() {
	if (has_post_thumbnail( $post->ID ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		return $image[0];
	} else {
		return "/wp-content/themes/dragonfood/images/default.png";
	}
}

function my_search_form( $form ) {

    $form = '<form class="df-searchform" role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
    <input class="searchform-input search-field text_search" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="image" src="/wp-content/themes/dragonfood/images/blog/btn_search.png" style="position: absolute; padding-left: 6px;" value="Submit" alt="Submit" onclick="form.submit();">
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );


?>
