<?php
/**
 * Active Login Users Function
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'alu_card_user_status' ) ) {

    /**
	 * Get the user Status
	 *
	 */
    function alu_card_user_status( $user ) {
        $session_tokens = get_user_meta( $user->ID, 'session_tokens', true );
        ?>
            <span class="userstatus<?php echo !empty( $session_tokens ) ? ' active' : ''; ?>"></span>
        <?php
    }
}

if ( ! function_exists( 'alu_card_avater' ) ) {

    /**
	 * Get the user Avater
	 *
	 */
    function alu_card_avater( $user ) {
        $user_avatar = get_avatar( $user->ID, '160' );
        ?>
            <div class="media">
                <?php echo $user_avatar; ?>    
            </div>
        <?php
    }
}


if ( ! function_exists( 'alu_card_user_name' ) ) {

    /**
	 * Get the user Name
	 *
	 */
    function alu_card_user_name( $user ) {
        $user_name = get_the_author_meta( 'display_name', $user->ID );
        ?>
            <p class="name">
                <strong>
                    <?php echo esc_html__($user_name, 'loginuser'); ?>
                </strong>
            </p>
        <?php
    }
}

if ( ! function_exists( 'alu_card_user_unique_id' ) ) {

    /**
	 * Get the user Unique ID
	 *
	 */
    function alu_card_user_unique_id( $user ) {
        $user_unique_id = get_user_meta( $user->ID, 'unique_id', true );
        ?>
            <span class="uniqueid">
                <?php echo esc_html__( 'ID: '. $user_unique_id, 'loginuser'); ?>
            </span>
        <?php
    }
}