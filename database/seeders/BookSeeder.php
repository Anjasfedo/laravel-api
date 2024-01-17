<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a Faker instance with English (United States) locale
        $faker = \Faker\Factory::create("en_US");

        // Generate and insert 10 fake records into the 'books' table
        for ($i = 0; $i < 10; $i++) {
            Book::create([
                "title" => $faker->sentence,
                "author" => $faker->name,
                "published_date" => $faker->date,
            ]);
        }
    }
}
