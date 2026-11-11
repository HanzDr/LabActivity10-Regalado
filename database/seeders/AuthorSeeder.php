<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'name' => 'Kagawad Derren Hanz Regalado',
            'position' => 'Kagawad',
            'email' => 'kagawad.regalado@bulletin.test',
        ]);

        Author::factory()->count(4)->create();
    }
}