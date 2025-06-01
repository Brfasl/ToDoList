<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            // Her kullanıcı için 3 kategori oluştur
            Category::factory()
                ->count(3)
                ->for($user) // user_id ilişkisi
                ->create()
                ->each(function ($category) use ($user) {
                    // Her kategoriye 5 görev ata
                    Task::factory()
                        ->count(5)
                        ->for($category) // category_id ilişkisi
                        ->for($user)     // user_id ilişkisi
                        ->create();
                });
        });
    }
}
