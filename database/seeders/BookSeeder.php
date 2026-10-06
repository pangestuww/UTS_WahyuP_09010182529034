<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['category_id' => 1, 'title' => 'Laskar Pelangi',       'author' => 'Andrea Hirata',  'publisher' => 'Bentang Pustaka', 'year' => 2005, 'stock' => 10],
            ['category_id' => 1, 'title' => 'Bumi Manusia',         'author' => 'Pramoedya',      'publisher' => 'Hasta Mitra',     'year' => 1980, 'stock' => 5],
            ['category_id' => 2, 'title' => 'Clean Code',           'author' => 'Robert Martin',  'publisher' => 'Prentice Hall',   'year' => 2008, 'stock' => 7],
            ['category_id' => 2, 'title' => 'Laravel Up & Running', 'author' => 'Matt Stauffer',  'publisher' => 'O Reilly',        'year' => 2019, 'stock' => 4],
            ['category_id' => 3, 'title' => 'Sejarah Indonesia',    'author' => 'Sartono',        'publisher' => 'Gramedia',        'year' => 1990, 'stock' => 3],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
