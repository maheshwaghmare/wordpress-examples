<?php
/**
 * Common API's: WP CLI
 *
 * 1. Run `wp examples hello_world`     Simple Command.
 * 
 * @package WordPress Examples
 * @since 1.0.0
 */

if ( ! class_exists( 'WordPress_Examples_WP_CLI' ) && class_exists( 'WP_CLI_Command' ) ) :

	/**
	 * WordPress Examples
	 */
	class WordPress_Examples_WP_CLI extends WP_CLI_Command {

		/**
		 * hello_world
		 *
		 * ## EXAMPLES
		 *
		 *     # Simple Command
		 *     $ wp examples hello_world
		 *     ok
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 *
		 * @alias list
		 */
		public function hello_world( $args, $assoc_args ) {

			// Simple message.
			WP_CLI::line( 'Hello' );

			// Error print here.
			WP_CLI::error( 'Testing the Error!' );
			
			// This not print due to above error message.
			WP_CLI::line( 'World' );
		}

		/**
		 * Arguments
		 *
		 * ## EXAMPLES
		 *
		 *     # Simple Command
		 *     $ wp examples show
		 *     ok
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 *
		 * @alias list
		 */
		public function arguments( $args, $assoc_args ) {

			$first  = isset( $args[0] ) ? $args[0] : 'Value of First Argument';
			$second = isset( $args[1] ) ? $args[1] : 'Value of Second Argument';

			WP_CLI::line( $first );
			WP_CLI::line( $second );

			// Or we can use the `\WP_CLI\Utils\get_flag_value()` which return the same.
			// $first = \WP_CLI\Utils\get_flag_value( $args, 0, 'Value of First Argument' );
			// $second = \WP_CLI\Utils\get_flag_value( $args, 1, 'Value of Second Argument' );

			// WP_CLI::line( $first );
			// WP_CLI::line( $second );
		}

		/**
		 * Arguments
		 *
		 * ## EXAMPLES
		 *
		 *     # Simple Command
		 *     $ wp examples show
		 *     ok
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 *
		 * @alias list
		 */
		public function associated_arguments( $args, $assoc_args ) {

			$first  = isset( $assoc_args['first'] ) ? $assoc_args['first'] : 'Value of First Associated Argument';
			$second = isset( $assoc_args['second'] ) ? $assoc_args['second'] : 'Value of Second Associated Argument';

			WP_CLI::line( $first );
			WP_CLI::line( $second );

			// // Or we can use the `\WP_CLI\Utils\get_flag_value()` which return the same.
			// $first = \WP_CLI\Utils\get_flag_value( $assoc_args, 'first', 'Value of First Associated Argument' );
			// $second = \WP_CLI\Utils\get_flag_value( $assoc_args, 'second', 'Value of Second Associated Argument' );

			// WP_CLI::line( $first );
			// WP_CLI::line( $second );
		}

		/**
		 * Arguments
		 *
		 * ## EXAMPLES
		 *
		 *     # Simple Command
		 *     $ wp examples list
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function list( $args, $assoc_args ) {

			$list = array(
				array(
					'id'    => '1',
					'first' => 'Mahesh',
					'last'  => 'Waghmare',
				),
				array(
					'id'    => '2',
					'first' => 'Swapnil',
					'last'  => 'Dhanrale',
				),
				array(
					'id'    => '3',
					'first' => 'Madhav',
					'last'  => 'Shikhare',
				),
			);

			$display_fields = array(
				'id',
				'first',
				'last',
			);
			$formatter      = new \WP_CLI\Formatter( $assoc_args, $display_fields );
			$formatter->display_items( $list );
		}

		/**
		 * Arguments
		 *
		 * ## EXAMPLES
		 *
		 *     # Simple Command
		 *     $ wp examples execute_commands
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function execute_commands( $args, $assoc_args ) {

			// Execute `wp cli info` CLI command.
			WP_CLI::runcommand( 'cli info' );

			// Execute `wp theme list` CLI command.
			WP_CLI::runcommand( 'theme list' );

			// Execute `wp plugin list --status=active` CLI command.
			WP_CLI::runcommand( 'plugin list --status=active' );
		}

		/**
		 * Arguments
		 *
		 * ## EXAMPLES
		 *
		 *     # Simple Command
		 *     $ wp examples confirm
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function confirm( $args, $assoc_args ) {

			// Confirm before proceed.
			WP_CLI::confirm( __( 'Do you want to proceed?', 'wordpress-examples' ) );

			WP_CLI::line( 'Great! You have confirm to proceed!' );
		}

		/**
		 * Arguments
		 *
		 * ## EXAMPLES
		 *
		 *     # Ask the confirm message.
		 *     $ wp examples confirm_with_flag --yes
		 *
		 *     # Execute without confirmation.
		 *     $ wp examples confirm_with_flag --yes
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function confirm_with_flag( $args, $assoc_args ) {

			// Confirm before proceed.
			$yes = isset( $assoc_args['yes'] ) ? true : false;
			if ( ! $yes ) {
				WP_CLI::confirm( __( 'Do you want to proceed?', 'wordpress-examples' ) );
			}


			WP_CLI::line( 'Great! You have confirm to proceed!' );
		}

		/**
		 * Arguments
		 *
		 * ## EXAMPLES
		 *
		 *     # Ask the confirm message.
		 *     $ wp examples custom_wp_query
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function custom_wp_query( $args, $assoc_args ) {

			$query_args = array(
				'post_type'      => 'post',
			
				// Query performance optimization.
				'no_found_rows'  => true,
			);
			
			$query = new WP_Query( $query_args );

			$display_fields = array(
				'ID',
				'post_title',
				'post_author',
				'post_date',
				'post_type',
				'post_status',
				'comment_status',
				'comment_count',
				// 'post_date_gmt',
				// 'post_content',
				// 'post_excerpt',
				// 'ping_status',
				// 'post_password',
				// 'post_name',
				// 'to_ping',
				// 'pinged',
				// 'post_modified',
				// 'post_modified_gmt',
				// 'post_content_filtered',
				// 'post_parent',
				// 'guid',
				// 'menu_order',
				// 'post_mime_type',
				// 'filter',
			);
			$formatter      = new \WP_CLI\Formatter( $assoc_args, $display_fields );
			$formatter->display_items( $query->posts );
		}
	}

	/**
	 * Add Command
	 */
	WP_CLI::add_command( 'examples', 'WordPress_Examples_WP_CLI' );

endif;
