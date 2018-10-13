<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://khaninejad.ir
 * @since      1.0.0
 *
 * @package    Demobitly
 * @subpackage Demobitly/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Demobitly
 * @subpackage Demobitly/admin
 * @author     Payam Khaninejad <khaninejad@gmail.com>
 */
class Demobitly_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Demobitly_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Demobitly_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/demobitly-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Demobitly_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Demobitly_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/demobitly-admin.js', array( 'jquery' ), $this->version, false );

	}

		public function add_options_page() {

		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Bitly Settings', 'demobitly-option' ),
			__( 'Bitly Settings', 'demobitly-option' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);

	}

	public function display_options_page() {
		include_once 'partials/demobitly-admin-display.php';
	}
	public function register_setting(){
		add_settings_section(
		$this->option_name . '_general',
		__( 'General', 'demobitly' ),
		array( $this, $this->option_name . '_general_cb' ),
		$this->plugin_name
	);

	add_settings_field(
		$this->option_name . '_api',
		__( 'Api Key', 'demobitly' ),
		array( $this, $this->option_name . '_api_cb' ),
		$this->plugin_name,
		$this->option_name . '_general',
		array( 'label_for' => $this->option_name . '_api' )
	);

	register_setting( $this->plugin_name, $this->option_name . '_api' );
	}
	public function _general_cb() {
		echo '<p>' . __( 'Please change the settings accordingly. get a personal access token using bitly service', 'demobitly' ) . '</p>';
	}

	public function _api_cb() {
		$api = get_option( $this->option_name . '_api' );
		echo '<input type="text" name="' . $this->option_name . '_api' . '" id="' . $this->option_name . '_api' . '" value="' . $api . '"> ';
	}


}
