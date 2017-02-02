

<html>
<body>

<H1> Teaching Improvement Practice (TIP)</H1>

Authenticated By Google.

<?php

include "config.php";
require_once "../vendor/autoload.php";
session_start();
//$guzzle->setDefaultOption('verify', false);
$provider = new League\OAuth2\Client\Provider\Google([
    'clientId'     => $config['googleClientId'] ,
    'clientSecret' => $config['googleClientSecret'] ,
    //'redirectUri'  =>'http://localhost:63342/nsc/auth2/google.php',
    'redirectUri'  => 'http://www.icoolshow.net/nsc/tip/google.php'
    //'hostedDomain' => 'https://example.com',
]);

if (!empty($_GET['error'])) {

    // Got an error, probably user denied access
    exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));

} elseif (empty($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;

} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    // State is invalid, possible CSRF attack in progress
    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {

        // We got an access token, let's now get the owner details
        $ownerDetails = $provider->getResourceOwner($token);

        // Use these details to create a new profile
        printf('first name: %s! <br/>', $ownerDetails->getFirstName());
        printf('id: %s! <br/>', $ownerDetails->getId());
        printf('email: %s! <br/>', $ownerDetails->getEmail());

    } catch (Exception $e) {

        // Failed to get user details
        exit('Something went wrong: ' . $e->getMessage());

    }

    // Use this to interact with an API on the users behalf
    echo $token->getToken(),"<br/>";

    $_SESSION['access_token'] = $token->getToken();

    // Use this to get a new access token if the old one expires
    echo "token", $token->getRefreshToken();

    // Number of seconds until the access token will expire, and need refreshing
    echo "expires in second", $token->getExpires();
}
?>
</body>
</html>