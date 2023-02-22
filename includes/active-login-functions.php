<?php
/**
 * Active Login Users Function
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'alu_card_user_last_login' ) ) {

    /**
	 * Get the user Role
	 *
	 */
    function alu_card_user_last_login( $user, $atts ) {
        $user_login_meta = get_the_author_meta( 'last_login', $user->ID, true );
        
        if ( ! empty( $atts['time'] ) && $atts['time'] == 'true' && !empty( $user_login_meta ) ) {
            $user_last_login = human_time_diff( $user_login_meta );
            ?>
                <span class="user_login_time">
                    <?php echo esc_html__( ucwords($user_last_login ), 'loginuser'); ?>    
                </span>
            <?php
        }
    }
}

if ( ! function_exists( 'alu_card_user_status' ) ) {

    /**
	 * Get the user Status
	 *
	 */
    function alu_card_user_status( $user ) {
        $session_tokens = get_user_meta( $user->ID, 'session_tokens', true );
        ?>
            <span class="user_status<?php echo !empty( $session_tokens ) ? ' active' : ''; ?>"></span>
        <?php
    }
}

if ( ! function_exists( 'alu_card_user_avater' ) ) {

    /**
	 * Get the user Avater
	 *
	 */
    function alu_card_user_avater( $user ) {
        $user_avatar = get_avatar( $user->ID, '160' );
        ?>
            <div class="user_media">
                <?php echo $user_avatar; ?>    
            </div>
        <?php
    }
}

if ( ! function_exists( 'alu_card_user_role' ) ) {

    /**
	 * Get the user Role
	 *
	 */
    function alu_card_user_role( $user, $atts ) {
        if ( ! empty( $atts['role'] ) && $atts['role'] == 'true' ) {
            $user_meta = get_userdata( $user->ID );
            $user_role = get_role( $user_meta->roles[0] );
            ?>
                <div class="user_role">
                    <?php echo esc_html__(ucwords( $user_role->name ), 'loginuser'); ?>    
                </div>
            <?php
        }
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
            <p class="user_name">
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
            <span class="user_uniqueid">
                <?php echo esc_html__( 'ID: '. $user_unique_id, 'loginuser'); ?>
            </span>
        <?php
    }
}