
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

    
        $this->end_controls_section();


    
?>

                   <!-- <div class="row justify-content-center">
                  <div class="col-xxl-10 col-xl-10 col-lg-11">
                     <div class="features__offer text-center mt-20 wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                        <span>NEW FEATURES</span>
                        <p> If you want to join the effort and help with the plugin, please <a href="contact.html">Let Us Know</a>.</p>
                     </div>
                  </div>
               </div>               <div class="row justify-content-center">
                  <div class="col-xxl-10 col-xl-10 col-lg-11">
                     <div class="features__offer text-center mt-20 wow fadeInUp" data-wow-delay=".9s" data-wow-duration="1s">
                        <span>NEW FEATURES</span>
                        <p> If you want to join the effort and help with the plugin, please <a href="contact.html">Let Us Know</a>.</p>
                     </div>
                  </div>
               </div> -->

<?php

    }

}