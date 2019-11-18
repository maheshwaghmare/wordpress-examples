<?php
/**
 * Common API's: Dashboard Widgets
 *
 * @package WordPress Examples
 * @since 1.0.0
 */

if ( ! class_exists( 'WordPress_Examples_Dashboard_Widgets' ) ) :

	/**
	 * WordPress Examples
	 *
	 * @since 1.0.0
	 */
	class WordPress_Examples_Dashboard_Widgets {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object Class Instance.
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 * @return object initialized object of class.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widgets' ) );
		}

		/**
		 * Add Dashboard Widget.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		function add_dashboard_widgets() {
		    wp_add_dashboard_widget(
		    	'wordpress_example_dashboard_widget', // Widget slug.
		        esc_html__( 'Example Widget Title', 'wordpress-examples' ), // Title.
		        array( $this, 'widget_markup' ) // Display function.
		    );
		}

		/**
		 * Dashboard Widget Markup.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		function widget_markup() {
		    ?>
		    <h1><?php esc_html_e( 'Heading 1.', 'wordpress-examples' ); ?></h1>
		    <h2><?php esc_html_e( 'Heading 2.', 'wordpress-examples' ); ?></h2>
		    <h3><?php esc_html_e( 'Heading 3.', 'wordpress-examples' ); ?></h3>
		    <h4><?php esc_html_e( 'Heading 4.', 'wordpress-examples' ); ?></h4>
		    <h5><?php esc_html_e( 'Heading 5.', 'wordpress-examples' ); ?></h5>
		    <h6><?php esc_html_e( 'Heading 6.', 'wordpress-examples' ); ?></h6>
		    <p><?php esc_html_e( 'Simple Paragraph.', 'wordpress-examples' ); ?></p>
		    <p class="description"><?php esc_html_e( 'Paragraph with CSS class `description`.', 'wordpress-examples' ); ?></p>
		    <?php
		}

	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	WordPress_Examples_Dashboard_Widgets::get_instance();

endif;
