<?php

class Social_Links_Widget extends WP_Widget {
	public $links; 
	public $icons;
	public $fields;
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$this->links  = ['facebook_link','twitter_link','linkedin_link','google_link'];
		$this->icons  = ['facebook_icon','twitter_icon','linkedin_icon','google_icon'];
		$this->fields = array_merge($this->links , $this->icons);
		$this->fields[] = 'icon_width';
		parent::__construct( 'social_links_widget', 'Social Links Widget', ['description' =>'test'] );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$icon_width = $instance['icon_width'];
		echo $args['before_widget'];
		$this->get_social_links($instance);
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$this->getForm($instance);
	}


    public function getForm($instance){
		if($instance){
			foreach($instance as $key => $inst){
				if(isset($instance[$key])){
					${$key} = esc_attr($instance[$key]);
				}
			}
		}

		foreach($this->fields as $field){
			$field_id   = $this->get_field_id($field);
			$field_name = $this->get_field_name($field);
			echo
				"<div>
					<label for='$field_id'>"._e(ucfirst(str_replace('_',' ',$field)))."</label>
					<input type='text' id='$field_id' name='$field_name' value='".${$field}."'>
				</div>";
	   }
		
    }

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = [];
		foreach($this->fields as $field){
			 $instance[$field] =  !empty($new_instance[$field]) ? strip_tags($new_instance[$field]): '';
		}
		return $instance;
	}

	public function get_social_links($instance){
		?>
			<div class="social-links">
				<a href="<?php echo esc_attr($instance['facebook_link']); ?>" target="_blank" ><img src="<?php echo esc_attr($instance['facebook_icon']); ?>" width="<?php echo esc_attr($instance['icon_width']); ?>"></a>
				<a href="<?php echo esc_attr($instance['twitter_link']);  ?>" target="_blank" ><img src="<?php echo esc_attr($instance['twitter_icon']); ?>"  width="<?php echo esc_attr($instance['icon_width']); ?>"></a>
				<a href="<?php echo esc_attr($instance['linkedin_link']); ?>" target="_blank" ><img src="<?php echo esc_attr($instance['linkedin_icon']); ?>" width="<?php echo esc_attr($instance['icon_width']); ?>"></a>
				<a href="<?php echo esc_attr($instance['google_link']);   ?>" target="_blank" ><img src="<?php echo esc_attr($instance['google_icon']); ?>"   width="<?php echo esc_attr($instance['icon_width']); ?>"></a>
			</div>
		<?php
	}
}

function regitser_social_links(){
    register_widget('Social_Links_Widget');
}
add_action('widgets_init','regitser_social_links');