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
			WP_CLI::success( 'World' );
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

		/**
		 * Using make_progress_bar()
		 *
		 * ## EXAMPLES
		 *
		 *     $ wp examples make_progress_bar
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function make_progress_bar( $args, $assoc_args ) {
			$progress = \WP_CLI\Utils\make_progress_bar( 'Process Bar', '100' );

			// Wait for 1 second.
			sleep(1);
			$progress->tick();

			// Wait for 3 second.
			sleep(3);
			$progress->tick();

			// Wait for 2 second.
			sleep(2);
			$progress->tick();

			// Wait for 5 second.
			sleep(5);
			$progress->tick();

			// Wait for 3 second.
			sleep(3);
			$progress->tick();

			// Wait for 1 second.
			sleep(1);
			$progress->tick();

			$progress->finish();
		}

		/**
		 * Using WP_CLI::debug()
		 *
		 * ## EXAMPLES
		 *
		 *     $ wp examples debug
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function debug( $args, $assoc_args ) {
			WP_CLI::debug( 'Message Without Any Group' );

			WP_CLI::debug( 'First Message from `group1` Group', 'group1' );
			WP_CLI::debug( 'Second Message from `group1` Group', 'group1' );

			WP_CLI::debug( 'First Message from `group2` Group', 'group2' );
			WP_CLI::debug( 'Second Message from `group2` Group', 'group2' );
		}

		/**
		 * Using WP_CLI::write_csv()
		 *
		 * ## EXAMPLES
		 *
		 *     $ wp examples write_csv
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function write_csv( $args, $assoc_args ) {
			$file_resource = fopen( 'users.csv', 'w' );

			$data = array(
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

			\WP_CLI\utils\write_csv( $file_resource, $data, array( 'id', 'first', 'last' ) );
		}

		/**
		 * Using WP_CLI::report_batch_operation_results()
		 *
		 * @see  https://make.wordpress.org/cli/handbook/internal-api/wp-cli-utils-report-batch-operation-results/
		 *
		 * ## EXAMPLES
		 *
		 *     $ wp examples report_batch_operation_results
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function report_batch_operation_results( $args, $assoc_args ) {
			$count = 100;
			$successes = 0;
			$errors    = 0;
			$skips     = 0;
			for ($i=1; $i <= $count; $i++) { 
					// $successes += 1;
				if( $i <= 0 && $i >= 25 ) {
					$successes += 1;
				}
				if(  $i >= 26 && $i <= 50 ) {
					$errors += 1;
				}
				if(  $i >= 51 && $i <= 100 ) {
					$skips += 1;
				}
			}

			\WP_CLI\Utils\report_batch_operation_results( 'noun', 'verb', $count, $successes, $errors, $skips );
		}

		/**
		 * Using WP_CLI::parse_str_to_argv()
		 *
		 * ## EXAMPLES
		 *
		 *     $ wp examples parse_str_to_argv
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function parse_str_to_argv( $args, $assoc_args ) {
			$argv = \WP_CLI\Utils\parse_str_to_argv( 'wp plugin list' );

			WP_CLI::error( print_r( $argv ) );
		}

		/**
		 * Using WP_CLI::parse_ssh_url()
		 *
		 * ## EXAMPLES
		 *
		 *     $ wp examples parse_ssh_url
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function parse_ssh_url( $args, $assoc_args ) {
			$argv = \WP_CLI\Utils\parse_ssh_url( 'https://make.wordpress.org/cli/handbook/internal-api/wp-cli-utils-parse-ssh-url/' );
			WP_CLI::line( print_r( $argv ) );

			$argv = \WP_CLI\Utils\parse_ssh_url( 'www-data@ec2-34-222-239-215.us-west-2.compute.amazonaws.com' );
			WP_CLI::line( print_r( $argv ) );
		}

		/**
		 * Using WP_CLI::do_hook()
		 *
		 * ## EXAMPLES
		 *
		 *     $ wp examples do_hook
		 *
		 * @since 1.0.0
		 * @param  array $args        Arguments.
		 * @param  array $assoc_args Associated Arguments.
		 */
		public function do_hook( $args, $assoc_args ) {

			// Before hook.
			WP_CLI::do_hook('wordpress-examples-before-hook');

			WP_CLI::line('Started command `do_hook`.');

			// Inside Hook.
			WP_CLI::do_hook('wordpress-examples-inside-hook');

			WP_CLI::line('Started command `do_hook`.');

			// After Hook.
			WP_CLI::do_hook('wordpress-examples-after-hook');
		}
	}

	/**
	 * Add Command
	 */
	WP_CLI::add_command( 'examples', 'WordPress_Examples_WP_CLI' );

endif;


WP_CLI::add_hook(
	'wordpress-examples-before-hook',
	function () {
		WP_CLI::line( 'WordPress Examples Before Hook' );
	}
);

WP_CLI::add_hook(
	'wordpress-examples-inside-hook',
	function () {
		WP_CLI::line( 'WordPress Examples Inside Hook' );
	}
);

WP_CLI::add_hook(
	'wordpress-examples-after-hook',
	function () {
		WP_CLI::line( 'WordPress Examples After Hook' );
	}
);