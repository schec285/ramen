<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
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
        
        User::factory()->has(Blog::factory()->count(5))->count(3)->create();

        $this->call([
            PrefecturesTableSeeder::class,
        ]);
    }
}
