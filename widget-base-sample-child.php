<?php

/**
 * Sample_Widget_Base_Child
 */
class Sample_Widget_Base_Child extends Widget_Base {

	function __construct() {

		$this->text_fields = array( 'title' );

		parent::__construct(
				'sample_widget_base_child', // Base ID
				__( 'Supply Widget Base Child', 'textdomain' ), // Name
				array( 'description' => __( 'Sample Widget Base Child.', 'textdomain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance) {

		$instance = parent::_sanitize_data( $instance, $instance );

		extract( $instance );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		// open the widget container
		echo $args['before_widget'];
		?>
		<h2 class="widget-title"><?php echo $title; ?></h2>
		<?php
		// do whatever you need here
		
		// close the widget container
		echo $args['after_widget'];

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance) {
		// generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
		echo parent::gti(  'title', 'Title', $instance );
	}

}

// register widget activation hook
add_action( 'widgets_init', 'register_sample_widget' );

function register_sample_widget() {
	register_widget( 'Sample_Widget_Base_Child' );
}
