<?php

namespace Database\Factories;

use App\Enums\TaskPriority;
use App\Models\Model;
use App\Models\task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class TaskFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */

    protected $model = task::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
            'phase' => $this->faker->randomElement(TaskPriority::cases()),
            'status' => $this->faker->boolean(),
            'description' => $this->faker->text(100),
            'user_id' => User::factory(),
        ];
    }
}
