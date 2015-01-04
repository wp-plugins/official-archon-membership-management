<?php
/*
 * Plugin Name: Membership Management
 * Plugin URI: http://archonweb.com/membership-management/
 * Description: Allows the ability to setup and manage multiple membership tiers.
 * Version: 1.0
 * Author: Cody Greene
 * Author URI: https://github.com/toymakercody
 * License: GPL2
 *
 */

/*
 * Assign global variables
 */



/*
 * Create the extra column on the user table needed for plugin when plugin is activated and option to the options table
 */
function mma_edit_user_table(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'users';
	$sql = 'ALTER TABLE ' . $table_name . ' ADD membership_management_level int';
	$wpdb->query($sql);

	$options = array('goldupgradecode' => null,'silverupgradecode' => null,'bronzeupgradecode' => null);
	add_option('member_management_upgrade_code', $options);
}
register_activation_hook(__FILE__, 'mma_edit_user_table');


/*
 * Remove the extra column on the user table and the options from the options table needed for plugin when plugin is deactivated
 */
function mma_delete_column_user_table(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'users';
	$sql = 'ALTER TABLE ' . $table_name . ' DROP COLUMN membership_management_level';
	$wpdb->query($sql);

	delete_option('member_management_upgrade_code');
}
register_deactivation_hook(__FILE__, 'mma_delete_column_user_table');

/*
 * Hook for adding admin menus
 */
function mt_add_pages() {
	global $plugin_url;
	// Add a new top-level menu (ill-advised):
	add_menu_page(
		__('Membership Management','Membership Management'),
		__('Membership Management','Membership Management'),
		'manage_options',
		'manage_options',
		'membership_management_page',
		WP_PLUGIN_URL . '/membership-management/img/contact_card.png'
		
	);
}
add_action('admin_menu', 'mt_add_pages');

/*
 * membership_management_page() displays the page content for the custom Test Toplevel menu
 */
function membership_management_page(){
	if(!current_user_can('manage_options')){
		wp_die('You do not have sufficient permissions to access this page.');
	}
	require('options-page-wrapper.php');
}

/*
 * get testimonials by shortcode
 */
function membership_management_shortcode( $atts, $content = null ) {
	global $wpdb;
	$upgradecode = get_option('member_management_upgrade_code');
	$current_user = wp_get_current_user();
	$table_name = $wpdb->prefix . 'users';
    $a = shortcode_atts( array(
        'level' => null,
    ), $atts );
	$id = $a['level'];
	$row = $wpdb->get_row( $wpdb->prepare('SELECT membership_management_level FROM ' . $table_name . ' WHERE id = %d', $current_user->ID) );
	$htmlString = null;
	if($id >= $row->membership_management_level && $row->membership_management_level != null){;
		$htmlString = $content;
	}elseif($id == 1){
		$htmlString = stripslashes($upgradecode['goldupgradecode']);
	}elseif($id == 2){
		$htmlString = stripslashes($upgradecode['silverupgradecode']);
	}elseif ($id == 3){
		$htmlString = stripslashes($upgradecode['bronzeupgradecode']);
	}
	return $htmlString;
}
add_shortcode( 'membership management', 'membership_management_shortcode' );

/*
 * Add the javascript to the admin options page only
 */
function add_membership_management_javascript_to_admin($hook) {
	if ( 'toplevel_page_manage_options' != $hook ) {
		return;
	}
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . '/js/main.js' );
}
add_action('admin_enqueue_scripts', 'add_membership_management_javascript_to_admin');
?>