<?php
/**
 * Plugin Name: statup widget
 * Description: Custom Elementor extension which includes custom widgets.
 * Plugin URI:  #
 * Version:     1.0.0
 * Author:      Abdullah Nahian
 * Author URI:  #
 * Text Domain: statup-extension
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Elementor_Statup_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Statup_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Statup_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'statup-extension', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

		add_action('elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

        // Category Init
		//add_action( 'elementor/init', [ $this, 'elementor_common_category' ] );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'statup-extension' ),
			'<strong>' . esc_html__( 'Statup Elementor Extension', 'statup-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'statup-extension' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'statup-extension' ),
			'<strong>' . esc_html__( 'Statup Elementor Extension', 'statup-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'statup-extension' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'statup-extension' ),
			'<strong>' . esc_html__( 'Statup Elementor Extension', 'statup-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'statup-extension' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		require_once( __DIR__ . '/widgets/test-widget.php' );
		require_once( __DIR__ . '/widgets/banner-widget.php' );
		require_once( __DIR__ . '/widgets/statup-heading-widget.php' );
		require_once( __DIR__ . '/widgets/services-box-widget.php' );
		require_once( __DIR__ . '/widgets/newsletter-widget.php' );
		require_once( __DIR__ . '/widgets/feature-images-widget.php' );
		//require_once( __DIR__ . '/widgets/projects-widget.php' );
		//require_once( __DIR__ . '/widgets/counter-widget.php' );
		//require_once( __DIR__ . '/widgets/team-widget.php' );

	     \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Test_Widget() );
    	 \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Banner_Widget() );
		 \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Statup_Services_Box_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Statup_mewslatter_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Feature_Images_Widget() );
		////	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Process_Widget() );
		////	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Projects_Widget() );
		////	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Counter_Widget() );
		////	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Team_Widget() );

	}

	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_controls() {

		/*
		* Todo: this block needs to be commented out when the custom control is ready
		*
		*
		// Include Control files
		require_once( __DIR__ . '/controls/test-control.php' );
		// Register control
		\Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );
		*/

	}

	// Custom CSS
	public function widget_styles() {

		wp_register_style( 'boostrap', plugins_url( 'assets/css/bootstrap.css', __FILE__ ) );
		wp_register_style( 'meanmenu', plugins_url( 'assets/css/meanmenu.css', __FILE__ ) );
		wp_register_style( 'animate', plugins_url( 'assets/css/animate.css', __FILE__ ) );
		wp_register_style( 'slick', plugins_url( 'assets/css/slick.css', __FILE__ ) );
		wp_register_style( 'nouislider', plugins_url( 'ssets/css/nouislider.css', __FILE__ ) );
		wp_register_style( 'backtotop', plugins_url( 'assets/css/backtotop.css', __FILE__ ) );
		wp_register_style( 'magnific', plugins_url( 'asassets/css/magnific-popup.css', __FILE__ ) );
		wp_register_style( 'nice', plugins_url( 'assets/css/nice-select.css', __FILE__ ) );
		wp_register_style( 'font-awesome-pro', plugins_url( 'assets/css/font-awesome-pro.csss', __FILE__ ) );
		wp_register_style( 'elegant', plugins_url( 'assets/css/elegant-icon.css', __FILE__ ) );
		wp_register_style( 'spacing', plugins_url( 'assets/css/spacing.css', __FILE__ ) );
		wp_register_style( 'main', plugins_url( 'assets/css/main.css', __FILE__ ) );
		
	

	}	

    // Custom JS
	public function widget_scripts() {
		wp_register_script( 'jquery', plugins_url( 'assets/js/vendor/jquery.js', __FILE__ ) );
		wp_register_script( 'waypoints', plugins_url( 'assets/js/vendor/waypoints.js', __FILE__ ) );
		wp_register_script( 'bootstrap', plugins_url( 'assets/js/bootstrap-bundle.js', __FILE__ ) );
		wp_register_script( 'swiper', plugins_url( 'assets/js/swiper-bundle.js', __FILE__ ) );
		wp_register_script( 'slick', plugins_url( 'assets/js/slick.js', __FILE__ ) );
		wp_register_script( 'nouislider', plugins_url( 'assets/js/nouislider.js', __FILE__ ) );
		wp_register_script( 'magnific', plugins_url( 'assets/js/magnific-popup.js', __FILE__ ) );
		wp_register_script( 'parallax', plugins_url( 'assets/js/parallax.js', __FILE__ ) );
		wp_register_script( 'easing', plugins_url( 'assets/js/easing.js', __FILE__ ) );
		wp_register_script( 'parallax', plugins_url( 'assets/js/parallax-scroll.js', __FILE__ ) );
		wp_register_script( 'backtotop', plugins_url( 'assets/js/backtotop.js', __FILE__ ) );
		wp_register_script( 'nice', plugins_url( 'assets/js/nice-select.js', __FILE__ ) );
		wp_register_script( 'purecounter', plugins_url( 'assets/js/purecounter.js', __FILE__ ) );
		wp_register_script( 'wow', plugins_url( 'assets/js/wow.js', __FILE__ ) );
		wp_register_script( 'isotope', plugins_url( 'assets/js/isotope-pkgd.js', __FILE__ ) );
		wp_register_script( 'imagesloaded', plugins_url( 'assets/js/imagesloaded-pkgd.js', __FILE__ ) );
		wp_register_script( 'ajax', plugins_url( 'assets/js/ajax-form.js', __FILE__ ) );
		wp_register_script( 'main', plugins_url( 'assets/js/main.js', __FILE__ ) );
		
	}

    // Custom Category
    // public function elementor_common_category () {

	//    \Elementor\Plugin::$instance->elements_manager->add_category( 
	//    	'picchi-category',
	//    	[
	//    		'title' => __( 'Picchi Category', 'statup-extension' ),
	//    		'icon' => 'fa fa-plug', //default icon
	//    	]
	//    );

	// }


}

Elementor_Statup_Extension::instance();