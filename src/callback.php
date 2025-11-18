<?php
/**
 * Microsoft OAuth2 Callback Handler
 * Receives authorization code → exchanges for access token
 */

require 'config.php';

// Validate "code"
if (!isset($_GET['code'])) {
    exit("Authorization code missing.");
}

$code = $_GET['code'];

// Prepare POST data for token exchange
$postData = [
    'client_id'     => $clientId,
    'scope'         => $scope,
    'code'          => $code,
    'redirect_uri'  => $redirectUri,
    'grant_type'    => 'authorization_code',
    'client_secret' => $clientSecret
];

// Make POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $tokenUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$tokenData = json_decode($response, true);

// Debug only (remove in production)
echo "<pre>";
print_r($tokenData);
echo "</pre>";
