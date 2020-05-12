<?php
namespace CiscoCodingChallenge;

// Imports
use GuzzleHttp\Client;
use stdClass;

class MicrosoftConnector
{
    /**
     * URL for Microsoft Login
     *
     * @var string
     */
    private $url;

    /**
     * Guzzle Client Object
     *
     * @var Client
     */
    private $client;

    /**
     * User JWT
     *
     * @var stdClass
     */
    private $userToken;

    function __construct()
    {
        // Setup our guzzle client variables so we may use the client throughout the class
        $this->client = new Client();
        $this->url = 'https://login.microsoftonline.com/' . getenv('MS_TENANT_ID') . '/oauth2/token?api-version=1.0';

        // Beceause we're using a static user (located in the env file) we should login the user
        // on class instantiation
        $this->login();
    }

    /**
     * Function allows us to make an API call to the Microsoft graph service and get the user's bearer token
     *
     * @return mixed
     */
    private function login() : void {
        // Using Guzzle, we login to Microsoft to get our user token
        $this->userToken = json_decode($this->client->post($this->url, [
            'form_params' => [
                'client_id' => getenv('MS_CLIENT_ID'),
                'client_secret' => getenv('MS_SECRET_ID'),
                'resource' => 'https://graph.microsoft.com/',
                'grant_type' => 'client_credentials',
            ],
        ])->getBody()->getContents(), false);
    }

    /**
     * Return the user token object after a successful login
     *
     * @return stdClass
     */
    public function userToken() : stdClass {
        return $this->userToken;
    }

    /**
     * Return the user access_token from the JWT
     *
     * @return string
     */
    public function accessToken() : string {
        return $this->userToken->access_token;
    }
}