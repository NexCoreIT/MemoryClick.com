<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Photo Services',
            'Virtual Photo Services',
            'Other Photo Services',
            'Video Services',
            'Floor Planing',
        ];

        // Loop through and insert each category with a slug
        foreach ($categories as $category) {
            Category::firstOrCreate([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
