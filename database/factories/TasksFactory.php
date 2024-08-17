<?php

namespace Database\Factories;

use App\Models\Priority;
use App\Models\Tasks;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tasks>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //map the column names with values
            'name'=> fake()->sentence(),
            'is_completed'=> rand(0, 1),
            //set priority to null or rand priority id
            'priority_id'=>rand(0,1) === 0  ? NULL : Priority::pluck('id')->random(),
        ];
    }
}
