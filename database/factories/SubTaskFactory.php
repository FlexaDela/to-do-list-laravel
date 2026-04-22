<?php

namespace Database\Factories;

use App\Enums\SubTaskPriority;
use App\Models\SubTask;
use App\Models\task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SubTask>
 */
class SubTaskFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */

    protected $model = SubTask::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
            'phase' => $this->faker->randomElement(SubTaskPriority::cases()),
            'status' => $this->faker->boolean(0.5),
            'task_id' => task::factory(),
        ];
    }
}
