<?php
namespace CiscoCodingChallenge;

// Imports
use GuzzleHttp\Client;

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
     * @var string
     */
    private $userToken;

    function __construct()
    {
        // Setup our guzzle client variables so we may use the client throughout the class
        $this->client = new Client();
        $this->url = 'https://login.microsoftonline.com/' . getenv('MS_TENANT_ID') . '/oauth2/token?api-version=1.0';
    }

    /**
     * Function allows us to make an API call to the Microsoft graph service and get the user's bearer token
     *
     * @param bool $isAssocArray
     *
     * @return mixed
     */
    public function login(bool $isAssocArray = false) {
        $this->userToken = json_decode($this->client->post($this->url, [
            'form_params' => [
                'client_id' => getenv('MS_CLIENT_ID'),
                'client_secret' => getenv('MS_SECRET_ID'),
                'resource' => 'https://graph.microsoft.com/',
                'grant_type' => 'client_credentials',
            ],
        ])->getBody()->getContents(), $isAssocArray);

        return $this->userToken;
    }
}