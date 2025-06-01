<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $categories = Category::factory(3)->create([
                'user_id' => $user->id,
            ]);

            foreach ($categories as $category) {
                Task::factory(5)->create([
                    'category_id' => $category->id,
                    'user_id' => $user->id, // ✅ BURASI EKLENDİ
                ]);
            }
        });
    }
}
