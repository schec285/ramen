<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use App\Models\Tag;
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

        // 固定テストユーザ作成
        User::factory()->create([
            'user_id' => 'test',
            'email' => 'test@example.com',
            'password' => 'test',
        ]);
        
        // 3人のユーザそれぞれに5件のブログを作成
        User::factory()
            ->count(3)
            ->has(
                Blog::factory()
                    ->count(20)
                    ->hasAttached(
                        Tag::factory()->count(rand(0,5))
                    )
            )
            ->create();

        $this->call([
            PrefecturesTableSeeder::class,
        ]);
    }
}
