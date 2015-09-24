<?php
// =============================== TS Recent Posts widget ======================================
class TS_RecentPostWidget extends WP_Widget {
    /** constructor */

	function TS_RecentPostWidget() {
		$widget_ops = array('classname' => 'widget_ts_recent_posts', 'description' => __('TS - Recent Posts','templatesquare') );
		$this->WP_Widget('ts-recent-posts', __('TS - Recent Posts','templatesquare'), $widget_ops);
	}


  /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('TS Recent Posts','templatesquare') : $instance['title']);
		$category = apply_filters('widget_category', $instance['category']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
						
								<?php  if (have_posts()) : ?>
								<ul class="latestpost">
								<?php $querycat = $category;?>
								<?php query_posts("showposts=3&category_name=" . $querycat);?>
								<?php while (have_posts()) : the_post(); ?>	
								<li>
								
								<span class="latestpost-date"><?php the_time('F jS, Y') ?></span>
								<span class="latestpost-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'templatesquare');?> <?php the_title_attribute(); ?>"><?php the_title();?></a></span>
								<?php $excerpt = get_the_excerpt(); echo ts_string_limit_words($excerpt,15).'... ';?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'templatesquare');?> <?php the_title_attribute(); ?>"><?php _e('more &raquo;', 'templatesquare');?></a>
								</li>
								<?php endwhile; ?>
								</ul>
								<?php endif; ?>
							
								<?php wp_reset_query();?>
								
              <?php echo $after_widget; ?>
			 
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
		$category = esc_attr($instance['category']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'templatesquare'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			
            <p><label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category:', 'templatesquare'); ?> <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo $category; ?>" /></label></p>
        <?php 
    }

} // class  Widget
?>