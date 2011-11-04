<?php 
/*
Plugin Name: Big Cartel Plugin by Tonka Park
Plugin URI: http://tonkapark.com
Description: Include your Big Cartel product links and images within wordpress posts, pages and widgets.
Author: Matt Anderson
Version: 0.0.5
Author URI: http://tonkapark.com
*/
/*
Copyright (C) 2011 by  Matt Anderson, Tonka Park

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
*/

add_action( 'widgets_init', 'BCi_Init' );
function BCi_Init() {
  register_widget( 'BCi' );
}

class BCi extends WP_Widget{ 
	var $name;
	var $dir;
	var $path;
	var $siteurl;
	var $wpadminurl;
	var $version;
  
  var $apiurl;
  var $productsurl;
  
  var $sizes;
  
  
	function BCi()  
  {
    parent::WP_Widget( false, $name = 'Big Cartel Widget' );
    
		// set class variables
		$this->name = 'Big Cartel Plugin by Tonka Park';
    $this->short_name = 'Big Cartel';
		$this->path = dirname(__FILE__).'/';
		$this->dir = plugins_url('/',__FILE__);
		$this->siteurl = get_bloginfo('url');
		$this->wpadminurl = admin_url();
		$this->version = '0.0.4';
    
    $this->apiurl = 'http://api.bigcartel.com/' . get_option('bc_subdomain') ;
    $this->storeurl = get_option('bc_shop_url') ;
    $this->productsapiurl = $this->apiurl . '/products.xml';
    $this->storeapiurl = $this->apiurl . '/store.xml'; 
    $this->producturl = $this->storeurl . '/product/';
    
    $this->sizes['small'] = 75;
    $this->sizes['thumb'] = 75;
    $this->sizes['thumbnail'] = 75;
    $this->sizes['75'] = 75;
    $this->sizes['175'] = 175;
    $this->sizes['medium'] = 175;
    $this->sizes['300'] = 300;    
    $this->sizes['large'] = 300;    
    
    add_action('admin_menu', array($this,'create_menu')); 
    
    add_shortcode('bc_product', array($this,'bc_product_shortcode'));
    //add_shortcode('bc_products', array($this,'bc_products_shortcode'));
    //add_shortcode('bc_store', array($this,'bc_store_shortcode'));
    
    add_filter('widget_text', 'do_shortcode');
    
    return true;
  }
  
  function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );
    $product_limit = $instance['product_limit'];
    
    echo $before_widget;
   
    if ($title) {
      echo $before_title . $title . $after_title;
    }
    //build list of products
    echo $this->list_products($product_limit);
    
    echo $after_widget;    
  }

  function update( $new_instance, $old_instance ) {
    return $new_instance;
  }

  function form( $instance ) {
    /* Set up some default widget settings. */
		$defaults = array( 'title' => 'Big Cartel Products', 'product_limit' => 10);
		$instance = wp_parse_args( (array) $instance, $defaults );  
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>" />                  
     </p>            
     <p>
     <label for="<?php echo $this->get_field_id( 'product_limit' ); ?>"><?php _e( 'Number of products to list:' ); ?></label>
      <input id="<?php echo $this->get_field_id( 'product_limit' ); ?>" name="<?php echo $this->get_field_name( 'product_limit' ); ?>" type="text" value="<?php echo $instance['product_limit']; ?>" size="3"/>                  
     </p>
    <?php
  }  

	/**
	 * Creates Admin Menu
	 *
   **/
  function create_menu(){
    add_menu_page($this->short_name, $this->short_name, 'administrator', __FILE__, array($this,'admin_page'));  
    add_action( 'admin_init', array($this,'register_bc_settings' ));
  }

	/**
	 * Displays Admin Settings Panel
	 *
   **/
  function admin_page(){
    if (!current_user_can('manage_options'))  {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }  
    include('bigcartel_settings.php');
  }
  
	/**
	 * Register options
	 *
   **/  
  function register_bc_settings() {
    register_setting( 'bc-settings-group', 'bc_subdomain' );	
    register_setting( 'bc-settings-group', 'bc_shop_url' );	
  }    
  
	/**
	 * Individual Product Shortcode
	 * 
	 * The shortcode parser that replaces the shortcode in the post, page or widget
	 * [bc_product permalink="product-name-permalink" size="small|medium|large" subdomain="tonkapark" showprices]
	 * @param array		$atts
	 * @return string
	 */  
  function bc_product_shortcode($attr) {
  
	if($attr['subdomain']) {
    $apiurl = 'http://api.bigcartel.com/' . $attr['subdomain'] ;
    $storeurl = 'http://' .$attr['subdomain'] . '.bigcartel.com' ;    
    $productsapiurl = $apiurl . '/products.xml';	    
    $producturl = $storeurl . '/product/';
  } else{
    $productsapiurl = $this->productsapiurl;
    $producturl = $this->producturl;
	}

    if ($attr['permalink']) {
      $url = $productsapiurl;
      //get data from api xml feed
      $result = $this->pull_data($url);
      
      foreach ($result as $item) {          
        if ($item->permalink == $attr['permalink']){                                
            $image = $item->images[0]->url;
            $size = $attr['size'] ? $attr['size'] : 'large';     
            $link = '<a href="' . $producturl . $item->permalink . '" title="' . $item->name . '"><img src="' . $this->image_url($item->images->image[0]->url, $size) . '" /></a>';     
          }
      }  
      return $link;
      
    } else {
      return '[Big Cartel Shortcode Error]';
    }
    
  }

  function list_products($limit = 10){
    $url = $this->productsapiurl . '?limit='. $limit;
    $result = $this->pull_data($url);
    $list = '<ul>';
    foreach ($result as $item) {                      
          $list .= '<li><a href="' . $this->producturl . $item->permalink . '" title="' . $item->name . '">' . $item->name . '</a></li>';              
    }        
    $list .= '</ul>';
    return $list;    
  }


  function image_url($url, $size_string = 'large'){
    $suffix = "";
    preg_match("/\.([^\.]+)$/", $url, $matches);    
    $suffix = ".".$matches[1];
    
    $parts = explode("/",$url);
    array_pop($parts);
    $newurl = implode("/", $parts)."/";  

    $size = $this->sizes[$size_string] ? $this->sizes[$size_string] : 300;
    
    return $newurl.$size.$suffix;
  }

	function pull_data($url){
		$content = "";
		$errype = "";
		
		// make sure curl is installed 
		if (function_exists('curl_init') ) {
			// initialize a new curl resource
			$ch = @curl_init();
			
			// set the url to fetch
			@curl_setopt($ch, CURLOPT_URL, $url);
			
			// don't give me the headers just the content
			@curl_setopt($ch, CURLOPT_HEADER, 0);
			
			// return the value instead of printing the response to browser
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			// use a user agent to mimic a browser
			@curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0');
			
			$content = curl_exec($ch);
			// remember to always close the session and free all resources
			@curl_close($ch);
			if($content ==""){ $errype="CURL ERROR";}
		
		}elseif (function_exists('file_get_contents') ) {
			// un '@' this to see what happenes with 404's etc 
			$content = @file_get_contents($url);
			if($content ==""){ $errype="F_G_C ERROR";}
		} else {
			$this->wpc_exitGracefully(array(
				"msg"=>"<h2 class='error'>WPBC Fatal Error 1 : <a href=\"http://php.net/manual/en/book.curl.php\">CURL library</a> is not installed</h2> Please Install and then try again !!<p> </p><p> </p><p> </p>")
			);
			$errype = " NO CURL/F_G_C";
			
		} 
		if($content != ""){
			$content = ereg_replace("&", htmlspecialchars("&"), $content);    
      
			if (function_exists('simplexml_load_string') ) {
				if($result = @simplexml_load_string($content) ){
					return $result;
				}else{
          return 'Fatal Error retreiving data';
				}
			}else{
        return 'simplexml_load_string function is not installed';
			}
		}else{
			print "<h2 class='error'>No Content for this url: $url</h2> <p> " . $errype . "</p>";
			return false;
		}
	}
  
  
}




?>