<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->word(),
            'is_active' => true,
        ];
    }
}
