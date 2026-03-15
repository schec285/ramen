<?php

namespace Database\Seeders\Dev;

use App\Models\User;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 固定テストユーザ作成
        User::firstOrCreate(
            ['user_id' => 'test'],
            [
                'user_name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('test'),
            ],
        );

        // 3人のユーザそれぞれに5件のブログを作成
        User::factory()
            ->count(3)
            ->has(
                Blog::factory()
                    ->count(10)
                    ->hasAttached(
                        Tag::factory()->count(rand(0, 5))
                    )
            )
            ->create();
    }
}
