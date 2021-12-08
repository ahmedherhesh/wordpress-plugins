<?php

class Facebook_Page_Plugin_Widget extends WP_Widget
{
	public $fields;
	public function __construct()
	{
		$this->fields = [
			'title' 			=> 'Like Us On Facebook',
			'page_url' 			=> 'https://www.facebook.com/facebook',
			'adapt_container' 	=> 'true',
			'show_timeline' 	=> 'true',
			'show_facepile' 	=> 'true',
			'hide_cover' 		=> 'false',
			'use_small_header' 	=> 'false',
			'width' 			=> 250,
			'height' 			=> 500,
		];

		parent::__construct(
			'facebook_page_plugin_widget', // Base ID
			'Facebook Page Plugin', // Name,
			['description' => 'Shows a Facebook page plugin in a widget']
		);
	}
	public function widget($args, $instance)
	{
		$data = [];
		foreach ($this->fields as $key => $value) {
			$data[$key] = esc_attr($instance[$key]);
		}
		echo $instance['title'];
		$this->get_page_plugin($data);
	}
	public function form($instance)
	{
		foreach ($this->fields as $key => $value) {
			if (isset($instance[$key])) {
				${$key} = $instance[$key];
			} else {
				${$key} = $value;
			}
			$field_id 	= $this->get_field_id($key);
			$field_name = $this->get_field_name($key);
			if ($value == 'true' || $value == 'false') {
				$value_check = function ($value, $val) {
					echo $value == $val ? 'selected' : '';
				};
?>
				<div>
					<label for='<?php echo $field_id; ?>'><?php echo str_replace('_', ' ', ucfirst($key)); ?></label>
					<select name='<?php echo $field_name; ?>' id='<?php echo $field_id; ?>'>
						<option value='true' <?php $value_check($value, 'true'); ?>>True</option>
						<option value='false' <?php $value_check($value, 'false');; ?>>False</option>
					</select>
				</div>
<?php
			} else {
				echo "
					<div>
						<label for='$field_id'>" . str_replace('_', ' ', ucfirst($key)) . "</label>
						<input type='text' class='widefat' id='$field_id' name='$field_name' value='" . esc_attr(${$key}) . "'>
					</div>
				";
			}
		}
	}

	public function update($new_instance, $old_instance)
	{
		$instance = [];
		foreach ($this->fields as $key => $filed) {
			$instance[$key] = !empty($new_instance[$key]) ? strip_tags($new_instance[$key]) : '';
		}
		return $instance;
	}

	public function get_page_plugin($data)
	{
		$timeline = $data['show_timeline'] == 'true' ? 'timeline' : '';
		$adapt_container = 
			$data['adapt_container'] == 'false' ?
			"data-width='".$data['width']."' data-height='".$data['height']."'"  : 
			"data-adapt-container-width='".$data['adapt_container']."' ";
			
		echo "
				<div id='fb-root'></div>
				<script async defer crossorigin='anonymous' src='https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v12.0' nonce='K8SFEP0z'></script>

				<div class='fb-page'
					 data-href='".$data['page_url']."'
					 data-tabs='$timeline'
					 $adapt_container
					 data-small-header='".$data['use_small_header']."' 
					 data-hide-cover='".$data['hide_cover']."' 
					 data-show-facepile='".$data['show_facepile']."'>
				</div>
				<div class='fb-xfbml-parse-ignore'>
					<blockquote cite='".$data['page_url']."'>
						<a href='".$data['page_url']."'>Facebook</a>
					</blockquote>
				</div>
			";
	}
}

function regitser_facebook_page_plugin_widget()
{
	register_widget('Facebook_Page_Plugin_Widget');
}
add_action('widgets_init', 'regitser_facebook_page_plugin_widget');
