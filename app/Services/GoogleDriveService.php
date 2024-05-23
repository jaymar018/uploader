<?php

namespace App\Services;

use Google_Client;
use Google_Service_Drive;

class GoogleDriveService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setClientId(config('services.google.client_id'));
        $this->client->setClientSecret(config('services.google.client_secret'));
        $this->client->setAccessToken($this->getAccessToken());
        
        $this->service = new Google_Service_Drive($this->client);
    }

    private function getAccessToken()
    {
        $accessToken = json_decode(file_get_contents(storage_path('app/google-drive-token.json')), true);

        if ($this->client->isAccessTokenExpired()) {
            $this->client->fetchAccessTokenWithRefreshToken(config('services.google.refresh_token'));
            $accessToken = $this->client->getAccessToken();
            file_put_contents(storage_path('app/google-drive-token.json'), json_encode($accessToken));
        }

        return $accessToken;
    }

    public function listFolders()
    {
        $query = "mimeType='application/vnd.google-apps.folder'";
        $parameters = ['q' => $query];
        
        $results = $this->service->files->listFiles($parameters);

        return $results->getFiles();
    }
}
