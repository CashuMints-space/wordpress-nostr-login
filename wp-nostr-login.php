<?php
/*
Plugin Name: Nostr Login
Description: Allows users to log in using Nostr.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Enqueue JavaScript
function nostr_login_enqueue_scripts() {
    wp_enqueue_script('nostr-login', 'https://www.unpkg.com/nostr-login@latest/dist/unpkg.js', array(), null, true);
    wp_enqueue_script('nostr-login-custom', plugins_url('assets/js/nostr-login.js', __FILE__), array('nostr-login'), null, true);
}
add_action('wp_enqueue_scripts', 'nostr_login_enqueue_scripts');

// Include the AJAX handler
require_once plugin_dir_path(__FILE__) . 'includes/nostr-login-handler.php';

// Create shortcode for login form
function nostr_login_form() {
    ob_start(); ?>
    <div id="nostr-login-container">
        <button id="nostr-login-button">Login with Nostr</button>
    </div>
    <?php return ob_get_clean();
}
add_shortcode('nostr_login', 'nostr_login_form');
