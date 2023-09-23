
<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor banner Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Statup_mewslatter_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve banner widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'newsletter';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve banner widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Newslatter ', 'statup-extension' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve banner widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return ' eicon-read';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the banner widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the banner widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'newslatter', 'url', 'link' ];
	}

	/**
	 * Register banner widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

        $this->start_controls_section(
			'banner_content',
			[
				'label' => esc_html__( 'Bannner Content', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'newslatter_title',
			[
				'label' => esc_html__( 'Title', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title here', 'statup-extension' ),
                'label_block' =>true,
                'default' => esc_html__( 'NEW FEATURES', 'statup-extension' ),
			]
		);

        $this->add_control(
			'newslatter_description',
			[
				'label' => esc_html__( 'Description', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Description here', 'statup-extension' ),
                'label_block' =>true,
                'default' => esc_html__( ' If you want to join the effort and help with the plugin, please.', 'statup-extension' ),
			]
		);

        
        $this->add_control(
			'newslatter_btn',
			[
				'label' => esc_html__( 'Button', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button name', 'statup-extension' ),
                'label_block' =>true,
				'default' => esc_html__( ' Contact.', 'statup-extension' ),
			]
		);

        $this->add_control(
			'newslatter_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'yourlink.com', 'statup-extension' ),
                'label_block' =>true,
			]
		);

        $this->end_controls_section();


		//======================STYLE TABS===========================================================================
		
		//-------------------WRAPPER BOX--------------------------------------------

		$this->start_controls_section(
			'newlatter_style',
			[
				'label' => esc_html__( 'Wrapper Box', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'separator' =>'after',
			]
		);

		$this->add_responsive_control(
			'newslatter_width_style',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Box Width', 'statup-extension' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 30,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .features__offer ' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'newslatter_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .features__offer',
			]
		);






		$this->end_controls_tab();

		$this->end_controls_section();







		$this->start_controls_section(
			'newlatter_style',
			[
				'label' => esc_html__( 'Content Style', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'separator' =>'after',
			]
		);

		$this->add_control(
			'newslatter_title_style',
			[
				'label' => esc_html__( ' Title Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newslatter_title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'newslatter_title_style_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .newslatter_title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'newslatter_title_Typography',
				'label'=>'Typography',
				'selector' => '{{WRAPPER}} .newslatter_title',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'newslatter_title_stoke',
                'label'=> 'Stroke',
				'selector' => '{{WRAPPER}} .newslatter_title',
			]
		);
       
        $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'newslatter_title_shadow',
                'label'=> 'Shadow',
				'selector' => '{{WRAPPER}} .newslatter_title',
			]
		);


		$this->add_control(
			'services_box_content_description',
			[
				'label' => esc_html__( 'Description', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' =>'after',
				'selectors' => [
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);




        $this->add_control(
			'newslatter_des_color',
			[
				'label' => esc_html__( ' Description Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newslatter_des' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'newslatter_des_Typography',
				'label'=>'Typography',
				'selector' => '{{WRAPPER}} .newslatter_des',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'newslatter_des_shadow',
                'label'=> 'Shadow',
				'selector' => '{{WRAPPER}} .newslatter_des',
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'services_box_button',
			[
				'label' => esc_html__( 'Button', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'newslatter_btn_Typography',
				'label'=>'Typography',
				'selector' => '{{WRAPPER}} .newslatter_btn',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'newslatter_btn_shadow',
                'label'=> 'Shadow',
				'selector' => '{{WRAPPER}} .newslatter_btn',
			]
		);



		$this->start_controls_tabs(
			'style_tabs'
		);
//===========================NORMAL TAB FOR BUTTON==============================================================
        $this->start_controls_tab(
			'newslatter_btn_normal_style',
			[
				'label' => esc_html__( 'Normal', 'statup-extension' ),
			]
		);

        $this->add_control(
			'newslatter_btn_color',
			[
				'label' => esc_html__( 'Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newslatter_btn' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'newslatter_btn_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .newslatter_btn',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'newslatter_btn_border',
                'label'=>'Border',
				'selector' => '{{WRAPPER}} .newslatter_btn',
			]
		);

		$this->add_responsive_control(
			'newalatter_btn_border_raduis',
			[	
				
				'label' => esc_html__( 'Raduis', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .newslatter_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'newslatter_btn_padding',
			[	
				
				'label' => esc_html__( 'Padding', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .newslatter_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

	


		
//=====================HOVER STYLE======================================================================
			$this->start_controls_tab(
				'newslatter_btn_hover_style',
				[
					'label' => esc_html__( 'Hover', 'statup-extension' ),
				]
			);

			$this->add_control(
				'services_color_hover',
				[
					'label' => esc_html__( ' Button Color', 'statup-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .newslatter_btn:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'newslatter_btn_hover',
					'label' => 'Background',
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .newslatter_btn:hover',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'newslatter_btn_hover',
					'label'=>'Border',
					'selector' => '{{WRAPPER}} .newslatter_btn:hover',
				]
			);

			$this->add_control(
				'newslatter_btn_radius_hover',
				[
					'label' => esc_html__( 'Border Radius', 'statup-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .newslatter_btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


			$this->add_control(
				'newslatter_btn_padding_hover',
				[
					'label' => esc_html__( 'Padding', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .newslatter_btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_tab();


		

        $this->end_controls_tabs();


		$this->end_controls_section();

    
        


    
}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {


		$settings 		= $this->get_settings_for_display();
        $news_title 	=$settings['newslatter_title'];
        $news_des 		=$settings['newslatter_description'];
        $news_btn 		=$settings['newslatter_btn'];
        $news_btn_link 	=$settings['newslatter_btn_link']['url'];
?>


			<div class="row justify-content-center">
                  <div class="col-xxl-10 col-xl-10 col-lg-11">
                     <div class="features__offer text-center mt-20 wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                        <span class="newslatter_title"><?php echo $news_title;?> </span>
                        <p class="newslatter_des"> <?php echo $news_des; ?> <a class="newslatter_btn" href="<?php echo $news_btn_link; ?>"> <?php echo $news_btn; ?> </a>.</p>
                     </div>
                  </div>
               </div>            

<?php
	}

}