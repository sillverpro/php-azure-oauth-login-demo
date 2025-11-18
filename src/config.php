<?php
/**
 * ----------------------------------------------------------
 * Microsoft 365 Login – Configuration File
 * ----------------------------------------------------------
 * This file stores all environment-specific variables for 
 * authenticating users via Microsoft Entra ID (Azure AD).
 *
 * NEVER commit real client secrets to GitHub.
 * Use environment variables or a secure config file instead.
 * ----------------------------------------------------------
 */

// Detect environment automatically
$host = $_SERVER['HTTP_HOST'];

// ----------------------------------------------------------
// ENVIRONMENT CONFIGURATION
// ----------------------------------------------------------
// Copy this block and create different configs for staging,
// development, localhost, etc.
// ----------------------------------------------------------

if ($host === 'localhost') {
    // LOCAL DEVELOPMENT EXAMPLE
    $tenantId     = "YOUR_TENANT_ID";
    $clientId     = "YOUR_CLIENT_ID";
    $clientSecret = "YOUR_CLIENT_SECRET"; // NEVER store real secret in GitHub
    $redirectUri  = "http://localhost/your-project/callback.php";
} else {
    // PRODUCTION EXAMPLE
    $tenantId     = "YOUR_TENANT_ID";
    $clientId     = "YOUR_CLIENT_ID";
    $clientSecret = "YOUR_CLIENT_SECRET"; 
    $redirectUri  = "https://yourdomain.com/callback.php";
}

// ----------------------------------------------------------
// MICROSOFT ENDPOINTS
// ----------------------------------------------------------
// OAuth2 authorization endpoint for Microsoft
$authorizeUrl = "https://login.microsoftonline.com/{$tenantId}/oauth2/v2.0/authorize";

// OAuth2 token endpoint (used inside callback.php)
$tokenUrl     = "https://login.microsoftonline.com/{$tenantId}/oauth2/v2.0/token";

// ----------------------------------------------------------
// SCOPES – Modify based on your usage
// ----------------------------------------------------------
// "openid email profile" is enough for basic login
$scope = "openid profile email offline_access";

