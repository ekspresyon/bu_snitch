<?php
/*
* Plugin Name: Plugin retire tracker
* Version: 0.0.1
*/

function bu_snitch(){
 $pluginsURL = WP_PLUGIN_URL;
 $muPluginsURL = WPMU_PLUGIN_URL;
 $activepulgins= print_r(get_option('active_plugins'));

	// time snich was triggered
	$eventTime = current_time('mysql');

	// the theme in use
	$theme = wp_get_theme();

	// Site title
	$siteName = get_bloginfo( 'name' );

	// Site home URL
	$site_url = get_bloginfo( 'url' );

	// Post that triggered the snitch
	$pos_title = get_the_title();

	// the posts URL
	$post_url = get_permalink();

	// Error message
	$message = "\nBU Snitch report - ".$eventTime."\nContact-us plugin was just used!\nTheme: ".$theme."\nSite: ".$siteName." (".$site_url.")\nPost: ".$pos_title." (".$post_url.")\n---\n"."\n".$pluginsURL."\n".$muPluginsURL."\n".$activepulgins;

	// Where to send snitch report
	$destination = '/Users/dd/Sites/mamp_content/test/wp-content/plugins/my-errors.log';

	// If email used for logs
	$headers = 'From: report@buprt.log';


	error_log($message, 3, $destination);

}