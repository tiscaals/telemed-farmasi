<?php
    session_start();
    // Include Librari Google Client (API)
    include_once 'assets/google-client/Google_Client.php';
    include_once 'assets/google-client/contrib/Google_Oauth2Service.php';
    $client_id = '61700418827-bgvavstvaqto639p5bv2emh5695rh7aq.apps.googleusercontent.com'; // Google client ID
    $client_secret = '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'; // Google Client Secret
    $redirect_url = 'http://localhost/laper/admin/google.php'; // Callback URL
    // Call Google API
    $gclient = new Google_Client();
    $gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
    $gclient->setClientId($client_id); // Set dengan Client ID
    $gclient->setClientSecret($client_secret); // Set dengan Client Secret
    $gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login
    $google_oauthv2 = new Google_Oauth2Service($gclient);
?>