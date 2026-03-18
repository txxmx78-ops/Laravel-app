<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'My',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('password')
        ]);

        // Author::factory(10)->create();

        Book::factory(20)->has(Author::factory()->count(3))
        ->has(Category::factory()->count(3))->create();        
    }
}
