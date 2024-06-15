<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data untuk diisi ke dalam tabel categories
        $categories = [
            [
                'title' => 'Category 1',
                'seotitle' => 'category-1',
                'active' => 'Yes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Category 2',
                'seotitle' => 'category-2',
                'active' => 'Yes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Category 3',
                'seotitle' => 'category-3',
                'active' => 'No',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke dalam tabel categories
        DB::table('tblcategories')->insert($categories);
    }
}
