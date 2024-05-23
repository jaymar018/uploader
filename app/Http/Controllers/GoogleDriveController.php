<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Drive;

class GoogleDriveController extends Controller
{
    public function getAllFolders()
    {
        // Initialize Google Client
        $client = new Client();
        $client->setClientId(env('GOOGLE_DRIVE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_DRIVE_CLIENT_SECRET'));
        $client->refreshToken(env('GOOGLE_DRIVE_REFRESH_TOKEN'));

        // Create Google Drive service
        $service = new Drive($client);

        // Define query parameters to filter folders
        $queryParams = [
            'q' => "'". env('GOOGLE_DRIVE_FOLDER_ID') ."' in parents and mimeType='application/vnd.google-apps.folder'",
        ];

        // Retrieve folders from Google Drive
        $results = $service->files->listFiles($queryParams);

        // Extract folder names from results
        $folders = [];
        foreach ($results->getFiles() as $folder) {
            $folders[] = [
                'id' => $folder->getId(),
                'name' => $folder->getName(),
                'url' => 'https://drive.google.com/drive/folders/' . $folder->getId(),
            ];
        }

        // Return folder names as JSON response
        return response()->json($folders);
    }
}
