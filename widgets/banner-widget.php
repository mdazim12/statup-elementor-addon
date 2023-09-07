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
class Banner_Widget extends \Elementor\Widget_Base {

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
		return 'Banner';
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
		return esc_html__( 'banner', 'statup-extension' );
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
		return ' eicon-post-slider';
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
		return [ 'banner', 'url', 'link' ];
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

        
//=====================Title CONTROL============================================  
		$this->start_controls_section(
			'banner_content',
			[
				'label' => esc_html__( 'Bannner Content', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'banner_title',
			[
				'label' => esc_html__( 'Title', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Title here', 'statup-extension' ),
                'label_block' =>true,
                'default' => esc_html__( 'It’s time to join the startup business', 'statup-extension' ),
			]
		);

        $this->add_control(
			'banner_des',
			[
				'label' => esc_html__( 'Description', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Description here', 'statup-extension' ),
                'label_block' =>true,
                'default' => esc_html__( 'Elementum ipsum donec usodales porttitor mauris augue fermentum sagittis elementum.', 'statup-extension' ),
			]
		);

        $this->end_controls_section();

//=====================BUTTON CONTROL============================================  
        $this->start_controls_section(
			'banner_btn_control',
			[
				'label' => esc_html__( 'Button', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


        $this->add_control(
			'banner_btn',
			[
				'label' => esc_html__( 'Button', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button name', 'statup-extension' ),
                'label_block' =>true,
			]
		);

        $this->add_control(
			'banner_link',
			[
				'label' => esc_html__( 'Button Link', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'yourlink.com', 'statup-extension' ),
                'label_block' =>true,
			]
		);

        $this->end_controls_section();




     //=====================IMAGES CONTROL============================================   

     $this->start_controls_section(
        'banner_side_control',
        [
            'label' => esc_html__( 'Images ', 'statup-extension' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

        

        $this->add_control(
			'ban_side_images_control',
			[
				'label' => esc_html__( 'Banner Image', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();



        //=====================SHAPE CONTROL============================================   
        
        $this->start_controls_section(
			'banner_shape_control',
			[
				'label' => esc_html__( 'Shape ', 'statup-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'ban_shape_one',
			[
				'label' => esc_html__( 'Banner Shape One', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'ban_shape_two',
			[
				'label' => esc_html__( 'Banner Shape Two', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


        $this->add_control(
			'ban_shape_three',
			[
				'label' => esc_html__( 'Banner Shape Three', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
			'banner_style',
			[
				'label' => esc_html__( 'Banner Style', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' =>'after',
				'selectors' => [
					'{{WRAPPER}} .heading' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'banner_title_color',
			[
				'label' => esc_html__( ' Title Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider__title-7' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'banner_title_Typography',
				'label'=>'Title Typography',
				'selector' => '{{WRAPPER}} .slider__title-7',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'banner_title_stoke',
                'label'=> 'Stroke',
				'selector' => '{{WRAPPER}} .slider__title-7',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'banner_title_stoke',
                'label'=> 'Stroke',
				'selector' => '{{WRAPPER}} .slider__title-7',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'banner_title_shadow',
                'label'=> 'Shadow',
				'selector' => '{{WRAPPER}} .slider__title-7',
			]
		);


        


        $this->add_control(
			'banner_des_style',
			[
				'label' => esc_html__( 'Description Style', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' =>'after',
				'selectors' => [
					'{{WRAPPER}} .banner_des' => 'color: {{VALUE}}',
				],
			]
		);
        

        $this->add_control(
			'banner_des_alignment',
			[
				'label' => esc_html__( 'Alignment', 'tatup-extension' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'tatup-extension' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'tatup-extension' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'tatup-extension' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .banner_des' => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'banner_des_color',
			[
				'label' => esc_html__( ' Description Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_des' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'banner_des_Typography',
				'label'=>'Description Typography',
				'selector' => '{{WRAPPER}} .banner_des',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'banner_des_shadow',
                'label'=> 'Shadow',
				'selector' => '{{WRAPPER}} .banner_des',
			]
		);

        


       

        $this->add_control(
			'btn_style',
			[
				'label' => esc_html__( 'Button Style', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' =>'after',
				'selectors' => [
					'{{WRAPPER}} .banner_button' => 'color: {{VALUE}}',
				],
			]
		);



        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'banner_btn_Typography',
				'label'=>'Button Typography',
				'selector' => '{{WRAPPER}} .banner_button',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'banner_btn_shadow',
                'label'=> 'Shadow',
				'selector' => '{{WRAPPER}} .banner_button',
			]
		);


        $this->start_controls_tabs(
			'style_tabs'
		);
//===========================NORMAL TAB FOR BUTTON==============================================================
        $this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'statup-extension' ),
			]
		);

        $this->add_control(
			'banner_btn_color',
			[
				'label' => esc_html__( ' Button Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_button' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .banner_button',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'banner_border',
                'label'=>'Border',
				'selector' => '{{WRAPPER}} .banner_button',
			]
		);

		$this->add_control(
			'banner_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .banner_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'banner_padding',
			[
				'label' => esc_html__( 'Padding', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .banner_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_tab();


//=====================HOVER STYLE======================================================================
        $this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'statup-extension' ),
			]
		);

		$this->add_control(
			'banner_btn_color_hover',
			[
				'label' => esc_html__( ' Button Color', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner_button:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'banner_btn_hover',
				'label' => 'Background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .banner_button:hover',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'banner_border_hover',
                'label'=>'Border',
				'selector' => '{{WRAPPER}} .banner_button:hover',
			]
		);

		$this->add_control(
			'banner_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .banner_button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'banner_padding_hover',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .banner_button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$settings = $this->get_settings_for_display();
        $ban_title 	=$settings['banner_title'];
        $ban_des 	=$settings['banner_des'];
        $ban_btn 	=$settings['banner_btn'];
        $ban_link 	=$settings['banner_link']['url'];
        $ban_side_images 	=$settings['ban_side_images']['url'];
        $ban_shape_one 	    =$settings['ban_shape_one']['url'];
        $ban_shape_two 	    =$settings['ban_shape_two']['url'];
        $ban_shape_three 	=$settings['ban_shape_three']['url'];
        




    ?>

		<section class="slider__area pt-180 z-index-1 p-relative fix">
            <div class="slider__shape">
               <img class="slider__shape-19" src="<?php echo $ban_shape_one;?>" alt="">
            </div>
            <div class="container">
               <div class="row align-items-end">
                  <div class="col-xxl-6 col-xl-6 col-lg-6">
                     <div class="slider__content-7">
                        <h3 class="slider__title-7">
                           <?php echo $ban_title; ?>
                        </h3>
                        <p class="banner_des"> <?php echo $ban_des; ?></p>

                        <div class="slider__subscribe">
                        <a  class="tp-btnr-yellow tp-btn-shine-effect banner_button" href="<?php echo $ban_link; ?>"> <?php echo $ban_btn; ?> </a>
                        
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6">
                     <div class="slider__thumb-wrapper-7">
                        <img class="slider__thumb-7-shape-1" src="<?php  ?>" alt="">
                        <img class="slider__thumb-7-shape-2" data-parallax='{"y": -100, "smoothness": 80}' src="<?php echo $ban_shape_two;?>" alt="">
                        <img class="slider__thumb-7-shape-3" data-parallax='{"y": 100, "smoothness": 80}' src="<?php echo $ban_shape_three;?>" alt="">
                        <div class="slider__thumb-7">
                           <img src="<?php echo $ban_side_images;?>" alt="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>


<?php
		

	}

}