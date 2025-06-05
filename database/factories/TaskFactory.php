<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = \App\Models\Task::class;

    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'status' => $this->faker->numberBetween(0, 3), // 0-yapılmadı, 1-yapılıyor, 2-ertelendi, 3-iptal
            'deadline' => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
