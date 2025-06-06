<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Post::insert([
            [
                'title' => 'Introducing Comment Buddy',
                'content' => 'Comment Buddy is a plug-and-play Laravel Livewire comment system with nested replies, toasts, and clean UX.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Nested Comments with Livewire',
                'content' => 'Learn how Comment Buddy supports deeply nested replies with a clean, recursive Livewire structure.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Customization & Toasts',
                'content' => 'Enable toast messages and publish your own views for full control over UI behavior.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
