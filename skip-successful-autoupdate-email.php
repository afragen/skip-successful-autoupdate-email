<?php

/**
 * Plugin Name: Skip Successful Autoupdate Email
 * Plugin URI: https://github.com/afragen/skip-successful-autoupdate-email
 * Tags: autoupdate, email
 * Description: Disable sending admin email for successful autoupdates. Only send emails indicating failures of the autoupdate process.
 * Version: 0.1.0
 * Author: Andy Fragen
 * Author URI: https://thefragens.com
 * License: MIT
 * GitHub Plugin URI: https://github.com/afragen/skip-successful-autoupdate-email
 * Requires at least: 4.7
 * Requires PHP: 5.6
 */

// Disable update emails on success.
add_filter(
	'auto_core_update_send_email',
	function( $true, $type ) {
		$true = 'success' === $type ? false : $true;
		return $true;
	},
	10,
	2
);

// Disable sending debug email if no failures.
add_filter(
	'automatic_updates_debug_email',
	function( $email, $failures ) {
		$empty_email = [
			'to'      => null,
			'subject' => null,
			'body'    => null,
			'headers' => null,
		];
		$email       = 0 === $failures ? $empty_email : $email;
		return $email;
	},
	10,
	2
);
