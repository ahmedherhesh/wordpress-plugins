<?php

class Newsletter_Subscriber_Widget extends WP_Widget
{
	public $fields;
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct()
	{
		$this->fields = ['title', 'recipient', 'subject'];
		parent::__construct('newsletter_subscriber_widget', 'Newsletter Subscriber Widget', ['description' => 'test']);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget($args, $instance)
	{
		echo $args['before_widget'];
?>
		<div id="form-msg"></div>
		<form id="subscriber-form"  action="<?php echo plugins_url(); ?>/newsletter-subscriber/inc/newsletter-subscriber-mailer.php" method="POST">
			<h3 style="text-align:center"><?php echo $instance['title']; ?></h3>
			<div class="form-group">
				<label for="name">Name :</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email :</label>
				<input type="email" name="email" id="email" class="form-control">
			</div>
			<input type="hidden" name="recipient" value="<?php echo $instance['recipient']; ?>">
			<input type="hidden" name="subject" value="<?php echo $instance['subject']; ?>">
			<div style="text-align:center;margin-top:20px"> <button class="btn btn-primary" name="subscriber_submit">Subscribe</button></div>
		</form>

<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form($instance)
	{
		$title = !empty($instance['title']) ? $instance['title'] : 'Newsletter Subscriber';
		$recipient = $instance['recipient'];
		$subject = !empty($instance['subject']) ? $instance['subject'] : 'You have a new subscriber';


		echo "<div class='form' id='form'>";
		foreach ($this->fields as $field) {
			$field_id 	= $this->get_field_id($field);
			$field_name = $this->get_field_name($field);
			echo "
							<label for='$field_id' style='font-weight:bold'>" . ucfirst($field) . " :</label>
							<input type='text' id='$field_id' value='" . ${$field} . "' name='$field_name'>	
						";
		}
		echo "</div>";
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update($new_instance, $old_instance)
	{
		$instance = [];
		foreach ($this->fields as $field) {
			$instance[$field] = !empty($new_instance[$field]) ? strip_tags($new_instance[$field]) : '';
		}
		return $instance;
	}
}

function regitser_newsletter_subscriber()
{
	register_widget('Newsletter_Subscriber_Widget');
}
add_action('widgets_init', 'regitser_newsletter_subscriber');
