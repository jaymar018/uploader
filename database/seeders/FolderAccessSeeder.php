<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\FolderAccess;
use Illuminate\Database\Seeder;

class FolderAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        FolderAccess::create([
            'user_id' => $user->id,
            'folder_url' => 'https://drive.google.com/drive/folders/14y3S0IdZmR7lKx9zERdaN7pKIIMyubPh?usp=drive_link'
        ]);

        
        FolderAccess::create([
            'user_id' => $user->id,
            'folder_url' => 'https://drive.google.com/drive/folders/1DvQe2gahn5DgYJ9pjJ35kgdYAhDWVNqi?usp=drive_link'
        ]);
    }
}
