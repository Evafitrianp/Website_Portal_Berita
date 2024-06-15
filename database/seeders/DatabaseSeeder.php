<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder yang lain jika ada
        $this->call([
            PostSeeder::class,
            CategoriesSeeder::class,
            Category_PostSeeder::class,
        ]);

        // Tambahkan admin user
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Tambahkan pengelola user
        User::updateOrCreate(
            ['email' => 'pengelola@pengelola.com'],
            [
                'name' => 'Pengelola',
                'password' => Hash::make('password'),
                'role' => 'pengelola',
            ]
        );
    }
}
