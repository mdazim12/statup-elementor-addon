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







    }

}