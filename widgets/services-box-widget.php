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
class Statup_Services_Box_Widget extends \Elementor\Widget_Base {

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
		return 'services_box';
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
		return esc_html__( 'Services Box ', 'statup-extension' );
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
		return 'eicon-info-box';
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
		return [ 'services_box', 'url', 'link' ];
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

     ///====================SERVICES BOX=====================================================================

        $this->start_controls_section(
            'services_box_section',
            [
                'label' => esc_html__( 'Services Box', 'statup-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'services_box_images',
            [
                'name' => 'services_box_iocn_box',
                'label' => esc_html__( 'Services Image', 'statup-extension' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'services_box_title',
            [
                'label' => esc_html__( 'Title', 'statup-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Title here', 'statup-extension' ),
                'label_block' =>true,
                'default' => esc_html__( 'This is Heading', 'statup-extension' ),
            ]
        );

        $this->add_control(
            'services_box_description',
            [
                'label' => esc_html__( 'Description', 'statup-extension' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Description here', 'statup-extension' ),
                'label_block' =>true,
                'default' => esc_html__( 'Elementum ipsum donec usodales porttitor mauris augue fermentum sagittis elementum.', 'statup-extension' ),
            ]
        );

        $this->add_control(
            'services_box_btn',
            [
                'label' => esc_html__( 'Button', 'statup-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Button name', 'statup-extension' ),
                'label_block' =>true,
            ]
        );

        $this->add_control(
            'services_box_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'statup-extension' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'yourlink.com', 'statup-extension' ),
                'label_block' =>true,
            ]
        );


        $this->end_controls_section();

		


//======================STYLE TABS===========================================================================

		 $this->start_controls_section(
			'services_box_control',
			[
				'label' => esc_html__( 'Images', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'separator' =>'after',
			]
		);

		
		$this->add_responsive_control(
			'servics_images_spacing',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Spacing', 'statup-extension' ),
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
					'{{WRAPPER}} .services_box_images' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_responsive_control(
			'servics_images_width',
			[
				'type' => \Elementor\Controls_Manager::SLIDER,
				'label' => esc_html__( 'Width', 'statup-extension' ),
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
					'{{WRAPPER}} .services_box_images' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'services_box_images_border',
                'label'=>'Border',
				'selector' => '{{WRAPPER}} .services_box_images',
			]
		);

		$this->add_responsive_control(
			'servics_images_border_raduis',
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
					'{{WRAPPER}} .services_box_images' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		$this->end_controls_section();

///=============STYLE CONTENT SECTION ================================================================================

		$this->start_controls_section(
			'services_box_content_control',
			[
				'label' => esc_html__( 'Content', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'separator' =>'after',
			]
		);

		
        $this->add_control(
			'services_box_content_heading',
			[
				'label' => esc_html__( 'Title', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'selectors' => [
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'services_box_content_heading_color',
			[
				'label' => esc_html__( ' Title Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features__title-7' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'services_box_content_heading_Typography',
				'label'=>'Typography',
				'selector' => '{{WRAPPER}} .features__title-7',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'services_box_content_heading_stoke',
                'label'=> 'Stroke',
				'selector' => '{{WRAPPER}} .features__title-7',
			]
		);
       
        $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'services_box_content_heading_shadow',
                'label'=> 'Shadow',
				'selector' => '{{WRAPPER}} .features__title-7',
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

		$settings               = $this->get_settings_for_display();
        $services_box_iocn 	    =$settings['services_box_images']['url'];
        $services_title 	    =$settings['services_box_title'];
        $services_description 	=$settings['services_box_description'];
        $services_btn       	=$settings['services_box_btn'];
        $services_btn_link      =$settings['services_box_btn_link']['url'];
        

    ?>
					<div class="services_wrapper">
                        <div class="text-center mb-30  transition-3 wow fadeInUp services_box" data-wow-delay=".5s" data-wow-duration="1s">
                            <div class="features__icon-7">
                            <span>
                                <img class='services_box_images' src="<?php echo $services_box_iocn;?>" alt="">
                            </span>
                            </div>
                            <div class="features__content-7">
                            <h3 class="features__title-7"> <?php echo $services_title;?> </h3>
                            <p> <?php echo $services_description;?> </p>
                            <div class="features__btn-7">
                                <a href="<?php echo $services_btn_link;?>" class="tp-link-btn-3">
                                   <?php echo $services_btn; ?>
                                </a>
                            </div>
                            </div>
                        </div>
					</div>



<?php



    }  

}


