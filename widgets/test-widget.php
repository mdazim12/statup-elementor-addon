<?php
class Test_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'test';
	}

	public function get_title() {
		return esc_html__( 'Test', 'statup-extension' );
	}

	public function get_icon() {
		return 'fa fa-podcast';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'Content',
			[
				'label' => esc_html__( 'Content', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'This is heading', 'statup-extension' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'statup-extension' ),
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		$title 	=$settings['title'];
		$desc 	=$settings['description'];
	?>
		<h2><?php echo $title; ?></h2>
		<p><?php echo $desc; ?></p>

	<?php
	}



	
}