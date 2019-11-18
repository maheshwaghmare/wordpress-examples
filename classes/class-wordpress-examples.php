<?php
/**
 * Initialize Plugin
 *
 * @package WordPress Examples
 * @since 1.0.0
 */

if ( ! class_exists( 'WordPress_Examples' ) ) :

	/**
	 * WordPress Examples
	 *
	 * @since 1.0.0
	 */
	class WordPress_Examples {

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
		 */
		public function __construct() {
		}

	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	WordPress_Examples::get_instance();

endif;
