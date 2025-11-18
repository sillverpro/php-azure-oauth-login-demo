<?php
/**
 * ----------------------------------------------------------
 * Microsoft 365 Login – Authorization Redirect Script
 * ----------------------------------------------------------
 * This script builds the authorization URL and redirects the
 * user to Microsoft’s login page.
 *
 * When the user successfully logs in, Microsoft redirects
 * them to your callback URL (callback.php) with a "code".
 * ----------------------------------------------------------
 */

require 'config.php';

// ----------------------------------------------------------
// Build the authorization parameters
// ----------------------------------------------------------
$params = [
    'client_id'     => $clientId,
    'response_type' => 'code',      // We want authorization code
    'redirect_uri'  => $redirectUri,
    'response_mode' => 'query',
    'scope'         => $scope,
    'state'         => bin2hex(random_bytes(16)) // Helps prevent CSRF
];

// Final URL to Microsoft login page
$authUrl = $authorizeUrl . '?' . http_build_query($params);

// Redirect user to Microsoft Login Page
header('Location: ' . $authUrl);
exit;

