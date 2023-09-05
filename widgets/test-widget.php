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
			'Title',
			[
				'label' => esc_html__( 'Title', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'statup-extension' ),
				'label_block' =>true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'This is heading', 'statup-extension' ),
			]
		);
		$this->end_controls_section();



		$this->start_controls_section(
			'Description',
			[
				'label' => esc_html__( 'Description', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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


		$this->start_controls_section(
			'Label',
			[
				'label' => esc_html__( 'Label', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'link_label',
			[
				'label' => esc_html__( 'Button Name', 'statup-extension' ),
				'label_block' =>true,
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'statup-extension' ),
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'label_link_url',
			[
				'label' => esc_html__( 'Label URL', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();




		//STYLE TABS
		$this->start_controls_section(
			'style',
			[
				'label' => esc_html__( 'Style', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'TITLE',
			[
				'label' => esc_html__( 'Title Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' =>'after',
				'selectors' => [
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);

		

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'Typography',
				'selector' => '{{WRAPPER}} .heading',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'head_stroke',
				'label'=>'Stroke',
				'selector' => '{{WRAPPER}} .heading',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'head_shadow',
				'label'=>'Shadow',
				'selector' => '{{WRAPPER}} .heading',
			]
		);

		$this->add_control(
			'des_style',
			[
				'label' => esc_html__( 'Descrition Style', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' =>'after',
				'selectors' => [
					'{{WRAPPER}} .description' => 'color: {{VALUE}}',
				],
			]
		);

		

		

		$this->add_control(
			'des_color',
			[
				'label' => esc_html__( ' Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'des_Typography',
				'label'=>'Description Typography',
				'selector' => '{{WRAPPER}} .description',
			]
		);

		$this->end_controls_section();



	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		$title 	=$settings['title'];
		$desc 	=$settings['description'];
		$label 	=$settings['link_label'];
		$link 	=$settings['website_link']['url'];
	?>
		<h2 class='heading'><?php echo $title; ?></h2>
		<p class='description'><?php echo $desc; ?></p>

		<a href="<?php echo $link; ?>"> <?php echo $label; ?> </a>

	<?php
	}



	
}