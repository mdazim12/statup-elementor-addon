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


        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		






        


	///================== Repater Field  =======================================================================//

	$repeater = new \Elementor\Repeater();

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
			'default' => esc_html__( 'Description' , 'statup-extension' ),
			'show_label' => true,
		]
	);

	$repeater->add_control(
		'feature_images_btn',
		[
			'label' => esc_html__( 'Button', 'statup-extension' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => esc_html__( 'Button' , 'statup-extension' ),
			'show_label' => true,
			'label_block' => true,
		]
	);


	$repeater->add_control(
		'feature_images_btn_link',
		[
			'label' => esc_html__( 'Buttton URL', 'statup-extension' ),
			'type' => \Elementor\Controls_Manager::URL,
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
					
					'feature_images_title' => esc_html__( 'Title #2', 'textdomain' ),
					'feature_images_des' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
				],
			],
			'title_field' => '{{{ feature_images_title }}}',
		]
	);







        $this->end_controls_section();


    }


}