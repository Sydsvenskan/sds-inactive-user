<?php
/*
Plugin Name: SDS Inactive user
Plugin URI: http://www.sydsvenslkan.se
Description: Add new user role (Inactive user).
Version: 1.0
Author: Johannes Fosseus
*/

/**
 * If a user is set as "Inactive", we reset the password
 */
function sds_inactive_user_role_change( $user, $role ) {

	if ( 'inactive-user' == $role ) {
		wp_set_password( uniqid( '', true ), $user );
	}

}

add_action( 'set_user_role', 'sds_inactive_user_role_change', 10, 2 );


/**
 * Add user role, Inactive
 */
function sds_inactive_user_init() {

	if ( get_role( 'inactive-user' ) )
		return;

	$result = add_role( 'inactive-user', 'Inactive', array( 'read' => false ) );

}

add_action( 'admin_init', 'sds_inactive_user_init' );