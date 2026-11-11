<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::all();

        // Create 40 published posts using existing authors.
        Post::factory()->count(40)
            ->sequence(fn ($seq) => [
                'author_id' => $authors->random()->id,
            ])
            ->create();

        // Create 10 draft posts using existing authors.
        Post::factory()->count(10)->draft()
            ->sequence(fn ($seq) => [
                'author_id' => $authors->random()->id,
            ])
            ->create();

        $kagawad = Author::where(
            'email',
            'kagawad.regalado@bulletin.test'
        )->firstOrFail();

        // Create your personalized pinned post.
        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Regalado Clean-up Drive',
            'category' => 'Announcement',
            'body' => 'Join our community clean-up drive in Purok Regalado. '
                . 'Please bring brooms, gloves, and garbage bags. '
                . 'Let us work together to keep our purok clean.',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-12-03 15:00:00',
            'views' => 0,
        ]);
    }
}
