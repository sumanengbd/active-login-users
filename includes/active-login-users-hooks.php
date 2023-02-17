<?php
/**
 * Active Login Users Hooks
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Active Login Users Card Status and Image.
 *
 * @see alu_card_user_status()
 * @see alu_card_avater()
 */
add_action( 'active_login_users_before_card_loop_item', 'alu_card_user_status', 10 );
add_action( 'active_login_users_before_card_loop_item', 'alu_card_avater', 20 );

/**
 * Active Login Users Card Name and Unique ID.
 *
 * @see alu_card_user_name()
 * @see alu_card_user_unique_id()
 */
add_action( 'active_login_users_after_card_loop_item', 'alu_card_user_name', 10 );
add_action( 'active_login_users_after_card_loop_item', 'alu_card_user_unique_id', 20 );