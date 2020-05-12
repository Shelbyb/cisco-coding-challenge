<?php

// Import our autoloader which injects all dependencies and everything else we want
require 'vendor/autoload.php';

use CiscoCodingChallenge\MicrosoftConnector;

// Instantiate our Microsoft Connector class
$msLoginService = new MicrosoftConnector();

// Let's login give the user creds in the .env file
$login = $msLoginService->login();

echo 'Bearer: ' . $login->access_token . PHP_EOL;






