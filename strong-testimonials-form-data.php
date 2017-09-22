<?php
/**
 * Plugin Name: Strong Testimonials Form Data
 * Plugin URI:
 * Description:
 * Author: Chris Dillon
 * Version: 1.0
 * Author URI:
 * Text Domain:
 * Requires: 3.6 or higher
 * License: GPLv3 or later
 */

/**
 * @param $post
 * @param $meta
 * @param $cats
 * @param $att
 */
function strong_form_data__new_testimonial( $post, $meta, $cats, $att ) {
	ob_start();
	print_r( $_POST );
	print_r( func_get_args() );
	$text = ob_get_clean();

	$headers = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-Type: text/plain; charset="' . get_option( 'blog_charset' ) . '"' . "\n";
	$headers .= 'From: ' . get_option( 'admin_email' ) . "\n";

	wp_mail( 'chris@strongplugins.com', 'Diagnostic for ' . get_option( 'blogname' ), $text, $headers );
}
add_action( 'wpmtst_new_testimonial_added', 'strong_form_data__new_testimonial', 10, 4 );
