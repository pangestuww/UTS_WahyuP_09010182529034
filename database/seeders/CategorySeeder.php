<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Novel',     'description' => 'Buku fiksi berbentuk novel'],
            ['name' => 'Teknologi', 'description' => 'Buku seputar teknologi & pemrograman'],
            ['name' => 'Sejarah',   'description' => 'Buku bertema sejarah'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
