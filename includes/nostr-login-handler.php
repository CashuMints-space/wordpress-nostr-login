<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function handle_nostr_login() {
    $data = json_decode(file_get_contents('php://input'), true);
    $publicKey = sanitize_text_field($data['publicKey']);
    $signedEvent = $data['signedEvent'];

    // Verify the signed event (simplified, should use a proper Nostr library)
    if ($signedEvent['pubkey'] === $publicKey) {
        // Log the user in or register the user
        $user = get_user_by('email', $publicKey . '@example.com');
        if (!$user) {
            $user_id = wp_create_user($publicKey, wp_generate_password(), $publicKey . '@example.com');
            $user = get_user_by('id', $user_id);
        }

        // Log the user in
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);

        wp_send_json_success();
    } else {
        wp_send_json_error('Invalid signature');
    }
}
add_action('wp_ajax_nostr_login', 'handle_nostr_login');
add_action('wp_ajax_nopriv_nostr_login', 'handle_nostr_login');
