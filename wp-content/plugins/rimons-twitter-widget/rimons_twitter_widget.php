<?php
/* Plugin Name: Rimons Twitter Widget
 * Plugin URI: http://rimonhabib.com
 * Description: This plugin allow you to grab your tweets from twitter and show your theme's sidebar as widget. You can customize   color schemes and size to fit it to your sidebar.after installing, See the <a href="/wp-admin/widgets.php">Widget page</a> to configure twitter widget
 * Version: 0.4
 * Author: Rimon Habib
 * Author URI: http://rimonhabib.com
 *
 */



register_activation_hook( __FILE__,'rtw_activate');

register_deactivation_hook( __FILE__,'rtw_deactivate');

 function rtw_activation_notice(){
    echo '<div class="updated" style="background-color: #53be2a; border-color:#199b57">
	
       <p>Thank you for installing <strong>Rimons Twitter Widget</strong>. See the <a href="'.site_url().'/wp-admin/widgets.php">Widget page</a> to configure twitter widget.</p>
        </div>';
}




	






  function rtw_activate(){
            update_option('rtw_admin_notice','TRUE');
  }
 

  
  function rtw_deactivate(){
  // activate();
    
  }
  
  
  
	$twitter_options=get_option('rtw_admin_notice');  
	if($twitter_options=='TRUE' && is_admin())
        add_action('admin_notices','rtw_activation_notice');
        update_option('rtw_admin_notice','FALSE');
        




class rtw_twitter_widget extends WP_Widget
{
    
    function rtw_twitter_widget()
    {
      parent::WP_Widget( $id = 'rtw_twitter_widget', $name = 'Rimons Twitter Widget'/*get_class($this)*/, $options = array( 'description' => 'Grab your tweets from twitter and show it to your sidebar' ) );
	
    }
    
    
    
    
    function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['rtw_twitter_title'] );
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title; 
		

 
                    if($instance['rtw_twitter_username']): ?>
                         
                                   <script src="http://widgets.twimg.com/j/2/widget.js"></script>
                                         <script>
                                        new TWTR.Widget({
                                          version: 2,
                                          type: 'profile',
                                          rpp: 7,
                                          interval: 30000,
                                          width: <?php echo $instance['rtw_twitter_width'] ?>,
                                          height: <?php echo $instance['rtw_twitter_height'] ?> ,
                                          theme: {
                                            shell: {
                                              background: '<?php echo $instance['rtw_twitter_container_background'] ?>',
                                              color: '<?php echo $instance['rtw_twitter_container_color'] ?>'
                                            },
                                            tweets: {
                                              background: '<?php echo $instance['rtw_twitter_tweet_background'] ?>',
                                              color: '<?php echo $instance['rtw_twitter_tweet_color'] ?>',
                                              links: '<?php echo $instance['rtw_twitter_tweet_link_color'] ?>'
                                            }
                                          },
                                          features: {
                                            scrollbar: <?php echo $instance['rtw_twitter_scroll'] ?>,
                                            loop: <?php echo $instance['rtw_twitter_loop'] ?>,
                                            live: <?php echo $instance['rtw_twitter_live'] ?>,
                                            behavior: 'all'
                                          }
                                        }).render().setUser('<?php echo $instance['rtw_twitter_username'] ?>').start();
                                        </script>
                          <?php

                          else :
                          echo "<p>Please Enter your twitter ID to show tweets from twitter</p>";

                          endif;
                            echo $after_widget;
	}
    
    
    
        
        
        
        
        function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['rtw_twitter_title'] = strip_tags($new_instance['rtw_twitter_title']);
                $instance['rtw_twitter_username'] = $new_instance['rtw_twitter_username'];
                $instance['rtw_twitter_width'] = $new_instance['rtw_twitter_width'];
                $instance['rtw_twitter_height'] = $new_instance['rtw_twitter_height'];
                $instance['rtw_twitter_container_background'] = $new_instance['rtw_twitter_container_background'];
                $instance['rtw_twitter_container_color'] = $new_instance['rtw_twitter_container_color'];
                $instance['rtw_twitter_tweet_background'] = $new_instance['rtw_twitter_tweet_background'];
                $instance['rtw_twitter_tweet_color'] = $new_instance['rtw_twitter_tweet_color'];
                $instance['rtw_twitter_tweet_link_color'] = $new_instance['rtw_twitter_link_color'];
                $instance['rtw_twitter_scroll'] = $new_instance['rtw_twitter_scroll'];
                $instance['rtw_twitter_loop'] = $new_instance['rtw_twitter_loop'];
                $instance['rtw_twitter_live'] = $new_instance['rtw_twitter_live'];
                
                
                
		return $instance;
	}
        
        
        
        
        
        
    
    
    
    
    function form ($instance)
    {
        
        $instance['rtw_twitter_width']= ($instance['rtw_twitter_width'] ?  $instance['rtw_twitter_width'] : '198' );
        $instance['rtw_twitter_height']= ($instance['rtw_twitter_height'] ?  $instance['rtw_twitter_height'] : '300' );
        $instance['rtw_twitter_height']= ($instance['rtw_twitter_height'] ?  $instance['rtw_twitter_height'] : '300' );
        $instance['rtw_twitter_container_background']= ($instance['rtw_twitter_container_background'] ?  $instance['rtw_twitter_container_background'] : '#c4deeb' );
        $instance['rtw_twitter_container_color']= ($instance['rtw_twitter_container_color'] ?  $instance['rtw_twitter_container_color'] : '#3d2c3d' );
        $instance['rtw_twitter_tweet_background']= ($instance['rtw_twitter_tweet_background'] ?  $instance['rtw_twitter_tweet_background'] : '#eaf6fd' );
        $instance['rtw_twitter_tweet_color']= ($instance['rtw_twitter_tweet_color'] ?  $instance['rtw_twitter_tweet_color'] : '#816666' );
        $instance['rtw_twitter_tweet_link_color']= ($instance['rtw_twitter_tweet_link_color'] ?  $instance['rtw_twitter_tweet_link_color'] : '#497da8' );
        $scroll_select= ($instance['rtw_twitter_scroll']=='false' ? " selected " : '');
        $loop_select= ($instance['rtw_twitter_loop']=='false' ? " selected " : '');
        $live_select= ($instance['rtw_twitter_live']=='false' ? " selected " : '');
        
        ?>

                             
            <label for="<?php echo $this->get_field_id('rtw_twitter_title'); ?>"><?php _e('Title:'); ?></label>			
            <input class="widefat" id="<?php echo $this->get_field_id('rtw_twitter_title'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_title'); ?>" type="text" value="<?php echo esc_attr($instance['rtw_twitter_title']); ?>" />
            <br>
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_username'); ?>"><?php _e('Your Twitter Username:'); ?></label>			
            <input class="widefat" id="<?php echo $this->get_field_id('rtw_twitter_username'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_username'); ?>" type="text" value="<?php echo esc_attr($instance['rtw_twitter_username']); ?>" />
            <br>
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_width'); ?>"><?php _e('Width:'); ?></label>			
            <input class="widefat" size="3" id="<?php echo $this->get_field_id('rtw_twitter_width'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_width'); ?>" type="text" value="<?php echo esc_attr($instance['rtw_twitter_width']); ?>" />
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_height'); ?>"><?php _e('Height:'); ?></label>			
            <input class="widefat" size="3" id="<?php echo $this->get_field_id('rtw_twitter_height'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_height'); ?>" type="text" value="<?php echo esc_attr($instance['rtw_twitter_height']); ?>" />
            <br>

            
            <label for="<?php echo $this->get_field_id('rtw_twitter_container_background'); ?>"><?php _e('Container Background:'); ?></label>			
            <input class="widefat"  id="<?php echo $this->get_field_id('rtw_twitter_container_background'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_container_background'); ?>" type="text" value="<?php echo esc_attr($instance['rtw_twitter_container_background']); ?>" />
            <br>
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_container_color'); ?>"><?php _e('Container Text Color:'); ?></label>			
            <input class="widefat"  id="<?php echo $this->get_field_id('rtw_twitter_container_color'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_container_color'); ?>" type="text" value="<?php echo esc_attr($instance['rtw_twitter_container_color']); ?>" />
            <br>
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_tweet_background'); ?>"><?php _e('Tweets Background:'); ?></label>			
            <input class="widefat"  id="<?php echo $this->get_field_id('rtw_twitter_tweet_background'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_tweet_background'); ?>" type="text" value="<?php echo esc_attr($instance['rtw_twitter_tweet_background']); ?>" />
            <br>
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_tweet_color'); ?>"><?php _e('Tweet Text Color:'); ?></label>			
            <input class="widefat"  id="<?php echo $this->get_field_id('rtw_twitter_tweet_color'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_tweet_color'); ?>" type="text" value="<?php echo esc_attr($instance['rtw_twitter_tweet_color']); ?>" />
            <br>
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_tweet_link_color'); ?>"><?php _e('Tweets Link Color:'); ?></label>			
            <input class="widefat"  id="<?php echo $this->get_field_id('rtw_twitter_tweet_link_color'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_tweet_link_color'); ?>" type="text" value="<?php echo esc_attr($instance['rtw_twitter_tweet_link_color']); ?>" />
            <br>
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_scroll'); ?>"><?php _e('Scroll:'); ?></label>			
            <select  id="<?php echo $this->get_field_id('rtw_twitter_scroll'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_scroll'); ?>" >
            
                <option value="true">True</option>
                <option value="false" <?php echo $scroll_select; ?> >False</option>
                
            </select>
            <br>
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_loop'); ?>"><?php _e('Loop:'); ?></label>			
            <select  id="<?php echo $this->get_field_id('rtw_twitter_loop'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_loop'); ?>" >
            
                <option value="true">True</option>
                <option value="false" <?php echo $loop_select; ?> >False</option>
                
            </select>
            <br>
            
            
            
            <label for="<?php echo $this->get_field_id('rtw_twitter_live'); ?>"><?php _e('Live:'); ?></label>			
            <select  id="<?php echo $this->get_field_id('rtw_twitter_live'); ?>" name="<?php echo $this->get_field_name('rtw_twitter_live'); ?>" >
            
                <option value="true">True</option>
                <option value="false" <?php echo $live_select; ?> >False</option>
                
            </select>
            <br>
    <?
    }
    
    
    
    
    
    
    
 } // rtw_twitter_widget Class Ends

add_action( 'widgets_init', create_function( '', 'register_widget("rtw_twitter_widget");' ) );

?>