<?php

// database/seeders/PostSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run()
    {
        DB::table('tblposts')->insert([
            [
                'title' => 'Berita 1',
                'seotitle' => 'berita-1',
                'user_id' => '1',
                'content' => 'Isi berita 1',
                'image' => 'noimage.jpg',
                'hits' => 0,
                'active' => 'Yes',
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Berita 2',
                'seotitle' => 'berita-2',
                'user_id' => '1',
                'content' => 'Isi berita 2',
                'image' => 'noimage.jpg',
                'hits' => 0,
                'active' => 'Yes',
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Berita 3',
                'seotitle' => 'berita-3',
                'user_id' => '1',
                'content' => 'Isi berita 3',
                'image' => 'noimage.jpg',
                'hits' => 0,
                'active' => 'Yes',
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Berita 4',
                'seotitle' => 'berita-4',
                'user_id' => '1',
                'content' => 'Isi berita 4',
                'image' => 'noimage.jpg',
                'hits' => 0,
                'active' => 'Yes',
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

