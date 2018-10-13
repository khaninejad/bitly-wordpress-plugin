<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://khaninejad.ir
 * @since      1.0.0
 *
 * @package    Demobitly
 * @subpackage Demobitly/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Demobitly
 * @subpackage Demobitly/public
 * @author     Payam Khaninejad <khaninejad@gmail.com>
 */
class Demobitly_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/demobitly-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/demobitly-public.js', array( 'jquery' ), $this->version, false );

	}
	public function register_shortcodes() {
    add_shortcode( 'bitlyshortcode', array( $this, 'shortcode_function') );
}
public function shortcode_function($atts ){
		include_once('bitly.php');

	$params = array();
	$params['access_token'] = get_option( $this->option_name . '_api' );
	$params['longUrl'] = $atts["link"];
	$params['domain'] = 'j.mp';
	$shortlink = bitly_get('shorten', $params);

 if(isset($atts["hit"])){
	 $params = array();
	 $params['access_token'] = get_option( $this->option_name . '_api' );
	 $params['link'] = $shortlink['data']["url"];
	 $params['domain'] = 'j.mp';
	 $results = bitly_get('link/clicks', $params);
		$click= " click: ". $results["data"]["link_clicks"];
 }
  echo $shortlink['data']["url"] . $click ;
	}

}
