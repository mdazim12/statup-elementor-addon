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
class Feature_Images_Widget extends \Elementor\Widget_Base {

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
		return 'Feature Images';
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
		return esc_html__( 'feature_images', 'statup-extension' );
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
		return ' eicon-image-hotspot';
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
		return [ 'Feature Images', 'url', 'link' ];
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
            'feature_images_control',
            [
                'label' => esc_html__( 'Featured Images', 'statup-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



	  ///================== Repater Field  =======================================================================//

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'feature_images_icon',
			[
				'label' => esc_html__( 'Icon', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
			]
		);


		$repeater->add_control(
			'feature_images_title',
			[
				'label' => esc_html__( 'Title', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Feature Images  ' , 'statup-extension' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'feature_images_des',
			[
				'label' => esc_html__( 'Content', 'statup-extension' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' , 'statup-extension' ),
				'show_label' => true,
			]
		);

	





		$this->add_control(
			'feature_images_list',
			[
				'label' => esc_html__( 'Feature Images', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					
					[
						
						'feature_images_title' => esc_html__( 'Title', 'textdomain' ),
						'feature_images_des' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
				'title_field' => '{{{ feature_images_title }}}',
			]
		);




        $this->end_controls_section();


    }


	protected function render() {
		$settings = $this->get_settings_for_display();

		foreach (  $settings['feature_images_list'] as $item ) {

			$feature_images_render_title = $item['feature_images_title'];
			$feature_images_render_description = $item['feature_images_des'];
			$feature_images_render_icon = $item ['feature_images_icon'];
			
			
		?>


		
					<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="services__item-7 text-center mb-60 wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                           <div class="services__icon-7">
                              <span>
							 	<?php \Elementor\Icons_Manager::render_icon( $feature_images_render_icon); ?>                                                                    
                              </span>
                           </div>
                           <div class="services__content-7">
                              <h3 class="services__title-7">
                                 <a href="#"><?php echo $feature_images_render_title; ?></a>
                              </h3>
                              <p> <?php echo $feature_images_render_description;?> </p>
   
							</div>
                        </div>
                     </div>
		


		<?php
	  }
	}


}