<?php

namespace Database\Seeders;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AuthorTableSeeder::class,
            BookTableSeeder::class,
     
        ]);
        // \App\Models\User::factory(10)->create();
        // Get all the roles attaching up to 3 random roles to each user
$authors = Author::all();

// Populate the pivot table
    Book::all()->each(function ($book) use ($authors) { 
    $book->authors()->attach(
        $authors->random(1)->pluck('id')->toArray()
    ); 
});
    }
}
