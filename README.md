# wordpress-nostr-login

# Nostr Login for WordPress

**Nostr Login** is a WordPress plugin that allows users to log in using the Nostr decentralized identity system.

## Description

Nostr is a new identity layer for the web. Instead of managing your own database of emails and passwords or relying on big providers like Google, Facebook, or Twitter, you can use Nostr to provide a permissionless identity provider. Nostr uses key pairs to generate a global unique identifier for users. This plugin integrates Nostr into WordPress, allowing users to log in using their Nostr keys.

## Features

- Simple integration with Nostr decentralized identity.
- User-friendly login interface.
- Secure authentication using cryptographic key pairs.

## Installation

### From GitHub

1. Download the plugin from the [GitHub repository](https://github.com/yourusername/wp-nostr-login).
2. Extract the downloaded ZIP file.
3. Upload the extracted folder to the `/wp-content/plugins/` directory of your WordPress installation.
4. Activate the plugin through the 'Plugins' menu in WordPress.

### From WordPress Admin

1. Navigate to the 'Plugins' > 'Add New' in your WordPress admin panel.
2. Click the 'Upload Plugin' button at the top.
3. Choose the downloaded ZIP file.
4. Click 'Install Now' and then activate the plugin.

## Usage

1. After activating the plugin, use the shortcode `[nostr_login]` to display the login button on any page or post.
2. Users can click the "Login with Nostr" button to authenticate using their Nostr key.

## File Structure

