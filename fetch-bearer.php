<?php
    // Import our autoloader which injects all dependencies and everything else we want
    require 'vendor/autoload.php';

    // Using name spacing, import our Microsoft Connector class
    use CiscoCodingChallenge\MicrosoftConnector;

    // Instantiate our Microsoft Connector class
    $msLoginService = new MicrosoftConnector();

    // Output our bearer token to the terminal
    echo 'Bearer: ' . $msLoginService->accessToken() . PHP_EOL;