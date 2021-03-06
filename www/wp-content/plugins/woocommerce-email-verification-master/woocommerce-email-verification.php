<?php
/*
 * Plugin Name: WooCommerce Email Verification
 * Version: 1.0.0
 * Plugin URI: http://wordpress.org/plugins/woocommerce-email-verification/
 * Description: Sends a verification link on users mail ID to activate their account after register.
 * Author: Alex Melik (Shahumyan Media)
 * Author URI: http://www.shahumyanmedia.com/
 * Requires at least: 1.01
 */
if(! defined( 'ABSPATH' )) exit; // Exit if accessed directly

require('includes/class-wev-email-verification.php');
$wev = new WEV_Email_Verification();

register_activation_hook( __FILE__,  'wev_install'  );

	 function wev_install(){
		global $wpdb, $wp_version;

		if($wpdb->get_var("show tables like '".wev_temp_user. "'") != wev_temp_user){
		$sSql = "CREATE TABLE IF NOT EXISTS `". wev_temp_user. "` (";
		$sSql = $sSql . "`user_id` INT NOT NULL AUTO_INCREMENT ,";
		$sSql = $sSql . "`user_name` TEXT NOT NULL,";
		$sSql = $sSql . "`user_pass` TEXT NOT NULL,";
		$sSql = $sSql . "`user_email` TEXT NOT NULL,";
		$sSql = $sSql . "`confirm_code` TEXT NOT NULL,";
		$sSql = $sSql . "PRIMARY KEY (`user_id`)";
		$sSql = $sSql . ")";
		$wpdb->query($sSql);
	}
	}