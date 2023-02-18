<?php
/**
 * Active Login Users Hooks
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'ActiveLoginUsers' ) ) {

	class ActiveLoginUsers {
		/**
		 * LoginUsers Constructor.
		 */
		public function __construct() {
			$this->includes();
			$this->init_hooks();
		}

		/**
		 * Hook into actions and filters.
		 *
		 */
		private function init_hooks() {
			add_action( 'wp_enqueue_scripts', array( $this, 'alu_custom_enqueue_styles' ) );
			add_action( 'user_register', array( $this, 'alu_set_unique_id_meta_key' ), 10, 1 );
			add_action( 'init', array( $this, 'alu_set_unique_id_meta_key_for_existing_users' ) );
			add_action( 'wp_logout', array( $this, 'alu_remove_user_from_active_list' ) );

			add_shortcode( 'active_login_users', array( $this, 'alu_get_active_login_users' ) );
		}

		/**
		 * Include required files used in admin and on the frontend.
		 */
		public function includes() {
			include_once ACTIVE_LOGIN_USERS_INCLUDES . '/active-login-users-hooks.php';
			include_once ACTIVE_LOGIN_USERS_INCLUDES . '/active-login-functions.php';
		}

		public function alu_custom_enqueue_styles() {
			wp_enqueue_style( 'loginusers-style', ACTIVE_LOGIN_USERS_ASSETS . '/css/loginusers.css', array(), ACTIVE_LOGIN_USERS_VERSION, 'all' );
		}
		
		public function alu_set_unique_id_meta_key( $user_id ) {
			$unique_id = '';
			do {
				$unique_id = mt_rand(1000, 9999);
			} while ( get_user_by( 'meta_value', $unique_id, 'user' ) );
		
			add_user_meta( $user_id, 'unique_id', $unique_id, true );
		}
		
		public function alu_set_unique_id_meta_key_for_existing_users() {
			$users = get_users( array( 'fields' => 'ID' ) );
			foreach ( $users as $user_id ) {
				if ( ! get_user_meta( $user_id, 'unique_id', true ) ) {
					$unique_id = '';
					do {
						$unique_id = mt_rand(1000, 9999);
					} while ( get_user_by( 'meta_value', $unique_id, 'user' ) );
		
					add_user_meta( $user_id, 'unique_id', $unique_id, true );
				}
			}
		}
		
		public function alu_get_current_session_id() {
			$session_id = '';
			if ( is_user_logged_in() ) {
				$user_id = get_current_user_id();
				$session_id = get_user_meta( $user_id, 'session_id', true );
			}
			return $session_id;
		}
		
		public function alu_remove_user_from_active_list(){
			$user = wp_get_current_user();
			$session_tokens = get_user_meta($user->ID, 'session_tokens', true);
		
			$session_id = $this->alu_get_current_session_id();
			unset($session_tokens[$session_id]);
		
			update_user_meta($user->ID, 'session_tokens', $session_tokens);
		}
		
		public function alu_get_active_login_users( $atts ) {
			$atts = shortcode_atts( array(
				'activeusers' => '',
				'column' => 3,
				'roles' => '',
				'number' => -1,
				'orderby' => 'ID',
				'order' => 'ASC',
			), $atts );
		
			$args = array(
				'count_total' => false,
				'fields' => array( 'ID', 'user_login' )
			);
		
			if ( ! empty( $atts['activeusers'] ) && $atts['activeusers'] == "yes" ) {
				$args['meta_key'] = 'session_tokens';
				$args['meta_value'] = '';
			}
			
			if ( ! empty( $atts['roles'] ) ) {
				$roles = explode( ',', $atts['roles'] );
				$args['role__in'] = $roles;
			}
			
			if ( ! empty( $atts['number'] ) ) {
				$args['number'] = $atts['number'];
			}
			
			if ( ! empty( $atts['orderby'] ) ) {
				$args['orderby'] = $atts['orderby'];
			}
			
			if ( ! empty( $atts['order'] ) ) {
				$args['order'] = $atts['order'];
			}
		
			$users = get_users( $args );
		
			$output = '';
			
			ob_start();
		
			if ( ! empty( $users ) ) {
				?>
				<div class="active-login-users">
					<?php
						/**
						 * Hook: active_login_users_before_card_item.
						 *
						 */
						do_action( 'active_login_users_before_card_item', $atts );
					?>
		
					<ul class="active-login-users-lists column-<?php echo absint( $atts['column'] ); ?>">
						<?php foreach ( $users as $user ): ?>
						<li>
							<?php
								/**
								 * Hook: active_login_users_before_card_loop_item.
								 *
								 * @hooked active_login_users_card_user_status - 10
								 * @hooked active_login_users_card_avater - 20
								 */
								do_action( 'active_login_users_before_card_loop_item', $user );
							
								/**
								 * Hook: active_login_users_after_card_loop_item.
								 *
								 * @hooked active_login_users_card_user_name - 10
								 */
								do_action( 'active_login_users_after_card_loop_item', $user );
							?>
						</li>
						<?php endforeach; ?>
					</ul>
		
					<?php
						/**
						 * Hook: active_login_users_after_card_item.
						 *
						 */
						do_action( 'active_login_users_after_card_item' );
					?>
				</div>
				<?php
			}
		
			return ob_get_clean();
		}
	}

	$ActiveLoginUsers = new ActiveLoginUsers();
}